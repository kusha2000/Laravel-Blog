<div class="col-xl-12"  style="display:flex;justify-content: space-between;">
    @if ($isLiked == false)
    <div>
    <i class="bi bi-heart float-end" style="cursor: pointer;" wire:click.prevent="likeUnlike"></i> <span class="text-muted float-end mx-2">{{$likesCount}}</span>

    </div>
    @else
    <div>
    <i class="bi bi-heart-fill float-end" style="cursor: pointer;" wire:click.prevent="likeUnlike"></i><span class="text-muted float-end mx-2">{{$likesCount}}</span>

    </div>
    @endif
    <livewire:post-viewers-count :postId="$post_id" />

</div>