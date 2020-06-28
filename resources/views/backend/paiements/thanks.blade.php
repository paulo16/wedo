@extends('backend.default')

@section('head')
<title>wedo | Payement</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
<!-- Service Content -->
<div class="row">


    <div class="tr-single-box">

        <div class="tr-single-header">
            <h3><i class="ti-receipt"></i> MERCI</h3>
            <hr>
            <br>
        </div>
        <div class="tr-single-body">
            <div class="alert alert-success" role="alert"> Merci de votre visite</div>
        </div>
    </div>


</div>
@stop