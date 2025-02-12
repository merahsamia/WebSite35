<template>
    <header id="header" class="fixed-top ">
      <div class="container d-flex align-items-center justify-content-lg-between">

        <h1 class="logo me-auto me-lg-0"><a href="">
          <img src="assets/img/opgi.png" class="logo" alt="" width="115" >
          
          
          
          <span></span></a>
        </h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
          <ul>
            <li><a class="nav-link scrollto active" href="#hero"><h5>{{ $t("Accueil") }}</h5></a></li> 
          <!--    <li><a class="nav-link scrollto" href="#about"><h5>À propos</h5></a></li>-->
            <li><a class="nav-link scrollto" href="#testimonials"><h5>{{ $t("Actualités") }}</h5></a></li>
           <!--  <li><a class="nav-link scrollto" href="#services"><h5>Programmes</h5></a></li>-->
            <li><a class="nav-link scrollto " href="#portfolio"><h5>{{ $t("Projets") }}</h5></a></li>
            <li><a class="nav-link scrollto " @click="goToAllDocuments"><h5>{{ $t("Fond Documentaire") }}</h5></a></li>
            
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
            <li><a class="nav-link scrollto" href="#contact"><h5>{{ $t("Contact") }}</h5></a></li>
            <li><a class="nav-link scrollto" href="https://client.opgi-boumerdes.dz/Login" target="_blank"><h5>{{ $t("E-Paiement") }} </h5> <img src="assets/img/e-paiement.jpg" class="img-fluid" alt="" style="border-radius: 5px; margin-left: 5px; margin-right: 5px;"></a></li>
            <li v-if="isAuthenticated">
              <LogoutComponent />
              <!-- Composant de déconnexion (si nécessaire pour des interactions supplémentaires) -->
            </li>

          </ul>
          <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

        <a href="#about" class="get-started-btn scrollto"><h5>{{ $t("Commencer")}}</h5></a>

      </div>
    </header>
</template>

<script>

  import LogoutComponent from './auth/LogoutComponent.vue';

  export default {
      components: {
          LogoutComponent,
      },
      data() {
          return {
              isAuthenticated: false, // Etat d'authentification
          };
      },
      mounted() {
          // Vérifiez si l'utilisateur est authentifié en vérifiant le token
          this.isAuthenticated = !!window.token; // Si un token existe, l'utilisateur est authentifié
      },

      methods: {
         goToAllDocuments() {
          this.$router.push({ name: 'Documents' });
          
        }

      },
  };


</script>
