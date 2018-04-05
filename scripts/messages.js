$(document).ready(function()
{
    var polling = function(){
        $.ajax({
            url:'receivemessage.php',
            dataType:'json',

            success:function(data)
            {
                
                var sender = data.sender;
                var receiver = data.receiver;
                var message = data.message;

                alert(sender);
                for(var i=0;i<message.Length;i++)
                {
                    $("#user_messages").html("<tr><th>"+sender[i]+"</th><th>"+receiver[i]+"</th></tr><tr><td>"+message[i]+"</td></tr>")
                }
            },
            error: function (xhr, ajaxOptions, thrownError)
            {
                alert(xhr.status);
            }
        });
    }

    setInterval(polling,100);
});