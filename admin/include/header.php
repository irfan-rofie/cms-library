<div class="header navbar navbar-inverse navbar-fixed-top">
    <div class="header-inner">
        <a class="navbar-brand" href="index.html"><img src="../assets/img/logo.png" alt="logo" class="img-responsive" /></a>
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <img src="../assets/img/menu-toggler.png" alt="" />
        </a> 
        <ul class="nav navbar-nav pull-right">
            <li class="dropdown" id="header_notification_bar">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                   data-close-others="true">
                    <i class="icon-warning-sign"></i>
                    <span class="badge">6</span>
                </a>
                <ul class="dropdown-menu extended notification">
                    <li><p>You have 14 new notifications</p></li>
                    <li>
                        <a href="#">
                            <span class="label label-sm label-icon label-success"><i class="icon-plus"></i></span>
                            New user registered. 
                            <span class="time">Just now</span>
                        </a>
                    </li>
                    <li class="external"><a href="#">See all notifications <i class="m-icon-swapright"></i></a></li>
                </ul>
            </li>
            <li class="dropdown" id="header_inbox_bar">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown"
                   data-close-others="true">
                    <i class="icon-envelope"></i>
                    <span class="badge">5</span>
                </a>
                <ul class="dropdown-menu extended inbox">
                    <li><p>You have 12 new messages</p></li>
                    <li>
                        <a href="inbox.html?a=view">
                            <span class="photo"><img src="../assets/img/avatar2.jpg" alt=""/></span>
                            <span class="subject">
                                <span class="from">Lisa Wong</span>
                                <span class="time">Just Now</span>
                            </span>
                            <span class="message">
                                Vivamus sed auctor nibh congue nibh. auctor nibh
                                auctor nibh...
                            </span>  
                        </a>
                    </li>
                    <li class="external"><a href="#">See all messages <i class="m-icon-swapright"></i></a></li>
                </ul>
            </li>
            <li class="dropdown" id="header_task_bar">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-tasks"></i>
                    <span class="badge">5</span>
                </a>
                <ul class="dropdown-menu extended tasks">
                    <li><p>You have 12 pending tasks</p></li>
                    <li>
                        <a href="#">
                            <span class="task">
                                <span class="desc">New release v1.2</span>
                                <span class="percent">30%</span>
                            </span>
                            <span class="progress">
                                <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                    <span class="sr-only">40% Complete</span>
                                </span>
                            </span>
                        </a>
                    </li>
                    <li class="external"><a href="#">See all tasks <i class="m-icon-swapright"></i></a></li>
                </ul>
            </li>
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" src="../assets/img/avatar1_small.jpg"/>
                    <span class="username"><?php echo $_SESSION['nama']; ?></span>
                    <i class="icon-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="icon-user"></i> Profil</a></li>
                    <li><a href="proses/logout.php"><i class="icon-key"></i> Keluar</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="clearfix"></div>
