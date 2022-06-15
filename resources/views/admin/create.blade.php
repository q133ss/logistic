@extends('layouts.main')
@section('title', 'Добавить машину')
@section('content')
    <section class="company">
        <div class="containers">
            <div class="company__w">
                @include('admin.menu')
                <form action="{{route('company.create.car')}}" method="POST">
                    @csrf
                    <div class="company__search">
                        <div class="company__search-i">Для транспортной компании</div>
                        <div class="company__search-t">Добавить свободный транспорт</div>
                        <div class="company__search-b">
                            <div class="company__search-type">
                                <div class="company__search-h">
                                    <p>Добавить транстпорт</p><img src="/assets/svg/index/help.svg" alt="icons">
                                </div>
                                @if($errors->count() != 0)
                                    <h5 style="color:red">Заполните все необходимые поля</h5>
                                @endif
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
                                <input required type="text" name="size" id="company__one" placeholder="24 м.куб">
                            </label>
                            <label class="company__search-e label" for="company__two">
                                <div class="company__search-text">
                                    <p>Грузоподъемность, кг</p><img src="/assets/svg/company/help.svg" alt="icons">
                                </div>
                                <input required type="text" name="weight" id="company__two" placeholder="500 кг">
                            </label>
                            <label class="company__search-e label" for="company__three">
                                <div class="company__search-text">
                                    <p>Дата загрузки</p><img src="/assets/svg/company/help.svg" alt="icons">
                                </div>
                                <input required type="text" name="departure_date" id="company__three" placeholder="Дата загрузки">
                            </label>
                            <input type="hidden" name="admin" value="1">
                        </div><button class="company__search-rsl" type="submit">
                            <p>Добавить транспорт</p><img src="/assets/svg/company/chevron-right.svg" alt="icons"></button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
