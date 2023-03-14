# README

Install the plugin to WordPress

Open and edit template.php file

To enable incline editing add to container of field value:


```php
<?php echo acf_content_editing('FIELD_NAME'); ?>
```

Example:

```php
<?php

$user_name = get_field( 'user_name' );
$message = get_field( 'message' );
?>
<div class="block-testmonials-item">
	<div class="post-info">
		<div class="middle-area">
			<a class="name" href="#">
				<b <?php echo acf_content_editing('user_name'); ?> >
					<?php echo esc_html( $user_name ); ?>
				</b>
			</a>
		</div>
	</div>

	<p <?php echo acf_content_editing('message'); ?>><?php echo esc_html( $message ); ?></p>
</div>
```
