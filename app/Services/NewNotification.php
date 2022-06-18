<?php
namespace App\Services;

use App\Models\Notification;
use App\Models\Order;
use App\Models\Status;
use App\Models\Waypoint;

class NewNotification{
    public function updateStatus($waypoint_id, $status_id){
        $waypoint = Waypoint::find($waypoint_id);
        $status = Status::find($status_id);
        $orders = Order::where('waypoint_id',$waypoint_id)->get();
        foreach ($orders as $order) {
            $notification = new Notification();
            $notification->waypoint_id = $waypoint_id;
            $notification->user_id = $order->user_id;

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

    public function updateWithMessage($waypoint_id, $message){
        $orders = Order::where('waypoint_id',$waypoint_id)->get();
        foreach ($orders as $order) {
            $notification = new Notification();
            $notification->waypoint_id = $waypoint_id;
            $notification->user_id = $order->user_id;
            $notification->text = $message;
            $notification->save();
        }
    }

    public function newOrder($waypoint_id){
        $notification = new Notification();
        $notification->user_id = 1;
        $notification->waypoint_id = $waypoint_id;
        $notification->text = 'Новый заказ на маршрут #'.$waypoint_id;
        $notification->save();
    }
}
