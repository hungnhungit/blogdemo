@extends('layouts.admin')


@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1>Post</h1>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Title</th>
						<th>Slug</th>
						<th>Author By</th>
						<th>Categories</th>
						<th>Created_at</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
					<tr>
						<td>{{ $post->id }}</td>
						<td>{{ $post->title }}</td>
						<td>{{ $post->slug }}</td>
						<td>{{ $post->author->fullname }}</td>
						<td>{{ $post->category->name ?? 'NULL' }}</td>
						<td style="width: 200px">{{ $post->posted_at }}</td>
						<td style="width: 150px">
							<a href="{{ route('admin.posts.edit',$post) }}" class="btn btn-primary">Edit</a>
							<a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn btn-danger">Delete
								<form action="{{ route('admin.posts.destroy',$post) }}" method="post" style="display: none">
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