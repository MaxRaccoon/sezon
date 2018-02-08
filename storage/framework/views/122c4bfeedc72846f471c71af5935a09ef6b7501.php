<?php $__env->startSection('page_heading'); ?>
    Запросы
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
    <div  ng-controller="requestController">
        <table class="table table-condensed table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>ФИО</th>
                <th>Дата и место рождения</th>
                <th>Индекс</th>
                <th>Телефон</th>
                <th>E-mail</th>
                <th>
                </th>
            </tr>
            </thead>
            <tbody>
            <tr ng-repeat="request in requests">
                <td><% request.id %></td>
                <td><% request.name %></td>
                <td><% request.dt_born %> <% request.place_born %></td>
                <td><% request.post_address %></td>
                <td><% request.phone %></td>
                <td><% request.email %></td>
                <td>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(request.id)">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>