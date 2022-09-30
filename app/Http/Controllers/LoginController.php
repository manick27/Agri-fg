<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Action;
use Exception;
use Carbon\Carbon;
use Lang;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Illuminate\Auth\Events\Registered;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function authenticate(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            $user = Auth::user();

            if($user->is_admin == 1){
                return redirect()->route('admin');
            }else{

                return redirect()->route('home');
            }
        }else{
            $message = 'Ces informations ne correspondent pas à nos enregistrements.';
        
            return redirect('login')->with('message', $message);
        }
        
    }

    public function parentSave(CreatesNewUsers $creator, Request $request)
    {
        $parent = User::where('user_uid', $request->get('parent_id'))->first();
         
        if(!$parent){
            $message = 'Ce lien de parrainage est érroné. Veillez demander un nouveau';
            return redirect()->back()->with('message', $message);
        }

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|same:password',
            'condition' => 'accepted',
        ]);

        event(new Registered($user = $creator->create([
            'name' => $request->get('name'),
            'email' => $request->email,
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation,
        ])));

        $user->parent_id = $parent->id;
        $user->save();

        Auth::guard()->login($user);

        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('home');
    }

}
