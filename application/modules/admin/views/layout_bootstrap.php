<?php echo doctype(); ?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>

    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/bootstrap/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Blank -->

    <!-- SB Admin CSS - Include with every page -->
    <link href="<?php echo base_url();?>assets/bootstrap/css/sb-admin.css" rel="stylesheet">

    <?php foreach($stylesheet as $sheet): ?>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ."assets/css/".$sheet;?>" />
      <?php endforeach; ?>
</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url('admin/index');?>"><img src="<?php echo base_url(); ?>assets/images/logo-small.png"></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('auth/logout');?>"><i class="fa fa-sign-out fa-fw"></i>Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

        </nav>
        <!-- /.navbar-static-top -->

        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="<?php echo site_url('admin/index');?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('integrantes/index');?>"><i class="fa fa-fw fa-book"></i> Integrantes</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('llamados/index');?>"><i class="fa fa-fw fa-bars"></i> Llamados</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('inscripciones/index');?>"><i class="fa fa-fw fa-bars"></i> Inscripciones</a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('tesises/index');?>"><i class="fa fa-fw fa-ellipsis-v"></i> Tesis</a>
                    </li>
                    <li>
                      <a href="<?php echo site_url('language/index');?>"><i class="fa fa-fw fa-keyboard-o"></i>Textos</a>
                    </li>
                    <li>
                      <a href="<?php echo site_url('contacto/contactoadmin');?>"><i class="fa fa-fw fa-envelope"></i>Contacto</a>
                    </li>
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->

        <div id="page-wrapper">
          <?php if(isset($content)): ?>
            <?php echo $this->load->view($content); ?>
          <?php endif; ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/bootstrap/js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="<?php echo base_url();?>assets/bootstrap/js/sb-admin.js"></script>    
    
    <!-- Page-Level Demo Scripts - Blank - Use for reference -->

    <?php if($tinymce_on): ?>
        <script type="text/javascript" src="<?php echo base_url();?>assets/tinymce/tinymce.min.js"></script>
    <?php endif; ?>
    
    <?php if($colorbox_on): ?>
        <script type="text/javascript" src="<?php echo base_url() . "assets/admin/js/jquery.colorbox-min.js";?>"></script>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/admin/css/colorbox.css";?>" />
    <?php endif; ?>
    
    <?php if($jquery_block): ?>
      <script type="text/javascript" src="<?php echo base_url() . "assets/admin/js/jquery.blockUI.js";?>"></script>
    <?php endif; ?>
        
    <?php foreach($javascript as $js): ?>
        <script type="text/javascript" src="<?php echo base_url() ."assets/js/".$js; ?>"></script>
    <?php endforeach; ?>
</body>

</html>


