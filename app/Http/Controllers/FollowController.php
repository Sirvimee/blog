<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Http\Requests\StoreFollowRequest;
use App\Http\Requests\UpdateFollowRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
   public function follow(User $user){
       $follow = Auth::user()->follows()->where('user_id', $user->id)->first();
       if($follow){
           Auth::user()->follows()->detach($user);
       } else {
           Auth::user()->follows()->attach($user);
       }

       return redirect()->back();
   }
}
