<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
@can('dashboard')
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>
@endcan
<!-- Users, Roles, Permissions -->
@can('authentication')
    <li class="nav-item nav-dropdown">
        <a class="nav-link nav-dropdown-toggle" href="#"><i class="nav-icon la la-users"></i> Authentication</a>
        <ul class="nav-dropdown-items">
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('user') }}"><i class="nav-icon la la-user"></i> <span>Users</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('role') }}"><i class="nav-icon la la-id-badge"></i> <span>Roles</span></a></li>
            <li class="nav-item"><a class="nav-link" href="{{ backpack_url('permission') }}"><i class="nav-icon la la-key"></i> <span>Permissions</span></a></li>
        </ul>
    </li>
@endcan

@can('read student')
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('student') }}'><i class='nav-icon la la-user-plus'></i> Students</a></li>
@endcan
@can('create student')
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('student/create') }}'><i class='nav-icon la la-user-plus'></i> Admission </a></li>
@endcan
@can('student_class')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('student_class') }}'><i class='nav-icon la la-plug'></i>Classes</a></li>
@endcan
@can('fees')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('fee') }}'><i class='nav-icon la la-question'></i> Fees</a></li>
@endcan
@can('vocationaltraining')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('vocationaltraining') }}'><i class='nav-icon la la-question'></i> VocationalTrainings</a></li>
@endcan
@can('courses')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('course') }}'><i class='nav-icon la la-question'></i> Courses</a></li>
@endcan
@can('teachers')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('teacher') }}'><i class='nav-icon la la-question'></i> Teachers</a></li>
@endcan
@can('checkups')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('checkup') }}'><i class='nav-icon la la-question'></i> Checkups</a></li>
@endcan
@can('medicals')
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('medical') }}'><i class='nav-icon la la-question'></i> Medicals</a></li>
@endcan

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('category') }}'><i class='nav-icon la la-question'></i> Categories</a></li>