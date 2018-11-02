<template>
    <div class="row">
        <div class="col-md-6">
            <img class="center" src="img/disign_main-page.png" alt="">
        </div>
        <div class="col-md-6">
            <h1>Психологический портрет</h1>
            <p>Проект по составлению биографического и психологического портрета пользователя на основе анализа данных из открытых профилей соцсетей
                <br><br>Приложение ознакомит Вас с психологической информацией, содержащейся на вашей странице
            </p>
            <br><br>
            <router-link to='/login'><button class="confirm_button">Начать</button></router-link>
            <!-- <button class="deny_button">may be later</button> -->
        </div>

        <div class="col-md-12"><div class="col-md-12">
        <div class="col-md-12"><div class="col-md-12"><div class="col-md-12"><div class="col-md-12">
        <div class="col-md-12"><div class="col-md-12">
            <p><br><br><br>*разработано студентами ЮФУ 1 курса по предмету: "Введение в инженерную деятельность". 
                <br> Copyright 2018</p>
        </div></div></div></div></div></div></div></div>
    </div>
</template>


<script>
define(["Vue"], function(Vue) {
    var result = {
        template: template,
    };
    Vue.component("vue-home", result);
    return result;
});
</script>