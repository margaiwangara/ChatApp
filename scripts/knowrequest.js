$(document).ready(function()
{
    $(".known-button").on('click',function(e)
    {
        e.preventDefault();
        alert($("input[name='guest_id']").val());
       alert("This is a button");
    });
});