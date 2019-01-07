<?php 

use Illuminate\Support\Carbon;

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

 ?>