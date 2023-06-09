<h2><?= $title?></h2>

<!-- <?php echo validation_errors();?> -->

<?php echo form_open('posts/create'); ?>
  <div class="form-group">
    <label>Title</label>
    <?php echo form_error('title'); ?>
    <input type="text" name="title" value="<?php echo set_value('title'); ?>" class="form-control" placeholder="Add Title">
  </div>
  <div class="form-group">
    <label>Body</label>
    <?php echo form_error('body'); ?>
    <textarea name="body" class="form-control" value="<?php echo set_value('body'); ?>" rows="10" placeholder="Add Body"></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
