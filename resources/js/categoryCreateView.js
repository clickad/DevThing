
$(document).ready(function() {

    let $type = $('.category-type');
    let $typeChecked = $('.category-type:checked');
    let $select = $('.category-select');

    $typeChecked.val() == undefined ? $select.hide() : $typeChecked.val() == 0 ? $select.hide() : $select.show();
    $type.on('change', function(){
        this.value == 1 ? $select.show() : $select.hide();
    })
});
