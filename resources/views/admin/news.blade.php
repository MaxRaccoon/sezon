@extends('layouts.dashboard')

@section('page_heading')
    Новости
@endsection

@section('section')
    <div  ng-controller="newsController">
        <table class="table table-condensed table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Заголовок</th>
                <th>Дата публикации</th>
                <th>
                    <button id="btn-add" class="btn btn-primary btn-xs"
                            ng-click="toggle('add', 0)">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Добавить
                    </button>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="news in newsList">
                <td><% news.id %></td>
                <td><% news.title %></td>
                <td><% news.published_dt %></td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', news.id)">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                    <a class="btn btn-default btn-xs btn-detail"
                       ng-href="/admin/newsPhotos/<% news.id %>"
                       title="Фото">
                        <i class="fa fa-image" aria-hidden="true"></i>
                    </a>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(news.id)">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        @include('admin.defaultToggle', ['entity' => 'news', 'form' => 'news'])

    </div>
@endsection