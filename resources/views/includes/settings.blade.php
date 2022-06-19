@extends('layouts.main')
@section('title','Настройки')
@section('content')
    <section class="service">
        <div class="containers">
            <div class="service__w">
            @include(Auth()->user()->get_role->name.'.menu')
                <ul class="service__info">
                    <form action="{{route('settings')}}" method="POST">
                        @csrf
                    <div class="company__search-g">
                    <label class="company__search-e label" style="margin-top: 20px;" for="company__two">
                        <div class="company__search-text">
                            <p>Имя</p>
                        </div>
                        <input type="text" name="name" id="company__two" placeholder="Имя" value="{{$user->name}}">
                    </label>
                    <label class="company__search-e label" style="margin-top: 20px;" for="company__two">
                        <div class="company__search-text">
                            <p>Телефон</p>
                        </div>
                        <input type="text" name="phone" id="company__two" placeholder="Телефон" value="{{$user->phone}}">
                    </label>

                    <label class="company__search-e label" style="margin-top: 20px;" for="company__two">
                        <div class="company__search-text">
                            <p>Email</p>
                        </div>
                        <input type="text" name="email" id="company__two" placeholder="Email" value="{{$user->email}}">
                    </label>

{{--                    Company--}}
                        @if($user->get_role->id == 2 || $user->get_role->id == 3)
                        <label class="company__search-e label" style="margin-top: 20px;" for="company__two">
                            <div class="company__search-text">
                                <p>Контактное лицо</p>
                            </div>
                            <input type="text" name="contact_face" id="company__two" placeholder="Контактное лицо" value="{{$user->contact_face}}">
                        </label>

                        <label class="company__search-e label" style="margin-top: 20px;" for="company__two">
                            <div class="company__search-text">
                                <p>БИН</p>
                            </div>
                            <input type="text" name="bin" id="company__two" placeholder="БИН" value="{{$user->bin}}">
                        </label>


                        <label class="company__search-e label" style="margin-top: 20px;" for="company__two">
                            <div class="company__search-text">
                                <p>Год</p>
                            </div>
                            <input type="text" name="year" id="company__two" placeholder="Год" value="{{$user->year}}">
                        </label>

                        <label class="company__search-e label" style="margin-top: 20px;" for="company__two">
                            <div class="company__search-text">
                                <p>Счет тенге</p>
                            </div>
                            <input type="text" name="tenge_account" id="company__two" placeholder="Счет тенге" value="{{$user->tenge_account}}">
                        </label>

                        <label class="company__search-e label" style="margin-top: 20px;" for="company__two">
                            <div class="company__search-text">
                                <p>Счет USD</p>
                            </div>
                            <input type="text" name="usd_account" id="company__two" placeholder="Счет USD" value="{{$user->usd_account}}">
                        </label>
                    </div>
                        @endif

                    <button type="submit" class="company__search-rsl"><p>Сохранить</p></button>
                    </form>
                </ul>
            </div>
        </div>
    </section>
@endsection
