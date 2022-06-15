@extends('layouts.main')
@section('title', 'Панель администратора')
@section('content')
    <section class="service">
        <div class="containers">
            <div class="service__w">
                @include('admin.menu')
                <ul class="service__info">
                    <li class="service__info-h">
                        <div class="service__info-title">Статус</div>
                        <div class="service__info-tp">
                            <h5>Компания</h5>
                            <p>номер</p>
                        </div>
                        <div class="service__info-st">Направление</div>
                        <div class="service__info-fn">Контактное лицо</div>
                        <div class="service__info-js">Действия</div>
                    </li>
                    @foreach($companies as $company)
                    <li class="service__info-e">
                        <div class="service__info-a service__info-a__red service__info-a__yellow service__info-a__green">Новая</div>
                        <div class="service__info-path">
                            <h5>«{{$company->company}}»</h5>
                            <p>{{$company->id}}</p>
                        </div>
                        <div class="service__info-start">
                            <p>Караганда</p>
                        </div>
                        <div class="service__info-finally">
                            <h5>{{$company->contact_face}} </h5>
                            <p></p>
                        </div>
                        <div class="service__info-just">
                            <button class="service__info-mail" onclick="location.href='mailto:{{$company->email}}'"> <img src="/assets/svg/service/mail.svg" alt="icons"></button>
                            <button class="service__info-phone" onclick="location.href='tel:{{$company->phone}}'"> <img src="/assets/svg/service/phone.svg" alt="icons"></button>
                            <button class="service__info-more"><img src="/assets/svg/service/more.svg" alt="icons">
                                <ul class="selectOne display-n">
                                    <li class="selectOne__i selectOne__i-ready" onclick="location.href='/admin/accept/{{$company->id}}'">Одобрить компанию</li>
                                    <li class="selectOne__i selectOne__i-delete" onclick="$('#delete_{{$company->id}}').submit()">Удалить компанию</li>
                                    <li class="selectOne__i selectOne__i-info">Информация о компании</li>
                                </ul>
                            </button>
                            <button class="service__info-add">  <img src="/assets/svg/service/drop.svg" alt="icons"></button>
                        </div>
                    </li>
                        <form action="{{route('admin.delete', $company->id)}}" id="delete_{{$company->id}}" style="display: none" method="POST">
                            @method('DELETE')
                            @csrf
                        </form>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endsection
