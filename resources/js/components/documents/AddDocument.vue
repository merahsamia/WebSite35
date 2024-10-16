<template>
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Ajouter un document</h2>
                <ol>
                    
                    <li><router-link :to="{ name: 'Documents' }">Documents</router-link></li>
                    <li>Ajout de documents</li>
                </ol>
            </div>
        </div>
    </section>
    <div class="container contact" id="contact">
        <div class="row">
            <div class="col-lg-8 mt-5 mb-5 mx-auto">
                <form @submit.prevent="submitAddDocument" role="form" class="php-email-form">
                    <div v-if="generalError" class="text-danger">{{ generalError }}</div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input v-model="form.title" type="text" name="title" class="form-control" id="title" placeholder="Titre" required>
                        </div>
                        <div v-if="errors.title" class="text-danger">{{ errors.title[0] }}</div>

                    </div>
                    <div class="form-group mt-3">
                        <textarea v-model="form.description" class="form-control" name="description" rows="5" placeholder="Contenu" ></textarea>
                        <div v-if="errors.description" class="text-danger">{{ errors.description[0] }}</div>

                    </div>
                    <div class="form-group mt-3">
                        <input v-model="form.file_path" type="text" name="file_path" class="form-control" id="file_path" placeholder="Titre" required>
                        <div v-if="errors.file_path" class="text-danger">{{ errors.file_path[0] }}</div>

                     </div>
                    <div class="text-center"><button type="submit">Sauvegarder</button></div>
                </form>
            </div>
        </div>
    </div>
</template>