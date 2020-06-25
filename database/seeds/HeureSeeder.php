<?php

use Illuminate\Database\Seeder;

class HeureSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \DB::table('heureouvertures')->delete();
        \DB::table('heurefermetures')->delete();
        \DB::table('jours')->delete();

        //********* Jours ************

        \DB::table('jours')->insert([
            [
                'nom' => "LUNDI",
            ],
            [
                'nom' => "MARDI",
            ],
            [
                'nom' => "MERCREDI",
            ],
            [
                'nom' => "JEUDI",
            ],
            [
                'nom' => "VENDREDI",
            ],
            [
                'nom' => "SAMEDI",
            ],
            [
                'nom' => "DIMANCHE",
            ]
        ]);

        //Jours Ouvrables

        \DB::table('heureouvertures')->insert([
            [
                'nom' => "HEURE OUVERTURE",
            ],
            [
                'nom' => "1:00",
            ],
            [
                'nom' => "2:00",
            ],
            [
                'nom' => "3:00",
            ],
            [
                'nom' => "4:00",
            ],
            [
                'nom' => "5:00",
            ],
            [
                'nom' => "6:00",
            ],
            [
                'nom' => "7:00",
            ]
            ,
            [
                'nom' => "8:00",
            ]
            ,
            [
                'nom' => "9:00",
            ]
            ,
            [
                'nom' => "10:00",
            ],
            [
                'nom' => "11:00",
            ]
            ,
            [
                'nom' => "12:00",
            ],
            [
                'nom' => "13:00",
            ]
            ,
            [
                'nom' => "14:00",
            ],
            [
                'nom' => "15:00",
            ]
            ,
            [
                'nom' => "16:00",
            ]
            ,
            [
                'nom' => "17:00",
            ],
            [
                'nom' => "18:00",
            ]
            ,
            [
                'nom' => "19:00",
            ],
            [
                'nom' => "20:00",
            ],
            [
                'nom' => "21:00",
            ],
            [
                'nom' => "22:00",
            ],
            [
                'nom' => "23:00",
            ],
            [
                'nom' => "00:00",
            ]
        ]);

        //Jours Fermables

        \DB::table('heurefermetures')->insert([
            [
                'nom' => "HEURE FERMETURE",
            ],
            [
                'nom' => "1:00",
            ],
            [
                'nom' => "2:00",
            ],
            [
                'nom' => "3:00",
            ],
            [
                'nom' => "4:00",
            ],
            [
                'nom' => "5:00",
            ],
            [
                'nom' => "6:00",
            ],
            [
                'nom' => "7:00",
            ]
            ,
            [
                'nom' => "8:00",
            ]
            ,
            [
                'nom' => "9:00",
            ]
            ,
            [
                'nom' => "10:00",
            ],
            [
                'nom' => "11:00",
            ]
            ,
            [
                'nom' => "12:00",
            ],
            [
                'nom' => "13:00",
            ]
            ,
            [
                'nom' => "14:00",
            ],
            [
                'nom' => "15:00",
            ]
            ,
            [
                'nom' => "16:00",
            ]
            ,
            [
                'nom' => "17:00",
            ],
            [
                'nom' => "18:00",
            ]
            ,
            [
                'nom' => "19:00",
            ],
            [
                'nom' => "20:00",
            ],
            [
                'nom' => "21:00",
            ],
            [
                'nom' => "22:00",
            ],
            [
                'nom' => "23:00",
            ],
            [
                'nom' => "00:00",
            ]
        ]);
    }

}
