<form name="scheduleForm" class="form-horizontal" novalidate="">
    {{ csrf_field() }}

    <input type="hidden" id="program_id "
           name="program_id" ng-required="true"
           value="" ng-model="schedule.program_id" >

    <div class="form-group">
        <label for="title" class="col-sm-3 control-label">День недели</label>
        <div class="col-sm-9">
            <select aria-label="" name="day_of_weak"
                    ng-model="schedule.day_of_weak">
                <option ng-repeat="option in days" value="<% option.value %>"
                ><% option.label %></option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="start_time" class="col-sm-3 control-label">
            Время начала</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="start_time "
                   name="start_time " placeholder="8:00"
                   value="" ng-model="schedule.start_time "
                   ng-required="true">
            <span class="help-inline"
                  ng-show="scheduleForm.start_time.$invalid && scheduleForm.start_time.$touched">Обязательное поле</span>
        </div>
    </div>

</form>