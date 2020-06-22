@extends('backend.default')

@section('head')
<title>wedo | add</title>
@endsection

@section('content')
<div >
    <form action="{{route('user.store')}}" method="post" class="dash-profile-form">

          {{ csrf_field() }}
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h4><i class="ti-headphone"></i> Utilisateur</h4>
            </div>

            <div class="tr-single-body">
                <div class="form-group">
                    <label>Nom</label>
                    <input  name="nom" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>Prénom</label>
                    <input name="prenom" class="form-control" type="text">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" class="form-control" type="email">
                </div>

                <div class="form-group">
                    <label>Mobile No.</label>
                    <input name="telephone"  class="form-control" type="text">
                </div>
            </div>

        </div>

        <!-- Change Password -->
        <div class="tr-single-box">

            <div class="tr-single-body">
                <div class="form-group">
                    <label>Nouveau Password</label>
                    <input class="form-control" type="password">
                </div>
                <div class="form-group">
                    <label>Confirmer Password</label>
                    <input class="form-control" type="password">
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary full-width mb-4">Enregistrer</button>

    </form>
</div>
@stop