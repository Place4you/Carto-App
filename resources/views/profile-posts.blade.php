<x-profile :shareData="$shareData" pagetitle="{{$shareData['username']}}'s Profile"  >
   @include('profile-posts-only')
</x-profile>