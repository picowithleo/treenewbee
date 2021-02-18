<h2><?= $title; ?></h2>

<?php echo validation_errors('<div class="alert alert-dismissible alert-danger col-md-4 mx-auto">', '</div>'); ?>

<?php echo form_open_multipart('posts/create'); ?>
<div class="row">
  <div class="col-md-6 mx-auto">
    <div class="form-group">
      <label>Title</label>
      <input type="text" class="form-control" name="title" aria-describedby="titleHelp" placeholder="Add Title">
      <small id="titleHelp" class="form-text text-muted">You must have a title for your video.</small>
    </div>
    <div class="form-group">
      <label>Description</label>
      <textarea class="form-control" name="description" aria-describedby="descriptionHelp"  placeholder="Add Description"></textarea>
      <small id="descriptionHelp" class="form-text text-muted">You must have a description for your video.</small>
    </div>
    <div class="form-group">
        <label>Select a Category</label>
        <select class="custom-select cc_cursor" name="category_id" aria-describedby="selectHelp">
            <?php foreach($categories as $category): ?>
                <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
            <?php endforeach; ?>
        </select>
        <small id="selectHelp" class="form-text text-muted">You must choose a category for your video.</small>
    </div>

    <!-- <div class="form-group">
      <label>Upload Cover Image</label>
      <input type="file" class="form-control-file cc_cursor" name="userfile1" size="20" aria-describedby="imageHelp">
      <small id="imageHelp" class="form-text text-muted">Choose a cover image for your video.</small>
    </div> -->
 
    <div class="form-group">
        <label>Upload Video</label>
        <!-- <div class="input-group mb-3"> -->
        <!-- <div class="custom-file"> -->
            <input type="file" class="form-control-file cc_cursor"  name="userfile" size="20" aria-describedby="videoHelp">
            <!-- <label class="custom-file-label" for="inputGroupFile02">Choose file</label>
        </div>

        </div> -->
        <small id="videoHelp" class="form-text text-muted">Choose your video to upload.</small>
    </div>


    <button type="submit" class="btn btn-secondary">Upload</button>
            </div>

            </div>
<?php echo form_close(); ?>