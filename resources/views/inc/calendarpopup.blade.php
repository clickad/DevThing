<!-- Modal -->
<div class="modal fade" id="calendarModal"
    tabindex="-1" role="dialog" aria-labelledby="calendarModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="calendarModalLabel">New Termin</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            {!! Form::open(['action' => 'CalendarController@store', 'method' => 'POST', 'id' => 'newTerminForm']) !!}
                <div class="modal-body">
                    {{Form::hidden('date', '', ['id' => 'dateInput'])}}
                    <div class="form-group">
                        {{Form::text('time', '', ['class' => 'form-control', 'placeholder' => 'Time'])}}
                    </div>
                    <div class="form-group">
                        {{Form::textarea('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
                    </div>

                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary" id="cal-save-btn">Save</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
