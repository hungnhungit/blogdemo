<?php 

use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Category;
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

if(!function_exists('subcategories')){
	function subcategories ($categories,$str = '',$parent_id = null){
	    foreach ($categories as $category) {
	    	if($category->id === $parent_id){
	    		echo "<option selected='selected' value='{$category->id}''>{$category->name}</option>";
	    	}else{
	    		echo "<option value='{$category->id}'>{$str}{$category->name}</option>";
	    	}
	    	if(Category::where('parent_id',$category->id)->exists()){
	    		$subcategories = Category::where('parent_id',$category->id)->get();
	    		subcategories($subcategories,$str .= '-',$parent_id);
	    		$str = '';
	    	}
	    }
	}
}

 ?>