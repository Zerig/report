# REPORT
Report namespace set and collect **action reports**, which should be shown by visitor. Without this user cannot know what happend. If his action was succesfull or failed.\n
For example: 'Item was successfully updated'.

## rData($array)
Instance of this class represents one action report. There is everything what visitor needs to see.
```php
\Report\rDATA([
	"group" => "action",               // GROUP of REPORT => mysql, file, form, ...
	"state" => "fail",                 // How action END => success, info, fail
	"msg"   => "This action failed.",  // Message what happend
	"type"  => 0,                      // CODE or NAME of GROUP action => 1062, insert, upload,...
	"num"   => 1                       // How many items was in action
]);

```

## GROUP
Every group report has special class inherits `\Report\Action`. That is because every goup need to be solved differently.
