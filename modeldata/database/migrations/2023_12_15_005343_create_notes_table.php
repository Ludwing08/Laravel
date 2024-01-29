<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->string('description', 255)->nullable();
            $table->decimal('valor')->default(0.00);
            $table->boolean('done')->default(false);
            /*$table->unsignedInteger('example'); //entero positivo
            $table->bigInteger('example'); //entero grande - para claves foraneas
            $table->unsignedBigInteger('example');
            $table->text('example'); //textos de  mayor dimension 
            $table->enum('stade', ['DRAFT', 'PUBLISHED', 'DELETED']); */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
