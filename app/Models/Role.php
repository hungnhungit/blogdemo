<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Contracts\Role as RoleContract;
class Role extends Model implements RoleContract
{

	protected $guards = [
		'id'
	];

    protected $fillable = [
    	'name',
    	'guard_name'
    ];

    protected $with = [
    	'permissions'
    ];

    public function users(){
        $this->belongsToMany(User::class);
    }

    public function permissions(){
    	return $this->belongsToMany(Permission::class,'role_permission');
    }
}
