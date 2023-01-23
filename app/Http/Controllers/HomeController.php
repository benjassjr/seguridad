<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use App\Models\Usuario;
use Gate;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['login']);
    }

    public function index(){
        if(Gate::denies('usuarios-listar')){
            return redirect()->route('home.dashboard');
        }
        //dd('Hola Mundo');//dd: dump and die
        $funcionarios = Funcionario::all();
        $funcionario1 = Funcionario::find(25);
        $funcionario2 = Funcionario::find(24);
        $funcionario3 = Funcionario::find(26);
        $funcionario4 = Funcionario::find(27);
        $funcionario5 = Funcionario::find(34);

        $usuarios = Usuario::orderByDesc('ultimo_login')->get();
        return view('home.index',compact('funcionarios','usuarios','funcionario1','funcionario2','funcionario3','funcionario4','funcionario5'));
    }

    public function dashboard(){

        return view('home.dashboard');
    }

    public function login(){
        return view('home.login');
    }
}
