<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','facebook_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function addNew($input)
    {   
        $check = User::where('facebook_id',$input['facebook_id'])->first();
        if($check=='' || $check==null){

            $check = User::create([
                    'name' => $input["name"],
                    'email' => $input["email"],
                    'facebook_id'=>$input['facebook_id']
            ]);
            return $check;
        }

        return $check;
    }
}
