<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PublishPostController extends Controller
{
    public function publish(Request $request, Post $post)
    {
        $post->update([
            'status' => true,
        ]);

        return redirect()->back()->with('status', 'وضعیت پست شما به حالت انتشار تغییر کرد.');
    }

    public function draft(Request $request, Post $post)
    {
        $post->update([
            'status' => false,
        ]);

        return redirect()->back()->with('status', 'وضعیت پست شما به حالت پیش نویس تغییر کرد.');
    }
}
