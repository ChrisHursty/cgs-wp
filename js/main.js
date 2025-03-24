// main.js
document.addEventListener('DOMContentLoaded', function () {
    const menuToggle = document.querySelector('.menu-toggle');
    const menuClose = document.querySelector('.menu-close');
    const siteNavigation = document.getElementById('site-navigation');

    // Function to toggle the menu
    function toggleMenu() {
        siteNavigation.classList.toggle('toggled');
        const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
        menuToggle.setAttribute('aria-expanded', !isExpanded);
    }

    // Event listeners
    menuToggle.addEventListener('click', toggleMenu);
    menuClose.addEventListener('click', toggleMenu);

    // Portfolio Grid Click Event
    const portfolioItems = document.querySelectorAll('.portfolio-item');

    portfolioItems.forEach(item => {
        item.addEventListener('click', function() {
            const overlay = this.querySelector('.portfolio-overlay');
            overlay.classList.toggle('is-active');
        });
    });
});

// Testimonials Home Page Video
document.addEventListener('DOMContentLoaded', function() {
    const playIcons = document.querySelectorAll('.play-icon');

    playIcons.forEach(function(icon) {
        icon.addEventListener('click', function() {
            const video = this.nextElementSibling; // The video element
            video.style.display = 'block'; // Show the video
            video.play(); // Play the video
            this.style.display = 'none'; // Hide the play button
        });
    });
});

// Home Page Gallery
document.addEventListener("DOMContentLoaded", function() {
    // Open modal on card click
    const cards = document.querySelectorAll(".cgs-card");
    cards.forEach(card => {
        card.addEventListener("click", () => {
            const modalId = card.getAttribute("data-modal");
            const modal = document.getElementById(modalId);
            if(modal) {
            modal.classList.add("active");
            }
        });
    });
  
    // Close modal on close button or overlay click
    const modalCloseTriggers = document.querySelectorAll("[data-close]");
    modalCloseTriggers.forEach(trigger => {
        trigger.addEventListener("click", () => {
            const modalId = trigger.getAttribute("data-close");
            const modal = document.getElementById(modalId);
            if(modal) {
            modal.classList.remove("active");
            }
        });
    });
});  

// FAQ's
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(function(item) {
        const question = item.querySelector('.faq-question');

        question.addEventListener('click', function() {
            // Close any open FAQ
            faqItems.forEach(function(faq) {
                if (faq !== item && faq.classList.contains('open')) {
                    faq.classList.remove('open');
                    faq.querySelector('.faq-answer').style.display = 'none';
                    faq.querySelector('.faq-question i').classList.replace('fa-minus', 'fa-plus');
                }
            });

            // Toggle current FAQ
            if (item.classList.contains('open')) {
                item.classList.remove('open');
                item.querySelector('.faq-answer').style.display = 'none';
                item.querySelector('.faq-question i').classList.replace('fa-minus', 'fa-plus');
            } else {
                item.classList.add('open');
                item.querySelector('.faq-answer').style.display = 'block';
                item.querySelector('.faq-question i').classList.replace('fa-plus', 'fa-minus');
            }
        });
    });
});


// Owl Carousels
jQuery(document).ready(function($) {
    // Companies Slider
    $('.logo-carousel').owlCarousel({
        loop: true,
        margin: 40,
        nav: false,
        dots: false,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 5
            }
        },
        slideBy: 2,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true
    });
});


jQuery(document).ready(function($) {
    $('.my-hero-slider').owlCarousel({
      items: 1,               // Default is 1 slide at a time
      loop: true,             // Loop back to the first slide
      nav: false,             // No next/prev arrows
      dots: true,             // Display dot navigation
      autoplay: true,         // Auto-advance slides
      autoplayTimeout: 5000,  // 5 seconds
      autoplayHoverPause: false,
      // Make sure Owl uses these breakpoints:
      responsiveClass: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    });
  });
  
