// Scroll reveal js

// Common reveal options to create reveal animations
ScrollReveal({
    reset: false,
    distance: "60px",
    duration: 2500,
    delay: 100,
});

// Specify options to create reveal animations

ScrollReveal().reveal(
    "#main .overlay h1, .section-title-01, .section-title-02,#main .card .card-body h1",
    {
        delay: 500,
        origin: "left",
    }
);
ScrollReveal().reveal("#carousel", {
    delay: 400,
    origin: "bottom",
});
ScrollReveal().reveal(".main-card", {
    delay: 500,
    origin: "right",
});

ScrollReveal().reveal("#main .overlay p, #main .card .card-text p", {
    delay: 600,
    origin: "right",
});
ScrollReveal().reveal("#main .overlay .btn, #main .card .botones .btn ", {
    delay: 700,
    origin: "bottom",
});

ScrollReveal().reveal("#mapa .mapa img, .navbar-mountain-footer", {
    delay: 500,
    origin: "bottom",
});

ScrollReveal().reveal(
    "#eventos .card, #murales .card, #artistas .card-tarjeta",
    {
        delay: 800,
        interval: 200,
        origin: "bottom",
    }
);
ScrollReveal().reveal("#footer .footer-group", {
    delay: 500,
    interval: 200,
    origin: "top",
});

ScrollReveal().reveal(".navbar-brand-footer", {
    duration: 4000,
    rotate: {
        x: 1,
        y: 180,
    },
    distance: "0px",
});
