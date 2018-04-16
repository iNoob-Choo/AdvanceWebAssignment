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
              //// Define roles
       $admin = Bouncer::role()->create([
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

       $viewDivision = Bouncer::ability()->create([
       'name' => 'view-division',

       'title' => 'View Division',
       ]);

       $createDivision = Bouncer::ability()->create([
       'name' => 'create-division',
       'title' => 'Create Division',
       ]);

       $manageDivision = Bouncer::ability()->create([
       'name' => 'manage-division',
       'title' => 'Manage Division',
       ]);

       $viewGroup = Bouncer::ability()->create([
       'name' => 'view-group',
       'title' => 'View Group',
       ]);

       $createGroup = Bouncer::ability()->create([
       'name' => 'create-group',
       'title' => 'Create Group',
       ]);

       $manageGroup = Bouncer::ability()->create([
       'name' => 'manage-group',
       'title' => 'Manage Group',
       ]);

       

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
