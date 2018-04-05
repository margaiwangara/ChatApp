$(document).ready(function()
{
    $("#").on('click',function(e)
    {
        e.preventDefault();
        
        $.ajax({
            url:'',
            type:'POST',
            dataType:'json',
            data:$("#").serialize(),

            success:function(data)
            {

            },
            error:function(x, y, z)
            {
                
            }

        });
    });
});