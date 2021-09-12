<div class="brand clearfix">
	<a href="dashboard.php" style="font-size: 20px;">Bike Rental Portal | Admin Panel</a>  
		<span class="menu-btn"><i class="fa fa-bars"></i></span>
		<ul class="ts-profile-nav">
			
			<li class="ts-account">
				<a href="#"><img src="admin/img/ts-avatar.jpg" class="ts-avatar hidden-side" alt=""> Account <i class="fa fa-angle-down hidden-side"></i></a>
				<ul>
					
				<li><a onclick="event.preventDefault();
             document.getElementById('logout-form').submit();" href="{{ route('logout') }}" data-toggle="modal"
                                        data-dismiss="modal">Sign Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
				</ul>
			</li>
		</ul>
	</div>
