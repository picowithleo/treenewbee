<h2 class="display-3"><?php echo $title ?></h2>
  
  <hr>
<div class="container bootstrap snippet">
    <div class="row profile-header">
        <div class="col-sm-10 profile-username">
            <h1><strong><?php echo $user->username ?></strong></h1>
        </div>
        
        <div class="col-sm-2">
            <div class="user-pic">
                <?php if($user->avatar) { ?>
                    <img title="profile image" class="img-circle img-responsive" 
                    src="<?php echo base_url('uploads/'.$user->avatar) ?>">
                <?php } else {?>
                    <img title="profile image" class="img-circle img-responsive" 
                    src="<?php echo base_url('assets/images/posts/noimage.png') ?>">
                <?php } ?>
            </div>
            <br />
            <a href="<?php echo site_url('users/upload') ?>" class="btn btn-success btn-block">Upload Image</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <!--left col-->

            <ul class="list-group">
                <li class="list-group-item text-muted active">Profile <i class="fa fa-address-card fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span>
                    <?php $originalDate = $user->register_date;
                        echo date("d-m-Y", strtotime($originalDate));
                    ?>
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span>
                    <?php  $format = "%d-%m-%Y";
                        echo mdate($format);
                    ?>
                </li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span>
                    <?php echo $user->first_name . " " .  $user->last_name ?>
                </li>

            </ul>

            <ul class="list-group">
                <li class="list-group-item text-muted active">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span>0</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 0</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 8</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 0</li>
            </ul>

        </div>

        <!--/col-3-->
        <div class="col-sm-9">

            <ul class="nav nav-tabs" id="myTab">
                <li class="nav-item"><a class="nav-link active" href="#channel" data-toggle="tab">My Channel</a></li>
                <li class="nav-item"><a class="nav-link" href="#subscriptions" data-toggle="tab">Subscriptions</a></li>
                <li class="nav-item"><a class="nav-link" href="#history" data-toggle="tab">History</a></li>
                <li class="nav-item"><a class="nav-link" href="#bookmarks" data-toggle="tab">Bookmarks</a></li>
                <li class="nav-item"><a class="nav-link" href="#contribute" data-toggle="tab">Contribute</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane active" id="channel">
                    <div>
                        
                     



                    </div>
                    

                    <hr>

                </div>

                <div class="tab-pane" id="subscriptions">
                    <div>
                        
                     


                    
                    </div>
                    

                    <hr>
                </div>

                <div class="tab-pane" id="history">
                    <div>
                        
                     


                    
                    </div>
                    

                    <hr>
                </div>

                <div class="tab-pane" id="bookmarks">
                    <div>
                        
                     


                
                    </div>
                    

                    <hr>
                </div>

                <div class="tab-pane" id="contribute">
                    <div>
                        
                     


                    
                    </div>
                    

                    <hr>

                </div>
               
                <!--/tab-pane-->

               

                <div class="tab-pane" id="settings">
                    <br>
                    <form class="" action="<?php echo base_url() ?>profile/index" method="post">
                        <!-- username is disable -->
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="username"><strong>Username</strong></label>
                                <input type="text" class="form-control" name="username" id="username" value="<?= set_value('username', $user->username) ?>">
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="first_name"><strong>First Name</strong></label>
                                <input type="text" class="form-control" name="first_name" id="first_name" value="<?= set_value('first_name', $user->first_name)?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="last_name"><strong>Last Name</strong></label>
                                <input type="text" class="form-control" name="last_name" id="last_name" value="<?= set_value('last_name', $user->last_name)?>">                            
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="mobile"><strong>Mobile</strong></label>
				                <input type="text" class="form-control" name="mobile" readonly id="mobile" value="<?= $user->mobile ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="email"><strong>Email</strong></label>
                                <input type="text" class="form-control" name="email" readonly id="email" value="<?= $user->email ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-xs-6">
                                <label for="password"><strong>Password</strong></label>
                                <input type="text" class="form-control" name="password" id="password" value="">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6">
                                <label for="password2"><strong>Confirm Password</strong></label>
				                <input type="text" class="form-control" name="password2" id="password2" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <input type="hidden" name="hidden_id" value="<?php echo $user->id; ?>" />  
                                <button class="btn btn-lg btn-success" type="submit">Save</button>
                                <button class="btn btn-lg btn-secondary" type="reset">Reset</button>
                            </div>
                        </div>

                    </form>
               
                    <hr>
                </div>

            </div>
            <!--/tab-pane-->
        </div>
        <!--/tab-content-->

    </div>
    <!--/col-9-->
</div>
<!--/row-->