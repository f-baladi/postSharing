<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTagRequest;
use App\Http\Requests\UpdateTagRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(5);
        return view('tag.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        $tag = Tag::create([
            'user_id' => auth()->user()->id,
            'title' => $request->title,
        ]);
        return redirect()->route('tags.myTags')->with('status', 'تگ با موفقیت اضافه شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        $posts = $tag->posts()->paginate(5);
        return view('tag.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        if ($tag->user_id != Auth::id())
            return redirect()->back()->with('status', 'شما اجازه دسترسی یه این صفحه را ندارید');

        else
        return view('tag.edit', compact( 'tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, Tag $tag)
    {
        if ($tag->user_id != Auth::id())
            return redirect()->back()->with('status', 'شما اجازه دسترسی یه این صفحه را ندارید');

        $tag->update($request->validated());

        return redirect()->action('TagController@myTags')
            ->With('status', 'تگ با موفقیت بروزرسانی شد.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if ($tag->user_id != Auth::id())
            return redirect()->back()->with('status', 'شما اجازه دسترسی یه این صفحه را ندارید');

        $tag->delete();
        return redirect()->back()->with('status', 'تگ با موفقیت حذف شد.');
    }

    public function myTags()
    {
        $tags = auth()->user()->tags()->paginate(5);
        return view('tag.myTags', compact('tags'));
    }
}
