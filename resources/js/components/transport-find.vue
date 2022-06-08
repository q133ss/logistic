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
                <option value="default" selected="">ЖД</option>
                <option value="element_2">Авто</option>
            </select>
        </div>
        <div class="ind-main__form-type">
            <div class="ind-main__form-h">
                <p>Откуда</p><img src="/assets/svg/index/help.svg" alt="icons">
            </div>
            <select class="c_select" id="map_i" name="sort" style="display: none">
                <option>Начальная точка маршрута</option>
                <option value="default" selected="">ЖД</option>
                <option value="element_2">Авто</option>
                <option value="element_3">Авто</option>
                <option value="element_4">Авто</option>
                <option value="element_5">Авто</option>
                <option value="element_6">Авто</option>
                <option value="element_7">Авто</option>
            </select>
        </div>
        <div class="ind-main__form-type">
            <div class="ind-main__form-h">
                <p>Куда</p><img src="/assets/svg/index/help.svg" alt="icons">
            </div>
            <select class="c_select" id="map_i" name="sort" style="display: none">
                <option>Конец маршрута</option>
                <option value="default" selected="">ЖД</option>
                <option value="element_2">Авто</option>
                <option value="element_3">Авто</option>
                <option value="element_4">Авто</option>
                <option value="element_5">Авто</option>
                <option value="element_6">Авто</option>
                <option value="element_7">Авто</option>
            </select>
        </div>
        <button class="ind-main__form-trns">
            <p>Найти транспорт</p><img src="" alt="icons">
        </button>
    </div>
</template>

<script>
export default {
name: "transport-find"
}
</script>

<style scoped>

</style>
