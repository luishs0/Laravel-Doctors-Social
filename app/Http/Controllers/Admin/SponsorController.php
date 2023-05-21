<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use App\Models\User;
use Braintree\Gateway;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('Admin.Sponsors.index', compact('sponsors'));
    }

    public function show(Sponsor $sponsor)
    {
        $userSponsor = Auth::user()->sponsors;
        $activeSponsor = 0;
        foreach ($userSponsor as $userSponsor) {

            if ($userSponsor->pivot->expiration_date >= Carbon::now()) {
                $activeSponsor++;
            };
        }

        if ($activeSponsor === 0) {

            $gateway = new Gateway([
                'environment' => env('BRAINTREE_ENVIRONMENT'),
                'merchantId' => env('BRAINTREE_MERCHANT_ID'),
                'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
                'privateKey' => env('BRAINTREE_PRIVATE_KEY'),
            ]);

            $token = $gateway->clientToken()->generate();
            return view('Admin.Sponsors.show', compact('sponsor', 'token'));
        } else {
            return redirect()->back()->with('message', 'you already have an active sponsor, please wait till its over');
        }
    }
}
