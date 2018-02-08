<?php $__env->startSection('page_heading'); ?>
    Список пользователей
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
    <div  ng-controller="userController">
        <table class="table table-condensed table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Дата</th>
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
            <tr ng-repeat="user in users">
                <td><% user.id %></td>
                <td><% user.name %></td>
                <td><% user.email %></td>
                <td><% user.created_at %></td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', user.id)">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(user.id)">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        <?php echo $__env->make('admin.defaultToggle', ['entity' => 'user', 'form' => 'user'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>