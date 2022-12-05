
var swiper = new Swiper(".mySwiper", {
    navigation:{
        nextEl: '.swiper-button-next', prevEl: '.swiper-button-prev'
    },
    slidesPerView:2,
    spaceBetween:0,


    breakpoints:{


        320:{
            slidesPerView:2.2,
            spaceBetween:0,
        },

        360:{
            slidesPerView:2.2,
            spaceBetween:0,
        },
        680:{
            slidesPerView:3.2,
            spaceBetween:10,
        },
        920:{
            slidesPerView:4,
            spaceBetween:10,
        },
        1240:{
            slidesPerView:3.5,
            spaceBetween:50,
        },
    }

});
