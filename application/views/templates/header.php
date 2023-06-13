<!DOCTYPE html>
<html>
	<head>
		<title>Blog</title>
		<link
			rel="stylesheet"
			href="https://bootswatch.com/3/flatly/bootstrap.min.css"
		/>
		<link 
			rel="stylesheet"
			href="<?php echo base_url('assets/style.css')?>"
		/>
		
	<body>
		<nav class="navbar navbar-inverse">
			<div class="container">
				<div class="navbar-header">
					<a href="<?php echo base_url();?>" class="navbar-brand">Blog</a>
				</div>
				<div id="navbar">
					<ul class="nav navbar-nav">
						<li><a href="<?php echo base_url(); ?>">Home</a></li>
						<li><a href="<?php echo base_url('/about'); ?>">About</a></li>
						<li><a href="<?php echo base_url('/posts'); ?>">Posts</a></li>
						<li><a href="<?php echo base_url('/categories'); ?>">Categories</a></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo base_url('posts/create'); ?>">Create Post</a></li>
					<li><a href="<?php echo base_url('categories/create'); ?>">Create Category</a></li>
					</ul>
				</div>
			</div>
		</nav>

        <div class="container">
       
