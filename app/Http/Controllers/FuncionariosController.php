<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FuncionariosController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['login']);

    }


    public function index()
    {
        $funcionarios = Funcionario::all();
        $unidades = Unidad::all();
        return view('funcionarios.index',compact('funcionarios','unidades'));
    }

    public function store(UsuariosRequest $request)
    {

    }

    public function update(Request $request, Funcionario $funcionario)
    {
        $funcionario->nombre = $request->nombre;
        $funcionario->apellidos = $request->apellidos;
        $funcionario->cargo = $request->cargo;
        $funcionario->unidad = $request->unidad;
        $funcionario->rut = $request->rut;
        $funcionario->slug = $request->slug;
        $funcionario->save();
        return redirect()->route('funcionarios.index');
    }

    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();
        return redirect()->route('funcionarios.index');
    }
}
