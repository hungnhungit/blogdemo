@extends('layouts.app')

@section('content')
	
	<h1 v-pre>{{ $post->title }}</h1>
	<a href="{{ route('home') }}" class="btn btn-primary">Back</a>
	<h3>Comments : {{ $post->comments->count() }}</h3>
	@foreach($post->comments as $comment)
		<p>{{ $comment->content }}</p>
		<small>{{ $comment->author->fullname }}</small>
		<small>{{ humanize_date($comment->posted_at) }}</small>
	@endforeach
@endsection