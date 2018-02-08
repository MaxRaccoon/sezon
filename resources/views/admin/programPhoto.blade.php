@extends('layouts.dashboard')

@section('page_heading')
    Фотографии программы &laquo;{{ $program->title }}&raquo;
@endsection

@section('section')
    <script>
        var programId = parseInt({{ $program->id }});
    </script>
    <div  ng-controller="programPhotoController">
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
            <tr ng-repeat="photo in programPhotoList">
                <td><% photo.id %></td>
                <td><img src="<% photo.photo_thumb_link %>" /></td>
                <td><% photo.photo_link %></td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', photo.id)">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(photo.id)">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        @include('admin.defaultToggle', [
        'entity' => 'programPhoto',
        'form' => 'programPhoto'])

    </div>
@endsection