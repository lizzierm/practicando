<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo',10);
            $table->string('descripcion',50);
            $table->integer('cantidad');
            $table->decimal('precio', 8, 2);
            $table->timestamps();

            // $table->id();
            // $table->integer('id_tipopersona')->nullable()->foreign('id_tipopersona')
            //     ->references('id')->on('tipoPersona')->onDelete('set null');
            // $table->integer('id_categoria')->nullable()->foreign('id_categoria')
            //     ->references('id')->on('categoria')->onDelete('set null');
            // $table->integer('codigo')->nullable();    
            // $table->string('nombre')->nullable();
            // $table->text('ruta_imagen')->nullable();
            // $table->string('color')->nullable();
            // $table->string('marca')->nullable();
            // $table->string('talla')->nullable();
            // $table->decimal('precio')->nullable();
            // $table->string('descripcion')->nullable();
            // $table->decimal('stock')->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
