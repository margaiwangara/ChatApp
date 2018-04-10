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
                if(data == 1)
                    $("#message").val("");
                else
                    $(".error_mess").html("Message not sent due a technical error. Please try again later");
            },
            error: function (xhr, ajaxOptions, thrownError)
            {
                alert(xhr.status);
            }
        });
    });

    
});