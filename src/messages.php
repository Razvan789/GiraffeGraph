
<?php  if (count($errors) > 0) : ?>
  <div class="msg" style="margin:20px">
  	<?php foreach ($errors as $error) : ?>
  	  <span><?php echo $error ?></span>
  	<?php endforeach ?>
  </div>
<?php  endif ?>