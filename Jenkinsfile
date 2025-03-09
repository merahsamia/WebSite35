pipeline {
    agent any  // Exécute le pipeline sur n'importe quel agent disponible

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/merahsamia/WebSite35.git'
            }
        }

        stage('Install Dependencies') {
            steps {
                sh 'composer install --no-dev --optimize-autoloader'  // Installe les dépendances PHP
                sh 'npm install'  // Installe les dépendances Node.js
            }
        }

        stage('Build Frontend') {
            steps {
                sh 'npm run build'  // Compile les fichiers Vue.js
            }
        }

        stage('Optimize Laravel') {
            steps {
                sh 'php artisan cache:clear'
                sh 'php artisan config:cache'
                sh 'php artisan route:cache'
            }
        }
    }
}
