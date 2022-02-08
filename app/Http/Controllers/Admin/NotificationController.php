<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Notification;

class NotificationController extends Controller
{

    public function readNotif(Request $request){

        $id = $request->get('id');
        $next = $request->get('next');
         /** @var User */
         $user = Auth()->user();
         $user->unreadNotifications->where('id', $id)->markAsRead();
         return redirect()->to($next);
         
    }
    /**
     * Get the new notification data for the navbar notification.
     *
     * @param Request $request
     * @return Array
     */
    public function getNotificationsData(Request $request)
    {
        // For the sake of simplicity, assume we have a variable called
        // $notifications with the unread notifications. Each notification
        // have the next properties:
        // icon: An icon for the notification.
        // text: A text for the notification.
        // time: The time since notification was created on the server.
        // At next, we define a hardcoded variable with the explained format,
        // but you can assume this data comes from a database query.

        /** @var User */
        $user = Auth()->user();

        $notifications_data = $user->unreadNotifications;

        // Now, we create the notification dropdown main content.

        $dropdownHtml = '';
        $i = 0;
        foreach ($notifications_data as $not) {
            $time = "<span class='d-block text-right text-muted text-xs'>
                   {$not->created_at->format('d-M-Y H:i:s')}
                 </span>";

            $url = route('notifications.read',["id"=> $not->id,"next" =>$not->data['url'] ?? ""]);

            $dropdownHtml .= "<a href='$url' style='white-space:initial' class='d-flex flex-column text-sm dropdown-item'>
                            {$not->data['messages']}{$time}
                          </a>";
            if($i == 4){
                break;
            }
            if ($i < count($notifications_data) - 1) {
                // $dropdownHtml .= "<div class='dropdown-divider'></div>";
            }
            $i++;
        }

        // Return the new notification data.

        return [
            'label'       => count($notifications_data),
            'label_color' => 'danger',
            'icon_color'  => 'light',
            'last_id'       => $notifications_data?->first()->id ?? null,
            'dropdown'    => $dropdownHtml,
            'notification_data' => $notifications_data
        ];
    }


    public function show(){
        /** @var User */
        $user = Auth()->user();

        $notifications = $user->unreadNotifications;

        return view('admin.notification.index',['data' => $notifications]);
    }
}
