
// Eliminar obra de favoritos

$(document).ready(function () {
    $(".wishlist-remove-btn").click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var Clickedthis = $(this);
        var wishlist_id = $(Clickedthis)
            .closest(".wishlist-content")
            .find(".wishlist_id")
            .val();
        // alert(wishlist_id);

        $.ajax({
            method: "POST",
            url: "/remove-from-wishlist",
            data: {
                wishlist_id: wishlist_id,
            },
            success: function (response) {
                $(Clickedthis).closest('.wishlist-content').remove();
                Swal.fire(
                    {
                        title: 'Borrado!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500,
                        text: response.status,
                    }
                );
            },
        });
    });

//Agregar obra a la galeria de favoritos

    $(".add-to-whishlist-btn").click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var obra_id = $(this).closest(".product_data").find(".obra_id").val();
        // alert(obra_id);

        $.ajax({
            method: "POST",
            url: "/add-wishlist",
            data: {
                obra_id: obra_id,
            },
            success: function (response) {
                Swal.fire({
                    title: "Se agrego a favoritos",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500,
                    text: response.status,
                });
            },
        });
    });


    // Agregar evento a favorito
    $(".add-to-whishlist-btn-event").click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var event_id = $(this).closest(".product_data").find(".event_id").val();
        // alert(event_id);

        $.ajax({
            method: "POST",
            url: "/add-wishlist-event",
            data: {
                event_id: event_id,
            },
            success: function (response) {
                Swal.fire({
                    title: "Se agrego a favoritos",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500,
                    text: response.status,
                });
            },
        });
    });

//Eliminar evento de favorito
    $(".wishlist-remove-btn-event").click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var Clickedthis = $(this);
        var wishlistevent_id = $(Clickedthis)
            .closest(".wishlist-content")
            .find(".wishlistevent_id")
            .val();
        // alert(wishlistevent_id);

        $.ajax({
            method: "POST",
            url: "/remove-from-wishlist-event",
            data: {
                wishlistevent_id: wishlistevent_id,
            },
            success: function (response) {
                $(Clickedthis).closest('.wishlist-content').remove();
                Swal.fire(
                    {
                        title: 'Borrado!',
                        icon: 'success',
                        showConfirmButton: false,
                        timer: 1500,
                        text: response.status,
                    }
                );
            },
        });
    });



    // Agregar mural a favoritos


    $(".add-to-whishlist-btn-mural").click(function (e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        var mural_id = $(this).closest(".product_data").find(".mural_id").val();
        // alert(mural_id);

        $.ajax({
            method: "POST",

            url: "/add-wishlist-mural",
            data: {
                mural_id: mural_id,
            },
            success: function (response) {
                Swal.fire({
                    title: "Se agrego a favoritos",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 1500,
                    text: response.status,
                });
            },
        });
    });



    //Eliminar mural de favoritos
$(".wishlist-remove-btn-mural").click(function (e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var Clickedthis = $(this);
    var wishlistmural_id = $(Clickedthis)
        .closest(".wishlist-content")
        .find(".wishlistmural_id")
        .val();
    // alert(wishlistmural_id);

    $.ajax({
        method: "POST",
        url: "/remove-from-wishlist-mural",
        data: {
            wishlistmural_id: wishlistmural_id,
        },
        success: function (response) {
            $(Clickedthis).closest('.wishlist-content').remove();
            Swal.fire(
                {
                    title: 'Borrado!',
                    icon: 'success',
                    showConfirmButton: false,
                    timer: 1500,
                    text: response.status,
                }
            );
        },
    });
});

});
