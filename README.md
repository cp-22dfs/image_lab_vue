# image_lab_vue
This is a local image synchronization and gallery system built with Laravel and Vue.js. It allows the application to manage and display images stored in an external directory (e.g., C:/temp) while ensuring security and data integrity.

## Setup & Installation

# Clone & Install
   
    git clone https://github.com/votre-user/votre-repo.git
    cd votre-repo
    composer install
    npm install && npm run dev
    
# Config .env

    APP_NAME="Image Lab"
    EXTERNAL_STORAGE_PATH="C:/temp"
    QUEUE_CONNECTION=database

# Database

    php artisan migrate
    php artisan config:clear

# Run - 4 different terminals

    php artisan serve
    npm run dev
    php artisan queue:work
    php artisan schedule:work
