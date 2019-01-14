@extends('layouts.app')

@section('content')
	
	<h1 v-pre>{{ $post->title }}</h1>
	<a href="{{ route('home') }}" class="btn btn-primary">Back</a>
	<h3>Comments : {{ $post->comments->count() }}</h3>
	@foreach($post->commentsAuthor as $comment)
		<p>{{ $comment->content }}</p>
		<small>{{ $comment->author->fullname }}</small>
		<small>{{ $comment->posted_at->diffForHumans() }}</small>
	@endforeach
	
	<h3>Tag :
	@foreach($post->tags as $tag)
		<span>{{ $tag->name }}</span>
	@endforeach
	</h3>
	@include('posts/_form')

@endsection