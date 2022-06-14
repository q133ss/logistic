<div class="menuCompany">
    <div class="menuCompany-tab"><a class="menuCompany-elem" href="{{route('company.index')}}"><img src="/assets/svg/company/truck.svg" alt="icons">
            <p>Добавить машину</p></a><a class="menuCompany-elem" href="{{route('company.waypoints')}}"><img src="/assets/svg/company/map.svg" alt="icons">
            <p>Машины на маршрутах</p></a></div>
    <div class="menuCompany-info"><a class="menuCompany-elem" href="#"><img src="/assets/svg/company/phone.svg" alt="icons">
            <p>Поддержка</p></a><a class="menuCompany-elem" href="#"><img src="/assets/svg/company/bell.svg" alt="icons">
            <p>Уведомления <span>(20)</span></p></a><a class="menuCompany-elem" href="#"><img src="/assets/svg/company/settings.svg" alt="icons">
            <p>Настройки</p></a></div>
    <button class="menuCompany-arrow"> <img src="/assets/svg/company/chevron-left.svg" alt="icons">
        <p>Свернуть панель</p>
    </button>
    <div class="menuCompany-hr"></div>
    <div class="menuCompany-profile">
        <div class="menuCompany-ph"> <picture><source srcset="/assets/img/Avatar.webp" type="image/webp"><img src="/assets/img/Avatar.png" alt="avatar"></picture></div>
        <div class="menuCompany-t">
            <h3>{{Auth()->user()->name}}</h3>
            <p>{{Auth()->user()->email}}</p>
        </div>
        <form action="{{route('logout')}}" method="POST">
            @csrf
            <button method="post" class="menuCompany-logout"><img src="/assets/svg/company/log-out.svg" alt="icons"></button>
        </form>
    </div>
</div>
