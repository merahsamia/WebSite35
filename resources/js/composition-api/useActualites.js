import { ref, getCurrentInstance } from "vue";

export default function useActualites() {

    const router = getCurrentInstance().proxy.$router;

    const errors = ref({});
    const generalError = ref(null);

    const actualites = ref([]);
    const actualitesIndex = ref([]);

    const form = ref({
        title: "",
        content: "",
        image: [],
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
            const response = await fetch('/api/actualites/create', {
                method: "POST",
                body: formData,
            });

            const data = await response.json();

            if (!response.ok) {
                if (response.status === 422) {
                    errors.value = data.errors;  // Set validation errors
                } else {
                    generalError.value = "Failed to create actualité. Please try again.";  // Set general error message
                }
            } else {
                console.log("Actualité created:", data);
                router.push({ name: 'Actualites' });

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
          const response = await fetch(`/api/actualites/actualite/${id}`);
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

    return { errors, generalError, actualitesIndex, fetchActualitesIndex, actualites, fetchActualites, form, submitAddActualite, handleFileUpload, fetchActualite, actualite};
}