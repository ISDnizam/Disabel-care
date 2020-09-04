<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'module_product';
	protected $primaryKey = 'id_product';
	protected $fillable = ['id_product','title','description','image'];
}
