# README

Install the plugin to WordPress

Open and edit template.php file

To enable incline editing add to container of field value:


```php
<?php echo acf_content_editing('FIELD_NAME'); ?>
```

Example:

```php
<p <?php echo acf_content_editing('message'); ?>><?php echo esc_html( $message ); ?></p>
```
