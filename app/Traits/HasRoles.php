<?php 


namespace App\Traits;

use App\Models\Role;

trait HasRoles{

	use HasPermissions;

	public function roles(){
		return $this->belongsToMany(Role::class)->withTimestamps();
	}

	public function hasRole($name)
    {
        $roles = $this->roles()->pluck('name')->toArray();
        foreach ((is_array($name) ? $name : [$name]) as $role) {
            if (in_array($role, $roles)) {
                return true;
            }
        }
        return false;
    }	

	public function attachRole(...$roles){
		
		$roles = collect($roles)
            ->flatten()
            ->map(function ($role) {
                if (empty($role)) {
                    return false;
                }
                return Role::find($role);
            })
            ->filter(function($role){
            	return $role instanceof Role;
            })
            ->map->id
            ->all();
		$this->roles()->sync($roles,false);
		
	}

	public function syncRoles(...$roles){
        $this->roles()->detach();
        return $this->attachRole($roles);
    }




}


 ?>