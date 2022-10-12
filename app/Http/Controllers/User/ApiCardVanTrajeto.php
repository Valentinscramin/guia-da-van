<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Track;
use App\Models\Cities;
use App\Models\States;

class ApiCardVanTrajeto extends Controller
{
    public $cities;
    public $states;
    public $track;
    // public $new;


    public function __construct(int $id = Null)
    {
        if (is_null($id)) {
            $this->cities = (new Cities())->orderBy('name')->get();
            $this->states = (new States())->orderBy('name')->get();
            $this->track = (new Track())->all();
        }
    }

    public function deleteCard()
    {
        //
    }

    public function setCard()
    {
        $cardInformation = [
            'cities' => $this->cities,
            'states' => $this->states,
            'track' => $this->track,
        ];

        return json_encode($cardInformation);
    }

    public function getCard(bool $new = true)
    {
        //
    }
}
