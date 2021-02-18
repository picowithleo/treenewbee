<?php echo validation_errors('<div class="alert alert-danger col-md-4 mx-auto">', '</div>'); ?>


<?php echo form_open_multipart('users/upload'); ?>

    <fieldset>
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h4 class="text-center"><?= $title ?></h4>
                
                <div class="form-group">
                    <input type="file" class="form-control" name="userfile" aria-describedby="videoHelp">
                    <small id="videoHelp" class="form-text text-muted">Choose your image to upload.</small>
                    <br />
                    <div  class="text-warning"><?php echo $error; ?></div>
                </div>

    

                <button type="submit" class="btn btn-primary btn-block">Upload</button>
        
            
            </div>
        </div>
    </fieldset>
<?php echo form_close(); ?>