<x-profile :shareData="$shareData"  pagetitle="{{$shareData['username']}}'s Following List" >
  <div class="list-group">
    @foreach($following as $follow)
     <a href="/profile/{{ $follow->userBeingFollowed->username}}" class="list-group-item list-group-item-action">
      <img class="avatar-tiny" src="{{ $follow->userBeingFollowed->avatar}}" />
      <b> {{ ucwords($follow->userBeingFollowed->username);  }}</b>
      {{-- remove follow button --}}
      @if ($shareData['following'] && auth()->user()->username != $shareData['username'])
                    <form class="ml-2 d-inline" action="/remove-follow/{{$shareData['username']}}" method="POST">
                        @csrf
    
                        @if(auth()->user()->id != $shareData['user']->id)
                            <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
                        @endif
  
                    </form>
@endif

    </a>   
    @endforeach
  </div>
</x-profile>

{{-- @if ($shareData['following'] && auth()->user()->username != $shareData['username'])
                    <form class="ml-2 d-inline" action="/remove-follow/{{$shareData['username']}}" method="POST">
                        @csrf
    
                        @if(auth()->user()->id != $shareData['user']->id)
                            <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
                        @endif
  
                    </form>
@endif --}}