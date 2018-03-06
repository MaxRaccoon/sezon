<form name="newsForm" class="form-horizontal" novalidate="">
    {{ csrf_field() }}

    <div class="form-group error">
        <label for="published_dt" class="col-sm-3 control-label">Дата публикации</label>
        <div class="col-sm-9">
            <input type="datetime" date-time ng-model="news.published_dt"
                   min-view="date" auto-close="true"
                   view="date" maxlength="10"
                   placeholder="<% {{ $todayTS }} | date:'dd.MM.yyyy' %>"
                   format="dd.MM.yyyy">
        </div>
    </div>

    <div class="form-group error">
        <label for="is_action" class="col-sm-3 control-label">Акция?</label>
        <div class="col-sm-9">
            <input type="checkbox" ng-model="news.is_action"
                   ng-checked="news.is_action"
                   ng-true-value="1" ng-false-value="0" />
        </div>
    </div>

    <div class="form-group error">
        <label for="title" class="col-sm-3 control-label">Заголовок</label>
        <div class="col-sm-9">
            <input type="text" class="form-control has-error" id="title" name="title"
                   placeholder="Заголовок"
                   value="<% title %>" ng-model="news.title" ng-required="true">
            <span class="help-inline"
                  ng-show="news.title.$invalid && news.title.$touched">Обязательное поле</span>
        </div>
    </div>

    <div class="form-group error">
        <label for="anons" class="col-sm-3 control-label">Анонс</label>
        <div class="col-sm-9">
            <text-angular id="anons" name="anons" ta-default-wrap="span"
                          ng-model="news.anons" ng-required="true"
            ></text-angular>
            <span class="help-inline"
                  ng-show="news.anons.$invalid && news.anons.$touched">Обязательное поле</span>
        </div>
    </div>

    <div class="form-group">
        <label for="content" class="col-sm-3 control-label">Описание</label>
        <div class="col-sm-9">
            <text-angular id="content" name="content" ta-default-wrap="span"
                          ng-model="news.content" ng-required="true"
            ></text-angular>
            <span class="help-inline"
                  ng-show="news.content.$invalid && news.content.$touched">Обязательное поле</span>
        </div>
    </div>

</form>