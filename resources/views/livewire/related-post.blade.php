<div class="news" style="margin-bottom: 10px;">
    @foreach ($related_posts as $item)
        <div class="post-item clearfix" wire:key="{{$item->id}}" style="border: 1px solid black;">
        <div class="row">
            <div class="col-md-3">
                <img src="{{ asset('storage/images/' .$item->photo) }}"  alt="" height="70px" width="70px">
            </div>
            <div class="col-md-9">
                <h6><a href="/view/post/{{$item->id}}" wire:navigate>{{$item->post_title}}</a></h6>
                <p>{{str($item->content)->words(7)}}</p>
            </div>
        </div>
            
        </div>
    @endforeach

</div>