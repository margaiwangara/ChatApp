$(document).ready(function()
{

    var polling = function(){
        $.ajax({
            url:'receivemessage.php',
            dataType:'json',
            type: 'GET',
            data: { 'id': $('#message-receiver').val() },
            success:function(data)
            {
                //sender = [];
                var sender = data.sender;
                var receiver = data.receiver;
                var message = data.message;
                var user = data.user;
                var created_at = data.created_at;

                if(message != "")
                {
                    var holder = "";
                    $.each(message, function (key, value) {
                            if(sender[key].toLowerCase() == user)
                                holder += "<div class='alert alert-success'><ul class='text-right' style='list-style-type:none;display:block;margin:0;padding:0;color:black;font-family:cambria;'><li><strong>" + sender[key] + "</strong></li><li>" + value + "</li><li class='text-muted' style='font-size:10px;'>" + created_at[key] + "</li></ul></div>";
                            else
                                holder += "<div class='alert alert-danger'><ul style='list-style-type:none;display:block;margin:0;padding:0;color:black;font-family:cambria;'><li><strong>" + sender[key] + "</strong></li></li>" + value + "</li><li class='text-muted' style='font-size:10px;'>" + created_at[key] + "</li></ul></div>";
                        //alert(value+" "+sender[key]+" "+receiver[key]);
                    });

                    $("#message-display").html(holder);
                }
                else
                    $("#message-display").html("<span class='text-muted'>There are no messages to display</span>");
                
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

    setInterval(polling,1000);
});