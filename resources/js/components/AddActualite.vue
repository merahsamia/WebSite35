<template>
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>{{$t("Ajouter une actualité")}}</h2>
                <ol>
                    
                    <li><router-link :to="{ name: 'Actualites' }">{{$t("Actualités")}}</router-link></li>
                    <li>{{$t("Ajout d'actualités")}}</li>
                </ol>
            </div>
        </div>
    </section>
    <div class="container contact" id="contact">
        <div class="row">
            <div class="col-lg-8 mt-5 mb-5 mx-auto">
                <form @submit.prevent="submitAddActualite" role="form" class="php-email-form">
                    <div v-if="generalError" class="text-danger">{{ generalError }}</div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input v-model="form.title" type="text" name="title" class="form-control" id="title" :placeholder="$t('Titre')" required>
                        </div>
                        <div v-if="errors.title" class="text-danger">{{ errors.title[0] }}</div>

                    </div>
                    <div class="form-group mt-3">
                        <textarea v-model="form.content" class="form-control" name="content" rows="5" :placeholder="$t('Contenu')" ></textarea>
                        <div v-if="errors.content" class="text-danger">{{ errors.content[0] }}</div>

                    </div>
                    <div class="form-group mt-3">
                        <input @change="handleFileUpload" type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload" multiple>
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
  import useActualites from '../composition-api/useActualites';

  export default {
    setup() {
      const { form, submitAddActualite, handleFileUpload, errors, generalError } = useActualites();
      return { form, submitAddActualite, handleFileUpload, errors, generalError };
    }
  }
</script>