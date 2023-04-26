<?php

namespace App\Http\Controllers;

use App\Models\Shop;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
public function buy(Shop $shop){

    $pri =Auth::user()->shopsWithStatus('in_cart')->get();
      $sum=0;

        foreach ($pri as $pr) {
            $sum += $pr->pivot->number * $pr->price;
        }

    if(Auth::user()->balance >= $sum) {
        $ids =Auth::user()->shopsWithStatus('in_cart')->get();
        foreach ($ids as $id) {
            Auth::user()->shopsWithStatus('in_cart')->updateExistingPivot($id, ['status' => 'ordered']);
        }
    }
    if(Auth::user()->balance >= $sum) {
        Auth::user()->update([
            'balance' => Auth::user()->balance - $sum

        ]);
    }
    return back()->with('buy','Purchased');
}
public function index(){
    $shopsInCart = Auth::user()->shopsWithStatus('in_cart')->where('number', '>', 0)->get();
//    $shopsIsNull = Auth::user()->shopsWithStatus('in_cart')->where('number', '<=', 0)->get();
//    for ($i = 0; $i < count($shopsIsNull); $i++) {
//        if ($shopsIsNull[$i]->pivot->number <= 0 && $shopsIsNull[$i] != null) {
//            $this->deleteFromCart($shopsIsNull[$i]);
//            return back();
//        }
//    }

    for ($i = 0; $i < count($shopsInCart); $i++) {
        if ($shopsInCart[$i]) {
            return view('shops.korzina', ['shopsInCart' => $shopsInCart]);
        }
    }
    return view('shops.korzina',['shopsInCart' => $shopsInCart]);

}









    public function putToCart(Request $request,Shop $shop){
        $shopsInCart = Auth::user()->shopsWithStatus('in_cart')->where('shop_id',$shop->id)->first();
        if($shopsInCart!=null)
            Auth::user()->shopsWithStatus('in_cart')->updateExistingPivot($shop->id,
                ['color'=>$request->input('color'),
                'size'=>$request->input('size'),
            'number'=>$shopsInCart->pivot->number+$request->input('number')]);
        else
            Auth::user()->shopsWithStatus('in_cart')->attach($shop->id,
                ['color'=>$request->input('color'),
                    'size'=>$request->input('size'),
                    'number'=>$request->input('number')]);
return back()->with('to cart','Added to basket ');
    }

    public function deleteFromCart(Shop $shop){
        $shopsBought =Auth::user()->shopsWithStatus('in_cart')->where('shop_id',$shop->id)->first();
        if($shopsBought!=null)
            Auth::user()->shopsWithStatus('in_cart')->detach($shop->id);
        return back()->with('delete','the post has been deleted ');
    }

}
