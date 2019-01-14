@extends('layouts.admin')


@section('content')
     {!! Form::open(['route' => ['admin.posts.store'], 'method' =>'POST' , 'files' => true]) !!}
		@include('admin/posts/_form')
        <div class="pull-left">
            {{ link_to_route('admin.posts.index', 'Back', [], ['class' => 'btn btn-secondary']) }}
            {!! Form::submit('Create', ['class' => 'btn btn-success']) !!}
        </div>
    {!! Form::close() !!}
@endsection

