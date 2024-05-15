<x-layout>

    
    <div class="container py-md-5 ">
        <h2 class="text-center mb-4">The Latest From Those You Follow</h2>
        @foreach($posts as $post)
        <a href="/post/{{ $post->id}}" class="list-group-item list-group-item-action">
         <img class="avatar-tiny" src="{{ $post->user->avatar}}" />
         <strong>{{ $post->title }}</strong> on {{ $post->created_at->format('n/j/Y')}}
       </a>   
       @endforeach

       <div class="mt-2">
       {{ $posts->links() }}
        </div>
      </div>
  
</x-layout>