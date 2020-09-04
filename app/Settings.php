<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
	protected $table = 'system_settings';
	protected $primaryKey = 'id_setting';
	protected $fillable = ['id_setting','name','value'];
}
