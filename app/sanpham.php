<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    public $table = "sanpham";

	protected $fillable = [
        'tensp','ncc' ,'thongtin', 
    ];

}
