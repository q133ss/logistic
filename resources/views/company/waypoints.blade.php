@extends('layouts.main')
@section('title', 'Маршруты')
@section('content')
    <section class="company">
        <div class="containers">
            <div class="company__w">
                @include('company.menu')
                <ul class="company__list">
                    <li class="company__list-h">
                        <div class="company__checkbox-a">
                            <input class="company__checkbox-a__input" type="checkbox" id="checkbox_all">
                            <label class="company__checkbox-a__label" for="checkbox_all"></label>
                        </div>
                        <div class="company__list-st">Статус</div>
                        <div class="company__list-tp">
                            <h5>Тип транспорта</h5>
                            <p>номер</p>
                        </div>
                        <div class="company__list-st">Старт</div>
                        <div class="company__list-fn">Финиш</div>
                        <div class="company__list-js">Действия</div>
                    </li>
                    @foreach($waypoints as $waypoint)
{{--                        @dd($waypoint)--}}
                    <li class="company__list-e">
                        <div class="company__checkbox">
                            <input class="company__checkbox__input" type="checkbox" id="checkbox_1">
                            <label class="company__checkbox__label" for="checkbox_1"></label>
                        </div>
                        <div class="company__list-path">
                            <h5>{{$waypoint->get_status->name}}</h5>
                            <p>{{$waypoint->passed}}</p>
                        </div>
                        <div class="company__list-type">
                            <h5>{{$waypoint->get_type->name}}</h5>
                            <p>{{$waypoint->car_number}}</p>
                        </div>
                        <div class="company__list-start">
                            <p>{{$waypoint->get_departure_city->name}}</p>
                        </div>
                        <div class="company__list-finally">
                            <p>{{$waypoint->get_arrival_city_id->name}}</p>
                        </div>
                        <div class="company__list-just">
                            <button class="company__list-show" onclick="get_waypoint_data('{{$waypoint->id}}')"> <img src="/assets/svg/company/eye.svg" alt="icons"></button>
                            <button class="company__list-more" onclick="get_waypoint_status('{{$waypoint->id}}')"> <img src="/assets/svg/company/more.svg" alt="icons"></button>
                            <button class="company__list-users" onclick="get_order_id('{{$waypoint->id}}')">
                                <ul class="selectTwo display-n">
                                    <li class="selectTwo__i selectTwo__i-add">Добавить клиента к машине</li>
                                    <li class="selectTwo__i selectTwo__i-show" onclick="view_clients('{{$waypoint->id}}')">Смотреть клиентов </li>
                                </ul><img src="/assets/svg/company/users.svg" alt="icons">
                            </button>
                            <form action="/api/delete-waypoint/{{$waypoint->id}}" method="POST">
                                @method('DELETE')
                                @csrf
                            <button class="company__list-basket delete-btn" type="submit"> <img src="/assets/svg/company/trash.svg" alt="icons"></button>
                            </form>
                            <button class="company__list-add">  <img src="/assets/svg/company/drop.svg" alt="icons"></button>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <style>
        .view_client{
            position : fixed;
            top : 0;
            left : 0;
            width : 100%;
            height : 100vh;
            overflow-x : hidden;
            overflow-y : auto;
            outline : 0;
            z-index : 100;
            display : -webkit-box;
            display : -ms-flexbox;
            display : flex;
            -webkit-box-align : center;
            -ms-flex-align : center;
            align-items : center;
            padding : 35px 0;
            background : rgba(54, 54, 54, 0.3);
        }

        .view__w{
            width : 400px;
            height : -webkit-max-content;
            height :    -moz-max-content;
            height :         max-content;
            margin : 0 auto;
            background : #ffffff;
            display : block;
            /*-webkit-box-orient : vertical;*/
            /*-webkit-box-direction : normal;*/
            /*-ms-flex-direction : column;*/
            /*flex-direction : column;*/
            /*-webkit-box-align : center;*/
            /*-ms-flex-align : center;*/
            /*align-items : center;*/
            /*-webkit-box-pack : start;*/
            /*-ms-flex-pack : start;*/
            /*justify-content : flex-start;*/
            position : relative;
            padding : 16px;
            -webkit-box-shadow : 5px 5px 20px rgba(0, 0, 0, 0.15);
            box-shadow : 5px 5px 20px rgba(0, 0, 0, 0.15);
            border-radius : 16px;
        }
    </style>
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
                <label class="label status__path" for="reg__mail">
                    <p>Уведомление клиентам</p><img src="/assets/svg/reg/ready.svg" alt="icons">
                    <input type="text" name="notification" id="notification" placeholder="Машина с вашим грузом прибудет завтра">
                </label>
                <button class="status__submit" type="submit">
                    <p>Обновить статус</p>
                </button>
            </div>
            </form>
        </div>
    </div>

{{--    ...--}}
    <div class="view_client display-n">
        <div class="view__w" id="view_clients">
        </div>
    </div>
{{--    ...--}}
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
            $('#add_client_order_id').val(id)
        }

        function view_clients(id){
            $.get( "/api/get-waypoint-clients/"+id, function( data ) {
                let result = "";

                for (let i = 0; i < data.data.length; i++){
                    result += '<span>Телефон:'+data.data[i]['phone'] + '</span><br>';
                }

                $('#view_clients').html(result);
            });
            $('.view_client').removeClass('display-n');
            $('body').css('overflow','hidden');
        }
    </script>
    <script>
        $('.view_client').mouseup(function (e) {
            var div = $('.view__w');

            if (!div.is(e.target) && div.has(e.target).length === 0) {
                $('.view_client').addClass('display-n');
                $('body').css('overflow', 'visible');
            }
        });
    </script>
@endsection
