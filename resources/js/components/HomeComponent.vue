<template>
    <div class="container">
        <div class="text-center app-title"><h1>Free Email Service Web App</h1></div>
        <div class="envelope">
            <div class="envelope-cap"></div>
            <div class="latter-form">
                <form class="letter" @submit.prevent="sendMail" id="mail-form">
                    <div class="row">
                        <div class="col">
                            <input class="form-control" required type="text" name="sender_name" placeholder="Sender Name" autocomplete="off"/>
                        </div>
                        <div class="col">
                            <input class="form-control" required type="text" name="subject" placeholder="Subject" autocomplete="off"/>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <input class="form-control" required type="email" name="from_email" placeholder="From" autocomplete="off"/>
                        </div>
                        <div class="col">
                            <input class="form-control" required type="email" name="to_email" placeholder="To" autocomplete="off"/>
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
        data(){
            return{
                validationErrors:[]
            }
        },
        methods: {
            sendMail() {
                var formData = new FormData(document.getElementById('mail-form'));
                axios.post("/api/sendMail", formData).then((response) => {
                    console.log(response.data);
                    if(response.data){
                       this.resetForm();
                    }
                }).catch(error => {
                    this.validationErrors = error.response.data.errors;
                    console.log( error.response.data.errors);
                });
            },
            resetForm(){
                document.getElementById("mail-form").reset();
            }
        },
    }
</script>
