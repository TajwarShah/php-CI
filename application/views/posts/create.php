<h2><?= $title?></h2>

<?php echo form_open_multipart('posts/create'); ?>
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
  <div class="form_group">
    <label>Category</label>
    <select name="category_id" class="form-control">
      <?php foreach ($categories as $category) :?>
        <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
      <?php endforeach;?>
    </select>
  </div>
  <div class="form-group">
        <label>Image Upload</label>
        <input type="file" name="userfile" size="20">
  </div>
  <button type="submit" class="btn btn-primary submit-btn">Submit</button>
</form>
