<form name="programForm" class="form-horizontal" novalidate="">
    <?php echo e(csrf_field()); ?>


    <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Заголовок</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="title" name="title" placeholder="Заголовок"
                   value="<% title %>" ng-model="program.title" ng-required="true">
            <span class="help-inline"
                  ng-show="programForm.title.$invalid && programForm.title.$touched">Обязательное поле</span>
        </div>
    </div>

    <script>
        var trainerList = [];
        <?php $__currentLoopData = $trainers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $trainer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            trainerList.push({ value:  "<?php echo e($trainer->id); ?>", label: "<?php echo e($trainer->name); ?>" });
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </script>
    <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Тренер</label>
        <div class="col-sm-9">
            <select aria-label="" name="trainer_id"
                    ng-model="program.trainer_id">
                <option ng-repeat="trainer in trainerList"
                        value="<% trainer.value %>"><% trainer.label %>
                </option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Длительность, минут</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="duration "
                   name="duration " placeholder="55"
                   value="" ng-model="program.duration "
                   ng-required="true">
            <span class="help-inline"
                  ng-show="programForm.title.$invalid && programForm.title.$touched">Обязательное поле</span>
        </div>
    </div>

    <div class="form-group">
        <label for="description" class="col-sm-3 control-label">Описание</label>
        <div class="col-sm-9">
            <text-angular id="description" name="description"
                          ta-default-wrap="span"
                          ng-model="program.description"
                          ng-required="true"
            ></text-angular>
            <span class="help-inline"
                  ng-show="programForm.description.$invalid && programForm.description.$touched">Обязательное поле</span>
        </div>
    </div>


</form>