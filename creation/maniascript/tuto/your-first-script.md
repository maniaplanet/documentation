---
layout: default
title: Your first script
description: Creation of a first simple gamemode, a deathmatch
tags:
- creation
- maniascript
---

# Your first ShootMania game mode
In this part you'll learn to create your first simple game mode, a deathmatch where the first player to earn 30 points will win the map (using a lightweight version of the Melee gamemode).

## Creating the gamemode
Firstly to be able to write your mode ingame, you have to create a text file with the following code:

{% highlight cpp %}
#Extends "Modes/ShootMania/ModeBase.Script.txt"
{% endhighlight %}

And then save the file under a name like this: `MyGamemode.Script.txt` in `C:\Users\MYUSERNAME\Documents\ManiaPlanet\Scripts\Modes\ShootMania` (create the required folders if missing).

Now you can launch a local server with your mode or via the map editor (if you want to create/modify a prototype map at the same time) or as said before you can continue in your IDE/text editor but you'll not be able to test/modify your script live (through the IDE I mean, you can modify it through the script editor ingame).

## Create a map

It's time to create a map to test our mode. Launch ManiaPlanet, start the map editor and select a maptype: `MeleeArena` for ShootMania or `Race` for TrackMania. Make a basic map, validate it and save it. Now you can exit the editor.


## Create a server

We have a basic game mode script and a map, all that is missing now is a server to do our tests. In the main menu click on the Local Play button (then Local Network if you are on TrackMania). Click on the Create button and you should see this screen:

![Server creation screen](./img/create-server.png)

1. Click on this box until the `Script` option is selected.
2. Click here to open a window where you can choose `MyGamemode.Script.txt`.

Once it's done click on the Launch button, select the map you created earlier and click on Play.

## Structure of a game mode
A gamemode is divided in several part which match each state of a game. A raw structure of a gamemode looks like this:

{% highlight cpp %}
#Extends "Modes/ShootMania/ModeBase.Script.txt"

#Const	CompatibleMapTypes	"MeleeArena"
#Const	Version				"1.0.0"
#Const	ScriptName			"MyScript.Script.txt"

#Include "Libs/Nadeo/Settings.Script.txt" as Settings
#Include "TextLib" as TextLib
#Include "MathLib" as MathLib
#Include "Libs/Nadeo/ShootMania/SM.Script.txt" as SM
#Include "Libs/Nadeo/ShootMania/Score.Script.txt" as Score
#Include "Libs/Nadeo/Message.Script.txt" as Message
#Include "Libs/Nadeo/Interface.Script.txt" as Interface
#Include "Libs/Nadeo/Layers.Script.txt" as Layers


// ---------------------------------- //
// Constants
// ---------------------------------- //
//List of your constant variables

// ---------------------------------- //
// Globales
// ---------------------------------- //
//List of your global variables


***StartServer***
***
//Code to execute when the server is started
***

***StartMap***
***
//Code to execute when a map is loaded
***

***InitRound***
***
//Code to execute before the beginning of a round
***

***StartRound***
***
//Code to execute when a round is started
***

***Playloop***
***
//Main loop where the code is executed through the duration of the round
***

***EndRound***
***
//Code to execute at the end of the round
***

***EndMap***
***
//Code to execute at the end of a match/map
***


// ---------------------------------- //
// Functions
// ---------------------------------- //
List of the functions of the gamemode
{% endhighlight %}

We'll explain each part of the script in the next sections but please note first that the `***StartServer***` code are called "Labels". An explanation of the labels is given in the excellent blog post by Steffen, a very active scripter of the community, here (among others explanations about other things in ManiaScript): http://blog.steeffeen.com/2013/10/labels/

### **Library**
{% highlight cpp %}
#Extends "Modes/ShootMania/ModeBase.Script.txt"

#Const	CompatibleMapTypes	"MeleeArena"
#Const	Version				"1.0.0"
#Const	ScriptName			"MyScript.Script.txt"

#Include "Libs/Nadeo/Settings.Script.txt" as Settings
#Include "TextLib" as TextLib
#Include "MathLib" as MathLib
#Include "Libs/Nadeo/ShootMania/SM.Script.txt" as SM
#Include "Libs/Nadeo/ShootMania/Score.Script.txt" as Score
#Include "Libs/Nadeo/Message.Script.txt" as Message
{% endhighlight %}

This part is used to load all the libraries required and basic information for the gamemode. `ModeBase` is the most important part because it'll allow you to divide the gamemode for each state of the game and also to have access to all basic functions and variables for a game script.

The `CompatibleMapTypes` constant indicates which type(s) of maps are usable with your script. It can be useful if your mode requires a specific type or number of blocks (for example at least two spawns, with a pole in Royal)

`Version` is... well the version of your script, you can format it as you want.

The `Settings` library allows you to create and use a number of parameters (fixed by you and used by the server owner) on your script like the duration of a round or the number of eliminations needed to win.

All `#Include` lines indicate that we want to load a library into the script. A library is a collection of functions/variables which contain script modes to do a specific task (like handling the messages, manipulating the player scores/scoretable and more). You can also declare a custom library if you have made one and need it for your gamemode. It's particularly useful when you have to use the same block of code in several gamemodes.

### Constants

{% highlight cpp %}
// ---------------------------------- //
// Constants
// ---------------------------------- //
#Const ConstVar ConstValue
{% endhighlight %}

The constants are a type of variables where you stock a value that will not change during the game and will be accessible anywhere in your script. Usually in these variable you'll keep settings which are non-modifiable by the players/server owner like the maximum number of players (for example), the list of objects used in the script, the ids of the classes, the minimum number of players required for the script, etc...

Declaring a constant variable doesn't need a semicolon (;) at the end of the line.

### Globales

{% highlight cpp %}
// ---------------------------------- //
// Globales
// ---------------------------------- //
declare Text G_GlobalVar;
{% endhighlight %}

Globals are like the constants with the difference that you can modify their value during the game and that you must set a type when you declare (create) them.

### "Body" of the Script
And now we attack the main dish of the script, the labels corresponding to each state of a game.

> **Note:** Not all the parts are mandatory except `Playloop` and `EndRound` or `EndMap` (one of them at least)

#### StartServer

{% highlight cpp %}
***StartServer***
***
//Code to execute when the server is started
***
{% endhighlight %}
In this block you'll set everything that needs to be set up at the start of the server at risk of not work properly during a game. Usually it's used to build the scoretable, activate the team mode (or not) or listing all the `Actions` (like custom weapons or forced skins) which will be used in the script.

#### StartMap

{% highlight cpp %}
***StartMap***
***
//Code to execute when a map is loaded
***
{% endhighlight %}
In this part you'll (usually) initialize all the variables which are used to set up a match. It's the place where you reset the global score or for setting up variables which will be used during the whole game for example.


#### InitRound

{% highlight cpp %}
***InitRound***
***
//Code to execute before the beginning of a round
***
{% endhighlight %}
This is the code that you need to execute prior to the start of a round, it could be to reset the score of a player/team (other than the global score), custom stats, setting up a gameplay sequence, etc...
Note that this section is not mandatory to have your script working.

#### StartRound

{% highlight cpp %}
***StartRound***
***
//Code to executed when a round is started
***
{% endhighlight %}
This is where you usually set up a few other variables as well as create the items required for the execution of the script (if needed at the start of the round).

#### Playloop

{% highlight cpp %}
***Playloop***
***
//Main loop where the code is executed through the duration of the round
***
{% endhighlight %}
The main dish, inside this loop you'll handle everything that happens during a round. From spawning a player to handling player death and more. You have also to set the victory condition(s) somewhere inside to leave the loop (and stop the game).

#### EndRound

{% highlight cpp %}
***EndRound***
***
//Code to execute at the end of the round
***
{% endhighlight %}
You enter here when you have met your victory condition(s) and decide what to do at this moment (end the map/match or launch a new round).
If you decide to start a new round, the script will go back at the `InitRound` section and continue the script from there.

This is also the place where you destroy all the objects and bots (because you'll recreate them on the `StartRound`).

#### EndMap

{% highlight cpp %}
***EndMap***
***
//Code to execute at the end of a match/map
***
{% endhighlight %}
Usually it's used to indicate who won the match and to load the next map.

### Functions

{% highlight cpp %}
// ---------------------------------- //
// Functions
// ---------------------------------- //
//Create your functions from here
{% endhighlight %}
If you need to create functions (repetition of the same block of code) for your game mode, you have to create them after the `EndMap` section because when the game will compile the script, it goes from the bottom to the top of the document to check if the functions called by the script really exist in the library or in the script itself.

## Common variables
Now we can almost start the "real" work, just a bit of explanation about the type of variables existing in ManiaScript as it can change slighty between programming languages.

Here is a list of the common types of variables in ManiaScript (or how to declare them):

Type| ManiaScript type  | Example
---------   | ----------------- | -------
Integer | Integer   | 1
Real / Float| Real  | 1.5 (or 1. for a "round" number, the decimal is mandatory)
Text| Text  | 'Im a text'
Boolean | Boolean   | True
Ident   | Ident | (see below)
Array   | []| Player[] (table of Players)

An ident is special kind of variable, it's used to point to an asset (others that images/sound) like a bullet created in the ***ActionMaker***, or a ***skin*** or also an ***aura*** for example.

## Setting up the script

{% highlight cpp %}
#Extends "Modes/ShootMania/ModeBase.Script.txt"

#Const	CompatibleMapTypes	"MeleeArena"
#Const	Version				"2013-06-24"
#Const	ScriptName			"Melee_Tutorial.Script.txt"

#Include "Libs/Nadeo/Settings.Script.txt" as Settings
#Include "TextLib" as TextLib
#Include "MathLib" as MathLib
#Include "Libs/Nadeo/ShootMania/SM.Script.txt" as SM
#Include "Libs/Nadeo/ShootMania/Score.Script.txt" as Score
#Include "Libs/Nadeo/Message.Script.txt" as Message
#Include "Libs/Nadeo/Interface.Script.txt" as Interface
#Include "Libs/Nadeo/Layers.Script.txt" as Layers

// ---------------------------------- //
// Settings
// ---------------------------------- //
#Setting S_TimeLimit	600 as _("Time limit")		///< Time limit on a map
#Setting S_PointLimit	25	as _("Points limit")	///< Points limit on a map

// ---------------------------------- //
// Globales
// ---------------------------------- //
declare Ident[]	G_SpawnsList;	 ///< Id of all the BlockSpawns of the map
	declare Ident	G_LatestSpawnId;	///< Id of the last BlockSpawn used
{% endhighlight %}
At the beginning of your script, you have to tell the script to look in the `ModeBase` for the basic working of the script.

Then talk about the different libraries:

* Message: You handle all the system message thanks to the library (like: "A player killed you!").
* SM: Handle some general functions like spawning the players
* Score: It's used to set the score to the players (as its name says)

Below the library you have the settings that players set when they create a server.

## Initializing the server
For a deathmatch mode (which is very simple), you only have to deactivate the team mode at the start of the server.

{% highlight cpp %}
***StartServer***
***
UseClans = False;

ST2::SetStyle("LibST_SMBaseSolo");
ST2::SetTeamsMode(False);
ST2::SetTeamsScoresVisibility(False);
ST2::Build("SM");
***
{% endhighlight %}
We tell the script that it's a FFA (Free For All) mode and we build the default scoretable.
ST2, the ScoresTable2 library, is loaded by the ModeBase.

## Setting up the parameters for the match/map

{% highlight cpp %}
***StartMap***
***
G_SpawnsList.clear();
G_LatestSpawnId = NullId;
{% endhighlight %}

First we clear the table containing the list of the spawns on the map and we reset the Id of the last spawn used.

{% highlight cpp %}
// ---------------------------------- //
// Init bases
foreach (Base in Bases) {
	Base.Clan = 0;
	Base.IsActive = True;
}
{% endhighlight %}

Then we indicate to initialize each base possibly present in the map to use the neutral (FFA) team number (so 0).

{% highlight cpp %}
// ---------------------------------- //
// Init scores
MB_Sleep(1); ///< Allow the scores array to be sorted
foreach (Score in Scores) {
	declare Integer LastPoint for Score;
	LastPoint = 0;
}
{% endhighlight %}

The scores of the players are reset. In this portion of the code, we call the class `Score` which stores all the points won by the players during a round (or match).
It's also within this class that you can put the scores of the players into the scoretable automatically.

{% highlight cpp %}
declare LeadId = NullId;
if (Scores.existskey(0)) LeadId = Scores[0].User.Id;
{% endhighlight %}

The Id of the lead player is also reset as the match hasn't started yet.

{% highlight cpp %}
declare CurrentPointLimit = S_PointLimit;
{% endhighlight %}

We put in a variable which declares the Point Limit decided by the owner of the server (or by vote).

{% highlight cpp %}
// ---------------------------------- //
StartTime = Now;
EndTime = StartTime + (S_TimeLimit * 1000);
UIManager.UIAll.UISequence = CUIConfig::EUISequence::Playing;
***
{% endhighlight %}
We're setting up the countdown and the duration of the round/match. A fixed duration is good in most cases because it prevents the round from lasting too long.

## Proceedings of the round
It's now time to write what's going on during a round.

{% highlight cpp %}
***PlayLoop***
***
foreach (Event, PendingEvents) {
{% endhighlight %}

We look at each event happening during the round. When an event is triggered, according to what we want to do, we do some treatments (only a very few events are listed below, the basic ones).

{% highlight cpp %}
// ---------------------------------- //
// On armor empty
if (Event.Type == CSmModeEvent::EType::OnArmorEmpty) {
	if (Event.Shooter == Event.Victim || Event.Shooter == Null) {
		Event.Victim.Score.Points -= 1;
	} else {
  	Event.Victim.Score.Points -= 1;
    Event.Shooter.Score.Points += 1;
	}
	XmlRpc::OnArmorEmpty(Event);
	PassOn(Event);
}
{% endhighlight %}

When a player loses all his armors (when he is eliminated), we remove one point from his score. Then with `PassOn(Event)` we tell the server that the event has been processed. We give also one point to the shooter if it's not a suicide.

{% highlight cpp %}
// ---------------------------------- //
// On hit
else if (Event.Type == CSmModeEvent::EType::OnHit) {
{% endhighlight %}

Now we check if a player is hit by a projectile (from a Storm weapon).

{% highlight cpp %}
if (Event.Shooter == Event.Victim) {
Discard(Event);
{% endhighlight %}

Basically if the player hit himself (with the `Arrow` or the `Nucleus` for example), we tell the server to disregard this event (and so to ignore all the damage and effects) with the `Discard(Event)` instruction.

{% highlight cpp %}
	} else {
		Event.Victim.Armor -= Event.Damage;

		XmlRpc::OnHit(Event);
		PassOn(Event);
	}
}
{% endhighlight %}

But if the sender and the receiver are different, we remove the number of armor (life) from the victim (the number of damage is known with the variable `Event.Damage` which can be tempered if you want to modify the damage received.

{% highlight cpp %}
// ---------------------------------- //
// On player request respawn
else if (Event.Type == CSmModeEvent::EType::OnPlayerRequestRespawn) {
	Event.Player.Score.Points -= 1;
	XmlRpc::OnPlayerRequestRespawn(Event);
	PassOn(Event);
}
{% endhighlight %}

If a player presses the backspace button (the default one to respawn), we remove one point from his score.

{% highlight cpp %}
	// ---------------------------------- //
	// Others
	else {
		PassOn(Event);
	}
}
{% endhighlight %}

And we validate all others events with their default treatment.

{% highlight cpp %}
// ---------------------------------- //
// Spawn players
foreach (Player in Players) {
	if (Player.SpawnStatus == CSmPlayer::ESpawnStatus::NotSpawned && !Player.RequestsSpectate) {
		MeleeSpawnPlayer(Player);
	}
}
{% endhighlight %}

Outside of the loop of the events, there is some work to do. First we have to let the players spawn if they are eliminated.
To do so, we create a loop which checks all the players' statuses. If a player is eliminated (by checking his status with `CSmPlayer::ESpawnStatus::NotSpawned`), we ask the script to execute the function `MeleeSpawnPlayer` which will be explained a bit later).

{% highlight cpp %}
// ---------------------------------- //
// Play sound and notice if someone is taking the lead
if (Scores.existskey(0) && Scores[0].User.Id != LeadId) {
	LeadId = Scores[0].User.Id;
	Message::SendBigMessage(TextLib::Compose(_("$<%1$> takes the lead!"), Scores[0].User.Name), 3000, 1, CUIConfig::EUISound::PhaseChange, 1);
}
{% endhighlight %}

We can also display a message when a player takes the lead. We have to test if the player with the highest score is the same player than registered before (else we don't save the new leader).
If it's the case, we save the new leader and we display a message to all the player to warn the players that one of them has taken the lead.

{% highlight cpp %}
Message::Loop();

// ---------------------------------- //
// victory conditions
declare IsMatchOver = False;
if (Now > EndTime) IsMatchOver = True;
foreach (Player in Players) {
	if (Player.Score != Null && Player.Score.Points >= CurrentPointLimit) IsMatchOver = True;
}

if (IsMatchOver) MB_StopMap = True;
***
{% endhighlight %}
And we finish by verifying the victory conditions to end the match.
First we check if the timelimit is reached, if so, the match is ended. Else we check if the pointlimit has been reached and if so, we end the match too.

You can stop the round with the instruction `MB_StopRound = True;` and stop the match (and so going to the next map) by using `MB_StopMap = True;`. If you use one of these instructions, the script will go directly into the `EndRound` section.

We have finished treating the playloop, but the script isn't quite finished yet.

## Ending the match
We have some code to execute in the EndMap section before having a "complete" loop of code for a match.
This section is executed when one of the victory conditions is validated.

{% highlight cpp %}
***EndMap***
***
EndTime = -1;
Score::RoundEnd();
Score::MatchEnd(True);

// ---------------------------------- //
// End match sequence
declare CUser Winner <=> Null;
declare MaxPoints = 0;
foreach (Score in Scores) {
	if (Score.Points > MaxPoints) {
		MaxPoints = Score.Points;
		Winner <=> Score.User;
	} else if (Score.Points == MaxPoints) {
		Winner <=> Null;
	}
}
{% endhighlight %}

We check who is the best player (by his score).

{% highlight cpp %}
foreach (Player in Players) {
	if (Player.User != Winner) UnspawnPlayer(Player);
	Interface::UpdatePosition(Player);
}
{% endhighlight %}

We unspawn all the players except the player who has won and we update the interface (and so the scoretable).

{% highlight cpp %}
MB_Sleep(1000);
{% endhighlight %}

We put the script in pause for 1000 milliseconds (1 second).

{% highlight cpp %}
Message::CleanBigMessages();
{% endhighlight %}

We erase all the messages displayed on the interface of the players.

{% highlight cpp %}
UIManager.UIAll.BigMessageSound = CUIConfig::EUISound::EndRound;
{% endhighlight %}

We play the sound of the end of the round.

{% highlight cpp %}
UIManager.UIAll.BigMessageSoundVariant = 0;
if (Winner != Null) {
	UIManager.UIAll.BigMessage = TextLib::Compose(_("$<%1$> wins the match!"), Winner.Name);
} else {
	UIManager.UIAll.BigMessage = _("|Match|Draw");
}
MB_Sleep(2000);

UIManager.UIAll.UISequence = CUIConfig::EUISequence::EndRound;
UIManager.UIAll.ScoreTableVisibility = CUIConfig::EVisibility::ForcedVisible;
MB_Sleep(5000);
{% endhighlight %}

We put the players into the EndRound sequence on the level of the interface (so everything will be hidden (or will not work like when you play) except the scoretable and few others things like the chat).
And we force the visibility of the scoretable to let the players watch their scores and those of the opponents.

{% highlight cpp %}
UIManager.UIAll.UISequence = CUIConfig::EUISequence::Podium;
while(!UIManager.UIAll.UISequenceIsCompleted) {
	MB_Yield();
}
{% endhighlight %}

If a podium is present on the map (if not the code will be ignored), we play the podium sequence.

{% highlight cpp %}
UIManager.UIAll.ScoreTableVisibility = CUIConfig::EVisibility::Normal;
UIManager.UIAll.BigMessage = "";
***
{% endhighlight %}
And finally we revert the behaviour of the scoretable and the content of the message displayed on the screen back.

### The functions
But the script is not over yet, we have to create the function which will spawn the players during the round.

{% highlight cpp %}
Void MeleeSpawnPlayer(CSmPlayer _Player) {
	if (G_SpawnsList.count == 0) {
		foreach (PlayerSpawn in MapLandmarks_PlayerSpawn) G_SpawnsList.add(PlayerSpawn.Id);
	}
{% endhighlight %}

We list all the spawns of the map (I mean the spawn blocks placed by the map creator) if the list is empty.

{% highlight cpp %}
declare SpawnId = NullId;
while (True) {
	SpawnId = G_SpawnsList[MathLib::Rand(0, G_SpawnsList.count - 1)];
	if (SpawnId != G_LatestSpawnId) break;
	if (G_SpawnsList.count == 1) break;
}
{% endhighlight %}

We choose a spawn randomly which will be used by the player, but it won't be the last used spawn (to prevent to have a player spawning in the same spawn as the last player within a few seconds).

{% highlight cpp %}
G_LatestSpawnId = SpawnId;
SM::SpawnPlayer(_Player, 0, MapLandmarks_PlayerSpawn[SpawnId]);
{% endhighlight %}

And now we spawn the player!

{% highlight cpp %}
	declare Removed = G_SpawnsList.remove(SpawnId);
}
{% endhighlight %}
Then we remove the spawn of the list as it has been used.

Now you've your first working gamemode ready! Feel free to launch a local network server to test it! ^_^

## Download the source of the mode
You can download the source of this gamemode by clicking this [link](./assets/Melee_Tuto.Script.txt).

## Learn more about the ManiaScript
If you want to learn more things about ManiaScript, I invite you to check out [this page](./going-further-with-maniascript.html).


  [1]: http://maniaplanet.github.io/documentation/maniascript/tuto/img/script-editor.png
  [2]: http://maniaplanet.github.io/documentation/maniascript/tuto/img/debugger-small.png
  [3]: http://maniaplanet.github.io/documentation/maniascript/tuto/img/debugger-big.png
