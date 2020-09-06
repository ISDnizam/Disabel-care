<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
	protected $table = 'module_product';
	protected $primaryKey = 'id_product';
	protected $fillable = ['id_product','title','description','image','price','id_product_category'];
	use SoftDeletes;
	public  function productCategory()
    {
        return $this->belongsTo('App\ProductCategory','id_product_category');
    }
}
