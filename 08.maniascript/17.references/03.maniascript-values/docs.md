---
title: 'ManiaScript values'
taxonomy:
    category:
        - docs
---

Boolean
======
simply a boolean value:
which can be either True or False
example:

```
declare Boolean testValue= False;
delcare Boolean testValue2 = True;

```

Text
=====
Text is basically a string value known from many other languages. The maniascript doesn't have value for character, and text is always defined in double quotes ".

You can also use triple quotes to mark multiline text.

Triple curly brackets to escape the quotes for variables:

example: 

```
declare Text description = """ Hello {{{name}}},
How are you today ? """;
You can use ^ operator to join a Text with another Text or numeric value.
In Text a newline can be used "\n" and you can also escape with "\\".

examples:
declare Text name = "ManiaPlanet";
declare Text test = "Hello" ^ name;
log(test) // output: Hello ManiaPlanet

```

Integer 
======
Integers is a somewhat small numeric values (max value being 2147483647), which doesn't have floating point part on it.
example:


```
declare Integer number = 1;

```

Real
========
Real is a real number which has floating point values too, actually you have to use floating point in this type.
example:


```
declare Real number2 = 7.0;

```

Int3, Vec2 and Vec3
========
These are vector values.

example:

```
declare Vec3 test = <2. , 2. , 2. >;
declare Int3 colorValue = <0, F, 0>
delcare Vec2 area = <12.0, 15.0>

```

Void 
========

Void is used to mark a function return value, when the function doesn't return anything.

Ident 
========
>>>> todo: write about ident

Null 
========
Null is a empty or unassigned value.

NullId 
========
>>>> todo: write about nullid