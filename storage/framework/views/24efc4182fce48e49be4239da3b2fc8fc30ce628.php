<?php $__env->startSection('page_heading'); ?>
    Продукты
<?php $__env->stopSection(); ?>

<?php $__env->startSection('section'); ?>
    <div  ng-controller="productController">
        <table class="table table-condensed table-bordered table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Заголовок</th>
                <th>Описание</th>
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
            <tr ng-repeat="product in products">
                <td><% product.id %></td>
                <td><% product.title %></td>
                <td><% product.description %></td>
                <td>
                    <button class="btn btn-default btn-xs btn-detail" ng-click="toggle('edit', product.id)">
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                    </button>
                    <button class="btn btn-danger btn-xs btn-delete" ng-click="confirmDelete(product.id)">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            </tbody>
        </table>

        <?php echo $__env->make('admin.defaultToggle', ['entity' => 'product', 'form' => 'product'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>