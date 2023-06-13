<h2><?= $title?></h2>

<?php echo form_open_multipart('posts/edit/'); ?>
<input type="hidden" name='id' value="<?php echo $post['id']; ?>">
<input type="hidden" name='slug' value="<?php echo $post['slug']; ?>">
  <div class="form-group">
    <?php echo form_error('title'); ?>
    <label>Title</label>
    <input type="text" name="title" class="form-control" placeholder="Add Title" value="<?php echo $post['title']?>">
  </div>
  <div class="form-group">
  <?php echo form_error('body'); ?>
    <label>Body</label>
    <textarea name="body" class="form-control"  placeholder="Add Body" rows="10"><?php echo $post['body'];?></textarea>
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
        <input type="file" name="postimage" size="20">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>