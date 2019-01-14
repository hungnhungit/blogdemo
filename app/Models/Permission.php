<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = [
    	'name',
    	'guard_name'
    ];

    const PERMISSION = [
    	'create',
    	'read',
    	'delete',
    	'update'
    ];

    public static function createPermission(string $name,string $guard){
    	$models = [];

    	foreach (self::PERMISSION as $permission) {
    		$models[] = static::findOrCreate([
    			'name' => $name."-".$permission,
    			'guard_name' => $guard
    		]);
    	}
    	return collect($models);
    }
}
