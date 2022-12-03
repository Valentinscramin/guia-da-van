<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliation extends Model
{
    use HasFactory;
    protected $table = 'avaliation';

    public static function stars($percent)
    {
        $stars = [];
        if ($percent >= 1) {
            $stars['one'] = true;
        } else {
            $stars['one'] = false;
        }

        if ($percent >= 3) {
            $stars['two'] = true;
        } else {
            $stars['two'] = false;
        }

        if ($percent >= 5) {
            $stars['three'] = true;
        } else {
            $stars['three'] = false;
        }

        if ($percent >= 7) {
            $stars['four'] = true;
        } else {
            $stars['four'] = false;
        }

        if ($percent >= 9) {
            $stars['five'] = true;
        } else {
            $stars['five'] = false;
        }

        return $stars;
    }

    public static function getAvaliationStarsAvg($avaliations)
    {
        if (count($avaliations) > 0) {
            $sum = 0;
            $count = 0;

            foreach ($avaliations as $eachAvaliation) {
                $count++;
                $sum += $eachAvaliation->avaliation;
            }

            $avg = $count / $sum;
            $percent = ($avg * 100) / 10;

            return Avaliation::stars($percent);
        }
        return 0;
    }
}
