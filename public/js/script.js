$(document).ready(function () {
    function readURL(input, target) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(target).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("input.img_upload").on('change', function () {
        var target = $(this).data('target');
        readURL(this, target);
    });
});