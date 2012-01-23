<h2>Read Item</h2>

<?php if (empty($itemArray)) : ?>
	<p>
		No items found.
	</p>
<?php else: ?>

	<?php foreach ($itemArray as $item) : ?>
	<ul>
		<li>
			<?php echo $item;?>
			<br />
			<a href="/item/update/<?php echo $item->getId(); ?>">Update Item</a>
			<br />
			<a href="/item/delete/<?php echo $item->getId(); ?>">Delete Item</a>
		</li>
	</ul>
	<?php endforeach; ?>

<?php endif; ?>