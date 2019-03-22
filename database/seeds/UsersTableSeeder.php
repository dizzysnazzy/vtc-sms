<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
      DB::table('users')->truncate();
      DB::table('roles')->truncate();
      DB::table('role_users')->truncate();
      $role = [
      'name' => 'Admin',
      'slug' => 'admin',
      'permissions' => [
        'admin' => true,
      ]
      ];
      $systemRole = Sentinel::getRoleRepository()->createModel()->fill($role)->save();

      $adminRole = [
        'name' => 'System',
        'slug' => 'system',
      ];
      Sentinel::getRoleRepository()->createModel()->fill($adminRole)->save();

      $tutorRole = [
        'name' => 'Tutor',
        'slug' => 'tutor',
      ];
      Sentinel::getRoleRepository()->createModel()->fill($tutorRole)->save();

      $studentRole = [
        'name' => 'Student',
        'slug' => 'student',
      ];
      Sentinel::getRoleRepository()->createModel()->fill($studentRole)->save();

      $admin = [
        'email'    => 'mondiakering@gmail.com',
        'password' => 'mondeer89',
      ];
      $adminUser = Sentinel::registerAndActivate($admin);
      $adminUser->roles()->attach($systemRole);
    }
}
