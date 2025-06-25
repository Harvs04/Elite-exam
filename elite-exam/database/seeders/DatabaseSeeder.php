<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Artist;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'username' => 'Harvey Martinez',
            'email' => 'eliteexam@gmail.com',
        ]);

        $rows = [];

        if (($open = fopen(public_path('Data Reference (ALBUM SALES).csv'), "r")) !== FALSE) {
            while (($line = fgetcsv($open, 1000, ",")) !== FALSE) {
                $rows[] = $line;
            }
            fclose($open);
        }

        for ($i = 1; $i < count($rows); $i++) {

            $duplicate = Artist::where('code', $rows[$i][0])->first();

            if (!$duplicate) {
                Artist::create([
                    'code' => $rows[$i][0],
                    'name' => fake()->name(),
                ]);
            }
        }

        for ($i = 1; $i < count($rows); $i++) {

            $duplicate = Artist::where('code', $rows[$i][0])->first();

            Album::create([
                'artist_id' => $duplicate ? $duplicate->id : $i,
                'year' => "20" . substr($rows[$i][3], 0, 2),
                'name' => $rows[$i][1],
                'sales' => (float)$rows[$i][2],
            ]);
        }

    }
}
