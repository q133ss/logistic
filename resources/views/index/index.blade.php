@extends('layouts.main')
@section('title', 'Главная')
@section('content')
    <section class="ind-main">
        <div class="containers">
            <div class="ind-main__w">
                <div class="ind-main__info">
                    <p class="ind-main__info-i">Поиск транспорта</p>
                    <h3 class="ind-main__info-t">Как работает наш сервис</h3>
                    <p class="ind-main__info-a">Помощь в организации сборных грузов</p>
                    <ul class="ind-main__info-l">
                        <li class="ind-main__info-e"> <img src="/assets/svg/index/icons__1.svg" alt="icons">
                            <div class="ind-main__info-text">
                                <h3>Выберите направление </h3>
                                <p>Выберите откуда и куда вы хотите доставить груз в форме справа и предпочитаемый вид транспорта</p>
                            </div>
                        </li>
                        <li class="ind-main__info-e"> <img src="/assets/svg/index/icons__2.svg" alt="icons">
                            <div class="ind-main__info-text">
                                <h3>Выберите направление </h3>
                                <p>Выберите откуда и куда вы хотите доставить груз в форме справа и предпочитаемый вид транспорта</p>
                            </div>
                        </li>
                        <li class="ind-main__info-e"> <img src="/assets/svg/index/icons__3.svg" alt="icons">
                            <div class="ind-main__info-text">
                                <h3>Выберите направление </h3>
                                <p>Выберите откуда и куда вы хотите доставить груз в форме справа и предпочитаемый вид транспорта</p>
                            </div>
                        </li>
                        <li class="ind-main__info-e"> <img src="/assets/svg/index/icons__4.svg" alt="icons">
                            <div class="ind-main__info-text">
                                <h3>Выберите направление </h3>
                                <p>Выберите откуда и куда вы хотите доставить груз в форме справа и предпочитаемый вид транспорта</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="ind-main__form">
                    <form action="{{route('index.find.transport')}}" method="POST">
                        @csrf
                    <p class="ind-main__form-i">Поиск транспорта</p>
                    <h3 class="ind-main__form-t">Подберем транспорт для<br>вашего груза </h3>
                    <p class="ind-main__form-a">Помощь в организации сборных грузов</p>
                    @if(\Session::has('error'))
                        <p class="service__info-a service__info-a__red service__info-a__yellow">{{\Session::get('error')}}</p>
                    @endif
                        @if($errors->any())
                            <p class="service__info-a service__info-a__red service__info-a__yellow">
                                Необходимо заполнить все поля
                                @foreach ($errors->all() as $error)
                                {{$error}}
                                @endforeach
                            </p>
                        @endif
                    <div class="ind-main__form-type">
                        <div class="ind-main__form-h">
                            <p>Выберите транспорт</p><img src="/assets/svg/index/help.svg" alt="icons">
                        </div>
                        <select class="c_select" id="track_i" name="type" style="display: none">
                            <option>На чем будем везти</option>
                            @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="ind-main__form-type">
                        <div class="ind-main__form-h">
                            <p>Откуда</p><img src="/assets/svg/index/help.svg" alt="icons">
                        </div>
                        <select class="c_select" id="map_i" name="city1" style="display: none">
                            <option>Начальная точка маршрута</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="ind-main__form-type">
                        <div class="ind-main__form-h">
                            <p>Куда</p><img src="/assets/svg/index/help.svg" alt="icons">
                        </div>
                        <select class="c_select" id="map_i" name="city2" style="display: none">
                            <option>Конец маршрута</option>
                            @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="ind-main__form-trns" type="submit">
                        <p>Найти транспорт</p><img src="" alt="icons">
                    </button>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection
