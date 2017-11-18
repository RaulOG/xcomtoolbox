
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

require('jquery');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});


/**
 * Toolbox
 */
var toolbox         = $(".toolbox");
var toolboxButton   = $('.toolbox__button[data-value]');

//window.onload = function(){
//    TweenMax.to(toolbox, 0.6, { delay: 0.3, opacity: 1});
//};

toolboxButton.click(function(){
    TweenMax.to(toolbox, 0.1, {
        opacity: 0,
        onComplete: function(){
            location.href = "/toolbox/" + $(this).attr("data-value");
        }.bind($(this))
    });
});
