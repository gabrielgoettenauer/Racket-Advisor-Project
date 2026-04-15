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
        Schema::create('rackets', function (Blueprint $table) {
    $table->id();

    $table->string('name');
    $table->string('brand');
    $table->string('material_face');

    $table->decimal('price', 8, 2);
    $table->string('eva');
    $table->integer('weight');

    $table->integer('thickness_mm');
    $table->integer('balance');

    $table->string('level'); // iniciante/intermediario/avancado
    $table->string('style'); // controle/potencia/conforto

    $table->boolean('is_comfortable');
    $table->string('power_control'); // mais potencia ou mais controle
    $table->boolean('injury_indicated');

    $table->text('description')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rackets');
    }
};
