<x-layout>

    <div class="container d-flex flex-column justify-content-start align-items-center bg-light" style="height: 60vh;">
        <h1 class="mb-4">Upload Your Avatar Here</h1>
    
        <form action="/manage-avatar" method="POST" enctype="multipart/form-data" class="w-100">
            @csrf
                <input type="file" name="avatar" class="form-control-file" required>
                <button type="submit" name="submit" class="btn btn-dark my-3">Upload</button>
        </form>
        @error('avatar')
         <p class="justify-content-start alert alert-danger mt-2">{{ $message}}</p>
        @enderror
    </div>
    
</x-layout>