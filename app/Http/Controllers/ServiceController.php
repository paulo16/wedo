<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use App\Service;
use App\Ville;
use App\Categoriesservice;
use App\Offre;

class ServiceController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return view("backend.services.add-service");
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
            session()->flash('problem', 'Problème survenu lors de la sauvergarde du service, veueillz réessayer !');
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        
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

        return $service;
    }

    public function addOffres($service, $request) {
        if (
                isset($request->nomoffres) && is_array($request->nomoffres) &&
                isset($request->descriptionoffres) && is_array($request->descriptionoffres) &&
                isset($request->prixoffres) && is_array($request->prixoffres) &&
                isset($request->reductionoffres) && is_array($request->reductionoffres)
        ) {


            $nomoffres = array_filter($request->nomoffres);
            $descriptionoffres = array_filter($request->descriptionoffres);
            $prixoffres = array_filter($request->prixoffres);
            $reductions = array_filter($request->reductionoffres);
            $taille = count($nomoffres);


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

        return $service;
    }

    public function addJoursHeures($service, $request) {
        if (
                isset($request->jours) && is_array($request->jours) &&
                isset($request->heureouvertures) && is_array($request->heureouvertures) &&
                isset($request->heurefermetures) && is_array($request->heurefermetures)
        ) {


            $jours = array_filter($request->jours);
            $heureouvertures = array_filter($request->heureouvertures);
            $heurefermetures = array_filter($request->heurefermetures);
            $taille = count($jours);

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

        return $service;
    }

}

?>