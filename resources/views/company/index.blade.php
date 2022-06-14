@extends('layouts.main')
@section('title', 'Компания')
@section('content')
    <section class="company">
        <div class="containers">
            <div class="company__w">
                <div class="menuCompany">
                    <div class="menuCompany-tab"><a class="menuCompany-elem" href="#"><img src="/assets/svg/company/truck.svg" alt="icons">
                            <p>Добавить машину</p></a><a class="menuCompany-elem" href="#"><img src="/assets/svg/company/map.svg" alt="icons">
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
                            <h3>Сидоров Пафнутий</h3>
                            <p>Pafnutiy.Sidoroff@gmail.com</p>
                        </div>
                        <button class="menuCompany-logout"><img src="/assets/svg/company/log-out.svg" alt="icons"></button>
                    </div>
                </div>
                <form action="{{route('company.create.car')}}" method="POST">
                    @csrf
                <div class="company__search">
                    <div class="company__search-i">Для транспортной компании</div>
                    <div class="company__search-t">Добавить свободный транспорт</div>
                    <div class="company__search-b">
                        <div class="company__search-type">
                            @if($errors)
                                <h5 style="color:red">Заполните все необходимые поля</h5>
                            @endif
                            <div class="company__search-h">
                                <p>Добавить транстпорт</p><img src="/assets/svg/index/help.svg" alt="icons">
                            </div>
                            <select required class="c_select" id="track_i" name="type" style="display: none">
                                <option>На чем будем везти</option>
                                @foreach($types as $key => $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="company__search-type"></div>
                        <div class="company__search-type">
                            <div class="company__search-h">
                                <p>Откуда</p><img src="/assets/svg/index/help.svg" alt="icons">
                            </div>
                            <select required class="c_select" id="map_i" name="departure_city_id" style="display: none">
                                <option>Город номер 1</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="company__search-type">
                            <div class="company__search-h">
                                <p>Куда</p><img src="/assets/svg/index/help.svg" alt="icons">
                            </div>
                            <select required class="c_select" id="map_i" name="arrival_city_id" style="display: none">
                                <option>Город номер 2</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                    <div class="company__search-g">
                        <label class="company__search-e label" for="company__one">
                            <div class="company__search-text">
                                <p>Объем, м.куб </p><img src="/assets/svg/company/help.svg" alt="icons">
                            </div>
                            <input required type="text" name="size" id="company__one" placeholder="м.куб">
                        </label>
                        <label class="company__search-e label" for="company__two">
                            <div class="company__search-text">
                                <p>Грузоподъемность, кг</p><img src="/assets/svg/company/help.svg" alt="icons">
                            </div>
                            <input required type="text" name="weight" id="company__two" placeholder="кг">
                        </label>
                        <label class="company__search-e label" for="company__three">
                            <div class="company__search-text">
                                <p>Дата загрузки</p><img src="/assets/svg/company/help.svg" alt="icons">
                            </div>
                            <input required type="text" name="departure_date" id="company__three" placeholder="Дата загрузки">
                        </label>
                    </div><button class="company__search-rsl" type="submit">
                        <p>Добавить транспорт</p><img src="/assets/svg/company/chevron-right.svg" alt="icons"></button>
                </div>
                </form>
            </div>
        </div>
    </section>
@endsection
