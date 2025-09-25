<header class="header">
    <div class="header__top">
        <div class="header__top-container">
            <div class="header__contact">
                <a href="tel:+1234567890"><i class="fas fa-phone"></i> +123 456 7890</a>
                <a href="mailto:info@southwines.com"><i class="fas fa-envelope"></i> info@southwines.com</a>
            </div>
            <div class="header__social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>

    <div class="header__main">
        <div class="header__container">
            <div class="header__logo">
                <img src="<?php echo e(asset('img/Logo.png')); ?>?v=1.1" alt="South Wines Logo">
            </div>
                
            <nav class="header__nav">
                <ul class="header__menu">
                    <li class="header__menu-item">
                        <a href="<?php echo e(route('home')); ?>" class="header__link">Home</a>
                    </li>
                    <li class="header__menu-item">
                        <a href="<?php echo e(route('cursos')); ?>" class="header__link">Cursos</a>
                    </li>
                    <li class="header__menu-item">
                        <a href="<?php echo e(route('sobre-nosotros')); ?>" class="header__link">Sobre nosotros</a>
                    </li>
                </ul>
            </nav>  

            <div class="header__actions">
                <?php if(auth()->guard()->check()): ?>
                    <div class="user-profile">
                        <div class="user-profile__content">
                            <a href="#" id="view-photo" class="user-profile__photo-link">
                                <?php if(Auth::user()->photo): ?>
                                    <img src="<?php echo e(asset('storage/' . Auth::user()->photo)); ?>" alt="Foto de perfil" class="user-profile__photo">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('path/to/default/image.jpg')); ?>" alt="Foto de perfil por defecto" class="user-profile__photo">
                                <?php endif; ?>
                            </a>
                            <span class="user-profile__name"><?php echo e(Auth::user()->name); ?></span>
                            <a href="<?php echo e(route('profile.edit')); ?>" class="user-profile__edit">
                                <i class="fas fa-cog"></i>
                            </a>
                        </div>
                    </div>
                    <form action="<?php echo e(route('logout')); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="header__button">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view admin panel')): ?>
                    <a href="<?php echo e(route('panel-administrador')); ?>" class="header__button" title="Panel de Control">
                        <i class="fas fa-tachometer-alt"></i>
                    </a>
                    <?php endif; ?>
                <?php else: ?>
                    <a href="<?php echo e(route('login')); ?>" class="header__button">
                        <i class="fas fa-user"></i>
                        <span>Login</span>
                    </a>
                    <a href="<?php echo e(route('register')); ?>" class="header__button">
                        <i class="fas fa-user-plus"></i>
                        <span>Register</span>
                    </a>
                <?php endif; ?>
                <button class="header__toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</header>

<style>
.header__photo {
    width: 50px !important; /* Prueba con un tamaño diferente */
    height: 50px !important; /* Prueba con un tamaño diferente */
    border-radius: 50%; /* Para hacer la imagen circular */
    margin-left: 10px; /* Espaciado entre el nombre y la foto */
}

.header__username {
    display: inline-flex;
    align-items: center;
    background-color: #f0f0f0; /* Color de fondo del cuadrado */
    border-radius: 10px; /* Bordes redondeados */
    padding: 8px 12px; /* Espaciado interno */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animación suave */
}

.header__username:hover {
    transform: scale(1.05); /* Efecto de escala al pasar el ratón */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra al pasar el ratón */
}

.header__username a {
    text-decoration: none; /* Quita el subrayado del enlace */
    color: #333; /* Color del texto */
    font-size: 16px; /* Tamaño del texto */
    font-weight: 500; /* Grosor del texto */
    display: flex;
    align-items: center;
}

.user-profile {
    display: inline-flex;
    align-items: center;
    background-color: #f0f0f0; /* Color de fondo del cuadrado */
    border-radius: 10px; /* Bordes redondeados */
    padding: 8px; /* Espaciado interno reducido */
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animación suave */
}

.user-profile:hover {
    transform: scale(1.05); /* Efecto de escala al pasar el ratón */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Sombra al pasar el ratón */
}

.user-profile__content {
    display: flex;
    align-items: center;
    gap: 8px; /* Espacio entre la foto, el nombre y el ícono de editar */
}

.user-profile__photo-link {
    display: block;
    cursor: pointer; /* Cambia el cursor al pasar sobre la foto */
}

.user-profile__photo {
    width: 32px; /* Tamaño de la foto reducido */
    height: 32px; /* Tamaño de la foto reducido */
    border-radius: 50%; /* Foto circular */
    object-fit: cover; /* Asegura que la imagen cubra el espacio */
}

.user-profile__name {
    font-size: 14px; /* Tamaño del texto reducido */
    color: #333; /* Color del texto */
    font-weight: 500; /* Grosor del texto */
}

.user-profile__edit {
    text-decoration: none; /* Quita el subrayado del enlace */
    color: #8B0000; /* Cambia el color del ícono a rojo */
    font-size: 16px; /* Tamaño del ícono */
    transition: color 0.3s ease; /* Animación suave */
}

.user-profile__edit:hover {
    color: #8B0000; /* Cambia el color del ícono al pasar el ratón (rojo más oscuro) */
}

/* Estilos para el modal */
.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    z-index: 1000;
    justify-content: center;
    align-items: center;
}

.modal.active {
    display: flex;
}

.modal-content {
    background-color: white;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    position: relative;
}

.modal-content img {
    max-width: 100%;
    max-height: 80vh;
    border-radius: 10px;
}

.close-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
    color: #333;
}

.close-btn:hover {
    color: #8b0000;
}

.header__menu {
    display: flex;
    gap: 1.5rem;
    list-style: none;
    margin: 0;
    padding: 0;
}

.header__menu-item {
    position: relative;
    padding: 0.5rem 0;
}

.header__link {
    text-decoration: none;
    color: #333;
    font-size: 1.1rem;
    font-weight: 500;
    padding: 0.5rem 1rem;
    transition: all 0.3s ease;
    position: relative;
}

.header__link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    background: #8B0000;
    bottom: 0;
    left: 50%;
    transition: all 0.3s ease;
    transform: translateX(-50%);
}

.header__link:hover {
    color: #8B0000;
}

.header__link:hover::after {
    width: 100%;
}

.header__menu-item.active .header__link {
    color: #8B0000;
}

.header__menu-item.active .header__link::after {
    width: 100%;
}

.header__button {
    margin-right: 10px; /* Espacio entre los botones */
}


/* Header Top Section */
.header__top {
    background: var(--secondary-color);
    color: white;
    padding: 0.5rem 0;
    font-size: 0.9rem;
}

.header__top-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    padding: 0 1rem;
}

.header__contact a {
    color: white;
    text-decoration: none;
    margin-right: 1.5rem;
}

.header__social a {
    color: white;
    margin-left: 1rem;
    transition: var(--transition);
}

.header__social a:hover {
    color: var(--accent-color);
}

/* Main Header Section */
.header__main {
    background: white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    position: relative;
}

.header__container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 1rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.header__logo {
    height: 50px; /* Mantiene la altura del contenedor original */
    display: flex;
    align-items: center;
}

.header__logo img {
    height: 80px; /* Imagen más grande */
    width: auto;
    transform: scale(1.2); /* Escala la imagen sin afectar el espacio que ocupa */
    transform-origin: left center; /* Establece el punto de origen de la transformación */
}

/* Navigation Menu */
.header__menu {
    display: flex;
    list-style: none;
    gap: 2rem;
}

.header__menu-item {
    position: relative;
}

.header__link {
    color: var(--text-color);
    text-decoration: none;
    font-weight: 500;
    padding: 0.5rem 0;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: var(--transition);
}

.header__link:hover {
    color: var(--primary-color);
}

/* Submenu */
.header__submenu {
    position: absolute;
    top: 100%;
    left: 0;
    background: white;
    min-width: 200px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: var(--transition);
    border-radius: 4px;
    z-index: 100;
}

.header__menu-item--has-submenu:hover .header__submenu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.header__submenu a {
    padding: 0.75rem 1rem;
    display: block;
    color: var(--text-color);
    text-decoration: none;
    transition: var(--transition);
}

.header__submenu a:hover {
    background: var(--light-bg);
    color: var(--primary-color);
}

/* Actions Section */
.header__actions {
    display: flex;
    align-items: center;
    gap: 1.5rem;
}

.header__button {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.75rem 1.5rem;
    background: var(--primary-color);
    color: white;
    border-radius: 5px;
    text-decoration: none;
    transition: var(--transition);
}

.header__button:hover {
    background: var(--secondary-color);
    transform: translateY(-2px);
}

/* Eliminar o comentar estas clases */
/*.header__cart {
    position: relative;
    color: var(--text-color);
    text-decoration: none;
}

.header__cart-count {
    position: absolute;
    top: -8px;
    right: -8px;
    background: var(--primary-color);
    color: white;
    font-size: 0.75rem;
    padding: 0.25rem 0.5rem;
    border-radius: 50%;
}*/

/* Search */
.header__search {
    position: relative;
}

.header__search-btn {
    background: none;
    border: none;
    color: var(--text-color);
    cursor: pointer;
    font-size: 1.1rem;
}

.header__search-form {
    position: absolute;
    top: 100%;
    right: 0;
    background: white;
    padding: 1rem;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    display: none;
    border-radius: 4px;
}

.header__search-form input {
    padding: 0.5rem;
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 200px;
}

.header__search-form.active {
    display: block;
}

/* Mobile Menu Toggle */
.header__toggle {
    display: none;
}



/* Responsive Design */
@media (max-width: 992px) {
    .header__menu {
        gap: 1rem;
    }
}

@media (max-width: 768px) {
    .header__nav {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        padding: 1rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .header__nav.active {
        display: block;
    }

    .header__menu {
        flex-direction: column;
        gap: 0;
    }

    .header__menu-item {
        border-bottom: 1px solid #eee;
    }

    .header__submenu {
        position: static;
        opacity: 1;
        visibility: visible;
        transform: none;
        box-shadow: none;
        padding-left: 1rem;
    }

    .header__toggle {
        display: block;
        background: none;
        border: none;
        cursor: pointer;
    }

    .header__toggle span {
        display: block;
        width: 25px;
        height: 2px;
        background: var(--text-color);
        margin: 5px 0;
        transition: var(--transition);
    }

    .header__toggle.active span:nth-child(1) {
        transform: rotate(45deg) translate(5px, 5px);
    }

    .header__toggle.active span:nth-child(2) {
        opacity: 0;
    }

    .header__toggle.active span:nth-child(3) {
        transform: rotate(-45deg) translate(5px, -5px);
    }
}


</style>

<?php if(auth()->guard()->check()): ?>
    <!-- Modal para ver la foto -->
    <div class="modal" id="photo-modal">
        <div class="modal-content">
            <span class="close-btn" id="close-modal">&times;</span>
            <?php if(Auth::user()->photo): ?>
                <img src="<?php echo e(asset('storage/' . Auth::user()->photo)); ?>" alt="Foto de perfil">
            <?php else: ?>
                <img src="<?php echo e(asset('path/to/default/image.jpg')); ?>" alt="Foto de perfil por defecto">
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<script>
// Abrir el modal al hacer clic en "Ver foto de usuario"
document.getElementById('view-photo').addEventListener('click', function(event) {
    event.preventDefault(); // Evita que el enlace redirija
    document.getElementById('photo-modal').classList.add('active');
});

// Cerrar el modal al hacer clic en la "X"
document.getElementById('close-modal').addEventListener('click', function() {
    document.getElementById('photo-modal').classList.remove('active');
});

// Cerrar el modal al hacer clic fuera de la imagen
window.addEventListener('click', function(event) {
    if (event.target === document.getElementById('photo-modal')) {
        document.getElementById('photo-modal').classList.remove('active');
    }
});
</script><?php /**PATH C:\xampp\htdocs\SouthWines\resources\views/partials/header.blade.php ENDPATH**/ ?>