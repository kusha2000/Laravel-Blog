<div class="row">
    {{-- here we will loop through all posts.. --}}
    @foreach ($posts as $post)
    <div class="col-xl-4 col-md-6">
        <div class="card">
            <div class="card-footer" style="display:flex;justify-content: space-between;">
                <div>
                    {{-- here we use anchor tag to make both profile-image component and name be clickable --}}
                    <a href="/view/profile/{{$post->user_id}}" wire:navigate>
                        <livewire:profile-image :userId="$post->user_id" />
                        <span class="text-muted mx-3 text-capitalize my-1"> {{$post->name}}</span>
                    </a>
                    <div class="col-xl-12">
                        <small class="text-muted">{{date('d-m-Y',strtotime($post->created_at))}}</small>
                    </div>
                </div>
                <livewire:follow-component :followedId="$post->followedId" />
            </div>
            <a href="/view/post/{{$post->id}}" wire:navigate wire:click="addViewers({{$post->id}})">

                <img src="{{ asset('storage/images/' .$post->photo) }}" height="200px" alt="" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">{{$post->post_title}}</h5>
                    <p class="line-clamp text-black">
                        {{ $post->content }}
                    </p>

                    </a>
                    <div class="row">

                        <livewire:like-component :postId="$post->id" />
                    </div>
                </div>


        </div>
    </div>
    @endforeach
</div>