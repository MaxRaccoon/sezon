@extends('layouts.dashboard')

@section('page_heading')
    Галлерея
@endsection

@section('section')
    <div  ng-controller="galleryController">
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
            <tr ng-repeat="gallery in galleryItems">
                <td><% gallery.id %></td>
                <td><img src="<% gallery.image_thumb_link %>" /></td>
                <td><% gallery.title %></td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', gallery.id)">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(gallery.id)">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        @include('admin.defaultToggle', ['entity' => 'gallery', 'form' => 'gallery'])

    </div>
@endsection