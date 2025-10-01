# SouthWines 🍷

SouthWines es una aplicación web desarrollada en **Laravel** enfocada en la **formación en cata de vinos**.  
El sistema está diseñado para ofrecer cursos de cata, gestionar inscripciones de alumnos y facilitar la interacción entre usuarios y administradores.  

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

- **Gestión de cursos**  
  - Creación, edición y eliminación de cursos de cata de vinos.  
  - Detalle de cada curso con temario, duración y precio.  

- **Gestión de usuarios**  
  - Registro y autenticación de alumnos.  
  - Perfiles personales con historial de cursos.  

- **Inscripción a cursos**  
  - Los usuarios pueden apuntarse a los cursos disponibles.  
  - Confirmación de plazas y seguimiento de inscripciones.  

- **Panel de administración**  
  - Control de cursos ofrecidos.  
  - Gestión de alumnos y sus inscripciones.  

- **Interfaz moderna y responsiva**  
  - Diseñada con **Tailwind CSS** y gestionada con **Vite** para una experiencia fluida en dispositivos móviles y escritorio.  

---

## 📌 Notas adicionales

- El archivo `southwines.sql` contiene la estructura y datos iniciales de la base de datos.  
- El proyecto está preparado para funcionar tanto en entornos de desarrollo como de producción.  
- Se recomienda configurar correctamente el `.env` con las credenciales de tu servidor.  

---

## 👨‍💻 Autor

Proyecto desarrollado como parte de una práctica académica/profesional.  

