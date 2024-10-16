<template>
      <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

          <div class="d-flex justify-content-between align-items-center">
           <!-- Conteneur pour le titre et le bouton -->
            <div class="d-flex align-items-center">
              <h2 class="me-3">Toutes les Actualités</h2> <!-- Ajoute un margin-right pour espacer -->
              
              <!-- Bouton d'ajout d'actualité (visible seulement si l'utilisateur est authentifié) -->
              <button v-if="isAuthenticated" @click="goToAddActualite" class="btn btn-primary">Ajouter une actualité</button>
            </div>

            <ol>
                <li><a href="\">Accueil</a></li>
                <li>Actualités</li>
            </ol>
          </div>

      </div>
    </section><!-- End Breadcrumbs -->


     <!-- ======= Portfolio Details Section ======= -->
     <section id="portfolio-details" class="portfolio-details">
      <div class="container" v-for="actualite in actualites.data" :key="actualite.id">

        <div class="row gy-4">

          <!-- <div class="col-lg-8" v-if="actualite.images.length > 0">
            <div class="portfolio-details-slider swiper"  v-for="image in actualite.images" :key="image.id">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide">
                    <img :src="'/storage/' + image.url" :alt="image.caption" >
                </div>
               

                

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div> -->

            <div class="col-lg-8" v-if="actualite.images.length > 0">
                <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide">
                            <img :src="'/storage/' + actualite.images[0].url" :alt="actualite.images[0].caption">
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>


          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>{{ actualite.title }}</h3>
              <ul>
                <li><strong>Titre</strong>: </li>
                <li><strong>Contenu</strong>: {{ actualite.content }}</li>
                <li><strong>Project date</strong>: 01 March, 2020</li>
                <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li>
                <li><strong>Lire plus</strong>: <a href="#" class="inline-block text-sky-500 underline hover:text-sky-400"
                     @click.prevent="readMore(actualite)">Lire plus</a></li>
              </ul>
            </div>
            <!-- <div class="portfolio-description">
              <h2>This is an example of portfolio detail</h2>
              <p>
                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
              </p>
            </div> -->
          </div>

        </div>

        <hr>
        <br>

      </div>
    </section><!-- End Portfolio Details Section -->

    <div class="d-flex justify-content-center">
      <ul class="pagination">
        
        <li :class="`page-item ${link.active ? 'active': ''} ${ !link.url ? 'disabled': ''}`"
        v-for="(link, index) in filteredLinks" :key="index">
        <a class="page-link" href="#" v-html="link.label"
         @click.prevent="getResults(link)"></a>
        </li>
        
        
      </ul>
    </div >
</template>

 <script>
  import { ref, onMounted, computed } from 'vue';
  import { useRoute, useRouter } from 'vue-router';
  import useActualites from '../composition-api/useActualites';
  
  export default {
    setup() {
      const { actualites, fetchActualites, actualitesLinks } = useActualites();
      const route = useRoute();
      const router = useRouter();

  
      // Chargement des actualités lors de la création du composant
      onMounted(fetchActualites);
  

      const readMore = (actualite) => {
      router.push({ name: 'Actualite', params: { actualiteId: actualite.id } });
        };

      const getResults = async (link) => {
            if (!link.url || link.active) {
                return;
            } else {
                try {
                    const response = await fetch(link.url);
                    if (!response.ok) {
                        throw new Error('Failed to fetch actualites');
                    }
                    const data = await response.json();
                    console.log(data);
                    actualites.value = data;
                    actualitesLinks.value = data.links;
                    console.log(actualitesLinks.value);
                } catch (error) {
                    console.error('Error fetching actualites:', error);
                }
            }
        };
        
      // Filter links for pagination display
      const filteredLinks = computed(() => {
        const links = actualitesLinks.value;
        if (links.length <= 7) {
          return links;  // Show all if there are 7 or fewer links
        }

        const currentPage = parseInt(links.find(link => link.active)?.label, 10) || 1;
        const maxPagesToShow = 5;
        const halfRange = Math.floor(maxPagesToShow / 2);

        return links.filter((link, index) => {
          const pageLabel = parseInt(link.label, 10);
          const isFirst = index === 0;
          const isLast = index === links.length - 1;
          const isNearCurrentPage = !isNaN(pageLabel) && Math.abs(pageLabel - currentPage) <= halfRange;

          return isFirst || isLast || isNearCurrentPage;
        });
      });

       // Vérifie si l'utilisateur est authentifié
      const isAuthenticated = computed(() => {
        return !!window.token; // Retourne true si le token existe
      });

      // Fonction pour rediriger vers la page d'ajout d'actualité
      const goToAddActualite = () => {
          router.push({ name: 'AddActualite' });
        };






      return { actualites, fetchActualites, readMore, actualitesLinks, getResults, filteredLinks, isAuthenticated, goToAddActualite };
    }
  }
  </script>