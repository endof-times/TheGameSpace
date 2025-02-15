<?php
namespace App\Helpers;

use App\Models\Game;

class GetGlobData
{
    //Used to get the platforms stored in the dataset
    public static function Platforms(string $FilePath)
    {
        $platforms = [];
        $input_file = fopen(base_path($FilePath), 'r');
        while (($record = fgetcsv($input_file, 1000, ',')) !== false) {
            $found = false;
            for ($i = 0; $i < count($platforms); $i++) {
                if ($platforms[$i] != $record[2]) {
                    $found = false;
                } else {
                    $found = true;
                    $i = count($platforms);
                }
            }
            if (!$found) {
                $platforms[] = $record[2];
            }

            $heading = false;
        }
        fclose($input_file);

        foreach($platforms as $plat){
            echo "\"". $plat ."\",";
        }
    }

    //List of 3 pre-selected games
    public static function Favorites(){
        $fav1 = Game::where('Name', 'like', 'Super Mario Bros.')->where('Platform', '=', 'NES')->get();
        $fav2 = Game::where('Name', 'like', 'NBA 2K14')->where('Platform', '=', 'PS4')->get();
        $fav3 = Game::where('Name', 'like', "Assassin's Creed II")->where('Platform', '=', 'PS3')->get();
        return $favorites = [$fav1[0], $fav2[0], $fav3[0]];
    }
}
