---
layout: static
title: Scripts XML-RPC methods and callbacks
description: List of XML-RPC methods and callbacks integrated in the different game modes of Nadeo.
---

# Callbacks

Here is a list of the script callbacks implemented into the official Nadeo modes. 

To use this callbacks you must set S_UseScriptCallbacks in the server settings to true  (it's at false by default).

They all use ManiaPlanet.ModeScriptCallbackArray(string Param1, string Params[]); callback.
Param1 is the name of the callback and Params is an array containing the data.

The only exception is Elite that has some very specific callbacks.

## Common

##### LibXmlRpc_BeginMatch
* Data : An array with the number of the match
* Example : ["3"]
* Note : This callback is sent at the beginning of each match

##### LibXmlRpc_LoadingMap
* Data : An array with the number of the map
* Example : ["1"]
* Note : This callback is sent when the script start to load a map

##### LibXmlRpc_BeginMap
* Data : An array with the number of the map
* Example : ["1"]
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
* Data : An array with the number of the map
* Example : ["1"]
* Note : This callback is sent at the end of each map

##### LibXmlRpc_EndMatch
* Data : An array with the number of the match
* Example : ["3"]
* Note : This callback is sent at the end of each match

##### LibXmlRpc_Rankings
* Data : An array with a list of players with their scores
* Example : ["Login1:Score1;Login2:Score2;Login3:Score3;LoginN:ScoreN"]
* Note : This callback is sent just before `LibXmlRpc_EndTurn`, `LibXmlRpc_EndRound`, `LibXmlRpc_EndSubmatch`, `LibXmlRpc_EndMap` and `LibXmlRpc_EndMatch`

##### LibXmlRpc_Scores
* Data : An array with the match and map scores in team modes
* Example : ["1", "0", "5", "6"]
* Note : ["MatchScoreClan1", "MatchScoreClan2", "MapScoreClan1", "MapScoreClan2"]

## Mode dependant

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


## Royal

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


## Time attack

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


## Joust

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


## Elite

Elite is a bit special as it uses an older callback function and JSON encoding.
ManiaPlanet.ModeScriptCallback(string Param1, string Param2);
Param1 is the name of the callback and Param2 contains the data.

##### BeginMatch
* Note : This callback is sent at the beginning of each match
* Data Example : 
    {
        "Timestamp": 8907890,
        "MatchNumber": 1
    }

##### BeginMap
* Note : This callback is sent at the beginning of each map
* Data Example : 
    {
        "Timestamp": 8910190,
        "MapNumber": 1
    }

##### BeginSubmatch
* Note : This callback is sent at the beginning of each submatch
* Data Example : 
    {
        "Timestamp": 8910190,
        "SubmatchNumber": 1
    }

##### BeginTurn
* Note : This callback is sent at the beginning of each turn
* Data Example : 
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

##### OnCapture
* Note : This callback is sent when the attacker captured the pole
* Data Example : 
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

##### OnHit
* Note : This callback is sent when a player hit another player
* Data Example : 
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

##### OnArmorEmpty
* Note : This callback is sent when a player reaches 0 armor (eliminated by another player, falling in an offzone)
* Data Example : 
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

##### OnPlayerRequestRespawn
* Note : This callback is sent when a player requests a respawn.
* Data Example : 
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

##### OnShoot
* Note : This callback is sent when a player shoots.
* Data Example : 
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

##### OnNearMiss
* Note : This callback is sent when the attacker shot a Laser near a defender without hitting him.
* Data Example : 
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

##### EndTurn
* Note : This callback is sent at the end of each turn.
* Data Example : 
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

##### EndSubmatch
* Note : This callback is sent at the end of each submatch.
* Data Example : 
    {
        "Timestamp": 7699950,
        "SubmatchNumber": 1
    }


##### EndMap
* Note : This callback is sent at the end of each map.
* Data Example : 
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

##### EndMatch
* Note : This callback is sent at the end of each match.
* Data Example : 
    {
        "Timestamp": 8380990,
        "MatchNumber": 1,
        "MatchWinnerClan": 1,
        "Clan1MapScore": 1,
        "Clan2MapScore": 0
    }

##### BeginWarmup
* Note : This callback is sent at the beginning of the warm up.
* Data Example : 
    {
        "Timestamp": 8911200,
        "AllReady": false
    }

##### EndWarmup
* Note : This callback is sent at the end of the warm up.
* Data Example : 
    {
        "Timestamp": 8925780,
        "AllReady": true
    }

##### MatchmakingGetOrder
* Note : The server sends this callback and then waits during 5 seconds to receive the "MatchmakingSetOrder" script event.


# Callbacks

You can also trigger some events in the game mode script by using TriggerModeScriptEvent(String1, String2); via XmlRpc.


## Elite TriggerModeScriptEvent:

##### MatchmakingSetOrder
* Note : Define a specific order for the players in matchmaking.
* String1 : "MatchmakingSetOrder"
* String2 :  "Login1TeamA,Login2TeamA,Login3TeamA|Login1TeamB,Login2TeamB,Login3TeamB"


## Lobby TriggerModeScriptEvent

##### 
* Note : Define a SetRoundDuration inside LobbyMode
* String1 : "LibXmlRpc_Lobby_SetRoundDuration"
* String2 :  "6000" (Time in seconds)


## Common TriggerModeScriptEvent

##### 
* Note : Hide the scores table on alt key for a player:
* String1 : "LibXmlRpc_DisableAltMenu"
* String2 :  "LoginOfThePlayer"

##### 
* Note : Display the scores table on alt key for player:
* String1 : "LibXmlRpc_EnableAltMenu"
* String2 :  "LoginOfThePlayer"

##### 
* Note : Invoke the LibXmlRpc_Rankings script callback
* String1 : "LibXmlRpc_GetRankings"
* String2 :  ""

##### 
* Note : Invoke the LibXmlRpc_Scores script callback
* String1 : "LibXmlRpc_GetScores"
* String2 :  ""

##### 
* Note : Extend the warm up timer for x milliseconds:
* String1 : "WarmUp_Extend"
* String2 :  "60000" (time in ms)

##### 
* Note : Stop the warm up:
* String1 : "WarmUp_Stop"
* String2 :  ""
