<?php
namespace App\Services;

use App\Models\Notification;
use App\Models\Status;
use App\Models\Waypoint;

class NewNotification{
    public function updateStatus($waypoint_id, $status_id){
        $waypoint = Waypoint::find($waypoint_id);
        $status = Status::find($status_id);
        $notification = new Notification();
        $notification->user_id = $waypoint->get_user['id'];
        $notification->waypoint_id = $waypoint_id;
        if ($status->id == 1 || $status->id == 2) {
            $notification->text = 'Транспорт с номером <span>' . $waypoint->car_number . '</span> ' . $status->name;
        } elseif ($status->id == 3) {
            $notification->text = 'Транспорт с номером <span>' . $waypoint->car_number . '</span> ' . 'завершил поездку';
        } elseif ($status->id == 4) {
            $notification->text = 'Транспорт с номером <span>' . $waypoint->car_number . '</span> ' . 'отменил поездку';
        }
        $notification->save();
    }
}
