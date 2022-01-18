<template>
    <div>
        <myheader/>
        <section class="hero-area bg-12  text-center " style="padding-top: 95px !important;">
            <!-- Container Start -->
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-block"
                             style="padding-bottom:0px!important;font-size: 79px;font-weight:bold ; color:#fff;">
                            Rapide <i class="fas fa-circle" style="color:#0C537A;font-size:22px!important; "></i> Facile
                            <i class="fas fa-circle" style="color:#0C537A;font-size:22px!important;"></i> Sécurisé

                        </div>
                        <p style="color: #FFFFFF;font-size: 46px;padding-bottom:58px!important;">
                            Services de livraison de colis d’urgence
                        </p>
                    </div>
                    <div class="col-md-12">

                        <div class="container-fluid">
                            <div class="row justify-content-center">

                                <img :src=this.images class="img-thumbnail" alt=" ">


                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="text-center ">

            <div class="row">

                <div class="col-md-3">

                </div>
                <div class="col-md-6">
                    <div class="col-md-12" style="text-align: center;color: #000;font-size:34px;line-height: 56px">
                        {{user.name}}
                    </div>
                    <form v-on:submit.prevent="login">
                        <div class="col-md-12" style="text-align: center;padding: 0px!important">
                            <div class="input-group col-lg-12">
                                <div class="input-group-prepend">
                            <span class="input-group-text  px-4 border-md border-right-0"
                                  style="background-color:#FFFFFF;border: 2px solid #00A1ED;border-top-left-radius: 20px;border-bottom-left-radius: 20px;">
                                <i class="fa fa-user text-muted" style="color:#00A1ED !important;"></i>
                            </span>
                                </div>
                                <input type="text" v-model="user.name" placeholder="Nom d'utilisateur"
                                       class="form-control border-left-0 border-md"
                                       style="background-color:#FFFFFF ;border: 2px solid #00A1ED;border-top-right-radius: 20px;border-bottom-right-radius: 20px;">
                            </div>
                        </div>

                        <div class="col-md-12" style="padding: 0px!important">
                            <div class="input-group col-lg-12">
                                <div class="input-group-prepend">
                            <span class="input-group-text px-4 border-md border-right-0"
                                  style="background-color:#FFFFFF;border: 2px solid #00A1ED;border-top-left-radius: 20px;border-bottom-left-radius: 20px;">
                                <i class="fas fa-address-card text-muted" style="color:#00A1ED !important;"></i>
                            </span>
                                </div>
                                <input type="text" v-model="user.cin" placeholder="CNI"
                                       class="form-control border-left-0 border-md"
                                       style="background-color:#FFFFFF ;border: 2px solid #00A1ED;border-top-right-radius: 20px;border-bottom-right-radius: 20px;">
                            </div>
                        </div>

                        <div class="col-md-12" style="padding: 0px!important">
                            <div class="input-group col-lg-12">
                                <div class="input-group-prepend">
                            <span class="input-group-text px-4 border-md border-right-0"
                                  style="background-color:#FFFFFF;border: 2px solid #00A1ED;border-top-left-radius: 20px;border-bottom-left-radius: 20px;">
                                <i class="fas fa-phone-alt text-muted" style="color:#00A1ED !important;"></i>
                            </span>
                                </div>

                                <input type="tel" v-model="user.num" placeholder="Numéro de téléphone"
                                       class="form-control border-md border-left-0 pl-3"
                                       style="background-color:#FFFFFF ;border: 2px solid #00A1ED;border-top-right-radius: 20px;border-bottom-right-radius: 20px;">
                            </div>
                        </div>

                        <div class="col-md-12" style="padding: 0px!important">
                            <!-- Email Address -->
                            <div class="input-group col-lg-12">
                                <div class="input-group-prepend">
                            <span class="input-group-text px-4 border-md border-right-0"
                                  style="background-color:#FFFFFF;border: 2px solid #00A1ED;border-top-left-radius: 20px;border-bottom-left-radius: 20px;">
                                <i class="fas fa-envelope text-muted" style="color:#00A1ED !important;"></i>
                            </span>
                                </div>
                                <input type="email" v-model="user.email" placeholder="Email Address"
                                       class="form-control border-left-0 border-md"
                                       style="background-color:#FFFFFF ;border: 2px solid #00A1ED;border-top-right-radius: 20px;border-bottom-right-radius: 20px;">
                            </div>

                        </div>

                        <div class="col-md-12" style="padding: 0px!important">
                            <!-- Email Address -->
                            <div class="input-group col-lg-12">
                                <div class="input-group-prepend">
                            <span class="input-group-text px-4 border-md border-right-0"
                                  style="background-color:#FFFFFF;border: 2px solid #00A1ED;border-top-left-radius: 20px;border-bottom-left-radius: 20px;">
                              <i class="fas fa-unlock-alt" style="color:#00A1ED !important;"></i>
                            </span>
                                </div>
                                <input type="password" v-model="user.password"
                                       class="form-control border-left-0 border-md"
                                       style="background-color:#FFFFFF ;border: 2px solid #00A1ED;border-top-right-radius: 20px;border-bottom-right-radius: 20px;">
                            </div>

                        </div>

                        <div class="col-md-12" style="padding: 0px!important">
                            <div class="input-group col-lg-12">
                                <div class="input-group-prepend">
                            <span class="input-group-text px-4 border-md border-right-0"
                                  style="background-color:#FFFFFF;border: 2px solid #00A1ED;border-top-left-radius: 20px;border-bottom-left-radius: 20px;">
                              <i class="fas fa-unlock-alt" style="color:#00A1ED !important;"></i>
                            </span>
                                </div>
                                <input type="password" v-model="user.cpas"
                                       class="form-control border-left-0 border-md"
                                       style="background-color:#FFFFFF ;border: 2px solid #00A1ED;border-top-right-radius: 20px;border-bottom-right-radius: 20px;">
                            </div>
                        </div>



                        <div class="col-md-12" style="padding: 20px !important">
                            <div class="row">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <button class="btn btn-primary btn-block py-2" style="color:#FFF" type="submit">
                                        Enregsitrer
                                    </button>
                                </div>
                                <div class="col-md-3"></div>
                            </div>

                        </div>

                    </form>
                </div>
                <div class="col-md-3">

                </div>
            </div>
        </section>
    </div>

</template>

<script>
import myheader from '../components/Myheader'
import {Datetime} from 'vue-datetime';

export default {
    data() {
        return {
            user: {
                name: '',
                cin: '',
                email: '',
                rib: '',
                num: '',
                img: '',
                cpas:'',
                password: '',
                styleObject: {
                    width: '100px',
                    height: '100px'
                }
            },
            images: '',
            errors: [],
            display: false,

        }
    },
    components: {
        myheader,
        datetime: Datetime,

    },
    methods: {
        getuser() {
            let token = localStorage.getItem('token')
            let config = {
                method: 'get',
                url: 'api/profile?token=' + token,
                headers: {
                    'Authorization': 'Bearer ' + token,
                },
            };

            axios(config)
                .then((response) => {
                    {

                        this.user = response.data.user;
                        console.log(this.user);
                        this.images = '../../..' + this.user.img;
                        this.cpas = this.user.password;
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });

        },
    },

    created() {
        let token = localStorage.getItem('token');
        if (!token) {
            this.$router.push('/login');
        } else {
            this.getuser();
        }

    }

}
</script>

<style scoped>

</style>
