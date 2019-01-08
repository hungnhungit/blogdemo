@auth
<div class="form-comment">
	<form action="{{ route('comment.store') }}" method="post">
		@csrf
		<input type="hidden" name="post_id" value="{{ $post->id }}">
		<textarea name="comment" class="form-control" placeholder="Comment"></textarea>
		<input type="submit" value="Comment" class="btn btn-primary" style="margin-top: 10px;">
	</form>
</div>
@endauth