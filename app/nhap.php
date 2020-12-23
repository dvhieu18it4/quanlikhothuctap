<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhap extends Model
{
    public $table = "nhap";

	protected $fillable = [
        'sanpham_id','gianhap' ,'soluong', 'tong', 'ngaynhap'
    ];
}
