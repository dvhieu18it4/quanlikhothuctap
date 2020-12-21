<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Nhap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhap', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('sanpham_id');           
            $table->integer('gianhap');
            $table->integer('soluong');
            $table->date('ngaynhap'); 
            $table->integer('tong'); 
            $table->timestamps();
        });

        Schema::table('nhap', function($table)
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
        Schema::dropIfExists('nhap');
    }
}
