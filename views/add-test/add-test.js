function save()
{
    var form = $('form').serialize();

    $.post('../../service/test/saveTest.php', form)
    .done(function(data)
    {
        alert('Test successful saved!');
    });

}

$(document).ready(function(){
    var id = getUrlParameter('id');
    if(id)
    {
        $.get('../../service/test/saveTest.php?id=' + id, function(data)
        {
            $( ".result" ).html( data );
        });
    }
});