@extends('layouts.admin')


@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1>Post <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Create Post</a></h1>
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>Slug</th>
						<th>Author By</th>
						<th>Categories</th>
						<th>Image</th>
						<th>Created_at</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $index=>$post)
					<tr>
						<td>{{ $post->id }}</td>
						<td>{{ $post->slug }}</td>
						<td>{{ $post->author->fullname }}</td>
						<td style="width: 150px">{{ $post->category->name ?? 'NULL' }}</td>
						<td style="text-align: center;"><img src="{{ Storage::url('images/'.$post->image) }}" width="70" height="70"></td>
						<td>{{ $post->posted_at->diffForHumans() }}</td>
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
			{{ $posts->links() }}
		</div>
	</div>
@endsection