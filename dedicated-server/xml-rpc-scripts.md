---
layout: static
title: Scripts XML-RPC methods and callbacks
description: List of XML-RPC methods and callbacks integrated in the different game modes of Nadeo.
---

# Callbacks

This is a list of the script callbacks implemented into the official Nadeo modes. 

To use this callbacks you must set S_UseScriptCallbacks in the server settings to true  (it's at false by default).

They all use ManiaPlanet.ModeScriptCallbackArray(string Param1, string Params[]); callback.
Param1 is the name of the callback and Params is an array containing the data.

The only exception is Elite that has some very specific callbacks.

## Common

##### LibXmlRpc_BeginMatch
* Data : An array with the number of the match and a boolean indicating if the script was restarted or not.
* Example : ["3", "False"]
* Note : This callback is sent at the beginning of each match

##### LibXmlRpc_LoadingMap
* Data : An array with the number of the map
* Example : ["1"]
* Note : This callback is sent when the script start to load a map

##### LibXmlRpc_BeginMap
* Data : An array with the number of the map, its UID and if the map is new or restarted.
* Example : ["1", "2icir0pvzfqwf4h9j3B5lkjYu4n", "False"]
* Note : This callback is sent at the beginning of each map

##### LibXmlRpc_BeginSubmatch
* Data : An array with the number of the submatch
* Example : ["2"]
* Note : This callback is sent at the beginning of each submatch if the mode uses submatches

##### LibXmlRpc_BeginRound
* Data : An array with the number of the round
* Example : ["4"]
* Note : This callback is sent at the beginning of each round if the mode uses rounds

##### LibXmlRpc_BeginTurn
* Data : An array with the number of the turn
* Example : ["5"]
* Note : This callback is sent at the beginning of each turn if the mode uses turns

##### LibXmlRpc_BeginPlaying
* Data : Nothing
* Example : []
* Note : This callback is sent at the beginning of the play loop

##### LibXmlRpc_EndPlaying
* Data : Nothing
* Example : []
* Note : This callback is sent at the end of the play loop

##### LibXmlRpc_EndTurn
* Data : An array with the number of the turn
* Example : ["5"]
* Note : This callback is sent at the end of each turn if the mode uses turns

##### LibXmlRpc_EndRound
* Data : An array with the number of the round
* Example : ["4"]
* Note : This callback is sent at the end of each round if the mode uses rounds

##### LibXmlRpc_EndSubmatch
* Data : An array with the number of the submatch
* Example : ["2"]
* Note : This callback is sent at the end of each submatch if the mode uses submatches

##### LibXmlRpc_EndMap
* Data : An array with the number of the map and its UID
* Example : ["1", "2icir0pvzfqwf4h9j3B5lkjYu4n"]
* Note : This callback is sent at the end of each map

##### LibXmlRpc_UnloadingMap
* Data : An array with the number of the map
* Example : ["1"]
* Note : This callback is sent when the script start to unload a map

##### LibXmlRpc_EndMatch
* Data : An array with the number of the match
* Example : ["3"]
* Note : This callback is sent at the end of each match

##### LibXmlRpc_BeginPodium
* Data : Nothing
* Example : []
* Note : This callback is sent at the beginning of podium sequence

##### LibXmlRpc_EndPodium
* Data : Nothing
* Example : []
* Note : This callback is sent at the end of the podium sequence

##### LibXmlRpc_BeginWarmUp
* Data : Nothing
* Example : []
* Note : This callback is sent at the beginning of the warm up

##### LibXmlRpc_EndWarmUp
* Data : Nothing
* Example : []
* Note : This callback is sent at the end of the warm up


## ShootMania

### Common

##### LibXmlRpc_Rankings
* Data : An array with a list of players with their scores
* Example : ["Login1:Score1;Login2:Score2;Login3:Score3;LoginN:ScoreN"]
* Note : This callback is sent just before `LibXmlRpc_EndTurn`, `LibXmlRpc_EndRound`, `LibXmlRpc_EndSubmatch`, `LibXmlRpc_EndMap` and `LibXmlRpc_EndMatch`

##### LibXmlRpc_Scores
* Data : An array with the match and map scores in team modes
* Example : ["1", "0", "5", "6"]
* Note : ["MatchScoreClan1", "MatchScoreClan2", "MapScoreClan1", "MapScoreClan2"]

##### LibXmlRpc_PlayerRanking
* Data : An array with the current rank in the scores, login, nickname, team id, spectator status, away status, points and zone of a player
* Example : ["1", "eole", "b`Side.Eole", "0", "False", "False", "10", "World|Europe|France|Outre-Mer|Reunion"]
* Note : [Rank, Login, NickName, TeamId, IsSpectator, IsAway, CurrentPoints, Zone]

##### WarmUp_Status
* Data : An array with one value saying if the mode use a warm up or not
* Example : ["True"]
* Note : This callback is sent after using the `WarmUp_GetStatus` method

##### LibAFK_IsAFK
* Data : An array with the login of the AFK player
* Example : ["Login"]
* Note : This callback is sent when the AFK library detects an AFK player, it will be sent until the player is forced into spectator mode

##### LibAFK_Properties
* Data : An array with the properties of the AFK library
* Example : ["90000", "15000", "10000", "True"]
* Note : 
    * IdleTimeLimit -> Time after which a player is considered to be AFK
    * SpawnTimeLimit -> Time after spawn before which a player can't be considered to be AFK
    * CheckInterval -> Time between each AFK check
    * ForceSpec -> Let the library force the AFK player into spectator mode


### Mode dependent

To avoid to spam XmlRpc these events are sent only if it has an interest for the mode

##### LibXmlRpc_OnShoot
* Data : An array with the login of the shooter and the number of the weapon used
* Example : ["ShooterLogin", "1"]
* Note : This callback is sent when a player shoots. 
Weapon number -> 1: Laser, 2: Rocket, 3: Nucleus, 5: Arrow

##### LibXmlRpc_OnHit
* Data : An array with the login of the shooter, the login of the victim, the amount of damage, the weapon number and the shooter points (the +1, +2, etc displayed in game when you hit someone)
* Example : ["ShooterLogin", "VictimLogin", "200", "1", "2"]
* Note : This callback is sent when a player is hit. 
One armor point = 100 damage, Weapon number -> 1: Laser, 2: Rocket, 3: Nucleus, 5: Arrow

##### LibXmlRpc_OnNearMiss
* Data : An array with the login of the shooter, the login of the victim, the weapon number and the distance of the miss
* Example : ["ShoterLogin", "VictimLogin", "1", "0.05"]
* Note : This callback is sent when a player shot a Laser near another player without hitting him. 
The distance is in meter.

##### LibXmlRpc_OnArmorEmpty
* Data : An array with the login of the shooter, the login of the victim, the amount of damage, the weapon number and the shooter points (the +1, +2, etc displayed in game when you hit someone)
* Example : ["ShooterLogin", "VictimLogin", "100", "3", "1"]
* Note : This callback is sent when a player has 0 armor (hit by a player, fall in an offzone, ...)
One armor point = 100 damage, Weapon number -> 1: Laser, 2: Rocket, 3: Nucleus, 5: Arrow

##### LibXmlRpc_OnCapture
* Data : An array with the login of the players who were on the pole plate when it was captured
* Example : ["Login1;Login2;Login3;LoginN"]
* Note : This callback is sent when a pole is captured.

##### LibXmlRpc_OnPlayerRequestRespawn
* Data : An array with the login of the player requesting the respawn
* Example : ["Login"]
* Note : This callback is sent when a player requests a respawn.


### Royal

##### Royal_UpdatePoints
* Data : An array with the login of the player scoring the point, the type of points and the number of points
* Example : ["Login", "Pole", "10"]
* Note : This callback is sent when a player scores points. 
The points can be of three types: Hit, Pole or Survival

##### Royal_SpawnPlayer
* Data : An array with the login of the player spawning and the type of spawn
* Example : ["Login", "1"]
* Note : This callback is sent when a player spawns or respawns.
Two type of spawn -> 0: normal, 1: early . The normal spawn is the first spawn of the player, while an early respawn is when a player respawn during a round before the pole is captured.


### Time attack

##### TimeAttack_OnStart
* Data : An array with the login of the player
* Example : ["Login"]
* Note : This callback is sent when a player starts a run.

##### TimeAttack_OnCheckpoint
* Data : An array with the login of the player and its time at the checkpoint
* Example : ["Login", "37840"]
* Note : This callback is sent when a player crosses a checkpoint.
The time is in milliseconds.

##### TimeAttack_OnFinish
* Data : An array with the login of the player and its time at the finish
* Example : ["Login", "149890"]
* Note : This callback is sent when a player crosses the finish line.
The time is in milliseconds.

##### TimeAttack_OnRestart
* Data : An array with the login of the player and its time at the time of the restart
* Example : ["Login", "3540"]
* Note : This callback is sent when a player asks to respawn or is eliminated.
The time is in milliseconds.


### Joust

##### Joust_OnReload
* Data : An array with the login of the player reloading
* Example : ["Login"]
* Note : This callback is sent when a player touches a pole to reload.

##### Joust_SelectedPlayers
* Data : An array with the logins of the two players who'll play the round.
* Example : ["LoginPlayer1", "LoginPlayer2"]
* Note : This callback is sent at the beginning of the round to announce the two opponents.

##### Joust_RoundResult
* Data : An array with the logins and score of each player of the round
* Example : ["LoginPlayer1:ScorePlayer1", "LoginPlayer2:ScorePlayer2"]
* Note : This callback is sent at the end of the round.


### Elite

Elite is a bit special as it uses an older callback function and JSON encoding.
ManiaPlanet.ModeScriptCallback(string Param1, string Param2);
Param1 is the name of the callback and Param2 contains the data.

The generic callbacks listed above are also sent in Elite. So if you want to turn off the JSON ones you can change the setting S_UseLegacyCallback to False (it's at True by default).

##### BeginMatch
* Note : This callback is sent at the beginning of each match
* Data Example : 

{% highlight json %}
{
    "Timestamp": 8907890,
    "MatchNumber": 1,
    "Restart": false
}
{% endhighlight %}

##### BeginMap
* Note : This callback is sent at the beginning of each map
* Data Example : 

{% highlight json %}
{
    "Timestamp": 8910190,
    "MapNumber": 1,
    "Restart": false
}
{% endhighlight %}

##### BeginSubmatch
* Note : This callback is sent at the beginning of each submatch
* Data Example : 

{% highlight json %}
{
    "Timestamp": 8910190,
    "SubmatchNumber": 1
}
{% endhighlight %}

##### BeginTurn
* Note : This callback is sent at the beginning of each turn
* Data Example : 

{% highlight json %}
{
    "Timestamp": 2793470,
    "TurnNumber": 2,
    "StartTime": 2796470,
    "EndTime": 2856470,
    "PoleTime": 2841470,
    "AttackingClan": 2,
    "DefendingClan": 1,
    "AttackingPlayer": {
        "Login": "eole2",
        "Name": "$aafV².$fffAessi",
        "CurrentClan": 2,
        "Armor": 300,
        "ArmorMax": 300,
        "IsTouchingGround": false,
        "IsCapturing": false,
        "IsInOffZone": false,
        "Score": {
            "AtkPoints": 0,
            "DefPoints": 3,
            "GoalAverage": 2
        }
    },
    "DefendingPlayers": [
        {
            "Login": "eole",
            "CurrentClan": 1,
            "AtkPoints": 0,
            "DefPoints": 0
        },
        {
            "Login": "test2",
            "CurrentClan": 1,
            "AtkPoints": 0,
            "DefPoints": 0
        },
        {
            "Login": "test3",
            "CurrentClan": 1,
            "AtkPoints": 0,
            "DefPoints": 0
        }
    ]
}
{% endhighlight %}

##### OnCapture
* Note : This callback is sent when the attacker captured the pole
* Data Example : 

{% highlight json %}
{
    "Timestamp": 1329230,
    "StartTime": 1279720,
    "EndTime": 1339720,
    "PoleTime": 1324720,
    "Event": {
        "Type": "EType::OnCapture",
        "Damage": 0,
        "WeaponNum": 0,
        "MissDist": 0,
        "Player": {
            "Login": "eole2",
            "Name": "$aafV².$fffAessi",
            "CurrentClan": 2,
            "Armor": 100,
            "ArmorMax": 100,
            "IsTouchingGround": true,
            "IsCapturing": true,
            "IsInOffZone": false,
            "Score": {
                "AtkPoints": 0,
                "DefPoints": 0,
                "GoalAverage": -3
            }
        },
        "Pole": {
            "Tag": "Goal A",
            "Order": 0,
            "Captured": false
        }
    }
}
{% endhighlight %}

##### OnHit
* Note : This callback is sent when a player hit another player
* Data Example : 

{% highlight json %}
{
    "Timestamp": 161900,
    "StartTime": 156830,
    "EndTime": 216830,
    "PoleTime": 201830,
    "Event": {
        "Type": "EType::OnHit",
        "Damage": 100,
        "WeaponNum": 1,
        "MissDist": 0,
        "HitDist": 2.34118,
        "Shooter": {
            "Login": "eole2",
            "Name": "$aafV².$fffAessi",
            "CurrentClan": 2,
            "Armor": 100,
            "ArmorMax": 100,
            "IsTouchingGround": true,
            "IsCapturing": false,
            "IsInOffZone": false,
            "Score": {
                "AtkPoints": 0,
                "DefPoints": 1,
                "GoalAverage": 0
            },
            "Position": [45.65, 1.267, 6.498]
        },
        "Victim": {
            "Login": "eole",
            "Name": "$i$888b$fff`$888Side.$fffEole",
            "CurrentClan": 1,
            "Armor": 100,
            "ArmorMax": 100,
            "IsTouchingGround": true,
            "IsCapturing": false,
            "IsInOffZone": false,
            "Score": {
                "AtkPoints": 0,
                "DefPoints": 0,
                "GoalAverage": -2
            },
            "Position": [68.167495, 45.423, 6.19]
        }
    }
}
{% endhighlight %}

##### OnArmorEmpty
* Note : This callback is sent when a player reaches 0 armor (eliminated by another player, falling in an offzone)
* Data Example : 

{% highlight json %}
{
    "Timestamp": 10117060,
    "StartTime": 10080830,
    "EndTime": 10140830,
    "PoleTime": 10125830,
    "Event": {
        "Type": "EType::OnArmorEmpty",
        "Damage": 0,
        "WeaponNum": 0,
        "MissDist": 0,
        "Shooter": {
            "Login": "eole2",
            "Name": "$aafV².$fffAessi",
            "CurrentClan": 2,
            "Armor": 100,
            "ArmorMax": 100,
            "IsTouchingGround": true,
            "IsCapturing": true,
            "IsInOffZone": false,
            "Score": {
                "AtkPoints": 0,
                "DefPoints": 0,
                "GoalAverage": 0
            },
            "Position": [145.12, 10.2654, 0.144]
        },
        "Victim": {
            "Login": "eole",
            "Name": "$i$888b$fff`$888Side.$fffEole",
            "CurrentClan": 1,
            "Armor": 0,
            "ArmorMax": 100,
            "IsTouchingGround": true,
            "IsCapturing": true,
            "IsInOffZone": false,
            "Score": {
                "AtkPoints": 0,
                "DefPoints": 0,
                "GoalAverage": -1
            },
            "Position": [95.45, 58.65, 9.157]
        }
    }
}
{% endhighlight %}

##### OnPlayerRequestRespawn
* Note : This callback is sent when a player requests a respawn.
* Data Example : 

{% highlight json %}
{
    "Timestamp": 142460,
    "StartTime": 100460,
    "EndTime": 160460,
    "PoleTime": 145460,
    "Event": {
        "Type": "EType::OnPlayerRequestRespawn",
        "Damage": 0,
        "WeaponNum": 0,
        "MissDist": 0,
        "Player": {
            "Login": "eole",
            "Name": "$i$888b$fff`$888Side.$fffEole",
            "CurrentClan": 1,
            "Armor": 100,
            "ArmorMax": 100,
            "IsTouchingGround": true,
            "IsCapturing": false,
            "IsInOffZone": false,
            "Score": {
                "AtkPoints": 0,
                "DefPoints": 0,
                "GoalAverage": 0
            }
        }
    }
}
{% endhighlight %}

##### OnShoot
* Note : This callback is sent when a player shoots.
* Data Example : 

{% highlight json %}
{
    "Timestamp": 1784110,
    "StartTime": 1778750,
    "EndTime": 1838750,
    "PoleTime": 1823750,
    "Event": {
        "Type": "EType::OnShoot",
        "Damage": 0,
        "WeaponNum": 1,
        "MissDist": 0,
        "Shooter": {
            "Login": "eole2",
            "Name": "$aafV².$fffAessi",
            "CurrentClan": 2,
            "Armor": 100,
            "ArmorMax": 100,
            "IsTouchingGround": true,
            "IsCapturing": false,
            "IsInOffZone": false,
            "Score": {
                "AtkPoints": 0,
                "DefPoints": 0,
                "GoalAverage": 0
            },
            "Position": [193.142, 0.995464, 159.373]
        }
    }
}
{% endhighlight %}

##### OnNearMiss
* Note : This callback is sent when the attacker shot a Laser near a defender without hitting him.
* Data Example : 

{% highlight json %}
{
    "Timestamp": 710280,
    "StartTime": 702670,
    "EndTime": 762670,
    "PoleTime": 747670,
    "Event": {
        "Type": "EType::OnNearMiss",
        "Damage": 0,
        "WeaponNum": 0,
        "MissDist": 0.0256433,
        "Shooter": {
            "Login": "eole",
            "Name": "$i$888b$fff`$888Side.$fffEole",
            "CurrentClan": 1,
            "Armor": 100,
            "ArmorMax": 100,
            "IsTouchingGround": true,
            "IsCapturing": false,
            "IsInOffZone": false,
            "Score": {
                "AtkPoints": 0,
                "DefPoints": 0,
                "GoalAverage": 0
            }
        },
        "Victim": {
            "Login": "eole2",
            "Name": "$aafV².$fffAessi",
            "CurrentClan": 2,
            "Armor": 100,
            "ArmorMax": 100,
            "IsTouchingGround": true,
            "IsCapturing": false,
            "IsInOffZone": false,
            "Score": {
                "AtkPoints": 0,
                "DefPoints": 0,
                "GoalAverage": 0
            }
        }
    }
}
{% endhighlight %}

##### EndTurn
* Note : This callback is sent at the end of each turn.
* Data Example : 

{% highlight json %}
{
    "Timestamp": 6909440,
    "TurnNumber": 1,
    "StartTime": 6903090,
    "EndTime": 6909440,
    "PoleTime": 6894440,
    "AttackingClan": 2,
    "DefendingClan": 1,
    "AttackingPlayer": {
        "Login": "eole2",
        "Name": "$aafV².$fffAessi",
        "CurrentClan": 2,
        "Armor": 100,
        "ArmorMax": 100,
        "IsTouchingGround": false,
        "IsCapturing": false,
        "IsInOffZone": false,
        "Score": {
            "AtkPoints": 1,
            "DefPoints": 0,
            "GoalAverage": 3
        }
    },
    "TurnWinnerClan": 2,
    "WinType": "DefenseEliminated",
    "Clan1RoundScore": 0,
    "Clan2RoundScore": 1,
    "Clan1MapScore": 0,
    "Clan2MapScore": 0,
    "ScoresTable": [
        {
            "Login": "eole",
            "CurrentClan": 1,
            "AtkPoints": 0,
            "DefPoints": 0
        },
        {
            "Login": "test1",
            "CurrentClan": 1,
            "AtkPoints": 0,
            "DefPoints": 0
        },
        {
            "Login": "test2",
            "CurrentClan": 1,
            "AtkPoints": 0,
            "DefPoints": 0
        },
        {
            "Login": "eole2",
            "CurrentClan": 2,
            "AtkPoints": 1,
            "DefPoints": 0
        },
        {
            "Login": "test3",
            "CurrentClan": 2,
            "AtkPoints": 0,
            "DefPoints": 0
        },
        {
            "Login": "test4",
            "CurrentClan": 2,
            "AtkPoints": 0,
            "DefPoints": 0
        }
    ]
}
{% endhighlight %}

##### EndSubmatch
* Note : This callback is sent at the end of each submatch.
* Data Example : 

{% highlight json %}
{
    "Timestamp": 7699950,
    "SubmatchNumber": 1
}
{% endhighlight %}


##### EndMap
* Note : This callback is sent at the end of each map.
* Data Example : 

{% highlight json %}
{
    "Timestamp": 7699950,
    "MapNumber": 1,
    "MapWinnerClan": 2,
    "Clan1MapScore": 0,
    "Clan2MapScore": 0,
    "ScoresTable": [
        {
            "Login": "eole",
            "CurrentClan": 1,
            "AtkPoints": 0,
            "DefPoints": 0
        },
        {
            "Login": "test1",
            "CurrentClan": 1,
            "AtkPoints": 0,
            "DefPoints": 0
        },
        {
            "Login": "test2",
            "CurrentClan": 1,
            "AtkPoints": 0,
            "DefPoints": 0
        },
        {
            "Login": "eole2",
            "CurrentClan": 2,
            "AtkPoints": 1,
            "DefPoints": 0
        },
        {
            "Login": "test3",
            "CurrentClan": 2,
            "AtkPoints": 0,
            "DefPoints": 0
        },
        {
            "Login": "test4",
            "CurrentClan": 2,
            "AtkPoints": 0,
            "DefPoints": 0
        }
    ]
}
{% endhighlight %}

##### EndMatch
* Note : This callback is sent at the end of each match.
* Data Example : 

{% highlight json %}
{
    "Timestamp": 8380990,
    "MatchNumber": 1,
    "MatchWinnerClan": 1,
    "Clan1MapScore": 1,
    "Clan2MapScore": 0
}
{% endhighlight %}

##### BeginWarmup
* Note : This callback is sent at the beginning of the warm up.
* Data Example : 

{% highlight json %}
{
    "Timestamp": 8911200,
    "AllReady": false
}
{% endhighlight %}

##### EndWarmup
* Note : This callback is sent at the end of the warm up.
* Data Example : 

{% highlight json %}
{
    "Timestamp": 8925780,
    "AllReady": true
}
{% endhighlight %}

##### MatchmakingGetOrder
* Note : The server sends this callback and then waits during 5 seconds to receive the "MatchmakingSetOrder" script event.


## TrackMania

### Common

##### LibXmlRpc_OnStartCountdown
* Data : An array with the login of the starting player
* Example : ["Login"]
* Note : This callback is sent when a player is spawned on the track before the 3,2,1,Go! countdown.

##### LibXmlRpc_OnStartLine
* Data : An array with the login of the starting player
* Example : ["Login"]
* Note : This callback is sent when a player starts a race.

##### LibXmlRpc_OnWayPoint
* Data : An array with the login of the player crossing the waypoint, the id of the waypoint block, the current race time, the waypoint number in the race, if the waypoint is the end of the race, the current lap time, the waypoint number in the lap and if the waypoint is the end of the lap.
* Example : ["Login", "#123456", "21723", "7", "False", "6164", "1", "False"]
* Note : This callback is sent when a player crosses a waypoint (checkpoint, finish, multilap, ...).

##### LibXmlRpc_OnGiveUp
* Data : An array with the login of the restarting player
* Example : ["Login"]
* Note : This callback is sent when a player restarts.

##### LibXmlRpc_OnRespawn
* Data : An array with the login of the player respawning, the id of the waypoint block, the waypoint number in the race, the waypoint number in the lap and the number of respawns since the beginning of the race.
* Example : ["Login", "#123456", "1", "0", "5"]
* Note : This callback is sent when a player respawns at a waypoint (checkpoint, multilap, ...).

##### LibXmlRpc_OnStunt
* Data : An array with the player login, the stunt points, the combo, the total stunts score, the factor, the stunt name, the angle, if the stunt is straight, if the stunt is reversed, if the stunt is a master jump
* Example : ["Login", "25", "1", "0", "1.2", "::EStuntFigure::Spin", "180", "False", "False", "False"]
* Note : This callback is sent when a player does a stunt. The stunts names are: None, StraightJump, Flip, BackFlip, Spin, Aerial, AlleyOop, Roll, Corkscrew, SpinOff, Rodeo, FlipFlap, Twister, FreeStyle, SpinningMix, FlippingChaos, RollingMadness, WreckNone, WreckStraightJump, WreckFlip, WreckBackFlip, WreckSpin, WreckAerial, WreckAlleyOop, WreckRoll, WreckCorkscrew, WreckSpinOff, WreckRodeo, WreckFlipFlap, WreckTwister, WreckFreeStyle, WreckSpinningMix, WreckFlippingChaos, WreckRollingMadness, TimePenalty, RespawnPenalty, Grind, Reset.

##### LibXmlRpc_PlayerRanking
* Data : An array with the current rank in the scores, login, nickname, team id, spectator status, away status, best time, zone, points, best checkpoints times and total points of a player.
* Example : ["1", "eole", "b`Side.Eole", "0", "False", "False", "101234", "World|Europe|France|Outre-Mer|Reunion", "32", "12300,35641,45213", "50"]
* Note : [Rank, Login, NickName, TeamId, IsSpectator, IsAway, BestTime, Zone, Points, BestCheckpoints, TotalPoints]

##### LibXmlRpc_PlayersRanking
* Data : An array with the login, current rank in the scores, best checkpoints times, team id, spectator status, away status, best time, zone, points and total score of a player.
* Example : ["eole:1:123,456,789:-1:False:False:789:World|Europe|France|Outre-mer|Reunion:0:0", "eole2:1:-1:-1:False:False:-1:World|Europe|France|Outre-mer|Reunion:0:0"]
* Note : ["Login:Rank:BestCheckpoints:TeamId:IsSpectator:IsAway:BestTime:Zone:Points:TotalScore"]
the login, rank, best checkpoints, team id, spectator status, away status, best time, zone, points and total points of the players are separated by a colon. The best checkpoint times are separated by a comma. This callback is sent when the script receives the "LibXmlRpc_GetPlayersRanking" trigger.

##### LibXmlRpc_PlayersScores
* Data : An array with the current score and login of the players.
* Example : ["login1:45", "login19:29", "login48:18", "login7:9"]
* Note : the login and the score of the players are separated by a colon. This callback is sent when the script receives the "LibXmlRpc_GetPlayersScores" trigger.

#### LibXmlRpc_PlayersTimes
* Data : An array with the best time and login of the players.
* Example : ["login1:12654", "login19:15684", "login48:25964", "login7:-1"]
* Note : the login and the best time of the players are separated by a colon. This callback is sent when the script receives the "LibXmlRpc_GetPlayersTimes" trigger.

##### LibXmlRpc_TeamsScores
* Data : An array with the current and total scores of the teams.
* Example : ["1", "5", "2", "5"]
* Note : [ScoreTeam1, ScoreTeam2, TotalScoreTeam1, TotalScoreTeam2]. This callback is sent when the script receives the "LibXmlRpc_GetTeamsScores" trigger.

##### LibXmlRpc_TeamsMode
* Data : An array with a boolean to indicate if the mode use teams or not.
* Example : ["True"]
* Note : This callback is sent when the script receives the "LibXmlRpc_GetTeamsMode" trigger.

##### LibXmlRpc_WarmUp
* Data : An array with a boolean to indicate if the mode is in warm up or not.
* Example : ["True"]
* Note : This callback is sent when the script receives the "LibXmlRpc_GetWarmUp" trigger.


### Rounds / Cup

##### Rounds_PointsRepartition
* Data : An array of text containing the current points repartition.
* Example : ["10", "6", "4", "3", "2", "1"]
* Note : This callback is sent when you use the Rounds_GetPointsRepartition method


# Methods

You can also trigger some events in the game mode script by using TriggerModeScriptEvent(String1, String2); or TriggerModeScriptEventArray(string, array);.

## Common

#### LibXmlRpc_GetPlayerRanking
* Note : Invoke the LibXmlRpc_PlayerRanking script callback for a player
* String1 : "LibXmlRpc_GetPlayerRanking"
* String2 :  "LoginOfThePlayer"

## ShootMania

### Common

##### LibXmlRpc_DisableAltMenu
* Note : Hide the scores table on alt key for a player
* String1 : "LibXmlRpc_DisableAltMenu"
* String2 :  "LoginOfThePlayer"

##### LibXmlRpc_EnableAltMenu
* Note : Display the scores table on alt key for player
* String1 : "LibXmlRpc_EnableAltMenu"
* String2 :  "LoginOfThePlayer"

##### LibXmlRpc_GetRankings
* Note : Invoke the LibXmlRpc_Rankings script callback
* String1 : "LibXmlRpc_GetRankings"
* String2 :  ""

##### LibXmlRpc_GetScores
* Note : Invoke the LibXmlRpc_Scores script callback
* String1 : "LibXmlRpc_GetScores"
* String2 :  ""

##### WarmUp_Extend
* Note : Extend the warm up timer for x milliseconds
* String1 : "WarmUp_Extend"
* String2 :  "60000" (time in ms)

##### WarmUp_Stop
* Note : Stop the warm up
* String1 : "WarmUp_Stop"
* String2 :  ""

##### WarmUp_GetStatus
* Note : Get back if this mode use a warm up or not
* String1 : "WarmUp_GetStatus"
* String2 : ""

##### LibScoresTable2_SetStyleFromXml
* Note : Set the scores table style from an xml string. The first entry of the array is the game used (TM or SM) and the second the XML string of the style. Read the ["Customize the scores table"]({{ site.url }}/dedicated-server/customize-scores-table.html) page to learn more about it.
* String: "LibScoresTable2_SetStyleFromXml"
* Array: ["TM", "<XmlString />"]

##### LibAFK_SetProperties
* Note : Set the properties of the AFK library. The parameters are in this order: IdleTimeLimit, SpawnTimeLimit, CheckInterval, ForceSpec. Check the [library documentation]({{ site.url }}/maniascript/libraries/library-afk.html).
* String : "LibAFK_SetProperties"
* Array : ["90000", "15000", "10000", "True"]

##### LibAFK_GetProperties
* Note : Get the properties of the AFK library. This will sent the `LibAFK_Properties` callback in return.
* String1 : "LibAFK_GetProperties"
* String2 : ""

### Matchmaking

##### Matchmaking_Start
* Note : Enable the matchmaking function in the standard lobby.
* String1 : "Matchmaking_Start"
* String2 : ""

##### Matchmaking_Stop
* Note : Disable the matchmaking function in the standard lobby.
* String1 : "Matchmaking_Start"
* String2 : ""

##### Matchmaking_Force
* Note : Active the matchmaking function immediately, the matchmaking must be enabled beforehand.
* String1 : "Matchmaking_Force"
* String2 : ""

### Combo

#### Combo_SetTimersLayerPosition
* Note : Change the position of the timers layer
* String : "Combo_SetTimersLayerPosition"
* Array :  ["151.5", "-82.", "0."] ([PosX, PosY, PosZ])

### Elite

##### MatchmakingSetOrder
* Note : Define a specific order for the players in matchmaking.
* String1 : "MatchmakingSetOrder"
* String2 :  "Login1TeamA,Login2TeamA,Login3TeamA|Login1TeamB,Login2TeamB,Login3TeamB"

### Siege

#### Siege_SetProgressionLayerPosition
* Note : Change the position of the progression layer
* String : "Siege_SetProgressionLayerPosition"
* Array :  ["160.", "90.", "-20."] ([PosX, PosY, PosZ])

### Lobby

##### LibXmlRpc_Lobby_SetRoundDuration
* Note : Define a SetRoundDuration inside LobbyMode
* String1 : "LibXmlRpc_Lobby_SetRoundDuration"
* String2 :  "6000" (Time in seconds)


## TrackMania

### Common

##### LibXmlRpc_GetPlayersScores
* Note : Get the current score of the players. This method triggers the LibXmlRpc_PlayersScores callback.
* String1 : "LibXmlRpc_GetPlayersScores"
* String2 :  ""

##### LibXmlRpc_GetPlayersTimes
* Note : Get the best times of the players. This method triggers the LibXmlRpc_PlayersTimes callback.
* String1 : "LibXmlRpc_GetPlayersTimes"
* String2 :  ""

##### LibXmlRpc_GetTeamsScores
* Note : Get the current score of the teams. This method triggers the LibXmlRpc_TeamsScores callback.
* String1 : "LibXmlRpc_GetTeamsScores"
* String2 :  ""

##### LibXmlRpc_GetTeamsMode
* Note : Check if the mode use teams. This method triggers the LibXmlRpc_TeamsMode callback.
* String1 : "LibXmlRpc_GetTeamsMode"
* String2 :  ""

##### LibXmlRpc_GetWarmUp
* Note : Check if the mode is in warm up. This method triggers the LibXmlRpc_WarmUp callback.
* String1 : "LibXmlRpc_GetWarmUp"
* String2 :  ""

##### LibXmlRpc_GetPlayersRanking
* Note : Get the current ranking of the players. This method triggers the LibXmlRpc_PlayersRanking callback. The first parameter set the maximum number of players to return. The second set the starting rank.
* String : "LibXmlRpc_GetPlayersRanking"
* Array : ["10","5"] (return 10 players starting at rank 5)

##### LibXmlRpc_SetPlayersScores
* Note : Set the scores of the players.
* String : "LibXmlRpc_SetPlayersScores"
* Array : ["login1:12", "login2:2", "login3:45", ...] (a list of logins and their score seperated by a colon)

##### LibXmlRpc_SetTeamsScores
* Note : Set the score of the teams.
* String : "LibXmlRpc_SetTeamsScores"
* Array : ["3", "5"] ([ScoreTeam1, ScoreTeam2])


### Rounds / Cup / Team

##### Rounds_SetPointsRepartition
* Note : Set a new repartition of points.
* String : "Rounds_SetPointsRepartition"
* Array : ["50", "40", "30"]

##### Rounds_GetPointsRepartition
* Note : Get the current points repartition. This method triggers the Rounds_PointsRepartition callback.
* String1 : "Rounds_GetPointsRepartition"
* String2 :  ""

##### Rounds_ForceEndRound
* Note : Cancel the current round.
* String1 : "Rounds_ForceEndRound"
* String2 : ""

##### UI_DisplaySmallScoresTable
* Note : Show/Hide the small scores table displayed on the right of the screen when finishing the map.
* String1 : "UI_DisplaySmallScoresTable"
* String2 : "False" or "True"