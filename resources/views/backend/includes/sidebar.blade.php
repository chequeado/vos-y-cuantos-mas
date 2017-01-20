<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="https://www.gravatar.com/avatar/{!! md5(access()->user()->email) !!}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{!! access()->user()->name !!}</p>
                <p>{!! access()->user()->email !!}</p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('menus.backend.sidebar.general') }}</li>

            <li class="{{ Active::pattern('admin/categories*') }}">
                <a href="{!!url('admin/categories')!!}"><i class="fa fa-tag"></i><span>{{ trans('custom.backend.categories.title') }}</span></a>
            </li>

            <li class="{{ Active::pattern('admin/questions*') }}">
                <a href="{!!url('admin/questions')!!}"><i class="fa fa-question"></i><span>{{ trans('custom.backend.questions.question') }}</span></a>
            </li>

            <li class="{{ Active::pattern('admin/stats*') }}">
                <a href="{!!url('admin/stats')!!}"><i class="fa fa-pie-chart"></i><span>Estadísticas de votos</span></a>
            </li>

            <!--li class="{{ Active::pattern('admin/answer_types/*') }}">
                <a href="{!!url('admin/answer_types')!!}"><span>{{ trans('custom.backend.answer_types.title') }}</span></a>
            </li-->

            <li class="header">{{ trans('menus.backend.sidebar.system') }}</li>

            <!-- Optionally, you can add icons to the links -->
            <!--li class="{{ Active::pattern('admin/dashboard') }}">
                <a href="{!! route('admin.dashboard') !!}"><span>{{ trans('menus.backend.sidebar.dashboard') }}</span></a>
            </li-->
            @permission('view-access-management')
                <li class="{{ Active::pattern('admin/access/*') }}">
                    <a href="{!!url('admin/access/users')!!}"><i class="fa fa-users"></i><span>{{ trans('menus.backend.access.title') }}</span></a>
                </li>
            @endauth


            <li class="{{ Active::pattern('admin/log-viewer*') }} treeview">
                <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>{{ trans('menus.backend.log-viewer.main') }}</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu {{ Active::pattern('admin/log-viewer*', 'menu-open') }}" style="display: none; {{ Active::pattern('admin/log-viewer*', 'display: block;') }}">
                    <li class="{{ Active::pattern('admin/log-viewer') }}">
                        <a href="{!! url('admin/log-viewer') !!}">{{ trans('menus.backend.log-viewer.dashboard') }}</a>
                    </li>
                    <li class="{{ Active::pattern('admin/log-viewer/logs') }}">
                        <a href="{!! url('admin/log-viewer/logs') !!}">{{ trans('menus.backend.log-viewer.logs') }}</a>
                    </li>
                </ul>
            </li>

        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>