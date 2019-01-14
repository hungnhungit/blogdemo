@extends('layouts.admin')


@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1>Categories <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Create Categories</a></h1>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Name</th>
						<th>Slug</th>
						<th>Parent</th>
						<th>Order</th>
						<th>Create_at</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($categories as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td>{{ $category->name }}</td>
						<td>{{ $category->slug }}</td>
						<th>{{ $category->parentId->name ?? 'NULL' }}</th>
						<td>{{ $category->order }}</td>
						<th>{{ $category->created_at->diffForHumans() }}</th>
						<td style="width: 150px">
							<a href="{{ route('admin.categories.edit',$category) }}" class="btn btn-primary">Edit</a>
							<a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-danger">Delete
								<form action="{{ route('admin.categories.destroy',$category) }}" method="post" style="display: none">
									@csrf
									<input type="hidden" name="_method" value="DELETE">
								</form>
							</a>
						</td>

					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection