$(".close").click(function() {
    $(this)
        .parent(".alert")
        .fadeOut(100);
});