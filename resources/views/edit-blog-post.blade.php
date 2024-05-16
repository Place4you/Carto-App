<x-layout pagetitle="Edit Blogpost">
    <div class="container py-md-5 ">

        <form action="/post/{{$post->id}}/" method="POST">
          @csrf
          @method('put')
          <a href="/profile/{{ auth()->user()->username}}"><b>&laquo  &laquo Return back to Home:</b></a>
          <div class="form-group">
            <label  for="post-title" class="text-muted mb-1"><small>Title</small></label>
            <input value="{{old('title',$post->title)}}"  name="title" id="post-title" class="form-control form-control-lg form-control-title" type="text" placeholder="" autocomplete="off" />
            @error('title')
                <p class="m-0 shadow-sm alert-danger alert" >{{ $message }}</p>
            @enderror
          </div>
  
          <div class="form-group">
            <label for="post-body" class="text-muted mb-1"><small>Body Content</small></label>
            <textarea  value="{{old('body')}}"  name="body" id="post-body" class="body-content tall-textarea form-control" type="text">{{old('body',$post->body)}}</textarea>
            @error('body')
            <p class="m-0 shadow-sm alert-danger alert" >{{ $message }}</p>
        @enderror
          </div>
  
          <button class="btn btn-primary">Save New Changes</button>
        </form>
      </div>
</x-layout>