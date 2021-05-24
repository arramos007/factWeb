<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Producto::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'codigo_principal_producto' => 'required',
            'codigo_auxiliar_producto' => 'required',
            'nombre' => 'required',
            'valor_unitario' => 'required',
            'tipo_productos_id' => 'required',
            'users_id' => 'required'
        ]);

        $producto = new Producto;
        $producto->codigo_principal_producto =  $input['codigo_principal_producto'];
        $producto->codigo_auxiliar_producto =  $input['codigo_auxiliar_producto'];
        $producto->nombre =  $input['nombre'];
        $producto->valor_unitario =  $input['valor_unitario'];
        $producto->tipo_productos_id =  $input['tipo_productos_id'];
        $producto->users_id =  $input['users_id'];
        $producto->save();

        return response()->json($producto);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return response()->json($producto);
    }

    public function allDelete(Request $request)
    {
        Producto::whereIn('id',$request->all())->delete();
    }

    public function allUpdate(Request $request)
    {
        foreach($request->all() as $producto)
        {
            Producto::whereId($producto->id)->update([
                'codigo_principal_producto' => $producto['codigo_principal_producto'],
                'codigo_auxiliar_producto' => $producto['codigo_auxiliar_producto'],
                'nombre' => $producto['nombre'],
                'valor_unitario' => $producto['valor_unitario'],
                'tipo_productos_id' => $producto['tipo_productos_id'],
                'users_id' => $producto['users_id']    
            ]);
        }

        return response()->json("",200);
    }

    public function allStore(Request $request)
    {
        foreach($request->all() as $producto)
        {
            Producto::create([
                'codigo_principal_producto' => $producto['codigo_principal_producto'],
                'codigo_auxiliar_producto' => $producto['codigo_auxiliar_producto'],
                'nombre' => $producto['nombre'],
                'valor_unitario' => $producto['valor_unitario'],
                'tipo_productos_id' => $producto['tipo_productos_id'],
                'users_id' => $producto['users_id']    
            ]);
        }

        return response()->json("",200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $input = $request->validate([
            'codigo_principal_producto' => 'required',
            'codigo_auxiliar_producto' => 'required',
            'nombre' => 'required',
            'valor_unitario' => 'required',
            'tipo_productos_id' => 'required',
            'users_id' => 'required'
        ]);

       
        $producto->codigo_principal_producto =  $input['codigo_principal_producto'];
        $producto->codigo_auxiliar_producto =  $input['codigo_auxiliar_producto'];
        $producto->nombre =  $input['nombre'];
        $producto->valor_unitario =  $input['valor_unitario'];
        $producto->tipo_productos_id =  $input['tipo_productos_id'];
        $producto->users_id =  $input['users_id'];
        $producto->save();

        return response()->json($producto);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        if($producto)
        {
            $producto->delete();
            return response()->json("", 200);
        }
        
        return response()->json("", 400); 
    }
}