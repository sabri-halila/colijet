import Login from "./components/Login";
import Register from "./components/Register";
import Annonce from "./components/Annonce";
import AjouterAnnonce from "./components/AjouterAnnonce";
import Home from "./components/home";
import Mesannonces from "./components/mesannonces";
import Mescolis from "./components/MesColis";
import profile from "./components/profil";
import ModiferAnnonce from "./components/EditAnnonce"


const routes = [
    { path: '/', component: Home},
    { path: '/login', component: Login},
    { path: '/register', component: Register },
    { path: '/annonce', component: Annonce },
    { path: '/Ajouter', component: AjouterAnnonce },
    { path: '/mesannonces', component: Mesannonces },
    { path: '/mescolis', component: Mescolis },
    { path: '/profil', component: profile },
    { path: '/ModiferAnnonce', component: ModiferAnnonce },
]
export default routes
