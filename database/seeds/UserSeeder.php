<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'nama' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'username' => 'admin',
                'password' => bcrypt('password'),
                'created_by' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'staff',
                'email' => 'staff@gmail.com',
                'role' => 'staff',
                'username' => 'staff',
                'password' => bcrypt('password'),
                'created_by' => '',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
