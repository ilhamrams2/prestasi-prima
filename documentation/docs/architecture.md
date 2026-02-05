---
sidebar_position: 2
---

# Arsitektur Sistem

Portal SMK Prestasi Prima dibangun dengan arsitektur modular yang terstruktur dan scalable.

## Struktur Direktori

```
prestasi-prima/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── prestasiprima/       # Public website controllers
│   │   │   ├── prestasiprima/admin/ # Admin panel controllers
│   │   │   └── Api/                 # API endpoints
│   │   └── Middleware/
│   ├── Models/
│   └── Services/
├── resources/
│   ├── views/
│   │   ├── prestasiprima/           # Public website views
│   │   ├── layouts/                 # Admin layouts
│   │   └── sections/                # Reusable components
│   ├── js/
│   │   ├── app.js                   # Main entry point
│   │   └── lib/                     # Utility libraries
│   └── css/
│       └── app.css                  # Tailwind setup
├── routes/
│   ├── web.php                      # Main routes
│   └── api.php                      # API routes
└── database/
    ├── migrations/
    └── seeders/
```

## Layer Aplikasi

### 1. **Presentation Layer**
- **Blade Templates** - Server-side rendering
- **Alpine.js** - Client-side interactivity
- **Tailwind CSS** - Utility-first styling
- **GSAP** - Advanced animations

### 2. **Business Logic Layer**
- **Controllers** - Request handling
- **Services** - Business logic isolation
- **Models** - Data layer (Eloquent ORM)

### 3. **Data Layer**
- **MySQL** - Primary database
- **File Storage** - Image & document management
- **Session** - User state management

## Design Patterns

### MVC (Model-View-Controller)
Struktur standar Laravel dengan pemisahan yang jelas antara data, logika, dan tampilan.

### Service Pattern
Logika bisnis kompleks diisolasi dalam service classes untuk reusability dan testability.

### Repository Pattern (Opsional)
Digunakan untuk operasi database yang kompleks atau membutuhkan abstraction.

## Real-time Features

### Laravel Reverb
- **WebSocket Server** berjalan di port `8080`
- **Broadcasting Events** untuk notifikasi real-time
- **PresmaCare Chat** - Live chat admin-user
- **Visitor Counter** - Real-time visitor tracking

```php
// Example Broadcasting Event
event(new NewChatMessage($message));
```

## Asset Management

### Vite Configuration
```javascript
// vite.config.js
export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
```

### CDN Policy
**NO EXTERNAL CDNs** - Semua library di-host secara lokal via NPM untuk:
- Performance optimization
- Offline capability
- Version control
- Security

## Security Considerations

- **CSRF Protection** - Semua form dilindungi token
- **XSS Prevention** - Blade escaping by default
- **SQL Injection** - Eloquent ORM & prepared statements
- **Authentication** - Laravel Sanctum untuk API
- **Authorization** - Role-based access control

## Performance Optimization

- **Lazy Loading** - Images & components
- **Code Splitting** - Via Vite
- **Database Indexing** - Query optimization
- **Caching** - Route, config, dan view caching
