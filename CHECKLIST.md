# Checklist de Verificación - Magia Potagia

## ✅ REQUISITOS CUMPLIDOS

### Sitio Web (Parte Usuarios Comunes)
- [x] **Servicio/Producto**: Servicios de tarot, carta natal y cristales
- [x] **Sección de blog/novedades**: Implementado con posts publicables
- [x] **Home que presenta el producto**: Página de inicio con servicios destacados
- [x] **Registro y autenticación de usuarios**: Sistema personalizado (sin usar Laravel)
- [x] **HTML semántico**: Uso correcto de etiquetas semánticas
- [x] **CSS personalizado**: Estilos propios con Bootstrap como framework base

### Admin (Parte Administración)
- [x] **Autenticación de administrador**: Middleware personalizado implementado
- [x] **ABM para blog/novedades**: CRUD completo con imágenes
- [x] **Listado de usuarios**: Vista con detalles de servicios contratados
- [x] **Detalle de usuario**: Muestra servicios contratados/compras

### Base de Datos
- [x] **Nombre correcto**: `fernandezbugna_jaureguialzo.sqlite`
- [x] **3 tablas principales**: users, products, blog_posts
- [x] **Tabla de usuarios**: id, email, password + campos adicionales
- [x] **Tabla de productos**: 5+ campos (sin contar PK y timestamps)
- [x] **Tabla de blog**: 5+ campos (sin contar PK y timestamps)
- [x] **Migrations y seeders**: Implementados correctamente
- [x] **Relaciones entre tablas**: Implementadas con Eloquent
- [x] **Usuario con servicio contratado**: Cargado mediante seeders

### PHP/Laravel
- [x] **Laravel actual**: Uso de versiones actuales
- [x] **POO**: Principios aplicados correctamente
- [x] **Blade templates**: Motor de templates implementado
- [x] **Validación**: Implementada en todos los formularios
- [x] **Middleware personalizado**: AdminMiddleware implementado
- [x] **Modelos relacionados**: Relaciones Eloquent implementadas
- [x] **PHPDoc**: Documentación apropiada en modelos y controladores

### Validación y Accesibilidad
- [x] **Sin validación HTML**: Removidos todos los atributos `required`
- [x] **Atributos alt**: Agregados en todas las imágenes
- [x] **Aria-label**: Agregados en elementos interactivos
- [x] **Mensajes de confirmación**: Implementados en acciones críticas

### Documentación
- [x] **README.md**: Documentación completa de instalación
- [x] **Script de instalación**: `install.sh` para configuración automática
- [x] **Archivos de ejemplo**: `.env.example`, `database.sqlite.example`
- [x] **Checklist**: Este archivo de verificación

## 📋 CREDENCIALES DE ACCESO

### Usuario Administrador
- **Email:** admin@mail.com
- **Contraseña:** admin123

### Usuario Común
- **Email:** user@mail.com
- **Contraseña:** user123

## 🚀 COMANDOS DE INSTALACIÓN

```bash
# Opción 1: Script automático
./install.sh

# Opción 2: Instalación manual
composer install
cp env.example .env
php artisan key:generate
touch database/fernandezbugna_jaureguialzo.sqlite
php artisan migrate
php artisan db:seed
php artisan serve
```

## 📁 ESTRUCTURA DE ARCHIVOS IMPORTANTES

```
├── app/
│   ├── Http/Controllers/
│   │   ├── Admin/          # Controladores del admin
│   │   ├── AuthController.php
│   │   ├── BlogController.php
│   │   ├── HomeController.php
│   │   ├── ProductsController.php
│   │   ├── RegisterController.php
│   │   └── UserController.php
│   ├── Http/Middleware/
│   │   └── AdminMiddleware.php
│   └── Models/
│       ├── BlogPost.php
│       ├── Order.php
│       ├── Product.php
│       └── User.php
├── database/
│   ├── migrations/         # Migraciones de BD
│   ├── seeders/           # Seeders de datos
│   └── fernandezbugna_jaureguialzo.sqlite
├── resources/views/
│   ├── admin/             # Vistas del admin
│   ├── auth/              # Vistas de autenticación
│   ├── blog/              # Vistas del blog
│   ├── components/        # Componentes Blade
│   ├── user/              # Vistas de usuario
│   └── home.blade.php
├── public/css/
│   └── app.css           # Estilos personalizados
├── README.md              # Documentación completa
├── install.sh             # Script de instalación
├── env.example            # Configuración de ejemplo
└── CHECKLIST.md           # Este archivo
```

## ✅ VERIFICACIÓN FINAL

### Antes de entregar, verificar:

1. **Base de datos**: El archivo debe llamarse exactamente `fernandezbugna_jaureguialzo.sqlite`
2. **Validación**: No debe haber atributos `required` en inputs HTML
3. **Accesibilidad**: Todas las imágenes deben tener `alt` y elementos interactivos `aria-label`
4. **Funcionalidad**: Probar login, registro, admin, blog, productos
5. **Documentación**: README.md debe estar completo y actualizado

### Comandos de verificación:

```bash
# Verificar que la base de datos existe
ls -la database/fernandezbugna_jaureguialzo.sqlite

# Verificar que no hay validación HTML
grep -r "required" resources/views/

# Verificar que hay atributos alt en imágenes
grep -r "alt=" resources/views/

# Verificar que hay aria-label en elementos interactivos
grep -r "aria-label" resources/views/

# Probar la aplicación
php artisan serve
```

## 🎯 PUNTOS CLAVE DE LA CONSIGNA

- ✅ **Nombre de BD**: `fernandezbugna_jaureguialzo` (apellido1_apellido2)
- ✅ **Sin validación HTML**: Solo validación del servidor
- ✅ **Autenticación personalizada**: Sin usar herramientas de Laravel
- ✅ **Middleware personalizado**: Para verificar administradores
- ✅ **ABM completo**: Para posts del blog
- ✅ **Relaciones entre tablas**: Implementadas correctamente
- ✅ **Seeders con datos**: Usuario con servicio contratado
- ✅ **HTML semántico**: Estructura correcta
- ✅ **CSS personalizado**: Estilos propios

## 📞 CONTACTO

**Alumnas:**
- Florencia Fernández Bugna
- Manuela Jaureguialzo

**Docente:**
- Victor Villafañe

**Materia:**
Portales y Comercios Electrónicos - 1° Cuatrimestre 2025 