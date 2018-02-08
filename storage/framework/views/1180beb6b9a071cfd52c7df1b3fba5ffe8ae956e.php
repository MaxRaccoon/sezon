<?php $__env->startSection('page_heading'); ?>
    Программы
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
    <div  ng-controller="programController">
        <table class="table table-condensed table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Заголовок</th>
                <th>Тренер</th>
                <th>Длительность</th>
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
            <tr ng-repeat="program in programs">
                <td><% program.id %></td>
                <td><% program.title %></td>
                <td><% program.trainer.name %></td>
                <td><% program.duration %></td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', program.id)">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                    <a class="btn btn-default btn-xs btn-detail"
                       ng-href="/admin/programSchedules/<% program.id %>"
                        title="Расписание">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                    </a>
                    <a class="btn btn-default btn-xs btn-detail"
                       ng-href="/admin/programPhotos/<% program.id %>"
                       title="Фото">
                        <i class="fa fa-image" aria-hidden="true"></i>
                    </a>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(program.id)">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        <?php echo $__env->make('admin.defaultToggle', [
        'entity' => 'program',
        'form' => 'program'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>