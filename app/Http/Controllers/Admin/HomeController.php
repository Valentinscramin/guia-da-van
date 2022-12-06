<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\SiteAcessos;
use App\Models\User;
use App\Models\User\Van;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //Meses para consultar

        $months = [];
        $currentDate = Carbon::now()->startOfMonth();
        while ($currentDate->year == Carbon::now()->year) {
            $months[] = $currentDate->format('Y-m');
            $currentDate->subMonth();
        }

        // Usuario
        $user = [];
        foreach ($months as $key => $value) {
            $user[] = User::where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $value)->count();
        }

        //Vans
        $vans = [];
        foreach ($months as $key => $value) {
            $vans[] = Van::where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $value)->count();
        }

        // Acessos
        $acessos = [];
        foreach ($months as $key => $value) {
            $acessos[] = SiteAcessos::where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $value)->count();
        }

        // $year = json_encode($year);
        $months = json_encode($months);
        $user = json_encode($user);
        $vans = json_encode($vans);
        $acessos = json_encode($acessos);

        return view('admin.home', compact('user', 'vans', 'acessos', 'months'));
    }
}
