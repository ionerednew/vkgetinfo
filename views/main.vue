<template>
    <div class="row">
        <div class="col-md-6">
            <img class="center" src="img/disign_main-page.png" alt="">
        </div>
        <div class="col-md-6">
            <h1>Психологический портрет</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque, earum quibusdam possimus, consectetur quo deleniti at, expedita, debitis assumenda doloribus iste. Distinctio aliquam iure, sequi harum asperiores aperiam possimus, quibusdam!</p>
            <br><br><br>
            <router-link to='/login'><button class="confirm_button">Let me try</button></router-link>
            <button class="deny_button">may be later</button>
        </div>

        <div class="col-md-12"><div class="col-md-12">
        <div class="col-md-12"><div class="col-md-12"><div class="col-md-12"><div class="col-md-12">
        <div class="col-md-12"><div class="col-md-12">
            <p><br><br><br>*Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero recusandae quidem architecto necessitatibus facilis labore atque. Vero neque blanditiis et, fugiat, fugit illum ullam inventore debitis suscipit quidem facere earum!</p>
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