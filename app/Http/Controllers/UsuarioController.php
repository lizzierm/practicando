<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Usuario;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
//roles
/**
 * @return \Illuminate\Http\Response
 */

use function Laravel\Prompts\password;

use Spatie\Permission\Models\Permission;


class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:ver-usuario|crear-usuario|editar-usuario|borrar-usuario', ['only' => ['index']]);
        $this->middleware('permission:crear-usuario', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-usuario', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-usuario', ['only' => ['destroy']]);
    }
    
    public function index()
    {
        $usuarios = User::paginate(10);
        return view('usuarios.index', compact('usuarios'));

        // {!! $usuarios->links( ) eso va en el indes apra realizar la paginacion!!}
    }
    
   
    public function create()
    {
//  asigniamos metodo oll

    $roles = Role::pluck('name', 'name')->all();
    return view('usuarios.crear', compact('roles'));

    }
    
    public function store(Request $request)//almacena y guarda lo creado
    {
        $this->validate($request, [
            'name'=> 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles'=> 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
    
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
    
        return redirect()->route('usuarios.index');
    }

    public function show(string $id)
    {
    }
    public function edit( $id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('usuarios.editar', compact('user','roles','userRole'));
    }

    public function update(Request $request, string $id)//actualizar
    {
         $this->validate($request,[
            'name'=> 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            // 'password'=> 'same:confir-pasksword',
            'roles'=> 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
            
        }else{
            $input = Arr::except($input,array('password'));
        }

        $user = User::find($id);
        $user ->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index');

    }
    // $user->syncRoles($request->input('roles'));
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('usuarios.index');
    }
}
