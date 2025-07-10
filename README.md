# Magia Potagia - Portales y Comercio Electrónico

## Descripción
Sitio web dinámico de servicios espirituales (tarot, carta natal, cristales) con blog y sistema de administración.

## Alumnas
- Florencia Fernández Bugna
- Manuela Jaureguialzo

## Docente
- Victor Villafañe

## Materia
Portales y Comercios Electrónicos - 1° Cuatrimestre 2025 - Diseño y Programación Web

## Requisitos Previos
- PHP 8.1 o superior
- Composer
- Node.js y npm (para compilar assets)

## Instalación

### 1. Clonar el repositorio
```bash
git clone <url-del-repositorio>
cd portales-tp1
```

### 2. Instalar dependencias de PHP
```bash
composer install
```

### 3. Instalar dependencias de Node.js
```bash
npm install
```

### 4. Configurar el archivo .env
Copiar el archivo `.env.example` a `.env`:
```bash
cp .env.example .env
```

Editar el archivo `.env` y configurar:
```env
APP_NAME="Magia Potagia"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost

DB_CONNECTION=sqlite
DB_DATABASE=/ruta/completa/al/proyecto/database/fernandezbugna_jaureguialzo.sqlite
```

### 5. Generar clave de aplicación
```bash
php artisan key:generate
```

### 6. Crear la base de datos
```bash
touch database/fernandezbugna_jaureguialzo.sqlite
```

### 7. Ejecutar migraciones
```bash
php artisan migrate
```

### 8. Ejecutar seeders
```bash
php artisan db:seed
```

### 9. Compilar assets (opcional)
```bash
npm run build
```

### 10. Iniciar el servidor
```bash
php artisan serve
```

El sitio estará disponible en: http://localhost:8000

## Credenciales de Acceso

### Usuario Administrador
- **Email:** admin@mail.com
- **Contraseña:** admin123

### Usuario Común
- **Email:** user@mail.com
- **Contraseña:** user123

## Estructura del Proyecto

### Base de Datos
- **Nombre:** fernandezbugna_jaureguialzo.sqlite
- **Tablas principales:**
  - `users` - Usuarios del sistema
  - `products` - Servicios/productos disponibles
  - `blog_posts` - Entradas del blog
  - `orders` - Órdenes de servicios

### Funcionalidades

#### Sitio Público
- **Home:** Presentación de servicios y productos destacados
- **Productos:** Catálogo de servicios disponibles
- **Blog:** Sección de noticias y novedades
- **Registro/Login:** Sistema de autenticación personalizado

#### Panel de Administración
- **Gestión de Posts:** ABM completo para el blog
- **Gestión de Usuarios:** Listado y detalles de usuarios
- **Subida de Imágenes:** Soporte para imágenes en posts

#### Área de Usuario
- **Dashboard:** Resumen de servicios contratados
- **Órdenes:** Historial de servicios contratados
- **Contratación:** Sistema para contratar servicios

## Características Técnicas

### Tecnologías Utilizadas
- **Backend:** Laravel 11 (PHP)
- **Frontend:** Bootstrap 5, Blade Templates
- **Base de Datos:** SQLite
- **Autenticación:** Sistema personalizado (sin usar Laravel Breeze/Jetstream)

### Validaciones
- Validación del lado del servidor con Laravel
- No se utiliza validación HTML (sin atributos `required` en inputs)

### Seguridad
- Middleware personalizado para administradores
- Hash de contraseñas con bcrypt
- Protección CSRF en formularios

### Accesibilidad
- Uso de etiquetas semánticas HTML5
- Atributos `alt` en imágenes
- Navegación por teclado
- Estructura semántica correcta

## Comandos Útiles

### Desarrollo
```bash
# Ejecutar migraciones
php artisan migrate

# Ejecutar seeders
php artisan db:seed

# Limpiar cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Ver rutas disponibles
php artisan route:list
```

### Base de Datos
```bash
# Revertir todas las migraciones
php artisan migrate:reset

# Ejecutar migraciones y seeders
php artisan migrate:fresh --seed
```

## Estructura de Archivos Importantes

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Admin/          # Controladores del admin
│   │   ├── AuthController.php
│   │   ├── BlogController.php
│   │   ├── HomeController.php
│   │   ├── ProductsController.php
│   │   ├── RegisterController.php
│   │   └── UserController.php
│   └── Middleware/
│       └── AdminMiddleware.php
├── Models/
│   ├── BlogPost.php
│   ├── Order.php
│   ├── Product.php
│   └── User.php
resources/
└── views/
    ├── admin/              # Vistas del admin
    ├── auth/               # Vistas de autenticación
    ├── blog/               # Vistas del blog
    ├── components/         # Componentes Blade
    ├── user/               # Vistas de usuario
    └── home.blade.php
database/
├── migrations/             # Migraciones de BD
├── seeders/               # Seeders de datos
└── fernandezbugna_jaureguialzo.sqlite
```

## Notas Importantes

1. **Base de Datos:** El nombre debe ser exactamente `fernandezbugna_jaureguialzo.sqlite`
2. **Validación:** No se usa validación HTML, solo validación del servidor
3. **Autenticación:** Sistema completamente personalizado sin usar las herramientas de Laravel
4. **Imágenes:** Se almacenan en `public/img/` y `public/img/blog/`
5. **Roles:** Sistema de roles implementado (admin/user)

## Solución de Problemas

### Error de permisos en base de datos
```bash
chmod 666 database/fernandezbugna_jaureguialzo.sqlite
```

### Error de clave de aplicación
```bash
php artisan key:generate
```

### Error de cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

## Contacto
Para consultas sobre el proyecto, contactar a las alumnas:
- Florencia Fernández Bugna
- Manuela Jaureguialzo
