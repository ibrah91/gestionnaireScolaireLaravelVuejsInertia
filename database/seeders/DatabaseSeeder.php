<?php

namespace Database\Seeders;


use App\Models\NiveauScolaire;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
$this->call(NiveauScolaireSeeder::class);
     \App\Models\Etudiant::factory(10)->create();

    }
}
