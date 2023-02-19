    <!-- need to remove -->

    <?php $roles=App\Http\Controllers\RolesController::getroles(); ?>
    <li class="nav-item">
        <a href="/home" class="nav-link dashboard_route">
            <i class="nav-icon fas fa-home"></i>
            <p>Dashboard</p>
        </a>
    </li>

    <li class="nav-item">
        <p style="color: #C2C7D0; font-size: 15px; padding-top:10px">&nbsp;Master</p>
    </li>
    @if ($roles->contains('role_id',3))
    <li class="nav-item">
        <a href="/complain" class="nav-link">
        <i class="fas fa-table"></i>
            <p>&nbsp;Complain Management</p>
        </a>
    </li>
    @endif
    @if ($roles->contains('role_id',1))
    <li class="nav-item">
        <a href="/credit_note" class="nav-link">
            <i class="fas fa-copy"></i>
            <p>&nbsp;Credit Note</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/history" class="nav-link">
            <i class="fas fa-history    "></i>
            <p>&nbsp;Credit Note History</p>
        </a>
    </li>
    @endif
    @if ($roles->contains('role_id',5))
    <li class="nav-item">
        <a href="/futher_explanation" class="nav-link">
            <i class="fas fa-exclamation-triangle"></i>
            <p>&nbsp;Futher Explanatin</p>
        </a>
    </li>
    @endif
    <!--user Section -->
    @if ($roles->contains('role_id',3))
    <li class="nav-item">
        <p style="color: #C2C7D0; font-size: 15px; padding-top:10px">&nbsp;User Management</p>
    </li>
    <li class="nav-item">
        <a href="role" class="nav-link role_route">
            <i class="fas fa-user-tie"></i>
            <p>&nbsp;Role</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="user" class="nav-link user_route">
        <i class="fas fa-users"></i>
            <p>&nbsp;User</p>
        </a>
    </li>
    @endif

