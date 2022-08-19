<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #333333">
	<a href="#" class="brand-link">
	<img src="image/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
		style="opacity: .8">
	<span class="brand-text font-weight-light">ADMIN</span>
	</a>
	<div class="sidebar">
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
			<img  src="image/profile.png" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
			<a href="#" class="d-block">{{Auth::user()->email}}</a>
			</div>
		</div>


		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
			<li class="nav-item" >
				<router-link to="/task" class="nav-link">
                    <i class="nav-icon fas fa-clipboard-list teal"></i>
					<p>Todo-List</p>
				</router-link>
			</li>

            @can('isAdmin')
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cog teal"></i>
                    <p>
                        Management
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <router-link to="/users" class="nav-link active">
                                <i class="fa fa-users-cog nav-icon"></i>
                                <p>User</p>
                            </router-link>
                        </li>
                    </ul>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <router-link to="/techemployee" class="nav-link active">
                                <i class="fa fa-users-cog nav-icon"></i>
                                <p>Tech Employee</p>
                            </router-link>
                        </li>
                    </ul>
                </li>
            @endcan


			</ul>
		</nav>
	</div>
</aside>
