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
- **Report\Mysql** should set report about *DB* acions (insert, update, delete,...)
- **Report\File** should set report about acions with *FILES* (delete, upload, move,...)
- **Report\Form** should set report about *FORM* actions (input is empty,...)

## STATE
Every group report has special class inherits `\Report\Action`. That is because every goup need to be solved differently.
- **success** when action was successfull
- **info** when you want inform user about something
- **fail** when action failed

## MSG
Text which will be shown user after his action. They are saved in JSON file in the same folder as method.\n
```JSON
{
	"action": {
		"fail":{
			"0": "Something goes WRONG!",
			"duplicit": "0% 1% already exist"
		},
		"info":{
			"0": "Nothig is happend."
		},
		"success":{
			"0": "Everything happend successfully."
		}
	}
}

```
1) First level say which `group` of answers you want
2) Second level is `state`: How action happend
3) Third level `type` say what specifically happend. But if that `type` is not found it will use `type = 0`

More information in class [\REPORT\ACTION](https://github.com/Zerig/report/blob/master/ACTION.md)

## TYPE
Say what specifically happend
- duplicit item
- file exist
- file has no permission to remove

They can be as a shortcut `'duplicit'`, or code `'1062'`. And if `type` is not found in **JSON** it will use `type = 0`.


## NUM
Number of items in action. How manz items was changed during MYSQL query. How many files was uploaded...
