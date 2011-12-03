<h2>Editing Comment</h2>
<br>

<?php echo render('admin/comments/_form'); ?>
<p>
	<?php echo Html::anchor('admin/comments/view/'.$comment->id, 'View'); ?> |
	<?php echo Html::anchor('admin/comments', 'Back'); ?></p>
