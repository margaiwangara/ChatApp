$(document).ready(function()
{
    $("#messagesubmit").on('click',function(e)
    {
        e.preventDefault();
        
        $.ajax({
            url:'sendmessage.php',
            type:'POST',
            dataType:'html',
            data: $("#message-form").serialize(),

            success:function(data)
            {
                alert(data);
            },
            error: function (xhr, ajaxOptions, thrownError)
            {
                alert(xhr.status);
            }
        });
    });

    
});