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

                <div class="ind-main__forms">
                    <form action="{{route('index.send.form')}}" method="POST">
                        @csrf
                    <p class="ind-main__forms-i">Поиск транспорта</p>
                    <h3 class="ind-main__forms-t">Мы нашли для вас <br>транспорт:<span>{{$data->count()}} фуры</span></h3>
                    <ul class="ind-main__forms-l">
                        @foreach($data as $waypoint)
                        <li class="ind-main__forms-e"><img class="ind-main__forms-icon" src="/assets/svg/index_two/car.svg" alt="icons">
                            <div class="ind-main__forms-w">
                                <div class="ind-main__forms-text">
                                    <p>Заполненность машины</p><span>{{$waypoint->number}}%</span>
                                </div>
                                <div class="ind-main__forms-p" data-progress="{{$waypoint->number}}%">
                                    <div class="ind-main__forms-bar" style="width: {{$waypoint->number}}%;"></div>
                                </div>
                                <div class="ind-main__forms-info">Доступно для загрузки</div>
                                <div class="ind-main__forms-a">
                                    <h5>По весу:</h5>
                                    <p>{{$waypoint->available_weight}}</p>
                                </div>
                                <div class="ind-main__forms-a">
                                    <h5>По объему:</h5>
                                    <p>{{$waypoint->available_size}}</p>
                                </div>
                                <button type="button" class="ind-main__forms-trns btn-waypoint" data-id="{{$waypoint->id}}"><p>Выбрать</p></button>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="ind-main__forms-name">
                        <label class="label" for="index__name">
                            <div class="ind-main__forms-n">
                                <p>Как вас зовут </p><img src="/assets/svg/index/help.svg" alt="icons">
                            </div><img class="ind-main__forms-name_m" src="/assets/svg/index_two/user.svg" alt="icons">
                            <input type="text" required name="name" id="index__name" placeholder="Ваше имя*">
                        </label>
                    </div>
                    <div class="ind-main__forms-phone">
                        <label class="label" for="index__phone">
                            <div class="ind-main__forms-ph">
                                <p>Куда </p><img src="/assets/svg/index/help.svg" alt="icons">
                            </div><img class="ind-main__forms-phone_m" src="/assets/svg/index_two/phone.svg" alt="icons">
                            <input type="text" name="phone" required id="index__phone" placeholder="Ваш телефон*">
                        </label>
                    </div>
                    <input type="hidden" value="" name="waypoint_id" id="waypoint_id">
                    <button class="ind-main__forms-trns">
                        <p>Подать заявку</p><img src="/assets/svg/index_two/chevron-right.svg" alt="icons">
                    </button>
                    </form>
                </div>

            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $('body').on('click', '.btn-waypoint', function () {
            $('.btn-waypoint').not($(this)).html('<p>Выбрать</p>');
            $(this).html('<p>Выбран</p>');
            $('#waypoint_id').val($(this).data('id'));
        });
    </script>
@endsection
