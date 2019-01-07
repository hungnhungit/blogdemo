@extends('layouts.app')

@section('content')
	<h1>Post Index</h1>
	@include('posts/_search')
	@include('posts/_list')
@endsection