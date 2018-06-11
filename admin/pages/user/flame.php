<?php
    session_start();
    $_SESSION['user'];
    if(!isset($_SESSION['user'])){
        echo "<meta http-equiv='refresh' content='0;url=../../login.php?no=0'>";
    }
    include('../../../connect.php');
    /*$query = "SELECT Celcius,Fahrenheit FROM sensors ORDER BY id LIMIT 7";
    $res = mysqli_query($dbcon, $query);
    while($row = mysqli_fetch_array($res)){
        $data .="{ DegreeCelcius:'".$row["Celcius"]."', DegreeFahrenheit:".$row["Fahrenheit"]."}, ";
    }*/
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IoT Home Monitoring | Flame Detection</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <?php
            include('header.php');
            include('aside.php');
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Flame Detection
                    <small>Sensor Variation for 270 <sup>o</sup></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Flame sensors for 270 <sup>o</sup></a></li>
                    <li><a href="#">Flame detection</a></li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- callout -->
                <div class="callout callout-danger">
                    <h4>Fire flame was detected on the right corner</h4>

                    <p>At a rate of 89%</p>
                </div>
                <!-- /.callout -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                            <h3 class="box-title">Latest Fire Outbreak Detection</h3>

                            <div class="box-tools pull-right">
                                <!--<span class="label label-danger">8 New Members</span>-->
                                <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                </button>-->
                            </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                            <?php
                                include('../../../connect.php');
                                $query = "SELECT * FROM sensors WHERE FlameSensor1 >= 999 OR FlameSensor2 >= 999 OR FlameSensor3 >=999 OR FlameSensor4 >= 999 ORDER BY id DESC LIMIT 20";
                                $res = mysqli_query($dbcon, $query);
                                while($row = mysqli_fetch_array($res)){
                                    echo '
                                    <li>
                                    <img style="width:100px;height:100px" src="../img/flamea.png" alt="User Image">
                                    <span class="users-list-date"><b>Flame detecetd at</b></span>
                                    <a class="users-list-name" data-toggle="modal" data-target="#myModal'.$row['id'].'">'.date('h:i:sA - F dS, Y', strtotime($row['created_at'])).'</a>
                                    </li>';
                                }
                            ?>
                            </ul>
                            <!-- /.users-list -->
                            </div>
                            <!-- /.box-body -->
                            <!--<div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All Users</a>
                            </div>-->
                            <!-- /.box-footer -->
                        </div>
                        <!--/.box -->
                        <!-- Modal -->
                        <?php
                                include('../../../connect.php');
                                $queryy = "SELECT * FROM sensors WHERE FlameSensor1 >= 999 OR FlameSensor2 >= 999 OR FlameSensor3 >=999 OR FlameSensor4 >= 999 ORDER BY id DESC LIMIT 20";
                                $ress = mysqli_query($dbcon, $queryy);
                                while($roww = mysqli_fetch_array($ress)){
                                    echo '
                            <div class="modal modal-danger fade" id="myModal'.$roww['id'].'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">Fire outbreak at '.date('h:i:sA - F dS, Y', strtotime($roww['created_at'])).'</h4>
                                            </div>
                                            <div style="text-align:center" class="modal-body">
                                                <img style="width:100px;height:100px" src="../img/flamea.png" alt="User Image">
                                                <h1 style="font-family:broadway">Flame detected at '.date('h:i:sA - F dS, Y', strtotime($roww['created_at'])).'</h1>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->';
                                }
                        ?>
                    </div>
                    <!-- /.col -->

                    <div class="col-md-4">
                        <div class="box box-solid">
                            <div class="box-header">
                                <h3 class="box-title text-warning">In 90 <sup>o</sup> on the right</h3>

                                <div class="box-tools pull-right">
                                    <!--<button type="button"><i class="fa fa-refresh"></i></button>-->
                                    <input type="button" class="btn btn-default btn-sm" value="Refresh Page" onClick="window.location.href=window.location.href">
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body text-center">
                                <div class="sparkline" data-type="bar" data-width="97%" data-height="250px" data-bar-Width="14" data-bar-Spacing="7" data-bar-Color="#016201">
                                    <?php
                                        $query = "SELECT * FROM sensors ORDER BY id DESC LIMIT 11";
                                        $res = mysqli_query($dbcon, $query);
                                        $i = 0;
                                        $flameSensor1 = array();
                                        $time = array();
                                        while($row = mysqli_fetch_array($res)){
                                            $flameSensor1[$i] = $row['FlameSensor1'];
                                            $time[$i] = $row['created_at'];
                                            $i++;
                                        }

                                        echo $flameSensor1[0].', '.$flameSensor1[1].', '.$flameSensor1[2].', '.$flameSensor1[3].', '.$flameSensor1[4].', '.$flameSensor1[5].', '.$flameSensor1[6].', '.$flameSensor1[7].', '.$flameSensor1[8].', '.$flameSensor1[9].', '.$flameSensor1[10];
                                    ?>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-4">
                        <div class="box box-solid">
                            <div class="box-header">
                                <h3 class="box-title text-warning">In 90 <sup>o</sup> in front</h3>

                                <div class="box-tools pull-right">
                                    <!--<button type="button"><i class="fa fa-refresh"></i></button>-->
                                    <input type="button" class="btn btn-default btn-sm" value="Refresh Page" onClick="window.location.href=window.location.href">
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body text-center">
                                <div class="sparkline" data-type="bar" data-width="97%" data-height="250px" data-bar-Width="14" data-bar-Spacing="7" data-bar-Color="#016201">
                                <?php
                                        $query = "SELECT * FROM sensors ORDER BY id DESC LIMIT 11";
                                        $res = mysqli_query($dbcon, $query);
                                        $i = 0;
                                        $flameSensor2 = array();
                                        $time = array();
                                        while($row = mysqli_fetch_array($res)){
                                            $flameSensor2[$i] = $row['FlameSensor2'];
                                            $time[$i] = $row['created_at'];
                                            $i++;
                                        }

                                        echo $flameSensor2[0].', '.$flameSensor2[1].', '.$flameSensor2[2].', '.$flameSensor2[3].', '.$flameSensor2[4].', '.$flameSensor2[5].', '.$flameSensor2[6].', '.$flameSensor2[7].', '.$flameSensor2[8].', '.$flameSensor2[9].', '.$flameSensor2[10];
                                ?>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-4">
                        <div class="box box-solid">
                            <div class="box-header">
                                <h3 class="box-title text-warning">In 90 <sup>o</sup> on the left</h3>

                                <div class="box-tools pull-right">
                                   <!--<button type="button"><i class="fa fa-refresh"></i></button>-->
                                    <input type="button" class="btn btn-default btn-sm" value="Refresh Page" onClick="window.location.href=window.location.href">
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body text-center">
                                <div class="sparkline" data-type="bar" data-width="97%" data-height="250px" data-bar-Width="14" data-bar-Spacing="7" data-bar-Color="#016201">
                                <?php
                                        $query = "SELECT * FROM sensors ORDER BY id DESC LIMIT 11";
                                        $res = mysqli_query($dbcon, $query);
                                        $i = 0;
                                        $flameSensor3 = array();
                                        $time = array();
                                        while($row = mysqli_fetch_array($res)){
                                            $flameSensor3[$i] = $row['FlameSensor3'];
                                            $time[$i] = $row['created_at'];
                                            $i++;
                                        }

                                        echo $flameSensor3[0].', '.$flameSensor3[1].', '.$flameSensor3[2].', '.$flameSensor3[3].', '.$flameSensor3[4].', '.$flameSensor3[5].', '.$flameSensor3[6].', '.$flameSensor3[7].', '.$flameSensor3[8].', '.$flameSensor3[9].', '.$flameSensor3[10];
                                ?>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.0
            </div>
            <strong>Copyright &copy; 2017-2018 <a href="#">IoT based Home Monitoring System</a>.</strong> All rights reserved.
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Create the tabs -->
            <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!-- Home tab content -->
                <div class="tab-pane" id="control-sidebar-home-tab">
                    <h3 class="control-sidebar-heading">Recent Activity</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                    <p>Will be 23 on April 24th</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-user bg-yellow"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                                    <p>New phone +1(800)555-1234</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                                    <p>nora@example.com</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="menu-icon fa fa-file-code-o bg-green"></i>

                                <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                                    <p>Execution time 5 seconds</p>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                    <h3 class="control-sidebar-heading">Tasks Progress</h3>
                    <ul class="control-sidebar-menu">
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                </h4>

                                <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <!-- /.control-sidebar-menu -->

                </div>
                <!-- /.tab-pane -->
                <!-- Stats tab content -->
                <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                <!-- /.tab-pane -->
                <!-- Settings tab content -->
                <div class="tab-pane" id="control-sidebar-settings-tab">
                    <form method="post">
                        <h3 class="control-sidebar-heading">General Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

                            <p>
                                Some information about this general settings option
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

                            <p>
                                Other sets of options are available
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

                            <p>
                                Allow the user to show his name in blog posts
                            </p>
                        </div>
                        <!-- /.form-group -->

                        <h3 class="control-sidebar-heading">Chat Settings</h3>

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
                        </div>
                        <!-- /.form-group -->

                        <div class="form-group">
                            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
                        </div>
                        <!-- /.form-group -->
                    </form>
                </div>
                <!-- /.tab-pane -->
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery 2.2.3 -->
    <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../../plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- jQuery Knob -->
    <script src="../../plugins/knob/jquery.knob.js"></script>
    <!-- Sparkline -->
    <script src="../../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            /* jQueryKnob */

            $(".knob").knob({
                /*change : function (value) {
                 //console.log("change : " + value);
                 },
                 release : function (value) {
                 console.log("release : " + value);
                 },
                 cancel : function () {
                 console.log("cancel : " + this.value);
                 },*/
                draw: function() {

                    // "tron" case
                    if (this.$.data('skin') == 'tron') {

                        var a = this.angle(this.cv) // Angle
                            ,
                            sa = this.startAngle // Previous start angle
                            ,
                            sat = this.startAngle // Start angle
                            ,
                            ea // Previous end angle
                            , eat = sat + a // End angle
                            ,
                            r = true;

                        this.g.lineWidth = this.lineWidth;

                        this.o.cursor &&
                            (sat = eat - 0.3) &&
                            (eat = eat + 0.3);

                        if (this.o.displayPrevious) {
                            ea = this.startAngle + this.angle(this.value);
                            this.o.cursor &&
                                (sa = ea - 0.3) &&
                                (ea = ea + 0.3);
                            this.g.beginPath();
                            this.g.strokeStyle = this.previousColor;
                            this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sa, ea, false);
                            this.g.stroke();
                        }

                        this.g.beginPath();
                        this.g.strokeStyle = r ? this.o.fgColor : this.fgColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth, sat, eat, false);
                        this.g.stroke();

                        this.g.lineWidth = 2;
                        this.g.beginPath();
                        this.g.strokeStyle = this.o.fgColor;
                        this.g.arc(this.xy, this.xy, this.radius - this.lineWidth + 1 + this.lineWidth * 2 / 3, 0, 2 * Math.PI, false);
                        this.g.stroke();

                        return false;
                    }
                }
            });
            /* END JQUERY KNOB */

            //INITIALIZE SPARKLINE CHARTS
            $(".sparkline").each(function() {
                var $this = $(this);
                $this.sparkline('html', $this.data());
            });

            /* SPARKLINE DOCUMENTATION EXAMPLES http://omnipotent.net/jquery.sparkline/#s-about */
            drawDocSparklines();
            drawMouseSpeedDemo();

        });

        function drawDocSparklines() {

            // Bar + line composite charts
            $('#compositebar').sparkline('html', {
                type: 'bar',
                barColor: '#aaf'
            });
            $('#compositebar').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7], {
                composite: true,
                fillColor: false,
                lineColor: 'red'
            });


            // Line charts taking their values from the tag
            $('.sparkline-1').sparkline();

            // Larger line charts for the docs
            $('.largeline').sparkline('html', {
                type: 'line',
                height: '2.5em',
                width: '4em'
            });

            // Customized line chart
            $('#linecustom').sparkline('html', {
                height: '1.5em',
                width: '8em',
                lineColor: '#f00',
                fillColor: '#ffa',
                minSpotColor: false,
                maxSpotColor: false,
                spotColor: '#77f',
                spotRadius: 3
            });

            // Bar charts using inline values
            $('.sparkbar').sparkline('html', {
                type: 'bar'
            });

            $('.barformat').sparkline([1, 3, 5, 3, 8], {
                type: 'bar',
                tooltipFormat: '{{value:levels}} - {{value}}',
                tooltipValueLookups: {
                    levels: $.range_map({
                        ':2': 'Low',
                        '3:6': 'Medium',
                        '7:': 'High'
                    })
                }
            });

            // Tri-state charts using inline values
            $('.sparktristate').sparkline('html', {
                type: 'tristate'
            });
            $('.sparktristatecols').sparkline('html', {
                type: 'tristate',
                colorMap: {
                    '-2': '#fa7',
                    '2': '#44f'
                }
            });

            // Composite line charts, the second using values supplied via javascript
            $('#compositeline').sparkline('html', {
                fillColor: false,
                changeRangeMin: 0,
                chartRangeMax: 10
            });
            $('#compositeline').sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7], {
                composite: true,
                fillColor: false,
                lineColor: 'red',
                changeRangeMin: 0,
                chartRangeMax: 10
            });

            // Line charts with normal range marker
            $('#normalline').sparkline('html', {
                fillColor: false,
                normalRangeMin: -1,
                normalRangeMax: 8
            });
            $('#normalExample').sparkline('html', {
                fillColor: false,
                normalRangeMin: 80,
                normalRangeMax: 95,
                normalRangeColor: '#4f4'
            });

            // Discrete charts
            $('.discrete1').sparkline('html', {
                type: 'discrete',
                lineColor: 'blue',
                xwidth: 18
            });
            $('#discrete2').sparkline('html', {
                type: 'discrete',
                lineColor: 'blue',
                thresholdColor: 'red',
                thresholdValue: 4
            });

            // Bullet charts
            $('.sparkbullet').sparkline('html', {
                type: 'bullet'
            });

            // Pie charts
            $('.sparkpie').sparkline('html', {
                type: 'pie',
                height: '1.0em'
            });

            // Box plots
            $('.sparkboxplot').sparkline('html', {
                type: 'box'
            });
            $('.sparkboxplotraw').sparkline([1, 3, 5, 8, 10, 15, 18], {
                type: 'box',
                raw: true,
                showOutliers: true,
                target: 6
            });

            // Box plot with specific field order
            $('.boxfieldorder').sparkline('html', {
                type: 'box',
                tooltipFormatFieldlist: ['med', 'lq', 'uq'],
                tooltipFormatFieldlistKey: 'field'
            });

            // click event demo sparkline
            $('.clickdemo').sparkline();
            $('.clickdemo').bind('sparklineClick', function(ev) {
                var sparkline = ev.sparklines[0],
                    region = sparkline.getCurrentRegionFields();
                value = region.y;
                alert("Clicked on x=" + region.x + " y=" + region.y);
            });

            // mouseover event demo sparkline
            $('.mouseoverdemo').sparkline();
            $('.mouseoverdemo').bind('sparklineRegionChange', function(ev) {
                var sparkline = ev.sparklines[0],
                    region = sparkline.getCurrentRegionFields();
                value = region.y;
                $('.mouseoverregion').text("x=" + region.x + " y=" + region.y);
            }).bind('mouseleave', function() {
                $('.mouseoverregion').text('');
            });
        }

        /**
         ** Draw the little mouse speed animated graph
         ** This just attaches a handler to the mousemove event to see
         ** (roughly) how far the mouse has moved
         ** and then updates the display a couple of times a second via
         ** setTimeout()
         **/
        function drawMouseSpeedDemo() {
            var mrefreshinterval = 500; // update display every 500ms
            var lastmousex = -1;
            var lastmousey = -1;
            var lastmousetime;
            var mousetravel = 0;
            var mpoints = [];
            var mpoints_max = 30;
            $('html').mousemove(function(e) {
                var mousex = e.pageX;
                var mousey = e.pageY;
                if (lastmousex > -1) {
                    mousetravel += Math.max(Math.abs(mousex - lastmousex), Math.abs(mousey - lastmousey));
                }
                lastmousex = mousex;
                lastmousey = mousey;
            });
            var mdraw = function() {
                var md = new Date();
                var timenow = md.getTime();
                if (lastmousetime && lastmousetime != timenow) {
                    var pps = Math.round(mousetravel / (timenow - lastmousetime) * 1000);
                    mpoints.push(pps);
                    if (mpoints.length > mpoints_max)
                        mpoints.splice(0, 1);
                    mousetravel = 0;
                    $('#mousespeed').sparkline(mpoints, {
                        width: mpoints.length * 2,
                        tooltipSuffix: ' pixels per second'
                    });
                }
                lastmousetime = timenow;
                setTimeout(mdraw, mrefreshinterval);
            };
            // We could use setInterval instead, but I prefer to do it this way
            setTimeout(mdraw, mrefreshinterval);
        }
    </script>
</body>

</html>