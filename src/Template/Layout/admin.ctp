<?php
$cakeDescription = 'Admin';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <!-- bootstrap & fontawesome -->
		<?= $this->Html->meta('icon') ?>

    <!-- bootstrap & fontawesome -->
        <link rel="stylesheet" href="<?php echo $this->request->getAttribute("webroot"); ?>assets/css/bootstrap.min.css" />
        <link rel="stylesheet" href="<?php echo $this->request->getAttribute("webroot"); ?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

        <!-- page specific plugin styles -->

        <!-- text fonts -->
        <link rel="stylesheet" href="<?php echo $this->request->getAttribute("webroot"); ?>assets/css/fonts.googleapis.com.css" />

        <!-- ace styles -->
        <link rel="stylesheet" href="<?php echo $this->request->getAttribute("webroot"); ?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

        <!--[if lte IE 9]>
            <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
        <![endif]-->
        <link rel="stylesheet" href="<?php echo $this->request->getAttribute("webroot"); ?>assets/css/ace-skins.min.css" />
        <link rel="stylesheet" href="<?php echo $this->request->getAttribute("webroot"); ?>assets/css/ace-rtl.min.css" />

        <!--[if lte IE 9]>
          <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
        <![endif]-->

        <!-- inline styles related to this page -->

        <!-- ace settings handler -->
        <script src="<?php echo $this->request->getAttribute("webroot"); ?>assets/js/ace-extra.min.js"></script>

        <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

        <!--[if lte IE 8]>
        <script src="<?php echo $this->request->getAttribute("webroot"); ?>assets/js/html5shiv.min.js"></script>
        <script src="<?php echo $this->request->getAttribute("webroot"); ?>assets/js/respond.min.js"></script>
        <![endif]-->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo $this->request->getAttribute("webroot"); ?>assets/js/html5shiv.min.js"></script>
		<script src="<?php echo $this->request->getAttribute("webroot"); ?>assets/js/respond.min.js"></script>
		<![endif]-->
    <script src="<?php echo $this->request->getAttribute("webroot"); ?>assets/js/jquery-2.1.4.min.js"></script>
</head>
<body class="">
    <div id="navbar" class="navbar navbar-default ace-save-state">
            <div class="navbar-container ace-save-state" id="navbar-container">
                <button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
                    <span class="sr-only">Toggle sidebar</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>
                </button>

                <div class="navbar-header pull-left">
                    <a href="index.html" class="navbar-brand">
                        <small>
                            Admin
                        </small>
                    </a>
                </div>

                <div class="navbar-buttons navbar-header pull-right" role="navigation">
                    <ul class="nav ace-nav">
                        <li class="light-blue dropdown-modal">
                            <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                <img class="nav-user-photo" src="<?php echo $this->request->getAttribute("webroot");?>assets/images/avatars/user.png" alt="Jason's Photo" />
                                <span class="user-info">
                                    <small>Welcome,</small>
                                    Jason
                                </span>

                                <i class="ace-icon fa fa-caret-down"></i>
                            </a>

                            <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                                <li>
                                    <a href="#">
                                        <i class="ace-icon fa fa-cog"></i>
                                        Settings
                                    </a>
                                </li>

                                <li>
                                    <a href="profile.html">
                                        <i class="ace-icon fa fa-user"></i>
                                        Profile
                                    </a>
                                </li>

                                <li class="divider"></li>

                                <li>
                                    <a href="<?php echo $this->Url->Build(['controller'=>'Users','action'=>'logout'])?>">
                                        <i class="ace-icon fa fa-power-off"></i>
                                        Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div><!-- /.navbar-container -->
        </div>
        <div class="main-container ace-save-state" id="main-container">
            <script type="text/javascript">
                try{ace.settings.loadState('main-container')}catch(e){}
            </script>

            <div id="sidebar" class="sidebar                  responsive                    ace-save-state">
                <script type="text/javascript">
                    try{ace.settings.loadState('sidebar')}catch(e){}
                </script>
               
                <ul class="nav nav-list">
                   <!--  <li class="">
                        <a href="<?php echo $this->Url->Build(['controller'=>'pages','action'=>'index'])?>">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                        <b class="arrow"></b>
                    </li> -->
                     <li>
                        <a href="<?php echo $this->Url->Build(['controller'=>'category','action'=>'add'])?>">
                            <i class="menu-icon fa fa-tachometer"></i>
                            <span class="menu-text"> Manage category</span>
                        </a>
                        <b class="arrow"></b>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle">
                            <i class="menu-icon fa fa-list"></i>
                            <span class="menu-text"> Manage Product </span>
                            <b class="arrow fa fa-angle-down"></b>
                        </a>
                        <b class="arrow"></b>
                        <ul class="submenu nav-show">
                            <li class="">
                                <a href="<?php echo $this->Url->Build(['controller'=>'product','action'=>'index'])?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                 Product List
                                </a>

                                <b class="arrow"></b>
                            </li>
                            <li class="">
                                <a href="<?php echo $this->Url->Build(['controller'=>'product','action'=>'add'])?>">
                                    <i class="menu-icon fa fa-caret-right"></i>
                                 Add product
                                </a>

                                <b class="arrow"></b>
                            </li>

                        </ul>
                    </li>
                </ul><!-- /.nav-list -->

                <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
                    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
                </div>
            </div>
    <?= $this->fetch('content') ?>
    <div class="footer">
            <div class="footer-inner">
                <div class="footer-content">
                    <span class="bigger-120">
                        <span class="blue bolder">Mondimart</span>
                        Application &copy; <?php echo date('Y')?>-<?php echo date('Y',strtotime('+1 year'))?>
                    </span>
                </div>
            </div>
        </div>

        <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
            <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
        </a>
    </div><!-- /.main-container -->

        <!-- <![endif]-->

        <!--[if IE]>
<script src="<?php echo $this->request->getAttribute("webroot"); ?>assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
        <script type="text/javascript">
            if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo $this->request->getAttribute("webroot"); ?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
        </script>
        <script src="<?php echo $this->request->getAttribute("webroot"); ?>assets/js/bootstrap.min.js"></script>
        <!-- page specific plugin scripts -->
        <script src="<?php echo $this->request->getAttribute("webroot"); ?>assets/js/tree.min.js"></script>
        <!-- ace scripts -->
        <script src="<?php echo $this->request->getAttribute("webroot"); ?>assets/js/ace-elements.min.js"></script>
        <script src="<?php echo $this->request->getAttribute("webroot"); ?>assets/js/ace.min.js"></script>

</body>

</html>
