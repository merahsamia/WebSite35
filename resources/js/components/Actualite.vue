<template>
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
          <div class="container">

              <div class="d-flex justify-content-between align-items-center">
              <h2>Actualité Details</h2>
              <ol>
                  <li><a href="\">Accueil</a></li>
                 
                  <li>                 
                     <router-link :to="{ name: 'Actualites' }" > Actualites</router-link>
                  </li>

                  <li>Actualité</li>
              </ol>
              </div>

          </div>
      </section><!-- End Breadcrumbs -->


   <!-- ======= Portfolio Details Section ======= -->
   <section id="portfolio-details" class="portfolio-details">
    <div class="container" >

      <div class="row gy-4" v-if="Object.keys(actualite).length !== 0">

        <swiper class="col-lg-8" v-if="actualite.images && actualite.images.length > 0" :modules="modules" :pagination="{ clickable: true }" :autoplay="{ delay: 3000, disableOnInteraction: false }">
          <swiper-slide class="portfolio-details-slider" v-for="image in actualite.images" :key="image.id">
            <img  :src="'/storage/' + image.url" :alt="image.caption">
          </swiper-slide>
        </swiper>
        

        <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>Actualité information</h3>

            <ul>
              <li>  
                <button  class="btn btn-primary me-2" v-if="isAuthenticated"  @click="editActualite(actualite.id)"> 
                  Modifier</button>
                <button  @click="deleteActualite(actualite.id)" class="btn btn-danger" v-if="isAuthenticated">Supprimer</button>
              </li>
              <li><strong>Titre</strong>: {{ actualite.title }}  </li>
              <li><strong>Contenu</strong>: {{ actualite.content }}</li>
              <li><strong>Project date</strong>: 01 March, 2020</li>
              <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
            </ul>
          </div>
          <div class="portfolio-description">
            <h2>This is an example of portfolio detail</h2>
            <p>
              Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
            </p>
          </div> 
        </div>

      </div>

      <hr>
      <br>

    
    </div>
  </section><!-- End Portfolio Details Section -->
</template>



<script>
import useActualites from '../composition-api/useActualites';
import { onMounted, computed } from 'vue';
import { useRoute, useRouter } from 'vue-router';

import {Pagination, Autoplay} from 'swiper';



export default {
  setup() {
    const { actualite, fetchActualite, deleteActualite } = useActualites();
    const route = useRoute();
    const id = route.params.actualiteId;
    const router = useRouter();

    onMounted(() => {
      fetchActualite(id); // Passez l'ID à la fonction fetchActualite
    });

    // Vérifie si l'utilisateur est authentifié
    const isAuthenticated = computed(() => {
      return !!window.token; // Retourne true si le token existe, false sinon
    });

    const editActualite = (id) => {
      router.push({ name: 'EditActualite', params: { actualiteId: id } });
    };


    return { actualite, fetchActualite, modules: [Pagination, Autoplay], deleteActualite, isAuthenticated, editActualite };
  }
};

</script>