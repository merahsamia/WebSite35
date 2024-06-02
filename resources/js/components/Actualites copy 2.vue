<template>

     <!-- ======= Breadcrumbs ======= -->
     <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Actualités</h2>
          <ol>
            <li><a href="">Home</a></li>
            <li>Actualités</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    <div>
      <h1>Liste des Actualités</h1>
      <ul>
        <li v-for="actualite in actualites" :key="actualite.id">
          <h2>{{ actualite.title }}</h2>
          <p>{{ actualite.content }}</p>
          <!-- Affichez d'autres propriétés de l'actualité si nécessaire -->
  
          <!-- Affichez les images de l'actualité -->
          <div v-if="actualite.images.length > 0">
            <h3>Images:</h3>
            <ul>
              <li v-for="image in actualite.images" :key="image.id">
                <img :src="'/storage/' + image.url" :alt="image.caption" style="max-width: 200px;">
                <p>{{ image.caption }}</p>
              </li>
            </ul>
          </div>
          
          <hr>
        </li>
      </ul>
    </div>


    <!-- ======= Services Section LPL/LPA/LP ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Actualités</h2>
            <p>Dernières Actualités</p>
          </div>

          <div class="row" >
            <div v-for="actualite in actualites" :key="actualite.id" class="col-lg-4 col-md-6 align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-building"></i></div>
                <h4><a href="">{{ actualite.title }}</a></h4>
                <p>{{ actualite.content }}</p>
              </div>
            </div>
          </div>

        </div>
      </section>
    <!-- End Services Section -->
    </template>
  
  <script>
  import { ref, onMounted } from 'vue';
  import useActualites from '../composition-api/useActualites';
  
  export default {
    setup() {
      const { actualites, fetchActualites } = useActualites();
  
      // Chargement des actualités lors de la création du composant
      onMounted(fetchActualites);
  
      return { actualites, fetchActualites };
    }
  }
  </script>