import { ref } from 'vue';

export default function useContact() {
  const contactData = ref({
    name: '',
    email: '',
    subject: '',
    message: ''
  });

  const errors = ref(null);
  const email_loading = ref(false);


  const storeContact = async () => {
    try {
      const formData = new FormData();
      formData.append('name', contactData.value.name);
      formData.append('email', contactData.value.email);
      formData.append('subject', contactData.value.subject);
      formData.append('message', contactData.value.message);

      email_loading.value = true;
            const response = await fetch('/api/storeContact', {
        method: 'POST',
        body: formData
      });

      if (!response.ok) {
        throw new Error('Failed to send email');
      }

      const data = await response.json(); // Convertir la réponse en JSON

      // Vérifier si la réponse est correcte ou non
      if (data === 'success') {
        // Réinitialiser le formulaire et les erreurs
        contactData.value = {
          name: '',
          email: '',
          subject: '',
          message: ''
        };
        errors.value = null;


        // Afficher un message de succès
        window.Toast.fire({
          icon: 'success',
          title: 'Message sent successfully!'
        });
      } else {
        // Afficher une erreur si la réponse indique un échec
        throw new Error('Failed to send email');

      }

    } catch (error) {
      console.error('Error sending email:', error);
      errors.value = ['Failed to send email. Please try again.'];
      email_loading.value = false; 

    } finally {
      email_loading.value = false; // Toujours désactiver le spinner après l'envoi ou en cas d'erreur
    }
  };

  return {
    contactData,
    errors,
    storeContact,
    email_loading,
  };
}