@extends('backend.default')

@section('head')
<title>wedo | Devis</title>
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


    <form class="dash-profile-form" method="post" action="{{route('service.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h4><i class="ti-headphone"></i> créer un service</h4>
            </div>

            <div class="tr-single-body">
                <div class="form-group">
                    <label>Titre</label>
                    <input name="titre" id="titre" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>Description Courte</label>
                    <input name="description" id="description" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>Catégorie</label>
                    <select class="form-control" name="categorie" id="categorie">
                        @foreach ($categories as $p)
                        <option value="{{$p['id']}}">
                            {{$p['nom']}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Image de Couverture</label>
                    <input class="form-control dropify" name="logo" id="logo" type="file">
                </div>
                <div class="form-group">
                    <label>Ville où le service est offert</label>
                    <select class="form-control" name="ville" id="ville">
                        @foreach ($villes as $p)
                        <option value="{{$p['id']}}">
                            {{$p['nom']}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Tags</label>
                    <select class="form-control" id="tags" name="tags[]" multiple="multiple">
                        @foreach ($tags as $p)
                        <option value="{{$p['id']}}">
                            {{$p['nom']}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>facebook url</label>
                    <input name="facebook_url" id="facebook_url" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>twitter url</label>
                    <input name="twitter_url" id="twitter_url" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>video url</label>
                    <input name="video_url" id="video_url" class="form-control" type="text">
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
                <h4><i class="ti-alarm-clock"></i> Business hour</h4>
            </div>

            <!-- Jours --->
            <div class="tr-single-body">
                <div class="form-group">
                    @foreach ($jours as $jour)
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-md-4">
                            <select id="jours" name="jours[]" class="form-control">
                                @foreach ($jours as $p1)
                                @if ($p1->nom == $jour->nom)
                                <option value="{{$p1->id}}" selected>
                                    {{$p1->nom}}
                                </option>

                                @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <select id="heureouvertures" name="heureouvertures[]" class="form-control chosen-select">
                                @foreach ($heureouvertures as $p)
                                <option value="{{$p->id}}">
                                    {{$p->nom}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <select id="heurefermetures" name="heurefermetures[]" class="form-control chosen-select">
                                @foreach ($heureouvertures as $p)
                                <option value="{{$p->id}}">
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
        addoffres();
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
    function addoffres() {
        var max_fields = 5; //maximum input boxes allowed
        var wrapper = $(".input_fields_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 0; //initlal text box count
        $(add_button).click(function (e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append(`
                    <div class="tr-single-box">
                        <div class="tr-single-header">
                            <h3><i class="lni-lock"></i> OFFRE ` + x + `</h3>
                        </div>
                        <div class="tr-single-body">
                            <div class="form-group">
                                <label>Titre offre</label>
                                <input placeholder="titre" class="form-control"  type="text" name="nomoffres[]">
                            </div>
                            <div class="form-group">
                                <label>Description offre</label>
                                <input placeholder="description" class="form-control"  type="text" name="descriptionoffres[]">
                            </div>
                            <div class="form-group">
                                <label>Prix offre (DH)</label>
                                <input placeholder="prix" class="form-control"  type="number" name="prixoffres[]">
                            </div>
                            <div class="form-group">
                                <label>Réduction % </label>
                                <input placeholder="réduction,en pourcentage exemple : 2 ,ce qui donnera 2%" class="form-control" value="0" type="number" name="reductionoffres[]">
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

</script>
@endsection