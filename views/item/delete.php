<h2>Item / Delete view</h2>
<p>Are you sure you want to delete the following items:</p>
<ul>
	<li><?php echo $item;?></li>
</ul>


<form action="" method="post">
	<a href="<?php echo $cancelURL;?>">Cancel delete</a>
	<input type="submit" value="Delete item" name="delete" id="delete" />
</form>