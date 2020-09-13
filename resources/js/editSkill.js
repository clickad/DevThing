$(document).ready(function() {

    $('.edit-skill').on('click', function(event){
        switchForm({"pointer-events": "none", "background-color":"#eee", "color":"#ccc"}, true, 'skill-show', 'edit-form');
    })

    $('.cancel-skill-edit').on('click', function(event){
        switchForm({"pointer-events": "auto", "background-color":"#fff", "color":"#000"}, false, 'edit-form', 'skill-show');
    })

    function switchForm( css, btn, parent, show){
        $(".skill-item").css(css);
        $('.edit-skill, .del-skill-btn').prop("disabled", btn);
        let $parent = $(event.target.closest('.'+parent));
        let $parentParent = $(event.target.closest('.skill-item'));
        $parentParent.css({"pointer-events": "auto", "background-color":"#fff", "color":"#000"});
        $parent.hide();
        $parentParent.find('.'+show).show();
    }

});

