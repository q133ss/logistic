@extends('layouts.main')
@section('title', 'Машины на маршрутах')
@section('content')
    <section class="service">
        <div class="containers">
            <div class="service__w">
                @include('admin.menu')
                <ul class="service__list">
                    @foreach($waypoints as $waypoint)
                    <li class="service__list-e">
                        <div class="service__checkbox">
                            <input class="service__checkbox__input" type="checkbox" id="checkbox_5">
                            <label class="service__checkbox__label" for="checkbox_5"></label>
                        </div>
                        <div class="service__list-path">
                            <h5>{{$waypoint->get_status->name}}</h5>
                            <p>{{$waypoint->passed}}</p>
                        </div>
                        <div class="service__list-type">
                            <h5>{{$waypoint->get_type->name}}</h5>
                            <p>{{$waypoint->car_number}}</p>
                        </div>
                        <div class="service__list-start">
                            <p>{{$waypoint->get_departure_city->name}}</p>
                        </div>
                        <div class="service__list-finally">
                            <p>{{$waypoint->get_arrival_city_id->name}}</p>
                        </div>
                        <div class="service__list-just">
                            <button class="service__list-show" onclick="get_waypoint_data('{{$waypoint->id}}')"> <img src="/assets/svg/service/eye.svg" alt="icons"></button>
                            <button class="service__list-more" onclick="get_waypoint_status('{{$waypoint->id}}')"> <img src="/assets/svg/service/more.svg" alt="icons"></button>
                            <button class="service__list-users" onclick="get_order_id('{{$waypoint->id}}')">
                                <img src="/assets/svg/service/users.svg" alt="icons">
                            </button>
                            <button class="service__list-basket"> <img src="/assets/svg/service/trash.svg" alt="icons"></button>
                            <button class="service__list-add">  <img src="/assets/svg/service/drop.svg" alt="icons"></button>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <div class="status display-n">
        <div class="status__w">
            <form action="#" id="status_form" method="POST">
                @csrf
                <button class="status__c" type="button"> <img src="/assets/svg/model/close.svg" alt="icons"></button>
                <div class="status__b">
                    <div class="status__type">
                        <div class="status__h">
                            <p>Статус машины</p><img src="/assets/svg/index/help.svg" alt="icons">
                        </div>
                        <select class="c_select" id="track_i" name="car_status_id" style="display: none">
                            <option id="current_waypoint_status" value="1">Загружается</option>
                            @foreach($statuses as $status)
                                <option value="{{$status->id}}">{{$status->name}}</option>
                            @endforeach

                        </select>
                    </div>
                    <label class="label status__path" for="reg__mail">
                        <p>Пройдено по маршруту</p><img src="/assets/svg/model/maps.svg" alt="icons">
                        <input type="text" name="passed" id="reg__mail" placeholder="км">
                    </label>
                    <div class="status__block">
                        <label class="label status__kg" for="reg__teng">
                            <p>Осталось по весу, кг</p><img src="/assets/svg/model/credit-card.svg" alt="icons">
                            <input type="text" name="available_weight" id="reg__teng ava-weight" placeholder="кг">
                        </label>
                        <label class="label status__cub" for="reg__usd">
                            <p>Остаток объем, м.куб</p><img src="/assets/svg/model/credit-card.svg" alt="icons">
                            <input type="text" name="available_size" id="reg__usd" placeholder="м.куб">
                        </label>
                    </div>
                    <button class="status__submit" type="submit">
                        <p>Обновить статус</p>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <ul class="selectTwo display-n">
        <li class="selectTwo__i selectTwo__i-add">Добавить клиента к машине</li>
        <li class="selectTwo__i selectTwo__i-show">Смотреть клиентов </li>
    </ul>

    <script>
        function get_waypoint_data(id){
            $.get( "/api/get-waypoint-data/"+id, function( data ) {
                let waypoint = data.data;

                $('#date_of_dep').text(waypoint.departure_date);
                $('#time_on_travel').text(waypoint.travel_time);
                $('#date_of_arr').text(waypoint.arrival_date);
                $('#data_of_weight').text(waypoint.weight);
                $('#data_of_size').text(waypoint.size);
                $('#data_of_qty').text(waypoint.packages_qty);

                $(".info_car").removeClass("display-n");
                $("body").css("overflow","hidden");
            });
        }

        function get_waypoint_status(id){
            $('#status_form').attr('action', '/api/update-waypoint/'+id);
            $.get( "/api/get-waypoint-data/"+id, function( data ) {
                let waypoint = data.data;
                $.get( "/api/get-status/"+waypoint.car_status_id, function( statusData ) {
                    console.log(statusData.data.name);
                    $('#track_i .c_select-placeholder').text(statusData.data.name);
                    $(".status").removeClass("display-n");
                    $("body").css("overflow","hidden");

                });

                $('.status__path #reg__mail').val(waypoint.passed);
                $('.status__kg input').val(waypoint.available_weight);
                $('.status__cub input').val(waypoint.available_size);

            });
        }

        function get_order_id(id){
            $('#add_client_order_id').val(id);
            $('.selectTwo').removeClass('display-n');
        }
    </script>
@endsection
