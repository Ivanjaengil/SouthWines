# SouthWines 🍷

SouthWines es una aplicación web desarrollada en **Laravel** que tiene como objetivo la gestión de un negocio de vinos del sur. El sistema permite manejar la información de productos, usuarios y pedidos de forma sencilla y escalable.  

## 🚀 Tecnologías utilizadas

- **PHP 8+**  
- **Laravel** (Framework principal)  
- **MySQL** (Base de datos – dump incluido en `southwines.sql`)  
- **Composer** (Gestor de dependencias de PHP)  
- **Node.js & NPM** (para la gestión de assets)  
- **Tailwind CSS** (framework CSS)  
- **Vite** (compilación de assets)  

## 📂 Estructura del proyecto

- `app/` → Lógica principal de la aplicación (modelos, controladores, etc.)  
- `database/` → Migraciones y seeds.  
- `resources/` → Vistas (Blade), archivos CSS y JS.  
- `routes/` → Rutas de la aplicación (`web.php`, `api.php`).  
- `public/` → Archivos accesibles públicamente (CSS, JS compilado, imágenes).  
- `southwines.sql` → Script de la base de datos.  

## ⚙️ Requisitos previos

Antes de instalar el proyecto, asegúrate de tener:  

- PHP >= 8.0  
- Composer  
- MySQL  
- Node.js + NPM  

## 🛠️ Instalación y ejecución

1. Clona este repositorio o descomprime el archivo.  
   ```bash
   git clone <URL-del-repo>
   cd SouthWines
