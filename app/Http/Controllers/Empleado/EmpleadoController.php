<?php

namespace App\Http\Controllers\Empleado;

use App\Empleado;
use App\Area;
use App\Puesto;
use App\Sucursal;
use App\Almacen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use UxWeb\SweetAlert\SweetAlert as Alert;

class EmpleadoController extends Controller
{

    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "rh")
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
    public function index()
    {
        //
        $empleados = Empleado::sortable()->paginate(10);
        $areas=Area::get();
        $puestos=Puesto::get();
        $sucursales=Sucursal::get();
        $almacenes=Almacen::get();
        return view('empleado.index',[
            'empleados' => $empleados,
            'areas'     =>     $areas,
            'puestos'   =>   $puestos,
            'sucursales'=>$sucursales,
            'almacenes' =>$almacenes]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $empleado = new Empleado;
        $edit = false;
        $sucursales=Sucursal::get();
        $numero=Empleado::orderBy('created_at', 'desc')->pluck('id')->first();
        return view('empleado.create',['empleado'   =>$empleado,
                                       'edit'       =>$edit,
                                        'sucursales'=>$sucursales,
                                        'numero'    =>$numero]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        $rfc = Empleado::where('rfc',$request->rfc)->get();
        if (count($rfc)!=0) {
            # code...
           Alert::error('Favor de verificar la Información', ' El RFC ya existe');
            return redirect()->back();
        }
        else {
            $empleado = Empleado::create($request->all());
            Alert::success('Empleado Creado', 'Siga agregando información al empleado');
            
            return redirect()->route('empleados.show',['empleado'=>$empleado])->with('success','Empleado Creado');
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
        
        return view('empleado.view',['empleado'=>$empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        //
        $edit= true;
        $sucursales=Sucursal::get();
        $numero=Empleado::orderBy('created_at', 'desc')->pluck('id')->first();
        return view('empleado.create',['empleado'  =>$empleado,
                                       'edit'      =>$edit,
                                       'sucursales'=>$sucursales,
                                       'numero'    =>$numero]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        //
        $empleado->update($request->all());
        Alert::success('Empleado actualizado');
        return redirect()->route('empleados.show',['empleado'=>$empleado])->with('success','Empleado Actualizado');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        //
    }

//Añadido : Iyari 05/Dic/2017
    public function consulta()
    {
        return view('empleado.consulta');
    }

    public function buscar(Request $request){
 
    $query = $request->input('busqueda');
    $wordsquery = explode(' ',$query);
    $empleados = Empleado::where(function($q) use($wordsquery){
            foreach ($wordsquery as $word) {
                # code...
            $q->orWhere('nombre','LIKE',"%$word%")
                ->orWhere('appaterno','LIKE',"%$word%")
                ->orWhere('apmaterno','LIKE',"%$word%")
                ->orWhere('rfc','LIKE',"%$word%")
                ->orWhere('curp','LIKE',"%$word%");
                // ->orWhere('rfc','LIKE',"%$word%");
                // ->orWhere('alias','LIKE',"%$word%");
                // ->orWhere('tipopersona','LIKE',"%$word%")
            }
        })->get();
    return view('empleado.busqueda', ['empleados'=>$empleados]);
        

    }
}
