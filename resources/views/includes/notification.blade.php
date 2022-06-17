<div class="notif display-n">
    <div class="notif__h">
        <div class="notif__h-t">Уведомления</div>
        <button class="notif__h-c"> <img src="/assets/svg/notif/close.svg" alt="icons"></button>
    </div>
    <ul class="notif__l">
        @foreach($notifications as $notification)
        <li class="notif__l-i"> <img src="/assets/svg/notif/car.svg" alt="icons">
            <div class="notif__l-t">
                <p>{!! $notification->text !!}</p><span>5 минут назад</span>
            </div>
            <div class="notif__l-s"> </div>
        </li>
        @endforeach
    </ul>
</div>
