<?php
    date_default_timezone_set("Australia/Brisbane");
    $apikey = "ba5628091d18dd6b0f5120dfa0e869b6";
    $cityId = "2174003";
    $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&lang=en&units=metric&APPID=" . $apikey;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);

    curl_close($ch);
    $data = json_decode($response);
    $currentTime = time();

?>

<html> 
    <head>
        <title>TreeNewBee</title>   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url("assets/css/style.css"); ?>?v=<?php echo time(); ?>"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://kit.fontawesome.com/16d54b1ddb.js" crossorigin="anonymous"></script>
        <script>
            function showResult(str) {
                if (str.length==0) {
                document.getElementById("livesearch").innerHTML="";
                document.getElementById("livesearch").style.border="0px";
                return;
            }
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                document.getElementById("livesearch").innerHTML=this.responseText;
                document.getElementById("livesearch").style.border="1px solid #A5ACB2";
            }
            }
                xmlhttp.open("GET","livesearch.php?q="+str,true);
                xmlhttp.send();
            }
        </script>
        <script>
        var timer = 0;
        function set_interval() {
        timer = setInterval("auto_logout()", 5);
        }
        function reset_interval() {
        if (timer != 0) {
            clearInterval(timer);
            timer = 0;
            timer = setInterval("auto_logout()", 5);
        }
        }

        function auto_logout() {
        window.location = "<?php echo base_url(); ?>users/logout";
        }
        </script>

    </head>
    <body onload="set_interval()"
        onmousemove="reset_interval()"
        onclick="reset_interval()"
        onkeypress="reset_interval()"
        onscroll="reset_interval()">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">TreeNewBee</a>
            <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->

            <div class="report-container text-muted">
                <div class="time"> 
                    <div><?php echo $data->name; ?></div>
                    <div><?php echo date("l g:i a", $currentTime); ?></div>
                    <div><?php echo date("jS F, Y", $currentTime); ?></div>
                </div>          
                <div class="weather-forecast">
                    <img
                        src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                        class="weather-icon" /><span class="max-temperature"><?php echo $data->main->temp_max; ?>&deg;C</span><span
                        class="min-temperature"><?php echo $data->main->temp_min; ?>&deg;C</span>
                </div>
            </div>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <form class="form-inline my-2 my-lg-0 ml-auto">
                    <input class="form-control mr-sm-2" type="text" placeholder="Search" onkeyup="showResult(this.value)">
                    <div id="livesearch"></div>
                    <!-- <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button> -->
                </form>
                
                <ul class="navbar-nav ml-auto">
                    <?php if(!$this->session->userdata('logged_in')) : ?>    
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>users/login">Sign In<i class="fas fa-sign-in-alt" style="font-size: 1.5em; margin-right: 10px;" alt="Sign In"></i><span class="sr-only">(current)</span></a>
                        </li>
                    <?php endif; ?>

                    <?php if($this->session->userdata('logged_in')) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>profile/index"><i class="fas fa-user" style="font-size: 1.5em; margin-right: 10px;" alt="Profile"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>posts"><i class="fas fa-bell" style="font-size: 1.5em; margin-right: 10px;" alt="Notification"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>profile/index"><i class="fas fa-history" style="font-size: 1.5em; margin-right: 10px;" alt="History"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>profile/index"><i class="fas fa-bookmark" style="font-size: 1.5em; margin-right: 10px;" alt="Bookmark"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>posts/create"><i class="fas fa-upload" style="font-size: 1.5em; margin-right: 10px;" alt="Upload"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url(); ?>users/logout"><i class="fas fa-sign-out-alt" style="font-size: 1.5em; margin-right: 10px;" alt="Log Out"></i></a>
                        </li>
                    <?php endif; ?>
                </ul>
               
            </div>
        </nav>

        <div>
            
                <!-- // $data['categories'] = $this->category_model->get_categories();
                // $this->load->view('categories/index', $data);
                $this->view('categories/index'); -->
            <ul class="nav nav-tabs justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url(); ?>home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"  href="<?php echo site_url('/categories/posts/1'); ?>">
                    <?php echo 'Anime'; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/categories/posts/2'); ?>">
                    <?php echo 'Movie'; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/categories/posts/3'); ?>">
                    <?php echo 'Drama'; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/categories/posts/4'); ?>">
                    <?php echo 'Music'; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/categories/posts/5'); ?>">
                    <?php echo 'Dance'; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/categories/posts/6'); ?>">
                    <?php echo 'Sport'; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/categories/posts/7'); ?>">
                    <?php echo 'Technology'; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo site_url('/categories/posts/8'); ?>">
                    <?php echo 'Entertainment'; ?></a>
                </li>
            </ul>
        
        </div>

    
        <div class="container pt-2">
            <div class="row">
                <div class="col-md-4 mx-auto">
                   
                <!-- Flash messages -->
                    <?php if($this->session->flashdata('user_registered')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('login_failed')): ?>
                        <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('user_loggedin')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
                    <?php endif; ?>
                    <?php if($this->session->flashdata('user_loggedout')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
                    <?php endif; ?>
                    
                    <?php if($this->session->flashdata('post_created')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('post_updated')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('post_deleted')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('avatar_uploaded')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('avatar_uploaded').'</p>'; ?>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('profile_uploaded')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('profile_uploaded').'</p>'; ?>
                    <?php endif; ?>

                    <?php if($this->session->flashdata('profile_uploaded_failed')): ?>
                        <?php echo '<p class="alert alert-success">'.$this->session->flashdata('profile_uploaded_failed').'</p>'; ?>
                    <?php endif; ?>


            <!-- <div class="d-flex justify-content-center">
              <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                  <span class="sr-only">Loading...</span>
                </div>
           </div> -->
                </div>
            </div>
        </div>

        <div class="main">
