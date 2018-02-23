---
title: 'ManiaScript conventions'
taxonomy:
    category:
        - docs
---

## File

* ManiaScript files **MUST** use **LF** line ending.
* ManiaScript files **MUST** use UTF-8 encoding without BOM.
* ManiaScript files names **MUST** use PascalCase.
* ManiaScript files format **MUST** be `.Script.txt`

## Settings

* Settings names **should** be prefixed by `S_`
* ALL settings **should** use PascalCase.

## Constants

* Constants names **should** be prefixed by `C_`
* ALL constants **should** use PascalCase.

## Variables

* Globals variables names **should** be prefixed by `G_`
* ALL variables **should** use PascalCase.
* Variables declared `for` something **should** be prefixed to avoid name collision.
* `netwrite` and `netread` variables **should** be prefixed by `Net_`
* `persistent` variables **should** be prefixed by `Persistent_` or `P_`

## Functions

* Functions argument **should** start with an underscore (_) and start with upper case to avoid name collision. 
* Opening braces for functions **should** go on the same line, and closing braces **should** go on the next line after the body.
* Private function **should** be prefixed by `Private_`

## Control structures

Control structures are: if, else if, else, switch, while, foreach, for.

* There **should** be one space after the control structure keyword.
* There **shouldn't** be a space after the opening parenthesis.
* There **shouldn't** be a space before the closing parenthesis.
* There **should** be one space between the closing parenthesis and the opening brace.
* The structure body **should** be indented once.
* The closing brace **should** be on the next line after the body.

## Example, file LibFoo.Script.txt

```
#Const C_ConstantVariable 456

declare Integer G_GlobalVariable;

Void Private_DoNothing() {
}

Text DoSomething(Integer _Id) {
	declare Text Result;
	if (_Id == 42) {
		Private_DoNothing();
		Result = "42";
	} else {
		Result = "";
	}

	foreach (Player in Players) {
		declare Text LibFoo_VariableForSomething for Player;
		LibFoo_VariableForSomething = "42";

		declare netwrite Integer Net_LibFoo_Variable for Player;
		Net_LibFoo_Variable = 42;
	}

	return Result;
}
```
