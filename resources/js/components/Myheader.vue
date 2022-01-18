<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-whi bg-light">
            <div class="container">
                <router-link to="/" class="navbar-brand"><img src="images/logo.svg"></router-link>
                <button class="navbar-toggler" style="color:#00A1ED" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"> <i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <router-link to="/" class="nav-title nav-link active"
                                                 style="font-size: 20px;line-height: 32px;color: #000;"
                                                 aria-current="page">Accueil
                                    </router-link>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-title nav-link" style="font-size: 20px;line-height: 32px;color: #000;"
                                       href="#">Comment ça Marche?</a>
                                </li>
                                <li class="nav-item">
                                    <a class=" nav-title nav-link"
                                       style="font-size: 20px;line-height: 32px;color: #000;" href="#">Contact</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6" style="">
                                            <router-link to="/Ajouter" class="btn btn-primary " role="button" style="font-size: 20px;line-height: 30px">
                                                Transporter
                                            </router-link>
                                        </div>
                                        <div class="col-md-2">
                                            <router-link to="/annonce" class="btn btn-primary" role="button" style="font-size: 20px;line-height: 30px"><i
                                                class="fas fa-search"></i></router-link>
                                        </div>
                                        <div class="col-md-2">
                                            <div v-if="conn" class="dropdown">
                                                <button class="btn btn-primary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                        aria-expanded="false" style="font-size: 20px;line-height: 30px">
                                                    <i class="fas fa-user"></i>
                                                </button>
                                                <ul class="dropdown-menu" style="margin-left: -166%;" aria-labelledby="dropdownMenuButton1">
                                                    <li>
                                                        <router-link to="/profil" class="dropdown-item"
                                                                     style="color: #000">
                                                            <i
                                                                class="fas fa-user" style="color:#00A1ED"></i> Mon
                                                            profil
                                                        </router-link>
                                                    </li>
                                                    <li>
                                                        <router-link to="/mesannonces" class="dropdown-item"
                                                                     style="color: #000"><i class="fas fa-box-open"
                                                                                            style="color:#00A1ED"></i>
                                                            Mes
                                                            annonces
                                                        </router-link>
                                                    </li>
                                                    <li>
                                                        <router-link to="/mescolis" class="dropdown-item"
                                                                     style="color: #000"><i
                                                            class="fas fa-history" style="color:#00A1ED"></i> Mes colis
                                                        </router-link>
                                                    </li>
                                                    <li>
                                                        <router-link to="/" class="dropdown-item" style="color: #000"><i
                                                            class="fas fa-credit-card" style="color:#00A1ED"></i> Mode
                                                            de
                                                            paiement
                                                        </router-link>
                                                    </li>
                                                    <li>
                                                        <router-link to="/" class="dropdown-item" style="color: #000"><i
                                                            class="fas fa-comments" style="color:#00A1ED"></i> Mes
                                                            conversations
                                                        </router-link>
                                                    </li>
                                                    <li><a class="dropdown-item" style="color: #000" @click="logout"
                                                           role="button">
                                                        <i class="fas fa-power-off" style="color:#00A1ED"></i> Me
                                                        Déconnecté</a>
                                                    </li>
                                                </ul>
                                            </div>

                                            <router-link v-else to="/login" class="btn btn-primary"  style="font-size: 20px;line-height: 30px" role="button"><i
                                                class="fas fa-user"></i></router-link>
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
        </nav>
    </div>
    <!--
    <div class="text-center">
        <router-link to="/login" class="btn btn-secondary m-1">Login</router-link>
        <router-link to="/register" class="btn btn-secondary m-1">Register</router-link>
        <router-link to="/post" class="btn btn-secondary m-1">Post</router-link>
        <button class="btn btn-secondary m-1" @click="logout">Logout</button>
    </div>
    -->
</template>

<script>
export default {
    data() {
        return {
            conn: false,
        }

    },

    created() {
        let token = localStorage.getItem('token');
        if (!token) {
            this.conn = false;
            console.log(this.conn)
        } else {
            this.conn = true;
            console.log(this.conn)
        }
    },
    methods: {

        logout() {
            let token = localStorage.getItem('token')
            let config = {
                method: 'get',
                url: 'api/logout',
                headers: {
                    'Authorization': 'Bearer ' + token,
                }
            };
            axios(config)
                .then(function (response) {
                    localStorage.removeItem('token');
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });

        },


    },


}
</script>

<style scoped>
.btn-primary {
    color: #FFFFFF;
    background-color: #00A1ED;
    border-color: #00A1ED;
}
</style>
