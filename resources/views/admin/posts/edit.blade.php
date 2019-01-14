@extends('layouts.admin')


@section('content')
    {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'method' =>'PUT' , 'files' => true]) !!}
		@include('admin/posts/_form')
        <div class="pull-left">
            {{ link_to_route('admin.posts.index', 'Back', [], ['class' => 'btn btn-secondary']) }}
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection