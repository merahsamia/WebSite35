import { ref, getCurrentInstance } from "vue";

export default function useActualites() {

    const router = getCurrentInstance().proxy.$router;

    const errors = ref({});
    const generalError = ref('');

    const actualites = ref([]);
    const actualitesLinks = ref([]);

    const actualitesIndex = ref([]);

    const form = ref({
        title: "",
        content: "",
        images: [],
    });

    const actualite = ref({});
    const id = ref('');
    
//Index.vue 4 Latest actualities
    const fetchActualitesIndex = async () => {
        try {
            const response = await fetch('/api/actualites'); 
            if (!response.ok) {
                throw new Error('Failed to fetch Index actualites');
            }
            const data = await response.json();
            console.log(data)

            actualitesIndex.value = data;
        } catch (error) {
            console.error('Error fetching Index actualites:', error);
        }
    };

//Actualites.vue 
    const fetchActualites = async () => {
        try {
            const response = await fetch('/api/AllActualites'); 
            if (!response.ok) {
                throw new Error('Failed to fetch actualites');
            }
            const data = await response.json();
            console.log(data)

            actualites.value = data;
            actualitesLinks.value = data.links

        } catch (error) {
            console.error('Error fetching actualites:', error);
        }
    };

//AddActualite.vue

    const submitAddActualite = async () => {
        const formData = new FormData();
        formData.append("title", form.value.title);
        formData.append("content", form.value.content);
        form.value.images.forEach((image, index) => {
            formData.append(`images[${index}]`, image);
        });

        try {
            const response = await fetch('/api/actualites', {
                method: "POST",
                body: formData,
            });

            const data = await response.json();

            if (!response.ok) {
                if (response.status === 422) {
                    errors.value = data.errors;  // Set validation errors
                    console.log(data.errors); // Ajoutez ceci pour déboguer

                } else {
                    generalError.value = "Failed to create actualité. Please try again.";  // Set general error message
                }
            } else {
                console.log("Actualité created:", data);
                router.push({ name: 'Actualites' });

                window.Toast.fire({
                    icon: "success",
                    title: "Actualité créée avec succès"
                    });
        

                // Optionally navigate or reset form
            }
        } catch (error) {
            console.error("Error creating actualité:", error);
            generalError.value = "Failed to create actualité. Please try again.";  // Set general error message
        }
    };

    const handleFileUpload = (event) => {
        form.value.images = Array.from(event.target.files);
    };


//Actualite.vue

    const fetchActualite = async (id) => { 
        try {
          const response = await fetch(`/api/actualites/${id}`);
          if (!response.ok) {
            throw new Error('Failed to fetch Actualite');
          }
          const data = await response.json();
          console.log(data);
      
          actualite.value = data;
        } catch (error) {
          console.error('Error fetching Actualite:', error);
        }
      };


    const deleteActualite = async (id) => {
        Swal.fire({
            title: "Êtes-vous sûre de vouloir supprimer cette actualité ?",
            text: "Vous ne pourrez pas annuler cette action !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Oui, supprimez la!"
            }).then(async (result) => {
            if (result.isConfirmed) {
                try {
                    const response = await fetch(`/api/actualites/${id}`, {
                        method: "DELETE",
                    });

                    if (!response.ok) {
                        throw new Error("Failed to delete actualite");
                    }

                    actualite.value = {};
                    router.push({ name: 'Actualites' });

                    window.Toast.fire({
                        icon: "success",
                        title: "Actualite deleted successfully!"
                    });
                } catch (error) {
                    console.error("Error deleting actualite:", error);
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Failed to delete actualite. Please try again.",
                    });
                }
            }
        });

    };

    return { errors, generalError, actualitesIndex, fetchActualitesIndex, actualites, fetchActualites, actualitesLinks, form, submitAddActualite, handleFileUpload, fetchActualite, actualite, deleteActualite};
}