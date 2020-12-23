<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class xuat extends Model
{
    public $table = "xuat";

	protected $fillable = [
        'sanpham_id','giaxuat' ,'soluong', 'tong', 'ngayxuat'
    ];
}

