$(document).ready(function(){
    let switcher=document.getElementById('content_switcher');
    $(".second-content").hide();
$(document).on('change', '#content_switcher', function (event) {
    event.preventDefault();
    if(switcher.checked==true)
    {
        $(".first-content").hide();
        $(".second-content").show();
    }
    else{
        $(".second-content").hide();
        $(".first-content").show();
    }
    })
});