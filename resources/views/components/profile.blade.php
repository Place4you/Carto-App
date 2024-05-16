<x-layout  pagetitle="{{$shareData['username']}}'s Profile">

    <div class="container py-md-5 ">
        <h2>
            <img class="avatar-small" src="{{ $shareData['avatar']}}" /> 
            <b> 
                {{ucwords($shareData['username']) }}
            </b>
    
            {{-- Show only to auth user --}}
            @auth
                @if (!$shareData['following'])
                    <form class="ml-2 d-inline" action="/create-follow/{{$shareData['username']}}" method="POST">
                        @csrf
    
                        @if(auth()->user()->id != $shareData['user']->id)
                            <button class="btn btn-primary btn-sm">Follow <i class="fas fa-user-plus"></i></button>
                        @endif
    
                        @if(auth()->user()->id == $shareData['user']->id)
                            <a href="/manage-avatar" class="btn btn-secondary btn-sm mx-2">Manage Avatar</a>
                        @endif
    
                        @if ($shareData['user']->isAdmin === 1)
                            <span class="badge badge-pill badge-warning text-white">Admin</span>
                        @endif
                    </form>
                @endif
            
                @if ($shareData['following'] && auth()->user()->username != $shareData['username'])
                    <form class="ml-2 d-inline" action="/remove-follow/{{$shareData['username']}}" method="POST">
                        @csrf
    
                        @if(auth()->user()->id != $shareData['user']->id)
                            <button class="btn btn-danger btn-sm">Stop Following <i class="fas fa-user-times"></i></button>
                        @endif
    
                        @if(auth()->user()->id == $shareData['user']->id)
                            <a href="/manage-avatar" class="btn btn-secondary btn-sm mx-2">Manage Avatar</a>
                        @endif
                        
                        @if ($shareData['user']->isAdmin === 1)
                            <span class="badge badge-pill badge-warning text-white">Admin</span>
                        @endif
                    </form>
                @endif
            @endauth
        </h2>
    
        <div class="profile-nav nav nav-tabs pt-2 mb-4">
            <a href="/profile/{{$shareData['username']}}" class="profile-nav-link nav-item nav-link {{Request::Segment(3) == "" ? "active" : ""}}">Post: {{ $shareData['postcount'] }}</a>
            <a href="/profile/{{$shareData['username']}}/follower" class="profile-nav-link nav-item nav-link {{ Request::Segment(3) == "follower" ? "active" : ""}}">Followers: {{ $shareData['followercount'] }}</a>
            <a href="/profile/{{$shareData['username']}}/following" class="profile-nav-link nav-item nav-link {{ Request::Segment(3) == "following" ? "active" : ""}}">Following:  {{ $shareData['followingcount'] }}</a>
        </div>
    
        <div class="profile-slot-content">
            {{ $slot }}
        </div>
    
    </div>
    


  </x-layout>
