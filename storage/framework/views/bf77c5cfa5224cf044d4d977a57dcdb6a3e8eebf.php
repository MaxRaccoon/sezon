<form name="trainerForm" class="form-horizontal" novalidate="">
    <?php echo e(csrf_field()); ?>


    <div class="form-group error">
        <label for="image" class="col-sm-3 control-label">Изображение</label>
        <div class="col-sm-9">
            <div ngf-select="upload($file)" class="btn btn-success">
                Загрузить</div>
            <img ngf-thumbnail="trainer.photo_link || '/images/thumb.png'" width="100">
        </div>
        <input type="hidden" name="photo_link" value="<% photo_link %>" ng-model="trainer.photo_link"
               ng-required="true" ng-value="trainer.photo_link" />
    </div>

    <div class="form-group error">
        <label for="name" class="col-sm-3 control-label">Имя</label>
        <div class="col-sm-9">
            <input type="text" class="form-control has-error" id="name" name="name" placeholder="Имя" value="<% name %>"
                   ng-model="trainer.name" ng-required="true">
            <span class="help-inline"
                  ng-show="trainerForm.name.$invalid && trainerForm.name.$touched">Обязательное поле</span>
        </div>
    </div>

    <div class="form-group">
        <label for="keyValue" class="col-sm-3 control-label">Описание</label>
        <div class="col-sm-9">
            <text-angular id="description" name="description"
                          ta-default-wrap="span"
                          ng-model="trainer.description"
                          ng-required="true"
            ></text-angular>
            <span class="help-inline"
                  ng-show="trainerForm.description.$invalid && trainerForm.description.$touched">Обязательное поле</span>
        </div>
    </div>

</form>