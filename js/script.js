let menuBtn = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

// Menú toggle (hamburguesa)
menuBtn.onclick = () => {
    menuBtn.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

// Cerrar el menú al hacer scroll
window.onscroll = () => {
    menuBtn.classList.remove('fa-times');
    navbar.classList.remove('active');
};

// Configuración de Swiper
new Swiper(".home-slider", {
    loop: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

new Swiper(".reviews-slider", {
    loop: true,
    spaceBetween: 20,
    autoHeight: true,
    grabCursor: true,
    breakpoints: {
        640: { slidesPerView: 1 },
        768: { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
    },
});

// Lógica para los paquetes dinámicos
let loadMoreBtn = document.querySelector('.load-more-packages .btn'); // Botón "Leer más"
let boxes = document.querySelectorAll('.packages .box-container .box'); // Todos los paquetes

let currentItem = 3; // Número inicial de paquetes visibles

// Función para inicializar los paquetes y mostrar los primeros 3
const initializePackages = () => {
    boxes.forEach((box, index) => {
        // Solo mostrar los primeros 3 paquetes
        box.style.display = index < currentItem ? 'inline-block' : 'none'; // Mostrar solo los primeros 3 paquetes
    });
    checkLoadMoreButton(); // Verificar si el botón debe estar visible
};

// Verificar si el botón "Leer más" debe estar visible o no
const checkLoadMoreButton = () => {
    if (currentItem >= boxes.length) {
        loadMoreBtn.style.display = 'none'; // Ocultar el botón si no hay más paquetes
    } else {
        loadMoreBtn.style.display = 'inline-block'; // Mostrar el botón si hay más paquetes
    }
};

// Lógica para cargar más paquetes cuando se haga clic en "Leer más"
loadMoreBtn.onclick = () => {
    let nextItems = currentItem + 3; // Cargar 3 más paquetes
    boxes.forEach((box, index) => {
        if (index < nextItems) {
            box.style.display = 'inline-block'; // Mostrar los siguientes 3 paquetes
        }
    });

    currentItem = nextItems; // Actualizar el contador de paquetes visibles
    checkLoadMoreButton(); // Verificar el estado del botón después de mostrar más paquetes
};

// Ejecutar la inicialización cuando se cargue la página
window.addEventListener('load', initializePackages);

// Función para alternar el menú desplegable del perfil
function toggleDropdown() {
    let dropdown = document.getElementById('dropdown-menu');
    dropdown.classList.toggle('show');
}

// Cerrar el menú desplegable al hacer clic fuera de él
window.onclick = function(event) {
    let dropdown = document.getElementById('dropdown-menu');
    // Si el clic no es dentro del perfil o del menú desplegable, lo cerramos
    if (!event.target.matches('.profile-photo') && !event.target.matches('#dropdown-menu') && !event.target.matches('.dropdown-content')) {
        if (dropdown.classList.contains('show')) {
            dropdown.classList.remove('show');
        }
    }
};

// Cerrar modal de reserva
function closeModal() {
    const modal = document.getElementById('modal-message');
    const overlay = document.getElementById('modal-overlay');

    if (modal) modal.style.display = 'none';
    if (overlay) overlay.style.display = 'none';
}





