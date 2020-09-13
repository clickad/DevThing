$(document).ready(function() {
    $('#calendarModal').on('show.bs.modal', function(e) {
        let button = $(e.relatedTarget);
        let dateInput = $('#dateInput');
        let date = button.data('date');
        dateInput.val(date);
    })
});
