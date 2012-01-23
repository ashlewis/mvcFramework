<h2>Item list view</h2>

<?php if ($message):?>
	<div class="<?php echo $message->getType(); ?>">
		<h4><?php echo $message->getTitle(); ?></h4>
		<ul>

		<?php foreach ($message->getBody() as $messageBody) :?>
			<li><?php echo $messageBody; ?></li>
		<?php endforeach;?>
		</ul>
	</div>
<?php endif;?>

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
			<a href="/item/update/<?php echo $item->getId(); ?>">Update Item</a>
			<br />
			<a href="/item/delete/<?php echo $item->getId(); ?>">Delete Item</a>
		</li>
	</ul>
	<?php endforeach; ?>

<?php endif; ?>