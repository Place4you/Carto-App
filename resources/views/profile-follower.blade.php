<x-profile :shareData="$shareData"  pagetitle="{{$shareData['username']}}'s Following List" >

    <div class="list-group">
    @foreach($followers as $follow)
        <a href="/profile/{{ $follow->follower->username }}" class="list-group-item list-group-item-action">
            <img class="avatar-tiny" src="{{ $follow->follower->avatar }}" />
            <b> {{ ucwords($follow->follower->username);  }}</b>
        </a>   
    @endforeach
    
    
</div>

</x-profile>