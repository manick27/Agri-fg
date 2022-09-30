<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Lang;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use View;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use App\Models\Budget;
use App\Models\Withdraw;
use App\Models\Action;
use Illuminate\Support\Facades\Mail;
use App\Mail\Sendmail;


class UserController extends Controller
{

    function login(Request $request){

        return view('auth/login');
    }

    function register(Request $request){

        return view('auth/register');
    }

    function getUser(){
        if(Auth::user()){

            return view('user/user-profile');
        }
    }

    public function updateProfile(Request $request, $id) {

        $user = User::findOrFail($id);

        $this->validate($request, [
            'avatar' => 'image|max:2048',
            'cni' => 'image|max:2048',
        ]);

        if ($request->get('first_name') != null){
            $user->first_name = $request->get('first_name');
        }

        if ($request->get('last_name') != null){
            $user->last_name = $request->get('last_name');
        }

        if ($request->get('phone') != null){
            $user->phone = $request->get('phone');
        }

        if ($request->get('country') != null){
            $user->country = $request->get('country');
        }

        if ($request->file('cni') != null){
            $cni = $request->file('cni');
            $input['imagename'] = time(). '.'. $cni->getClientOriginalName();
            $destinationPath = public_path('/cni');
            $cni->move($destinationPath, $input['imagename']);
            $user->cni = $input['imagename'];
        }

        if ($request->file('avatar') != null){
            $avatar = $request->file('avatar');
            $input['imagename'] = time(). '.'. $avatar->getClientOriginalName();
            $destinationPath = public_path('/avatars');
            $avatar->move($destinationPath, $input['imagename']);
            $user->avatar = $input['imagename'];
        }

        $user->save();

        $message = "Profile information updated !";

        return redirect()->back()->with('message', $message);

    }


    //Concerning static User

    public function getDetails(){
        if(Auth::user()){
            return view('user/static/userProfile');
        }
    }

    public function getSponsored(){
        if(Auth::user()){
            return view('user/static/sponsored');
        }
    }
    
    public function updateProfil(){
        if(Auth::user()){
            return view('user/static/update');
        }
    }

}
