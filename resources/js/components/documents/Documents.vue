<template>
          <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
            <!-- Conteneur pour le titre et le bouton -->
                <div class="d-flex align-items-center">
                <h2 class="me-3">Fond Documentaire</h2> <!-- Ajoute un margin-right pour espacer -->
                
                <!-- Bouton d'ajout d'actualité (visible seulement si l'utilisateur est authentifié) -->
                <button  v-if="isAuthenticated" @click="goToAddDocument" class="btn btn-primary" >Ajouter un document</button>
                
                </div>

                <ol>
                    <li><a href="\">Accueil</a></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <div class="container contact" id="contact">
        <div class="row">
            <div class="col-lg-8 mt-5 mb-5 mx-auto">
                
            </div>
        </div>
    </div>
</template>

<script>
 import { ref, onMounted, computed } from 'vue';
  import { useRoute, useRouter } from 'vue-router';
  
  export default {
    setup() {
      const route = useRoute();
      const router = useRouter();

       // Vérifie si l'utilisateur est authentifié
      const isAuthenticated = computed(() => {
        return !!window.token; // Retourne true si le token existe
      });

      // Fonction pour rediriger vers la page d'ajout du document
      const goToAddDocument = () => {
          router.push({ name: 'AddDocument' });
        };


      return { isAuthenticated, goToAddDocument };
    }
  }
</script>
