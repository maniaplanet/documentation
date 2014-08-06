---
layout: default
title: ManiaScript style convention
description: ManiaScript style convention
tags:
- creation
- maniascript
---

## File

* ManiaScript files MUST use **LF** line ending.
* ManiaScript files MUST use UTF-8 encoding without BOM.
* ManiaScript files names MUST use CamelCase.
* ManiaScript files extension MUST be `.Script.txt`

## Settings

* Settings names MUST be prefixed by `S_`
* ALL settings MUST use CamelCase.

## Constants

* Constants names MUST be prefixed by `C_`
* ALL constants MUST use CamelCase.

## Variables

* Globals variables names MUST be prefixed by `G_`
* ALL variables MUST use CamelCase.
* Variables declared `for` something MUST be prefixed to avoid name collision.
* `netwrite` and `netread` variable MUST be prefixed by `Net_`

## Functions

* Functions argument MUST start with an underscore (_) and start with upper case. 
* Opening braces for functions MUST go on the same line, and closing braces MUST go on the next line after the body.
* Private function MUST be prefixed by `Private_`

## Control structures

Control structures are: if, else if, else, switch, while, foreach, for.

* There MUST be one space after the control structure keyword
* There MUST NOT be a space after the opening parenthesis
* There MUST NOT be a space before the closing parenthesis
* There MUST be one space between the closing parenthesis and the opening brace
* The structure body MUST be indented once
* The closing brace MUST be on the next line after the body

## Example, file LibFoo.Script.txt

{% highlight js %}
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
		declare Text LibFoo_VariableForSomehting for Player;
		VariableForSomehting = "42";

		declare netwrite Integer Net_LibFoo_Variable for Player;
		Net_LibFoo_Variable = 42;
	}

	return Result;
} 
{% endhighlight %}