# CONSOLE \ LOG
Works with data which could be helpful during creating system. This is a helpful class it doesn´t need nothing, but the others needs it.




## ::mysql($sql)
collect information about sql activity.
```php
\Console\Log::mysql("
	SELECT *
	FROM table
");
```

## ::include($page_name)
collect information about page include.
```php
\Console\Log::include("index.php");
```
