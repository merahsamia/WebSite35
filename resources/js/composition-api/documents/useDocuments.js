import { ref, getCurrentInstance } from "vue";

export default function useDocuments() {

    const router = getCurrentInstance().proxy.$router;

    const errors = ref({});
    const generalError = ref('');
    const documents = ref([]);
    const documentsLinks = ref([]);


    const form = ref({
        title: "",
        description: "",
        file_path: "",
    });

    const document = ref({});
    const id = ref('');

//Documents.vue 
    const fetchDocuments = async () => {
        try {
            const response = await fetch('/api/AllDocuments'); 
            if (!response.ok) {
                throw new Error('Failed to fetch Documents');
            }
            const data = await response.json();
            //console.log(data)

            documents.value = data;
            documentsLinks.value = data.links

        } catch (error) {
            console.error('Error fetching documents:', error);
        }
    };

//AddDocument.vue

    const submitAddDocument = async () => {
        const formData = new FormData();
        formData.append("title", form.value.title);
        formData.append("description", form.value.description);
        
        if (form.value.file_path instanceof File) {
            formData.append("file_path", form.value.file_path);  // Ajoute le fichier au FormData
        }

        try {
            const response = await fetch('/api/AddDocument', {
                method: "POST",
                body: formData,
                headers: {
                    // 'Content-Type': 'multipart/form-data', // Pas nécessaire avec FormData, le navigateur le fait automatiquement
                    'Authorization': `Bearer ${window.token}` // le token 

                },
               
            });

            const data = await response.json();

            if (!response.ok) {
                if (response.status === 422) {
                    errors.value = data.errors;  // Set validation errors
                    console.log(data.errors); // Débogage
                } else {
                    generalError.value = "Failed to create document. Please try again.";  // Set general error message
                }
            } else {
                console.log("Document créé avec succès :", data);
                router.push({ name: 'Documents' });

                window.Toast.fire({
                    icon: "success",
                    title: "Document créé avec succès"
                });
            }
        } catch (error) {
            console.error("Erreur lors de la création du document :", error);
            generalError.value = "Failed to create document. Please try again.";  // Set general error message
        }
    };

    
    const handleFileUpload = (event) => {
        form.value.file_path = event.target.files[0];  // Récupère le fichier sélectionné par l'utilisateur
    }; 

    return { errors, generalError, documents, fetchDocuments, documentsLinks, form, submitAddDocument, handleFileUpload};
}