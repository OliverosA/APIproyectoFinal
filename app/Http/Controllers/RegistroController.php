<?php


namespace App\Http\Controllers;
use App\Models\Registro;
use App\Http\Requests\CreateRegistroRequest;
use App\Http\Requests\UpdateRegistroRequest;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //listar los registros 
    public function index(Request $request)
    {
        
        if($request->has('txtBuscar')){
            $registros = Registro::where('nombre', 'like', '%' . $request->txtBuscar . '%')
                ->orWhere('github', 'like', '%' . $request->txtBuscar . '%')
                ->get();
        }
        else{
            $registros = Registro::all();
        }
        return $registros;

    }

    //POST insertar datos
    public function store(CreateRegistroRequest $request)
    {
        $input = $request->all();
        if($request->has('fotografia')){
            $input['fotografia'] = $this->cargarImagen($request->fotografia);
        }

        Registro::create($input);

        return response()->json([
            'res' => true,
            'message' => 'Registro Creado Correctamente'
        ], 200);
    }

    //listar por ID
    public function show(Registro $registros)
    {
        return $registros;
    }

    //PUT actualizar registros
    public function update(UpdateRegistroRequest $request, Registro $registro)
    {
        $input = $request->all();
        if($request->has('fotografia')){
            $input['fotografia'] = $this->cargarImagen($request->fotografia);
        }
        $registro->update($input);
        return response()->json([
            'res' => true,
            'message' => 'Registro Actualizado Correctamente'
        ],  200);
    }

     //DELETE eliminar registros
    public function destroy($id)
    {
        Registro::destroy($id);
        return response()->json([
            'res' => true,
            'message' => 'Registro Eliminado Correctamente'
        ],  200);
    }

    //cargar Archivo
    private function cargarImagen($file){
        $imagen = time() . "." . $file->getClientOriginalExtension();
        $file->move(public_path('fotos'), $imagen);
        return $imagen;
    }
}
