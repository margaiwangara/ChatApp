window.onload = function()
{
    //var owner = document.getElementById("").value;
    var widget = document.getElementById("message");

    var statusInterval = widget.addEventListener('keydown',statusListener);

    function statusListener()
    {
        var guest = document.getElementById("message-receiver").value;

        $.ajax({
            url:'status.php',
            type:'GET',
            dataType:'html',
            data:{'guest':guest},

            success:function(data)
            {
                alert(data);
            },
            error:function(xhr,ajaxOptions,thrownError)
            {
                alert(xhr.status);
            }
        });
    }

    //interval
    this.setInterval(statusInterval,5000);
}