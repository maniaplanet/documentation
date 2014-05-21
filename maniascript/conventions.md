---
layout: static
title: ManiaScript style contention
description: ManiaScript style contention
---

## File

* ManiaScript files MUST use **LF** line ending.
* ManiaScript files MUST use UTF-8 encoding without BOM.

## Variables

* Global variable names MUST be prefixed by `G_`
* ALL variables MUST use CamelCase.

## Functions

* Functions argument MUST start with an underscore (_) and start with upper case. 
* Functions MUST be prefixed with an identifier followed by an underscore (_). Usually the name of the library. 
* Opening braces for functions MUST go on the same line, and closing braces MUST go on the next line after the body.
* Private function MUST be prefixed by `Private_`

## Control structures


Control structures are: if, else if, switch, while, foreach.

* There MUST be one space after the control structure keyword
* There MUST NOT be a space after the opening parenthesis
* There MUST NOT be a space before the closing parenthesis
* There MUST be one space between the closing parenthesis and the opening brace
* The structure body MUST be indented once
* The closing brace MUST be on the next line after the body

## Example, file libFoo.Script.Txt

{% highlight js %}
Text Foo_DoSomething(Integer _Id) {
	declare Text Result;
	if (_Id == 42) {
		Private_Foo_DoNothing();
		Result = "42";
	} else {
		Result = "";
	}
	return Result;
} 
Void Private_Foo_DoNothing() {
}
{% endhighlight %}