<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);
        return view('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $category = Category::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
        ]);
        $fileName = str::random(5) .' '. $request->imageTitle;
        $path = $request->file('image')->storePublicly('images');
        $category->image()->create([
            'title' => $fileName,
            'path' => $path,
        ]);

        return redirect()->route('categories.myCategories')->with('status', 'دسته بندی با موفقیت اضافه شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $posts = $category->posts()->paginate(5);
        return view('category.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if ($category->user_id != Auth::id())
            return redirect()->back()->with('status', 'شما اجازه دسترسی یه این صفحه را ندارید');

        else
            return view('category.edit', compact( 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if ($category->user_id != Auth::id())
            return redirect()->back()->with('status', 'شما اجازه دسترسی یه این صفحه را ندارید');

        $category->delete();
        return redirect()->back()->with('status', 'دسته بندی با موفقیت حذف شد.');
    }

    public function myCategories()
    {
        $categories = auth()->user()->categories()->paginate(5);
        return view('category.myCategories', compact('categories'));
    }
}
