<?php

use Illuminate\Database\Seeder;

class StarterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kaan = \App\Models\User::create([
            'name' => 'Kaan Karaca',
            'email' => 'kaan94karaca@gmail.com',
            'password' => bcrypt('123123'),
        ]);

        $superAdmin = \App\Models\Role::find(1);
        $employee = \App\Models\Role::find(2);
        $kaan->attachRole($superAdmin);

        $users = factory(\App\Models\User::class,10)->create();


        foreach ($users as $user){
            $user->attachRole($employee);
        }


    }
}
