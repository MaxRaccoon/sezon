@extends('layouts.dashboard')

@section('page_heading')
    Блоки-ссылки в шапке
@endsection

@section('section')
    <div  ng-controller="topLinkController">
        <table class="table table-condensed table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Изображение</th>
                <th>Заголовок</th>
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
            <tr ng-repeat="topLink in topLinks">
                <td><% topLink.id %></td>
                <td><% topLink.image %></td>
                <td><% topLink.title %></td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', topLink.id)">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(topLink.id)">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        @include('admin.defaultToggle', ['entity' => 'topLink', 'form' => 'topLink'])

    </div>
@endsection