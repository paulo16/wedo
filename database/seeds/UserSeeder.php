<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->delete();
        //role 
        $role_admin = Role::where('name', 'ADMIN')->first();
        $role_client = Role::where('name', 'CLIENT')->first();
        $role_prestataire = Role::where('name', 'PRESTATAIRE')->first();

        //user
        $admin = new User();
        $admin->name = 'admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('admin');
        $admin->save();
        //client
        $manager = new User();
        $manager->name = 'Client 1';
        $manager->email = 'client@gmail.com';
        $manager->password = bcrypt('client');
        $manager->save();
        
        //prestataire
        $consulteur = new User();
        $consulteur->name = 'prestataire';
        $consulteur->email = 'prestataire@gmail.com';
        $consulteur->password = bcrypt('prestataire');
        $consulteur->save();
        
        //attach
        $admin->roles()->sync($role_admin->id);
        $manager->roles()->sync($role_client->id);
        $consulteur->roles()->sync($role_prestataire->id);
    }

}
