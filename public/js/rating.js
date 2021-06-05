    $(function(ready){
        $('#addStar').change(function() {
            $(this).submit();
        });
    });

    $( document ).ready(function() {
        value=parseInt(document.getElementById("rating-hidden").value);
        idName="star-"+value;
        document.getElementById(idName).checked = true;
    });