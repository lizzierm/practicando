<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
class BlogController extends Controller
{
       public function __construct()
{
    $this->middleware('permission:ver-rol|crear-rol|editar-rol|borrar-rol', ['only' => ['index']]);
    $this->middleware('permission:crear-rol', ['only' => ['create', 'store']]);
    $this->middleware('permission:editar-rol', ['only' => ['edit', 'update']]);
    $this->middleware('permission:borrar-rol', ['only' => ['destroy']]);
}
    public function index()
    {
    //    Blog::paginate(10);
    //    return view('blog.index',compact('blog'));
       $blogs = Blog::paginate(10);
        return view('blog.index', compact('blogs'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.crear');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
        Blog::create($request->all());
        // Blog::create($validatedData);
        
        
        
        // request()->validate([
        //     'titulo' => 'required',
        //     'contenido' => 'required',
        // // ]);
        // Blog::create($request->all());
        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('blog.editar',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        request()->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);
        $blog->update($request->all());
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
     $blog->delete();
    return redirect()->route('blog.index');
    }
}
