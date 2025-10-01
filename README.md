# SouthWines 🍷

SouthWines es una aplicación web desarrollada en **Laravel** que tiene como objetivo la gestión de un negocio de vinos del sur.  
El sistema permite manejar la información de productos, usuarios y pedidos de forma sencilla y escalable.  

---

## 🚀 Tecnologías utilizadas

- **PHP 8+**  
- **Laravel** (Framework principal)  
- **MySQL** (Base de datos – dump incluido en `southwines.sql`)  
- **Composer** (Gestor de dependencias de PHP)  
- **Node.js & NPM** (para la gestión de assets)  
- **Tailwind CSS** (framework CSS)  
- **Vite** (compilación de assets)  

---

## 📂 Estructura del proyecto

- `app/` → Lógica principal de la aplicación (modelos, controladores, etc.)  
- `bootstrap/` → Archivos de inicio de la aplicación.  
- `config/` → Configuración de Laravel.  
- `database/` → Migraciones y seeds.  
- `public/` → Archivos accesibles públicamente (CSS, JS compilado, imágenes).  
- `resources/` → Vistas (Blade), archivos CSS y JS sin compilar.  
- `routes/` → Rutas de la aplicación (`web.php`, `api.php`).  
- `storage/` → Archivos generados por Laravel (logs, caché, etc.).  
- `tests/` → Pruebas automatizadas.  
- `southwines.sql` → Script de la base de datos.  

---

## ✨ Funcionalidades principales

- **Gestión de productos**  
  - Alta, baja, modificación y listado de vinos disponibles.  
- **Gestión de usuarios**  
  - Registro de clientes.  
  - Inicio de sesión y autenticación.  
  - Perfiles de usuario.  
- **Carrito de compras**  
  - Añadir vinos al carrito.  
  - Finalizar compra.  
- **Gestión de pedidos**  
  - Creación y seguimiento de pedidos.  
- **Panel de administración**  
  - Control de inventario.  
  - Gestión de clientes y pedidos.  
- **Interfaz moderna y responsiva** gracias a **Tailwind CSS** y **Vite**.  

---

## 📌 Notas adicionales

- El archivo `southwines.sql` contiene la estructura y datos iniciales de la base de datos.  
- El proyecto está preparado para funcionar tanto en entornos de desarrollo como de producción.  
- Se recomienda configurar correctamente el `.env` con las credenciales de tu servidor.  

---

## 👨‍💻 Autor

Proyecto desarrollado como parte de una práctica académica/profesional.  
