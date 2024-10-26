<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Like;
use App\Models\Notifications;
use App\Models\Post;
use Livewire\Component;

class LikeComponent extends Component
{
    public $post_id;
    public $isLiked;

    public function mount($postId){
        $this->post_id = $postId;
        // check if likes table then assign isLiked corresponding value..
        $checker = Like::where([['user_id',auth()->user()->id],['post_id',$this->post_id]])->first();
        $this->isLiked = $checker == null ? false : true;

    }

    public function likeUnlike(){
        // here we will perform like & unlike functionality
        if ($this->isLiked == false) {
            $this->isLiked = true;
            // here we create new  record in our likes table
            $likePost = new Like;
            $likePost->user_id = auth()->user()->id;
            $likePost->post_id = $this->post_id;
            $likePost->save();

            $postOwner = Post::find($this->post_id)->user_id;

            Notifications::create([
                'user_id' => $postOwner,
                'triggered_by' => auth()->user()->id,
                'type' => 'like',
                'reference_id' => $this->post_id,
                'is_read' => false,
            ]);
        }else{
            // on unlike we need to delete the data..
            $this->isLiked = false;
            $postOwner = Post::find($this->post_id)->user_id;
            Like::where([['user_id',auth()->user()->id],['post_id',$this->post_id]])
            ->delete();
            Notifications::where([['user_id',$postOwner],['triggered_by' ,auth()->user()->id],['reference_id',$this->post_id],['type','comment']])
            ->delete();
        }
    }
    public function render()
    {
        return view('livewire.like-component',[
            'likesCount' => Like::where('post_id',$this->post_id)->count()
            
        ]);
    }
}
