<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="float-left image">
                <img src="{{asset('public/admin/img/user2-160x160.jpg')}}" class="rounded-circle" alt="User Image">
            </div>
            <div class="float-left info">
                <p>Alexander Pierce</p> <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li{!! Request::is('admin/dashboard', 'admin') ? ' class="active"' : '' !!}>
                <a href="{{route('admin.dashboard')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Charts</span>
                    <span class="float-right-container">
                        <i class="fa fa-angle-left float-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                    <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                    <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                    <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
            </li>

            <li class="header">SETTINGS</li>
            <li{!! Request::is('admin/managers', 'admin/managers/*') ? ' class="active"' : '' !!}>
                <a href="{{url('admin/managers')}}">
                    <i class="fa fa-user"></i> <span>Managers</span>
                </a>
            </li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Roll</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>