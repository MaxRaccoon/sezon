<!-- Modal (Pop up when detail button clicked) -->
<div class="modal" id="<?php echo e($entity); ?>Modal" tabindex="-1" role="dialog" aria-labelledby="<?php echo e($entity); ?>ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Закрыть"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="<?php echo e($entity); ?>FormLabel"><% form_title %></h4>
            </div>
            <div class="modal-body">

                <?php echo $__env->make('admin.form.' . $entity, array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-save"
                        ng-click="save(modalstate, id)"
                        ng-disabled="userForm.$invalid">Сохранить</button>
            </div>
        </div>
    </div>
</div>