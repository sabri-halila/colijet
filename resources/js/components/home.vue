<template>
    <div>
        <myheader/>
        <section class="hero-area bg-1  text-center ">
            <!-- Container Start -->
            <div class="container-xl">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content-block">


                        </div>
                        <!-- Advance Search -->
                        <div class="advance-search">
                            <div class="container-fluid">
                                <div class="row justify-content-center">
                                    <div class="col-lg-12 col-md-12 align-content-center">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-1">

                                                </div>
                                                <div class="col-md-10"
                                                     style="padding-top: 0px; padding-bottom: 0px;margin-top: 25px; margin-bottom: 25px;">
                                                    <div class="row">
                                                        <div class="form-group col-md-3 vl">
                                                            <input type="text" class="form-controlhome my-2 my-lg-1"
                                                                   id="inputtext4"
                                                                   placeholder="Votre ville">
                                                        </div>
                                                        <div class="form-group col-md-3 vl">
                                                            <input type="text" class="form-controlhome my-2 my-lg-1"
                                                                   id="inputtext4"
                                                                   placeholder="Areport de départ">
                                                        </div>
                                                        <div class="form-group col-md-3 vl">
                                                            <input type=" text" class="form-controlhome my-2 my-lg-1"
                                                                   id="inputtext4"
                                                                   placeholder="Aéroport d'arrivée">
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                                    <datetime
                                                                        class="theme-orange"
                                                                        type="datetime"
                                                                        placeholder="Date de départ"
                                                                        v-model="datetimeTheming"
                                                                        input-class="form-controlhome my-2 my-lg-1"
                                                                        value-zone="America/New_York"
                                                                        zone="Europe/Vienna"
                                                                        auto
                                                                    ></datetime>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group col-md-1 align-self-center">

                                                    <router-link to="/annonce" class="btn btn-primary " role="button"><i
                                                        class="fas fa-search" style="color:#fff"></i>
                                                    </router-link>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="popular-deals section bg-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h1 style="line-height: 51px; font-size: 34px;margin-top: 60px ">Comment ça marche</h1>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" style="font-size: 34px ; line-height: 56px; font-family:Poppins; " id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                       role="tab" aria-controls="home" aria-selected="true">Voyageurs</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                       role="tab" aria-controls="profile" aria-selected="false">Expéditeur</a>
                                </li>

                            </ul>
                            <!-- Pills navs -->

                            <!-- Pills content -->
                            <div class="tab-content" id="ex2-content" style="padding-top: 25px;">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4" style="text-align: center">
                                            <img src="images/megaphone.svg" alt="" width="79px" height="70px">
                                            <p style="padding: 20px ;font-size:16px;line-height: 25px;color: #000000;">
                                                Inscrivez-vous, publiez une annonce et indiquez la ville ou le pays de
                                                départ et de destination de votre trajet.</p>
                                        </div>
                                        <div class="col-md-4" style="text-align: center">
                                            <img src="images/chat.svg" alt="" width="79px" height="70px">
                                            <p style="padding: 20px ;font-size:16px;line-height: 25px;color: #000000;">
                                                Vous êtes contacté par un ou plusieurs expéditeurs, avec lesquels vous
                                                discuterez des modalités d’envoi.</p>
                                        </div>
                                        <div class="col-md-4" style="text-align: center">
                                            <img src="images/other.svg" alt="" width="79px" height="70px">
                                            <p style="padding: 20px ;font-size:16px;line-height: 25px;color: #000000;">
                                                Transportez le colis</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4" style="text-align: center">
                                            <img src="images/megaphone.svg" alt="" width="79px" height="70px">
                                            <p style="padding: 20px ;font-size:16px;line-height: 25px;color: #000000;">
                                                Inscrivez-vous et recherchez des voyageurs en indiquant la ville ou le
                                                pays de départ et de destination du colis.</p>
                                        </div>

                                        <div class="col-md-4" style="text-align: center">
                                            <img src="images/other.svg" alt="" width="79px" height="70px">
                                            <p style="padding: 20px ;font-size:16px;line-height: 25px;color: #000000;">
                                                Choisissez parmi les voyageurs qui font le trajet</p>
                                        </div>

                                        <div class="col-md-4" style="text-align: center">
                                            <img src="images/chat.svg" alt="" width="79px" height="70px">
                                            <p style="padding: 20px ;font-size:16px;line-height: 25px;color: #000000;">
                                                discutez via la messagerie ou par téléphone des modalités d’envoi</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- Pills content -->
                        </div>
                    </div>

                </div>
            </div>

        </section>


        <section class=" section bg-white">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <h1 style="font-size: 48px !important;padding-bottom: 40px">Témoignages</h1>
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="card"
                                     style="border: 1px solid #0000001A;border-radius: 5px;padding: 30px">
                                    <img src="images/ver.svg" alt="" width="65px" height="45px">
                                    <p style="padding-top: 20px">But I must explain to you how all this mistaken idea of
                                        denouncing
                                        pleasure and praising pain was born and I will give you a complete account of
                                        the
                                        system.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card"
                                     style="border: 1px solid #0000001A;border-radius: 5px;padding: 30px">
                                    <img src="images/ver.svg" alt="" width="65px" height="45px">
                                    <p style="padding-top: 20px">But I must explain to you how all this mistaken idea of
                                        denouncing
                                        pleasure and praising pain was born and I will give you a complete account of
                                        the
                                        system.</p>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card"
                                     style="border: 1px solid #0000001A;border-radius: 5px;padding: 30px">
                                    <img src="images/ver.svg" alt="" width="65px" height="45px">
                                    <p style="padding-top: 20px">But I must explain to you how all this mistaken
                                        idea of
                                        denouncing
                                        pleasure and praising pain was born and I will give you a complete account
                                        of the
                                        system.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class=" section bg-white">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <img src="images/img_coli.svg" alt="" style="width: 84%;">
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h1 style="font-size: 48px; line-height: 65px;padding-bottom: 30px">
                                            Téléchargez colis jet dès maintenant!
                                        </h1>
                                    </div>
                                    <div class="col-md-12">
                                        <p style="font-size: 22px;line-height: 40px;color:#000000;padding-bottom: 48px">
                                            Le Lorem Ipsum est simplement du faux texte employé dans la composition et
                                            la mise en page avant impression.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row justify-content-center">
                                            <div class="col-md-6">
                                                <img src="images/appstore.png" alt="">
                                            </div>

                                            <div class="col-md-6">
                                                <img src="images/palystore.png" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer style="background-color:#0C537A">
            <div class="container">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="images/footer_logo.svg">
                        </div>
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-6">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                    <a href="" style="color:#fff;font-size: 20px;line-height: 30px">Nous Contacter</a>
                                </div>
                                <div class="col-md-4">
                                    <a href="" style="color:#fff;font-size: 20px;line-height: 30px">Mentions Légales</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="" style="color:#fff;font-size: 20px;line-height: 30px">CGV</a>
                                </div>
                                <div class="col-md-2">
                                    <a href="" style="color:#fff;font-size: 20px;line-height: 30px">CGU</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" style="text-align: center">
                        <p style="color:#fff;font-size: 20px;line-height: 30px">© 2021 COLISJET Tout droit réservé</p>
                    </div>
                </div>
            </div>

        </footer>

    </div>


</template>

<script>
import myheader from '../components/Myheader'
import {Datetime} from 'vue-datetime';

export default {
    data() {
        return {
            datetimeTheming: '',

        }
    },
    components: {
        myheader,
        datetime: Datetime
    }
}
</script>

<style scoped>

</style>
