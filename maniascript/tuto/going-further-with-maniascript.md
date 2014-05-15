---
layout: static
title: Going further with the ManiaScript
description: Advanced uses of the ManiaScript
---

**Table of Contents**  *generated with [DocToc](http://doctoc.herokuapp.com/)*

- [Specifying parameters for a player](#user-content-specifying-parameters-for-a-player)
- [Spawning a bot](#user-content-spawning-a-bot)
- [Displaying messages on the HUD](#user-content-displaying-messages-on-the-hud)
- [Using the pole in your script](#user-content-using-the-pole-in-your-script)
- [Create and spawn an object](#user-content-create-and-spawn-an-object)
- [Drop an object from a player](#user-content-drop-an-object-from-a-player)
- [The "Actions"](#user-content-the-actions)
	- [Assigning a weapon/action](#user-content-assigning-a-weaponaction)
	- [Managing the event of an action](#user-content-managing-the-event-of-an-action)
- [The Manialink in the ManiaScript](#user-content-the-manialink-in-the-maniascript)
	- [ManiaScript in the Manialink](#user-content-maniascript-in-the-manialink)
		- [Sending ManiaScript script variables to the ManiaScript Manialink variables and vice versa](#user-content-sending-maniascript-script-variables-to-the-maniascript-manialink-variables-and-vice-versa)
			- [Example](#user-content-example)

The things that you may saw before it's just a glimpse of what's possible with the ManiaScript. I'll show you some more advanced functions to do more things in a gamemode.

# Specifying parameters for a player
It's possible to customize the parameters of a player when you spawn him (or while he plays but let's take the first situation).

Instead of calling the function `SM::SpawnPlayer(_Player, 0, MapLandmarks_PlayerSpawn[SpawnId]);`, we'll create our own function to call to spawn of player.

```c++
    Void VSpawnPlayer(CSmPlayer _Player)
    {
    	_Player.ArmorMax 		= 400;
    	_Player.Armor 			= 400;
    	_Player.ArmorGain 		= 0;
    	_Player.AmmoGain 		= 1.;
    	_Player.AmmoPower 		= 1.;
    	_Player.SpeedPower 		= 1.;
    	_Player.IsHighlighted 	= True;
    	_Player.StaminaMax 		= 1.;
    	_Player.StaminaGain 	= 1.;
    	_Player.StaminaPower 	= 1.;
    	SetPlayerWeapon(_Player, CSmMode::EWeapon::Rocket, False);
    	SM::SpawnPlayer(_Player, 0, MapLandmarks_PlayerSpawn[SpawnId], Now + 50);
    	SetPlayerAmmoMax(_Player, CSmMode::EWeapon::Rocket, 4);
    	SetPlayerAmmo(_Player, CSmMode::EWeapon::Rocket, 4);
    }
```
All the usable parameters are listed in the `CSmPlayer` class (check the technical documentation about it).

# Spawning a bot
Spawnig a bot is almost the same as spawning a player. The difference is that you have to put a BotPath on the map where the bot must be spawned.
You can differentiate a bot by another by modifying his `kind` in the map editor (with a value between 0 and 10). In the script, you'll find them like this:

```c++
    foreach(Spawn in MapLandmarks_BotPath)
    {
    	if (Spawn.BotPath.Clan == _BotClass) VSpawnBot(Spawn);
    }
```
`_BotClass` is the `kind` of the bot (so the one you search, you can put directly an integer if there is one class of bot or if you search specifically one class only).

To change the behaviour of a bot, you have to use the attributes and functions existing in the `CSmPlayerDriver` class.

# Displaying messages on the HUD
You have mainly two functions for displaying a message to the players (all of them or only one of them). Both functions can be use generally or targeted to a player.

The first one is with SendBigMessage which will display... well a big message at the top center of the player screen. The instruction is:

```c++
    Message::SendBigMessage(TextLib::Compose("""$<%1$> has scored!""", _Player.Name), 3000, 10);
```

`Message` is the call for the library declared before at the beginning of the script. We ask the script to call the function `SendBigMessage` of the `Message` library.

In the example above, the first argument is the text to display. Thanks to `Compose` function of the `TextLib` library, we can put arguments if you want to display messages that are a bit more dynamic. While you're writing the text you can add the text `$<%1$>` to tell the Compose function that you're adding an argurment that you'll fill just after. In the example, we indicate a player name (but it could be anything else). Then we indicate the duration of the message, 3000 milliseconds which equal 3 seconds.

You can specify a receiver if you indicate a CSmPlayer variable as first argument of the `SendBigMessage` function like this:

```c++
    Message::SendBigMessage(ReceiverPlayer, TextLib::Compose("""$<%1$> has scored!""", _Player.Name), 3000, 10);
```

Else there is another function to display message, smaller ones, on the HUD, by using the function `SendStatusMessage`:

```c++
    Message::SendStatusMessage(TextLib::Compose("""$<%1$> has scored!""", _Player.Name), 3000, 10);
```

It works like `SendBigMessage`.

# Using the pole in your script
If you want to use a pole in your script because it is a pole based gamemode like Battle or Siege.

First you must reset the progression of the pole (to prevent to have a half-captured pole at the beginning of the round):

```c++
    ***StartRound***
    ***
    foreach(Pole in BlockPoles) {
    	Pole.Gauge.Value = 0;
    	Pole.Gauge.Max = S_CaptureMaxValue;
    	Pole.Captured = False;
    }
    ***
```

Then you have to manage the pole during the `Playloop`:

```c++
    foreach(Pole in BlockPoles) {
    	foreach(PlayerId in Pole.Sector.PlayersIds) {
    		declare Player <=> Players[PlayerId];
    		if(Player == Null) {
    			continue;
    		} else {
    			Pole.Gauge.Speed = 1;
    			Pole.Gauge.Max = 3000;
    			Pole.Captured = True;

    			if (Pole.Gauge.Value == Pole.Gauge.Max) {
    				Player.Score.Points += 1;

    				MB_StopRound = True;
    				Message::SendBigMessage(TextLib::Compose("$<%1$> has loaded the Pole!", Player.Name), 4000, 10);
    				break;
    			}
    		}
    	}
    	if (Pole.Sector.PlayersIds.count == 0) {
    		Pole.Gauge.Speed = 0;
    		Pole.Gauge.Value = 0;
    		Pole.Captured = False;
    	}
    }
```

In this example, we check all the pole of the map and on each of them, we check if there is a player around it, if so we are loading the pole and if the pole is loaded, we give to the player one point and we stop the round. If there is no one, the pole is reset.

# Create and spawn an object
If you need to use a dynamic object (a 3D object that can be catched, dropped and can interact with the players and/or the bots).

First you have to declare all the dynamic objects (including mandatory skins if used) that you intend to use in your script:

```c++
    declare Ident G_MyDynamicObject;
    declare Ident G_MyMandatorySkin;

    ***StartServer***
    ***
    ItemList_Begin();
    	G_MyDynamicObject = ItemList_Add("aDynamicObject.Item.gbx");
    	G_MyMandatorySkin = ItemList_Add("aCustomSkin.Item.gbx");
    ItemList_End();
    ***
```

As you can see, you must declare a global variable as Ident to stock the desired item as reference in the `StartServer` section.

Secondly you have to create the object, once or as many times you need with those instructions:

```c++
    declare CSmObject AnObject;
    AnObject = ObjectCreate(G_MyDynamicObject);
```

Once created, you have (maybe, it's depending of your game design) to spawn the item on the World or on a player.

To spawn it on the world, you must check all the anchor of the map and spawn the object on them (all of them, you can't choose). The issue is that an anchor of the item must exist on the map or the item will not be spawned.

To spawn it with this method, you can do the following:

```c++
    declare CSmObjectAnchor AnObjectAnchor;
    foreach(Anchor in ObjectAnchors) {
    	if(Anchor.Tag == "NameOfTheAnchor") {
    		AnObject.SetAnchor(Anchor);
    		AnObjectAnchor = Anchor;
    		break;
    	}
    }
```

If you want to give it to a player, then you should do this:

```c++
    AnObject.SetPlayer(_Player);
```

In this way the object will be carried by the specified player. You'll be able to find the object located on a player by listing his objects with:

```c++
    aPlayer.Objects[];
```

# Drop an object from a player
For your mode you'll maybe have to drop a dynamic object (like a ball for example) from a player. To do so you'll need this kind of code:

```c++
    Void DropObject(CSmPlayer _Shooter, CSmPlayer _Victim) {
    	if(_Victim.Objects.count <= 0) return;

    	declare CSmObject VictimItem = _Victim.Objects[0];
    	if(VictimItem != Null) {
    		declare Vec3 Pos;
    		declare Vec3 Vel;

    		if(_Shooter != Null) {
    			Pos = _Victim.Position + <0., 3., 0.>;
    			Vel = _Shooter.Position - _Victim.Position;
    			declare Real DropForce = 5.;
    			declare Real VelNorm = MathLib::Sqrt((Vel.X*Vel.X) + (Vel.Y*Vel.Y) + (Vel.Z*Vel.Z));
    			Vel = (- (DropForce/VelNorm) * Vel)  + <0., 5., 0.>;
    		} else {
    			Pos = _Victim.Position + <0., 3., 0.>;
    			Vel = <6., 6., 6.>;
    		}
    		VictimItem.SetPositionAndVel(Pos, Vel);
    	}
    }
```

With this function, the object will be dropped in the opposite direction of the shot (in that way you can suppose from where the shot is from).

# The "Actions"
We'll talk a bit about the `Actions`. An `Action` is a element created in the `ActionMaker` which give you the possibility to build a new weapon or a custom animation for the player.

On a script point of view, you can assign up to 8 actions to a player at the same time from `Slot_A` to `Slot_H`.

First to use an action, you must declare it on the `StartServer` section of your script inside an `ActionList` as follows:

```c++
    declare Ident G_MyCustomWeapon;

    ***StartServer***
    ***
    ActionList_Begin();
    	G_MyCustomWeapon = ActionList_Add("mycustombullet.Action.Gbx");
    ActionList_End();
    ***
```

`G_MyCustomWeapon` must be declared as a global variable to be usable everywhere in your script. Note also that the Actions will be search in the folder `Actions` (at the root of the package tree).

## Assigning a weapon/action
To assign a weapon created with the ActionMaker to a player, you have to use the following code:

```c++
    ActionLoad(Player, CSmMode::EActionSlot::Slot_A, G_MyCustomWeapon);
    ActionBind(Player, CSmMode::EActionSlot::Slot_A, CSmMode::EActionInput::Weapon);
```

`CSmMode::EActionInput::Weapon` is referencing the fire button (left click usually), if you want to put an action on the right-click, you have to specify `Movement` as input instead of `Weapon`. But if you do that, the player won't be able to jump/use his stamina.

The actions can be assigned on the buttons 1, 2, 3 or 4 through `Activable1`, `Activable2`, `Activable3` and `Activable4`.

## Managing the event of an action
If you use an action as a weapon, you can't manage exactly the event the same way as a Storm bullet (rocket/nucleus/arrow/laser). You have to manage the fire and hit events on the `OnActionCustomEvent` event instead of `OnHit`.

For a bullet, the state of an action is symbolized with its first parameter: `Event.Param1[0]`. For example if you want to know if a bullet has been fired, you have to compare this parameter with the text `"fire"`.

If you want to retrieve the damage done by the bullet, you should check the second parameter of the action: `Event.Param2[0]` and be sure that the event sent by action is `"damage"` for the first parameter. Note that the parameter is a Text type, so you have to convert it with the TextLib if you want to use it directly during the calculation of the damage.

Please note also the parameters can be altered by the creator of the action (if he has customized the script of the weapon to do so).

Here is an example on how to manage the event of an action:

```c++
    } else if (Event.Type == CSmModeEvent::EType::OnActionCustomEvent) {
    	if(Event.Param1 == "fire" && Event.Shooter != Null){
    		log("The Player has fired");

    		PassOn(Event);
    	} else if(Event.Param1 == "damage" && Event.Shooter != Null && Event.Victim != Null && Event.Victim != Event.Shooter) {
    		Event.Victim.Armor -= TextLib::ToInteger(Event.Param2[0]);

    		PassOn(Event);
    	}
    }
```

You can still manage the death of the players through the `OnArmorEmpty` event.

# The Manialink in the ManiaScript
It's possible to write some Manialink code in your script. This is useful when you want to display some custom information or even to create a complete custom ingame UI.

If you want to do so, you have first to create a text variable which will contain the manialink and then to treat the manialink:

```c++
    declare Text MLText = "<label posn="0 0 0" text="This is an example" />";

    declare Layer <=> Layers::Get("ExampleUI");
    if(Layer == Null) Layer::Create("ExampleUI", MLText);

    Layer <=> Layers::Get("ExampleUI");
    Layer.Type = CUILayer::EUILayerType::Normal;
    Layers::Attach("ExampleUI", Player);
```

In the example, once you have stocked your manialink in the text variable, you check if a layer (of the UI) already has the desired name for the layer. If not, we create it and then we specify the type of the layer and we attach it to the UI of the player.

> **Tip:** You can add a multilines content text variable by using the delimiter `"""` instead of `""`. By doing this you can write on 10 lines with the formatting and then indicate the end of the content to add in the variable.

At the end of the round (or the map), I recommend to destroy all the layers to avoid redundant information on the screen of the player. To destroy the layers, you must use this instruction directly in the script:

```c++
    Layers:DestroyAll();
```

## ManiaScript in the Manialink
You can use some ManiaScript in your Manialink too and even to have access to few script elements directly in your Manialink or in the ManiaScript of the Manialink.

Please note that you can't use some of the ManiaScript functions and variable while you're in a Manialink.

First to use some ManiaScript in your Manialink, you have to write the ManiaScript code after the Manialink code like this:

```c++
    Text MyManialink() {
    	declare Text MLText = """
    		<quad id="aQuad" posn="0 0 0" sizen="360 180" halign="center" image="./Media/Manialinks/MyImage.dds" />
    		<script><!--
    		main() {
    			declare Integer aVar = 0;

    			declare aQuad	 		<=> (Page.GetFirstChild("aQuad") 		as CMlQuad);

    			aQuad.Show();

    			while(True) {
    				yield;

    				// EVENT
    				foreach(Event in PendingEvents) {
    					if(Event.Type == CMlEvent::Type::MouseClick) {
    						if(Event.ControlId == "aQuad") {
    							log("I clicked on a quad");
    					}
    				}
    			}
    		}
    		--></script>
    	""";

    	Layers::Create("ExampleUI", MLText);
    	declare Layer <=> Layers::Get("ExampleUI");
    	Layer.Type = CUILayer::EUILayerType::Normal;
        Layers::Attach("ExampleUI", Player);
    }
```

In this example you can see how works the ManiaScript in the Manialink. Once you've written your ManiaLink you can start writting your script between the tag `<script><!-- //code --></script>`. In this portion of code you can use the ManiaScript present in the `CSmMIScriptIngame`, `CMlControl` and `CMlPage` classes.

Note that you can check several events like the different sort of clicks of the mouse on the elements (like Quad, Label, Gauge, etc).

If you want the script to run during the whole time it's attached to the UI of the player, you should put your code in a loop. Otherwise the code will be executed only at the very moment when the layer is attached.

> **Tip:** Note that GUIPlayer in `CSmMIScriptIngame` is very useful because you have access to the attributes of the CSmPlayer attributes with it.
>
> **Tip:** You call variables from the main script if you put a triple brackets between the name of the variable like this: `{{{S_PointLimit}}}`. But with this method you can't manipulate them (like doing calculation, modification). See below to know how to do it properly.

### Sending ManiaScript script variables to the ManiaScript Manialink variables and vice versa
First you need to know that the script of the gamemode and the manialink inside are two separate layers which don't communicate between them initially. The script is run on the server while the manialink is read locally on the computer of the player. To make it so, you need to use a "new" type of variable which will be read by the script and the manialink.

It works like an "input/output" system in simple language. In a logic sense, you must create first an "output" variable, symbolized with the parameter `netwrite` in ManiaScript. This parameter tell that the variable will register/put a value to send to the other layer (the script or the manialink):

```c++
    declare netwrite Integer Srv_MyVariable for UI;
```

The "for UI" means that the variable is adressed to a specific player (first you have to retrieve the UI of the player with the instruction `declare UI <=> UIManager.GetUI(Player);`).

> **Tip:** Instead of retrieving all the UIs if the variable is addressed for all players, you can specify `for Teams[0]` or `for Teams[1]`.

> **Info:** This type of variable (netwrite/netread) doesn't work with the bots, it'll crash the script if you try do it, so be sure that when you manipulate this type of variable in the script, to exclude the bot from the execution of the code (**Tip:** the bot doesn't have an UI, so you can do a check when you have retrieve the UI of a player by test it with `if(UI != Null)`).

You have to create an "input" variable on the side where you will receive the value of the other part (for example from the script to the variable) with the `netread` parameter between the declaration and the type of the variable:

```c++
    declare netread Integer Srv_MyReadVariable for UI;
```

> **Note:** You can't name a netread/netwrite variable with the same name of an existing "standard" variable (name conflict)

> **Important:** You can't manipulate the value of a `netread` variable (or the script will crash)

#### Example

```c++
    #Extends "Modes/ShootMania/ModeBase.Script.txt"

    #Const  CompatibleMapTypes  "MeleeArena"
    #Const  Version             "1.0.0"
    #Const  ScriptName          "Melee_Tutorial.Script.txt"

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
    #Setting S_TimeLimit    600 as _("Time limit")      ///< Time limit on a map
    #Setting S_PointLimit   25  as _("Points limit")    ///< Points limit on a map

    declare Ident[]	G_SpawnsList;		///< Id of all the BlockSpawns of the map
    declare Ident	G_LatestSpawnId;	///< Id of the last BlockSpawn used

    ***StartServer***
    ***
    UseClans = False;

    declare PointsLayerId      = Layers::Create("PointsLayer", PointLayerLayerText());
    declare Attached           = Layers::Attach("PointsLayer", NullId);

    ST2::SetStyle("LibST_SMBaseSolo");
    ST2::SetTeamsMode(False);
    ST2::SetTeamsScoresVisibility(False);
    ST2::Build("SM");
    ***

    ***StartMap***
    ***
    G_SpawnsList.clear();
    G_LatestSpawnId = NullId;
    // ---------------------------------- //
    // Init bases
    foreach (Base in Bases) {
        Base.Clan = 0;
        Base.IsActive = True;
    }

    // ---------------------------------- //
    // Init scores
    MB_Sleep(1); ///< Allow the scores array to be sorted
    foreach (Score in Scores) {
        declare Integer LastPoint for Score;
        LastPoint = 0;
    }

    declare LeadId = NullId;
    if (Scores.existskey(0)) LeadId = Scores[0].User.Id;

    declare CurrentPointLimit = S_PointLimit;

    // ---------------------------------- //
    StartTime = Now;
    EndTime = StartTime + (S_TimeLimit * 1000);
    UIManager.UIAll.UISequence = CUIConfig::EUISequence::Playing;
    ***

    ***StartRound***
    ***
    foreach(Player in Players){
        declare UI <=> UIManager.GetUI(Player);
        declare netwrite Integer Net_Points for UI;
        Net_Points = 0;
    }
    ***

    ***PlayLoop***
    ***
    foreach (Event, PendingEvents) {
        // ---------------------------------- //
        // On armor empty
        if (Event.Type == CSmModeEvent::EType::OnArmorEmpty) {
            if (Event.Shooter == Null) {
                Event.Victim.Score.Points -= 1;
            } else {
                Event.Shooter.Score.Points += 1;
                declare UI <=> UIManager.GetUI(Event.Shooter);
                declare netwrite Integer Net_Points for UI;
                Net_Points = Event.Shooter.Score.Points;
            }
            XmlRpc::OnArmorEmpty(Event);
            PassOn(Event);
        }

        // ---------------------------------- //
        // On hit
        else if (Event.Type == CSmModeEvent::EType::OnHit) {
            if (Event.Shooter == Event.Victim) {
                Discard(Event);
            } else {
                Event.Victim.Armor -= Event.Damage;
                XmlRpc::OnHit(Event);
                PassOn(Event);
            }
        }

        // ---------------------------------- //
        // On player request respawn
        else if (Event.Type == CSmModeEvent::EType::OnPlayerRequestRespawn) {
            Event.Player.Score.Points -= 1;
            XmlRpc::OnPlayerRequestRespawn(Event);
            PassOn(Event);
        }

        // ---------------------------------- //
        // Others
        else {
            PassOn(Event);
        }
    }

    // ---------------------------------- //
    // Spawn players
    foreach (Player in Players) {
        if (Player.SpawnStatus == CSmPlayer::ESpawnStatus::NotSpawned && !Player.RequestsSpectate) {
            MeleeSpawnPlayer(Player);
        }
    }

    // ---------------------------------- //
    // Play sound and notice if someone is taking the lead
    if (Scores.existskey(0) && Scores[0].User.Id != LeadId) {
        LeadId = Scores[0].User.Id;
        Message::SendBigMessage(TextLib::Compose(_("$<%1$> takes the lead!"), Scores[0].User.Name), 3000, 1, CUIConfig::EUISound::PhaseChange, 1);
    }

    // ---------------------------------- //
    // victory conditions
    declare IsMatchOver = False;
    if (Now > EndTime) IsMatchOver = True;
    foreach (Player in Players) {
        if (Player.Score != Null && Player.Score.Points >= CurrentPointLimit) IsMatchOver = True;
    }

    if (IsMatchOver) MB_StopMap = True;
    ***

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

    foreach (Player in Players) {
        if (Player.User != Winner) UnspawnPlayer(Player);
        Interface::UpdatePosition(Player);
    }

    MB_Sleep(1000);

    Message::CleanBigMessages();

    UIManager.UIAll.BigMessageSound = CUIConfig::EUISound::EndRound;

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

    UIManager.UIAll.UISequence = CUIConfig::EUISequence::Podium;
    while(!UIManager.UIAll.UISequenceIsCompleted) {
        MB_Yield();
    }

    UIManager.UIAll.ScoreTableVisibility = CUIConfig::EVisibility::Normal;
    UIManager.UIAll.BigMessage = "";
    ***

    Void MeleeSpawnPlayer(CSmPlayer _Player) {
        if (G_SpawnsList.count == 0) {
            foreach (PlayerSpawn in MapLandmarks_PlayerSpawn) G_SpawnsList.add(PlayerSpawn.Id);
        }

        declare SpawnId = NullId;
        while (True) {
            SpawnId = G_SpawnsList[MathLib::Rand(0, G_SpawnsList.count - 1)];
            if (SpawnId != G_LatestSpawnId) break;
            if (G_SpawnsList.count == 1) break;
        }

        G_LatestSpawnId = SpawnId;
        SM::SpawnPlayer(_Player, 0, MapLandmarks_PlayerSpawn[SpawnId]);

        declare Removed = G_SpawnsList.remove(SpawnId);
    }

    Text PointLayerLayerText(){
        declare Text MLText = """
            <label posn="130 50 35" text="YOUR POINTS: 0" style="TextButtonMedium" id="Label_Points" scale="0.90" halign="center" valign="center" textsize="4" />
            <script><!--
            #Include "TextLib" as TL

            main() {
                declare netread Integer Net_Points for UI;

                declare Label_Points           <=> (Page.GetFirstChild("Label_Points")        as CMlLabel);

                Label_Points.Show();

                while(True) {
                    yield;

                    Label_Points.SetText("YOUR POINTS: "^TL::ToText(Net_Points));
                }
            }
            --></script>
        """;

        return MLText;
    }
```
