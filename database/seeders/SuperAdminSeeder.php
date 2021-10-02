<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin =  User::create([
            'name' => 'Super Admin',
            'slug' => 'super-admin',
            'email' => 'superadmin@gl-perpus.test',
            'password' => bcrypt('11111111'),
            'email_verified_at' => now()
        ]);

        $admin->assignRole('super-admin');
    }
}
