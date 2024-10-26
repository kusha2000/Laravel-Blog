<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function getNotifications(Request $request) {
        $user = Auth::user();

        // Fetch notifications for the authenticated user
        $notifications = Notifications::where('user_id', $user->id)
            ->where('is_read', 0) // Only get unread notifications
            ->latest()
            ->get()
            ->map(function ($notification) {
                // Get the triggered user's name using the triggered_id
                $triggeredUser = User::find($notification->triggered_by);
                $userName = $triggeredUser ? $triggeredUser->name : 'User';

                // Construct the notification message
                $action = '';
                switch ($notification->type) {
                    case 'like':
                        $action = 'liked your post';
                        break;
                    case 'comment':
                        $action = 'commented on your post';
                        break;
                    case 'follow':
                        $action = 'followed you';
                        break;
                }

                return [
                    'id' => $notification->id,
                    'message' => "{$userName} {$action}", // Construct the message
                    'created_at' => $notification->created_at,
                    'is_read' => $notification->is_read // Include is_read status
                ];
            });

        return response()->json($notifications);
    }

    public function markAsRead($id)
    {
        $notification = Notifications::find($id);
        if ($notification) {
            $notification->is_read = 1; 
            $notification->save();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }
}
