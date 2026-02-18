# image_lab_vue
This is a local image synchronization and gallery system built with Laravel and Vue.js. It allows the application to manage and display images stored in an external directory (e.g., C:/temp) while ensuring security and data integrity.

Setup & Installation

1. Clone & Install
   
    git clone https://github.com/votre-user/votre-repo.git
    cd votre-repo
    composer install
    npm install && npm run dev
    
2. Config .env

    APP_NAME="Image Lab"
    EXTERNAL_STORAGE_PATH="C:/temp"
    QUEUE_CONNECTION=database

3. Database

   php artisan migrate
   php artisan config:clear

4. Run

    php artisan serve
    npm run dev

    # Background Jobs
    php artisan queue:work

    # Task Scheduler
    php artisan schedule:work
