<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ActiveUserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, User $user)
    {
//        dd($request->all());
        $user->update([
            'isActive' => !$user->isActive,
        ]);

//        dd($user);

        return redirect()->route('admin.users.index');

//        return response()->json([
//            'success' => true,
//            'data' => $user->toArray()
//        ]);
    }
}
