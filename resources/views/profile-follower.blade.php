<x-profile :shareData="$shareData"  :pagetitle="ucwords($shareData['username']) . '\'s Followers'" >

 @include('profile-follower-only')

</x-profile>