<template>
    <div class="ind-main__forms" style="display: none">
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
</template>

<script>
export default {
    name: "transport-found",
    data:{
        gsds: ""
    },
    methods:{
        test(){
            alert('Hello')
        }
    }
}
</script>

<style scoped>

</style>
