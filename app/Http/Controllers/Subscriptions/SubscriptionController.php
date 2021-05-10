<?php

namespace App\Http\Controllers\Subscriptions;


use App\Models\User;
use App\Models\Plans;
use Illuminate\Http\Request;
use Laravel\Cashier\Subscription;
use App\Http\Controllers\Controller;


class SubscriptionController extends Controller
{
    public function index() {
        $plans = Plans::get();

       



        return view('subscriptions.plans', compact('plans'));
    }
    
}

/*
Auth::user()->subscribed('default');  //Check if user is subscribed
Auth::user()->subscription('main')->onGracePeriod(); //cancelled but current subscription has not ende
Auth::user()->onPlan('bronze'); //check which plan.
Auth::user()->subscription('default')->cancelled(); //user earlier had a sibscription but cancelled (and no longer on grace period)

https://medium.com/fabcoding/laravel-7-create-a-subscription-system-using-cashier-stripe-77cdf5c8ea5d
*/