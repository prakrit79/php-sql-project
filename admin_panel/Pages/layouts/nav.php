<div class="nav">
    <div class="nav-top">
        <img src=<?= HTTP.'public_html/Assets/'.Session::get('image_logged_in');?> >
        <h4><?= Session::get('username_logged_in'); ?></h4>
        <p><?= Session::get('email_logged_in'); ?></p>
    </div>

    <div class="navlinks">
        <div class="search-box">
            <form>
                <input type="text" class="search" placeholder="Search">
            </form>
        </div>
        <div class="menu">
            <ul>
                <li><a href="_main_layout.php?page=dashboard"><i class="glyphicon glyphicon-cloud"> </i> Dashboard</a></li>

                <?php if($_SESSION['privilige_logged_in']=='admin'){ ?>
                <li class="drop-down"><a href=""><i class="glyphicon glyphicon-user"> </i>  User</a>
                    <ul>
                        <li><a href="_main_layout.php?page=addUser"><i class="fa fa-plus"></i> Add User</a></li>
                        <li><a href="_main_layout.php?page=users"><i class="fa fa-user"></i> Users</a></li>
                    </ul>
                </li>
                <?php }   ?>
               

                <li class="drop-down"><a href=""><i class="glyphicon glyphicon-new-window"> </i>  Slider</a>
                    <ul>
                        <li><a href="_main_layout.php?page=add-slider"><i class="fa fa-plus"></i>Add Images</a></li>

                        <li><a href="_main_layout.php?page=sliders"><i class="fa fa-plus"></i> Images</a></li>
                        <li><a href="_main_layout.php?page=add-category"><i class="fa fa-plus"></i> Add News Category</a></li>
                    </ul>
                </li>



                <li class="drop-down"><a href=""><i class="glyphicon glyphicon-new-window"> </i>  News</a>
                    <ul>
                        <li><a href="_main_layout.php?page=news"><i class="fa fa-plus"></i>News</a></li>

                        <li><a href="_main_layout.php?page=add-news"><i class="fa fa-plus"></i> Add News</a></li>
                        <li><a href="_main_layout.php?page=add-category"><i class="fa fa-plus"></i> Add News Category</a></li>
                    </ul>
                </li>

                <li><a href=""><i class="glyphicon glyphicon-globe"> </i>  Visit Site</a></li>
                <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"> </i>  Log Out</a></li>

            </ul>
        </div>
    </div>
</div><!--end of navigation-->