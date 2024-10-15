<template>
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Modifier une Actualité</h2>
          <ol>
            <li><router-link :to="{ name: 'Actualites' }">Actualités</router-link></li>
            <li>Modification d'actualités</li>
          </ol>
        </div>
      </div>
    </section>
  
    <div class="container contact" id="contact">
      <div class="row">
        <div class="col-lg-8 mt-5 mb-5 mx-auto">
          <form @submit.prevent="submitEditActualite(route.params.actualiteId)" role="form" class="php-email-form">
            <div v-if="generalError" class="text-danger">{{ generalError }}</div>
  
            <div class="row">
              <div class="col-md-6 form-group">
                <input v-model="form.title" type="text" name="title" class="form-control" id="title" placeholder="Titre" required>
              </div>
              <div v-if="errors.title" class="text-danger">{{ errors.title[0] }}</div>
            </div>
  
            <div class="form-group mt-3">
              <textarea v-model="form.content" class="form-control" name="content" rows="5" placeholder="Contenu"></textarea>
              <div v-if="errors.content" class="text-danger">{{ errors.content[0] }}</div>
            </div>
  
            <div class="form-group mt-3">
              <input @change="handleFileUpload" type="file" class="form-control" id="inputGroupFile04" multiple>
              <div v-if="errors.images" class="mt-2 text-danger text-sm">
                <div v-for="error in errors.images" :key="error">{{ error }}</div>
              </div>
            </div>
  
            <div class="text-center"><button type="submit">Sauvegarder</button></div>
          </form>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import useEditActualite from '../composition-api/useEditActualite';
  import { onMounted } from 'vue';
  import { useRoute } from 'vue-router';
  
  export default {
    setup() {
      const route = useRoute();
      const { form, errors, generalError, fetchActualiteForEdit, handleFileUpload, submitEditActualite } = useEditActualite();
  
      onMounted(() => {
        fetchActualiteForEdit(route.params.actualiteId);
      });
  
      return { form, errors, generalError, handleFileUpload, submitEditActualite, route };
    }
  };
  </script>
  