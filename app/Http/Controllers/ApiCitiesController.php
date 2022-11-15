<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cities;

class ApiCitiesController extends Controller
{
    public function getCities($id)
    {
        $cities = Cities::where("state_id", $id)->get();
        return json_encode($cities);
    }
}
