new Vue({
    el: '#settings-form',

    data: {
        newMessage: {site_name: '', site_admin: '', admin_email: '', _token: ''},
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

            this.$http.post('/dashboard/settings', message,
                function (data, status, request) {
                    if (data.success) {
                        console.log(data);
                         $.growl.notice({ title: "Successful!!", message: data.message});
                    } else {
                        console.log(data);
                         $.growl.notice({ title: "Successful!!", message: "There was a problem saving settings!" });
                    }
                });
            ;
        }
    }
});