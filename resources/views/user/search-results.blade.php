@extends('layouts/user-layout')

@section('space-work')
<div class="container">
    <h2>Search Results for "{{ $query }}"</h2>
    <div class="row">
        @forelse($posts as $post)
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-footer" style="display:flex;justify-content: space-between;">
                        <div>
                            <a href="/view/profile/{{$post->user_id}}" wire:navigate>
                                <livewire:profile-image :userId="$post->user_id" />
                                <span class="text-muted mx-3 text-capitalize my-1"> {{$post->user->name}}</span>
                            </a>
                            <div class="col-xl-12">
                                <small class="text-muted">{{ date('d-m-Y', strtotime($post->created_at)) }}</small>
                            </div>
                        </div>
                        <livewire:follow-component :followedId="$post->user_id" />
                    </div>
                    <a href="/view/post/{{ $post->id }}" wire:navigate wire:click="addViewers({{ $post->id }})" class="card-link mx-1">
                    <img src="{{ asset('storage/images/' . $post->photo) }}" height="200px" alt="" class="card-img-top">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->post_title }}</h5>
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
        @empty
            <p>No posts found for "{{ $query }}".</p>
        @endforelse
    </div>
</div>
@endsection
