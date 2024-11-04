<template>
  <!-- ======= Breadcrumbs ======= -->
  <section id="breadcrumbs" class="breadcrumbs">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
          <h2 class="me-3">Fond Documentaire</h2>
          <!-- Bouton d'ajout de document (visible seulement si l'utilisateur est authentifié) -->
          <button v-if="isAuthenticated" @click="goToAddDocument" class="btn btn-primary">Ajouter un document</button>
        </div>
        <ol>
          <li><a href="/">Accueil</a></li>
        </ol>
      </div>
    </div>
  </section><!-- End Breadcrumbs -->

  <div class="container mt-5" id="document-list">
    <div class="row">
      <div class="col-lg-8 mx-auto" v-for="document in documents.data" :key="document.id">
        <div class="card mb-3 text-center">
          <div class="card-body">
            <h5 class="card-title">{{ document.title }}</h5>
           <!--  <p class="card-text">{{ document.description }}</p>-->
            <a :href="`/storage/${document.file_path}`" target="_blank" class="btn btn-outline-primary">
              Télécharger le document
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>


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

<style scoped>
/* Style pour les cartes de document */
#document-list .card {
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

#document-list .card-title {
  font-size: 1.25rem;
  font-weight: bold;
  color: #333;
}

#document-list .card-text {
  font-size: 1rem;
  color: #666;
}

#document-list .btn {
  margin-top: 10px;
}
</style>

<script>
 import { ref, onMounted, computed } from 'vue';
  import { useRoute, useRouter } from 'vue-router';
  import useDocuments from '../../composition-api/documents/useDocuments';

  
  export default {
    setup() {
      const { documents, fetchDocuments, documentsLinks } = useDocuments();

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

      onMounted(fetchDocuments);

      // Filter links for pagination display
      const filteredLinks = computed(() => {
            const links = documentsLinks.value;
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

      const getResults = async (link) => {
            if (!link.url || link.active) {
                return;
            } else {
                try {
                    const response = await fetch(link.url);
                    if (!response.ok) {
                        throw new Error('Failed to fetch documents');
                    }
                    const data = await response.json();
                    //console.log(data);
                    documents.value = data;
                    documentsLinks.value = data.links;
                    //console.log(documentsLinks.value);
                } catch (error) {
                    console.error('Error fetching documents:', error);
                }
            }
        };
        



      return { isAuthenticated, goToAddDocument, documents, fetchDocuments, documentsLinks, filteredLinks, getResults };
    }
  }
</script>
