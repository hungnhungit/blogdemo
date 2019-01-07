<div class="card">
  <div class="card-body">
    <h4 v-pre class="card-title"><a href="{{ route('posts.show',$post->slug) }}" style="color:{{ rand_color() }}">{{$post->title}}</a></h4>
    <p class="card-text">
      <small class="text-muted">{{ humanize_date($post->posted_at) }}</small>
      <small class="text-muted" style="font-weight: bold">{{ isset($post->category->name) ? $post->category->name : "" }}</small>
      <small class="text-muted" style="font-weight: bold;">Tag : {{ $post->tags_count }}</small>
      <small class="text-muted" style="font-weight: bold;">Comment : {{ $post->comments_count }}</small>
      <p class="card-text"><small v-pre class="text-muted">{{ $post->author->fullname }}</small></p>
    </p>
  </div>
</div>