<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use App\User;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view("backend.users.list");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view("backend.users.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'nom' => 'required',
            'email' => 'email|unique:users',
        ]);
        $user = new User();
        $user->name = $request->get('nom') ? $request->get('nom') : '';
        //$user->prenom = $request->get('prenom') ? $request->get('prenom') : '';
        $user->email = $request->get('email') ? $request->get('email') : '';
        $user->password = $request->get('password') ? bcrypt($request->get('password')) : '';
        //$user->pays_id = $request->get('pays') ? $request->get('pays') : '';

        /**
          if ($user->save()) {
          $user->roles()->sync($request->get('role'));
          }
         * */
        return $user->save() ? redirect()->route('user.index') : redirect()->route('user.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $cat = User::find($id);
        return $cat->delete();
    }

    public function delete(Request $request, $id) {
        return response()->json($this->destroy($id));
    }

    public function findinfo($id) {
        $user = User::find($id);

        return response()->json($user);
    }

    public function data(Request $request) {
        $users = \DB::table('users')->select([
                    'users.id as id', 'users.name as nom','roles.name as role', 'users.email as email', 'users.created_at as created_at'
                ])->leftJoin('role_user', 'role_user.user_id', '=', 'users.id')
                ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id');

        $datatables = DataTables::of($users)
                        ->addColumn('action', function ($model) {

                            $url_edit = '<a data-id=":id" class="green update" ><i class="ace-icon fa fa-pencil bigger-130"></i></a>';
                            $delete = '<a data-id=":id" class="red delete"><i class="ace-icon fa fa-trash-o bigger-130 "></i></a>';
                            $edit = str_replace(":id", $model->id, $url_edit); //route('categoriesservice.edit', $model->id);
                            $del = str_replace(":id", $model->id, $delete);
                            //$url_edit = str_replace(":id", $edit, $url_edit);
                            $action = '<div class="hidden-sm hidden-xs action-buttons">&nbsp;' . $edit . '&nbsp;' . $del . '</div>';
                            return $action;
                        })->editColumn('created_at', function ($model) {
            return $model->created_at ? with(new Carbon($model->created_at))->format('d/m/Y') : '';
        });
        // les filtres 
        // Global search function
        if ($keyword = $request->get('search')['value']) {
            //Debugbar::info($keyword);
            // override users.name global search
            $datatables->filterColumn('nom', function ($query, $keyword) {
                $query->where('users.name', 'like', "%" . $keyword . "%");
            });

            $datatables->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
            });
        }
        return $datatables->make(true);
    }

}
