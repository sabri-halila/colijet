<template>
    <div class="sidebar" data-image="../../../images/sidebar-5.jpg">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Coli Jet
                </a>
            </div>
            <ul class="nav">
                <li class="nav-item active">
                    <router-link to="/dashboard" class="nav-link" >
                        <i class="fas fa-tachometer-alt"></i>
                        <p style="color: #fff">Tableau de bord</p>
                    </router-link>
                </li>
                <li>
                    <router-link to="/mesannonces" class="nav-link" >
                        <i class="fas fa-box-open"></i>
                        <p style="color: #fff">Mes annonces</p>
                    </router-link>
                </li>
                <li>
                    <router-link to="/mescolis" class="nav-link" >
                        <i class="fas fa-history"></i>
                        <p style="color: #fff">Mes colis</p>
                    </router-link>
                </li>

                <li>
                    <router-link to="/profil" class="nav-link" >
                        <i class="fas fa-user"></i>
                        <p style="color: #fff">Mon profil</p>
                    </router-link>
                </li>

                <li>
                    <router-link to="/dashboard" class="nav-link" >
                        <i class="fas fa-bell"></i>
                        <p style="color: #fff">Mes alertes</p>
                    </router-link>
                </li>

                <li>
                    <router-link to="/dashboard" class="nav-link" >
                        <i class="fas fa-credit-card"></i>
                        <p style="color: #fff">Mode de paiement</p>
                    </router-link>
                </li>

                <li>
                    <router-link to="/dashboard" class="nav-link" >
                        <i class="fas fa-comments"></i>
                        <p style="color: #fff">Mes conversations</p>
                    </router-link>
                </li>
                <li>
                    <router-link to="/dashboard" class="nav-link" >
                        <i class="fas fa-cog"></i>
                        <p style="color: #fff">Paramètres & Aide</p>
                    </router-link>
                </li>


            </ul>
        </div>
    </div>
</template>

<script>
export default {
    name: "adminsidebar"
}
</script>

<style scoped>

</style>
