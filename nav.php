<!--Navbar-->
<nav class="navbar navbar-dark orange accent-4 z-depth-1">
    <!-- Collapse button-->
    <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
        <i class="fa fa-bars"></i>
    </button>

    <div class="container-fluid">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <!--Collapse content-->
            <div class="collapse navbar-toggleable-xs" id="collapseEx2">
            <!--Navbar Brand-->
            <a class="navbar-brand" href="#">vGMS</a>
            <!--Links-->
            <ul class="nav navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/gms/home"><i class="fa fa-home" aria-hidden="true"></i> Home <span class="sr-only">(current)</span></a>
                </li>
<!--
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
-->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-building" aria-hidden="true"></i> Modules </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/gms/showcat"><i class="fa fa-cogs" aria-hidden="true"></i> Manage Category</a>
                        <a class="dropdown-item" href="/gms/addCat"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Category </a>
                        <div class="dropdown-divider"></div>
                        
                        
                       
                        <a class="dropdown-item" href="/gms/showplatform"><i class="fa fa-cogs" aria-hidden="true"></i> Manage Platforms</a>
                        <a class="dropdown-item" href="/gms/addplatform"><i class="fa fa-plus-circle" aria-hidden="true"></i> Add Platform </a>
                        <div class="dropdown-divider"></div>
                        
                    </div>
                </li>
                
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-gamepad" aria-hidden="true"></i> Games </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/gms/showgames"><i class="fa fa-cogs" aria-hidden="true"></i> Manage Games</a>
                        <a class="dropdown-item" href="/gms/addGame"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Games </a>
                        <div class="dropdown-divider"></div>
                        
                    </div>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="/gms/searchGame"><i class="fa fa-search" aria-hidden="true"></i> Search Game</a>
                </li>
                
                <li class="nav-item dropdown hidden-sm-up">
                        <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $login_user; ?> </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <a class="dropdown-item" href="/gms/profile"><i class="fa fa-cogs" aria-hidden="true"></i> Manage Profile</a>
                            <a class="dropdown-item" href="/gms/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/gms/about"><i class="fa fa-connectdevelop" aria-hidden="true"></i> About Us </a>
                        </div>
                </li>
                
            </ul>
            
            
            
            
<div class="dropdown pull-xs-right hidden-xs-down"> 
    <ul class="nav navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $login_user; ?> </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <a class="dropdown-item" href="/gms/profile"><i class="fa fa-cogs" aria-hidden="true"></i> Manage Profile</a>
                <a class="dropdown-item" href="/gms/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/gms/about"><i class="fa fa-connectdevelop" aria-hidden="true"></i> About Us </a>
            </div>
        </li>
    </ul>          
</div>
        <!--/.Collapse content-->

    </div>
        </div>
        <div class="col-md-1"></div>
</nav>
<!--/.Navbar-->
          