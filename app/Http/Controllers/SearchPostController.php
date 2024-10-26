<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchPostController extends Controller
{
    public function search(Request $request)
    {
        $logged_user = Auth::user();
        $user_profile_data = UserProfile::where('user_id',$logged_user->id)->first();
        $user_image = $user_profile_data->image;


        $query = $request->input('query');

        // Perform a search for posts based on the query
        $posts = Post::where('post_title', 'LIKE', "%{$query}%")
            ->orWhere('content', 'LIKE', "%{$query}%")
            ->with('user') // Eager load the user relationship
            ->get();

        return view('user.search-results', compact('posts', 'query','logged_user','user_image'));
    }
}
