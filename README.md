# WPK-Notifications

Provides an easy way for WordPress plugin developers to display admin notifications.


## Usage

```php
if (has_action('wpk_notice_error')) {
	do_action('wpk_notice_error', 'Your message here');
}

if (has_action('wpk_notice_success')) {
	do_action('wpk_notice_success', 'Your message here');
}
```
