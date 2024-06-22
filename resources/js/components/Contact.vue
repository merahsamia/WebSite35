<template>
  <form @submit.prevent="storeContact" role="form" class="php-email-form">
    <div class="row">
      <div class="col-md-6 form-group">
        <input v-model="contactData.name" type="text" name="name" class="form-control" id="name" placeholder="Nom" required>
      </div>
      <div class="col-md-6 form-group mt-3 mt-md-0">
        <input v-model="contactData.email" type="email" class="form-control" name="email" id="email" placeholder="Email" required>
      </div>
    </div>
    <div class="form-group mt-3">
      <input v-model="contactData.subject" type="text" class="form-control" name="subject" id="subject" placeholder="Objet" required>
    </div>
    <div class="form-group mt-3">
      <textarea v-model="contactData.message" class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
    </div>

    <!-- Affichage des erreurs -->
    <div v-if="errors" class="mt-2 text-danger text-sm">
      <div v-for="(error, index) in errors" :key="index">{{ error }}</div>
    </div>

    <div class="text-center">
      <button type="submit" class="btn btn-primary">Envoyer le message</button>
    </div>
  </form>
</template>

<script setup>
import useContact from '../composition-api/useContact';

// Importation des données et méthodes depuis useContact
const { contactData, errors, storeContact } = useContact();
</script>
