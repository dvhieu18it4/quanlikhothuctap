<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Xuat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {    Schema::create('xuat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sanpham_id');           
            $table->integer('giaxuat');
            $table->integer('soluongxuat');
            $table->date('ngayxuat'); 
            $table->integer('tongxuat'); 
            $table->timestamps();
    });

    Schema::table('xuat', function($table)
        {
           $table->foreign('sanpham_id')->references('id')->on('sanpham');
        
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xuat');
    }
}
