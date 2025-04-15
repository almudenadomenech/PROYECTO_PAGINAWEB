// Hacer toggle del dropdown (necesario que esté en el ámbito global)
function toggleDropdown(event) {
    event.stopPropagation(); // Evita que se cierre inmediatamente al hacer clic
    let dropdown = document.getElementById('dropdown-menu');
    dropdown.classList.toggle('show');
}

// Cerrar el menú desplegable al hacer clic fuera (también fuera del DOMContentLoaded)
document.addEventListener('click', function (event) {
    let dropdown = document.getElementById('dropdown-menu');
    if (dropdown && dropdown.classList.contains('show')) {
        if (!event.target.closest('.profile-dropdown')) {
            dropdown.classList.remove('show');
        }
    }
});

document.addEventListener('DOMContentLoaded', function () {
    // Menú Toggle (hamburguesa)
    let menuBtn = document.querySelector('#menu-btn');
    let navbar = document.querySelector('.header .navbar');

    menuBtn.onclick = () => {
        menuBtn.classList.toggle('fa-times');
        navbar.classList.toggle('active');
    };

    // Cerrar el menú al hacer scroll
    window.onscroll = () => {
        menuBtn.classList.remove('fa-times');
        navbar.classList.remove('active');
    };

    // Verifica si Swiper está cargado
    if (typeof Swiper !== 'undefined') {
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
    }

    // Lógica para los paquetes dinámicos
    let loadMoreBtn = document.querySelector('.load-more-packages .btn');
    let boxes = document.querySelectorAll('.packages .box-container .box');
    let currentItem = 3;

    const initializePackages = () => {
        boxes.forEach((box, index) => {
            if (index < currentItem) {
                box.style.display = 'inline-block';
            } else {
                box.style.display = 'none';
            }
        });
        checkLoadMoreButton();
    };

    const checkLoadMoreButton = () => {
        if (currentItem >= boxes.length) {
            loadMoreBtn.style.display = 'none';
        } else {
            loadMoreBtn.style.display = 'inline-block';
        }
    };

    if (loadMoreBtn) {
        loadMoreBtn.onclick = () => {
            currentItem += 3;
            initializePackages();
        };
    }

    window.addEventListener('load', initializePackages);

    // Cerrar modal de reserva
    function closeModal() {
        const modal = document.getElementById('modal-message');
        const overlay = document.getElementById('modal-overlay');
        if (modal) modal.style.display = 'none';
        if (overlay) overlay.style.display = 'none';
    }
});
