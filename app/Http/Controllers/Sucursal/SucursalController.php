<?php

namespace App\Http\Controllers\Sucursal;

use App\Sucursal;
use UxWeb\SweetAlert\SweetAlert as Alert;
use Illuminate\Http\Request;
use App\Empleado;
use App\EmpleadosDatosLab;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class SucursalController extends Controller{
    public function __construct() {
        $this->middleware(function ($request, $next) {
            if(Auth::check()) {
                foreach (Auth::user()->perfil->componentes as $componente)
                    if($componente->modulo->nombre == "sucursales")
                        return $next($request);
                return redirect()->route('denegado');
            } else
                return redirect()->route('login');
        });
    }
 // use Alert;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $sucursales = Sucursal::get();
       
        return view('sucursales.index', ['sucursales'=>$sucursales]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sucursal=new Sucursal;
        $integer=Sucursal::get()->count();

        return view('sucursales.create',['edit'    =>false,
                                         'sucursal'=>$sucursal,
                                         'integer' =>$integer]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            
        $sucursal = Sucursal::create($request->all());

Alert::success("Sucursal registrada con exito")->persistent("Cerrar");

return view('sucursales.view',['sucursal'=>$sucursal]);
//return redirect()->route('sucursales.view',['sucursal'=>$sucursal]);
    //Alert::success("Sucursal registrada con exito")->persistent("Cerrar");    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sucursale  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show( $sucursal)
    {
        
        $suc= Sucursal::find($sucursal);
       
        return view('sucursales.view',['sucursal'=>$suc]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit( $sucursal)
    {
        $suc= Sucursal::find($sucursal);
        $integer=Sucursal::get()->count();
        return view('sucursales.create',['edit'=>true,
                                         'sucursal'=>$suc,
                                         'integer' =>$integer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$sucursal)
    {
        
         $suc= Sucursal::find($sucursal);

        $suc->update($request->all());
        Alert::success('Sucursal actualizado')->persistent("Cerrar");
        return redirect()->route('sucursales.show',['sucursal'=>$sucursal]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy($sucursal)
    {
        

    }




    public function buscar( $sucursal){
   
        

    }



    public function getSucursal(){
        $sucursales = Sucursal::get();
        return view('precargas.select',['precargas'=>$sucursales]);
    }
   


}