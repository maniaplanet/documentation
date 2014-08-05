ManiaScript, scripting language for ManiaPlanet games
=========

Maniascript is a powerful scripting language for ManiaPlanet games, you can write new games modes, write a plugins for map editor + game and do interactions to manialinks.

If you have programmed before, the basic keywords and language syntax should be quite easy to master.

Filename extension for plugins and game modes is ".script.txt"

Debugging
========
Debug consoles: `Ctrl - G` (and `Ctrl - ~`)
you can write debug with function 

	log();

Escaping from Manialink
=======

There are two ways for specifying your ManiaScript in a ManiaLink XML file:
1. XML comment
Surround the script with the XML comment tags. Make sure the script itself does not contain "-->" or it will break the XML file.
<script><!--
*your script here*
--></script>

2. CDATA block
Define the script as a CDATA block. If the string "]]>" occur within your script, replace it with "]]]]><![CDATA[>" to keep the XML file valid.
<script><![CDATA[
*your script here*
]]></script>
Maniascript language structure
=====
Maniascript script file is composed from instructions. Whitespace for instructions is ignored.
One line of script usually contains one instruction, and one instruction is terminated with a semicolon.Worth mentioning is, that ManiaScript is fully 

case sensitive language, so keyword "Declare" will cause parse error, when "declare" will do a variable for you.
Instructions can be a function call, mathematical expression, logical expression or assigning a value typically. Mathematical expressions are parsed 

normally using math rules.
example of maniascript:
declare myVal = 5 + 5; // will assing initial value of 10
log((myVal + 5) * 10)  // will output value of 150
you can also use assinging operators for values, these are +=, -=, /= and *=
maniascript doesn't support ++ or -- incrementing, which you might be familiar from other languages.
example:
myVal += 5; // will increment by 5
myVal++;    // will cause parse error

Operators
======
Mathematical operators:
+            | add value
-             | substract value
*             | multiply value
/             | divide value
Boolean operators:
!            |  boolean "not", this will negate the boolean expression
&&        | boolean "and"
||           | boolean "or"

Comparison operators:
==        | equals
!=         | not equals
<          | less than
>          | greater than
<=        | less or equal than
>=        | greater or equal than

Incremention operators:
+=          | add value to current
-=           | substract value from current 
*=           | multiply current value
/=           | divide current value
Greater and less comparisons doesn't work with Boolean variables.

Comments in ManiaScript
========
Commenting in ManiaScript is done by adding double slashes before the instructions //, multiline comments can be done starting with /* and ending with 

*/
example:
declare Text hello = "world" // this text here will be ignored and is a comment
/* 
all this text here is a comment, and is beeing ignored from the maniascript engine
if (hello == "world") {
    do something
    }
*/

Maniascript Types
=====

Language primitive types are Boolean,Text, Integer, Real, Int3, Vec2 and Vec3, Void, Ident, Null and NullID

Boolean
======
simply a boolean value:
which can be either True or False
example:
declare Boolean testValue= False;
delcare Boolean testValue2 = True;

Text
=====
Text is basically a string value known from many other languages. The maniascript doesn't have value for character, and text is always defined in 

double quotes ".
You can also use triple quotes to mark multiline text.
Triple curly brackets to escape the quotes for variables:
example: 
declare Text description = """ Hello {{{name}}},
How are you today ? """;
You can use ^ operator to join a Text with another Text or numeric value.
In Text a newline can be used "\n" and you can also escape with "\\".

examples:
declare Text name = "ManiaPlanet";
declare Text test = "Hello" ^ name;
log(test) // output: Hello ManiaPlanet

Integer 
======
Integers is a somewhat small numeric values (max value being 2147483647), which doesn't have floating point part on it.
example:
declare Integer number = 1;

Real
========
Real is a real number which has floating point values too, actually you have to use floating point in this type.
example:
declare Real number2 = 7.0;

Int3, Vec2 and Vec3
========
These are vector values.
example:
declare Vec3 test = <2. , 2. , 2. >;
declare Int3 colorValue = <0, F, 0>
delcare Vec2 area = <12.0, 15.0>

Void 
========

Void is used to mark a function return value, when the function doesn't return anything.

Ident 
========
/* todo: write about ident */

Null 
========
Null is a empty or unassigned value.

NullId 
========
/* todo: write about nullid */

Variables
========
Variables in ManiaScript are introduced by using keyword "declare".
You can introduce the initial type of the variable and if initial type is not defined, the type will be cast from the initial value.Once the variable 

has been initialized (or cast from value) with a type, the type can't be changed afterwards. Note that, variables are always defined and initialized 

when declared, meaning they always have a valid value. If not specified, this value will be a default value for the current type.

examples: 
declare planets = 9000; // planets will be cast to Integer
planets = "9000 planets"; // this would cast an error.
declare Text serverName; // serverName initial value is now Null
serverName = "My testing server";
log(serverName ^ " has currently " ^ planets ^ "p.");

Scopes (or variable scopes)
=======
Scope in maniascript is same as many other languages, a scope is defined with curly brackets starting with { and ending with }. Variable visibility is 

limited to a scope.

Global Variables
======
Global variables are defined outside the main function and other function scopes.
example:
<?xml 
<script><!--
define Text intro = "world"; // this is considered as a global variable
main {
    define Integer number = 1; // as this is only for this function
    }
--></script>
?>

Control structures:
======

Functions
=======
[type of return value] [function name] ( TypeArg NameArg, TypeArg2 NameArg2 )  {
    [instructions]
    }
    
with exception of main function which doesn't have return value type or input values, the main function will be always run, if present.
example:
main {
    log("Hello ManiaPlanet!");       // will show brief greeting in debug console.
    }
example:
Integer Minimum (Integer A, Integer B)
{ 
    if ( A < B ) return A;
    return B;
}


Loops
======
while ( /*Boolean*/ ) {
    
    /*Instructions;*/
    
    }
for ( /*VariableName*/ , /*FirstValue*/ , /*LastValue*/ ) {
    /*Instructions;*/
}
foreach( /*Element*/  in /*Array*/ ) {
     /*Instructions;*/
}
foreach( /*Key*/ =>/*Element*/ in /*Array*/ )  {
    /*Instructions;*/ 
}


Switches
=======
if ( /* Boolean */) {
    */ instructions */
}
else {
    /* instructions */  
}
switch( /*Expression*/ )  {
case Expression1: /*Instructions;*/;
                         break;
case Expression2: /*Instructions;*/ .
                        break;
default : /*Instructions;*/
			break;
}


Preserved language keywords are:
=======

declare
return 
if 
else 
as 
in
while 
foreach 
break 
continue
sleep  
wait 
yield 
switch 
case 
default 
for 
log 
assert
netread 
netwrite  
