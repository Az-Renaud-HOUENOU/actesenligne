<?php

namespace App\Http\Controllers\Etudiant;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ETUD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function checkAuthentication(Request $request){
        $response=Http::get('url_api_ent',[
            'etudiant_id' => $request->input('etudiant_id'),
        ]);
        if($response->successful()){
            return response()->json(['authenticated'=>true]);
        }
        else{
            return response()->json(['authenticated'=>false]);
        }
    }

    public function somemethod(Request $request){
        $response=Http::get('/api/check-authentication',[
            'etudiant_id'=>$request->etudiant()->id
        ]);
        if($response['authenticated']){
            $request->session()->regenerate();
        }
        else{
            return redirect()->route('accueil');
        }
    }

    public function doLoginetu(LoginRequest $request){
        $credentials = $request->validated();

        if(Auth::guard('etudiant')->attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('student.'));
        }
        else{
            return to_route(('accueil'))->withErrors([
                'matricule'=>'matricule ou mot de passe invalide'
            ])->onlyInput('matricule');
        }
    }

    public function doLogout(){
        Auth::guard('etudiant')->logout();
        return to_route('accueil');
    }
}
