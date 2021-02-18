<div class="">
	<div class="col-md-9 mx-auto">
<h2 class="display-3"><?= $title ?></h2>

<?php foreach($posts as $post) : ?>
    <h3><?php echo $post['title']; ?></h3>
    <div class="mb-5">
        <div class="col-sm-3">
            <!-- src="?php echo site_url(); ? -->
            <!-- <img class="post-thumb" src="http://localhost/project/assets/images/posts/?php echo $post['post_image']; ?>"> -->
            <video class="post-thumb" controls>
                <source src="<?php echo site_url(); ?>assets/videos/posts/<?php echo $post['post_video'] ; ?>">
                
            </video>
        </div>
        <div class="col-sm-6">
            <small class="post-date">Posted on: <?php echo $post['created_at']; ?> in <strong><?php echo $post['name']; ?></strong></small><br>
            <?php echo word_limiter($post['description'], 10); ?>
            <br><br>
            <p><a class="btn btn-outline-info" href="<?php echo site_url('posts/'.$post['slug']); ?>">
            Read More</a></p>
        </div>
    </div>
<?php endforeach; ?>

</div>
</div>