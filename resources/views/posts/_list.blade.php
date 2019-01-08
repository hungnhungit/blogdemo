
<div class="card-columns mt-5">
    @each('posts/_show', $posts, 'post', 'posts/_empty')
</div>

<div class="d-flex justify-content-center">
    {{ $posts->appends($_GET) }}
</div>