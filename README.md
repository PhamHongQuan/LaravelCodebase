# Laravel Template

A modern Laravel application template with advanced architecture patterns, caching system, and admin panel integration.

## 🚀 Features

- **Laravel 12** with PHP 8.4
- **Repository Pattern** with caching support
- **Filament Admin Panel** for easy content management
- **Docker & Laravel Sail** for development environment
- **Event-driven Architecture** with cache events
- **Service Layer** abstraction
- **Tailwind CSS** for styling
- **Vite** for asset compilation
- **MySQL & Redis** for data and caching

## 📋 Requirements

- Docker & Docker Compose
- PHP 8.2+ (for local development)
- Composer
- Node.js & npm

## 🛠️ Installation

### 1. Clone the repository
```bash
git clone https://github.com/PhamHongQuan/LaravelCodebase.git
cd LaravelTemplate
```

### 2. Build and start Docker containers
```bash
docker compose build
docker compose up -d
```

### 3. Install PHP dependencies
```bash
docker exec -it lara_app bash
composer install
```

### 4. Install Node.js dependencies
```bash
npm install
```

### 5. Environment setup
```bash
cp .env.example .env
php artisan key:generate
```

### 6. Database setup
```bash
php artisan migrate
php artisan db:seed --class=DatabaseSeeder
```

### 7. Build assets
```bash
npm run build
```

## 🏗️ Architecture

### Repository Pattern
The application implements a robust repository pattern with caching capabilities:

- **Contracts**: `app/Repositories/Contracts/IRepository.php`
- **Implementation**: `app/Repositories/Implementations/Repository.php`
- **Cache Behavior**: `app/Repositories/Cache/Behavior/ShouldCache.php`

### Service Layer
Business logic is abstracted through service classes:

- **Contracts**: `app/Services/Contracts/IService.php`
- **Implementation**: `app/Services/Implementations/Service.php`
- **Cache Service**: `app/Services/Cache/CacheService.php`

### Event System
Cache events for monitoring and logging:

- **Query Events**: `app/Events/Cache/Queries/`
- **Update Events**: `app/Events/Cache/Updates/`

## 🎨 Admin Panel

The application includes Filament admin panel accessible at `/admin`:

- Modern, responsive admin interface
- Built-in authentication
- Resource management
- Dashboard widgets
- Customizable themes

## 🗄️ Database

### Cache System
- Database-based caching with Redis support
- Cache table migration included
- Tagged caching for better organization
- Automatic cache invalidation

### Available Tables
- `users` - User management
- `cache` - Application caching
- `cache_locks` - Cache locking mechanism
- `jobs` - Queue jobs

## 🐳 Docker Services

- **lara_app** - Laravel application (PHP 8.4)
- **lara_mysql** - MySQL 8.0 database
- **lara_redis** - Redis cache server

### Ports
- Application: `80` (configurable via `APP_PORT`)
- Vite Dev Server: `5173` (configurable via `VITE_PORT`)
- MySQL: `3306` (configurable via `FORWARD_DB_PORT`)
- Redis: `6379` (configurable via `FORWARD_REDIS_PORT`)

## 🚀 Development

### Start development server
```bash
# Using Docker (recommended)
docker compose up -d

# Using Laravel Sail
./vendor/bin/sail up -d

# Using artisan serve (local PHP required)
php artisan serve
```

### Asset compilation
```bash
# Development mode with hot reload
npm run dev

# Production build
npm run build
```

### Running tests
```bash
php artisan test
```

### Code formatting
```bash
./vendor/bin/pint
```

## 📁 Project Structure

```
LaravelTemplate/
├── app/
│   ├── Events/Cache/          # Cache events
│   ├── Http/Controllers/      # Controllers
│   ├── Models/               # Eloquent models
│   ├── Providers/            # Service providers
│   ├── Repositories/         # Repository pattern
│   └── Services/             # Service layer
├── config/                   # Configuration files
├── database/                 # Migrations, seeders, factories
├── public/                   # Web root
├── resources/                # Views, assets, language files
├── routes/                   # Route definitions
├── storage/                  # Application storage
└── tests/                    # Test files
```

## 🔧 Configuration

### Environment Variables
Key environment variables to configure:

```env
APP_NAME=LaravelTemplate
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=sail
DB_PASSWORD=password

CACHE_STORE=database
REDIS_HOST=redis
REDIS_PASSWORD=null
REDIS_PORT=6379
```

### Cache Configuration
The application supports multiple cache drivers:
- `database` (default) - Uses database cache table
- `redis` - Uses Redis server
- `file` - Uses file system
- `array` - In-memory cache

## 📚 Usage Examples

### Creating a Repository
```php
use App\Repositories\Implementations\Repository;
use App\Repositories\Cache\Behavior\ShouldCache;

class UserRepository extends Repository implements ShouldCache
{
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}
```

### Using the Service Layer
```php
use App\Services\Implementations\Service;

class UserService extends Service
{
    public function __construct(UserRepository $repository)
    {
        parent::__construct($repository);
    }
}
```

### Cache Operations
```php
use App\Services\Cache\CacheService;

$cacheService = app(CacheService::class);

// Set cache with tags
$cacheService->set('key', 'value', 3600, ['users']);

// Get cached data
$data = $cacheService->get('key', ['users']);

// Delete cache by pattern
$cacheService->deleteBy('users:*', ['users']);
```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 🆘 Support

For support and questions:
- Create an issue in the repository
- Check the Laravel documentation
- Review Filament documentation for admin panel features
