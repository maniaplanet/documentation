---
title: 'Syntax basics'
taxonomy:
    category:
        - docs
---

A script is a text, composed by lines (aka, instructions). Instructions are separated by semicolons, as in C/C++.
It looks like

```
declare MyVar = 12;
MyVar += 1;
DoSomething(MyVar);
```

Beware: Case is important, always!

## Simple data Types

* Boolean: can be either True or False
* Integer: numbers such as 2 or -5 or 31337
* Real: decimal numbers such as -4.2 or 99. (do not forget the final dot, because 99 is an Integer. Beware, those are different)
* Text: any character sequence between double quotes: "plop" "gouzi" or "456.32".

**Protips**:
- Inside a Text, the usual escape sequences such as "\n" or "\\" are supported.
- You can also declare a Text value between 3 double quotes. When doing so, you won't need to escape chars, and it can expand on many lines. """plop="452.12.22" toto"""

## Variables

### Variable declaration
In Maniascript, variables must be declared, either by specifying a Type, or an initial value:

`declare Integer MyVariable;`

or

`declare MyVariable = 42.;`

After having declared a variable, you'll be able to use it to store data, but the type can't be changed afterwards.
If the variable is defined as an Integer, you will never be able to store anything else inside. The same goes for other types.

>>>>>> Variables are always defined and initialized when declared, meaning they always have a valid value. If not specified, this value will be a default value for the current type.


Examples:

```
declare planets = 9000; // planets will be cast to Integer
planets = "9000 planets"; // this would raise an error.
declare Text serverName; // serverName initial value is an empty string
serverName = "My testing server";
log(serverName ^ " has currently " ^ planets ^ "p.");
```

### Variable scope

Scope in Maniascript is the same as in many other languages. A scope is defined with a matching pair of curly brackets:  starting with `{` and ending with `}`. Variable visibility is limited to the largest scope containing the declaration of the variable. Variable visibility is also limited to the instructions following the declaration.

### Global Variables

Global variables are defined outside the main function and other function scopes.
example:

```
define Text intro = "world"; // this is considered as a global variable

main {
    define Integer number = 1; // as this is only for this scope
}
```

### Variable affectation
Once declared, you can change the value of a variable with a single equal sign:
`MyVariable = 13+37;`
As said earlier, the types must match. No implicit conversions are made.

## Comments
Commentary part of a script that is not taken into account at all. The program just doesn't "see" them.
Anything right of a double slash `//` is a comment.
Anything between `/* and */` is also a comment.

```
Var = 2 + 5; // This is a comment
Var = 2 /* This is a comment */ + 5;

declare Text hello = "world" // this text here will be ignored and is a comment
/*
all this text here is a comment, and is being ignored by the maniascript engine
if (hello == "world") {
    do something
    }
*/
```

Operators and Instructions
=====

Boolean operations are: `!` ` &&`  `||`

```
Var1 && (!Var2 || Var3)
```

Mathematical operations are the usual ones: `+` `-` `*` `/`

```
Var1 + (Var2 / Var3)*1000
```
You can add/substract/multiply/divide a Real and an Integer, the result will be a Real.

To append strings, you can use the `^` operator. You can also append a Real or a Bool or an Integer. It will be converted to Text.

```
MyVar = "Hello " ^ "world!";
```

>>>>> When using triple-double-quoted Texts you can include variables or expressions in your text with triple-curly-brackets, resulting in something like:

```
MyVar = """Hello {{{NameOfThePlayer}}}, how are you today??? Five = {{{2+3}}}. \o/ """;
```

## Comparisons

To compare values, you can use the usual:        `==`   `!=`   `<`   `>`   `<=`   `>=`
Greater/lower comparisons do not work with Booleans.

## Log and assertions
It's often useful to print some text in the log. You can do that with:

```
log("Something went wrong!");
```

The text will be printed in the bottom part of the debug window. Press Ctrl + ~ to see it.

Sometimes it is more easy to check if some requirements are met.

```
assert(MyVariable == 3);
```

This will check if MyVariable is equal to 3. If not, the script will be halted as if an error had occurred.

##Timing instructions: yield/sleep/wait
Those instructions allow you to pause the execution of the script. It is very useful, since during the script execution, nothing else happen: the display is not updated, the simulations of the game are stuck, the logs are not being updated, and so on.

- `yield;` The script pauses for the shortest amount of time.
- `sleep(XXXX);` The script pauses for XXXX milliseconds.
- `wait(YYYYY);` The  script pauses until Boolean YYYYY is True. YYYYY will be evaluated repeatedly, so be careful when YYYYY is a function call: the fonction will be called many times.

###Equivalents  
* `yield;` is equivalent to: `sleep(0);`
* sleep could be written:

```
void Sleep(Integer XXXX){
   Start = Now;
   while(Now < Start + XXXX) {
      yield;
   }
}
```

* wait could be written :

```
while(!YYYYY) {
    yield;
}
```

>>> If you use sleep(XXXX) in a script where you catch events (Manialink scripts for example), you will miss the events which occurred during the sleep(). This is so because one event is only valid during 1 script "frame", i.e the time between two consecutive "yield;" . To avoid that, you can use wait instead :

```
Start = Now;
wait(Now > Start + 1000 || PendingEvents.count >= 1);
```

Structure
=====

## Control structures

In maniascript, you'll find the usual control structures:

```
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

where `Instructions;` can be either an one-line instruction or a curly-bracketed set of instructions.

## Functions and main()
Most Maniascripts are too complicated to fit in one set of instructions. That's why you can define functions. A function definition looks like that:

```
[TypeOfTheReturnedValue] [NameOfTheFunction] ([TypeArg1] [NameArg1], [TypeArg2] [NameArg2] .... )
{
 [Instructions];
}
```

Here's an example:

```
Integer Minimum (Integer A, Integer B)
{
if (A<B) return A;
return B;
}
```

One of the functions is called `main ()`. It has no arguments, and no return type. It's the function called at the beginning of the program.

If your code is simple enough to fit entirely in the main() function, you can omit the function header, and write the instructions without any enclosing brackets.

## Directives
At the top of a script, some special code may be required: those special lines start with the `#` character. Note that directives are *not* finished with a semicolon `;`

* `#RequiredContext XXX`: the context of a script. This is meant to avoid trying to use an EditorPlugin as a GameMode, because it will always fail
* `#Const XXX YYYY`: declares a constant named XXX, with value YYYY. This value can not be modified.
* `#Setting XXX YYYY`: from the script's scope, `#Setting` behaves exactly as `#Const`. But this value can be modified from "outside" the script
* `#Include "XXX" as YYYY`: loads a library or includes a file, and binds the functions to the namespace YYYY.

Example of include:

```
#Include "Library.Script.txt" as MyLib1
MyLib1::Function1();
```

where

```
// contents of "Library.Script.txt"
Void Function1() {
   log("Foo"^"bar");
}
```

Advanced types
===========

## Lists and arrays
You can declare Lists by using any type, followed by square brackets:

```
declare Text[] MyList;
MyList= ["Alpha", "Beta", "Gamma", "Omega" ];
```

You can then access the elements by index :

```
log(MyList[0]); // Will log: Alpha
log(MyList[3]); // Will log: Omega
```

The only valid indices are the ones between 0 (inclusive) and the list's count (exclusive).

Valid operations are

```
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

You can also declare an associative Array with keys of any type:

```
declare Text[Integer] MyArray1 = [15 => "Quinze", 42 => "Quarante-deux", 100 =>"Cent" ];
declare Real[Text] MyArray2 = ["Pi" => 3.14, "Tau" => 6.28, "Leet" => 13.37 ];
```

You can then access the elements by index:

```
log(MyArray1[42]); // Will log: Quarante-deux
log(MyArray2 ["Tau"]); // Will log: 6.28
MyArray2["SquareRootOfTwo"] = 1.41; // Adds a new Value in the array
```

## Classes

In ManiaScript, you cannot declare new classes or any kind of type. Also you cannot directly instantiate objects of an existing class. You can only declare pointers to existing objects.

Yet, there are "2 kinds" of pointers. The first one is what we call an alias. It's fast, and quite powerful, yet its behaviour can be surprising, especially if you're used to common pointer programming. The second is a more regular affectation, roughly emulating pointers.

### Aliases

Here's an example :
There's an array of players, sorted by descending score, called Players.

>>> We're talking here about an API array, one that's pre declared as a system variable.

One can write :

```
declare BestPlayer <=> Players[0];  
   // Alice is the best player, so BestPlayer "points" to Alice
```

You would expect that :

```
declare BestPlayer <=> Players[0];  
   // Alice is the best player, so BestPlayer "points" to Alice
{
    ... // Some code doing stuff
}
log(BestPlayer.Login);
   // Will log Alice, right ???
```

*In ManiaScript, BestPlayer is an alias. So BestPlayer means "The player in first position in the array Players". That's why, if scores have been changed, maybe it does not mean Alice anymore.*

```
declare BestPlayer <=> Players[0];  
   // Alice is the best player, so BestPlayer "points" to Alice
Players[1].Score += 1000;
   // Gives 1000 points to the 2nd best player, which is Bob

   // those 2 line are completely equivalent :
   //    they will log Bob, because he has an higher score right now.
log(BestPlayer.Login);
log(Players[0].Login);
```

In such cases, it becomes more clear that Class objects do not behave as Integer or Text values.
*That's why we thought it would be better to use another symbol when setting variables: to remind that's not a plain affectation.*

### More on aliases

Now what if you want to keep Alice in a variable, and not the Best Player?
The following code will work "as expected".

```
declare BestPlayerId = Players[0].Id;       // BestPlayerId is an Ident: will never change
Players[1].Score += 1000;                   // Gives 1000 points to the 2nd best player, which is Bob
log(Players[BestPlayerId].Login);           // Will log Alice
```

!!! The "log" will be a bit more time-consuming than the previous way : we have to find Alice in the array of players, from the Ident

!!! Yes, this can also be written

```
declare BestPlayer <=> Players[Players[0].Id];  // will be an alias to Players[AliceId] and not Players[0]. Huge difference!
Players[1].Score += 1000;                       // Gives 1000 points to the 2nd best player, which is Bob
log(BestPlayer.Login);                          // Will log Alice. Will also cost more CPU, for the alias has to be resolved.  
```

But there's a simpler way to do something similar

```
declare BestPlayer = Players[0];    // Note the difference: I used = instead of <=>
                                    // It will do the same as: declare BestPlayer <=> Players[Players[0].Id];  
Players[1].Score += 1000;           // Gives 1000 points to the 2nd best player, which is Bob
log(BestPlayer.Login);              // Will log Alice. Will also cost more CPU, for the alias has to be resolved.  
```

Since we have unique idents for every class, this will result in having "real pointers". But they cost a bit more when set and accessed. Performance should not be an issue though. When in doubt, you should probably use =

### Tricky alias cases

#### Aliases in arrays
Unfortunately, there are some edge cases where the aliases become a bit tricky....
What happens if you declare yourself an array of Classes.

```
// Players[0] => Alice
// Players[1] => Bob
declare MyArray = [Players[0], Players[1]];
declare MyVal <=> MyArray[0];
MyArray = [Players[1], Players[0]];

log(MyVal.Login); // It will log "Alice", not what you may expect
```

If fact, when you write `MyVal <=> MyArray[0]`, it means "take the alias that is stored in `MyArray[0]` and copy it in `MyVal`". So `MyVal` is an alias to `Player[0]`, and not `MyArray[0]`;
This is because the value stored in MyArray is already an alias, so we copy the alias directly, instead of making an alias to the alias. There are technical reasons: we can not easily do alias to aliases T_T'

(By now, every sane person should be confused... so don't worry if you are...)

#### Functions returning classes

As with arrays, we have to make a difference between API functions and functions declared in script.

When you call an API function, the result will be a "simplified" alias. Those are unambiguous aliases referring to the object's Id, inside of an API-defined array.

```
declare MyLabel <=> GetFirstChild("Label");
   // MyLabel is an alias to Page.MainFrame.Controls[IdOfTheFirstChildFound]
```
Is behaving exactly like

```
declare MyLabel <=> Page.MainFrame.Controls[GetFirstChild("Label").Id];
```

So if there was an API function GetBestPlayer, the code

```
declare BestPlayer <=> GetBestPlayer();  
   // Alice is the best player, so BestPlayer is an alias for Players[AliceId]
Players[1].Score += 1000;
   // Gives 1000 points to the 2nd best player, which is Bob

log(BestPlayer.Login); // Will log Alice
```

When dealing with script-defined functions, the aliases are directly copied (the same way it does when using script-defined arrays). So in previous example, if GetBestPlayer was a function defined in your script, or in a script library, it would log "Bob".

In both cases, using a class value you obtained from a function call will *never* call the function again.
