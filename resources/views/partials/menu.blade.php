<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
   <a href="{{ route("admin.home") }}" class="brand-link">
      <img src="{{ asset('student.ico') }}" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Makaranta App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route("admin.home") }}" class="nav-link">
                        <p>
                            <i class="nav-icon fas fa-tachometer-alt">

                            </i>
                            <span>{{ trans('global.dashboard') }}</span>
                        </p>
                    </a>
                </li>
                @can('user_read')
                    <li class="nav-item has-treeview {{ request()->is('admin/permissions*') ? 'menu-open' : '' }} {{ request()->is('admin/roles*') ? 'menu-open' : '' }} {{ request()->is('admin/users*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="nav-icon fas fa-users">

                            </i>
                            <p>
                                <span>{{ trans('global.userManagement.title') }}</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_read')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.permission.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_read')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.role.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_read')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            <span>{{ trans('global.user.title') }}</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('section_read')
                    <li class="nav-item">
                        <a href="{{ route("admin.section.index") }}" class="nav-link {{ request()->is('admin/section') || request()->is('admin/section/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-building">

                            </i>
                            <p>
                                <span>Sections</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @can('class_read')
                    <li class="nav-item">
                        <a href="{{ route("admin.class.index") }}" class="nav-link {{ request()->is('admin/class') || request()->is('admin/class/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-university">

                            </i>
                            <p>
                                <span>Classes</span>
                            </p>
                        </a>
                    </li>
                @endcan

                @can('subject_read')
                    <li class="nav-item">
                        <a href="{{ route("admin.subject.index") }}" class="nav-link {{ request()->is('admin/subject') || request()->is('admin/subject/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book">

                            </i>
                            <p>
                                <span>Subjects</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @if(Auth::user()->roles->first()->title == 'Parent')

                    @can('applicant_read')
                        <li class="nav-item has-treeview {{ request()->is('admin/students*') ? 'menu-open' : '' }} {{ request()->is('admin/applicants*') ? 'menu-open' : '' }}">
                            <a class="nav-link nav-dropdown-toggle">
                                <i class="nav-icon fas fa-users">

                                </i>
                                <p>
                                    <span>Children</span>
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @can('applicant_read')
                                    <li class="nav-item">
                                        <a href="{{ route("admin.applicants.create") }}" class="nav-link {{ request()->is('admin/applicants') || request()->is('admin/applicants/*') ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-user-plus">

                                            </i>
                                            <p>
                                                <span>New Child</span>
                                            </p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link {{ request()->is('admin/student') || request()->is('admin/student/*') ? 'active' : '' }}">
                                            <i class="nav-icon fas fa-table">

                                            </i>
                                            <p>
                                                <span>Children</span>
                                            </p>
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>

                    @endcan
                @else
                @can('applicant_read')
                    <li class="nav-item">
                        <a href="{{ route("admin.applicants.index") }}" class="nav-link {{ request()->is('admin/applicants') || request()->is('admin/applicants/*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-pencil-alt">

                            </i>
                            <p>
                                <span>Applicants</span>
                            </p>
                        </a>
                    </li>
                @endcan
                @endif
                @can('student_read')
                    <li class="nav-item has-treeview {{ request()->is('admin/students*') ? 'menu-open' : '' }} {{ request()->is('admin/applicants*') ? 'menu-open' : '' }}">
                        <a class="nav-link nav-dropdown-toggle">
                            <i class="nav-icon fas fa-graduation-cap">

                            </i>
                            <p>
                                <span>Students</span>
                                <i class="right fa fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('applicant_read')
                                <li class="nav-item">
                                    <a href="{{ route("admin.applicants.index") }}" class="nav-link {{ request()->is('admin/applicants') || request()->is('admin/applicants/*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-pencil-alt">

                                        </i>
                                        <p>
                                            <span>Applicants</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('student_read')
                                <li class="nav-item">
                                    <a href="" class="nav-link {{ request()->is('admin/student') || request()->is('admin/student/*') ? 'active' : '' }}">
                                        <i class="nav-icon fas fa-table">

                                        </i>
                                        <p>
                                            <span>Students</span>
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                        <p>
                            <i class="fas fa-sign-out-alt">

                            </i>
                            <span>{{ trans('global.logout') }}</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>