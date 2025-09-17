<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo isset($pageTitle) ? $pageTitle : "AdminLTE Panel"; ?></title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- Bootstrap 3.3.7 -->
  <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" />    
  <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet" />
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
  <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  <?php if (isset($styles) && is_array($styles)): ?>
    <?php foreach ($styles as $style): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url($style); ?>" />
    <?php endforeach; ?>
<?php endif; ?>
</head>
<body class="skin-blue sidebar-mini">
  
