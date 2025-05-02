// Inisialisasi Swiper
document.addEventListener('DOMContentLoaded', function () {
    let effectType = 'fade'; // Default: fade
    let swiper = initializeSwiper(effectType);
    let resetEffectTimeout;

    function initializeSwiper(effect) {
        return new Swiper('.mySwiper', {
            loop: true,
            autoplay: {
                delay: 3000, // 3 detik per slide
                disableOnInteraction: false,
            },
            speed: 800, // Kecepatan transisi
            effect: effect, // Efek awal
            fadeEffect: {
                crossFade: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }

    function changeEffect(newEffect, temporary = false) {
        if (effectType !== newEffect) {
            effectType = newEffect;
            swiper.destroy(true, true);
            swiper = initializeSwiper(effectType);

            // Jika efek slide digunakan dari navigasi, atur ulang ke fade setelah beberapa waktu
            if (temporary) {
                if (resetEffectTimeout) clearTimeout(resetEffectTimeout);
                resetEffectTimeout = setTimeout(() => {
                    changeEffect('fade');
                }, 4000); // Kembali ke fade setelah 4 detik
            }
        }
    }

    // Saat tombol navigasi diklik, ubah efek menjadi slide
    document.querySelector('.swiper-button-next').addEventListener('click', function () {
        changeEffect('slide', true);
    });

    document.querySelector('.swiper-button-prev').addEventListener('click', function () {
        changeEffect('slide', true);
    });

    // Saat pagination diklik atau autoplay berjalan, kembali ke fade
    document.querySelector('.swiper-pagination').addEventListener('click', function () {
        changeEffect('slide', true);
    });

    swiper.on('slideChange', function () {
        if (swiper.autoplay.running) {
            changeEffect('fade');
        }
    });
});