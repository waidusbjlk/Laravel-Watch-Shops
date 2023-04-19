<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AdmPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }



}
