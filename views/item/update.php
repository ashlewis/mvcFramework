<h2>Item / Update view</h2>

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

<form method="post" action="">
	<fieldset>
		<legend>Add/Edit item</legend>
		<div>

			<label for="name">Name:</label>
			<input type="text" id="name" name="name" value="<?php echo $item->getName(); ?>" />
			<?php if (isset($formErrors) && array_key_exists('name', $formErrors)) :?>
				<span><?php echo $formErrors['name']; ?></span>
			<?php endif;?>
		</div>
		<div>

			<label for="description">Description:</label>
			<input type="text" id="description" name="description" value="<?php echo $item->getDescription(); ?>"/>
			<?php if (isset($formErrors) && array_key_exists('description', $formErrors)) :?>
				<span><?php echo $formErrors['description']; ?></span>
			<?php endif;?>
		</div>
		<input type="hidden" name="id" value="<?php echo $item->getId(); ?>" />
		<input type="submit" name="submit" value="Add item" />
	</fieldset>
</form>