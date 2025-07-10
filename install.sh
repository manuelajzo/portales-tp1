#!/bin/bash

echo "🚀 Instalando Magia Potagia..."
echo "================================"

# Verificar si PHP está instalado
if ! command -v php &> /dev/null; then
    echo "❌ Error: PHP no está instalado. Por favor instala PHP 8.1 o superior."
    exit 1
fi

# Verificar si Composer está instalado
if ! command -v composer &> /dev/null; then
    echo "❌ Error: Composer no está instalado. Por favor instala Composer."
    exit 1
fi

echo "✅ PHP y Composer encontrados"

# Instalar dependencias de PHP
echo "📦 Instalando dependencias de PHP..."
composer install

# Instalar dependencias de Node.js si existe package.json
if [ -f "package.json" ]; then
    echo "📦 Instalando dependencias de Node.js..."
    npm install
fi

# Crear archivo .env si no existe
if [ ! -f ".env" ]; then
    echo "⚙️  Creando archivo .env..."
    cp .env.example .env
    echo "✅ Archivo .env creado"
else
    echo "✅ Archivo .env ya existe"
fi

# Generar clave de aplicación
echo "🔑 Generando clave de aplicación..."
php artisan key:generate

# Crear base de datos
echo "🗄️  Creando base de datos..."
touch database/fernandezbugna_jaureguialzo.sqlite

# Ejecutar migraciones
echo "🔄 Ejecutando migraciones..."
php artisan migrate

# Ejecutar seeders
echo "🌱 Ejecutando seeders..."
php artisan db:seed

# Limpiar cache
echo "🧹 Limpiando cache..."
php artisan cache:clear
php artisan config:clear
php artisan view:clear

echo ""
echo "🎉 ¡Instalación completada!"
echo "================================"
echo ""
echo "📋 Credenciales de acceso:"
echo "   Admin: admin@mail.com / admin123"
echo "   Usuario: user@mail.com / user123"
echo ""
echo "🚀 Para iniciar el servidor:"
echo "   php artisan serve"
echo ""
echo "🌐 El sitio estará disponible en: http://localhost:8000"
echo ""
echo "📝 Notas importantes:"
echo "   - La base de datos se llama: fernandezbugna_jaureguialzo.sqlite"
echo "   - No se usa validación HTML, solo validación del servidor"
echo "   - Sistema de autenticación completamente personalizado"
echo "" 