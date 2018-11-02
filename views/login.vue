<template>
    <div class="row">

        <div class="col-md-12">
            <form method="post" action="result.php">
<<<<<<< HEAD
                <p><input class="s2_input" type="text" name="id" placeholder="Id пользователя" id="email"></p>
                <!--<p><input class="s2_input" type="password" placeholder="Пароль" id="password">-->
                <br><br>
                <p><button type="submit" class="confirm_button">Отправить</button></p>
            </form>
             <a href = 'https://oauth.vk.com/authorize?client_id=6676577&display=page&redirect_uri=https://vkpsy.ru/login.php&scope=friends,photos,audio,video,status,groups,offline,stats,email&response_type=code&v=5.62'><button class="confirm_button">Вход через VK</button></a>
=======
                <p><input class="s2_input" type="text" name="id" placeholder="Link" id="email"></p>
                <!--<p><input class="s2_input" type="password" placeholder="Пароль" id="password">-->
                <br><br>
                <p><button type="submit" class="confirm_button">Send</button></p>
            </form>
             <a href = 'https://oauth.vk.com/authorize?client_id=6676577&display=page&redirect_uri=http://test-server/3/login.php&scope=friends,photos,audio,video,status,groups,offline,stats,email&response_type=code&v=5.62'><button class="confirm_button">VK</button></a>
>>>>>>> 84ace557f3b539fe13b60ee6f43cea53e7e8b871
        </div>

        <div class="col-md-12">
            <br>
<<<<<<< HEAD
            Для успешного прохождения теста, нам нужно получить данные с вашей странички. Для этого введите id пользователя Вконтакте или пройдите авторизацию по кнопке.
=======
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ullam, nisi enim libero dignissimos suscipit omnis nam fuga perspiciatis quas quis, impedit. Temporibus, cupiditate voluptate voluptatem ipsam optio aliquid ipsum nesciunt.
>>>>>>> 84ace557f3b539fe13b60ee6f43cea53e7e8b871
        </div>
    </div>

</template>


<script>
define(["Vue"], function(Vue) {

    return Vue.component("vue-login", {
        template: template
    });

});
</script>