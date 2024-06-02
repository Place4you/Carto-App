<div class="list-group">
    @foreach($posts as $post)
        <div class="list-group-item d-flex justify-content-between align-items-center">
            <div>
                <img class="avatar-tiny" src="{{ $post->user->avatar }}" />
                <a href="/post/{{ $post->id }}"><strong>{{ $post->title }}</strong></a>
                <span>on {{ $post->created_at->format('n/j/Y') }}</span>
            </div>
            <div>
                @can('update', $post)
                    <a href="/post/{{ $post->id }}/edit" class="btn btn-sm btn-primary mr-2 rounded-pill" data-toggle="tooltip" data-placement="top" title="Edit">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form class="d-inline" action="/post/{{ $post->id }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger rounded-pill" data-toggle="tooltip" data-placement="top" title="Delete">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                @endcan
            </div>
        </div>
    @endforeach
</div>
