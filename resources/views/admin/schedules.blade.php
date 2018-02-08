@extends('layouts.dashboard')

@section('page_heading')
    Расписание программы &laquo;{{ $program->title }}&raquo;
@endsection

@section('section')
    <script>
        var programId = parseInt({{ $program->id }});
    </script>
    <div  ng-controller="scheduleController">
        <table class="table table-condensed table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>День</th>
                <th>Начало в</th>
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
            <tr ng-repeat="schedule in scheduleList">
                <td><% schedule.id %></td>
                <td><% getDay(schedule.day_of_weak) %></td>
                <td><% schedule.start_time %></td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', schedule.id)">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(schedule.id)">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        @include('admin.defaultToggle', [
        'entity' => 'schedule',
        'form' => 'schedule'])

    </div>
@endsection