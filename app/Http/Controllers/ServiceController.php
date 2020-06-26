<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use App\Tag;
use App\Service;
use App\Ville;
use App\Categoriesservice;
use App\Offre;
use App\HeureService;
use App\Commande;

class ServiceController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return view("backend.services.list-service");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {

        $jours = \DB::table('jours')->select()->orderBy('id', 'asc')->get()->toArray();
        $heureouvertures = \DB::table('heureouvertures')->select()->orderBy('id', 'asc')->get()->toArray();
        $heurefermetures = \DB::table('heurefermetures')->select()->orderBy('id', 'asc')->get()->toArray();
        $categories = Categoriesservice::select()->orderBy('nom', 'asc')->get()->toArray();
        $villes = Ville::select()->orderBy('nom', 'asc')->get()->toArray();
        $tags = Tag::select()->orderBy('nom', 'asc')->get()->toArray();

        //dd($jours);
        return view("backend.services.add-service", compact('villes', 'tags', 'categories', 'jours', 'heureouvertures', 'heurefermetures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        //dd($request->all());
        \Debugbar::info($request);
        $image = "";
        \DB::beginTransaction();

        try {

            if ($request->hasFile('logo')) {
                $image = \Storage::putFile('public/uploads', $request->file('logo'), 'public');
            }

            $service = Service::create([
                        'titre' => $request->get('titre'),
                        'description' => $request->get('description'),
                        'categoriesservice_id' => $request->get('categorie'),
                        'ville_id' => $request->get('ville'),
                        'categoriesservice_id' => $request->get('categorie'),
                        'categoriesservice_id' => $request->get('categorie'),
                        'facebook_url' => $request->get('facebook_url'),
                        'twitter_url' => $request->get('twitter_url'),
                        'video_url' => $request->get('video_url'),
                        'afficher' => true,
                        'description' => $request->get('description'),
                        'logo' => $image
            ]);

            // enregistrer les offres
            $service = $this->addOffres($service, $request);

            //enregistrer les tags
            $service = $this->syncTags($service, $request);

            // enregistrer les jours ouvrables et fermetures
            $service = $this->addJoursHeures($service, $request);

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            dd($e);
            session()->flash('problem', 'Problème survenu lors de la sauvergarde du service, veuillez réessayer !');
            return redirect()->back();
        }

        session()->flash('success', 'Service bien enregistré Merci !!');
        return redirect()->back();
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
        $jours = \DB::table('jours')->select()->orderBy('id', 'asc')->get()->toArray();
        $heureouvertures = \DB::table('heureouvertures')->select()->orderBy('id', 'asc')->get()->toArray();
        $heurefermetures = \DB::table('heurefermetures')->select()->orderBy('id', 'asc')->get()->toArray();
        $categories = Categoriesservice::select()->orderBy('nom', 'asc')->get()->toArray();
        $villes = Ville::select()->orderBy('nom', 'asc')->get()->toArray();
        $tags = Tag::select()->orderBy('nom', 'asc')->get()->toArray();

        $service = Service::find($id);

        //dd($service->heureservices);
        return view("backend.services.edit-service", compact('service', 'villes', 'tags', 'categories', 'jours', 'heureouvertures', 'heurefermetures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        //dd($request->all());
        \Debugbar::info($request);
        $image = "";
        $service = Service::where('id', $id)->first();

        \DB::beginTransaction();

        try {

            if ($request->hasFile('logo')) {
                $image = \Storage::putFile('public/uploads', $request->file('logo'), 'public');
            }

            $service->update([
                'titre' => $request->get('titre'),
                'description' => $request->get('description'),
                'categoriesservice_id' => $request->get('categorie'),
                'ville_id' => $request->get('ville'),
                'categoriesservice_id' => $request->get('categorie'),
                'categoriesservice_id' => $request->get('categorie'),
                'facebook_url' => $request->get('facebook_url'),
                'twitter_url' => $request->get('twitter_url'),
                'video_url' => $request->get('video_url'),
                'afficher' => true,
                'description' => $request->get('description'),
                'logo' => $image ? $image : $service->logo
            ]);

            // enregistrer les offres
            $this->addOffres($service, $request);

            //enregistrer les tags
            $this->syncTags($service, $request);

            // enregistrer les jours ouvrables et fermetures
            $this->addJoursHeures($service, $request);

            \DB::commit();
        } catch (\Exception $e) {
            \DB::rollback();
            dd($e);
            session()->flash('problem', 'Problème survenu lors de la mise à jour du service, veuillez réessayer !');
            return redirect()->back();
        }

        session()->flash('success', 'Mise à jour  bien enregistré Merci !!');
        return redirect()->back();
    }

    public function delete(Request $request, $id) {
        return response()->json($this->destroy($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $nbreRelation = Commande::leftJoin('services',
                        'services.id', '=',
                        'commandes.service_id')
                ->where('service_id', $id)
                ->count();

        \Debugbar::info($nbreRelation);

        if ($nbreRelation != 0) {
            return "impossible";
        } else {
            $cat = Service::find($id);
            return $cat->delete();
        }
    }

    public function data(Request $request) {
        $services = \DB::table('services')->select([
            'services.id as id', 'services.titre as titre', 'services.afficher as afficher', 'services.logo as logo', 'services.description as description', 'services.created_at as created_at'
        ]);

        $datatables = DataTables::of($services)
                ->addColumn('action', function ($model) {
                    $edit = route('service.edit',$model->id);
                    $url_edit = '<a href=":url" class="green update" ><i class="ace-icon fa fa-pencil bigger-130"></i></a>';
                    $delete = '<a data-id=":id" class="red delete"><i class="ace-icon fa fa-trash-o bigger-130 "></i></a>';
                    $edit = str_replace(":url",$edit,$url_edit);
                    $del = str_replace(":id", $model->id, $delete);
                    //$url_edit = str_replace(":id", $edit, $url_edit);
                    $action = '<div class="hidden-sm hidden-xs action-buttons">&nbsp;' . $edit . '&nbsp;' . $del . '</div>';
                    return $action;
                })->editColumn('logo', function ($model) {
                    $image = url('/storage/' . $model->logo);
                    return $model->logo ? $image : '';
                })->editColumn('afficher', function ($model) {

                    $val = $model->afficher ? "Oui" : "Non";
                    //$afficher = '<a data-id=":id" class="badge badge-success desactiver">' . $val . '</a>';
                    //$aff = str_replace(":id", $model->id, $afficher);
                    return $val;
                })
                ->editColumn('created_at', function ($model) {
            return $model->created_at ? with(new Carbon($model->created_at))->format('d/m/Y') : '';
        });
        // les filtres 
        // Global search function
        if ($keyword = $request->get('search')['value']) {
            //Debugbar::info($keyword);
            // override services.name global search
            $datatables->filterColumn('titre', function ($query, $keyword) {
                $query->where('services.titre', 'like', "%" . $keyword . "%");
            });

            $datatables->filterColumn('created_at', function ($query, $keyword) {
                $query->whereRaw("DATE_FORMAT(created_at,'%d/%m/%Y') like ?", ["%$keyword%"]);
            });
        }
        return $datatables->make(true);
    }

    public function findinfo($id) {
        $cat = Service::find($id);

        return response()->json($cat);
    }

    public function desactiver($id) {
        $cat = Service::find($id);

        $updatescat = [
            'afficher' => !$cat->afficher,
        ];
        $cat->update($updatescat);

        return response()->json($cat);
    }

    //Permet de créer des tags dynamiquement après les avoir crées au niveau du formulaire en utilisant select2
    public function syncTags($service, $request) {
        if (!$request->has('tags')) {
            $service->tags()->detach();
            return;
        }

        $allTagIds = array();

        foreach ($request->tags as $tagId) {
            if (substr($tagId, 0, 4) == 'new:') {
                $newTag = Tag::create(['nom' => substr($tagId, 4)]);
                $allTagIds[] = $newTag->id;
                continue;
            }
            $allTagIds[] = $tagId;
        }

        $service->tags()->sync($allTagIds);
    }

    public function addOffres($service, $request) {
        if (
                isset($request->nomoffres) && is_array($request->nomoffres) &&
                isset($request->descriptionoffres) && is_array($request->descriptionoffres) &&
                isset($request->prixoffres) && is_array($request->prixoffres) &&
                isset($request->reductionoffres) && is_array($request->reductionoffres)
        ) {


            $nomoffres = $request->nomoffres;
            $descriptionoffres = $request->descriptionoffres;
            $prixoffres = $request->prixoffres;
            $reductions = $request->reductionoffres;
            //dd($reductions);
            $taille = count($nomoffres);
            /**
              if (count($reductions) < $taille) {
              $c = count($reductions) - 1;
              for ($i = $c; $i < $taille; $i++) {
              array_push($reductions, 0);
              }
              }* */
            //dd($reductions);
            if (!$request->isMethod('post')) {
                //id offres from form
                $idoffres = array_filter($request->idoffres);
                //id offres from BD
                //dd($idoffres);
                $offresdel = [];
                $idsoffresdb = \DB::table('offres')->select('id')->where('service_id', "=", $service->id)->get()->toArray();

                for ($i = 0; $i < count($idsoffresdb); $i++) {
                    $offresdel[] = $idsoffresdb[$i]->id;
                }
                //dd($offresdel);
                // offres supprimer par utilisateur
                $idtodelete = array_diff($offresdel, $idoffres);
                if (count($idtodelete) != 0) {
                    Offre::destroy($idtodelete);
                }

                for ($i = 0; $i < $taille; $i++) {
                    if (isset($idoffres[$i])) {
                        $service->offres()->update([
                            'titre' => $nomoffres[$i],
                            'description' => $descriptionoffres [$i],
                            'prix' => $prixoffres[$i],
                            //'prix' => $prixoffres[$i]-(($prixoffres[$i]*$reductions[$i])/100),
                            'reduction' => count($reductions) != 0 ? $reductions[$i] : 0,
                        ]);
                    } else {
                        Offre::create([
                            'titre' => $nomoffres[$i],
                            'description' => $descriptionoffres [$i],
                            'prix' => $prixoffres[$i],
                            //'prix' => $prixoffres[$i]-(($prixoffres[$i]*$reductions[$i])/100),
                            'reduction' => count($reductions) != 0 ? $reductions[$i] ? $reductions[$i] : 0 : 0,
                            'service_id' => $service->id,
                        ]);
                    }
                }
            } else {
                for ($i = 0; $i < $taille; $i++) {
                    Offre::create([
                        'titre' => $nomoffres[$i],
                        'description' => $descriptionoffres [$i],
                        'prix' => $prixoffres[$i],
                        'reduction' => count($reductions) != 0 ? $reductions[$i] : 0,
                        'service_id' => $service->id,
                    ]);
                }
            }
        }
    }

    public function addJoursHeures($service, $request) {
        if (
                isset($request->jours) && is_array($request->jours) &&
                isset($request->heureouvertures) && is_array($request->heureouvertures) &&
                isset($request->heurefermetures) && is_array($request->heurefermetures)
        ) {


            $jours = $request->jours;
            $heureouvertures = $request->heureouvertures;
            $heurefermetures = $request->heurefermetures;
            $taille = count($jours);
            if (!$request->isMethod('post')) {
                for ($i = 0; $i < $taille; $i++) {
                    HeureService::updateOrCreate(
                            ['jour_id' => $jours[$i],
                                'service_id' => $service->id,
                                'heureouverture_id' => $heureouvertures[$i],
                                'heurefermeture_id' => $heurefermetures[$i]
                            ],
                            [
                                'jour_id' => $jours[$i],
                                'service_id' => $service->id,
                                'heureouverture_id' => $heureouvertures[$i],
                                'heurefermeture_id' => $heurefermetures[$i],
                    ]);
                }
            } else {
                //dd($service);
                for ($i = 0; $i < $taille; $i++) {
                    \DB::table('service_heure')->insert([
                        'jour_id' => $jours[$i],
                        'service_id' => $service->id,
                        'heureouverture_id' => $heureouvertures[$i],
                        'heurefermeture_id' => $heurefermetures[$i],
                    ]);
                }
            }
        }
    }

}

?>