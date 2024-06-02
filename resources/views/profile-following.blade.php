<x-profile :shareData="$shareData"  pagetitle="{{$shareData['username']}}'s Following List" >
  @include('profile-following-only');
</x-profile>
