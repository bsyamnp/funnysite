<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Fotballist;
use App\Models\Role;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Models\Club;
use Illuminate\Support\Facades\Auth;

class ClubController extends Controller
{

    public function index(){

        $allClubs= Club::all();
        $categories = Category::all();
        return view('clubs.index', ['clubs' => $allClubs , 'categories' => $categories]);
    }

    public function create()
    {
        $this->authorize('create',Club::class);

        return view('clubs.create' , ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {
        $this->authorize('create',Club::class);
        $validated=$request->validate([
            'image'=>'required|image|:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'name'=>'required',
            'name_kz'=>'required',
            'name_en'=>'required',
            'country'=>'required',
            'country_kz'=>'required',
            'country_en'=>'required',
            'stadium'=>'required',
            'stadium_kz'=>'required',
            'stadium_en'=>'required',
            'trophies'=>'required',
            'cost'=>'required',
            'category_id'=>'required|numeric|exists:categories,id',
        ]);
        $fileName=time().$request->file('image')->getClientOriginalName();
        $image_path=$request->file('image')->storeAs('clubs',$fileName,'public');
        $validated['image']='/storage/'.$image_path;
        Auth::user()->clubs()->create($validated);
        return redirect()->route('clubs.index')->with('create','Post saved');
    }

    public function edit(Club $club)
    {
        $this->authorize('edit',$club);
        return view('clubs.edit',['club' => $club , 'categories' => Category::all()]);
    }
    public function update(Request $request, Club $club)
    {
        $validated=$request->validate([
            'image'=>'required|image|:jpg,png,jpeg,gif,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            'name'=>'required',
            'name_kz'=>'required',
            'name_en'=>'required',
            'country'=>'required',
            'country_kz'=>'required',
            'country_en'=>'required',
            'stadium'=>'required',
            'stadium_kz'=>'required',
            'stadium_en'=>'required',
            'trophies'=>'required',
            'cost'=>'required',
            'category_id'=>'required|numeric|exists:categories,id',
        ]);
        $fileName=time().$request->file('image')->getClientOriginalName();
        $image_path=$request->file('image')->storeAs('clubs',$fileName,'public');
        $validated['image']='/storage/'.$image_path;
        $club->update($validated);
        return redirect()->route('clubs.index')->with('update','Post saved');
    }
    public function destroy(Club $club)
    {
        $this->authorize('delete',$club);
        $club->delete();
        return redirect()->route('clubs.index')->with('delete','the post has been deleted');
    }
    public function clubByCat(Category $category)
    {
        $clubs=$category->clubs;
        $allCategories = Category::all();
        return view('clubs.index', ['clubs' => $clubs, 'categories' => $allCategories]);
    }
}
