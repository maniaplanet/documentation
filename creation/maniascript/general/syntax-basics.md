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

A script is a text, composed by lines (aka, instructions). Instructions are separated by semicolons, as in C/C++.
It looks like
```{C}
declare MyVar = 12;
MyVar += 1;
DoSomething(MyVar);
```
Beware : Case is important, always !

### Simple data Types

* Boolean : can be either True or False
* Integer : numbers such as 2 or -5 or 31337
* Real : decimal numbers such as -4.2 or 99. (do not forget the final dot, because 99 is an Integer. Beware, those are different)
* Text : any character sequence between double quotes : "plop" "gouzi" or "456.32". 

Protips :
- inside a Text, The usual escape sequences such as "\n" or "\\" are supported.
- you can also declare a Text value between 3 double quotes. When doing so, you won't need to escape chars, and it can expand on many lines. """plop="452.12.22" toto"""

### Variable declaration
In Maniascript, variables must be declared, either by specifying a Type, or an initial value :

`declare Integer MyVariable;`
or

`declare MyVariable = 42.;`

After having declared a variable, you'll be able to use it to store data. 
If the variable is defined as a Integer, you will never be able to store anything else inside. The same goes for other types. 

Protip : Variables are always defined and initialized when declared, meaning they always have a valid value. If not specified, this value will be a default value for the current type.

### Variable affectation
Once declared, you can change the value of a variable with a single equal sign : 
`MyVariable = 13+37;`
As said earlier, the types must match. No implicit conversions are made.

### Comments
Anything right of a double slash // is a comment
Anything between /* and */ is also a comment
```{C}
Var = 2 + 5; // This is a comment
Var = 2 /* This is a comment */ + 5;
```

Simple operators
=====

Boolean operations are : `!` ` &&`  `||` 
```{C}
Var1 && (!Var2 || Var3)
```

Mathematical operations are the usual ones : `+` `-` `*` `/`
```{C}
Var1 + (Var2 / Var3)*1000
```
You can add/substract/multiply/divide a Real and an Integer, the result will be a Real.

To append strings, you can use the `^` operator. You can also append a Real or a Bool or an Integer. It will be converted to Text.
```{C}
MyVar = "Hello " ^ "world!";
```

Protip : when using triple-double-quoted Texts you can include variables or expressions in your text with triple-culry-brackets, resulting in something like :
```{C}
MyVar = """Hello {{{NameOfThePlayer}}}, how are you today??? Five = {{{2+3}}}. \o/ """;
```

###Comparisons

To compare values, you can use the usual : `==`   `!=`   `<`   `>`   `<=`   `>=` 
Greater/lower comparisons do not work with Booleans.

###Log and assertions
It's often useful to print some text in the log. You can do that with :
```{C}
log("Something went wrong!");
```
The text will be printed in the bottom part of the debug window.

Sometimes it is more easy to check if some requirements are met. 
```{C}
assert(MyVariable == 3);
```
This will check if MyVariable is equal to 3. If not, the script will be halted as if an error had occurred.

##Control structures

In maniascript, you'll find the usual control structures :
```{C}

if( /*Boolean*/ ) /*Instructions;*/

while ( /*Boolean*/ ) /*Instructions;*/

for( /*VariableName*/ , /*FirstValue*/ , /*LastValue*/ ) /*Instructions;*/

foreach( /*Element*/  in /*Array*/ ) /*Instructions;*/

foreach( /*Key*/ =>/*Element*/ in /*Array*/ ) /*Instructions;*/ 

switch(/*Expression*/) {
case Expression1: /*Instructions;*/
case Expression2: /*Instructions;*/ .....
default : /*Instructions;*/
}

```

where [i]Instructions;[/i] can be either a one-line instruction or a curly-bracketed set of instructions.

###Functions and main()
Most Maniascripts are to complicated to fit in one set of instructions. That's why you can define functions. A function definition looks like that :
```{C}

[TypeOfTheReturnedValue] [NameOfTheFunction] ([TypeArg1] [NameArg1], [TypeArg2] [NameArg2] .... )
{ 
 [Instructions]; 
}

```

Here's an exemple :
```{C}

Integer Minimum (Integer A, Integer B)
{ 
if (A<B) return A;
return B;
}

```

One of the functions is called [i]main ()[/i]. It has no arguments, and no return type. It's the function called at the beginning of the program.

If your code is simple enough to fit entirely in the main() function, you can omit the function header, and write the instructions without any enclosing brackets.

###Variable scope
After a declare instruction, the variables are only accessible in the directly enclosing curly-brackets {...}. 

###Directives
At the top of a script, some special code may be required : those special lines start with the '#' character. Note that directives are [b]not[/b] finished with a semicolon ';'
[list]
#RequiredContext XXX : the context of a script. This is meant to avoid trying to use an EditorPlugin as a GameMode, because it will always fail
#Const XXX YYYY : declare a constant named XXX, with value YYYY. This value can not be modified.
#Setting XXX YYYY : from the script's scope, #Setting behave exactly as #Const. But this value can be modified from "outside" the script
#Include "XXX" as YYYY : load a library or include a file, and bind the functions to the namespace YYYY.
[/list]
Exemple of include :
```{C}

#Include "Library.Script.txt" as MyLib1
MyLib1::Function1();

```
where
```{C}

// contents of "Library.Script.txt"
Void Function1() {
   log("Foo"^"bar");
}

```

##Advanced types : list and arrays
You can declare Lists by using any type, followed by square brackets : 
```{C}

declare Text[] MyList;
MyList= ["Alpha", "Beta", "Gamma", "Omega" ];

```

You can then access the elements by index :
```{C}

log(MyList[0]); // Will log : Alpha
log(MyList[3]); // Will log : Omega

```
The only valid indices are the ones between 0 (inclusive) and the list's count (exclusive).

Valid operations are 
```{C}

declare Size = List.count;
declare SortedList = List.sort(); 
List.add(ValueToBeAdded);
List.removekey(IndexToBeRemoved);
List.remove(ValueToBeRemoved);
declare DoesExist1 = List.existskey(Index); // equivalent to 0 <= Index <  List.count
declare DoesExist2 = List.exists(ValueToBeFound);
declare Index = List.keyof(ValueToBeFound); // such as List[Index] == ValueToBeFound
List.clear();

```

You can also declare an associative Array with keys of any type : 
```{C}

declare Text[Integer] MyArray1 = [15 => "Quinze", 42 => "Quarante-deux", 100 =>"Cent" ];
declare Real[Text] MyArray2 = ["Pi" => 3.14, "Tau" => 6.28, "Leet" => 13.37 ];

```

You can then access the elements by index :
```{C}

log(MyArray1[42]); // Will log : Quarante-deux
log(MyArray2 ["Tau"]); // Will log : 6.28
MyArray2["SquareRootOfTwo"] = 1.41; // Add a new Value in the array 

```

```{C}

declare Size = MyArray1.count;
declare SortedByValues = MyArray1.sort(); // Sort by Values
declare SortedByKeys = MyArray1.sortkey(); // Sort by Keys
List.removekey(KeyToBeRemoved);
List.remove(ElemToBeRemoved);
declare DoesExist1 = List.existskey(Key);
declare DoesExist2 = List.exists(ElemToBeFound);
declare Key= List.keyof(ElemToBeFound); // such as List[Key] == ElemToBeFound
List.clear();

```

##Timing instructions : yield/sleep/wait
Those instructions allow to pause the exectution of the script. It is very useful, since during the execution script, nothing else happen : the display is not updated, the simulations of the game are stuck, the logs are not being updated, and so on.

yield; The script pauses for the shortest amout of time.
sleep(XXXX); The script pauses for XXXX miliseconds.
wait(YYYYY); The  script pause until Boolean YYYYY is True. YYYYY will be evaluated repeteadly, so be careful when YYYYY is a function call : the fonction will be called many times.

Equivalents : 
yield; is equivalent to : sleep(0);
sleep could be written :
```{C}

void Sleep(Integer XXXX){
   Start = Now;
   while(Now < Start + XXXX) {
      yield;
   }
}

```

wait could be written :
```{C}

while(!YYYYY) {
    yield;
}

```

Protip : If you use sleep(XXXX) in a script where you catch events (Manialink scripts for example), you will miss the events which occurred during the sleep(). This is so because one event is only valid during 1 script "frame", i.e the time between two consecutive "yield;" . To avoid that, you can use wait instead :
```{C}

Start = Now;
wait(Now > Start + 1000 || PendingEvents.count >= 1);

```

##Advanced types : classes

In ManiaScript, you can not declare new classes or any kind of type. Also you can not directly instantiate objects of an existing class. You can only declare pointers to existing objects.

Yet, there are "2 kinds" of pointers. The first one is what we call an alias. It's fast, and quite powerful, yet its behaviour can be surprising, especially if you're used to common pointer programming. The second is a more regular affectation, roughly emulating pointers.

###Aliases

Here's an example :
There's a array of players, sorted by descending score, called Players.

[i][u]Important note :[/u][/i] we're talking here about an API array, one that's pre declared as a system variable.

One can write :
```{C}

declare BestPlayer <=> Players[0];  
   // Alice is the best player, so BestPlayer "points" to Alice

```

You would expect that :
```{C}

declare BestPlayer <=> Players[0];  
   // Alice is the best player, so BestPlayer "points" to Alice
{
    ... // Some code doing stuff
}
log(BestPlayer.Login); 
   // Will log Alice, right ???

```

[b][i]In ManiaScript, BestPlayer is an alias. So BestPlayer means "The player in first position in the array Players". That's why, if scores have been changed, maybe it does not mean Alice anymore.[/i][/b]

```{C}

declare BestPlayer <=> Players[0];  
   // Alice is the best player, so BestPlayer "points" to Alice
Players[1].Score += 1000; 
   // Give 1000 points to the 2nd best player, which is Bob

   // those 2 line are completely equivalent : 
   //    they Will log Bob, because he has an higher score right now.
log(BestPlayer.Login);
log(Players[0].Login);

```

In such cases, it become more clear that Class objects does not behave as Integer or Text values.
###That's why we thought it would be better to use another symbol when setting variables : to remind that's not a plain affectation.

###Now what if you want to keep Alice in a variable, and not the Best Player ?

The following code will work "as expected". 
```{C}

declare BestPlayerId = Players[0].Id;  
    // BestPlayerId is an Ident : will never change
Players[1].Score += 1000; 
   // Give 1000 points to the 2nd best player, which is Bob
log(Players[BestPlayerId].Login); 
   // Will log Alice 

```

ProTip : Note that the "log" will be a bit more time-consuming than the previous way : we have to find Alice in the array of players, from the Ident.

ProTip #2 : Yes, this can also be written 
```{C}

declare BestPlayer <=> Players[Players[0].Id];  
   // will be an alias to Players[AliceId] and not Players[0]. Huge difference !
Players[1].Score += 1000; 
   // Give 1000 points to the 2nd best player, which is Bob
log(BestPlayer.Login); 
   // Will log Alice. Will also costs more CPU, for the alias has to be resolved.  

```

But there's a simpler way to do something similar 
```{C}

declare BestPlayer = Players[0];  
   // Note the difference : I used = instead of <=>
   // It will do the same as : declare BestPlayer <=> Players[Players[0].Id];  
Players[1].Score += 1000; 
   // Give 1000 points to the 2nd best player, which is Bob
log(BestPlayer.Login); 
   // Will log Alice. Will also costs more CPU, for the alias has to be resolved.  

```

Since we have unique idents for every class, this will result in having "real pointers". But they cost a bit more when set and accessed. Performance should not be an issue though. When in doubt, you should probably use =

###Tricky alias cases

[u]Aliases in arrays[/u]
Unfortunately, there are some edge cases where the aliases become a bit tricky....
What happens if you declare yourself an array of Classes.

```{C}

// Players[0] => Alice
// Players[1] => Bob
declare MyArray = [Players[0], Players[1]]; 
declare MyVal <=> MyArray[0];
MyArray = [Players[1], Players[0]];

log(MyVal.Login); // It will log "Alice", not what you may expect

```

If fact, when you write "MyVal <=> MyArray[0]", it means "take the alias that is stored in MyArray[0] and copy it in MyVal". So MyVal is an alias to Player[0], and not MyArray[0];
This is because the value stored in MyArray is already an alias, so we copy the alias directly, instead of making an alias to the alias. There are technical reasons : we can not easily do alias to aliases T_T'

(By now, every sane person should be confused... so don't worry if you are...)

[u]Functions returning classes[/u]

As with arrays, we have to make a difference between API functions and functions declared in script.
 
When you call an API function, the result will be a "simplified" alias. Those are unambiguous aliases referring to the object's Id, inside of an API-defined array.
```{C}

declare MyLabel <=> GetFirstChild("Label"); 
   // MyLabel is an alias to Page.MainFrame.Controls[IdOfTheFirstChildFound]

```
Is behaving exactly like 
```{C}

declare MyLabel <=> Page.MainFrame.Controls[GetFirstChild("Label").Id];

```

So if there was an API function GetBestPlayer, the code
```{C}

declare BestPlayer <=> GetBestPlayer();  
   // Alice is the best player, so BestPlayer is an alias for Players[AliceId]
Players[1].Score += 1000; 
   // Give 1000 points to the 2nd best player, which is Bob

log(BestPlayer.Login); // Will log Alice

```

When dealing with script-defined functions, the aliases are directly copied (the same way it does when using script-defined arrays). So in previous example, if GetBestPlayer was a function defined in your script, or in a script library, it would log "Bob".

In both cases, the using a class value you obtained from a function call will [b]never[/b] call the function again.





Comments in ManiaScript
========

Commenting in ManiaScript is done by adding double slashes before the instructions //, multiline comments can be done starting with /* and ending with */

example:

```
declare Text hello = "world" // this text here will be ignored and is a comment
/* 
all this text here is a comment, and is beeing ignored from the maniascript engine
if (hello == "world") {
    do something
    }
*/

```

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
/* todo: write about ident */

Null 
========
Null is a empty or unassigned value.

NullId 
========
/* todo: write about nullid */

Variables
========
Variables in ManiaScript are introduced by using keyword `declare`.
You can introduce the initial type of the variable and if initial type is not defined, the type will be cast from the initial value.Once the variable has been initialized (or cast from value) with a type, the type can't be changed afterwards. Note that, variables are always defined and initialized when declared, meaning they always have a valid value. If not specified, this value will be a default value for the current type.

examples: 

```
declare planets = 9000; // planets will be cast to Integer
planets = "9000 planets"; // this would cast an error.
declare Text serverName; // serverName initial value is now Null
serverName = "My testing server";
log(serverName ^ " has currently " ^ planets ^ "p.");

```

Scopes (or variable scopes)
=======

Scope in maniascript is same as many other languages, a scope is defined with curly brackets starting with `{` and ending with `}`. Variable visibility is limited to a scope.

Global Variables
======

Global variables are defined outside the main function and other function scopes.
example:


```
<?xml 
<script><!--
define Text intro = "world"; // this is considered as a global variable

main {
    define Integer number = 1; // as this is only for this scope
    }
--></script>
?>

```

Control structures:
======

Functions
=======

```
[type of return value] [function name] ( TypeArg NameArg, TypeArg2 NameArg2 )  {
    [instructions]
    }

```

with exception of main function which doesn't have return value type or input values, the main function will be always run, if present.
example:

```
main {
    log("Hello ManiaPlanet!");       // will show brief greeting in debug console.
    }

```

example:


```
Integer Minimum (Integer A, Integer B)
{ 
    if ( A < B ) return A;
    return B;
}

```



Loops
======
while loop is running as long as the Boolean is True


```
while ( /*Boolean*/ ) {
    
    /*Instructions;*/
    
    }

```

For loop runs for first value to last value, with incrementation of 1.0


```
for ( /*VariableName*/ , /*FirstValue*/ , /*LastValue*/ ) {
    /*Instructions;*/
}

```

Foreach will go trough all values in Array


``` 
foreach( /*Element*/  in /*Array*/ ) {
     /*Instructions;*/
}

```


``` 
foreach( /*Key*/ =>/*Element*/ in /*Array*/ )  {
    /*Instructions;*/ 
}

```


Switches
=======

```
if ( /* Boolean */) {
    	*/ instructions */
}
else {
   	/* instructions */  
}

```


```
switch( /* Expression */ )  
{
	case Expression1: /* Instructions; */;
                         break;
	case Expression2: /* Instructions; */ .
                        break;
	default : /* Instructions; */
			break;
}

``` 


Preserved language keywords are:
=======


```
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

```
