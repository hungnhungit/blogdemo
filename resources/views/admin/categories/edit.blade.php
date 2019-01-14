@extends('layouts.admin')


@section('content')
    {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' =>'PUT']) !!}
		@include('admin/categories/_form')
        <div class="pull-left">
            {{ link_to_route('admin.categories.index', 'Back', [], ['class' => 'btn btn-secondary']) }}
            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
        </div>
    {!! Form::close() !!}
@endsection