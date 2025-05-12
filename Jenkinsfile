pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/merahsamia/WebSite35.git'
                
            }
        }

        stage('Install Dependencies') {
            steps {
                bat 'composer install --no-dev --optimize-autoloader'  // Windows : Installer les dépendances PHP
                bat 'npm install'  // Windows : Installer les dépendances Node.js
            }
        }

        stage('Build Frontend') {
            steps {
                bat 'npm run production'  // Windows : Compiler les fichiers Vue.js
            }
        }

        stage('Optimize Laravel') {
            steps {
                bat 'php artisan cache:clear'
                bat 'php artisan config:cache'
                bat 'php artisan route:cache'
            }
        }
    }
}
