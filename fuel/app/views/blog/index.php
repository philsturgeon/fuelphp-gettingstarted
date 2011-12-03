<h2>Recent Posts</h2>

<?php foreach ($posts as $post): ?>

	<h3><?php echo Html::anchor('blog/view/'.$post->slug, $post->title) ?></h3>
	
	<p><?php echo $post->summary ?></p>

<?php endforeach; ?>