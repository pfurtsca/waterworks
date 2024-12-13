<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('customers')->insert([
            ['name' => 'Lilly'],
            ['name' => 'Anton'],
            ['name' => 'Anna'],
            ['name' => 'SYMVARO'],
        ]);

        DB::table('meters')->insert([
            ['location' => 'Villach'],
            ['location' => 'Klagenfurt'],
            ['location' => 'Spittal'],
            ['location' => 'Völkermarkt'],
        ]);

        DB::table('readings')->insert([
            ['reading' => '2022-04-15 12:00:00','photo' => null,'systemtype' => 'web','meter_id' => '1'],
            ['reading' => '2022-04-03 08:30:00','photo' => null,'systemtype' => 'app','meter_id' => '2'],
            ['reading' => '2023-06-01 14:45:00','photo' => null,'systemtype' => 'mail','meter_id' => '1'],
            ['reading' => '2023-08-01 14:50:00','photo' => null,'systemtype' => 'mail','meter_id' => '2'],
        ]);

        DB::table('customer_meter')->insert([
            ['customer_id' => 1,'meter_id' => 1,'since' => '2022-04-15'],
            ['customer_id' => 2,'meter_id' => 2,'since' => '2022-04-03'], 
            ['customer_id' => 3,'meter_id' => 3,'since' => '2023-06-01'],
            ['customer_id' => 2,'meter_id' => 4,'since' => '2023-06-01'],
            ['customer_id' => 4,'meter_id' => 1,'since' => '2023-07-01'],
            ['customer_id' => 4,'meter_id' => 2,'since' => '2023-08-01'],
        ]);
        
    }
}
