<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use App\Models\Articulo;
class ArticuloController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $articulos = Articulo::all();
        Return view('articulo.index')->with('articulos',$articulos);
    }

   
    public function create()
    {
        return view('articulo.create');
    }

   
    public function store(Request $request)
    {
        $articulo = new Articulo();
        $articulo->codigo = $request->get('codigo');
        $articulo->descripcion = $request->get('descripcion'); // Corrección
        $articulo->cantidad = $request->get('cantidad');
        $articulo->precio = $request->get('precio');

        $articulo->save();
        return redirect('/articulos');
    }

  
    public function show(string $id)
    {
        //
    }

   
    public function edit($id)
    {
        $articulo=Articulo::find($id);
        return view('articulo.edit')->with('articulo', $articulo);
    }

 
    public function update(Request $request, $id)
    {
        $articulo = Articulo::find($id);

        $articulo->codigo = $request->get('codigo');
        $articulo->descripcion = $request->get('descripcion'); // Corrección
        $articulo->cantidad = $request->get('cantidad');
        $articulo->precio = $request->get('precio');

        $articulo->save();
        return redirect('/articulos');
    }

    
    public function destroy($id)
    {
         $articulo = Articulo::find($id);
        
        $articulo->delete();
        return redirect('/articulos');
    }
}
