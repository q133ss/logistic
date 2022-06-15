<div class="menuService">
    <div class="menuService-tab"><a class="menuService-elem" href="#"><img src="/assets/svg/service/truck.svg" alt="icons">
            <p>Добавить машину</p></a><a class="menuService-elem" href="#"><img src="/assets/svg/service/map.svg" alt="icons">
            <p>Машины на маршрутах</p></a><a class="menuService-elem" href="#"><img src="/assets/svg/service/briefcase.svg" alt="icons">
            <p>Транспортные компа...
            <div>(2)</div>
            </p></a></div>
    <div class="menuService-info"><a class="menuService-elem" href="#"><img src="/assets/svg/service/phone.svg" alt="icons">
            <p>Поддержка</p></a><a class="menuService-elem" href="#"><img src="/assets/svg/service/bell.svg" alt="icons">
            <p>Уведомления <span>(20)</span></p></a><a class="menuService-elem" href="#"><img src="/assets/svg/service/settings.svg" alt="icons">
            <p>Настройки</p></a></div>
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
