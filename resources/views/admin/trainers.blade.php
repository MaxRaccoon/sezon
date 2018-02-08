@extends('layouts.dashboard')

@section('page_heading')
    Список тренеров
@endsection

@section('section')
    <div  ng-controller="trainerController">
        <table class="table table-condensed table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>
                    <button id="btn-add" class="btn btn-primary btn-xs"
                            ng-click="toggle('add', 0)">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        Добавить нового
                    </button>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="trainer in trainers">
                <td><% trainer.id %></td>
                <td><% trainer.name %></td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', trainer.id)">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(trainer.id)">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        @include('admin.defaultToggle', ['entity' => 'trainer', 'form' => 'trainer'])

    </div>
@endsection