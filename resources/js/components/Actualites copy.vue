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