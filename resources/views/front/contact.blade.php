<div class="dddddddd">
    <h4 class="light center section-headers fancy"><span>Contact me</span></h4>
</div>
<div class="row">
    <form class="col s12" method="POST" id="contact-me-form" v-on="submit: onSubmitForm">
        <div class="row">
            <div class="input-field col s6">
                <input name="name" id="first_name" type="text" v-model="newMessage.name" class="validate">
                <label for="first_name">Name</label>
            </div>
            <div class="input-field col s6">
                <input id="last_name" type="email" v-model="newMessage.email" name="email" class="validate">
                <label for="last_name">Email</label>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="textarea1" v-model="newMessage.message" class="materialize-textarea"></textarea>
                        <label for="textarea1">Message</label>
                    </div>
                </div>
                <input type="hidden" name="_token" id="csrf_token" v-model="newMessage._token"
                       value="<?php echo csrf_token(); ?>">
            </div>
        </div>
        <button class="btn waves-effect waves-light btn-block  light-blue darken-1" type="submit" name="action">Send
        </button>
    </form>
</div>