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
                        @if($company->confirm == 0)
                        <div class="service__info-a service__info-a__red">Новая</div>
                        @else
                        <div class="service__info-a service__info-a__red service__info-a__yellow service__info-a__green">Одобрена</div>
                        @endif
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
                                    <li class="selectOne__i selectOne__i-info" onclick="get_company_data('{{$company->id}}')">Информация о компании</li>
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

@section('scripts')
    <style>
        .info_company{
            position : fixed;
            top : 0;
            left : 0;
            width : 100%;
            height : 100vh;
            overflow-x : hidden;
            overflow-y : auto;
            outline : 0;
            z-index : 100;
            display : -webkit-box;
            display : -ms-flexbox;
            display : flex;
            -webkit-box-align : center;
            -ms-flex-align : center;
            align-items : center;
            -webkit-box-pack : center;
            -ms-flex-pack : center;
            justify-content : center;
            background : rgba(54, 54, 54, 0.3);
        }

        .info_company_w{
            width : 384px;
            background : #f9fafb;
            border : 1px solid #f3f4f6;
            -webkit-box-shadow : 0px 12px 16px -4px rgba(16, 24, 40, 0.1), 0px 4px 6px -2px rgba(16, 24, 40, 0.05);
            box-shadow : 0px 12px 16px -4px rgba(16, 24, 40, 0.1), 0px 4px 6px -2px rgba(16, 24, 40, 0.05);
            border-radius : 8px;
            display : -webkit-box;
            display : -ms-flexbox;
            display : flex;
            -webkit-box-orient : vertical;
            -webkit-box-direction : normal;
            -ms-flex-direction : column;
            flex-direction : column;
            -webkit-box-align : center;
            -ms-flex-align : center;
            align-items : center;
            -webkit-box-pack : start;
            -ms-flex-pack : start;
            justify-content : flex-start;
            position : relative;
            padding : 20px 32px;
        }
    </style>

    <div class="info_company display-n">
        <div class="info_company_w">
            <button class="info_car__c"> <img src="/assets/svg/model/close.svg" alt="icons"></button>
            <ul class="info_car__b">
                <li class="info_car__i">
                    <div class="info_car__t">Компания</div>
                    <div class="info_car__e">
                        <h5>Название:</h5>
                        <p id="comp_title"></p>
                    </div>

                    <div class="info_car__e">
                        <h5>Контактное лицо</h5>
                        <p id="comp_face"></p>
                    </div>

                    <div class="info_car__e">
                        <h5>Телефон</h5>
                        <p id="comp_phone">

                        </p>
                    </div>

                    <div class="info_car__e">
                        <h5>БИН</h5>
                        <p id="comp_bin">

                        </p>
                    </div>

                    <div class="info_car__e">
                        <h5>Год основания</h5>
                        <p id="comp_year">

                        </p>
                    </div>

                    <div class="info_car__e">
                        <h5>Реквизиты</h5>
                        <p id="comp_req">

                        </p>
                    </div>

                    <div class="info_car__e">
                        <h5>Счет в тенге</h5>
                        <p id="comp_tenge">

                        </p>
                    </div>

                    <div class="info_car__e">
                        <h5>Счет в USD</h5>
                        <p id="comp_usd">

                        </p>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <script>
        function get_company_data(company_id){
            //Данные о компании
            $.get( "/api/get-company-info/"+company_id, function( data ) {
                let company = data.data;

                $('#comp_title').text(company.company);
                $('#comp_face').text(company.contact_face);
                $('#comp_phone').text(company.phone);
                $('#comp_bin').text(company.bin);
                $('#comp_year').text(company.year);
                $('#comp_req').text(company.requisites);
                $('#comp_tenge').text(company.tenge_account);
                $('#comp_usd').text(company.usd_account);
            });
            $('.info_company').removeClass('display-n');
            $("body").css("overflow","hidden");
        }

        $('.info_company').mouseup(function (e) {
            var div = $('.info_company_w');

            if (!div.is(e.target) && div.has(e.target).length === 0) {
                $('.info_company').addClass('display-n');
                $('body').css('overflow', 'visible');
            }
        });
    </script>
@endsection
