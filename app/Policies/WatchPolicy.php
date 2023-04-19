<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Watch;
use Illuminate\Auth\Access\HandlesAuthorization;

class WatchPolicy
{
    use HandlesAuthorization;

    public function edit(User $user,Watch $watch){
        return ($user->role->name != 'user');
    }


    public function viewAny(User $user)
    {
        return $user->role->name != 'user';
    }


    public function view(User $user, Watch $watch)
    {

    }


    public function create(User $user)
    {
        return $user->role->name == 'admin';
    }


    public function update(User $user, Watch $watch)
    {

    }

    public function delete(User $user, Watch $watch)
    {
        return($user->id==$watch->user_id) || ($user->role->name != 'user') || ( $user->role->name != 'user');
    }


    public function restore(User $user, Watch $watch)
    {

    }

    public function forceDelete(User $user, Watch $watch)
    {
        //
    }
}
