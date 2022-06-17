<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css?_v=20220601170047" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js?_v=20220601170047" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js?_v=20220601170047" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="/assets/css/style.min.css?_v=20220601170047">
<body>
<header class="header">
    <div class="containers">
        <div class="header__w"><a class="header__l" href="/"><picture><source srcset="/assets/img/logo.webp" type="image/webp"><img class="header__l-o" src="/assets/img/logo.png" alt="logo"></picture><picture><source srcset="/assets/img/logo_m.webp" type="image/webp"><img class="header__l-m" src="/assets/img/logo_m.png" alt="logo"></picture></a>
            @if(!Auth()->check())
            <button class="header__b"><img src="/assets/svg/index/user.svg" alt="icons">
                <p>Вход / Регистрация</p>
            </button>
            @else
            <a class="ind-main__form-trns" href="{{route('account')}}"><img src="/assets/svg/index/user.svg" alt="icons">
                <p>Личный кабинет</p>
            </a>
            @endif
        </div>
    </div>
</header>
<div id="app">
@yield('content')
</div>



<footer class="footer"> </footer>
<script>
    function myFunction(e) {
        //- $('.label').removeClass('focus_')
        //- $(this).parent().hasClass('label') ? $(this).parent().addClass('focus_') : ''


        //- if ($(this).hasClass('c_select-item-active')) {
        //-     $('.c_select').removeClass('focus_')
        //-     $('div.c_select').removeClass('c_select-item-active')
        //-     $('.c_select-block').addClass('display-n')
        //- } else {
        //-     alert(2)
        //- }
        //- $(e).addClass('focus_')


        //- if ($(this).hasClass('c_select-item-active'))
    }

    //! Focus - Select
    //- $('div.c_select').on('click', function (e) {
    //-     // событие клика по веб-документу
    //-     var div = $('div.c_select')  // тут указываем ID элемента
    //-     div.addClass('focus_')
    //- })

    $(document).ready(() => {
        setTimeout(() => {
            $('div.c_select').on('click', function() {
                $('div.c_select').not($(this)).removeClass('focus_')
                $('div.c_select').not($(this)).removeClass('c_select-item-active')
                $('.c_select-block').not($(this).children('.c_select-block')).addClass('display-n')

                if ($(this).hasClass('focus_')) {
                    $(this).removeClass('focus_')

                } else {
                    $(this).addClass('focus_')
                }
            })


            $('.c_select-element').on('click', function() {
                setTimeout(() => {
                    $('.c_select').removeClass('focus_')
                }, 1)
            })

            $(document).on('click', function (e) {
                // событие клика по веб-документу
                var div = $('div.c_select') // тут указываем ID элемента

                if (
                    !div.is(e.target) && // если клик был не по нашему блоку
                    div.has(e.target).length === 0
                ) {
                    // и не по его дочерним элементам
                    div.removeClass('focus_')
                    div.removeClass('c_select-item-active')
                    $('.c_select-block').addClass('display-n')
                }
            })
        }, 100)
    })


    //! Focus - Select


</script>
<div class="thx_request display-n">
    <div class="thx_request__w">
        <button class="thx_request__c"> <img src="/assets/svg/model/close.svg" alt="icons"></button>
        <div class="thx_request__b">
            <div class="thx_request__t">Спасибо за заявку!</div>
            <div class="thx_request__i">Наши специалисты свяжутся с вами после обработки вашей заявки и уточнят детали</div>
            <button class="thx_request__close">
                <p>Закрыть</p>
            </button>
        </div>
    </div>
</div>
<div class="info_car display-n">
    <div class="info_car__w">
        <button class="info_car__c"> <img src="/assets/svg/model/close.svg" alt="icons"></button>
        <ul class="info_car__b">
            <li class="info_car__i">
                <div class="info_car__t">Машина в пути</div>
                <div class="info_car__e">
                    <h5>Дата оправления:</h5>
                    <p id="date_of_dep">25.06.2022</p>
                </div>
                <div class="info_car__e">
                    <h5>Время в пути:</h5>
                    <p id="time_on_travel">2 дня</p>
                </div>
                <div class="info_car__e">
                    <h5>Дата прибытия:</h5>
                    <p id="date_of_arr">27.06.2022</p>
                </div>
            </li>
            <li class="info_car__i">
                <div class="info_car__t">Данные по грузу</div>
                <div class="info_car__e">
                    <h5>Вес:</h5>
                    <p id="data_of_weight">4500 кг</p>
                </div>
                <div class="info_car__e">
                    <h5>Объем:</h5>
                    <p id="data_of_size">20 м.куб</p>
                </div>
                <div class="info_car__e">
                    <h5>Кол-во упаковок:</h5>
                    <p id="data_of_qty">25 шт.</p>
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="registration display-n">
    <div class="registration__w">
        <form action="/test" id="reg_form" method="POST">
            <input type="hidden" name="name" value="test">
            <input type="hidden" name="role_id" value="2">
            <input type="hidden" name="confirm" value="0">
        <button class="registration__c"> <img src="/assets/svg/model/close.svg" alt="icons"></button>
        <div class="registration__b">
            <div class="registration__t">Регистрация<br>транспортной компании</div>
            <label class="label registration__comp" for="reg__comp">
                <p>Название компании</p><img src="/assets/svg/model/briefcase.svg" alt="icons">
                <input type="text" name="company" id="reg__comp" placeholder="Название компании">
            </label>
            <label class="label registration__user" for="reg__user">
                <p>Контактное лицо</p><img src="/assets/svg/model/user.svg" alt="icons">
                <input type="text" name="contact_face" id="reg__user" placeholder="Контактное лицо">
            </label>
            <label class="label registration__mail" for="reg__mail">
                <p>Ваша почта</p><img src="/assets/svg/model/mail.svg" alt="icons">
                <input type="text" name="email" id="reg__mail" placeholder="Ваша почта">
            </label>
            <label class="label registration__phone" for="reg__phone">
                <p>Ваш телефон</p><img src="/assets/svg/model/phone.svg" alt="icons">
                <input type="text" name="phone" id="reg__phone" placeholder="Ваш телефон">
            </label>
            <div class="registration__block">
                <label class="label registration__bin" for="reg__bin">
                    <p>БИН</p><img src="/assets/svg/model/credit-card.svg" alt="icons">
                    <input type="text" name="bin" id="reg__bin" placeholder="БИН">
                </label>
                <label class="label registration__year" for="reg__year">
                    <p>С какого года работаете?</p><img src="/assets/svg/model/calendar.svg" alt="icons">
                    <input type="text" name="year" id="reg__year" placeholder="Ваш год">
                </label>
            </div>
            <label class="label registration__address" for="reg__address">
                <p>Ваш адрес</p><img src="/assets/svg/model/map.svg" alt="icons">
                <textarea name="adress" type="text" id="reg__address" placeholder="Ваш адрес"></textarea>
            </label>
            <label class="label registration__text" for="reg__text">
                <p>Ваши реквизиты</p>
                <textarea type="text" name="requisites" id="reg__text" placeholder="Ваши реквизиты"></textarea>
            </label>
            <input type="hidden" id="pwd" name="password" value="12345678">
            <div class="registration__block">
                <label class="label registration__teng" for="reg__teng">
                    <p>Счет в тенгэ</p><img src="/assets/svg/model/credit-card.svg" alt="icons">
                    <input name="tenge_account" type="text" id="reg__teng" placeholder="Счет в тенгэ">
                </label>
                <label class="label registration__usd" for="reg__usd">
                    <p>Счет в USD</p><img src="/assets/svg/model/credit-card.svg" alt="icons">
                    <input type="text" name="usd_accout" id="reg__usd" placeholder="Счет в USD">
                </label>
            </div>
            <button class="registration__submit" type="button" onclick="registerCompany()">
                <p>Зарегистрироваться</p><img src="/assets/svg/model/arrow-r.svg" alt="icons">
            </button>
        </div>
        </form>
    </div>
</div>
<div class="addClient display-n">
    <div class="addClient__w">
        <form action="{{route('company.add.client')}}" method="POST">
            @csrf
        <button class="addClient__c"> <img src="/assets/svg/model/close.svg" alt="icons"></button>
        <div class="addClient__b">
            <div class="addClient__t">Добавление клиента к машине</div>
            <label class="label addClient__phone" for="reg__phone">
                <p>Телефон клиента</p><img src="/assets/svg/model/phone.svg" alt="icons">
                <input type="text" name="phone" id="reg__phone" placeholder="Телефон клиента">
            </label>
            <input type="hidden" id="add_client_order_id" name="waypoint_id">
            <button class="addClient__submit">
                <p>Добавить клиента</p>
            </button>
        </div>
        </form>
    </div>
</div>

<div class="info display-n">
    <div class="info__w">
        <button class="info__c"> <img src="/assets/svg/model/close.svg" alt="icons"></button>
        <div class="info__b">
            <div class="info__t">Информация о транспортной компании</div>
            <label class="label info__comp" for="reg__comp">
                <p>Название компании</p><img src="/assets/svg/model/briefcase.svg" alt="icons">
                <input type="text" id="reg__comp" placeholder="Название компании">
            </label>
            <label class="label info__user" for="reg__user">
                <p>Контактное лицо</p><img src="/assets/svg/model/user.svg" alt="icons">
                <input type="text" id="reg__user" placeholder="Контактное лицо">
            </label>
            <label class="label info__mail" for="reg__mail">
                <p>Ваша почта</p><img src="/assets/svg/model/mail.svg" alt="icons">
                <input type="text" id="reg__mail" placeholder="Ваша почта">
            </label>
            <label class="label info__phone" for="reg__phone">
                <p>Ваш телефон</p><img src="/assets/svg/model/phone.svg" alt="icons">
                <input type="text" id="reg__phone" placeholder="Ваш телефон">
            </label>
            <div class="info__block">
                <label class="label info__bin" for="reg__bin">
                    <p>БИН</p><img src="/assets/svg/model/credit-card.svg" alt="icons">
                    <input type="text" id="reg__bin" placeholder="БИН">
                </label>
                <label class="label info__year" for="reg__year">
                    <p>С какого года работаете?</p><img src="/assets/svg/model/calendar.svg" alt="icons">
                    <input type="text" id="reg__year" placeholder="Ваш год">
                </label>
            </div>
            <label class="label info__address" for="reg__address">
                <p>Адрес</p><img src="/assets/svg/model/map.svg" alt="icons">
                <textarea type="text" id="reg__address" placeholder="Ваш адрес"></textarea>
            </label>
            <label class="label info__text" for="reg__text">
                <p>Реквизиты</p>
                <textarea type="text" id="reg__text" placeholder="Ваши реквизиты"></textarea>
            </label>
            <div class="info__block">
                <label class="label info__teng" for="reg__teng">
                    <p>Счет в тенгэ</p><img src="/assets/svg/model/credit-card.svg" alt="icons">
                    <input type="text" id="reg__teng" placeholder="Счет в тенгэ">
                </label>
                <label class="label info__usd" for="reg__usd">
                    <p>Счет в USD</p><img src="/assets/svg/model/credit-card.svg" alt="icons">
                    <input type="text" id="reg__usd" placeholder="Счет в USD">
                </label>
            </div>
            <button class="info__submit">
                <p>Сохранить</p>
            </button>
        </div>
    </div>
</div>
<script src="/js/app.js"></script>
@yield('scripts')
<script>
    function registerCompany(){
        $('#reg_pwd').val(Math.random().toString(36).substring(2));

        $.ajax({
            url:     '/api/register/company', //url страницы (action_ajax_form.php)
            type:     "POST", //метод отправки
            dataType: "html", //формат данных
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            data: $("#reg_form").serialize(),  // Сеарилизуем объект
            success: function(response) { //Данные отправлены успешно
                document.querySelector('.registration').classList.add('display-n');
                document.querySelector('.thx_request').classList.remove('display-n');
            },
            error: function(response) { // Данные не отправлены
                console.log(response)
            }
        });
    }
</script>
<script>
    $('.delete-btn').click(function (){
        let res = confirm('Вы уверенны?');
        if(!res){
            return false;
        }
    });
</script>

<script type="module" src="/assets/js/app.min.js?_v=20220601170047"></script>

</body>
</html>
