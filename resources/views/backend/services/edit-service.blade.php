@extends('backend.default')

@section('head')
<title>wedo | services</title>
@endsection

@section('content')
<!-- Service Content -->
<div>
    @if (Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li><b>{{ Session::get('success') }}</b></li>
        </ul>
    </div>
    @endif
    @if (Session::has('problem'))
    <div class="alert alert-danger">
        <ul>
            <li><b>{{ Session::get('problem') }}</b></li>
        </ul>
    </div>
    @endif
    <form class="dash-profile-form" method="post" action="{{route('service.update',$service)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h4><i class="ti-headphone"></i> Mettre à jour un service</h4>
            </div>

            <div class="tr-single-body">
                <div class="form-group">
                    <label>Titre</label>
                    <input required name="titre" value="{{ old('titre',$service->titre) }}" id="titre" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>Description Courte</label>
                    <input required name="description" value="{{ old('description',$service->description) }}" id="description" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>Catégorie</label>
                    <select class="form-control" name="categorie" id="categorie" required>
                        @foreach ($categories as $p)
                        <option value="{{$p['id']}}" @if($p['id'] == $service->category->id) selected="selected" @endif>
                            {{$p['nom']}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Image de Couverture</label>
                    <input @if($service->logo) data-default-file="{{URL::asset('storage/'.$service->logo)}}" @endif type="file" id="logo" name="logo" class="dropify"
                    data-max-file-size="2M"/>
                </div>
                <div class="form-group">
                    <label>Ville où le service est offert</label>
                    <select class="form-control" name="ville" id="ville" required>
                        @foreach ($villes as $p)
                        <option value="{{$p['id']}}" @if($p['id'] == $service->ville->id) selected="selected" @endif>
                            {{$p['nom']}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tags</label>
                    <select class="form-control" id="tags" name="tags[]" multiple="multiple" required>
                        @foreach ($tags as $p)
                        <option value="{{$p['id']}}" 
                                @foreach ($service->tags as $tag)
                            @if($p['id'] == $tag->id)
                            selected="selected"
                            @break
                            @endif
                            @endforeach
                            >
                            {{$p['nom']}}
                        </option>

                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>facebook url</label>
                    <input name="facebook_url" value="{{ old('facebook_url',$service->facebook_url) }}" id="facebook_url" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>twitter url</label>
                    <input name="twitter_url" value="{{ old('twitter_url',$service->twitter_url) }}" id="twitter_url" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>video url</label>
                    <input name="video_url" value="{{ old('video_url',$service->video_url) }}"  id="video_url" class="form-control" type="text">
                </div>
                <div style=" margin-top:2px;margin-right:5px;margin-bottom:2em;margin-left:0;">
                    <button class="add_field_button btn btn-primary">Cliquer ici pour ajouter des offres</button>
                    <br>
                </div>
                <div class="input_fields_wrap">

                </div>
            </div>

        </div>
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h4><i class="ti-alarm-clock"></i> Jours Ouvrables</h4>
            </div>

            <!-- Jours --->
            <div class="tr-single-body">
                <div class="form-group">
                    @foreach ($jours as $jour)
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4">
                            <select  id="jours" name="jours[]" class="form-control" required>
                                @foreach ($jours as $p1)
                                @if ($p1->nom ==  $jour->nom)
                                <option value="{{$p1->id}}" selected>
                                    {{$p1->nom}}
                                </option>

                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <select  id="heureouvertures" name="heureouvertures[]" class="form-control chosen-select" required>
                                @foreach ($heureouvertures as $p)
                                <option value="{{$p->id}}" 
                                        @foreach ($service->heureservices as $heure)
                                    @if(($p->id == $heure->heureouverture_id) && ($heure->jour_id == $jour->id))
                                    selected="selected"
                                    @break
                                    @endif
                                    @endforeach
                                    >
                                    {{$p->nom}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <select  id="heurefermetures" name="heurefermetures[]" class="form-control chosen-select" required>
                                @foreach ($heurefermetures as $p)
                                <option value="{{$p->id}}" 
                                        @foreach ($service->heureservices as $heure)
                                    @if($p->id == $heure->heurefermeture_id && $heure->jour_id == $jour->id)
                                    selected="selected"
                                    @break
                                    @endif
                                    @endforeach
                                    >
                                    {{$p->nom}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary full-width mb-4">Save Changes</button>

    </form>
</div>
@stop
@section('js')

<script>
    $(document).ready(function () {
        //Listes des offres
        var offres = @json($service->offres);
        var Maxoffre =5
        var nombreoffresrestant = Maxoffre - offres.length
        //Permet d'ajouter les offres
        addoffres(nombreoffresrestant,Maxoffre);
        //console.log(offres.length);
        
        //Afficher les offres
        getoffres(offres);
          
        // Select2 pour les Tags 
        $('#tags').select2({
            placeholder: "Sélectionner ou créer un Tag",
            tags: true,
            tokenSeparators: [",", " "],
            createTag: function (newTag) {
                return {
                    id: 'new:' + newTag.term,
                    text: newTag.term + ' (new)'
                };
            }
        })
    });

    // Permet de créer des formulaires d'offres de façon dynamique 
    function addoffres(nombreoffresrestant,Maxoffre) {
        var max_fields = nombreoffresrestant; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = Maxoffre-nombreoffresrestant //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < Maxoffre) { //max input box allowed
                x++; //text box increment
                $(wrapper).append(`
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h3><i class="lni-lock"></i> OFFRE ` + x + `</h3>
                        </div>
                        <div class="tr-single-body">
                            <input type="hidden" class="form-control"  type="text" name="idoffres[]">
                            <div class="form-group">
                                <label>Titre offre</label>
                                <input placeholder="titre" required class="form-control"  type="text" name="nomoffres[]">
                            </div> 
                            <div class="form-group">
                                <label>Description offre</label>
                                <input placeholder="description" required class="form-control"  type="text" name="descriptionoffres[]">
                            </div>
                            <div class="form-group">
                                <label>Prix offre (DH)</label>
                                <input placeholder="prix" required class="form-control"  type="number" name="prixoffres[]">
                            </div>
                            <div class="form-group">
                                <label>Réduction % </label>
                                <input required placeholder="réduction,en pourcentage exemple : 2 ,ce qui donnera 2%" class="form-control"  type="number" name="reductionoffres[]">
                            </div>
                            <a  href="javascript:void(0);" class="remove_field btn btn-danger">supprimer offre ` + x + `</a>
                        </div>
                    </div>`);
            }
        });

        $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
        });

    }

    // Permet de récuperer les offres existants et de les afficher
    function getoffres(offres) {
        var wrapper = $(".input_fields_wrap"); //Fields wrapper


        var x = 0; //initlal text box count
        if (offres.length != 0) {
            offres.forEach(function (offre) {
                x++; //text box increment
                $(wrapper).append(`
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h3><i class="lni-lock"></i> OFFRE ` + x + `</h3>
                        </div>
                        <div class="tr-single-body">
                            <input type="hidden" class="form-control" value="` + offre.id + `" type="text" name="idoffres[]">
                            <div class="form-group">
                                <label>Titre offre</label>
                                <input required placeholder="titre" class="form-control"  value="` + offre.titre + `" type="text" name="nomoffres[]">
                            </div> 
                            <div class="form-group">
                                <label>Description offre</label>
                                <input required placeholder="description" class="form-control" value="` + offre.description + `" type="text" name="descriptionoffres[]">
                            </div>
                            <div class="form-group">
                                <label>Prix offre (DH)</label>
                                <input placeholder="prix" class="form-control" value="` + offre.prix + `" type="number" name="prixoffres[]">
                            </div>
                            <div class="form-group">
                                <label>Réduction % </label>
                                <input required  placeholder="réduction,en pourcentage exemple : 2 ,ce qui donnera 2%" value="` + offre.reduction + `"  class="form-control" value="0" type="number" name="reductionoffres[]">
                            </div>
                            <a  href="javascript:void(0);" class="remove_field btn btn-danger">supprimer offre ` + x + `</a>
                        </div>
                    </div>`);
            });

            $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').parent('div').remove();
                x--;
            });
        }

    }

</script>
@endsection