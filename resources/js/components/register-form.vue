<template>
    <div class="registration display-n">
        <div class="registration__w">
            <button class="registration__c"> <img src="/assets/svg/model/close.svg" alt="icons"></button>
            <div class="registration__b">
                <div class="registration__t">Регистрация<br>транспортной компании</div>
                <label class="label registration__comp" for="reg__comp">
                    <p>Название компании</p><img src="/assets/svg/model/briefcase.svg" alt="icons">
                    <input type="text" v-model="company" id="reg__comp" placeholder="Название компании">
                </label>
                <label class="label registration__user" for="reg__user">
                    <p>Контактное лицо</p><img src="/assets/svg/model/user.svg" alt="icons">
                    <input type="text" v-model="contact" id="reg__user" placeholder="Контактное лицо">
                </label>
                <label class="label registration__mail" for="reg__mail">
                    <p>Ваша почта</p><img src="/assets/svg/model/mail.svg" alt="icons">
                    <input type="text" v-model="email" id="reg__mail" placeholder="Ваша почта">
                </label>
                <label class="label registration__phone" for="reg__phone">
                    <p>Ваш телефон</p><img src="/assets/svg/model/phone.svg" alt="icons">
                    <input type="text" v-model="phone" id="reg__phone" placeholder="Ваш телефон">
                </label>
                <div class="registration__block">
                    <label class="label registration__bin" for="reg__bin">
                        <p>БИН</p><img src="/assets/svg/model/credit-card.svg" alt="icons">
                        <input type="text" v-model="bin" id="reg__bin" placeholder="БИН">
                    </label>
                    <label class="label registration__year" for="reg__year">
                        <p>С какого года работаете?</p><img src="/assets/svg/model/calendar.svg" alt="icons">
                        <input type="text" v-model="year" id="reg__year" placeholder="Ваш год">
                    </label>
                </div>
                <label class="label registration__address" for="reg__address">
                    <p>Ваш адрес</p><img src="/assets/svg/model/map.svg" alt="icons">
                    <textarea type="text" v-model="adress" id="reg__address" placeholder="Ваш адрес"></textarea>
                </label>
                <label class="label registration__text" for="reg__text">
                    <p>Ваши реквизиты</p>
                    <textarea type="text" v-model="req" id="reg__text" placeholder="Ваши реквизиты"></textarea>
                </label>
                <div class="registration__block">
                    <label class="label registration__teng" for="reg__teng">
                        <p>Счет в тенгэ</p><img src="/assets/svg/model/credit-card.svg" alt="icons">
                        <input type="text" v-model="tenge" id="reg__teng" placeholder="Счет в тенгэ">
                    </label>
                    <label class="label registration__usd" for="reg__usd">
                        <p>Счет в USD</p><img src="/assets/svg/model/credit-card.svg" alt="icons">
                        <input type="text" v-model="usd" id="reg__usd" placeholder="Счет в USD">
                    </label>
                </div>
                <button class="registration__submit" @click="send()">
                    <p>Зарегистрироваться</p><img src="/assets/svg/model/arrow-r.svg" alt="icons">
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
name: "register-form",
data: () => ({
    company: "",
    contact: "",
    email: "",
    phone: "",
    bin: "",
    year: "",
    adress: "",
    req: "",
    tenge: "",
    usd: "",
    //
    errors_count: 0
}),
methods:{
    send(){
        const data = {company:this.company, contact_face: this.contact, email:this.email, phone:this.phone,bin:this.bin,year:this.year, adress:this.adress, requisites:this.req, tenge_account:this.tenge, usd_account:this.usd, name:'name', password:Math.random().toString(36).slice(2), role_id:2, confirm:0}
        axios.post('/api/create-user', {data})
            .then(res => (document.querySelector('.registration').classList.add('display-n'),document.querySelector('.thx_request').classList.remove('display-n')))
            .catch((err) => {
                if(this.company.length == 0){
                    document.querySelector('.registration__comp').classList.add('error');
                }else{
                    document.querySelector('.registration__comp').classList.remove('error');
                }

                if(this.contact.length == 0){
                    document.querySelector('.registration__user').classList.add('error');
                }else {
                    document.querySelector('.registration__user').classList.remove('error');
                }

                if(this.email.length == 0){
                    document.querySelector('.registration__mail').classList.add('error');
                }else{
                    document.querySelector('.registration__mail').classList.remove('error');
                }

                if(this.phone.length == 0){
                    document.querySelector('.registration__phone').classList.add('error');
                }else{
                    document.querySelector('.registration__phone').classList.remove('error');
                }

                if(this.bin.length == 0){
                    document.querySelector('.registration__bin').classList.add('error');
                }else{
                    document.querySelector('.registration__bin').classList.remove('error');
                }

                if(this.year.length == 0){
                    document.querySelector('.registration__year').classList.add('error');
                }else{
                    document.querySelector('.registration__year').classList.remove('error');
                }

                if(this.adress.length == 0){
                    document.querySelector('.registration__address').classList.add('error');
                }else{
                    document.querySelector('.registration__address').classList.remove('error');
                }

                if(this.req.length == 0){
                    document.querySelector('.registration__text').classList.add('error');
                }else{
                    document.querySelector('.registration__text').classList.remove('error');
                }

                if(this.tenge.length == 0){
                    document.querySelector('.registration__teng').classList.add('error');
                }else{
                    document.querySelector('.registration__teng').classList.remove('error');
                }

                if(this.usd.length == 0){
                    document.querySelector('.registration__usd').classList.add('error');
                }else{
                    document.querySelector('.registration__usd').classList.remove('error');
                }
            });
    }
}
}
</script>

<style scoped>

</style>
