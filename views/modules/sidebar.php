  <aside class="main-sidebar sidebar-dark-primary elevation-4">
  	<!-- Brand Logo -->
  	<a href="home" class="brand-link">
  		<img src="views/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
  		<span class="brand-text font-weight-light">TRAIK</span>
  	</a>

  	<!-- Sidebar -->
  	<div class="sidebar">
  		<!-- Sidebar user panel (optional) -->
  		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  			<div class="image">
  				<?php

					if ($_SESSION["photo"] != "") {

						echo '<img src="' . $_SESSION["photo"] . '"class="img-circle">';
					} else {

						echo '<img src="views/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">';
					}

					?>

  			</div>
  			<div class="info">
  				<a href="home" class="d-block"><?php echo $_SESSION["name"]; ?></a>
  			</div>
  		</div>

  		<!-- Sidebar Menu -->
  		<nav class="mt-2">
  			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  				<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
<?php

if($_SESSION["profile"] == "administrator"){


 echo' 				<li class="nav-item">
  					<a href="home" class="nav-link">
  						<i class="nav-icon fa fa-home"></i>
  						<p>
  							home
  						</p>
  					</a>
  				</li>
  				<li class="nav-item">
  					<a href="users" class="nav-link">
  						<i class="nav-icon fa fa-user"></i>
  						<p>
  							Users
  						</p>
  					</a>
				  </li>';
}
if($_SESSION["profile"] == "administrator" || $_SESSION["profile"] == "special"){
				  
				  echo'
				   	<li class="nav-item">
  					<a href="categories" class="nav-link">
  						<i class="nav-icon fa fa-th"></i>
  						<p>
  							categories
  						</p>
  					</a>
  				</li>
  				<li class="nav-item">
  					<a href="products" class="nav-link">
  						<i class="nav-icon fab fa-product-hunt"></i>
  						<p>
  							Product
  						</p>
  					</a>
				  </li>';
				  
}
if($_SESSION["profile"] == "administrator" || $_SESSION["profile"] == "seller"){

			echo '	  <li class="nav-item">
  					<a href="customers" class="nav-link">
  						<i class="nav-icon fa fa-users"></i>
  						<p>
  							Customers
  						</p>
  					</a>
				  </li>';
				  
}
if($_SESSION["profile"] == "administrator" || $_SESSION["profile"] == "seller"){

	echo'  <li class="nav-item has-treeview">
  					<a href="#" class="nav-link">
  						<i class="nav-icon fas fa-copy"></i>
  						<p>
  							sales
  							<i class="fas fa-angle-left right"></i>
  						</p>
  					</a>
  					<ul class="nav nav-treeview">
					  <li class="nav-item">
  							<a href="manage-sales" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Sales</p>
  							</a>
  						</li>
  						<li class="nav-item">
  							<a href="create-sales" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Create-sales</p>
  							</a>
						  </li>';
}
if($_SESSION["profile"] == "administrator"){

  			echo '			<li class="nav-item">
  							<a href="reports" class="nav-link">
  								<i class="far fa-circle nav-icon"></i>
  								<p>Sales-report</p>
  							</a>
						  </li>';
					}
  						
  					echo'</ul>
  				</li>';
				
				?>
  			</ul>
  		</nav>
  		<!-- /.sidebar-menu -->
  	</div>
  	<!-- /.sidebar -->
  </aside>

  <!-- <aside class="main-sidebar">

	<section class="sidebar">
		
		<ul class="sidebar-menu">

			<li class="active">

				<a href="home">

					<i class="fa fa-home"></i>

					<span>Home</span>

				</a>

			</li>

			<li>

				<a href="users">

					<i class="fa fa-user"></i>

					<span>User management</span>

				</a>

			</li>

			<li>

				<a href="categories">

					<i class="fa fa-th"></i>

					<span>Categories</span>

				</a>

			</li>

			<li>

				<a href="products">

					<i class="fa fa-product-hunt"></i>

					<span>Products</span>

				</a>

			</li>

			<li>

				<a href="customers">

					<i class="fa fa-user"></i>

					<span>Customers</span>

				</a>

			</li>

			<li class="treeview">

				<a href="#">

					<i class="fa fa-list-ul"></i>

					<span>Sales</span>

					<span class="pull-right-container">

						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>

				<ul class="treeview-menu">

					<li>

						<a href="manage-sales">

							<i class="fa fa-circle"></i>

							<span>Manage sales</span>

						</a>

					</li>

					<li>

						<a href="create-sales">

							<i class="fa fa-circle"></i>

							<span>Create sale</span>

						</a>

					</li>

					<li>

						<a href="sales-report">

							<i class="fa fa-circle"></i>

							<span>Sales report</span>

						</a>

					</li>

				</ul>

			</li>
			
		</ul>

	</section>
	
</aside> -->