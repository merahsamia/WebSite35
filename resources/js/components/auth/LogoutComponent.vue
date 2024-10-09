<template>
    <div>
        <input type="hidden" v-model="token_id">
        <a class="nav-link" href="#" @click.prevent="logout">Logout</a>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            token_id: ''
        };
    },
    mounted() {
        let tokenData = this.parseToJson(window.token);
        this.token_id = tokenData.jti; // Récupérez l'ID du token
    },
    methods: {
        parseToJson(tokenValue) {
            if (!tokenValue) {
                console.error("Token is undefined or null");
                return {}; // Retournez un objet vide si le token est invalide
            }

            // Séparez et décodez le token
            let base64Url = tokenValue.split('.')[1];
            if (!base64Url) {
                console.error("Invalid token format");
                return {};
            }

            let base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
            let jsonPayload = decodeURIComponent(window.atob(base64).split('').map(c => {
                return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
            }).join(''));

            return JSON.parse(jsonPayload);
        },

        async logout() {
            // Assurez-vous que le token est défini avant la déconnexion
            if (!window.token) {
                console.error("Token is missing");
                return;
            }

            // Obtenez l'ID du token avant la déconnexion
            let tokenData = this.parseToJson(window.token);
            this.token_id = tokenData.jti;

            if (!this.token_id) {
                console.error("Token ID is missing");
                return;
            }

            try {
                // Envoyer la requête de déconnexion avec le token et son ID
                await axios.post('/logout', {
                    token_id: this.token_id
                }, {
                    headers: {
                        'Authorization': `Bearer ${window.token}` // Token envoyé dans les headers
                    }
                });

                // Redirection après déconnexion
                window.location.href = '/login';
            } catch (error) {
                console.error('Error logging out:', error.response.data);
            }
        }

    }
}
</script>
