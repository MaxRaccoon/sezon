<form name="programPhotoForm" class="form-horizontal" novalidate="">
    {{ csrf_field() }}

    <div class="form-group error">
        <label for="image" class="col-sm-3 control-label">Изображение</label>
        <div class="col-sm-9">
            <div ngf-select="upload($file)" class="btn btn-success">
                Загрузить</div>
            <img ngf-thumbnail="programPhoto.photo_thumb_link || '/images/thumb.png'" width="100">
        </div>
        <input type="hidden" name="photo_link" value="<% photo_link %>"
               ng-model="programPhoto.photo_link"
               ng-required="true" ng-value="programPhoto.photo_link" />
        <input type="hidden" name="photo_thumb_link" value="<% programPhoto %>"
               ng-model="programPhoto.photo_thumb_link"
               ng-required="true" ng-value="programPhoto.photo_thumb_link" />
    </div>

</form>