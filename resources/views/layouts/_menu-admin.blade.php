@permission(['admin-view'])
  <li class="header" style="color: white;">ADMIN NAVIGATION</li>

  @permission(['admin-view'])
    <li class="treeview">
      <a href="#">
        <i class="fa fa-lock"></i> <span>Admin</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <li class="{{ route('user.index') == request()->url() ? 'active' : '' }}">
          <a href="{{ route('user.index') }}"><i class="fa fa-circle-o"></i> User</a>
        </li>
      </ul>
    </li>
    <!-- /.treeview -->
  @endpermission
@endpermission
