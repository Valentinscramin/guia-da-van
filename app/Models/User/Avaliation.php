<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliation extends Model
{
    use HasFactory;
    protected $table = "avaliation";

    public static function stars($percent)
    {
        $stars = array();
        if ($percent >= 1) {
            $stars['one'] = TRUE;
        }else{
            $stars['one'] = FALSE;
        }

        if ($percent >= 3) {
            $stars['two'] = TRUE;
        }else{
            $stars['two'] = FALSE;
        }

        if ($percent >= 5) {
            $stars['three'] = TRUE;
        }else{
            $stars['three'] = FALSE;
        }

        if ($percent >= 7) {
            $stars['four'] = TRUE;
        }else{
            $stars['four'] = FALSE;
        }

        if ($percent >= 9) {
            $stars['five'] = TRUE;
        }else{
            $stars['five'] = FALSE;
        }

        return $stars;
    }

    public static function getAvaliationStarsAvg($avaliations)
    {
        $sum = 0;
        $count = 0;

        foreach ($avaliations as $eachAvaliation) {
            $count++;
            $sum += $eachAvaliation->avaliation;
        }

        $avg = $count / $sum;
        $percent = $avg * 100 / 10;

        return Avaliation::stars($percent);
    }
}
