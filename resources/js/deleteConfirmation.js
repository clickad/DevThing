$(document).ready(function() {
    $('#confirmModal').on('show.bs.modal', function(e) {
        let button = $(e.relatedTarget);
        let delBtn = $('#del-btn');
        let form = button[0].parentNode;
        let span = $('#type-text');
        let type = button.data('type') == 'parentcat' ? 'category' : button.data('type');
        span.text(type);
        delBtn.on('click', () => {
            form.submit();
        })
    })
});
