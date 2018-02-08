<form name="topLinkForm" class="form-horizontal" novalidate="">
    {{ csrf_field() }}

    <div class="form-group error">
        <label for="image" class="col-sm-3 control-label">Изображение</label>
        <div class="col-sm-9">
            <div ngf-select="upload($file)" class="btn btn-success">
                Загрузить</div>
            <img ngf-thumbnail="image_thumb || '/images/thumb.png'" width="100">
        </div>
        <input type="hidden" name="image" value="<% image %>" ng-model="topLink.image"
               ng-required="true" ng-value="topLink.image" />
    </div>

    <div class="form-group">
        <label for="title" class="col-sm-3 control-label">Подпись</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="title" name="title" placeholder="Подпись"
                   value="<% title %>" ng-model="topLink.title" ng-required="true">
            <span class="help-inline"
                  ng-show="topLink.title.$invalid && topLink.title.$touched">Обязательное поле</span>
        </div>
    </div>
    <div class="form-group">
        <label for="description" class="col-sm-3 control-label">Описание</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="description" name="description" placeholder="Описание"
                   value="<% description %>" ng-model="topLink.description" ng-required="true">
            <span class="help-inline"
                  ng-show="topLink.description.$invalid && topLink.description.$touched">Обязательное поле</span>
        </div>
    </div>
    <div class="form-group">
        <label for="link" class="col-sm-3 control-label">Ссылка</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="link" name="link" placeholder="Ссылка"
                   value="<% link %>" ng-model="topLink.link" ng-required="true">
            <span class="help-inline"
                  ng-show="topLink.link.$invalid && topLink.link.$touched">Обязательное поле</span>
        </div>
    </div>
    <div class="form-group">
        <label for="link" class="col-sm-3 control-label">Текст ссылки</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="link_title" name="link_title" placeholder="Ссылка"
                   value="<% link_title %>" ng-model="topLink.link_title" ng-required="true">
            <span class="help-inline"
                  ng-show="topLink.link_title.$invalid && topLink.link_title.$touched">Обязательное поле</span>
        </div>
    </div>

</form>