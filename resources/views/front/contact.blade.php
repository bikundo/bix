<div class="dddddddd">
    <h4 class="light center section-headers fancy"><span>Contact me</span></h4>
</div>
<div class="row">
    <form class="col s12" method="POST" id="contact-me-form" v-on="submit: onSubmitForm">
        <div class="row">
            <div class="input-field col s6">
                <i class="material-icons prefix">person_pin</i>
                <input name="name" id="first_name" type="text" v-model="newMessage.name" class="validate">
                <label for="first_name">Name</label>
            </div>
            <div class="input-field col s6">
                <i class="material-icons prefix">email</i>
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
        <button class="btn waves-effect waves-light btn-block  light-blue darken-1" type="submit" name="action" id="contact-btn">Send
        </button>
    </form>
    <div class="loading-div hide">
        <div class="loading-center">
            <div class="preloader-wrapper big active">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>