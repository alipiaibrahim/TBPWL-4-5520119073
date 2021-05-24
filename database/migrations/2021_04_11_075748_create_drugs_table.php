<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrugsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drugs', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->unique();
            $table->string('jenis');
            
            // $table->bigInteger('categories')->unsigned();
            // $table->bigInteger('brands')->unsigned();
            $table->foreignId('categories')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('brands')->references('id')->on('brands')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('stok');
            $table->string('harga');
            $table->string('cover')->nullable();
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
        Schema::dropIfExists('drugs');
    }
}
