import { ref } from "vue";

export default function useActualiteEditComposition(route) {
   const id = route.params.id;
   const actualite = ref({
        title: "",
        content: "",
        images: [],
   });
   const oldImage = ref("");
   const errors = ref({});
   const generalError = ref("");

  

    const handleFileUpload = (event) => {
        actualite.value.images = Array.from(event.target.files);
    };

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

   const saveActualite = async () => {
       errors.value = {};
       generalError.value = "";

       try {
           const formData = new FormData();
           formData.append("_method", "PUT");
           formData.append("title", actualite.value.title);
           formData.append("content", actualite.value.content);
           if (actualite.value.images) {
                    actualite.value.images.forEach((image, index) => {
                        formData.append(`images[${index}]`, image); 
                    });
               }

           

           const response = await fetch(`/api/actualites/${id}`, {
               method: "POST",
               body: formData,
           });

           const responseData = await response.json();

           if (!response.ok) {
               throw responseData;
           } else {
               oldImage.value = responseData.image;
           }

           console.log(actualite.value.category)
           window.Toast.fire({
            icon: "success",
            title: "Actualité modifiée avec succès"
            });
           } catch (error) {
           if (error.errors) {
               errors.value = error.errors;
               generalError.value =
                   error.message ||
                   "An error occurred while saving the actuality.";
           } else {
               generalError.value =
                   "An error occurred while saving the actuality.";
           }
       }
   };

   fetchActualite();

   return {
       id,
       actualite,
       oldImage,
       errors,
       generalError,
       handleFileUpload,
       saveActualite,
   };
}

