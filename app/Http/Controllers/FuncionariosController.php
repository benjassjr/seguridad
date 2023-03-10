<?php

namespace App\Http\Controllers;
use App\Models\Funcionario;
use App\Models\Unidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class FuncionariosController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except(['login','validar']);

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
    public function validar(Funcionario $funcionario)
    {
        // dd(substr($_SERVER["REQUEST_URI"], 14, 12));
        $rutqr =  substr($_SERVER["REQUEST_URI"], 14, 11);
        $rutqr2 =  substr($_SERVER["REQUEST_URI"], 14, 12);
        if (Funcionario::where('rut', $rutqr )->exists()) {
            $validacion = '';

            $funcionario= DB::table('funcionarios')->select('*')->where('rut', '=', $rutqr)->first();

        }else {
            if (Funcionario::where('rut', $rutqr2 )->exists()) {
                $validacion = '';

                $funcionario= DB::table('funcionarios')->select('*')->where('rut', '=', $rutqr2)->first();
        }else {
            $validacion = 'FUNCIONARIO INEXISTENTE';

        }
}
        return view('funcionarios.qr',compact('funcionario', 'rutqr', 'rutqr2', 'validacion'));
    }

    public function generarqr(Funcionario $funcionario){
        {{$miQr = QrCode::
             size(125)
             ->backgroundColor(250, 250, 245)
             ->color(0, 0, 0)
             ->margin(1)
             ->generate('www.seguridad.lacruz.cl/funcionarios/'.$funcionario->rut.'/validar', '../public/qrcodes/'.$funcionario->rut.'.svg');
        }}
        return redirect()->route('funcionarios.index');
    }
}
