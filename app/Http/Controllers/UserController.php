<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;

class UserController extends Controller
{
    //
    public function showProfile(){
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

    public function editProfile(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->save();
        return redirect('profil');
    }

    public function changePassword(Request $request)
    {
        $user = Auth::user();
        if(Hash::make($request->oldpass) != $user->password || $request->newpass != $request->newpassconfirm){
            return redirect ('profil');
        }
        $user->password = Hash::make($request->newpass);
        $user->save();
        return redirect ('profil');
    }
}
