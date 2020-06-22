<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use App\Categoriesservice;

class CategoriesserviceController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return view("backend.servicecategories.categories-list");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        \Debugbar::info($request);
         $image = "";
        if ($request->hasFile('photo')) {
            $image = \Storage::putFile('public/uploads', $request->file('photo'), 'public');
        }
        return Categoriesservice::create([
                    'nom' => $request->get('nom'),
                    'description' => $request->get('description'),
                    'photo' => $image
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        \Debugbar::info($request->get('id_categorie'));
        $cat = Categoriesservice::where('id', $request->get('id_categorie'))->first();
        $image = "";
        if ($request->hasFile('photo')) {
            $image = \Storage::putFile('public/uploads', $request->file('photo'), 'public');
        }

        $updatescat = [
            'nom' => $request->get('nom'),
            'description' => $request->get('description'),
            'photo' => $image
        ];
        $cat->update($updatescat);
        return $cat;
    }

    /**
     * Show the form for editing the specified resource.
     *     
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id) {
        return response()->json($this->destroy($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $cat = Categoriesservice::find($id);
        return $cat->delete();
    }

    public function data(Request $request) {
        $categoriesservices = \DB::table('categoriesservices')->select([
            'categoriesservices.id as id', 'categoriesservices.nom as nom', 'categoriesservices.photo as photo', 'categoriesservices.description as description', 'categoriesservices.created_at as created_at'
        ]);

        $datatables = DataTables::of($categoriesservices)
                ->addColumn('action', function ($model) {

                    $url_edit = '<a data-id=":id" class="green update" ><i class="ace-icon fa fa-pencil bigger-130"></i></a>';
                    $delete = '<a data-id=":id" class="red delete"><i class="ace-icon fa fa-trash-o bigger-130 "></i></a>';
                    $edit = str_replace(":id", $model->id, $url_edit); //route('categoriesservice.edit', $model->id);
                    $del = str_replace(":id", $model->id, $delete);
                    //$url_edit = str_replace(":id", $edit, $url_edit);
                    $action = '<div class="hidden-sm hidden-xs action-buttons">&nbsp;' . $edit . '&nbsp;' . $del . '</div>';
                    return $action;
                })->editColumn('photo', function ($model) {
                    $image= url('/storage/'.$model->photo);
                    return $model->photo ?  $image : '';
                })
                ->editColumn('created_at', function ($model) {
            return $model->created_at ? with(new Carbon($model->created_at))->format('d/m/Y') : '';
        });
        // les filtres 
        // Global search function
        if ($keyword = $request->get('search')['value']) {
            //Debugbar::info($keyword);
            // override categoriesservices.name global search
            $datatables->filterColumn('nom', function ($query, $keyword) {
                $query->where('categoriesservices.nom', 'like', "%" . $keyword . "%");
            });

            $datatables->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
            });
        }
        return $datatables->make(true);
    }

    public function findinfo($id) {
        $cat = Categoriesservice::find($id);

        return response()->json($cat);
    }

}

?>