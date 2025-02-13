<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Game::truncate();
        $heading = true;
        $input_file = fopen(base_path("database/data/vgsales.csv"), "r");
        while (($record = fgetcsv($input_file, 1000, ",")) !== FALSE)
        {
            $year = null;
            if($record['3'] !== "N/A"){
                $year = $record['3'];
            }
            if (!$heading)
            {
                $game = array(
                    "Name" => $record['1'],
                    "Platform" => $record['2'],
                    "Year" => $year,
                    "Genre" => $record['4'],
                    "Publisher" => $record['5'],
                    "NA_Sales" => $record['6'],
                    "EU_Sales" => $record['7'],
                    "JP_Sales" => $record['8'],
                    "Other_Sales" => $record['9'],
                    "Global_Sales" => $record['10']
                );
                Game::create($game);
            }
            $heading = false;
        }
        fclose($input_file);
    }
}
