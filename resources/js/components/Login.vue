<template>
    <div>
        <myheader/>
        <div class="row">
            <!-- For Demo Purpose -->
            <div class="bg-left col-md-5 pr-lg-5 mb-5 mb-md-0">
                <img src="images/logo_login.png" alt=""
                     class="img-fluid mb-3 d-none d-md-block">
            </div>

            <div class="col-md-7 col-lg-7 ml-auto align-items-center">

                <div class="col-md-12" style="text-align: center!important;">
                    <h1>Enregistrez-vous sur Colis Jet</h1>
                </div>
                <!-- Email Address -->
                <div class="form-group col-lg-6 mx-auto mb-0">
                    <div v-if="error" class="alert alert-danger">email et/ou mot de passe incorrect(s)"</div>

                </div>
                <form v-on:submit.prevent="login">
                    <div class="input-group col-lg-6 mx-auto mb-0">
                        <div class="input-group-prepend">
                            <span class="input-group-text px-4 border-md border-right-0"
                                  style="background-color:#F2F2F2 ;border-color:#F2F2F2 ;">
                                <img src="images/email.svg">
                            </span>
                        </div>
                        <input type="email" v-model="user.email" placeholder="Email"
                               class="form-control border-left-0 border-md"
                               style="background-color:#F2F2F2 ;border-color:#F2F2F2 ;">
                    </div>


                    <!-- Password -->
                    <div class="input-group col-lg-6 mx-auto mb-0">
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


                    <!-- Submit Button -->
                    <div class="form-group col-lg-6 mx-auto mb-0">
                        <button class="btn btn-primary btn-block py-2" style="color:#FFF;font-size: 24px;line-height: 35px;border-radius: 13px" type="submit">Connexion</button>
                    </div>
                </form>




                <div class="form-group col-lg-6 mx-auto mb-0" style="text-align: center">

                    <hr style="padding-bottom: 46px;padding-top: 46px">

                </div>
                <!-- Social Login -->
                <div class="form-group col-lg-6 mx-auto mb-0">
                    <a href="#" class="btn btn-primary btn-block py-2 btn-google">
                        <img src="images/google.png" width="33" height="33">
                        <span class="font-weight-bold">Connectez-vous avec google</span>
                    </a>
                    <a href="#" class="btn btn-primary btn-block py-2 btn-facebook">
                        <img src="images/facebook.svg">
                        <span class="font-weight-bold">Connectez-vous avec Facebook</span>
                    </a>
                </div>

                <!-- Already Registered -->
                <div class="text-center w-100" style="margin-top: 56px">
                    <p class="text-muted font-weight-bold">vous n'avez pas de compt
                        <router-link to="/register" class="text-primary ml-2" style="color:#00A1ED!important">Créer votre compte</router-link>
                    </p>
                </div>
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
import myheader from '../components/Myheader'

export default {
    components: {
        myheader
    },
    data() {
        return {
            user: {
                email: '',
                password: ''
            },
            error: false

        }
    },
    methods: {
        login() {
            axios.post('api/login', this.user).then(response => {
                console.log(response.data);


                if (response.data.success == true) {
                    let token = response.data.token
                    localStorage.setItem('token', token)
                    this.error = false;
                    Toast.fire({
                        icon: 'success',
                        title: 'Bienvenue à votre compte'
                    })
                    this.errors = []
                    this.post = {
                        id: '',
                        ville_d: ''
                    }
                    this.$router.push('/profil');
                }
                if (response.data.success == false) {
                    this.error = true;
                    console.log(this.error)
                }
            });
        }
    },
    created() {
        let token = localStorage.getItem('token');
        if (!token) {
            this.$router.push('/login');
        } else {
            this.$router.push('/profil');
        }
    }


}
</script>
<style>
.border-md {
    border-width: 2px;
}

.btn-facebook {
    background: #F2F2F2 0% 0% no-repeat padding-box;
    color: #000000;
    border: none;
}

.btn-facebook:hover, .btn-facebook:focus {
    background: #FFFFFF !important;
    color: #000000;
}

.btn-google {
    background: #F2F2F2 0% 0% no-repeat padding-box;
    color: #000000;
    border: none;
}

.btn-google:hover, .btn-google:focus {
    background: #FFFFFF;
    color: #000000;
}


/*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/

body {
    min-height: 100vh;
}

.form-control:not(select) {
    padding: 1.5rem 0.5rem;
}

select.form-control {
    height: 52px;
    padding-left: 0.5rem;
}

.form-control::placeholder {
    color: #ccc;
    font-weight: bold;
    font-size: 0.9rem;
}

.form-control:focus {
    box-shadow: none;
}

.text-primary {
    color: #00A1ED;
}

hr {
    border: none;
    border-top: 3px #333;
    color: #000000;
    overflow: visible;
    text-align: center;
    height: 5px;
    line-height: 32px;
    font-size: 20px ;

}
hr:after {
    background: #fff;
    content: 'Ou bien connectez vous avec';
    padding: 0 4px;
    position: relative;
    top: -13px;
}


</style>


