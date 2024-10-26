<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\PostViewers;
use Livewire\Component;

class PostViewersCount extends Component
{
    public $post_viewers;
    public $comment_count;
    public function mount($postId){
        // count the viewers of specific post
        $this->post_viewers = PostViewers::where('post_id', $postId)
    ->distinct('user_id') 
    ->count('user_id');
        $this->comment_count=Comment::where('post_id',$postId)->count();
    }
    public function render()
    {
        return view('livewire.post-viewers-count');
    }
}
