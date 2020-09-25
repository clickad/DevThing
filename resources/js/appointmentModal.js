$(document).ready(function() {
    $('#calendarModal').on('show.bs.modal', function(e) {
        let button = $(e.relatedTarget);
        let dateInput = $('#dateInput');
        let date = button.data('date');
        dateInput.val(date);
    })

    $('#appointmentEditModal').on('show.bs.modal', function(e) {
        let button = $(e.relatedTarget);
        let form = $("#appointmentEditForm");
        let hours = $('#hoursInput');
        let minutes = $('#minutesInput');
        let description = $('#descriptionInput');
        let id = button.data('id');
        let time = button.data('time');
        let h = time == null ? "" : time.split(":")[0];
        let m = time == null ? "" : time.split(":")[1];
        let desc = button.data('description');
        hours.val(h);
        minutes.val(m);
        description.val(desc);
        form.attr("action", "calendar/"+id);
    })
});
