<?php

namespace App\Http\Controllers\Paciente;

use App\Paciente;
use App\Tutor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;

class TutorController extends Controller
{

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "pacientes")
                        return $next($request);
                return redirect()->route('denegado');
            } else
                return redirect()->route('login');
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Paciente $paciente)
    {
        $tutores = Tutor::get();
        return view('paciente.tutores.index', ['paciente' => $paciente, 'tutores' => $tutores]);
    }

    public function select(Paciente $paciente, Tutor $tutor)
    {
        return view('paciente.tutores.select', ['paciente' => $paciente, 'tutor' => $tutor]);
    }

    public function bind(Request $request, Paciente $paciente, Tutor $tutor)
    {
        // $paciente->tutores()->attach($tutor, ['relacion' => $request->relacion]);
        // $paciente->tutores()->detach();

        // dd($paciente->tutores->first()->parentesco);
        dd($tutor->pacientes->first()->parentesco->tutor_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Tutor $tutor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $tutor=Tutor::where('id',$request->id)->first();
        $tutor->nombre=$request->nombre;
        $tutor->appaterno=$request->appaterno;
        $tutor->apmaterno=$request->apmaterno;
        $tutor->edad=$request->edad;
        $tutor->fecha_nacimiento=$request->fecha_nacimiento;
        $tutor->sexo=$request->sexo;
        $tutor->relacion=$request->relacion;
        $tutor->tel_casa=$request->tel_casa;
        $tutor->tel_cel=$request->tel_cel;
        $tutor->save();
        Alert::success('Información Editada', 'Continuar');
        return redirect()->route('pacientes.show',
                               ['paciente'=>$paciente->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        //
    }
}
