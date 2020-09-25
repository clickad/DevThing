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
                    <div class="row mb-2">
                        <div class="col">
                            {{Form::select('hours', array("01"=>"01","02"=>"02","03"=>"03","04"=>"04","05"=>"05","06"=>"06","07"=>"07","08"=>"08","09"=>"09","10"=>"10","11"=>"11","12"=>"12","13"=>"13","14"=>"14","15"=>"15","16"=>"16","17"=>"17","18"=>"18","19"=>"19","20"=>"20","21"=>"21","22"=>"22","23"=>"23","00"=>"00"), '', ['class' => 'form-control', 'placeholder' => 'Choose Hour'])}}
                        </div>
                        <div class="col">
                            {{Form::select('minutes', array("05"=>"05","10"=>"10","15"=>"15","20"=>"20","25"=>"25","30"=>"30","35"=>"35","40"=>"40","45"=>"45","50"=>"50","55"=>"55","00"=>"00"), '', ['class' => 'form-control', 'placeholder' => 'Choose Minutes'])}}
                        </div>
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
