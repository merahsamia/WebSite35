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
            let base64Url = tokenValue.split('.')[1];
            
            let base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
            let jsonPayload = decodeURIComponent(window.atob(base64).split('').map(c => {
                return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
            }).join(''));
            return JSON.parse(jsonPayload);
        },
        async logout() {
            try {
                // Envoyez l'ID du token lors de la déconnexion
                await axios.post('/logout', {
                    token_id: this.token_id // Envoyez le token ID
                }, {
                    headers: {
                        'Authorization': `Bearer ${window.token}` // Envoyez le token dans l'en-tête Authorization
                    }
                });
                
                // Redirigez après la déconnexion
                window.location.href = '/login';
            } catch (error) {
                console.error('Error logging out:', error.response.data);
            }
        }
    }
}
</script>
