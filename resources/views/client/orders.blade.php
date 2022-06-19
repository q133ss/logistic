@extends('layouts.main')
@section('title', 'Заказы')
@section('content')
    <section class="carrier">
        <div class="containers">
            <div class="carrier__w">
                @include('client.menu')
                <ul class="carrier__info">
                    @if($orders->count() == 0)
                        <li class="carrier__info-w">
                            Активных заказов нет
                        </li>
                    @endif
                    @foreach($orders as $order)
                    <li class="carrier__info-w">
                        <div class="carrier__info-icon"><img src="/assets/svg/carrier/car.svg" alt="icons"></div>
                        <div class="carrier__info-a">Транспорт в пути</div>
                        <div class="carrier__info-title">Номер: {{$order->get_waypoint->car_number}}</div>
                        <div class="carrier__info-g">
                            <div class="carrier__info-i">
                                <div class="carrier__info-t">Машина в пути</div>
                                <div class="carrier__info-e">
                                    <h5>Дата оправления:</h5>
                                    <p>{{$order->get_waypoint->departure_date}}</p>
                                </div>
                                <div class="carrier__info-e">
                                    <h5>Время в пути:</h5>
                                    <p>{{$order->get_waypoint->travel_time}}</p>
                                </div>
                                <div class="carrier__info-e">
                                    <h5>Дата прибытия:</h5>
                                    <p>{{$order->get_waypoint->arrival_date}}</p>
                                </div>
                            </div>
                            <div class="carrier__info-i">
                                <div class="carrier__info-t">Данные по грузу</div>
                                <div class="carrier__info-e">
                                    <h5>Вес:</h5>
                                    <p>{{$order->get_waypoint->weight}}</p>
                                </div>
                                <div class="carrier__info-e">
                                    <h5>Объем:</h5>
                                    <p>{{$order->get_waypoint->size}}</p>
                                </div>
                                <div class="carrier__info-e">
                                    <h5>Кол-во упаковок:</h5>
                                    <p>{{$order->get_waypoint->packages_qty}}</p>
                                </div>
                            </div>
                            <div class="carrier__info-i">
                                <div class="carrier__info-t">Машина в пути</div>
                                <div class="carrier__info-e">
                                    <h5>Отправление:</h5>
                                    <p>{{$order->get_waypoint->get_departure_city['name']}}</p>
                                </div>
                                <div class="carrier__info-e">
                                    <h5>Прибытие:</h5>
                                    <p>{{$order->get_waypoint->get_arrival_city_id['name']}}</p>
                                </div>
                                <div class="carrier__info-e">
                                    <h5>Расстояние:</h5>
                                    <p>{{$order->get_waypoint->distance}} км</p>
                                </div>
                                <div class="carrier__info-e">
                                    <h5>Пройдено:</h5>
                                    <p>{{$order->get_waypoint->passed}} км</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection
