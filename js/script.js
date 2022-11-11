$(function(){
    $('a').click(function(){
        var id = $(this).attr('data-id');
        var jqxhr = $.ajax({
            type: 'POST',
            url: 'check.php',
            data: {id:id},
        })
    });
});

