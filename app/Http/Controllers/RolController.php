<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//usar las fachadas para los roles
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;
class RolController extends Controller
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
        $roles= Role::paginate(10);
        return view('roles.index', compact('roles'));
    }
    public function create()
    {
        $permission = Permission::get();
        return view('roles.crear', compact('permission'));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required', 
            'permission' => 'required']);
        $role = Role::create(['name'=> $request->input('name')]);
        $role->syncPermissions ($request->input('permission'));

        return redirect()->route('roles.index');
    }
    
    public function show(string $id)
    {
        //
    }
    public function edit(string $id)
    {
       $role = Role::find($id);
       $permission = Permission::get();
       $rolePermissions = DB::table('role_has_permissions')
          ->where('role_has_permissions.role_id', $id)
          ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
          ->all();
    
       return view('roles.editar', compact('role', 'permission', 'rolePermissions'));
    }
    
    // public function edit(string $id)
    // {
    //    $role = Role::find($id);
    //    $permission = Permission::get();
    //    $rolePermissions = DB::table('role_has_permissions')
    //     ->where('role_has_permissions.role_id',$id)
    //         ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
    //         ->all();

    //     return view('roles.editar', compact('role','permission','rolePermissions'));
    // }
  
    public function update(Request $request, string $id)
    {
        $this->validate($request, ['name' => 'required', 'permission' => 'required']);
        $role=Role::find($id);
        $role->name = $request->input('name');
        $role->save();
         
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index');
    }

    public function destroy(string $id)
    {
        DB::table('roles')->where('id',$id)->delete();
        return redirect()->route('roles.index');
    }
    // public function adminlte_desc()
    // {
    //     // Obtén el usuario actual
    //     $user = auth()->user();
    
    //     // Obtén los roles del usuario como una cadena de texto
    //     $roles = $user->roles->pluck('name')->implode(', ');
    
    //     return $roles;
    // }
    
}