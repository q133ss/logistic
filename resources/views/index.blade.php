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
                <transport-find></transport-find>
            </div>
        </div>
    </section>
@endsection
