<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventPolicy
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
      return $user->can('create-event');
    }

    public function view(User $user)
    {
      return $user->can('view-event');
    }

    public function manage(User $user)
    {
      return $user-can('manage-event');
    }



}
