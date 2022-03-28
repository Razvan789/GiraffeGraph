
<?php  if (isset($messages) && count($messages) > 0) : ?>
  <div class="msg">
  	<?php foreach ($messages as $message) : ?>
  	  <span style="color:green"><?php echo $message ?></span>
  	<?php endforeach ?>
  </div>
<?php  endif ?>
<?php  if (isset($errors) && count($errors) > 0) : ?>
  <div class="msg">
  	<?php foreach ($errors as $error) : ?>
  	  <span style="color:red"><?php echo $error ?></span>
  	<?php endforeach ?>
  </div>
<?php  endif ?>