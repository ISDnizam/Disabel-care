<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
	protected $table = 'module_product_category';
	protected $primaryKey = 'id_product_category';
    protected $fillable = ['id_product_category','category_name'];
    public function product()
    {
        return $this->hasMany('App\Product','id_product');

    }

  
}
