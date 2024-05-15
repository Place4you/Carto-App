<x-layout>
    <div class="container py-md-5 container--narrow">
        <form action="/create-post" method="POST">

          @csrf
          <div class="form-group">
            <label  for="post-title" class="text-muted mb-1"><small>Title</small></label>
            <input {{old('title')}} placeholder="Enter your title here" required name="title" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
            @error('title')
                <p class="m-0 shadow-sm alert-danger alert" >{{ $message }}</p>
            @enderror
          </div>
  
          <div class="form-group">
            <label for="post-body" class="text-muted mb-1"><small>Body Content</small></label>
            <textarea  {{old('body')}} placeholder="Write your Story here" required name="body" id="post-body" class="body-content tall-textarea form-control" type="text"></textarea>
            @error('body')
            <p class="m-0 shadow-sm alert-danger alert" >{{ $message }}</p>
        @enderror
          </div>
  
          <button class="btn btn-primary">Save New Post</button>
        </form>
      </div>
</x-layout>