<div class="menuService">
    <div class="menuService-tab">
        <a class="menuService-elem" href="{{route('admin.create')}}"><img src="/assets/svg/service/truck.svg" alt="icons">
            <p>Добавить машину</p>
        </a>
        <a class="menuService-elem" href="{{route('admin.waypoints')}}"><img src="/assets/svg/service/map.svg" alt="icons">
            <p>Машины на маршрутах</p>
        </a>
        <a class="menuService-elem" href="{{route('admin.index')}}"><img src="/assets/svg/service/briefcase.svg" alt="icons">
            <p>Транспортные компа...
            <div>({{\App\Models\User::where('confirm', 0)->get()->count()}})</div>
            </p>
        </a>
    </div>
    <div class="menuService-info">
        <a class="menuService-elem" href="#">
            <img src="/assets/svg/service/phone.svg" alt="icons">
            <p>Поддержка</p>
        </a>
        <a class="menuService-elem" onclick="open_notifications()" href="#"><img src="/assets/svg/service/bell.svg" alt="icons">
            <p>Уведомления <span id="notif-count">({{Auth()->user()->get_notifications->where('is_old',0)->count()}})</span></p>
        </a>
        <a class="menuService-elem" href="#"><img src="/assets/svg/service/settings.svg" alt="icons">
            <p>Настройки</p>
        </a>
    </div>
    <button class="menuService-arrow"> <img src="/assets/svg/service/chevron-left.svg" alt="icons">
        <p>Свернуть панель</p>
    </button>
    <div class="menuService-hr"></div>
    <div class="menuService-profile">
        <div class="menuService-ph"> <picture><source srcset="/assets/img/Avatar.webp" type="image/webp"><img src="/assets/img/Avatar.png" alt="avatar"></picture></div>
        <div class="menuService-t">
            <h3>{{Auth()->user()->name}}</h3>
            <p>{{Auth()->user()->email}}</p>
        </div>
        <form action="{{route('logout')}}" method="POST">
            @csrf
        <button class="menuService-logout"><img src="/assets/svg/service/log-out.svg" alt="icons"></button>
        </form>
    </div>
</div>

<script>
    function open_notifications(){
        $.ajax({
            url:     '/api/read-notifications',
            type:     "POST",
            //dataType: "html", //формат данных
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: 1,
            success: function(response) { //Данные отправлены успешно
                $('#notif-count').text('(0)');
                console.log(response);
            },
            error: function(response) { // Данные не отправлены
                console.log(response);
            }
        });

        $('.notif').toggleClass('display-n');
    }
</script>
