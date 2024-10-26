<button class="btn btn-sm m-2 {{ $IFollowed ? 'btn-outline-primary' : 'btn-primary' }}" wire:click.prevent="followUnfollow({{$followed_id}})">
    {{ $IFollowed ? 'Unfollow' : 'Follow' }} {{$number_followers}}
</button>
