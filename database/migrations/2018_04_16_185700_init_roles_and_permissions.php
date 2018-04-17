<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\User;

class InitRolesAndPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      // Define roles
       $super_admin = Bouncer::role()->create([
       'name' => 'superadmin',
       'title' => 'Super Admin',
       ]);

       $member = Bouncer::role()->create([
       'name' => 'member',
       'title' => 'Member',
       ]);

       $club_admin = Bouncer::role()->create([
       'name' => 'clubadmin',
       'title' => 'Club Admin',
       ]);

       // Define abilities
       $viewMember = Bouncer::ability()->create([
       'name' => 'view-member',
       'title' => 'View Member',
       ]);

       $createMember = Bouncer::ability()->create([
       'name' => 'create-member',
       'title' => 'Create Member',
       ]);

       $manageMember = Bouncer::ability()->create([
       'name' => 'manage-member',
       'title' => 'Manage Member',
       ]);

       $viewEvent = Bouncer::ability()->create([
       'name' => 'view-event',
       'title' => 'View Event',
       ]);

       $createEvent = Bouncer::ability()->create([
       'name' => 'create-event',
       'title' => 'Create Event',
       ]);

       $manageEvent = Bouncer::ability()->create([
       'name' => 'manage-event',
       'title' => 'Manage Event',
       ]);

       $viewClubMembers = Bouncer::ability()->create([
       'name' => 'view-club-members',
       'title' => 'View Club Members',
       ]);

       //assign InitRolesAndPermission
       Bouncer::allow($super_admin)->to($viewMember);
       Bouncer::allow($super_admin)->to($createEvent);
       Bouncer::allow($super_admin)->to($manageMember);
       Bouncer::allow($super_admin)->to($viewEvent);
       Bouncer::allow($super_admin)->to($createEvent);
       Bouncer::allow($super_admin)->to($manageEvent);
       Bouncer::allow($super_admin)->to($viewClubMembers);

       Bouncer::allow($club_admin)->to($viewEvent);
       Bouncer::allow($club_admin)->to($createEvent);
       Bouncer::allow($club_admin)->to($manageEvent);
       Bouncer::allow($club_admin)->to($viewClubMembers);

       Bouncer::allow($member)->to($viewEvent);


       // Make the first user an admin
       $user = User::find(1);
       Bouncer::assign('superadmin')->to($user);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
