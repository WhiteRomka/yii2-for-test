document.addEventListener('DOMContentLoaded', function() {

    $(document).on('change', 'input[name="ContactForm[verifyCode]"]', function() {
        var value = $(this).val();

        $('button[name=contact-button]').after('<h1>'+value+'</h1>');
    });

   /*
    $('input[name="ContactForm[verifyCode]"]').on('change', function() {
        var value = $(this).val();

        $('button[name=contact-button]').after('<h1>'+value+'</h1>');
    });*/
});