document.addEventListener("DOMContentLoaded", function () {
  if (window.matchMedia("(min-width: 769px)").matches) {
    const serviceSlides = document.querySelectorAll(".dpr-service-slide");
    serviceSlides.forEach((slide) => {
      slide.addEventListener("mouseenter", function () {
        this.querySelector(".dpr-flex-about").style.opacity = "1";
      });

      slide.addEventListener("mouseleave", function () {
        this.querySelector(".dpr-flex-about").style.opacity = "0";
      });
    });
  }
});

document.addEventListener("DOMContentLoaded", function () {
  // Inicializa el carrusel de eventos
  new Swiper(".events-swiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
        slidesPerGroup: 1,
      },
      992: {
        slidesPerView: 3,
        slidesPerGroup: 1,
      },
    },
  });
});

document.addEventListener("DOMContentLoaded", function () {
  // Inicializa el carrusel de reseñas
  new Swiper(".reviews-swiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      768: {
        slidesPerView: 2,
        slidesPerGroup: 1,
      },
      992: {
        slidesPerView: 3,
        slidesPerGroup: 1,
      },
    },
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const toggleLinks = document.querySelectorAll(".view-more-toggle");

  toggleLinks.forEach((link) => {
    link.addEventListener("click", function (event) {
      event.preventDefault();
      const cardBody = this.closest(".card-body");
      const shortText = cardBody.querySelector(".review-text-content");
      const fullText = cardBody.querySelector(".review-text-full");

      if (shortText.classList.contains("d-none")) {
        // Si el texto completo está visible, lo ocultamos y mostramos el corto
        shortText.classList.remove("d-none");
        fullText.classList.add("d-none");
        this.textContent = "View more";
      } else {
        // Si el texto corto está visible, lo ocultamos y mostramos el completo
        shortText.classList.add("d-none");
        fullText.classList.remove("d-none");
        this.textContent = "Hide";
      }
    });
  });
});
