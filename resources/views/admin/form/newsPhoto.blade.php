<form name="newsPhotoForm" class="form-horizontal" novalidate="">
    {{ csrf_field() }}

    <div class="form-group error">
        <label for="image" class="col-sm-3 control-label">Изображение</label>
        <div class="col-sm-9">
            <div ngf-select="upload($file)" class="btn btn-success">
                Загрузить</div>
            <img ngf-thumbnail="newsPhoto.photo_thumb_link || '/images/thumb.png'" width="100">
        </div>
        <input type="hidden" name="photo_link" value="<% photo_link %>"
               ng-model="newsPhoto.photo_link"
               ng-required="true" ng-value="newsPhoto.photo_link" />
        <input type="hidden" name="photo_thumb_link" value="<% newsPhoto %>"
               ng-model="newsPhoto.photo_thumb_link"
               ng-required="true" ng-value="newsPhoto.photo_thumb_link" />
    </div>

    <div class="progress" id="uploadProgress">
        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
            0%
        </div>
    </div>

</form>