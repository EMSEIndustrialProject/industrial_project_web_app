import Vue from 'vue'
import Example from './components/Example'

new Vue({
    el: '#app',
    delimiters: ["<%","%>"],
    data: {
        test: 'a',
        title: 'titre',
        user: 'b'
    },
    components:{ Example },
    mounted: function() {
        this.user = this.$el.attributes['data-name'].value;
    }
});