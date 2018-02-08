<form name="technologyForm" class="form-horizontal" novalidate="">
    <?php echo e(csrf_field()); ?>


    <div class="form-group error">
        <label for="image" class="col-sm-3 control-label">Изображение</label>
        <div class="col-sm-9">
            <div ngf-select="upload($file)" class="btn btn-success">
                Загрузить</div>
            <img ngf-thumbnail="technology.image || '/images/thumb.png'" width="100">
        </div>
        <input type="hidden" name="image" value="<% image %>" ng-model="technology.image"
               ng-required="true" ng-value="technology.image" />
    </div>

    <div class="form-group error">
        <label for="title" class="col-sm-3 control-label">Назавние</label>
        <div class="col-sm-9">
            <input type="text" class="form-control has-error" id="title" name="title"
                   placeholder="Короткое название"
                   value="<% title %>" ng-model="technology.title" ng-required="true">
            <span class="help-inline"
                  ng-show="technologyForm.title.$invalid && technologyForm.title.$touched">Обязательное поле</span>
        </div>
    </div>

    
        
        
            
                      
            
            
                  
        
    

</form>