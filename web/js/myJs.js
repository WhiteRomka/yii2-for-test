$(document).ready(function(){
    $('#myBtn').on('click', function(e){

        var form = $('.myForm').serializeArray();
        console.log(form);
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '/site/ajax',

            data: form,
            // js вариант 2
            //data: 'comment=cc1&email=ee1&name=retregre',
            // js вариант 3
            //data: {comment: 'retret fdfds'},

            success: function(data) {
                console.log(data);
                $('#eml').html(data['model']['email']);
                $('#comm').html(data.model.comment);
            }
        });
    });
});
