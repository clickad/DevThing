$(document).ready(function() {
    let bodyInput = $('#hidden-body-input').val();
    if(bodyInput != ""){
        $('#clickad-rtxte-input').html(bodyInput);
    }

    $('#new-post-submit').on('click', function(){
        let body = $('#clickad-rtxte-input').html();
        $('#hidden-body-input').val(body);
        $( "#newPostForm" ).submit();
    })
});
