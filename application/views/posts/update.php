<h2><?= $title?></h2>

<?php echo form_open('posts/edit'); ?>
<input type="hidden" name='id' value="<?php echo $post['id']; ?>">
  <div class="form-group">
    <label>Title</label>
    <input type="text" name="title" class="form-control" placeholder="Add Title" value="<?php echo $post['title']?>">
  </div>
  <div class="form-group">
    <label>Body</label>
    <textarea name="body" class="form-control"  placeholder="Add Body" rows="10"><?php echo $post['body'];?></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>