<?php

namespace App\Http\Controllers\Producto;

use App\Producto;
use App\Historial;
use App\Provedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::get();
        return view('productos.index', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedores = Provedor::get();
        return view('productos.create', ['proveedores' => $proveedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        switch($request->seccion) {
            case 'ortopedia':
                $sku = 'ORTO' . $request->marca . $request->modelo . $request->color;
                $desc = $request->producto . ' ' . $request->marca . ' ' . $request->modelo . ' ' . $request->talla . ' ' . $request->color;
                break;
            case 'micas':
                $sku = 'MICA' . $request->materiales . $request->color . $request->tratamiento;
                $desc = $request->materiales . ' ' . $request->rangos . ' ' . $request->color . ' ' . $request->tratamiento . ' ' . $request->unidad;
                break;
            case 'armazones':
                $sku = 'ARMAZON' . $request->marca . $request->modelo . $request->medidas;
                $desc = $request->marca . ' ' . $request->modelo . ' ' . $request->medidas . ' ' . $request->color;
                break;
            case 'generales':
                $sku = 'OPTICA' . $request->producto . $request->marca . $request->modelo . $request->color;
                $desc = $request->producto . ' ' . $request->marca . ' ' . $request->modelo . ' ' . $request->color;
                break;
            default:
                break;
        }
        $request['sku_interno'] = $sku;
        $request['descripcion'] = $desc;
        $producto = Producto::create($request->all());
        $historial = new Historial(['tipo' => 'Alta de Producto', 'descripcion' => 'Producto ' . $producto->sku_interno . ' registrado.']);
        $producto->historiales()->save($historial);
        return redirect()->route('productos.show', ['producto' => $producto]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.view', ['producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $proveedores = Provedor::get();
        return view('productos.edit', ['producto' => $producto, 'proveedores' => $proveedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        switch($producto->seccion) {
            case 'ortopedia':
                $sku = 'ORTO' . $request->marca . $request->modelo . $request->color;
                $desc = $request->producto . ' ' . $request->marca . ' ' . $request->modelo . ' ' . $request->talla . ' ' . $request->color;
                break;
            case 'micas':
                $sku = 'MICA' . $request->materiales . $request->color . $request->tratamiento;
                $desc = $request->materiales . ' ' . $request->rangos . ' ' . $request->color . ' ' . $request->tratamiento . ' ' . $request->unidad;
                break;
            case 'armazones':
                $sku = 'ARMAZON' . $request->marca . $request->modelo . $request->medidas;
                $desc = $request->marca . ' ' . $request->modelo . ' ' . $request->medidas . ' ' . $request->color;
                break;
            case 'generales':
                $sku = 'OPTICA' . $request->producto . $request->marca . $request->modelo . $request->color;
                $desc = $request->producto . ' ' . $request->marca . ' ' . $request->modelo . ' ' . $request->color;
                break;
            default:
                break;
        }
        $request['sku_interno'] = $sku;
        $request['descripcion'] = $desc;
        $producto->update($request->all());
        $historial = new Historial(['tipo' => 'Modificación de Producto', 'descripcion' => 'Producto ' . $producto->sku_interno . ' modificado.']);
        $producto->historiales()->save($historial);
        return redirect()->route('productos.show', ['producto' => $producto]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
