<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
	protected $table = 'module_gallery';
	protected $primaryKey = 'id_gallery';
	protected $fillable = ['id_gallery','name','type','full_path'];
}
