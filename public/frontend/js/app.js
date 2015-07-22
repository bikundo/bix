smoothScroll.init({
    speed: 1000, // Integer. How fast to complete the scroll in milliseconds
    easing: 'easeInOutCubic', // Easing pattern to use
    updateURL: true, // Boolean. Whether or not to update the URL with the anchor hash on scroll
    offset: 50, // Integer. How far to offset the scrolling anchor location in pixels
    callbackBefore: function (toggle, anchor) {
    }, // Function to run before scrolling
    callbackAfter: function (toggle, anchor) {
    } // Function to run after scrolling
});
$( document ).ready(function(){
         $(".button-collapse").sideNav();
    });

new Vue({
    el: '#contact-me-form',

    data: {
        newMessage: {name: '', email: '', message: '', _token: ''},
        submitted: false
    },

    computed: {
        errors: function () {
            for (var key in this.newMessage) {
                if (!this.newMessage[key]) return true;
            }

            return false;
        }
    },

    methods: {

        onSubmitForm: function (e) {
            e.preventDefault();
            $('.loading-div').toggleClass("hide");

            var message = this.newMessage;
            var token = $('#csrf_token').val();
            this.submitted = true;

            this.$http.post('/contact', message,
                function (data, status, request) {
                    if (data.success) {
                        Materialize.toast(data.message, 4000, 'rounded');
                        this.newMessage = {name: '', message: '', email: '', _token: token};
                        $('.loading-div').toggleClass("hide");
                    } else {
                        Materialize.toast(data.message, 4000, 'rounded');
                        $('.loading-div').toggleClass("hide");
                    }
                });
            ;
        }
    }
});