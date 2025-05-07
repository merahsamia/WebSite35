pipeline {
    agent any

    stages {
        stage('Checkout') {
            steps {
                git (branch: 'main', 
                url: 'git@github.com:merahsamia/WebSite35.git',
                credentialsId: 'b3BlbnNzaC1rZXktdjEAAAAABG5vbmUAAAAEbm9uZQAAAAAAAAABAAAAMwAAAAtzc2gtZW
                QyNTUxOQAAACDAqUmK/5mfZPPvMAvt7Ltm5WWjJJHyM09B/NHNBOtlkAAAAJjTChxi0woc
                YgAAAAtzc2gtZWQyNTUxOQAAACDAqUmK/5mfZPPvMAvt7Ltm5WWjJJHyM09B/NHNBOtlkA
                AAAEAsJ/xsAeW4KazbyRp7RUuDusr4aEvAADvKv0u2dehIr8CpSYr/mZ9k8+8wC+3su2bl
                ZaMkkfIzT0H80c0E62WQAAAAFWplbmtpbnMtZ2l0aHViLWFjY2Vzcw==' )// Remplacez par l'ID de vos credentials SSH dans Jenkins
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
                bat 'npm run dev'  // Windows : Compiler les fichiers Vue.js
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
