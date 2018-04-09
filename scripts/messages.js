$(document).ready(function()
{
    var polling = function(){
        $.ajax({
            url:'receivemessage.php',
            dataType:'json',

            success:function(data)
            {
                sender = [];
                var sender = data.sender;
                var receiver = data.receiver;
                var message = data.message;

                var holder;
                $.each(message,function(key,value)
                {
                    holder += "<tr><th>" + sender[key] + "</th><th>" + receiver[key] + "</th></tr><tr><td>" + value + "</td></tr>"
                    $("#user_messages").html(holder);
                    //alert(value+" "+sender[key]+" "+receiver[key]);
                });
                //alert(sender);
                //for(var i=0;i<10;i++)
                //{
                //    $("#user_messages").html("<tr><th>"+sender[i]+"</th><th>"+receiver[i]+"</th></tr><tr><td>"+message[i]+"</td></tr>")
                //}
            },
            error: function (xhr, ajaxOptions, thrownError)
            {
                alert(xhr.status);
            }
        });
    }

    //setInterval(polling,100);
});