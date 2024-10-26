<?php

namespace App\Livewire;

use App\Models\Follower;
use App\Models\Notifications;
use Livewire\Component;

class FollowComponent extends Component
{
    public $followed_id;
    public $IFollowed; //this will be boolean
    public $number_followers;
    public function mount($followedId){
        $this->followed_id = $followedId;
        $this->number_followers = Follower::where('followed_id',$this->followed_id)->count();

        // 
         $checker = Follower::where([['follower_id',auth()->user()->id],['followed_id',$this->followed_id]])
        ->first();

        $this->IFollowed = $checker == null ? 0 : 1;
    }   

    public function followUnfollow(){
        // here we create a follow unfollow mechanism
        // check if this logged user already followed the user from post
        $checker = Follower::where([['follower_id',auth()->user()->id],['followed_id',$this->followed_id]])
        ->first();

        if ($checker == null) {
            // create a data 
            $createFollow = new Follower;
            $createFollow->follower_id = auth()->user()->id;
            $createFollow->followed_id = $this->followed_id;
            $createFollow->save();

            Notifications::create([
                'user_id' => $this->followed_id,
                'triggered_by' => auth()->user()->id,
                'type' => 'follow',
                'reference_id' => 0,
                'is_read' => false,
            ]);

            $this->number_followers = Follower::where('followed_id',$this->followed_id)->count();
            $checker = Follower::where([['follower_id',auth()->user()->id],['followed_id',$this->followed_id]])
            ->first();
        } else {
            # unfollow by deleting the data..
            $deleteFollow = Follower::where([['follower_id',auth()->user()->id],['followed_id',$this->followed_id]])
            ->delete();
            $this->number_followers = Follower::where('followed_id',$this->followed_id)->count();
            $checker = Follower::where([['follower_id',auth()->user()->id],['followed_id',$this->followed_id]])
            ->first();
            Notifications::where([['user_id',$this->followed_id],['triggered_by',auth()->user()->id]])
            ->delete();
        }   

        $this->IFollowed = $checker == null ? 0 : 1;
         
    }
    public function render()
    {
        return view('livewire.follow-component',[]);
    }
}
