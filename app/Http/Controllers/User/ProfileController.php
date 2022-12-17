<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SiteAcessos;
use App\Models\SiteProfileAcessos;
use App\Models\User;
use App\Models\User\Avaliation;
use App\Models\User\UserPhotos;
use App\Models\User\Van;
use App\Models\User\VanUserPhoto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //Mensagens de retorno caso insira algo errado
    public $messages = [
        'name.required' => 'O usuario deve conter um nome',
        'cpf_cnpj.required' => 'O usuario deve conter um CPF/CNPJ',
        'postcode.required' => 'O usuario deve conter um CEP',
        'telefone.required' => 'O usuario deve conter um Telefone',
        'celular.required' => 'O usuario deve conter um celular',
        'data_nascimento.required' => 'O usuario deve ter mais de 18 anos',
        'data_nascimento.before' => 'O usuario deve ter mais de 18 anos',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::id());
        $photos = UserPhotos::where('user_id', '=', Auth::id())->get();
        $profile_photo_checked = $user->user_photo_id;
        $profile_photo = UserPhotos::find($user->user_photo_id);
        if (isset($profile_photo)) {
            $profile_photo = @$profile_photo->arquivo;
        }
        return view('user.profile.home', compact('user', 'photos', 'profile_photo', 'profile_photo_checked'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (!is_null($user)) {
            $siteacessos = new SiteProfileAcessos();
            $siteacessos->user_id = $id;
            $siteacessos->save();
        }

        $profile_photo = @User::photo($id)->arquivo;

        $no_avaliation = true;
        if (Auth::check()) {
            if (Auth::user()->id) {
                $avaliation = DB::table('avaliation')
                    ->where('create_user_id', Auth::user()->id)
                    ->where('user_id', $id)
                    ->get()
                    ->count();
                if ($avaliation > 0) {
                    $no_avaliation = false;
                }
            }
        }

        $stars = Avaliation::getAvaliationStarsAvg($user->avaliation);
        $vans_user = Van::where('user_id', '=', $id)->get();

        $vans = [];
        $count = 0;
        foreach ($vans_user as $key => $eachVan) {
            $photo_id = VanUserPhoto::where('van_id', '=', $eachVan->id)->get()[0]['user_photo_id'];
            $arquivo = UserPhotos::where('id', '=', $photo_id)->get()[0]['arquivo'];
            $vans[$count] = $eachVan;
            $vans[$count]['arquivo'] = $arquivo;
            $count++;
        }

        dd($stars);

        return view('site.profile', compact('user', 'stars', 'profile_photo', 'vans', 'no_avaliation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.profile.home', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'cpf_cnpj' => 'required',
                'postcode' => 'required',
                'telefone' => 'required',
                'celular' => 'required',
                'data_nascimento' => 'required|date|before:18 years ago',
            ],
            $this->messages,
        );

        if ($validator->fails()) {
            return redirect('user/profile')
                ->withErrors($validator)
                ->withInput();
        }

        $user = User::find($id);
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->cpf_cnpj = $request->cpf_cnpj;
        $user->data_nascimento = $request->data_nascimento;
        $user->postcode = $request->postcode;
        $user->celular = $request->celular;
        $user->telefone = $request->telefone;
        $user->user_photo_id = intval(@$request->user_profile_photo[0]);

        $user->update();

        return redirect('user/profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
