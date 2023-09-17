
<a href="/single-post/{{ $post->id }}" class="col-md-6">
    <div class="card mb-3" style="max-width: 540px;">
        <div class="card-body d-flex gap-3">
            <img src="/storage/{{ json_decode($post->images)[0] }}" class="rounded-start cardImage page-bg" alt="...">
            <div>
                <h5 class="card-title m-0 text-capitalize">{{ $post->title }}</h5>
                <h4 class="mt-1">Tk {{ $post->price }}</h4>
                <p class="card-text text-muted">{{ Str::limit($post->short_details, 50) }}</p>
                <small class="text-muted">Post By: {{ $post->user->name  }}, {{ $post->updated_at->diffForHumans() }}</small>
            </div>
        </div>
    </div>
</a>
