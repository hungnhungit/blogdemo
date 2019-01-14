<?php 

namespace App\Traits;

trait HasPermissions{

	public function hasPermission($name)
    {	
        $_permissions = collect($this->roles)
                              ->pluck('permissions')->flatten()
                              ->pluck('name')->unique()->toArray();
        return in_array($name, $_permissions);
    }




}


 ?>