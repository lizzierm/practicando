<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
//spatie
use Spatie\Permission\Models\Permission;
class SeederTablaPermisos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos=[
            //tabla
            'ver-rol',
            'crear-rol',
            'editar-rol',
            'borrar-rol',

            //tabla blog
            'ver-blog',
            'crear-blog',
            'editar-blog',
            'borrar-blog',

            'ver-usuario',
            'crear-usuario',
            'editar-usuario',
            'borrar-usuario',
        ];
        foreach($permisos as $permiso){
            Permission::create(['name'=>$permiso]);
        }
    }
}
