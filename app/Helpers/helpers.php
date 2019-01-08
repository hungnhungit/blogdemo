<?php 

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
if(!function_exists('humanize_date')){
	function humanize_date(Carbon $date, string $format = 'd F Y, H:i'): string{
    	return $date->format($format);
	}
}

if(!function_exists('rand_color')){
	function rand_color() {
	    return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
	}
}
if(!function_exists('set_active')){
	function set_active ($route){
	    if(is_array($route)){
	        return in_array(request()->path(), $route) ? 'active' : '';
	    }
	    return request()->path() === $route ? 'active' : '';
	}
}
 ?>