<h2>Item list view</h2>

<?php if (isSet($deletedItem)) : ?>
	<p>
		Item <?php echo $deletedItem->getId();?> was deleted.
	</p>
<?php endif; ?>

<a href="/item/create">Create Item</a>

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
			<a href="/item/read/<?php echo $item->getId(); ?>">Read Item</a>
			<br />
			<a href="/item/read/<?php echo $item->getId(); ?>">Update Item</a>
			<br />
			<a href="/item/delete/<?php echo $item->getId(); ?>">Delete Item</a>
		</li>
	</ul>
	<?php endforeach; ?>

<?php endif; ?>