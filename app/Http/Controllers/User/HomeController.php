<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\SiteProfileAcessos;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $months = [];
        $currentDate = Carbon::now()->startOfMonth();
        while ($currentDate->year == Carbon::now()->year) {
            $months[] = $currentDate->format('Y-m');
            $currentDate->subMonth();
        }

        // Acessos
        $acessos = [];
        foreach ($months as $key => $value) {
            $acessos[] = SiteProfileAcessos::where(DB::raw("DATE_FORMAT(created_at, '%Y-%m')"), $value)
                ->where('user_id', '=', Auth::id())
                ->count();
        }

        $months = json_encode($months);
        $acessos = json_encode($acessos);

        return view('user.home', compact('acessos', 'months'));
    }
}
