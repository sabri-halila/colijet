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
                                                            <input type="text" class="form-control my-2 my-lg-1"
                                                                   id="inputtext4"
                                                                   placeholder="Votre ville">
                                                        </div>
                                                        <div class="form-group col-md-3 vl">
                                                            <input type="text" class="form-control my-2 my-lg-1"
                                                                   v-model="searche.aeroport_d" @keyup="search"
                                                                   id="inputtext4"
                                                                   placeholder="Areport de départ">
                                                        </div>
                                                        <div class="form-group col-md-3 vl">
                                                            <input type=" text" class="form-control my-2 my-lg-1"
                                                                   v-model="searche.aeroport_a" @keyup="search"
                                                                   id="inputtext4"
                                                                   placeholder="Aéroport d'arrivée">
                                                        </div>

                                                        <div class="form-group col-md-3" @click="search">
                                                            <datetime
                                                                v-model="searche.date_heur_d"
                                                                class="theme-orange"
                                                                type="datetime"
                                                                placeholder="Date de départ"
                                                                input-class="form-control my-2 my-lg-1"
                                                                value-zone="America/New_York"
                                                                zone="Europe/Vienna"
                                                                auto
                                                            ></datetime>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group col-md-1 align-self-center">
                                                    <button class="btn btn-primary"><i
                                                        class="fas fa-search"></i>
                                                    </button>
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
                    <div class="col-md-4">
                        <h4 style="color:#00A1ED;font-size: 27px">Filtres:</h4>
                    </div>

                    <div class="col-md-4" style="text-align: left">
                        <h4 style="color:#000000;font-size: 27px">{{ this.count }} annonces</h4>
                    </div>
                    <div class="col-md-4">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <label>Date de départ</label>

                            <div @click="search">
                                <datetime
                                    class="theme-orange"
                                    type="date"
                                    v-model="searche.date_heur_d"
                                    @click="search"
                                    input-class="form-control bg-white  border-md"
                                    value-zone="America/New_York"
                                    zone="Europe/Vienna"
                                    auto
                                ></datetime>
                            </div>
                        </div>

                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <label>De</label>
                            <select v-model="searche.aeroport_d" @change="search" id="pet-select" class="form-control bg-white  border-md">
                                <option value="">Choisir l'aéroport </option>
                                <option v-for="aeroport in aeroportsname" :key="aeroport.id" :value="aeroport.id">{{aeroport.name}} {{aeroport.countryName}}</option>

                            </select>

                        </div>

                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <label>A</label>

                            <select v-model="searche.aeroport_a" @change="search" id="pet-select" class="form-control bg-white  border-md">
                                <option value="">Choisir l'aéroport </option>
                                <option v-for="aeroport in aeroportsname" :key="aeroport.id" :value="aeroport.id">{{aeroport.name}} {{aeroport.countryName}}</option>

                            </select>

                        </div>


                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Poids disponible</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-8">
                                        </div>
                                        <div class="col-md-4" style="border-radius: 13px;font-size: 21px!important;">
                                            <h5>{{ searche.nb_kg }} KG</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                @click="search">
                                <VueSlideBar
                                    v-model="searche.nb_kg"
                                    :min="1"
                                    :max="50"
                                    :processStyle="slider.processStyle"
                                    :lineHeight="slider.lineHeight"
                                    :tooltipStyles="{ backgroundColor: '#00A1ED', borderColor: '#00A1ED' }">
                                </VueSlideBar>
                            </div>
                        </div>


                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Prix au kilo</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-8">
                                        </div>
                                        <div class="col-md-4" style="border-radius: 13px;font-size: 21px!important;">
                                            <h5>{{ searche.prix_kg }} KG</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div
                                @click="search">
                                <VueSlideBar
                                    v-model="searche.prix_kg"
                                    @drag="search"
                                    :min="2"
                                    :max="50"
                                    :processStyle="slider.processStyle"
                                    :lineHeight="slider.lineHeight"
                                    :tooltipStyles="{ backgroundColor: '#00A1ED', borderColor: '#00A1ED' }">
                                </VueSlideBar>

                            </div>
                        </div>

                        <div class="form-group col-lg-12 mx-auto mb-0">
                            <label>Résistance du colis</label>
                            <ul class="ks-cboxtags">
                                <li>
                                    <input @click="search" type="checkbox" v-model="searche.resistance" id="resistante"
                                           value="1">
                                    <label for="resistante">Résistante</label>
                                </li>

                                <li>
                                    <input @click="search" type="checkbox" id="non_resistante"
                                           v-model="searche.resistance" value="2">
                                    <label for="non_resistante">Non résistante</label>
                                </li>
                                <br>
                                <li>
                                    <input type="checkbox" @click="search" v-model="searche.resistance" id="fragile"
                                           value="3">
                                    <label for="fragile"> Fragile</label>
                                </li>
                                <li>
                                    <input type="checkbox" @click="search" v-model="searche.resistance"
                                           id="non_cassable"
                                           value="4">
                                    <label for="non_cassable">Non cassable</label>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="row">

                            <div style="cursor:pointer;" v-for="annonce in annonces.data" :key="annonce.id"
                                 class="col-md-6" @click="show(annonce.id)" data-toggle="modal"
                                 data-target="#exampleModal">
                                <div class="card" style="border: 2px solid #E2E2E2;border-radius: 15px;">
                                    <div class="row p-4">
                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <img :src="annonce.creator.img" height="50px" width="50px"
                                                         style="border-radius: 30% 30% 30% 30%;">
                                                </div>
                                                <div class="col-md-9" style="text-align: center">
                                                    <h3 style="color:#000000;font-size:20px;line-height: 20px ">{{
                                                        annonce.creator.name }}</h3>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4" style="text-align: right">
                                            <h3 style="color:#0C537A;font-size: 24px">{{ annonce.prix_kg }}€/Kg</h3>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 p-4">
                                            <p style="font-size:19px">
                                                <i class="fas fa-dot-circle"
                                                   style="color:#004368;margin-right: 16px;"></i>
                                                {{ annonce.aeroport_d.name }} {{ annonce.aeroport_d.countryName }}</p>
                                            <p style="color:#77838F;font-size: 17px"><i class="fas fa-dot-circle"
                                                                                        style="color:#fff;margin-right: 16px;"></i>{{
                                                annonce.date_heur_d }}</p>
                                        </div>

                                        <div class="col-md-12 p-4">
                                            <p style="color:#1E2022;font-size: 19px">
                                                <i class="fas fa-dot-circle" style="color:#fff;margin-right: 16px;"></i>
                                                {{ annonce.aeroport_a.name}} {{annonce.aeroport_a.countryName}}</p>
                                            <p style="color:#77838F;font-size: 17px">
                                                <i class="fas fa-dot-circle"
                                                   style="color:#00A1ED;margin-right: 16px;"></i>
                                                {{ annonce.date_heur_a }}</p>
                                        </div>

                                        <div class="row p-4">
                                            <div class="col-md-12 p-4">
                                                <div class="row p-4">
                                                    <div class="col-md-6"
                                                         style="background-color:#C9EEFF;border-radius: 4px;text-align: center ">
                                                        <p style="font-size: 20px;color:#00A1ED;"><i
                                                            class="fas fa-lock"></i>
                                                            Poids {{ annonce.nb_kg }}Kg</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4" style="text-align: center">
                        </div>
                        <div class="col-md-8" style="text-align: center">
                            <pagination :data="annonces" @pagination-change-page="getannonces"></pagination>
                        </div>
                    </div>

                    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog"
                         aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-body">

                                    <div class="row">

                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="row p-4">
                                                <div class="col-md-4">
                                                    <img :src="creator.img" height="113px" width="113px"
                                                         style="border-radius: 30% 30% 30% 30%;">
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="col-md-12">
                                                        <h3 style="color:#000000;font-size:40px;line-height: 30px ">{{
                                                            creator.name }}</h3>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 p-4">
                                                    <p style="font-size:19px;color: #1E2022;"><i
                                                        class="fas fa-dot-circle"
                                                        style="color:#004368;margin-right: 16px;"></i>{{
                                                        annonce.aeroport_d.name}} {{annonce.aeroport_d.countryName}}</p>
                                                    <p style="color:#77838F;font-size: 17px"><i
                                                        class="fas fa-dot-circle"
                                                        style="color:#FFF;margin-right: 16px;"></i>{{
                                                        annonce.date_heur_d
                                                        }}</p>
                                                </div>

                                                <div class="col-md-12 p-4">
                                                    <p style="color:#1E2022;font-size: 19px"><i
                                                        class="fas fa-dot-circle"
                                                        style="color:#FFF;margin-right: 16px;"></i>{{
                                                        annonce.aeroport_a.name}} {{annonce.aeroport_a.countryName}}</p>
                                                    <p style="color:#77838F;font-size: 17px"><i
                                                        class="fas fa-dot-circle"
                                                        style="color:#00A1ED;margin-right: 16px;"></i>
                                                        {{ annonce.date_heur_a}}</p>
                                                </div>

                                                <div class="row p-4">
                                                    <div class="col-md-12 p-4">
                                                        <div class="row p-4">
                                                            <div class="col-md-12"
                                                                 style="background-color:#F2F2F2;border-radius: 4px;text-align: center ">
                                                                <p style="font-size: 20px;color:#000000;"><img
                                                                    width="36.5" height="39.5" src="images/euro.svg">
                                                                    Prix au kilo {{ annonce.nb_kg }}€ </p>
                                                            </div>
                                                            <div class="col-md-12"
                                                                 style="background-color:#F2F2F2;border-radius: 4px;text-align: center ;margin-top: 24px ">
                                                                <p style="font-size: 20px;color:#000000;"><img
                                                                    width="36.5" height="39.5" src="images/poid.svg">
                                                                    Poids {{ annonce.prix_kg }}Kg </p>
                                                            </div>
                                                            <div class="row" style="margin-top: 24px">
                                                                <div class="col-md-8">
                                                                    <button class="btn btn-primary btn-block">Réserver
                                                                    </button>
                                                                </div>

                                                                <div class="col-md-4">
                                                                    <button class="btn btn btn-block"
                                                                            style="background-color: #C9EEFF"><i
                                                                        class="far fa-comment-dots"
                                                                        style="color:#00A1ED"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
</template>

<script>
import VueSlideBar from 'vue-slide-bar'
import myheader from '../components/Myheader'
import {Datetime} from 'vue-datetime';

export default {
    data() {

        return {
            annonce: {
                id: '',
                ville: '',
                aeroport_a: '',
                aeroport_d: '',
                date_heur_d: '',
                date_heur_a: '',
                nb_kg: 8,
                prix_kg: 2,
                resistance: [],
                autre_information: ''
            },
            aeroport: {
                id: '',
                name: '',
                cityName: '',
                cityCode: '',
                countryName: '',
                countryCode: ''
            },

            creator: {
                id: '',
                name: '',
                img: ''

            },

            searche: {
                date_heur_d: '',
                aeroport_a: '',
                aeroport_d: '',
                nb_kg: 8,
                prix_kg: 2,
                resistance: []
            },
            aeroportsname: {},
            count: 0,
            annonces: {},
            slider: {
                lineHeight: 20,
                processStyle: {
                    backgroundColor: '#00A1ED'
                }
            }
        }

    },
    components: {
        myheader,
        VueSlideBar,
        datetime: Datetime
    },

    methods: {
        getResults() {
            axios.get('api/aeroportlist',).then(response => {
                this.aeroportsname = response.data.data;
                console.log(this.aeroportsname);

            })
        },
        getannonces(page = 1) {
            axios.get('api/annonces?page=' + page).then(response => {
                this.annonces = response.data.data;
                this.count = response.data.data.total;
                window.scrollTo(0, 620);

            })
        },
        search() {
            axios.get('api/searchannonces', {
                params: {
                    date_heur_d: this.searche.date_heur_d,
                    aeroport_a: this.searche.aeroport_a,
                    aeroport_d: this.searche.aeroport_d,
                    nb_kg: this.searche.nb_kg,
                    prix_kg: this.searche.prix_kg,
                    resistance: this.searche.resistance,
                }
            }).then((response) => {
                console.log(response.data.data)
                this.annonces = response.data.data;
                console.log(response.data.data.total);
                this.count = response.data.data.total;
            });
        },
        show(id) {
            axios.get('api/annonce/' + id).then(response => {
                if (response.data.status == 'error') {
                    this.errors = response.data.errors
                } else {
                    this.annonce = response.data.data;
                    this.creator = response.data.data.user;
                    console.log(this.creator);

                }

            })

        },


    },
    created() {
        this.getannonces()
        this.getResults()
    }


}
</script>

<style scoped>

ul.ks-cboxtags {
    list-style: none;
    padding: 20px;
}

ul.ks-cboxtags li {
    display: inline;
}

ul.ks-cboxtags li label {
    display: inline-block;
    background-color: rgba(255, 255, 255, .9);
    border: 1px solid #00A1ED;
    color: #000;
    border-radius: 15px;
    white-space: nowrap;
    margin: 3px 0px;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: transparent;
    transition: all .2s;
}

ul.ks-cboxtags li label {
    padding: 8px 12px;
    cursor: pointer;
}

ul.ks-cboxtags li label::before {
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    font-size: 12px;
    padding: 2px 6px 2px 2px;
    content: "\f067";
    transition: transform .3s ease-in-out;
}

ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
    content: "\f00c";
    transform: rotate(-360deg);
    transition: transform .3s ease-in-out;
    color: #00A1ED;
}

ul.ks-cboxtags li input[type="checkbox"]:checked + label {
    border: 1px solid #00A1ED;
    background-color: #C9EEFF;
    color: #000;
    transition: all .2s;
}

ul.ks-cboxtags li input[type="checkbox"] {
    display: absolute;
}

ul.ks-cboxtags li input[type="checkbox"] {
    position: absolute;
    opacity: 0;
}

ul.ks-cboxtags li input[type="checkbox"]:focus + label {
    border: 1px solid #00A1ED;
}
</style>
