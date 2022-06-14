@extends('layouts.main')
@section('title', 'Личный кабинет')
@section('content')
    <section class="carrier">
        <div class="containers">
            <div class="carrier__w">
                @include('client.menu')
                <div class="carrier__search">
                    <form action="{{route('client.get.car')}}" method="POST">
                        @csrf
                    <div class="carrier__search-i">Поиск транспорта</div>
                    <div class="carrier__search-t">Подберем транспорт для вашего груза</div>
                    <div class="carrier__search-a">Помощь в организации сборных грузов</div>
                    <div class="carrier__search-b">
                        <div class="carrier__search-type">
                            <div class="carrier__search-h">
                                <p>Тип транспорта</p><img src="/assets/svg/index/help.svg" alt="icons">
                            </div>
                            <select class="c_select" id="track_i" name="type" style="display: none">
                                <option>Тип транспорта</option>
                                @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="carrier__search-type"></div>
                        <div class="carrier__search-type">
                            <div class="carrier__search-h">
                                <p>Откуда везете груз</p><img src="/assets/svg/index/help.svg" alt="icons">
                            </div>
                            <select class="c_select" id="map_i" name="city1" style="display: none">
                                <option>Откуда везете</option>
                                @foreach($cities as $city)
                                <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="carrier__search-type">
                            <div class="carrier__search-h">
                                <p>Выберите точку доставки</p><img src="/assets/svg/index/help.svg" alt="icons">
                            </div>
                            <select class="c_select" id="map_i" name="city2" style="display: none">
                                <option>Куда везете</option>
                                @foreach($cities as $city)
                                    <option value="{{$city->id}}">{{$city->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div><button type="submit" class="carrier__search-rsl" href="#">
                        <p>Найти транспорт</p><img src="/assets/svg/carrier/chevron-right.svg" alt="icons"></button>
                    </form>
                </div>
            </div>
        </div>
</section>
@endsection
