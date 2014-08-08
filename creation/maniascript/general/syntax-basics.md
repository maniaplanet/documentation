---
layout: default
title: ManiaScript syntax basic
description: ManiaScript syntax basic
tags:
- creation
- maniascript
---

ManiaScript Syntax basics
=====

Maniascript is a powerful scripting language for ManiaPlanet games, you can write new games modes, plugins for the map editor, or make you manialinks more interactive.

If you have programmed before, the basic keywords and language syntax should be quite easy to master.

Filename extension for scripts is ".script.txt"

Where to write your script ?
=====

The way to create or change a script depends on the type of script you want.
 - To edit a GameMode, launch a solo or LAN game, and press Ctrl + ScrollLock. If you want to create a new one, lanch an existing one, then press Ctrl + ScrollLock, then SaveAs with a new name.
 - To edit or create an mapeditor plugin, use the plugin menu (the "fork" icon) in the editor
 - To have a script in a manialink XML file, add a <script> ... </script> part in the manialink XML file
 
 To learn more about those different contexts, see {{./script-contexts.md}}

Basics
=====

A script is a text, composed by lines (aka, instructions). Instructions are separated by semicolons, as in C/C++.
It looks like
```{C}
declare MyVar = 12;
MyVar += 1;
DoSomething(MyVar);
```
Beware : Case is important, always !

## Simple data Types

* Boolean : can be either True or False
* Integer : numbers such as 2 or -5 or 31337
* Real : decimal numbers such as -4.2 or 99. (do not forget the final dot, because 99 is an Integer. Beware, those are different)
* Text : any character sequence between double quotes : "plop" "gouzi" or "456.32". 

Protips :
- inside a Text, The usual escape sequences such as "\n" or "\\" are supported.
- you can also declare a Text value between 3 double quotes. When doing so, you won't need to escape chars, and it can expand on many lines. """plop="452.12.22" toto"""

## Variable declaration
In Maniascript, variables must be declared, either by specifying a Type, or an initial value :
`declare Integer MyVariable;`
or
`declare MyVariable = 42.;`

After having declared a variable, you'll be able to use it to store data. 
If the variable is defined as a Integer, you will never be able to store anything else inside. The same goes for other types. 

Protip : Variables are always defined and initialized when declared, meaning they always have a valid value. If not specified, this value will be a default value for the current type.

## Variable affectation
Once declared, you can change the value of a variable with a single equal sign : 
`MyVariable = 13+37;`
As said earlier, the types must match. No implicit conversions are made.

## Comments
Anything right of a double slash // is a comment
Anything between /* and */ is also a comment
```{C}
Var = 2 + 5; // This is a comment
Var = 2 /* This is a comment */ + 5;
```
