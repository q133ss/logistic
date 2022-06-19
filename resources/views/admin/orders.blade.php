@extends('layouts.main')
@section('title', 'Заказы')
@section('content')
    <section class="service">
        <div class="containers">
            <div class="service__w">
                @include('admin.menu')
                <ul class="service__list">
                    @foreach($orders as $order)
                        <li class="service__list-e">
                            <div class="service__checkbox">
                                <input class="service__checkbox__input display-n" type="checkbox" id="checkbox_5">
                                <label class="service__checkbox__label display-n" for="checkbox_5"></label>
                            </div>
                            <div class="service__list-path">
                                <h5>{{$order->name}}</h5>
                                <p></p>
                            </div>
                            <div class="service__list-type">
                                <h5>{{$order->phone}}</h5>
                                <p></p>
                            </div>
                            <div class="service__list-start">
                                <p>{{$order->get_waypoint->get_departure_city->name}}</p>
                            </div>
                            <div class="service__list-finally">
                                <p>{{$order->get_waypoint->get_arrival_city_id->name}}</p>
                            </div>
                            <div class="service__list-just">
                                <button class="service__list-show" title="Данные о компании" onclick="get_company_data('{{$order->id}}')"> <img src="/assets/svg/service/eye.svg" alt="icons"></button>
                                <button class="service__list-more" title="Действия" onclick="get_waypoint_status('2222')"> <img src="/assets/svg/service/more.svg" alt="icons"></button>
                                <button class="service__list-users company__list-users" title="Данные о пользователе" onclick="get_user_data('{{$order->id}}')">
                                    <img src="/assets/svg/service/users.svg" alt="icons">
                                </button>
                                <form action="{{route('admin.order.delete', $order->id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="service__list-basket"> <img src="/assets/svg/service/trash.svg" alt="icons"></button>
                                </form>
                                <button class="service__list-add" type="submit">  <img src="/assets/svg/service/drop.svg" alt="icons"></button>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <div class="info_car display-n">
        <div class="info_car__w">
            <button class="info_car__c"> <img src="/assets/svg/model/close.svg" alt="icons"></button>
            <ul class="info_car__b">
                <li class="info_car__i">
                    <div class="info_car__t">Компания</div>
                    <div class="info_car__e">
                        <h5>Название:</h5>
                        <p id="comp_title"></p>
                    </div>

                    <div class="info_car__e">
                        <h5>Контактное лицо</h5>
                        <p id="comp_face"></p>
                    </div>

                    <div class="info_car__e">
                        <h5>Телефон</h5>
                        <p id="comp_phone">

                        </p>
                    </div>
                </li>
                <li class="info_car__i">
                    <div class="info_car__t">Машина</div>
                    <div class="info_car__e">
                        <h5>Номер:</h5>
                        <p id="car_number"></p>
                    </div>
                    <div class="info_car__e">
                        <h5>Дата оправления:</h5>
                        <p id="date_of_comp_dep"></p>
                    </div>
                    <div class="info_car__e">
                        <h5>Время в пути:</h5>
                        <p id="time_on_tr_compavel"></p>
                    </div>
                    <div class="info_car__e">
                        <h5>Дата прибытия:</h5>
                        <p id="date_of_comp_arr"></p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <script>
        function get_company_data(waypoint_id){
            //Данные о компании
            $.get( "/api/get-waypoint-company/"+waypoint_id, function( data ) {
                let company = data.data;

                $('#comp_title').text(company.company);
                $('#comp_face').text(company.contact_face);
                $('#comp_phone').text(company.phone);
            });

            //Данные о маршруте
            $.get( "/api/get-waypoint-data-from-order/"+waypoint_id, function( data ) {
                let waypoint = data.data;

                $('#car_number').text(waypoint.car_number);
                $('#date_of_comp_dep').text(waypoint.departure_date);
                $('#time_on_comp_travel').text(waypoint.travel_time);
                $('#date_of_comp_arr').text(waypoint.arrival_date);
                $('#data_of_av_weight').text(waypoint.available_weight);
                $('#data_of_av_size').text(waypoint.available_size);
                $('#data_of_comp_qty').text(waypoint.packages_qty);
            });
            $('.info_car').removeClass('display-n');
            $("body").css("overflow","hidden");
        }
    </script>
@endsection
