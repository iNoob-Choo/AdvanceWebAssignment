<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClubPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        return true;
    }

    public function create(User $user)
    {
      return $user->can('create-club');
    }

    public function view(User $user)
    {
      return $user->can('view-club');
    }

    public function edit(User $user)
    {
      return $user->can('edit-club');
    }

    public function delete(User $user)
    {
      return $user->can('delete-club');
    }
}
