# Portfolio Website - Fachri Ramdhan

Modern, responsive portfolio website built with Laravel 12 and Tailwind CSS 3. Features a glassmorphism design with dark/light mode toggle, interactive project slider, and dynamic content management through JSON.

## 🚀 Tech Stack

### Backend

- **Laravel 12.49.0** - PHP Framework
- **PHP 8.5.2** - Server-side scripting

### Frontend

- **Tailwind CSS 3.4.0** - Utility-first CSS framework
- **Vite 5.x** - Frontend build tool
- **Vanilla JavaScript** - Interactive components
- **Font Awesome 6.5.1** - Icon library
- **Google Fonts (Inter)** - Typography

### Development Tools

- **Composer** - PHP dependency management
- **NPM** - JavaScript package management
- **Blade Templates** - Laravel templating engine

## ✨ Features

- 🎨 **Glassmorphism UI Design** - Modern glass-card aesthetic
- 🌓 **Dark/Light Mode** - Theme toggle with localStorage persistence
- 📱 **Fully Responsive** - Mobile-first design approach
- 🎭 **Component-Based Architecture** - Modular Blade components
- 🗂️ **JSON-Driven Content** - Easy content management without database
- 🎯 **Interactive Project Slider** - 3-column grid with navigation
- ⚡ **Optimized Performance** - Vite HMR for fast development
- 🎪 **Smooth Animations** - Transition effects and hover states

## 📁 Project Structure

```
portfolio-laravel/
├── app/
│   └── Http/
│       └── Controllers/
│           └── PortfolioController.php
├── public/
│   ├── data/
│   │   └── portfolio.json          # Main content data
│   ├── img/                         # Image assets
│   │   ├── profile.jpeg
│   │   ├── html.webp
│   │   ├── css.png
│   │   └── ... (tech stack icons)
│   └── cv.pdf                       # Downloadable CV
├── resources/
│   ├── css/
│   │   └── app.css                  # Tailwind styles
│   ├── js/
│   │   └── app.js                   # JavaScript entry
│   └── views/
│       ├── components/              # Reusable components
│       │   ├── sidebar.blade.php
│       │   ├── social-links.blade.php
│       │   ├── contact-links.blade.php
│       │   ├── work-experience.blade.php
│       │   ├── projects.blade.php
│       │   └── tech-stack.blade.php
│       ├── layouts/
│       │   └── app.blade.php        # Main layout
│       └── portfolio/
│           └── index.blade.php      # Homepage
├── routes/
│   └── web.php                      # Route definitions
├── tailwind.config.js               # Tailwind configuration
├── vite.config.js                   # Vite configuration
├── package.json                     # NPM dependencies
├── composer.json                    # Composer dependencies
└── .env                             # Environment variables
```

## 🛠️ Installation

### Prerequisites

- PHP >= 8.2
- Composer
- Node.js >= 18.x
- NPM or Yarn

### Step-by-Step Setup

1. **Clone the repository**

```bash
git clone https://github.com/fachriramdhan/portfolio-laravel.git
cd portfolio-laravel
```

2. **Install PHP dependencies**

```bash
composer install
```

3. **Install JavaScript dependencies**

```bash
npm install
```

4. **Environment setup**

```bash
cp .env.example .env
php artisan key:generate
```

5. **Configure environment variables**
   Edit `.env` file:

```env
APP_NAME="Portfolio Fachri Ramdhan"
APP_ENV=local
APP_KEY=base64:xxx
APP_DEBUG=true
APP_URL=http://localhost
```

6. **Build assets**

For development (with hot reload):

```bash
npm run dev
```

For production:

```bash
npm run build
```

7. **Start development server**

Open a new terminal and run:

```bash
php artisan serve
```

8. **Access the application**

```
http://localhost:8000
```

## 📝 Content Management

All content is managed through JSON file located at `public/data/portfolio.json`.

### JSON Structure

```json
{
  "profile": {
    "name": "Your Name",
    "title": "Your Title",
    "description": "Your bio",
    "education": "Your education",
    "location": "Your location",
    "status": "Available for Hire",
    "email": "your@email.com",
    "cv_url": "cv.pdf",
    "profile_image": "img/profile.jpeg"
  },
  "social_links": [
    {
      "name": "GitHub",
      "url": "https://github.com/username",
      "icon": "fab fa-github",
      "color": "#2563eb"
    }
  ],
  "work_experience": [...],
  "projects": [...],
  "tech_stack": {...}
}
```

### Updating Content

1. Edit `public/data/portfolio.json`
2. Refresh the browser (no rebuild required)
3. For images, place files in `public/img/`

## 🎨 Customization

### Tailwind Configuration

Edit `tailwind.config.js` to customize:

- Colors
- Fonts
- Breakpoints
- Custom utilities

```javascript
theme: {
  extend: {
    colors: {
      darkBg: "#0f172a",
      lightBg: "#f8fafc",
    },
  },
}
```

### Custom Styles

Add custom CSS in `resources/css/app.css`:

```css
/* Your custom styles */
.custom-class {
    /* styles */
}
```

## 🚀 Deployment

### Build for Production

```bash
npm run build
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Server Requirements

- PHP >= 8.2
- Composer
- Web server (Apache/Nginx)
- Node.js (for building assets)

### Example Nginx Configuration

```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /path/to/portfolio-laravel/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## 🔧 Troubleshooting

### CSS not loading

```bash
npm run dev
# or
npm run build
php artisan view:clear
```

### Images not showing

- Ensure images are in `public/img/`
- Check file permissions
- Verify paths in `portfolio.json`

### App Key Error

```bash
php artisan key:generate
```

### Cache Issues

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

## 📦 Component Architecture

### Sidebar Component

**Location:** `resources/views/components/sidebar.blade.php`

- Profile information
- Education, location, status
- Dark/light mode toggle
- CV download button

### Social Links Component

**Location:** `resources/views/components/social-links.blade.php`

- Social media icons
- Hover color effects
- Dynamic color from JSON

### Projects Component

**Location:** `resources/views/components/projects.blade.php`

- Interactive slider
- 3-column grid (desktop)
- Horizontal scroll (mobile)
- Navigation buttons
- Pagination dots

### Tech Stack Component

**Location:** `resources/views/components/tech-stack.blade.php`

- Categorized technologies
- Glassmorphism cards
- Icon hover effects
- Horizontal scroll per category

## 🎯 Performance Optimization

- **Vite:** Fast HMR and optimized builds
- **Lazy Loading:** Images loaded on demand
- **CSS Purging:** Tailwind removes unused styles in production
- **Asset Versioning:** Cache busting with Vite
- **Route Caching:** Laravel route optimization
- **View Caching:** Compiled Blade templates

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 👤 Author

**Fachri Ramdhan**

- Website: [Your Website]
- GitHub: [@fachriramdhan](https://github.com/fachriramdhan)
- LinkedIn: [fachriramdhan](https://linkedin.com/in/fachriramdhan)
- Email: fachriramdhan04@gmail.com

## 🙏 Acknowledgments

- Laravel Framework
- Tailwind CSS
- Font Awesome
- Google Fonts
- Vite

---

**Built with ❤️ using Laravel & Tailwind CSS**
