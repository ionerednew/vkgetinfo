requirejs.config({
    paths: {
        "Vue": "https://cdnjs.cloudflare.com/ajax/libs/vue/2.3.4/vue.min",
        "vue": "https://rawgit.com/edgardleal/require-vue/master/dist/require-vuejs",
        "vue-router": "https://cdnjs.cloudflare.com/ajax/libs/vue-router/2.7.0/vue-router.min"
    },
    shim: {
        "Vue": {"exports": "Vue"}
    }
});

require(["Vue", "vue-router"], function(Vue, VueRouter){

var asyncComp = function(componentName) {
    return function(resolve) {
        require([componentName], resolve);
    };
};

var Login = asyncComp('vue!views/login')
var Result = asyncComp('vue!views/results')
var Main = asyncComp('vue!views/main')

Vue.use(VueRouter)


var router = new VueRouter({
    routes: [
        { path: '/login', component: Login },
        { path: '/results', component: Result },
        { path: '/', component: Main }
    ]
})

new Vue({
    el: '#app',
    router: router
})

});