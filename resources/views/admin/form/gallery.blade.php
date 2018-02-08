<form name="galleryForm" class="form-horizontal" novalidate="">
    {{ csrf_field() }}

    <div class="form-group error">
        <label for="image" class="col-sm-3 control-label">Изображение</label>
        <div class="col-sm-9">
            <div ngf-select="upload($file)" class="btn btn-success">
                Загрузить</div>
            <img ngf-thumbnail="gallery.image_thumb_link || '/images/thumb.png'" width="100">
        </div>
        <input type="hidden" name="image_link" value="<% image_link %>" ng-model="gallery.image_link"
               ng-required="true" ng-value="gallery.image_link" />
        <input type="hidden" name="image_thumb_link" value="<% image_thumb_link %>" ng-model="gallery.image_thumb_link"
               ng-required="true" ng-value="gallery.image_thumb_link" />
    </div>

    <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Подпись</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="title" name="title" placeholder="Подпись"
                   value="<% title %>" ng-model="gallery.title" ng-required="false">
            <span class="help-inline"
                  ng-show="galleryForm.title.$invalid && galleryForm.title.$touched">Обязательное поле</span>
        </div>
    </div>
    <div class="form-group">
        <label for="description" class="col-sm-3 control-label">Описание</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="description" name="description" placeholder="Описание"
                   value="<% description %>" ng-model="gallery.description" ng-required="false">
            <span class="help-inline"
                  ng-show="galleryForm.description.$invalid && galleryForm.description.$touched">Обязательное поле</span>
        </div>
    </div>

</form>