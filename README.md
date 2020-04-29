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

### GROUP
Every group report has special class inherits `\Report\Action`. That is because every goup need to be solved differently.
- **Report\Mysql** should set report about *DB* acions (insert, update, delete,...)
- **Report\File** should set report about acions with *FILES* (delete, upload, move,...)
- **Report\Form** should set report about *FORM* actions (input is empty,...)

### STATE
Every group report has special class inherits `\Report\Action`. That is because every goup need to be solved differently.
- **success** when action was successfull
- **info** when you want inform user about something
- **fail** when action failed

### MESSAGE
Every group report has special class inherits `\Report\Action`. That is because every goup need to be solved differently.
- **success** when action was successfull
- **info** when you want inform user about something
- **fail** when action failed
