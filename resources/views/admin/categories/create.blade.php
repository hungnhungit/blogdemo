@extends('layouts.admin')


@section('content')
     {!! Form::open(['route' => ['admin.categories.store'], 'method' =>'POST']) !!}
		@include('admin/categories/_form')
        <div class="pull-left">
            {{ link_to_route('admin.categories.index', 'Back', [], ['class' => 'btn btn-secondary']) }}
            {!! Form::submit('Create', ['class' => 'btn btn-success']) !!}
        </div>
    {!! Form::close() !!}
@endsection

