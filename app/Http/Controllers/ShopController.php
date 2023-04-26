<?php

namespace App\Http\Controllers;

use App\Models\Club;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{


    public function index()
    {
        $allShops= Shop::all();
        $clubs = Club::all();
        return view('shops.index', ['shops' => $allShops , 'clubs' => $clubs]);
    }
    public function list()
    {
        $allShops= Shop::all();
        $clubs = Club::all();
        return view('adm.posts', ['shops' => $allShops , 'clubs' => $clubs]);
    }
    public function rate( Request $request ,Shop $shop){
        $request->validate([
            'rating'=>'required|min:1|max:5'
        ]);
        $shopsRated = Auth::user()->shopsRated()->where('shop_id',$shop->id)->first();

        if($shopsRated!=null){
            Auth::user()->shopsRated()->updateExistingPivot($shop->id, ['rating'=>$request->input('rating')]);
        }
        else{
            Auth::user()->shopsRated()->attach($shop->id, ['rating'=>$request->input('rating')]);
        }

        return back();
    }

    public function unrate( Request $request ,Shop $shop){

        $shopsRated = Auth::user()->shopsRated()->where('shop_id',$shop->id)->first();

        if($shopsRated!=null){
            Auth::user()->shopsRated()->detach($shop->id);
        }

        return back();
    }
    public function create()
    {
        $this->authorize('create',Shop::class);
        return view('shops.createShop',['clubs' => Club::all()]);
    }

    public function store(Request $request,)
    {
        $this->authorize('create',Shop::class);
        $validated=$request->validate([
            'url'=>'required|image|:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'name' => 'required',
            'price' => 'required',
            'club_id' => 'required',
        ]);

        $fileName=time().$request->file('url')->getClientOriginalName();
        $image_path=$request->file('url')->storeAs('shops',$fileName,'public');
        $validated['url']='/storage/'.$image_path;

        Auth::user()->shop()->create($validated);
        return redirect()->route('shops.index')->with('createshop','Post saved');
    }
    public function show(Shop $shop)
    {
        $shop->load('comments.user');
        $myRating =0;
        if(Auth::check()) {
            $shopRated = Auth::user()->shopsRated()->where('shop_id', $shop->id)->first();
            if ($shopRated != null)
                $myRating = $shopRated->pivot->rating;
        }
        $avgRating=0;
        $sum=0;
        $ratedUsers=$shop->usersRated()->get();
        foreach($ratedUsers as $ru){
            $sum+=$ru->pivot->rating;
        }
        if(count($ratedUsers)>0)
            $avgRating=$sum/count($ratedUsers);
        return view('shops.showShop',['shop' => $shop,'myRating'=>$myRating, 'avgRating'=>$avgRating]);
    }

    public function edit(Shop $shop)
    {
        $this->authorize('delete',$shop);
        return view('shops.edit',['shop' => $shop , 'clubs' => Club::all()]);
    }

    public function update(Request $request, Shop $shop)
    {
        $validated=$request->validate([
            'url'=>'required|image|:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'name' => 'required',
            'price' => 'required',
            'club_id' => 'required',
        ]);
        $fileName=time().$request->file('url')->getClientOriginalName();
        $image_path=$request->file('url')->storeAs('shops',$fileName,'public');
        $validated['url']='/storage/'.$image_path;
        $shop->update($validated);
        return redirect()->route('shops.index')->with('update','Post saved');
    }
    public function destroy(Shop $shop)
    {
        $this->authorize('delete',$shop);
        $shop->delete();
        return redirect()->route('shops.index')->with('delete','the post has been deleted');
    }
    public function shopByCat(Club $club)
    {
        $shops=$club->shops;
        $allClubs = Club::all();
        return view('shops.index', ['shops' => $shops, 'clubs' => $allClubs]);
    }
}
