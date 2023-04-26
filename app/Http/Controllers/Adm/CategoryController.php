<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('adm.category.index', [ 'categories' => $categories]);
    }

    public function create()
    {
        $this->authorize('create',Category::class);
        return view('adm.category.create' , ['categories' => Category::all()]);
    }
    public function createe()
    {
        $this->authorize('create',Category::class);
        return view('clubs.category' , ['categories' => Category::all()]);
    }

    public function store(Request $request)
    {

        $validated=$request->validate([
            'name'=>'required',
            'name_kz'=>'required',
            'name_en'=>'required',
            'code'=>'required',
        ]);

        Category::create($validated);
        return redirect()->route('adm.category.index',['categories' => Category::all()])->with('create','Post saved');
    }


    public function delete(Category $category)
    {
        $this->authorize('delete',$category);
        $category->delete();
        return redirect()->route('adm.category.index')->with('delete','the post has been deleted');
    }
}
