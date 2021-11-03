<template>
    <div class="container">
        <vs-spinner v-show="showSpinner" size="lg"></vs-spinner>
        <vs-alert :show.sync="alertShow" placement="top" :duration="5000" :type="alertType" width="400px" dismissable>
            <span class="icon-info-circled alert-icon-float-left"></span>
            <p v-for="message,index in alertMessages">
                <span v-for="subMessage in message">{{subMessage}}</span>
            </p>
        </vs-alert>
        <div class="text-center app-title"><h1>Free Email Service Web App</h1></div>
        <div class="envelope">
            <div class="envelope-cap"></div>
            <div class="latter-form">
                <form class="letter" @submit.prevent="sendMail" id="mail-form">
                    <div class="row">
                        <div class="col">
                            <input class="form-control" required type="text" name="sender_name"
                                   placeholder="Sender Name" autocomplete="off"/>
                        </div>
                        <div class="col">
                            <input class="form-control" required type="text" name="subject" placeholder="Subject"
                                   autocomplete="off"/>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input class="form-control" required type="email" name="to_email" placeholder="To"
                                   autocomplete="off"/>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <label>Message:</label>
                            <textarea class="form-control" required name="body" autocomplete="off"></textarea>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary">Send<i class="ml-1 fa fa-paper-plane"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                validationErrors: [],
                showSpinner: false,
                alertShow: false,
                alertType: "success",
                alertMessages: [],
            }
        },
        methods: {
            sendMail() {
                this.showSpinner = true;
                var formData = new FormData(document.getElementById('mail-form'));
                axios.post("/api/sendMail", formData).then((response) => {
                    console.log(response.data);
                    if (response.data) {
                        this.resetForm();
                        this.showSpinner = false;
                        this.alertType = "success";
                        this.alertShow = true;
                        this.alertMessages = ["Email have been successfully sent."];
                    }
                }).catch(error => {
                    this.validationErrors = error.response.data.errors;
                    this.showSpinner = false;
                    this.alertType = "warning";
                    this.alertShow = true;
                    this.alertMessages = error.response.data.errors;
                });
            },
            resetForm() {
                document.getElementById("mail-form").reset();
            }
        },
    }
</script>
