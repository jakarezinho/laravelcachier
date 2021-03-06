<?php

namespace App\Http\Controllers\Subscriptions;

use App\Models\Plans;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    public function index() {
        $data = [
            'intent' => auth()->user()->createSetupIntent()
        ];

        return view('subscriptions.payment')->with($data);


    }

 


    public function store(Request $request) {
        $this->validate($request, [
            'token' => 'required'
        ]);

        $plan = Plans::where('identifier', $request->plan)
            ->orWhere('identifier', 'basic')
            ->first();

            $request->user()->newSubscription('default', $plan->stripe_id)->create($request->token);

            return back();
        }
    }