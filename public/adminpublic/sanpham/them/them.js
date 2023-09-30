$('#mySelect').select2({
    tags: true,
    tokenSeparators: [',']
});
$(document).ready(function() {
    $("#mycontent").summernote({
        height: 200
    });
    $('.dropdown-toggle').dropdown();
});

