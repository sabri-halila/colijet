<template>
    <div>
        <myheader/>
        <div class="row">
            <div class="bg-left col-md-6 pr-lg-6 mb-6 mb-md-0">
                <img src="images/coli_jet_add.png" alt="" class="img-fluid mb-3 d-none d-md-block">
            </div>

            <div class="col-md-6 col-lg-6 p-4 ml-auto align-items-center">
                <form v-on:submit.prevent="register">
                    <div class="form-group col-lg-10 mx-auto mb-0">
                        <label>Ville</label>
                        <input v-model="annonce.ville" type="text" placeholder="Votre ville"
                               class="form-controlform1">
                    </div>

                    <div class="form-group col-lg-10 mx-auto mb-0">
                        <label>De</label>
                        <select v-model="annonce.aeroport_d" id="pet-select" class="form-controlform1">
                            <option value="">Choisir l'aéroport</option>
                            <option v-for="aeroport in aeroportsname" :key="aeroport.id" :value="aeroport.id">
                                {{ aeroport.name }} {{ aeroport.countryName }}
                            </option>

                        </select>
                    </div>

                    <div class="form-group col-lg-10 mx-auto mb-0">
                        <label>A</label>
                        <select v-model="annonce.aeroport_a" id="pet-select" class="form-controlform1">
                            <option value="">Choisir l'aéroport</option>
                            <option v-for="aeroport in aeroportsname" :key="aeroport.id" :value="aeroport.id">
                                {{ aeroport.name }} {{ aeroport.countryName }}
                            </option>

                        </select>

                    </div>


                    <div class="form-group col-lg-10 mx-auto mb-0">
                        <label>Date et heure de départ</label>
                        <datetime
                            class="theme-orange"
                            type="datetime"
                            v-model="annonce.date_heur_d"
                            input-class="form-controlform1"
                            value-zone="America/New_York"
                            zone="Europe/Vienna"
                            auto
                        ></datetime>
                    </div>


                    <div class="form-group col-lg-10 mx-auto mb-0">
                        <label>Date et heure d'arrivée</label>
                                <datetime
                                    class="theme-orange"
                                    id="dd1"
                                    type="datetime"
                                    v-model="annonce.date_heur_a"
                                    input-class="form-controlform1"
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
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-4"
                                         style="padding:0px;text-align:center; height:32px;width: 115px ;background-color:#F2F2F2;border-radius: 13px;font-size: 20px;color:#00A1ED;line-height: 32px">
                                        {{ annonce.nb_kg }} Kg
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
                                    <div class="col-md-8">
                                    </div>
                                    <div class="col-md-4"
                                         style="padding:0px;text-align:center;height:32px;width: 115px ;background-color:#F2F2F2;border-radius: 13px;font-size: 20px;color:#00A1ED;line-height: 32px">
                                        {{ annonce.prix_kg }} €
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
                                    <input type="checkbox" v-model="annonce.resistance" id="resistante" value="1">
                                    <label for="resistante">Résistante</label>
                                </li>

                                <li>
                                    <input type="checkbox" id="non_resistante" v-model="annonce.resistance" value="2">
                                    <label for="non_resistante">Non résistante</label>
                                </li>
                                <br>
                                <li>
                                    <input type="checkbox" v-model="annonce.resistance" id="fragile" value="3">
                                    <label for="fragile"> Fragile</label>
                                </li>
                                <li>
                                    <input type="checkbox" v-model="annonce.resistance" id="non_cassable" value="4">
                                    <label for="non_cassable">Non cassable</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group col-lg-10 mx-auto mb-0">
                        <label>Autres information</label>
                        <textarea v-model="annonce.autre_information" class="form-control"
                                  rows="3"></textarea>
                    </div>


                    <!-- Submit Button -->
                    <div class="form-group col-lg-10 mx-auto mb-0">
                        <button class="btn btn-primary btn-block py-2" style="color:#FFF" type="submit"
                                @click="ajouter">Publier
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>


<!--<template>
    <div>
        <div class="input-group flex-nowrap">
            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
            <input type="email" class="form-control" v-model="user.email" placeholder="Email">
        </div>

        <div class="input-group flex-nowrap">
            <span class="input-group-text"><i class="fas fa-unlock-alt"></i></span>
            <input type="password" class="form-control" v-model="user.password" placeholder="Mot de passe">
        </div>


        <button class="btn btn-primary m-2" @click="login">Connextion</button>
        <div v-if="error" class="alert alert-danger" >error !!!!!!!!!!!!!!</div>

    </div>
</template>-->

<script>
import VueSlideBar from 'vue-slide-bar'
import myheader from '../components/Myheader'
import {Datetime} from 'vue-datetime';
import Autocomplete from 'vuejs-auto-complete'

export default {
    data() {

        return {
            keyword: null,
            count: '',
            annonce: {
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
            search: {
                ville_d: '',
            },
            aeroportsname: {},
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
        Autocomplete,
        datetime: Datetime
    },
    methods: {

        getResults() {
            axios.get('api/aeroportlist',).then(response => {
                this.aeroportsname = response.data.data;
                console.log(this.aeroportsname);

            })
        },

        ajouter() {
            let token = localStorage.getItem('token')
            let config = {
                method: 'post',
                url: 'api/createannonce',
                headers: {
                    'Authorization': 'Bearer ' + token,
                },
                data: this.annonce
            };

            axios(config)
                .then((response) => {
                    if (response.data.success == true) {
                        console.log(this.annonce)

                        Toast.fire({
                            icon: 'success',
                            title: 'Annonce ajouter avec succès'
                        });
                        this.$router.push('/mesannonces');
                    }
                })
                .catch(function (error) {
                    console.log(error);
                });

        }
    },

    created() {
        let token = localStorage.getItem('token');
        if (!token) {
            this.$router.push('/login');
        } else {
            this.getResults()
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
</style>

