$(document).ready(function()
{
    var polling = function(){
        $.ajax({
            url:'receivemessage.php',
            dataType:'json',

            success:function(data)
            {
                //sender = [];
                var sender = data.sender;
                var receiver = data.receiver;
                var message = data.message;

                //alert(sender);
                for(var i=0;i<10;i++)
                {
                    $("#user_messages").html("<tr><th>"+data.sender+"</th><th>"+data.receiver+"</th></tr><tr><td>"+data.message+"</td></tr>")
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