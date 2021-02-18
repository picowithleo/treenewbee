<div class="col-md-6 mx-auto">
<h2 class="display-3"><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at']; ?></small><br>

<!-- <img src="http://localhost/project/assets/images/posts/?php echo $post['post_image']; ?>"> -->

<video class="post-view" controls>
    <source src="<?php echo site_url(); ?>assets/videos/posts/<?php echo $post['post_video']; ?>">
  
</video>


<div class="post-body">
    <?php echo $post['description']; ?>
</div>

<?php if($this->session->userdata('user_id') == $post['user_id']): ?>
<hr>
<?php echo form_open('/posts/delete/'.$post['id']); ?>
    <a class="btn btn-outline-warning pull-left" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Edit</a>
    <input type="submit" value="delete" class="btn btn-outline-danger">
</form>
<?php endif; ?>
<hr>

<h3>Comments</h3>
<div class="card bg-primary mb-3">
    <div class="row no-gutters">
        <?php if($comments) : ?>
            <?php foreach($comments as $comment) : ?>
                <div class="col-md-2 text-center">
                    [by <strong><?php echo $comment['name']; ?></strong>]
                </div>
                <div class="col-md-10">
                    <div class="card-body text-light">
                        <h5><?php echo $comment['body']; ?></h5><hr>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No Comments To Display</p>
        <?php endif; ?>
    </div>
</div>
<hr>
<h3>Add Comment</h3>
<?php echo validation_errors(); ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
    <div class="form-group">
        <lable>Name</lable>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <lable>Email</lable>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="form-group">
        <lable>Body</lable>
        <textarea name="body" class="form-control"></textarea>
    </div>
    <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
    <button class="btn btn-secondary" type="submit">Submit</button>
</form>
        </div>