<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;

class UserController extends Controller
{
    //
    public function profile(){
		return view('profile', array('profile' => Auth::user()) );
		
    }

    public function update_avatar(Request $request){
		
    	// Handle the user upload of avatar
    	if($request->hasFile('avatar')){
			$avatar = $request->file('avatar');
			
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			$avatar->move(public_path('/image/avatars/'), $filename);
    		//Image::make($avatar)->resize(300, 300)->save( public_path('/image/avatars/' . $filename ) );

    		$user = Auth::user();
    		$user->avatar = $filename;
    		$user->save();
    	}

    	return view('profile', array('profile' => Auth::user()) );

    }
}
