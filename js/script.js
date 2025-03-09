let menu = document.querySelector('#menu-btn');
let navbar = document.querySelector('.header .navbar');

// Menú toggle
menu.onclick = () => {
    menu.classList.toggle('fa-times');
    navbar.classList.toggle('active');
};

// Cerrar menú al hacer scroll
window.onscroll = () => {
    menu.classList.remove('fa-times');
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
let loadMoreBtn = document.querySelector('.load-more-packges .btn'); // Botón "Leer más"
let boxes = document.querySelectorAll('.home-packages .box-container .box'); // Todos los paquetes
let currentItem = 3; // Número inicial de paquetes visibles

// Función de inicialización
const initializePackages = () => {
    boxes.forEach((box, index) => {
        box.style.display = index < currentItem ? 'inline-block' : 'none'; // Mostrar solo los primeros 3 paquetes
    });
    checkLoadMoreButton(); // Verificar si el botón debe estar visible
};

// Verificar si el botón "Leer más" debe ocultarse
const checkLoadMoreButton = () => {
    if (currentItem >= boxes.length) {
        loadMoreBtn.style.display = 'none'; // Ocultar el botón si no hay más paquetes
    }
};

// Lógica para cargar más paquetes al hacer clic en el botón
loadMoreBtn.onclick = () => {
    for (let i = currentItem; i < currentItem + 3; i++) {
        if (i < boxes.length) {
            boxes[i].style.display = 'inline-block'; // Mostrar los siguientes 3 paquetes
        }
    }
    currentItem += 3; // Incrementar el contador de paquetes visibles
    checkLoadMoreButton(); // Verificar el estado del botón después de mostrar más paquetes
};

// Ejecutar la inicialización cuando se cargue la página
window.addEventListener('load', initializePackages);
