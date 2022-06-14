@extends('layouts.main')
@section('title', 'Заказы')
@section('content')
    <section class="carrier">
        <div class="containers">
            <div class="carrier__w">
                <div class="menuCarrier">
                    <div class="menuCarrier-tab"><a class="menuCarrier-elem" href="#"><img src="/assets/svg/carrier/search.svg" alt="icons">
                            <p>Поиск транспорта</p></a><a class="menuCarrier-elem" href="#"><img src="/assets/svg/carrier/map.svg" alt="icons">
                            <p>Отслеживание </p></a></div>
                    <div class="menuCarrier-info"><a class="menuCarrier-elem" href="#"><img src="/assets/svg/carrier/phone.svg" alt="icons">
                            <p>Поддержка</p></a><a class="menuCarrier-elem" href="#"><img src="/assets/svg/carrier/bell.svg" alt="icons">
                            <p>Уведомления <span>(20)</span></p></a><a class="menuCarrier-elem" href="#"><img src="/assets/svg/carrier/settings.svg" alt="icons">
                            <p>Настройки</p></a></div>
                    <button class="menuCarrier-arrow"> <img src="/assets/svg/carrier/chevron-left.svg" alt="icons">
                        <p>Свернуть панель</p>
                    </button>
                    <div class="menuCarrier-hr"></div>
                    <div class="menuCarrier-profile">
                        <div class="menuCarrier-ph"> <picture><source srcset="/assets/img/Avatar.webp" type="image/webp"><img src="/assets/img/Avatar.png" alt="avatar"></picture></div>
                        <div class="menuCarrier-t">
                            <h3>Сидоров Пафнутий</h3>
                            <p>Pafnutiy.Sidoroff@gmail.com</p>
                        </div>
                        <button class="menuCarrier-logout"><img src="/assets/svg/carrier/log-out.svg" alt="icons"></button>
                    </div>
                </div>
                <ul class="carrier__info">
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
                                    <p>Караганда</p>
                                </div>
                                <div class="carrier__info-e">
                                    <h5>Прибытие:</h5>
                                    <p>Усть-Каменогорск</p>
                                </div>
                                <div class="carrier__info-e">
                                    <h5>Расстояние:</h5>
                                    <p>758 км</p>
                                </div>
                                <div class="carrier__info-e">
                                    <h5>Пройдено:</h5>
                                    <p>158 км</p>
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
