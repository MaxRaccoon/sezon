@extends('layouts.dashboard')

@section('page_heading')
    Фотографии новости &laquo;{{ $news->title }}&raquo;
@endsection

@section('section')
    <script>
        var newsId = parseInt({{ $news->id }});
    </script>
    <div  ng-controller="newsPhotoController">
        <table class="table table-condensed table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Фото</th>
                <th>Путь</th>
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
            <tr ng-repeat="news in newsPhotoList">
                <td><% news.id %></td>
                <td><img src="<% news.photo_thumb_link %>" /></td>
                <td><% news.photo_link %></td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', news.id)">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(news.id)">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        @include('admin.defaultToggle', [
        'entity' => 'newsPhoto',
        'form' => 'newsPhoto'])

    </div>
@endsection