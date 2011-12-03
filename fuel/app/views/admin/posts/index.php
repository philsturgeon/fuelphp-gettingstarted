<h2>Listing Posts</h2>
<br>
<?php if ($posts): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Title</th>
			<th>Slug</th>
			<th>Summary</th>
			<th>Body</th>
			<th>User id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($posts as $post): ?>		<tr>

			<td><?php echo $post->title; ?></td>
			<td><?php echo $post->slug; ?></td>
			<td><?php echo $post->summary; ?></td>
			<td><?php echo $post->body; ?></td>
			<td><?php echo $post->user_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/posts/view/'.$post->id, 'View'); ?> |
				<?php echo Html::anchor('admin/posts/edit/'.$post->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/posts/delete/'.$post->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Posts.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/posts/create', 'Add new Post', array('class' => 'btn success')); ?>

</p>
