<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administradore;
class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function check(Request $request){
        $usuario = $request->input('idadmin');
        $clave = $request->input('pass');
        $user =Administradore::where('Correo',$usuario)->first();
        if($user)
        {
            if($user->Pass==hash('SHA256',$clave)){
                $request->session()->put('user',$user);
                if($user->idrol=='1'){
                 
                    return view('empresas.index');
                }
                else{
                       return view('rubros.index');
                
                }
            }
           
        }
        return view('login')->with('message','tas pendejo');
    }
    public function logout(Request $request){
    Auth::logout();
    $request->session()->flush();
    return view('login');
    }
}
