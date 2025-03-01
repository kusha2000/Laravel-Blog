@extends('layouts/user-layout')
@section('space-work')
<div class="container">
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <div class="col-xl-12" style="display:flex;justify-content: space-between;margin-top: 15px;margin-bottom: 15px;">
                                
                                <div>
                                <a href="/view/profile/{{$post_data->user_id}}" wire:navigate>
                                    <livewire:profile-image :userId="$post_data->user_id" />
                                    <span class="text-muted mx-3 text-capitalize my-1"> {{$post_data->name}}</span>
                                </a>
                                <div>
                                <i class="bi bi-calendar"></i>
                                <span class="text-muted">{{date('d-m-Y h:i',strtotime($post_data->created_at))}}</span> <br>
                                </div>
                                </div>
                                <livewire:follow-component :followedId="$post_data->user_id" />
                            </div>
                    <img src="{{ asset('storage/images/' .$post_data->photo) }}" alt="" class="card-img-top">
                    <div class="row my-2">

                        {{-- let's shift this div to like component & let's pass post_id to this component --}}
                        <livewire:like-component :postId="$post_data->id" />
                    </div>
                    <h2 class="text-primary">{{$post_data->post_title}}</h2>
                    <p>{{$post_data->content}}</p>
                    <hr>
                    <h6 class="card-title">Leave a comment</h6>
                    <livewire:post-comment :postId="$post_data->id" />
                </div>
            </div>
        </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body pb-0">
                    <h5 class="card-title">More posts from {{$post_data->name}}</h5>

                    <livewire:related-post :userId="$post_data->user_id" />
                </div>
            </div>
        </div>
    </div>
</div>
@endsection