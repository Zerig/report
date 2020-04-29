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

## MESSAGE
Text which will be shown user after his action.

```JSON
{
	"action": {
		"fail":{
			"0": "Něco se pokazilo!"
		},
		"info":{
			"0": "Nic neproběhlo."
		},
		"success":{
			"0": "Vše proběhlo v pořádku."
		}
	},
	"mysql": {
		"fail":{
			"0":		"Něco se pokazilo!",
			"1062": 	"Duplicita: %0 <i>%1</i> již existuje!"
		},
		"info":{
			"0":		"Akce nebyla provedena, něco neplatí!",
			"update":	"%0 <i>%1</i> nemůže být upraven/a, protože neexistuje!",
			"delete":	"%0 <i>%1</i> nemůže být smazán/a, protože neexistuje!",
			"select":	"Nebyl/a nalezen/a žádný/á %s!"
		},
		"success":{
			"0":		"Vše proběhlo v pořádku.",
			"insert":	"%0 <i>%1</i> byl/a úspěšně přidána.",
			"update":	"%0 <i>%1</i> byl/a úspěšně upraven/a.",
			"delete":	"%0 <i>%1</i> byl/a úspěšně smazána.",
			"select":	"%0 <i>%1</i> byl/a úspěšně nalezen/a."
		}
	},
	"file": {
		"fail":{
			"0":	"Něco se pokazilo",
			"1062": "Duplicitní Položka: <i>%s</i> již existuje!",
			"1146": "Tabulka neexistuje"
		}
	}



}

```
