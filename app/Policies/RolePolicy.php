<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function isAdmin(User $user)
    {
        return $user->id == 1 ? true : false;
    }
    
    public function isProduct(User $user)
    {
        return $user->id == 3 ? true : false;
    }

    public function isCategory(User $user)
    {
        return $user->id != 1 && $user->id != 3 ? true : false;
    }
}
