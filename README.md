# Makeflix - DIY Streaming Platform

Makeflix is an innovative streaming platform tailored for DIY enthusiasts and craftsmen. It allows users to discover, watch, and interact with DIY project videos, track their progress, and engage with the community.

## Table of Contents

- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Technologies Used](#technologies-used)
- [License](#license)

## Features

- **User Registration and Profiles**: Users can register, create profiles, and track their DIY progress.
- **Dynamic Search and Filters**: Real-time search filtering using Livewire for seamless video discovery.
- **Video Management**: Hosting and embedding videos from external platforms like YouTube, complete with categories and materials listings.
- **Interactive Steps**: Users can mark steps as completed, with progress saved and displayed visually.
- **Commenting and Liking**: Users can engage with content through comments and a like/dislike system.
- **Light/Dark Mode**: A theme switcher for user-preferred viewing experience.
- **Responsive Design**: Optimized for all devices ensuring a consistent user experience.

## Installation

### Prerequisites

- PHP 8.x
- Composer
- Node.js & NPM
- MySQL
- Git

### Steps

1. **Clone the repository:**

   ```bash
   git clone https://github.com/your-username/your-repo.git
   cd your-repo
2. **Install dependencies:**
   ```bash
   composer install
   npm install

3. **Set up environment variables:**
Copy the .env.example file to .env and fill in your database and other credentials:
   ```bash
    cp .env.example .env
   
4. **Generate application key:**
   ```bash
   php artisan key:generate
   
5. **Run migrations and seed the database:**
   ```bash
   php artisan migrate --seed
   
6. **Compile assets:**
   ```bash
   npm run dev
   
7. **Serve the application:**
   ```bash
   php artisan serve
   
Visit the app at http://localhost:8000.

### Usage
**Login/Register:** Create an account to start using Makeflix.
**Search for Videos:** Use the dynamic search bar to find videos based on titles, categories, or materials.
**Interact with Videos:** Watch videos, like or dislike them, comment, and mark your progress through the steps.
**Switch Themes:** Use the theme switcher in the navigation bar to toggle between light and dark modes.

### Technologies Used
**Laravel:** PHP framework
**Livewire:** For dynamic components
**Bootstrap:** Responsive design
**MySQL:** Database management

### References
https://laravel.com/
https://youtu.be/VyIjDnYviD4?si=fy5aed5159yLp2ls
https://youtu.be/e5QcI5mDUBI?si=5W364NRfo4bXxtFa
https://laravel.com/docs/11.x/migrations
https://youtu.be/0KrDpSYDzE4?si=liN26l05UXEzEODp
https://laravel.com/docs/11.x/routing
https://chatgpt.com/

### License
This project is licensed under the MIT License. See the LICENSE file for details.
