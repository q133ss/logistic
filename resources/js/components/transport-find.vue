<template>
    <div class="">


        <div class="ind-main__form" v-if="switcher == 1">
            <p class="ind-main__form-i">Поиск транспорта</p>
            <h3 class="ind-main__form-t">Подберем транспорт для<br>вашего груза </h3>
            <p class="ind-main__form-a">Помощь в организации сборных грузов</p>
            <p class="service__info-a service__info-a__red service__info-a__yellow">{{this.error}}</p>
            <div class="ind-main__form-type">
                <div class="ind-main__form-h">
                    <p>Выберите транспорт</p><img src="/assets/svg/index/help.svg" alt="icons">
                </div>
                <select class="c_select" id="track_i" name="sort" style="display: none">
                    <option>На чем будем везти</option>
                    <option :value="type.id" v-for="type in types">{{type.name}}</option>
                </select>
            </div>
            <div class="ind-main__form-type">
                <div class="ind-main__form-h">
                    <p>Откуда</p><img src="/assets/svg/index/help.svg" alt="icons">
                </div>
                <select class="c_select" id="map_i ff" name="sort" style="display: none">
                    <option>Начальная точка маршрута</option>
                    <option :value="city.id" v-for="(city, key) in cities">{{city.name}}</option>
                </select>
            </div>
            <div class="ind-main__form-type">
                <div class="ind-main__form-h">
                    <p>Куда</p><img src="/assets/svg/index/help.svg" alt="icons">
                </div>
                <select class="c_select" id="map_i" name="sort" style="display: none">
                    <option>Конец маршрута</option>
                    <option :value="city.id" v-for="(city, key) in cities">{{city.name}}</option>
                </select>
            </div>
            <button class="ind-main__form-trns" type="submit" @click="send()">
                <p>Найти транспорт</p><img src="" alt="icons">
            </button>
        </div>

        <!--||||-->
        <div class="ind-main__forms" v-if="switcher == 2">
            <p class="ind-main__forms-i">Поиск транспорта</p>
            <h3 class="ind-main__forms-t">Мы нашли для вас <br>транспорт:<span>2 фуры</span></h3>
            <ul class="ind-main__forms-l">
                <li class="ind-main__forms-e"><img class="ind-main__forms-icon" src="/assets/svg/index_two/car.svg" alt="icons">
                    <div class="ind-main__forms-w">
                        <div class="ind-main__forms-text">
                            <p>Заполненность машины</p><span>45%</span>
                        </div>
                        <div class="ind-main__forms-p" data-progress="45%">
                            <div class="ind-main__forms-bar" style="width: 45%;"></div>
                        </div>
                        <div class="ind-main__forms-info">Доступно для загрузки</div>
                        <div class="ind-main__forms-a">
                            <h5>По весу:</h5>
                            <p>4 500кг</p>
                        </div>
                        <div class="ind-main__forms-a">
                            <h5>По объему:</h5>
                            <p>25 м.куб</p>
                        </div>
                    </div>
                </li>
                <li class="ind-main__forms-e"><img class="ind-main__forms-icon" src="/assets/svg/index_two/traint.svg" alt="icons">
                    <div class="ind-main__forms-w">
                        <div class="ind-main__forms-text">
                            <p>Заполненность машины</p><span>99%</span>
                        </div>
                        <div class="ind-main__forms-p" data-progress="99%">
                            <div class="ind-main__forms-bar" style="width: 99%;"></div>
                        </div>
                        <div class="ind-main__forms-info">Доступно для загрузки</div>
                        <div class="ind-main__forms-a">
                            <h5>По весу:</h5>
                            <p>4 500кг</p>
                        </div>
                        <div class="ind-main__forms-a">
                            <h5>По объему:</h5>
                            <p>25 м.куб</p>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="ind-main__forms-name">
                <label class="label" for="index__name">
                    <div class="ind-main__forms-n">
                        <p>Как вас зовут </p><img src="/assets/svg/index/help.svg" alt="icons">
                    </div><img class="ind-main__forms-name_m" src="/assets/svg/index_two/user.svg" alt="icons">
                    <input type="text" id="index__name" placeholder="Ваше имя*">
                </label>
            </div>
            <div class="ind-main__forms-phone">
                <label class="label" for="index__phone">
                    <div class="ind-main__forms-ph">
                        <p>Куда </p><img src="/assets/svg/index/help.svg" alt="icons">
                    </div><img class="ind-main__forms-phone_m" src="/assets/svg/index_two/phone.svg" alt="icons">
                    <input type="text" id="index__phone" placeholder="Ваш телефон*">
                </label>
            </div>
            <button class="ind-main__forms-trns">
                <p>Подать заявку</p><img src="/assets/svg/index_two/chevron-right.svg" alt="icons">
            </button>
        </div>

    </div>
</template>

<script>
import Axios from 'Axios';

export default {
    name: "transport-find",
    data: () => ({
        types: [],
        cities: [],
        //Поля из формы
        type: "",
        from: "",
        to: "",
        //Ответ после отправки
        send_resp: [],
        switcher: 1,
        error: "",
        car_id: ""
    }),
    mounted(){
        this.getData();
    },
    methods:{
        getData(){
            Axios.get('/api/get-types')
                .then( res => (this.types = res.data.data));

            Axios.get('/api/get-cities')
                .then( res => (this.cities = res.data.data));

            this.$nextTick(() => {
                import('/assets/js/app.min.js?_v=20220601170047');
            });
        },
        send(){
            let from_select = document.querySelectorAll('.c_select-placeholder');

            this.type = from_select[0].textContent;
            this.from = from_select[1].textContent;
            this.to = from_select[2].textContent;

            Axios.post('/api/get-data-from-form/'+this.type+'/'+this.from+'/'+this.to)
                .then( res => (this.send_resp = res.data.data));
            console.log(this.send_resp)
            this.send_repeat();
        },
        send_repeat(){
            Axios.post('/api/get-data-from-form/'+this.type+'/'+this.from+'/'+this.to)
                .then( res => (this.send_resp = res.data.data));
            console.log(this.send_resp);
        }
    },
}
</script>

<style scoped>

</style>
