<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="index3.html" class="brand-link">
	<img src="image/peso.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
		style="opacity: .8">
	<span class="brand-text font-weight-light">Todo List</span>
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
			<li class="nav-item">
				<router-link to="/dashboard" class="nav-link " >

                    <i class="nav-icon fas fa-clipboard-list purple"></i>
					<p>Todo</p>
				</router-link>
			</li>
			<li class="nav-item">
				<router-link to="/profile" class="nav-link ">
					<i class="nav-icon fas fa-user green"></i>
					<p>Profile</p>
				</router-link>
			</li>

            @can('isAdmin')
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cog"></i>
                    <p>
                        Management
                        <i class="right fas fa-angle-left"></i>
                    </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <router-link to="/users" class="nav-link active">
                                <i class="fa fa-users-cog nav-icon"></i>
                                <p>user</p>
                            </router-link>
                        </li>

                    </ul>
                </li>
            @endcan


			</ul>
		</nav>
	</div>
</aside>
