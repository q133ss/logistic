<template>
    <div class="ind-main__form">
        <p class="ind-main__form-i">Поиск транспорта</p>
        <h3 class="ind-main__form-t">Подберем транспорт для<br>вашего груза </h3>
        <p class="ind-main__form-a">Помощь в организации сборных грузов</p>
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
            <select class="c_select" id="map_i" name="sort" style="display: none">
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
        <button class="ind-main__form-trns">
            <p>Найти транспорт</p><img src="" alt="icons">
        </button>
    </div>
</template>

<script>
import Axios from 'Axios';

export default {
name: "transport-find",
    data: () => ({
        types: [],
        cities: []
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
    },
}
</script>

<style scoped>

</style>
