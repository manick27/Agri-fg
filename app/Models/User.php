<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'email',
        'username',
        'password',
        'is_admin',
        'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function notifications(){

        return $this->hasMany(Notification::class);
    }

    public function budgets(){

        return $this->hasMany(Budget::class);
    }

    public function withdraws(){

        return $this->hasMany(Withdraw::class);
    }

    public function carts(){

        return $this->hasMany(Cart::class);
    }

    public function childUsers($user_id){

        $user = User::findOrFail($user_id);

        $users = User::where('parent_id', $user->id)->get();

        return $users;
    }

    public function hasActiveBudget($user_id){

        $user = User::findOrFail($user_id);

        $validBudgets = Budget::where('user_id', $user->id)
            ->where('status', '!=' ,'Non Valide')
            ->get();

        if($validBudgets->count() > 0){
            return "Budget déjà Valide";
        }else{
            return "Auccun achat !";
        }
    }

    public function hasNoInValidWithdraw($user_id){

        $user = User::findOrFail($user_id);

        $notValidWithdraw = Withdraw::where('user_id', $user->id)
            ->where('status', 'Attente de retrait')
            ->get();

        if($notValidWithdraw->count() > 0){
            return false;
        }else{
            return true;
        }
    }
}
