<h2>Listing Comments</h2>
<br>
<?php if ($comments): ?>
<table class="zebra-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Website</th>
			<th>Message</th>
			<th>Post id</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($comments as $comment): ?>		<tr>

			<td><?php echo $comment->name; ?></td>
			<td><?php echo $comment->email; ?></td>
			<td><?php echo $comment->website; ?></td>
			<td><?php echo $comment->message; ?></td>
			<td><?php echo $comment->post_id; ?></td>
			<td>
				<?php echo Html::anchor('admin/comments/view/'.$comment->id, 'View'); ?> |
				<?php echo Html::anchor('admin/comments/edit/'.$comment->id, 'Edit'); ?> |
				<?php echo Html::anchor('admin/comments/delete/'.$comment->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

			</td>
		</tr>
<?php endforeach; ?>	</tbody>
</table>

<?php else: ?>
<p>No Comments.</p>

<?php endif; ?><p>
	<?php echo Html::anchor('admin/comments/create', 'Add new Comment', array('class' => 'btn success')); ?>

</p>
