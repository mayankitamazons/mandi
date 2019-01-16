
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php
            $cakeDescription = 'Mondimart Admin Dashboard';
        ?>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <!-- bootstrap & fontawesome -->
        <?= $this->Html->meta('icon') ?>

    <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?php echo $this->request->webroot; ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo $this->request->webroot; ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="<?php echo $this->request->webroot; ?>assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo $this->request->webroot; ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
            <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo $this->request->webroot; ?>assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?php echo $this->request->webroot; ?>assets/css/ace-rtl.min.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="<?php echo $this->request->webroot; ?>assets/js/ace-extra.min.js"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="<?php echo $this->request->webroot; ?>assets/js/html5shiv.min.js"></script>
        <script src="<?php echo $this->request->webroot; ?>assets/js/respond.min.js"></script>
        <![endif]-->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="<?php echo $this->request->webroot; ?>assets/js/html5shiv.min.js"></script>
        <script src="<?php echo $this->request->webroot; ?>assets/js/respond.min.js"></script>
        <![endif]-->
</head>
<body class="">
    
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</body>
</html>
