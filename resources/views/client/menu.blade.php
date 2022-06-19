<div class="menuCarrier">
{{--    <div class="menuCarrier-tab">--}}
{{--        <a class="menuCarrier-elem" href="{{route('client.index')}}">--}}
{{--            <img src="/assets/svg/carrier/search.svg" alt="icons">--}}
{{--            <p>Поиск транспорта</p>--}}
{{--        </a>--}}
{{--        <a class="menuCarrier-elem" href="{{route('client.orders')}}">--}}
{{--            <img src="/assets/svg/carrier/map.svg" alt="icons">--}}
{{--            <p>Отслеживание </p>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--    <div class="menuCarrier-info"><a class="menuCarrier-elem" href="#"><img src="/assets/svg/carrier/phone.svg" alt="icons">--}}
{{--            <p>Поддержка</p></a><a class="menuCarrier-elem" onclick="open_notifications()" href="#"><img src="/assets/svg/carrier/bell.svg" alt="icons">--}}
{{--            <p>Уведомления <span id="notif-count">({{Auth()->user()->get_notifications->where('is_old',0)->count()}})</span></p></a><a class="menuCarrier-elem" href="#"><img src="/assets/svg/carrier/settings.svg" alt="icons">--}}
{{--            <p>Настройки</p></a></div>--}}
{{--    <button class="menuCarrier-arrow"> <img src="/assets/svg/carrier/chevron-left.svg" alt="icons">--}}
{{--        <p>Свернуть панель</p>--}}
{{--    </button>--}}
{{--    <div class="menuCarrier-hr"></div>--}}
{{--    <div class="menuCarrier-profile">--}}
{{--        <div class="menuCarrier-ph"> <picture><source srcset="/assets/img/Avatar.webp" type="image/webp"><img src="/assets/img/Avatar.png" alt="avatar"></picture></div>--}}
{{--        <div class="menuCarrier-t">--}}
{{--            <h3>{{Auth()->user()->name}}</h3>--}}
{{--            <p>{{Auth()->user()->email}}</p>--}}
{{--        </div>--}}
{{--        <form action="{{route('logout')}}" method="POST">--}}
{{--            @csrf--}}
{{--        <button class="menuCarrier-logout" type="submit"><img src="/assets/svg/carrier/log-out.svg" alt="icons"></button>--}}
{{--        </form>--}}
{{--    </div>--}}


{{--    11--}}
    <div class="menuCarrier-w">
        <div class="menuCarrier-tab"><a class="menuCarrier-elem" href="{{route('client.index')}}"><img src="/assets/svg/carrier/search.svg" alt="icons">
                <p>Поиск транспорта</p></a><a class="menuCarrier-elem" href="{{route('client.orders')}}"><img src="/assets/svg/carrier/map.svg" alt="icons">
                <p>Отслеживание </p></a></div>
        <div class="menuCarrier-wr">
            <div class="menuCarrier-info"><a class="menuCarrier-elem" href="#"><img src="/assets/svg/carrier/phone.svg" alt="icons">
                    <p>Поддержка</p></a><a class="menuCarrier-elem" href="#" onclick="open_notifications()"><img src="/assets/svg/carrier/bell.svg" alt="icons">
                    <p>Уведомления <span>({{Auth()->user()->get_notifications->where('is_old',0)->count()}})</span></p></a><a class="menuCarrier-elem" href="{{route('settings')}}"><img src="/assets/svg/carrier/settings.svg" alt="icons">
                    <p>Настройки</p></a></div>
            <button class="menuCarrier-arrow"> <img src="/assets/svg/carrier/chevron-left.svg" alt="icons">
                <p>Свернуть панель</p>
            </button>
            <div class="menuCarrier-hr"></div>
            <div class="menuCarrier-profile">
            <div class="menuCarrier-ph"> <picture><source srcset="/assets/img/Avatar.webp" type="image/webp"><img src="/assets/img/Avatar.png" alt="avatar"></picture></div>
            <div class="menuCarrier-t">
                <h3>{{Auth()->user()->name}}</h3>
                <p>{{Auth()->user()->email}}</p>
            </div>
            <form action="{{route('logout')}}" method="POST">
                @csrf
            <button class="menuCarrier-logout"><img src="/assets/svg/carrier/log-out.svg" alt="icons"></button>
            </form>
    </div>
        </div>
    </div>
{{--    22--}}


</div>


@if(Auth()->check())
    @include('includes.notification')
@endif
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
