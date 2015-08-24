<?php

namespace App;

use DB;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function createNewUser(string $email, string $password) {

        $existing = get('email', $data['email']);
        if(sizeof($existing) > 0) {
            return ["error" => "Email address already registered!"];
        }

        App\User::create(['email' => $email, 'password' => $password]);
        $user = App\User::where('email', $email)->get()->toArray();
        if (sizeof($user) > 0) {
            return $user[0];
        }

        return ["error" => "Couldn't retrieve user."];
    }

    public function getUserList(string $key, $value) {
        $users = App\User::where($key, $value)->get();
        return $users->toArray();
    }
}
