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
    <div class="container">

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

          <!-- <div class="col-lg-8" v-if="actualite.images && actualite.images.length > 0">
              <div class="portfolio-details-slider swiper">
                  <div class="swiper-wrapper align-items-center">
                      <div class="swiper-slide">
                          <img :src="'/storage/' + actualite.images[0].url" :alt="actualite.images[0].caption">
                      </div>
                  </div>
                  <div class="swiper-pagination"></div>
              </div>
          </div> -->

          <swiper :modules="modules" :pagination="{ clickable: true }">
            <swiper-slide>
              <img  src="https://media.istockphoto.com/id/1486626509/photo/woman-use-ai-to-help-work-or-use-ai-everyday-life-at-home-ai-learning-and-artificial.jpg?s=1024x1024&w=is&k=20&c=GdZtXvKObS4z87L6zwi7fgmWlynJx4dRitwYJUtClLo=" alt="image.caption">
            </swiper-slide>
            <swiper-slide>
              <img src="https://cdn.pixabay.com/photo/2015/12/03/08/50/paper-1074131_1280.jpg" alt="image.caption">
            </swiper-slide>
            <swiper-slide>
              <img src="https://cdn.pixabay.com/photo/2020/04/08/08/08/spring-5016266_1280.jpg" alt="image.caption">
            </swiper-slide>  
          </swiper>
        

        <!-- <div class="col-lg-4">
          <div class="portfolio-info">
            <h3>Actualité information</h3>
            <ul>
              <li><strong>Titre</strong>: {{ actualite.title }}</li>
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
        </div> -->

      </div>

      <hr>
      <br>

    </div>
  </section><!-- End Portfolio Details Section -->
</template>



<script>
import useActualites from '../composition-api/useActualites';
import { onMounted } from 'vue';
import { useRoute } from 'vue-router';

import {Pagination} from 'swiper';



export default {
  setup() {
  
    return {
      modules: [Pagination],
    }
  }
};
</script>