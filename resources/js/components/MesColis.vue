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
                            <i class="fas fa-circle" style="color:#0C537A;font-size:22px!important;s"></i> Sécurisé

                        </div>
                        <p style="color: #FFFFFF;font-size: 46px;padding-bottom:58px!important;">
                            Services de livraison de colis d’urgence
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="popular-deals section bg-white">
            <div class="content">
                <div class="container">
                    <div class="row">
                            <div class="col-md-4 align-items-center ">
                                <div class="col-md-12 ">
                                    <h4 style="color:#00A1ED;font-size: 27px">Filtres:</h4>
                                </div>
                                <div class="col-md-12">
                                    <p style="color:#000;font-size: 19px">Recherche par</p>
                                </div>
                                <div class="col-md-12">
                                    <input type="text"  placeholder="Colis"class="form-control border-md"style="background-color:#FFFFFF;border-color:#C1EBFF;">
                                </div>
                                <div class="col-md-12">
                                    <p>
                                        <input type="checkbox" id="test1"/>
                                        <label for="test1" aria-describedby="label">En attente</label>
                                    </p>
                                    <p>
                                        <input type="checkbox" id="test2"/>
                                        <label for="test2" aria-describedby="label">Confirmé</label>
                                    </p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div style="cursor:pointer;" v-for="annonce in annonces" :key="annonce.id"
                                 @click="show(annonce.id)" class="col-md-6" data-toggle="modal"
                                 data-target="#exampleModal">
                                <div class="card" style="border: 2px solid #E2E2E2;border-radius: 15px;">
                                    <div class="row p-4">
                                        <div class="col-md-8">
                                        </div>

                                        <div v-if="annonce.etat==0" class="col-md-4"
                                             style="background-color:#C9EEFF;border-radius: 4px;text-align: center ">
                                            <p style="font-size: 20px;color:#00A1ED;">Publié</p>
                                        </div>
                                        <div v-if="annonce.etat==1" class="col-md-4"
                                             style="background-color:#FFECB8;border-radius: 4px;text-align: center ">
                                            <p style="font-size: 20px;color:#FFA200;">Réservé</p>
                                        </div>
                                        <div v-if="annonce.etat==2" class="col-md-4"
                                             style="background-color:#B8FFCD;border-radius: 4px;text-align: center ">
                                            <p style="font-size: 20px;color:#188B3A;">Confirmé</p>
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
                                                annonce.date_heur_d
                                                }}</p>
                                        </div>

                                        <div class="col-md-12 p-4">
                                            <p style="color:#1E2022;font-size: 19px">
                                                <i class="fas fa-dot-circle" style="color:#fff;margin-right: 16px;"></i>
                                                {{ annonce.aeroport_a.name }} {{ annonce.aeroport_a.countryName }}</p>
                                            <p style="color:#77838F;font-size: 17px">
                                                <i class="fas fa-dot-circle"
                                                   style="color:#00A1ED;margin-right: 16px;"></i>
                                                {{ annonce.date_heur_a }}</p>
                                        </div>

                                        <div class="row p-4">
                                            <div class="col-md-12 p-4">
                                                <div class="row p-4">
                                                    <div class="col-md-5 p-2"
                                                         style="background-color:#C9EEFF;border-radius: 4px;text-align: center ">
                                                        <p style="font-size: 20px;color:#00A1ED;"><img
                                                            width="15" height="15" src="images/eurobl.svg">
                                                            Poids {{ annonce.nb_kg }}Kg</p>
                                                    </div>
                                                    <div class="col-md-2"></div>
                                                    <div class="col-md-5 p-2"
                                                         style="background-color:#C9EEFF;border-radius: 4px;text-align: center ">
                                                        <p style="font-size: 20px;color:#00A1ED;"><img
                                                            width="15" height="15" src="images/poidbl.svg">
                                                            Prix {{ annonce.prix_kg }}€/Kg</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12" style="text-align: center">
                        </div>
                    </div>


                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="col-md-12 col-lg-12 p-4 ml-auto align-items-center">

                                        <div class="form-group col-lg-10 mx-auto mb-0">
                                            <label>Ville</label>
                                            <input v-model="annonce.ville" type="text" placeholder="Votre ville"
                                                   class="form-control bg-white  border-md">
                                        </div>

                                        <div class="form-group col-lg-10 mx-auto mb-0">
                                            <label>De</label>
                                            <select v-model="annonce.aeroport_d" id="pet-select"
                                                    class="form-control bg-white  border-md">
                                                <option sele :value="annonce.aeroport_d.id" selected>
                                                    {{ annonce.aeroport_d.name }} {{ annonce.aeroport_d.countryName }}
                                                </option>
                                                <option v-for="aeroport in aeroportsname" :key="aeroport.id"
                                                        :value="aeroport.id">{{ aeroport.name }}
                                                    {{ aeroport.countryName }}
                                                </option>

                                            </select>
                                        </div>

                                        <div class="form-group col-lg-10 mx-auto mb-0">
                                            <label>A</label>
                                            <select v-model="annonce.aeroport_a" id="pet-select"
                                                    class="form-control bg-white  border-md">
                                                <option :value="annonce.aeroport_a.id" selected>
                                                    {{ annonce.aeroport_a.name }} {{ annonce.aeroport_a.countryName }}
                                                </option>
                                                <option v-for="aeroport in aeroportsname" :key="aeroport.id"
                                                        :value="aeroport.id">{{ aeroport.name }}
                                                    {{ aeroport.countryName }}
                                                </option>

                                            </select>

                                        </div>


                                        <div class="form-group col-lg-10 mx-auto mb-0">
                                            <label>Date et heure de départ</label>
                                            <datetime
                                                class="theme-orange"
                                                type="datetime"
                                                v-model="annonce.date_heur_d"
                                                input-class="form-control bg-white  border-md"
                                                value-zone="America/New_York"
                                                zone="Europe/Vienna"
                                                auto
                                            ></datetime>
                                        </div>


                                        <div class="form-group col-lg-10 mx-auto mb-0">
                                            <label>Date et heure d'arrivée</label>
                                            <datetime
                                                class="theme-orange"
                                                type="datetime"
                                                v-model="annonce.date_heur_a"
                                                input-class="form-control bg-white  border-md"
                                                value-zone="America/New_York"
                                                zone="Europe/Vienna"
                                                auto
                                            ></datetime>
                                        </div>


                                        <div class="form-group col-lg-10 mx-auto mb-0">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Poids disponible</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                        </div>
                                                        <div class="col-md-8"
                                                             style="background-color:#F2F2F2;border-radius: 13px;">
                                                            <h5>{{ annonce.nb_kg }} KG</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <VueSlideBar
                                                v-model="annonce.nb_kg"
                                                :min="1"
                                                :max="50"
                                                :processStyle="slider.processStyle"
                                                :lineHeight="slider.lineHeight"
                                                :tooltipStyles="{ backgroundColor: '#00A1ED', borderColor: '#00A1ED' }">
                                            </VueSlideBar>

                                        </div>


                                        <div class="form-group col-lg-10 mx-auto mb-0">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Prix au kilo</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                        </div>
                                                        <div class="col-md-8"
                                                             style="background-color:#F2F2F2;border-radius: 13px;">
                                                            <h5>{{ annonce.prix_kg }} KG</h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <VueSlideBar
                                                v-model="annonce.prix_kg"
                                                :min="2"
                                                :max="50"
                                                :processStyle="slider.processStyle"
                                                :lineHeight="slider.lineHeight"
                                                :tooltipStyles="{ backgroundColor: '#00A1ED', borderColor: '#00A1ED' }">
                                            </VueSlideBar>
                                        </div>

                                        <div class="form-group col-lg-10 mx-auto mb-0">
                                            <div class="row">
                                                <ul class="ks-cboxtags">
                                                    <li>
                                                        <input type="checkbox" v-model="annonce.resistance"
                                                               id="resistante"
                                                               value="1">
                                                        <label for="resistante">Résistante</label>
                                                    </li>

                                                    <li>
                                                        <input type="checkbox" id="non_resistante"
                                                               v-model="annonce.resistance"
                                                               value="2">
                                                        <label for="non_resistante">Non résistante</label>
                                                    </li>
                                                    <br>
                                                    <li>
                                                        <input type="checkbox" v-model="annonce.resistance" id="fragile"
                                                               value="3">
                                                        <label for="fragile"> Fragile</label>
                                                    </li>
                                                    <li>
                                                        <input type="checkbox" v-model="annonce.resistance"
                                                               id="non_cassable"
                                                               value="4">
                                                        <label for="non_cassable">Non cassable</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-10 mx-auto mb-0">
                                            <label>Autres information</label>
                                            <textarea v-model="annonce.autre_information"
                                                      class="form-control bg-white  border-md"
                                                      rows="3"></textarea>
                                        </div>

                                    </div>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                                    </button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
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
import {Datetime} from 'vue-datetime'
import myheader from '../components/Myheader'

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


            aeroportsname: {},
            slider: {
                lineHeight: 20,
                processStyle: {
                    backgroundColor: '#00A1ED'
                }
            },

            annonces: {},

        }

    },
    components: {
        VueSlideBar,
        myheader,
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
            let token = localStorage.getItem('token')
            let config = {
                method: 'get',
                url: 'api/mescolis?page=' + page,
                headers: {
                    'Authorization': 'Bearer ' + token,
                },
            };

            axios(config)
                .then((response) => {
                    {
                        this.annonces = response.data.data.data;
                        console.log(this.annonces);
                        window.scrollTo(0, 620);

                    }
                })
                .catch(function (error) {
                    console.log(error);
                });

        },


        show(id) {
            let token = localStorage.getItem('token')
            let config = {
                method: 'get',
                url: 'api/coli/' + id,
                headers: {
                    'Authorization': 'Bearer ' + token,
                },
            };

            axios(config)
                .then((response) => {
                    {
                        this.annonce = response.data;

                    }
                })
                .catch(function (error) {
                    console.log(error);
                });

        },

        created() {
            let token = localStorage.getItem('token');
            if (!token) {
                this.$router.push('/login');
            } else {
                this.getannonces();
                this.getResults();
            }

        }


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

[type="checkbox"]:disabled:not(:checked) + label::before,
[type="checkbox"]:disabled:checked + label::before {
    box-shadow: none;
    border-color: #bbb;
    background-color: #e9e9e9;
}

/* Disabled checked */
[type="checkbox"]:disabled:checked + label::after {
    color: #777;
}

[type="checkbox"]:disabled + label {
    color: #aaa;
}

/* Accessibility focus */
[type="checkbox"]:checked:focus + label::before,
[type="checkbox"]:not(:checked):focus + label::before {
    box-shadow: inset 0 1px 3px #C9EEFF, 0 0 0 6px #C9EEFF;
}
/* Aspect de la case */
[type="checkbox"]:not(:checked) + label::before,
[type="checkbox"]:checked + label::before {
    content: '';
    position: absolute;
    left: 0;
    top: 0;
    width: 1.4em;
    height: 1.4em;
    border: 1px solid #aaa;
    background: #FFF;
    border-radius: .2em;
    box-shadow: inset 0 1px 3px #C9EEFF, 0 0 0 #C9EEFF;
    transition: all .275s;
}

/* Aspect de la coche */
[type="checkbox"]:not(:checked) + label::after,
[type="checkbox"]:checked + label::after {
    content: '✕';
    speak: never; /* Pour être sûr que le lecteur d'écran ne lira pas "fois" */
    position: absolute;
    top: .55em;
    left: .1em;
    font-size: 1.4em;
    color:#C9EEFF;
    line-height: 0;
    transition: all .2s; /* Petite transition */
}

/* Aspect non cochée */
[type="checkbox"]:not(:checked) + label::after {
    opacity: 0;
    transform: scale(0) rotate(45deg);
}

/* Aspect cochée */
[type="checkbox"]:checked + label::after {
    opacity: 1;
    transform: scale(1) rotate(0);
}

form p {
    position: relative;
}

[type="checkbox"] {
    position: absolute;
    left: 0;
    opacity: 0.01;
}

[type="checkbox"] + label {
    position: relative;
    padding-left: 2.3em;
    font-size: 1.05em;
    line-height: 1.7;
    cursor: pointer;
}

form p {
    /* permet de positionner la checkbox */
    position: relative;
}

[type="checkbox"]:not(:checked),
[type="checkbox"]:checked {
    /* Cache la checkbox sans
       la rendre invisible aux
       lecteurs d'écran */
    position: absolute;
    left: 0;
    opacity: 0.01;
}

/* Preparer le label */
[type="checkbox"]:not(:checked) + label,
[type="checkbox"]:checked + label {
    position: relative; /* permet de positionner la checkbox */
    padding-left: 2.3em; /* place pour la box */
    font-size: 1.05em;
    line-height: 1.7;
    cursor: pointer;
}
</style>
