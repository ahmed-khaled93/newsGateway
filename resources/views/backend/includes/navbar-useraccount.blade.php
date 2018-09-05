
<li class="dropdown user user-menu">
         
	    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
	      <img src="/backend/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
	      <span class="hidden-xs"> {{ Auth::user()->name }} </span>
	    </a>
	    
	    <ul class="dropdown-menu">
		
		    <!-- User image -->
		    <li class="user-header">
		        <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

		        <p>
		          {{ Auth::user()->name }} - Web Developer
		          <!-- <small>Member since Nov. 2012</small> -->
		        </p>
		    
		    </li>
		    
		      <!-- Menu Body -->
		    <li class="user-body">
		
		        <div class="row">
		          <div class="col-xs-4 text-center">
		            <a href="#">Followers</a>
		          </div>
		          <div class="col-xs-4 text-center">
		            <a href="#">Sales</a>
		          </div>
		          <div class="col-xs-4 text-center">
		            <a href="#">Friends</a>
		          </div>
		        </div>
		        <!-- /.row -->
		
		    </li>
		    
		      <!-- Menu Footer-->
		    <li class="user-footer">
		
		        <div class="pull-left">
		          <a href="#" class="btn btn-default btn-flat">Profile</a>
		        </div>
		        <form method="Post" action="{{ route('logout') }}">
		        	{{ csrf_field() }}
		        <div class="pull-right">
		        	<input type="submit" name="Logout" value="Sign out" class="btn btn-primary btn-flat">
		          
		        </div>
		        </form>
		    </li>
	    
	    </ul>
	    
          
</li>