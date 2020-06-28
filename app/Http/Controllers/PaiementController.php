<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\PaymentIntent;
use Stripe\Stripe;
use Illuminate\Support\Arr;
use App\Paiement;
use Illuminate\Support\Facades\Auth;

class PaiementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Set your secret key. Remember to switch to your live secret key in production!
        // See your keys here: https://dashboard.stripe.com/account/apikeys
        Stripe::setApiKey(config('services.stripe.secret'));

        $montantapayer = 1200;
        $intent = PaymentIntent::create([
            'amount' => $montantapayer,
            'currency' => 'eur',
            // Verify your integration in this guide by including this parameter
            'metadata' => ['integration_check' => 'accept_a_payment'],
        ]);

        //dd($intent);
        $clientSecret = Arr::get($intent, 'client_secret');
        $amount = Arr::get($intent, 'amount');
        $currency = Arr::get($intent, 'currency');
        //dd($intent);

        return view("backend.paiements.index-paiement", compact('clientSecret', 'amount', 'currency'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {;
        $paiement = $request->get('paymentIntent');
        \Debugbar::info($paiement['id']);
        Paiement::create([
            'user_id' => \Auth::user()->id,
            'paiement_id' => $paiement['id'],
            'montant' => $paiement['amount'],
        ]);

        $data =  $paiement['status'];


        return json_encode($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
    }

    public function thanks()
    {

        return view('backend.paiements.thanks');
    }
}
