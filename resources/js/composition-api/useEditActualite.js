import { ref } from 'vue';
import { useRouter } from 'vue-router';

export default function useActualiteEdit() {
  const form = ref({
    title: '',
    content: '',
    images: []
  });

  const errors = ref({});
  const generalError = ref('');
  const router = useRouter();

  const fetchActualiteForEdit = async (id) => {
    try {
      const response = await fetch(`/api/actualites/${id}`);
      const data = await response.json();
      form.value.title = data.title;
      form.value.content = data.content;
      //form.value.images = data.images; // Si les images doivent être pré-remplies
    } catch (error) {
      console.error('Failed to load actualité:', error);
    }
  };

  const handleFileUpload = (event) => {
    form.value.images = Array.from(event.target.files);
  };

  const submitEditActualite = async (id) => {
    const formData = new FormData();
    formData.append('title', form.value.title);
    formData.append('content', form.value.content);
  
    // N'ajoute des images dans formData que si elles ont été modifiées
    if (form.value.images.length > 0 && form.value.images[0] instanceof File) {
      form.value.images.forEach((image, index) => {
        formData.append(`images[${index}]`, image);
      });
    }
  
    try {
      const response = await fetch(`/api/actualites/${id}`, {
        method: 'POST',
        body: formData,
        headers: {
          'Authorization': `Bearer ${window.token}`, // le token
        },
      });
  
      const data = await response.json();
      if (!response.ok) {
        if (response.status === 422) {
          errors.value = data.errors; // Handle validation errors
        } else {
          generalError.value = 'Failed to update actualité. Please try again.';
        }
      } else {
        console.log('Actualité updated:', data);
        
      // Redirection vers l'actualité modifiée
      router.push({ name: 'Actualite', params: { id: data.id } }); 

      window.Toast.fire({
        icon: "success",
        title: "Actualité modifiée avec succès"
        });
      }
    } catch (error) {
      generalError.value = 'Failed to update actualité. Please try again.';
    }
  };
  

  return {
    form,
    errors,
    generalError,
    fetchActualiteForEdit,
    handleFileUpload,
    submitEditActualite
  };
}
