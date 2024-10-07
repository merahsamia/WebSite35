<template>
    <header id="header" class="fixed-top ">
      <div class="container d-flex align-items-center justify-content-lg-between">

        <h1 class="logo me-auto me-lg-0"><a href="index.html">
          <img src="assets/img/opgi.png" class="logo" alt="" width="115" >
          
          
          
          <span></span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero"><h5>Accueil</h5></a></li>
            <li><a class="nav-link scrollto" href="#about"><h5>À propos</h5></a></li>
            <li><a class="nav-link scrollto" href="#testimonials"><h5>Actualités</h5></a></li>
            <li><a class="nav-link scrollto" href="#services"><h5>Programmes</h5></a></li>
            <li><a class="nav-link scrollto " href="#portfolio"><h5>Projets</h5></a></li>
            
           <!--  <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#">Drop Down 1</a></li>
                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    <li><a href="#">Deep Drop Down 1</a></li>
                    <li><a href="#">Deep Drop Down 2</a></li>
                    <li><a href="#">Deep Drop Down 3</a></li>
                    <li><a href="#">Deep Drop Down 4</a></li>
                    <li><a href="#">Deep Drop Down 5</a></li>
                  </ul>
                </li>
                <li><a href="#">Drop Down 2</a></li>
                <li><a href="#">Drop Down 3</a></li>
                <li><a href="#">Drop Down 4</a></li>
              </ul>
            </li> -->
            <li><a class="nav-link scrollto" href="#contact"><h5>Contact</h5></a></li>
            <li><a class="nav-link scrollto" href="https://client.opgi-boumerdes.dz/Login" target="_blank"><h5>Paiement en ligne </h5> <img src="assets/img/e-paiement.jpg" class="img-fluid" alt="" style="border-radius: 5px; margin-left: 5px;"></a></li>
            <li v-if="isAuthenticated">
                <a class="nav-link scrollto" @click.prevent="logout">
                    <h5>Logout</h5>
                </a>
            </li>

          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="#about" class="get-started-btn scrollto"><h5>Commencer</h5></a>

      </div>
    </header>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            isAuthenticated: false,
        };
    },
    mounted() {
        this.checkAuth();
    },
    methods: {
        checkAuth() {
            axios.get('/auth-check')
                .then(response => {
                    this.isAuthenticated = response.data.authenticated;
                    console.log(response.data);  // Ajoutez ceci pour voir ce qui est renvoyé

                })
                .catch(() => {
                    this.isAuthenticated = false;
                });
        },
        async logout() {
            try {
                await axios.post('/logout', {
                    _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                });
                window.location.href = '/login';
            } catch (error) {
                console.error('Error logging out:', error);
            }
        }
    }
}
</script>
