   
 <x-layout>  
   <div class="container py-md-5 ">
      <a href="/"><b>&laquo;&laquo; Return back to Home:</b></a>
    <div class="d-flex justify-content-between">
        <h2>{{ $post->title }}</h2>    

        @can('update', $post)
        <span class="pt-2">
          <a href="/post/{{$post->id}}/edit" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
            <i class="fas fa-edit"></i> <strong>Edit</strong>
          </a>
          <form class="delete-post-form d-inline" action="{{$post->id}}" method="POST">
            @csrf
            @method('delete')
            <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
              <i class="fas fa-trash"></i> <strong>Delete</strong>
            </button>
           </form>
        </span>    
        @endcan        

      </div>

      <p class="text-muted small mb-4">
        <a href="#"><img class="avatar-tiny" src="{{ $post->user->avatar}}" /></a>
        Posted by <a href="/profile/{{$post->user->username}}">{{ $post->user->username}}</a> on {{ $post->created_at->format('n/j/Y')}}
      </p>

      <div class="body-content">
      {!! $post->body !!}  
      </div>
    </div>
 </x-layout>