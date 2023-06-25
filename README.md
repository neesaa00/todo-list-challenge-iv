# Purpose  
This repo aim to solve challenge for iv


# Todo List Application

Repository for a simple Todo List Application (With bugs and tasks to be completed!!)

## Your Tasks

### Bug Hunting Tasks

-   ![vue](https://img.shields.io/badge/-vue-brightgreen) When a user typed in the text input in dashboard, they can just press `enter` button on their keyboard to submit the task to the server. But nothing happened currently. The function to execute this action is `enterPressedOnNewTask()`. Resolve this.
-   ![vue](https://img.shields.io/badge/-vue-brightgreen) There is nothing happened when user clicked on the `Completed Tasks` tab menu button in the dashboard. It should switched between a list of available task and a list of completed tasks.
-   ![laravel](https://img.shields.io/badge/-laravel-orange) User cannot mark their task as completed. Completed task should be removed from current `Available Tasks` list and available in the `Completed Tasks` list when user marked the task checkbox. No error returned from the server. I wonder why..?
-   ![laravel](https://img.shields.io/badge/-laravel-orange) User cannot delete their task. The system return error status `Call to a member function delete() on string`. 
-   ![laravel](https://img.shields.io/badge/-laravel-orange) Other user can delete other user task! Please fix this! 

### Refactoring Tasks

-   ![vue](https://img.shields.io/badge/-vue-brightgreen) In the `dashboard.vue` file. There are repeated codes in line `99-110` and `125-132`. Would it be better if we can extract this code as a vue component, so that it will be reusable later on? 
-   ![laravel](https://img.shields.io/badge/-laravel-orange) Update all controller methods in `TaskController` to use Laravel Implicit Route Model Binding, so that we don't need to manualy resolving the required `Task` model.

### Feature Request Tasks

-   ![laravel](https://img.shields.io/badge/vue-laravel-orange?labelColor=brightgreen) When a new task is created, the task will be added at the bottom of the list. Is it possible to make it so that all new task will pushed at the top of the list? (Sort by creation date descendingly). 
-   ![laravel](https://img.shields.io/badge/vue-laravel-orange?labelColor=brightgreen) Can user know when they completed their task? Maybe add date and time record to the task when user mark it as completed?

### Advance Feature Request Tasks

-   ![laravel](https://img.shields.io/badge/vue-laravel-orange?labelColor=brightgreen) Add a deadline feature. So user can select a date and time during task creation.
-   ![laravel](https://img.shields.io/badge/vue-laravel-orange?labelColor=brightgreen) Can our user categorize task? Maybe a task list for shopping items. A task list for personal items? Or work items. The user can create new/edit/delete categories. And assign task to a category during task creation. 

## Setup Guide

### 1) Application Setup

#### 1.1) Development with Docker/Laravel Sail

-   Ensure [Docker](https://www.docker.com/get-started) is installed and running on your development pc.
-   If you are using Windows OS, make sure to setup your docker installation properly. [Docker Desktop For WSL 2](https://docs.docker.com/desktop/windows/wsl/)
-   Clone repository to your workspace folder
    > **IMPORTANT!** For Windows OS, clone the repository in your WSL environment folder, not in Windows environment folder.
-   Open terminal (or WSL terminal in Windows OS), navigate to application directory.
-   Install the application's dependencies by executing the following command (Just ignore if there are errors about redis in the end - it will be resolved once we run the actual container).

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

-   Copy environment keys.

```
cp .env.example .env
```

-   Configure bash alias for sail application

```
alias sail='bash vendor/bin/sail'
```

-   Run this command to initialize all service containers required in docker.

```
sail up -d
```

-   Generate application key.

```
sail artisan key:generate
```

-   Migrate and seed database.

```
sail artisan migrate:fresh --seed
```

-   Read more details on [Laravel Sail](https://laravel.com/docs/9.x/sail).

#### 1.2) Frontend Development Setup

-   Run this command to install application front-end dependencies

```
sail npm install
```

-   Run this command to generate assets and starting up Vite development server.

```
sail npm run dev
```

-   Application is available at [http://localhost](http://localhost)
-   Read more details on [Vite - Asset Bundling](https://laravel.com/docs/9.x/vite#running-vite).

### 2) Laravel Pint

Laravel Pint is an opinionated PHP code style fixer. Pint is built on top of PHP-CS-Fixer and makes it simple to ensure that your code style stays clean and consistent. Running this command will automatically fixed our codes to adhere with opinionated coding style of Laravel. More details on [Laravel Pint](https://laravel.com/docs/9.x/pint).

```
sail pint
```

### 3) Volar/Prettier/ESLint Setup

If your IDE for development is Visual Studio Code. Please install these extensions:

-   [ESLint](https://marketplace.visualstudio.com/items?itemName=dbaeumer.vscode-eslint)
-   [Volar for Vue 3](https://marketplace.visualstudio.com/items?itemName=Vue.volar)
-   [Prettier code formatter](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode)

Run the command below to automatically format our codes to adhere with opinionated style of Prettier.

```
sail npm format
```

Run the command below to automatically fixed some fixable issues. Unfixable issue will be listed in the output and will require manual intervention. Volar and ESLint will provide hints on any issue they detected automatically when you are writing the codes.

```
sail npm lint
```

### 4) Laravel Telescope

Telescope provides insight into the requests coming into your application, exceptions, log entries, database queries, queued jobs, mail, notifications, cache operations, scheduled tasks, variable dumps, and more. Publish telescope assets and it will be available at [http://localhost/telescope](http://localhost/telescope).

```
sail artisan telescope:publish
```

## Built With

### Tech Stack

-   [Docker](https://www.docker.com/) (Containerization)
-   [MySQL](https://www.mysql.com/) (Database management system)
-   [Php](https://www.php.net/) (PHP Language)
-   [Redis](https://redis.io/) (Cache, Queue and Message Broker)

### Backend

-   [Laravel Framework](https://laravel.com/) (Version 10)
-   [Laravel Ignition](https://flareapp.io/ignition) (A beautiful error page for Laravel)
-   [Laravel Jetstream](https://jetstream.laravel.com/) (Laravel starter kit)
-   [Laravel Sail](https://laravel.com/docs/10.x/sail) (Light-weight CLI for interacting with with Laravel's default Docker dev ent)
-   [Laravel Sanctum](https://laravel.com/docs/10.x/sanctum) (Laravel authentication system)
-   [Laravel Telescope](https://laravel.com/docs/10.x/telescope) (Laravel debug assistant)
-   [Ziggy](https://github.com/tighten/ziggy) (Javascript named route helper for Laravel)

### Frontend

-   [Inertia.js](https://inertiajs.com/) (Modern Monolith System)
-   [Tailwind CSS](https://tailwindcss.com/) (Utility-first CSS framework)
-   [Vue.js](https://vuejs.org/guide/introduction.html) (Version 3 with Composition API)
-   [Luxon](https://moment.github.io/luxon/) (Wrapper for JavaScript dates and times)
