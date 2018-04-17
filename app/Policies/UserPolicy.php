<?php

namespace App\Policies;

use App\User;
use Bouncer;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
      return $user->can('create-member');
    }

    public function view(User $user)
    {
      return $user->can('view-member');
    }

    public function manage(User $user)
    {
      return $user-can('manage-member');
    }

    public function viewClubMember(User $user)
    {
      return $uer->can('view-club-members');
    }
}
