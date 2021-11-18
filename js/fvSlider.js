export default function () {
    const swiper = new Swiper('.swiper', {
        autoplay:{
            delay: 5000,
        },
        loop: true,

        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },
    });
};