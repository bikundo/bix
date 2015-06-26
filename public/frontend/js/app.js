/**
 * Created by peter on 6/5/2015.
 */
$(".button-collapse").sideNav();

var wordsView = new Vue({
    el: '#wordsView',
    data: {
        message: 'Loading',
        words: null,
    },
    methods: {
        fetchData: $.get("/words", function (data) {
            wordsView.$data.words = data;
            console.log(data);
        })

    }
})