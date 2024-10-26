<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Notifications;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostComment extends Component
{
    public $post_id;
    public $comment = ''; // The model from form
    public $postComments;

    public function mount($postId)
    {
        $this->post_id = $postId;
        $this->postComments = Comment::join('users', 'users.id', '=', 'comments.user_id')
            ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
            ->where('post_id', $this->post_id)
            ->get(['users.name', 'comments.*', 'user_profiles.image']);
    }

    public function leaveComment()
    {
        $this->validate([
            'comment' => 'required'
        ]);

        // Create a comment
        $createComment = new Comment;
        $createComment->user_id = auth()->user()->id;
        $createComment->post_id = $this->post_id;
        $createComment->comment = $this->comment;
        $createComment->save();

        $postOwner = Post::find($this->post_id)->user_id;

        Notifications::create([
            'user_id' => $postOwner,
            'triggered_by' => auth()->user()->id,
            'type' => 'comment',
            'reference_id' => $this->post_id,
            'message'=>$this->comment,
            'is_read' => false,
        ]);

        

            $this->postComments = Comment::join('users', 'users.id', '=', 'comments.user_id')
        ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
        ->where('post_id', $this->post_id)
        ->get(['users.name', 'comments.*', 'user_profiles.image']);
    }

    public function deleteComment($commentId)
    {
        // Find the comment by ID
        $comment = Comment::find($commentId);
        
        // Check if the comment exists and if the authenticated user is the owner
        if ($comment && $comment->user_id === Auth::id()) {
            $comment->delete(); // Delete the comment

            // Emit an event to notify the front end
            $this->refreshComments();

            $postOwner = Post::find($this->post_id)->user_id;

            Notifications::where([['user_id',$postOwner],['triggered_by' ,auth()->user()->id],['reference_id',$this->post_id],['type','comment'],['message',$this->comment]])
            ->delete();
            
            session()->flash('message', 'Comment deleted successfully.'); 
        } else {
            session()->flash('error', 'You can only delete your own comments.'); 
        }
    }

    public function render()
    {
        return view('livewire.post-comment');
    }
    public function refreshComments()
{
    // Re-fetch the comments from the database
    $this->postComments = Comment::join('users', 'users.id', '=', 'comments.user_id')
        ->join('user_profiles', 'user_profiles.user_id', '=', 'users.id')
        ->where('post_id', $this->post_id)
        ->get(['users.name', 'comments.*', 'user_profiles.image']);
}
}
