<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{

    public function upBalance()
    {
        return view('shops.balance');
    }

    public function balanceStore(Request $request)
    {
        Auth::user()->update([
            'balance' => Auth::user()->balance + $request->input('balance'), 'required|numeric',
        ]);
        return redirect()->route('clubs.index')->with('balanceup', 'You have successfully replenished the balance!!');
    }


}

