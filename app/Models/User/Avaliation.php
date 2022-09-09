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
        }

        if ($percent >= 2) {
            $stars['two'] = TRUE;
        }

        if ($percent >= 3) {
            $stars['three'] = TRUE;
        }

        if ($percent >= 4) {
            $stars['four'] = TRUE;
        }

        if ($percent >= 5) {
            $stars['five'] = TRUE;
        }
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
        $percent = $avg * 100 / 5;

        return Avaliation::stars($percent);
    }
}
