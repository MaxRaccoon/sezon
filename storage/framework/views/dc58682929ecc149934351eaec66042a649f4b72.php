<?php $__env->startSection('body'); ?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Вход в систему</div>
				<div class="panel-body">
					<?php if(count($errors) > 0): ?>
						<div class="alert alert-danger">
							<strong>Ошибка</strong><br><br>
							<ul>
								<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li><?php echo e($error); ?></li>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</ul>
						</div>
					<?php endif; ?>

					<form class="form-horizontal" role="form" method="POST" action="/login">
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">

						<div class="form-group">
							<label class="col-md-4 control-label">Ващ e-mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="<?php echo e(old('email')); ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Пароль</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Запомни меня
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary" style="margin-right: 15px;">
									Вход
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.plane', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>