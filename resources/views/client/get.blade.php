@extends('layouts.main')
@section('title', 'Поиск траспорта')
@section('content')
    <section class="carrier">
        <div class="containers">
            <div class="carrier__w">
                @include('client.menu')
                <div class="carrier__car">
                    <p class="carrier__car-i">Поиск транспорта</p>
                    <h3 class="carrier__car-t">Мы нашли для вас <br>транспорт:<span>{{$waypoints->count()}} фуры</span></h3>
                    <ul class="carrier__car-l">
                        <span class="service__info-a service__info-a__red service__info-a__yellow display-n" id="chose_transport">Выберите транспорт</span>
                        <span class="service__info-a service__info-a__red service__info-a__yellow display-n" id="name_error">Введите имя</span>
                        <span class="service__info-a service__info-a__red service__info-a__yellow display-n" id="phone_error">Введите телефон</span>
                        @foreach($waypoints as $key => $waypoint)
                        <li class="carrier__car-e"><img class="carrier__car-icon" src="/assets/svg/carrier/car.svg" alt="icons">
                            <div class="carrier__car-w">
                                <div class="carrier__car-text">
                                    <p>Заполненность машины</p><span>{{$waypoint->number}}%</span>
                                </div>
                                <div class="carrier__car-p" data-progress="{{$waypoint->number}}%">
                                    <div class="carrier__car-bar"></div>
                                </div>
                                <div class="carrier__car-info">Доступно для загрузки</div>
                                <div class="carrier__car-a">
                                    <h5>По весу:</h5>
                                    <p>{{$waypoint->available_weight}}</p>
                                </div>
                                <div class="carrier__car-a">
                                    <h5>По объему:</h5>
                                    <p>{{$waypoint->available_size}}</p>
                                </div>
                                <button class="carrier__car-trns chose__car" data-id="{{$waypoint->id}}"><p>Выбрать</p></button>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <form action="{{route('client.send.order')}}" id="send_form" method="POST">
                        @csrf
                    <div class="carrier__car-name">
                        <label class="label" for="index__name">
                            <div class="carrier__car-n">
                                <p>Как вас зовут </p><img src="/assets/svg/carrier/help.svg" alt="icons">
                            </div><img class="carrier__car-name_m" src="/assets/svg/carrier/user.svg" alt="icons">
                            <input type="text" name="name" required id="index__name" Placeholder="Ваше имя*" value="{{Auth()->user()->name}}">
                        </label>
                    </div>
                    <div class="carrier__car-phone">
                        <label class="label" for="index__phone">
                            <div class="carrier__car-ph">
                                <p>Куда </p><img src="/assets/svg/carrier/help.svg" alt="icons">
                            </div><img class="carrier__car-phone_m" src="/assets/svg/carrier/phone.svg" alt="icons">
                            <input type="text" name="phone" id="index__phone" required Placeholder="Ваш телефон*" value="{{Auth()->user()->phone}}">
                        </label>
                    </div>
                        <input type="hidden" value="{{Auth()->user()->id}}" name="user_id">
                        <input type="hidden" id="waypoint_id" name="waypoint_id" value="">
                    <button class="carrier__car-trns" type="button" onclick="check_form()">
                        <p>Подать заявку</p><img src="/assets/svg/carrier/chevron-right.svg" alt="icons">
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        function check_form(){
            let way_error = 0;
            let name_error = 0;
            let phone_error = 0;

            if($('#waypoint_id').val() == '') {
                $('#chose_transport').removeClass('display-n');
                way_error = 1;
            }else{
                $('#chose_transport').addClass('display-n');
                way_error = 0;
            }

            if($('#index__name').val() == ''){
                $('#name_error').removeClass('display-n');
                name_error = 1;
            }else{
                $('#name_error').addClass('display-n');
                name_error = 0;
            }

            if($('#index__phone').val() == ''){
                $('#phone_error').removeClass('display-n');
                name_error = 1;
            }else{
                $('#phone_error').addClass('display-n');
                name_error = 0;
            }

            if(way_error == 0 && name_error == 0 && phone_error == 0) {
                $('#send_form').submit();
            }
        }
        $('body').on('click', '.chose__car', function () {
            $('.chose__car').not($(this)).html('<p>Выбрать</p>');
            $(this).html('<p>Выбран</p>');
            $('#waypoint_id').val($(this).data('id'));
        });
    </script>
@endsection
