<x-profile :shareData="$shareData"  >
  <div class="list-group">
    @foreach($following as $follow)
     <a href="/post/{{ $follow->userBeingFollowed->username}}" class="list-group-item list-group-item-action">
      <img class="avatar-tiny" src="{{ $follow->userBeingFollowed->avatar}}" />
      <b> {{ ucwords($follow->userBeingFollowed->username);  }}</b>
    </a>   
    @endforeach
  </div>
</x-profile>