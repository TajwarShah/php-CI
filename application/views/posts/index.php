<h2><?php echo $title?></h2>


<table class="table table-dark">
	<thead>
		<tr>
			<th scope="col">Post Title</th>
			<th scope="col">Post Image</th>
			<th scope="col">Posted on</th>
			<th scope="col">Category</th>
			<th scope="col">Post Content</th>
			<th scope="col">Actions</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($posts as $post) : ?>
		<tr>
			<th scope="row">
				<?php echo $post['title']?>
			</th>
			<td>
				<img src="<?php echo site_url();?>assets/images/posts/<?php echo $post['post_image'];?>">
			</td>
			<td class="posts-date">
                <?php $date=date_create($post['create_at']);?>
				<?php echo date_format($date, 'Y/m/d')?>
			</td>
			<td>
				<i><?php echo $post['name']; ?></i>
			</td>
			<td>
				<?php echo word_limiter($post['body'], 40);?>
			</td>
            <td class="action-buttons">
                <a class="btn btn-primary action-buttons" href="<?php echo site_url('posts/' . $post['slug'])?>">View</a>
            </td>
            <td class="action-buttons">
                <a class="btn btn-warning action-buttons" href="<?php echo site_url('posts/update/' . $post['slug'])?>">Update</a>
            </td>
            <td class="action-buttons">
                <a class="btn btn-danger" href="<?php echo site_url('posts/delete/' . $post['postID'])?>">Delete</a>
            </td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
