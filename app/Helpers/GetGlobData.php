<?php
namespace App\Helpers;

use App\Models\Game;
use Illuminate\Database\Eloquent\Collection;

class GetGlobData
{
    public static $Platforms = ["Wii","NES","GB","DS","X360","PS3","PS2","SNES","GBA","3DS","PS4","N64","PS","XB","PC","2600","PSP","XOne","GC","WiiU","GEN","DC","PSV","SAT","SCD","WS","NG","TG16","3DO","GG","PCFX"];

    //List of 3 pre-selected games
    public static function Favorites(){
        $fav1 = Game::where('Name', 'like', 'Super Mario Bros.')->where('Platform', '=', 'NES')->get();
        $fav2 = Game::where('Name', 'like', 'NBA 2K14')->where('Platform', '=', 'PS4')->get();
        $fav3 = Game::where('Name', 'like', "Assassin's Creed II")->where('Platform', '=', 'PS3')->get();
        return $favorites = [$fav1[0], $fav2[0], $fav3[0]];
    }

    public static function BubbleSort($gameArr) {
        $n = count($gameArr);
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                if ($gameArr[$j]->comments->count() < $gameArr[$j + 1]->comments->count()) {
                    $temp = $gameArr[$j];
                    $gameArr[$j] = $gameArr[$j + 1];
                    $gameArr[$j + 1] = $temp;
                }
            }
        }
        return $gameArr;
    }
}

    // Used to get the platforms stored in the dataset,
    // Can be used to get other attributes by changing $record index
    //
    // public static function Platforms(string $FilePath)
    // {
    //     $platforms = [];
    //     $input_file = fopen(base_path($FilePath), 'r');
    //     while (($record = fgetcsv($input_file, 1000, ',')) !== false) {
    //         $found = false;
    //         for ($i = 0; $i < count($platforms); $i++) {
    //             if ($platforms[$i] != $record[2]) { //change this $record index to get other attributes
    //                 $found = false;
    //             } else {
    //                 $found = true;
    //                 $i = count($platforms);
    //             }
    //         }
    //         if (!$found) {
    //             $platforms[] = $record[2];
    //         }

    //         $heading = false;
    //     }
    //     fclose($input_file);

    //     foreach($platforms as $plat){
    //         echo "\"". $plat ."\",";
    //     }
    // }
