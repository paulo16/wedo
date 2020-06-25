<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('roles')->delete();
        \DB::table('roles')->insert([
            [
                'name' => "ADMIN",
                'display_name' => 'Administrateur',
                'description' => "Role administrateur, permet de voir et manipuler tous les élements de l'application",
            ],
            [
                'name' => "CLIENT",
                'display_name' => 'Client',
                'description' => "Role client, permet de voir et manipuler certains éléments de l'application",
            ],
            [
                'name' => "PRESTATAIRE",
                'display_name' => 'Prestataire',
                'description' => "Role prestataire, permet de voir certains éléments de l'application",
            ],
        ]);

        
    }
}
