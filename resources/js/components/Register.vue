<template>
    <div>
        <myheader/>
        <div class="row">
            <!-- For Demo Purpose -->
            <div class="bg-left col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="images/logo_login.png" alt=""
                     class="img-fluid mb-3 d-none d-md-block">
            </div>


            <div class="col-md-7 col-lg-7 ml-auto">

                <div class="row p-6">
                    <div class="col-md-12">
                        <div class="input-group col-lg-12">
                            <div class="form-group col-lg-12 px-4 mx-auto mb-0"
                                 style="text-align: center;background-color: #F2F2F2!important; ">
                                <div class="parent-div" style="cursor: pointer!important; ">
                                    <div v-if="display" class="img img-fluid img-circle" style="margin-top:10px">
                                        <img :src="get_img()" v-bind:style="user.styleObject"/>
                                    </div>
                                    <img src="images/addphoto.svg" id="12" > <br>
                                    <h4 style="color:#000000; font-size: 20px;line-height: 32px"> Glisser et déposez
                                        votre photo ici</h4>
                                    <button class="btn btn-primary" id="12" style="background-color: #00A1ED!important; color:#FFF;font-size: 20px;line-height: 30px">
                                        Télécharger une photo
                                    </button>
                                    <input type="file" @change='upload_img' name="img"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form v-on:submit.prevent="register">
                        <div class="col-md-12">
                            <div class="input-group col-lg-12">
                                <div class="input-group-prepend">
                            <span class="input-group-text  px-4 border-md border-right-0"
                                  style="background-color:#F2F2F2 ;border-color:#F2F2F2 ;">
                                <img src="images/usernam.svg">
                            </span>
                                </div>
                                <input type="text" v-model="user.name" placeholder="Nom d'utilisateur"
                                       class="form-control border-left-0 border-md"
                                       style="background-color:#F2F2F2 ;border-color:#F2F2F2 ;">
                            </div>
                            <span v-if="errors.name">
                            <i class="far fa-hand-paper" style="color: red"> le nom est obligatoire</i></span>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group col-lg-12">
                                <div class="input-group-prepend">
                            <span class="input-group-text px-4 border-md border-right-0"
                                  style="background-color:#F2F2F2 ;border-color:#F2F2F2 ;">
                                <img src="images/cni.svg">
                            </span>
                                </div>
                                <input type="text" v-model="user.cin" placeholder="CNI"
                                       class="form-control border-left-0 border-md"
                                       style="background-color:#F2F2F2 ;border-color:#F2F2F2 ;">
                            </div>
                            <span v-if="errors.cin">
                            <i class="far fa-hand-paper" style="color: red"> le numero de carte cni est obligatoire</i>
                        </span>
                        </div>


                        <div class="col-md-12">
                            <!-- Email Address -->
                            <div class="input-group col-lg-12">
                                <div class="input-group-prepend">
                            <span class="input-group-text px-4 border-md border-right-0"
                                  style="background-color:#F2F2F2 ;border-color:#F2F2F2 ;">
                                <img src="images/email.svg">
                            </span>
                                </div>
                                <input type="email" v-model="user.email" placeholder="Email Address"
                                       class="form-control border-left-0 border-md"
                                       style="background-color:#F2F2F2 ;border-color:#F2F2F2 ;">
                            </div>
                            <span v-if="errors.email">
                            <i class="far fa-hand-paper" style="color: red"> l'email est obligatoire</i>
                        </span>
                        </div>

                        <div class="col-md-12">
                            <div class="input-group col-lg-12">
                                <div class="input-group-prepend">
                            <span class="input-group-text px-4 border-md border-right-0"
                                  style="background-color:#F2F2F2 ;border-color:#F2F2F2 ;">
                                <img src="images/phone.svg">
                            </span>
                                </div>

                                <input type="text" v-model="user.num" placeholder="Numéro de téléphone"
                                       class="form-control border-md border-left-0 pl-3"
                                       style="background-color:#F2F2F2 ;border-color:#F2F2F2 ;">
                            </div>
                            <span v-if="errors.num">
                            <i class="far fa-hand-paper" style="color: red"> Numéro de téléphone est obligatoire</i>
                        </span>
                        </div>
                        .


                        <!-- Job -->


                        <div class="col-md-12">
                            <div class="input-group col-lg-12">
                                <div class="input-group-prepend">
                            <span class="input-group-text px-4 border-md border-right-0"
                                  style="background-color:#F2F2F2 ;border-color:#F2F2F2 ;">
                                <img src="images/lock.svg">
                            </span>
                                </div>
                                <input type="password" v-model="user.password" placeholder="Mot de passe"
                                       class="form-control border-left-0 border-md"
                                       style="background-color:#F2F2F2 ;border-color:#F2F2F2 ;">
                            </div>
                            <span v-if="errors.password">
                            <i class="far fa-hand-paper" style="color: red"> Mot de passe est obligatoire</i>
                        </span>
                        </div>


                        <div class="col-md-12" style="margin-left: 16px;">

                            <input type="radio" class="radio" required="" name="radio" id="r1"><label for="r1">J'accepte
                            les conditions de <b>la politique de confidenalité</b></label> <br>
                        </div>
                        <div class="col-md-12" style="margin-left: 16px;">
                            <input type="radio" required="" class="radio" name="radio" id="r2"><label
                            for="r2"><b>Décharge</b></label>
                        </div>

                        <div class="form-group col-lg-12 mx-auto mb-0" style="margin-left: 16px;">
                            <button class="btn btn-primary btn-block py-2"
                                    style="color:#FFF;font-size: 20px;line-height: 30px" type="submit"
                                    @click="register">Créer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>


<!--<template>
    <div>
        <input type="text" class="form-control" v-model="user.name" placeholder="Nom d'utlilsateur">
        <input type="text" class="form-control" v-model="user.cin" placeholder="CIN">
        <input type="email" class="form-control" v-model="user.email" placeholder="Email">
        <input type="text" class="form-control" v-model="user.num" placeholder="Numéro de téléphone">
        <input type="text" class="form-control" v-model="user.password" placeholder="Mot de passe">
        <button class="btn btn-primary m-2" @click="register">Publier</button>

    </div>
</template> -->

<script>
import myheader from '../components/Myheader'


export default {
    components: {
        myheader
    },
    data() {
        return {
            user: {
                name: '',
                cin: '',
                email: '',
                rib: '',
                num: '',
                img: '',
                password: '',
                styleObject: {
                    width: '100px',
                    height: '100px'
                }
            },
            errors: [],
            display: false,

        }
    },
    methods: {


        upload_img(e) {
            let file = e.target.files[0];
            let reader = new FileReader();

            if (file['size'] < 2111775) {
                reader.onloadend = (file) => {
                    //console.log('RESULT', reader.result)
                    this.user.img = reader.result;
                    this.display = true;
                }
                reader.readAsDataURL(file);
            } else {
                alert('File size can not be bigger than 2 MB')
            }
        },
        //For getting Instant Uploaded Photo
        get_img() {
            let photo = (this.user.img.length > 100) ? this.user.img : "register/" + this.user.img;
            return photo;
        },

        register() {

            axios.post('api/register', this.user).then(response => {
                if (response.data.status == 'error') {
                    this.errors = response.data.errors
                    window.scrollTo(0, 0);
                }
                if (response.data.status == 'success') {
                    this.$router.push('/login');
                    Toast.fire({
                        icon: 'success',
                        title: 'Votre compte a été créé avec succès'
                    })


                }
            });
        }
    },

}
</script>
<style>


</style>
