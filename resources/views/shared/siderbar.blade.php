<ul class="list-group">
	<li class="list-group-item">Categories</li>
	<li class="list-group-item {{ set_active('/') }}"><a href="{{ route('home') }}">All</a></li>
	@foreach($categories as $category)
		<li class="list-group-item {{ set_active('categories/'.$category->slug) }}"><a href="{{ route('categories.show',$category->slug) }}">{{ $category->name }}</a><span class="badge">{{ $category->posts_count }}</span></li>
	@endforeach
</ul>