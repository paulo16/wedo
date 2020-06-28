@extends('backend.default')

@section('head')
<title>wedo | Payement</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')
<!-- Service Content -->
<div>
    @if(Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li><b>{{ Session::get('success') }}</b></li>
        </ul>
    </div>
    @endif
    @if(Session::has('problem'))
    <div class="alert alert-danger">
        <ul>
            <li><b>{{ Session::get('problem') }}</b></li>
        </ul>
    </div>
    @endif


    <div class="tr-single-box">

        <div class="tr-single-header">
            <h3><i class="ti-receipt"></i> Faites Votre Payement</h3>
            <hr>
            <br>
        </div>
        <div class="tr-single-body">
            <h3>Paiement de : {{$amount}}&nbsp;{{$currency}}</h3>
            <form id="payment-form" class="my-4" method="post" action="{{ route('paiement.store') }}">
                @csrf
                <col-md-6>
                    <i class="icon-remove"></i>
                    <div id="card-element">
                        <!-- Elements will create input elements here -->
                    </div>
                </col-md-6>
                <!-- We'll put the error messages in this element -->
                <div id="card-errors" role="alert"></div>
                <col-md-6>
                    <button type="submit" id="submit" class="btn btn-success full-width mt-4">Effectuer Paiement</button>
                </col-md-6>

            </form>
        </div>

    </div>

</div>
@stop
@section('js')

<script>
    // Set your publishable key: remember to change this to your live publishable key in production
    // See your keys here: https://dashboard.stripe.com/account/apikeys
    var stripe = Stripe('{{config("services.stripe.key")}}');
    var elements = stripe.elements({
        locale: 'fr'
    });
    var style = {
        base: {
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: "antialiased",
            fontSize: "18px",
            "::placeholder": {
                color: "#aab7c4"
            }
        },
        invalid: {
            color: "#fa755a",
            iconColor: "#fa755a"
        }
    };

    var card = elements.create("card", {
        style: style
    });
    card.mount("#card-element");

    card.on('change', ({
        error
    }) => {
        const displayError = document.getElementById('card-errors');
        if (error) {
            displayError.textContent = error.message;
        } else {
            displayError.textContent = '';
        }
    });

    //submission card 
    //var form = document.getElementById('payment-form');
    var submitButton = document.getElementById('submit');

    submitButton.addEventListener('click', function(ev) {
        ev.preventDefault();
        submitButton.disabled = true;
        stripe.confirmCardPayment("{{$clientSecret}}", {
            payment_method: {
                card: card,
                billing_details: {
                    name: 'Jenny Rosen'
                }
            }
        }).then(function(result) {
            if (result.error) {
                // Show error to your customer (e.g., insufficient funds)
                console.log(result.error.message);
                submitButton.disabled = false;
            } else {
                // The payment has been processed!
                if (result.paymentIntent.status === 'succeeded') {
                    var paymentIntent = result.paymentIntent;
                    // Show a success message to your customer
                    // There's a risk of the customer closing the window before callback
                    // execution. Set up a webhook or plugin to listen for the
                    // payment_intent.succeeded event that handles any business critical
                    // post-payment actions.
                    var form = document.getElementById('payment-form');
                    var token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    var url = form.action;
                    var redirect = "{!! route('paiement.thanks')!!}";
                    //console.log(result.paymentIntent);
                    fetch(
                        url, {
                            headers: {
                                "Content-Type": "application/json",
                                "Accept": "application/json,text-plain,*/*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token

                            },
                            method: 'post',
                            body: JSON.stringify({
                                paymentIntent: paymentIntent

                            })
                        }).then((data) => {
                        console.log(data)
                        window.location.href = redirect
                    }).catch((error) => {
                        console.log(error)
                    })

                }
            }
        });
    });
</script>
@endsection