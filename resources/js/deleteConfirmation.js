$(document).ready(function() {
    $('#confirmModal').on('show.bs.modal', function(e) {
        let button = $(e.relatedTarget);
        let delBtn = $('#del-btn');
        let span = $('#type-text');
        let type = button.data('type') == 'parentcat' ? 'category' : button.data('type');
        let form = type == "Appointment" ? button[0].parentNode.parentNode : button[0].parentNode;
        span.text(type);
        delBtn.on('click', () => {
            form.submit();
        })
    })
});
