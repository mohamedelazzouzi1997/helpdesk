$(".close").click(function() {
    $(this)
        .parent(".alert")
        .fadeOut(1000);
});