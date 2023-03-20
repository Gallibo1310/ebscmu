<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main Menu</span>
                </li>

                @if (Session::get('role_name') === 'Admin')
                <li class="{{set_active(['home'])}}">
                    <a href="{{ route('home') }}">
                        <i class="feather-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @endif

                @if (Session::get('role_name') === 'Instructor')
                <li class="{{set_active(['teacher/dashboard'])}}">
                    <a href="{{ route('teacher/dashboard') }}">
                        <i class="feather-grid"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                @endif



                @if (Session::get('role_name') === 'Admin' || Session::get('role_name') === 'Super Admin')
                <li class="submenu {{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">
                    <a href="#"><i class="fas fa-shield-alt"></i>
                        <span>User Management</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="{{ route('list/users') }}" class="{{set_active(['list/users'])}} {{ (request()->is('view/user/edit/*')) ? 'active' : '' }}">List Users</a></li>
                        <li><a href="{{route('student/list')}}" class="{{set_active(['student/list'])}} ">Student</a></li>
                        <li><a href="#" class="">Instructor</a></li>

                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="fa fa-thermometer"></i>
                        <span> Apparatus</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="#">Apparatus List</a></li>
                        <li><a href="teacher-details.html">Apparatus View</a></li>
                        <li><a href="add-teacher.html">Apparatus Add</a></li>
                        <li><a href="edit-teacher.html">Apparatus Edit</a></li>
                    </ul>
                </li>

                <li>
                    <a href="holiday.html"><i class="fas fa-holly-berry"></i> <span>Inventory</span></a>
                </li>
            @endif

                <li>
                    <a href="holiday.html"><i class="fa fa-book"></i> <span>Requisition</span></a>
                </li>



        </div>
    </div>
</div>
