<template>
      <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

          <div class="d-flex justify-content-between align-items-center">
          <h2>Actualités Details</h2>
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
</template>

 <script>
  import { ref, onMounted } from 'vue';
  import { useRoute, useRouter } from 'vue-router';
  import useActualites from '../composition-api/useActualites';
  
  export default {
    setup() {
      const { actualites, fetchActualites } = useActualites();
      const route = useRoute();
      const router = useRouter();

  
      // Chargement des actualités lors de la création du composant
      onMounted(fetchActualites);
  

      const readMore = (actualite) => {
      router.push({ name: 'Actualite', params: { actualiteId: actualite.id } });
    };

      return { actualites, fetchActualites, readMore };
    }
  }
  </script>