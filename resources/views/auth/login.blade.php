<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css?_v=20220616224910" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer">
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js?_v=20220616224910" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js?_v=20220616224910" integrity="sha512-d4KkQohk+HswGs6A1d6Gak6Bb9rMWtxjOa0IiY49Q3TeFd5xAzjWXDCBW9RS7m86FQ4RzM2BdHmdJnnKRYknxw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="/assets/css/style.min.css?_v=20220616224910">
</html>
<body></body>
<header class="headers">
    <div class="containers">
        <div class="headers__w"><a class="headers__l" href="/"><picture><source srcset="/assets/img/logo.webp" type="image/webp"><img class="headers__l-o" src="/assets/img/logo.png" alt="logo"></picture><picture><source srcset="/assets/img/logo_m.webp" type="image/webp"><img class="headers__l-m" src="/assets/img/logo_m.png" alt="logo"></picture></a></div>
    </div>
</header>
<section class="reg">
    <div class="containers">
        <div class="reg__w">
            <ul class="reg__tab">
                <li class="reg__tab-i reg__tab-a" id="reg__tab__one">
                    <button class="reg__tab-w">
                        <p>Авторизация</p>
                    </button>
                </li>
                <li class="reg__tab-i" id="reg__tab__two">
                    <button class="reg__tab-w">
                        <p>Регистрация</p>
                    </button>
                </li>
            </ul>
            <div class="reg__block">
                <form action="{{route('login')}}" method="POST">
                <div class="reg__auth">
                        @csrf
                    <label class="reg__auth-p">
                        <div class="reg__auth-i"> <img src="/assets/svg/reg/phone.svg" alt="icons"></div>
                        <div class="reg__auth-l"> </div>
                        <input class="reg__auth-t" name="phone" placeholder="Введите свой номер" id="reg__phone">
                    </label>
                    <label class="reg__auth-p">
                        <div class="reg__auth-i"> <img src="/assets/svg/reg/pass.svg" alt="icons"></div>
                        <div class="reg__auth-l"> </div>
                        <input class="reg__auth-t" type="password" name="password" placeholder="Введите свой пароль">
                    </label>
                    <button class="reg__auth-a" type="submit">
                        <p>Войти</p>
                    </button>
                    <button class="reg__auth-r" type="button">
                        <p>Забыли пароль?</p>
                    </button>
                </div>
                </form>

                <div class="reg__regist display-n">
                    <label class="reg__regist-p">
                        <div class="reg__regist-i"> <img src="/assets/svg/reg/phone.svg" alt="icons"></div>
                        <div class="reg__regist-l"> </div>
                        <input class="reg__regist-t" placeholder="Введите свой номер" id="reg__phone">
                    </label>
                    <label class="reg__regist-p">
                        <div class="reg__regist-i"> <img src="/assets/svg/reg/pass.svg" alt="icons"></div>
                        <div class="reg__regist-l"> </div>
                        <input class="reg__regist-t" type="password" placeholder="Придумайте пароль">
                    </label>
                    <label class="reg__regist-p">
                        <div class="reg__regist-i"> <img src="/assets/svg/reg/ready.svg" alt="icons"></div>
                        <div class="reg__regist-l"> </div>
                        <input class="reg__regist-t" type="password" placeholder="Подтвердите пароль">
                    </label>

                    <label class="reg__regist-p">
                        <div class="reg__regist-i"> <img src="/assets/svg/reg/ready.svg" alt="icons"></div>
                        <div class="reg__regist-l"> </div>
                        <input type="radio" value="1" class="reg__radio" name="role_id">
                        <span class="reg__regist-t reg-select-c">Я клиент</span>
                    </label>

                    <label class="reg__regist-p">
                        <div class="reg__regist-i"> <img src="/assets/svg/reg/ready.svg" alt="icons"></div>
                        <div class="reg__regist-l"> </div>
                        <input type="radio" value="2" class="reg__radio" name="role_id">
                        <span class="reg__regist-t reg-select-c">Я компания</span>
                    </label>

                    <button class="reg__regist-a">
                        <p>Далее</p>
                    </button>
                </div>

                <div class="reg__code display-n">
                    <div class="reg__code-t">
                        <p>На ваш номер был выслан СМС с 6-ти значным кодом подтверждения</p>
                    </div>
                    <div class="reg__code-w">
                        <input name="code" type="text" maxlength="1" autofocus>
                        <input name="code" type="text" maxlength="1">
                        <input name="code" type="text" maxlength="1">
                        <input name="code" type="text" maxlength="1">
                        <input name="code" type="text" maxlength="1">
                        <input name="code" type="text" maxlength="1">
                    </div>
                    <button class="reg__code-a">
                        <p>Подтвердить</p>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .reg-select-c{
        color:#ababab;
        margin-left: 10px;
    }
</style>
<script type="module" src="/assets/js/app.min.js?_v=20220616224910"></script>
