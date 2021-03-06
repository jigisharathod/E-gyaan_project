<?php
error_reporting(0);
                    session_start();
                    $user_id=$_SESSION['id'];
                    $role_id=$_SESSION['role'];

                    require_once("../../../classes/DBConnect.php");
                    require_once("../../manage_user/classes/User.php");
                    require_once("../../manage_batch/classes/Batch.php");
                    require_once("../../manage_student/classes/Student.php");
                    require_once("../../../classes/Constants.php");

                    $dbConnect = new DBConnect(Constants::SERVER_NAME,
    											Constants::DB_USERNAME,
    											Constants::DB_PASSWORD,
    											Constants::DB_NAME);

                    if($role_id==Constants::ROLE_STUDENT_ID || $role_id==Constants::ROLE_PARENT_ID)
                    {
                    	$student=new Student($dbConnect->getInstance());
                    	$batch=new Batch($dbConnect->getInstance());
                    	$getStudentDetails=$student->getStudent($user_id,0);

                    	while($row=$getStudentDetails->fetch_assoc())
                    	{
                    		if($role_id==Constants::ROLE_STUDENT_ID)
                    		{
                    			$firstname=$row['firstname'];
                    			$lastname=$row['lastname'];
                    			$profile=$row['student_profile_photo'];
                    		}
                    		else
                    		{
                    			$firstname=$row['parent_name'];
                    			$lastname=$row['lastname'];
                    			$profile=$row['parent_profile_photo'];
                    		}
                    			
                    			$batch_id=$row['batch_id'];
                    			$display_name=$firstname." ".$lastname;

                    			$getBatch=$batch->getBatch("no",0,$batch_id,"no",0);
                    			while($batchRow=$getBatch->fetch_assoc())
                    			{
                    				$batch_name=$batchRow['batchName'];
                    				$branch_name=$batchRow['branchName'];
                    			}	
                    	}
                    }
                    else
                    {
                    	if($role_id===Constants::ROLE_ADMIN_ID)
                    	{
                    		$display_name="Admin";
                    	}
                    	else
                    	{
                    		$user=new User($dbConnect->getInstance());
                    		$getUserDetails=$user->getUser($user_id);

                    		while($row=$getUserDetails->fetch_assoc())
                    		{
                    			$display_name=$row['name'];
                    			$batch_name="";
                    			$branch_name="";
                    		}
                    	}
                    }
                    ?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>EGyaan | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../../../Resources/AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../../../Resources/AdminLTE-2.3.11/plugins/datepicker/datepicker3.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../../../Resources/AdminLTE-2.3.11/plugins/timepicker/bootstrap-timepicker.min.css"> 
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../Resources/AdminLTE-2.3.11/plugins/datatables/dataTables.bootstrap.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../../Resources/AdminLTE-2.3.11/plugins/select2/select2.min.css">


    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../Resources/AdminLTE-2.3.11/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../Resources/AdminLTE-2.3.11/dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini fixed">
<!-- <<<<<<< HEAD -->
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../login/functions/Dashboard.php" class="logo">
<!--       mini logo for sidebar mini 50x50 pixels -->
       <span class="logo-mini"><img src="../../../Resources/images/E_logo_transparent_small.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="../../../Resources/images/EGYAAN_logo_transparent_small_white.png"></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <nav class="navbar navbar-static-top">
                <!--  -->
            

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">4</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 4 messages</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li><!-- start message -->
                                            <a href="#">
                                                <div class="pull-left">
                                                    <!-- <img src="../../../Resources/images/boy.png" class="img-circle" alt="User Image"> -->
                                                </div>
                                                <h4>
                                                    Support Team
                                                    <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                </h4>
                                                <p>Why not buy a new awesome theme?</p>
                                            </a>
                                        </li>
                                        <!-- end message -->
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">See All Messages</a></li>
                            </ul>
                        </li>
                        <!-- Notifications: style can be found in dropdown.less -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-danger">10</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">You have 10 notifications</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer"><a href="#">View all</a></li>
                            </ul>
                        </li>
          
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php
                            if($profile!=null)
                            {
                            	echo "<img src='../../manage_student/images/student/$profile' class=user-image alt='User Image'>";
                            }
                            else
                            {
                            	echo "<img src='../../../Resources/images/boy.png' class=user-image alt='User Image'>";
                            }
                            echo "<span class=hidden-xs>$display_name</span>";
                            ?>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                <?php
                                if($profile!=null)
                            		{
                            			echo "<img src='../../manage_student/images/student/$profile' class=img-circle alt='User Image'>";
                            		}
                           			else
                            		{
                            			echo "<img src='../../../Resources/images/boy.png' class=img-circle alt='User Image'>";
                            		}
                                ?>
                                    <p>
                                    <?
                                    	if($batch_name!="")
                                    	{
                                    		echo "$display_name - $branch_name";
                                    	}
                                    	else
                                    	{
                                    		echo "$display_name";
                                    	}
                                        
                                    ?>
                                    </p>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <div class="row">
                                    <?
                                        echo '<div class="col-xs-12 text-center">';
                                            echo "$batch_name";
                                        echo '</div>';
                                        ?>
                                    </div>
                                    <!-- /.row -->
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../../login/functions/logout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

<!-- =============================================== -->

<!--START OF SIDEBAR===========================================================================================================-->
    <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <?
                        if($profile!=null)
                                    {
                                        echo "<img src='../../manage_student/images/student/$profile' class=img-circle alt='User Image'>";
                                    }
                                    else
                                    {
                                        echo "<img src='../../../Resources/images/boy.png' class=img-circle alt='User Image'>";
                                    }
                        ?>
                    </div>
                    <div class="pull-left info">
                    <?
                    echo "<p>$display_name</p>";
                    ?>
                        <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
                    </div>
                </div>
                        <!-- search form -->
                <!-- <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form> -->
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">MAIN NAVIGATION</li>
                    <li class="treeview active">
                        <a href="../../login/functions/Dashboard.php">
                            <i class="fa fa-home"></i> <span>Home</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-gears"></i>
                            <span>Settings</span>
                        </a>
                    </li>

                    <?php
                        require_once("../../../classes/DBConnect.php");
                        require_once("../../../classes/Constants.php");
                        require_once("../../manage_privilege/classes/Privilege.php");

                        $dbConnect = new DBConnect(Constants::SERVER_NAME,
                            Constants::DB_USERNAME,
                            Constants::DB_PASSWORD,
                            Constants::DB_NAME);

                        // print("Role id:".$role_id);

                        $privilege=new Privilege($dbConnect->getInstance());

                        $getDashboard=$privilege->getDashboardPrivilege($role_id);

                        if($getDashboard!=null)
                        {
                            while($row=$getDashboard->fetch_assoc())
                            {
                                // var_dump($row);
                                $i++;
                                $privilege_folder=$row['folder'];
                                $dashboard_name=$row['dashboard_name'];
                                $sidebar_icon=$row['sidebar_icon'];
                                if($dashboard_name=="Result")
                                {
                                  $i--;
                                  continue;
                                }
                                // <!-- echo "<a href=../../$privilege_folder><img src=../../$privilege_folder/icon.png></img><br>$dashboard_name<br></a>"; -->
                                echo '<li class="treeview">
                                        <a href="../../'.$privilege_folder.'">
                                        <i class="'.$sidebar_icon.'"></i>
                                        <span>'.$dashboard_name.'</span>
                                    </a>
                                </li>';

                                    // if($i==4)
                                    // {
                                    //     $i=0;
                                    //     echo "</div><hr><div class='row'>";
                                    // }
                            }
                        }
                    ?>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
    
<!--END OF SIDEBAR=============================================================================================================-->

        