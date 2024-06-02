<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Administradore;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function check(Request $request){



$clave = '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92';
$validator = Validator::make($request->all(), [
    'idadmin' => ['required', 'email'],
    'pass' => ['required', function ($attribute, $value, $fail) use ($clave) {
        $hashed_pass = hash('sha256', $value);
        if ($hashed_pass !== $clave) {
            $fail($attribute.' no coincide con el valor secreto.');
        }
    }],
]);

$usuario = $request->input('idadmin');
$clave = $request->input('pass');
        
        $user =Administradore::where('Correo',$usuario)->first();
    if ($validator->fails()) {
        $errors = $validator->errors();
        return redirect('login')->withErrors($validator)->withInput();

    } else {
        if($user)
        {
            if($user->Pass==hash('SHA256',$clave)){
                $request->session()->put('user',$user);
                if($user->idrol=='1'){
                 
                    return to_route('rubros.index');
                }
                elseif ($user->idrol=='2') {
                    return to_route('indexOfertas');
                }
            }
           
        }
    }
        return view('login')->with('message','Usuario inexistente');
    }
    public function logout(Request $request){
    Auth::logout();
    $request->session()->flush();
    return to_route('login');
    }
}
