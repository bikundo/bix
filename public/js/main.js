

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#CSRFtoken').getAttribute('value');

new Vue({
    el: '#guestbook',

    data: {
        newGig: { name: '', description: '', },
        submitted: false
    },

    computed: {
        errors: function() {
            for (var key in this.newGig) {
                if ( ! this.newGig[key]) return true;
            }

            return false;
        }
    },

    ready: function() {
        this.fetchGigs();
    },

    methods: {
        fetchGigs: function() {
            this.$http.get('/api/gigs', function(gigs) {
                this.$set('gigs', gigs);
            });
        },

        onSubmitForm: function(e) {
            e.preventDefault();

            var gig = this.newGig;

            this.gigs.push(gig);
            this.newGig = { name: '', gig: '' };
            this.submitted = true;

            this.$http.post('/dashboard/gigs', gig);
        }
    }
});