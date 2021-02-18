<h2><?= $title; ?></h2>

<?php echo validation_errors('<div class="alert alert-danger col-md-4 mx-auto">', '</div>'); ?>

<div class="row">
  <div class="col-md-6 mx-auto">
<?php echo form_open_multipart('posts/update'); ?>
    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
  <fieldset>
    <div class="form-group">
      <label>Title</label>
      <input type="text" class="form-control" name="title" aria-describedby="titleHelp" placeholder="Edit Title" value="<?php echo $post['title']; ?>">
      <small id="titleHelp" class="form-text text-muted">You must have a title for your video.</small>
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea class="form-control" name="description" aria-describedby="descriptionHelp"  placeholder="Edit Description">
      <?php echo $post['description']; ?></textarea>
      <small id="descriptionHelp" class="form-text text-muted">You must have a description for your video.</small>
    </div>
    <div class="form-group">
        <label>Select a Category</label>
        <select class="custom-select cc_cursor" name="category_id" aria-describedby="selectHelp">
            <?php foreach($categories as $category) : ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <small id="selectHelp" class="form-text text-muted">You must choose a category for your video.</small>
    </div>

    <!-- <div class="form-group">
      <label>Upload Cover Image</label>
      <input type="file" class="form-control-file cc_cursor" name="userfile" aria-describedby="imageHelp" value="?php echo $post['post_image']; ?>">
      <small id="imageHelp" class="form-text text-muted">Choose a cover image for your video.</small>
    </div> -->
 



    <button type="submit" class="btn btn-secondary">Sumbit</button>
  </fieldset>
            </div>
            </div>

</form>