<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js" ng-app="dev4UManagement">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>Dev4U: Panel</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link rel="stylesheet" href="<?php echo e(asset("assets/stylesheets/management.css")); ?>" />
	<script src="<?php echo e(asset("assets/scripts/topLoadedScripts.js")); ?>" type="text/javascript"></script>
</head>
<body>
	<?php echo $__env->yieldContent('body'); ?>
	<script src="<?php echo e(asset("assets/scripts/management.js")); ?>" type="text/javascript"></script>
</body>
</html>