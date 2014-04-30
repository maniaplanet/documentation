---
layout: static
title: Modes settings list
description: List of all the settings available in the Nadeo modes
---

# TrackMania

## All (ModeBase)

|Setting|Default value|Description|
|---|---|---|
|**S_ChatTime**|15|Chat time at the end of the map|
|**S_AllowRespawn**|True|Allow the players to respawn or not|
|**S_WarmUpDuration**|-1|Duration of the warm up phase (<= 0 to disable)|
|**S_UseScriptCallbacks**|False|Turn on/off the script callbacks, useful for server manager|
|**S_ScoresTableStylePath**|""|Try to load a scores table style from an XML file|

## Cup (+RoundsBase)

|Setting|Default value|Description|
|---|---|---|
|**S_RoundsPerMap**|5|Rounds per map|
|**S_NbOfWinners**|3|Number of winners|
|**S_WarmUpDuration**|2|Duration of the warm up phase (<= 0 to disable)|

## Laps

|Setting|Default value|Description|
|---|---|---|
|**S_TimeLimit**|0|Time limit (<= 0 to disable)|
|**S_ForceLapsNb**|5|Number of Laps (<= 0 to disable)|
|**S_FinishTimeout**|-1|Finish timeout (<= 0 to disable)|

## Rounds (+RoundsBase)

|Setting|Default value|Description|
|---|---|---|
|**S_PointsLimit**|50|Points limit (<= 0 to disable)|
|**S_UseTieBreak**|True|Continue to play the map until the tie is broken|

## RoundsBase

|Setting|Default value|Description|
|---|---|---|
|**S_PointsLimit**|100|Points limit (<= 0 to disable)|
|**S_FinishTimeout**|-1|Finish timeout (<= 0 to disable)|
|**S_UseAlternateRules**|False|Use alternate rules|
|**S_ForceLapsNb**|-1|Force number of laps (<= 0 to disable)|

## Team (+RoundsBase)

|Setting|Default value|Description|
|---|---|---|
|**S_PointsLimit**|5|Points limit (<= 0 to disable)|
|**S_MaxPointsPerRound**|6|The maxium number of points attributed to the first player to cross the finish line|
|**S_PointsGap**|1|The number of points lead a team must have to win the map|
|**S_UsePlayerClublinks**|False|Use the players clublinks, or otherwise use the default teams|

## TimeAttack

|Setting|Default value|Description|
|---|---|---|
|**S_TimeLimit**|300|Time limit|

# ShootMania

## All (ModeBase)

|Setting|Default value|Description|
|---|---|---|
|**S_AutoManageAFK**|False|Switch inactive players to spectators|
|**S_UseScriptCallbacks**|False|Turn on/off the script callbacks, useful for server manager|
|**S_NeutralEmblemUrl**|""|Replace the default neutral emblem by another one|
|**S_ScoresTableStylePath**|""|Try to load a scores table style from an XML file|

## Battle

|Setting|Default value|Description|
|---|---|---|
|**S_RespawnTime**|6001|Time before respawn|
|**S_AutoBalance**|True|Use auto balance at the start of the map|
|**S_RoundsToWin**|2|Points to win a map|
|**S_RoundGapToWin**|1|Minimum gap between the two teams to win a map|
|**S_RoundsLimit**|3|Point limit on map|
|**S_TimeLimit**|300|Round time limit (seconds)|
|**S_CaptureMaxValue**|30000|Pole capture time (milliseconds)|
|**S_AlternativePoints**|False|Use atk and def points as score|
|**S_AllowBeginners**|False|Is a Beginners Welcome server|
|**S_AutoManageAFK**|True|Switch inactive players to spectators|
|**S_ArmorPoints**|2|Starting armor points for the players|
|**S_UsePlayerClublinks**|False|Use the players clublinks, or otherwise use the default teams|

## Combo

|Setting|Default value|Description|
|---|---|---|
|**S_NbPlayersPerTeam**|2|Number of players per team (Max. 5)|
|**S_PointsLimit**|3|Points limit (0: No points limit)|
|**S_RoundTimeLimit**|300|Round time limit (0: No time limit)|
|**S_WarmUpDuration**|90|Warmup duration (0: disabled)|
|**S_AllowUnbalancedTeams**|False|Allow a game to begin without the same number of players in each team|
|**S_UseArmorReduction**|False|Reduce the armor of players above two armor points|
|**S_UseLobby**|False|Launch server in lobby mode|
|**S_LobbyTimePerMap**|86400|Time limit in lobby mode (sec., 0: no limit)|
|**S_Matchmaking**|False|Use Combo with matchmaking|
|**S_MatchmakingSleep**|0|Matchmaking match end duration (-1: infinite)|
|**S_UsePlayerClublinks**|False|Use the players clublinks, or otherwise use the default teams|

## Elite (+ModeSport)

|Setting|Default value|Description|
|---|---|---|
|**S_TurnWin**|9|Number of points to win a map|
|**S_UseDraft**|False|Use draft mode at match beginning|
|**S_DraftBanNb**|4|Number of map to ban during draft|
|**S_DraftPickNb**|3|Number of map to pick during draft|
|**S_UseLobby**|False|Launch server in lobby mode|
|**S_LobbyTimePerRound**|60|Time limit per round in lobby mode (sec., 0: no limit)|
|**S_LobbyRoundPerMap**|30|Nb of rounds per map in lobby mode|
|**S_LobbyMatchmakerTime**|10000|in milliseconds, time allocated to the matchmaking|
|**S_LobbyInstagib**|False|Laser mode in lobby|
|**S_DisplayRulesReminder**|True|Display a window with the rules when the match begins

## Heroes (+ModeSport)

|Setting|Default value|Description|
|---|---|---|
|**S_TurnWin**|10|Number of points to win a map|
|**S_TimePoleElimination**|10.|Capture time limit after defense elimination|

## Joust

|Setting|Default value|Description|
|---|---|---|
|**S_RoundPointsToWin**|7|Round points to win|
|**S_RoundPointsGap**|2|Round points gap|
|**S_RoundPointsLimit**|11|Round points limit|
|**S_RoundTimeLimit**|0|Round time limit (<= 0 to disable)|
|**S_PoleTimeLimit**|45|Pole capture time limit|
|**S_MatchPointsToWin**|3|Match points to win|
|**S_MatchPointsGap**|0|Match points gap|
|**S_MatchPointsLimit**|3|Match points limit|
|**S_Matchmaking**|3|Use Joust with matchmaking|
|**S_MatchmakingSleep**|0|Matchmaking match end duration (-1: infinite)|
|**S_UsePlayerClublinks**|False|Use the players clublinks, or otherwise use the default teams|
|**S_UseLobby**|False|Launch server in lobby mode|
|**S_LobbyTimePerMap**|86400|Time limit in lobby mode (sec., 0: no limit)|
|**S_UseWarmup**|False|Start with a warmup|

## ModeSport

|Setting|Default value|Description|
|---|---|---|
|**S_Mode**|0|Mode 0: classic, 1: free|
|**S_TimeLimit**|60|Time for an attack on a map|
|**S_TimePole**|15|Time allowed to reach the pole by the end of the attack|
|**S_TimeCapture**|1.5|Time to capture a pole for the attack clan (* NbPoles)|
|**S_WarmUpDuration**|90|Duration of the warmup (<= 0 to disabled)|
|**S_MapWin**|2|How many maps a clan has to win to win the match|
|**S_TurnGap**|2|Points lead necessary to win a map|
|**S_TurnLimit**|15|Maximum number of points before next map|
|**S_DeciderTurnLimit**|20|Points limit on decider map|
|**S_QuickMode**|False|Mutliplier for the sleep times between rounds|
|**S_Matchmaking**|False|Use Elite with matchmaking|
|**S_MatchmakingSleep**|0|Matchmaking match end duration (<= 0 infinite)|
|**S_UseLegacyCallback**|True|Send the old JSON callbacks|
|**S_UsePlayerClublinks**|False|Use the players clublinks, or otherwise use the default teams|
|**S_DisplaySponsors**|True|Display the sponsors of the attacker when spectating him|
|**S_RestartMatchOnTeamChange**|False|Restart the match after the warm up if the teams have changed|
|**S_Practice**|False|Play in practice mode|
|**S_PracticeRoundLimit**|3|Number of attack turns by player in practice mode|

## Melee

|Setting|Default value|Description|
|---|---|---|
|**S_TimeLimit**|6001|Time limit on a map. Setting a negative value disable the limit|
|**S_PointLimit**|25|Points limit on a map. Setting a negative value disable the limit|

## Realm

|Setting|Default value|Description|
|---|---|---|
|**S_PoleCaptureDuration**|15|Duration of the pole capture|
|**S_PoleUncaptureSpeed**|3.|Speed multiplier for the uncapture|
|**S_UsePoleRegeneration**|False|Use pole regeneration|
|**S_SpawnTimeBase**|10|Time before respawn|
|**S_SpawnTimeIncrease**|5|Respawn time increment per minute|
|**S_SpawnTimeMax**|60|Maximum time before respawn|
|**S_MapPointsLimit**|2|Number of rounds to win a map|
|**S_MapPointsGap**|2|Minimum round gap between the two teams to win|
|**S_MapRoundsLimit**|3|Maximum number of rounds on a map|
|**S_UsePlayerClublinks**|False|Use the players clublinks, or otherwise use the default teams|

## Royal

|Setting|Default value|Description|
|---|---|---|
|**S_MapPointsLimit**|200|Points to win a map|
|**S_OffZoneActivationTime**|4|Tornado activation duration|
|**S_OffZoneAutoStartTime**|90|Time before auto activation of the tornado|
|**S_OffZoneTimeLimit**|50|Tornado shrink duration|
|**S_OffZoneMaxSpeed**|1.25|Maximum speed multiplier for the tornado|
|**S_EndRoundTimeLimit**|60|Time limit after the tornado is completly shrunk|
|**S_SpawnInterval**|5|Time between each wave of spawns|
|**S_UseEarlyRespawn**|True|Allow early respawn|
|**S_EndMapChatTime**|20|End map chat time|
|**S_MultiClans**|True|Allow multi clans mode|
|**S_MinPlayersNbPerClan**|3|Minimum number of players per clan|
|**S_AllowBeginners**|False|Is a Beginners Welcome server|
|**S_AutoManageAFK**|True|Switch inactive players to spectators|

## Royal Exp (+Royal)

|Setting|Default value|Description|
|---|---|---|
|**S_AllowDoubleCapture**|True|Allow a second pole capture after the first activation|
|**S_OffZoneMaxSpeedTime**|8|Duration of capture to reach maximum speed|

## Siege

|Setting|Default value|Description|
|---|---|---|
|**S_TimeBetweenCapture**|45|Minimum time between two captures (0 = unlimited)|
|**S_CaptureTimeLimit**|15|Time limit to capture one goal (0 = unlimited)|
|**S_GoalCaptureTime**|5.|Time to capture a goal in seconds|
|**S_NbRoundMax**|5|Set a winner after xx rounds (0 = unlimited)|
|**S_MapsToWin**|1|Number of maps to win the match (0 = don't do match)|
|**S_WarmUpDuration**|0|Duration of the warm up round (0 = no warmup)|
|**S_ClanNbMinPlayers**|1|Wait until this minimum is reach before starting the map|
|**S_ClanNbMaxPlayers**|0|Do not spawn players beyond this limit, 0=no limit|
|**S_UseSuddenDeathMode**|True|Do not allow a team to win on first turn|
|**S_AutoBalance**|True|Use auto balance at the start of the map|
|**S_AutoManageAFK**|True|Switch inactive players to spectators|
|**S_DisplayRulesReminder**|True|Display a window with the rules when the match begins|
|**S_Matchmaking**|False|Use Elite with matchmaking|
|**S_MatchmakingSleep**|0|Matchmaking match end duration (-1: infinite)|
|**S_UsePlayerClublinks**|False|Use the players clublinks, or otherwise use the default teams|

## SiegeV1

|Setting|Default value|Description|
|---|---|---|
|**S_TimeBetweenCapture**|45|Minimum time between two captures (0 = unlimited)|
|**S_CaptureTimeLimit**|15|Time limit to capture one goal (0 = unlimited)|
|**S_GoalCaptureTime**|5.|Time to capture a goal in seconds|
|**S_NbRoundMax**|5|Set a winner after xx rounds (0 = unlimited)|
|**S_MapsToWin**|0|Number of maps to win the match (0 = don't do match)|
|**S_WarmUpDuration**|0|Duration of the warm up round (0 = no warmup)|
|**S_ClanNbMinPlayers**|1|Wait until this minimum is reach before starting the map|
|**S_ClanNbMaxPlayers**|0|Do not spawn players beyond this limit, 0=no limit|
|**S_AutoBalance**|True|Use auto balance at the start of the map|
|**S_AutoManageAFK**|True|Switch inactive players to spectators|
|**S_DisplayRulesReminder**|True|Display a window with the rules when the match begins|
|**S_Matchmaking**|False|Use Elite with matchmaking|
|**S_MatchmakingSleep**|0|Matchmaking match end duration (-1: infinite)|
|**S_UsePlayerClublinks**|False|Use the players clublinks, or otherwise use the default teams|

## TimeAttack

|Setting|Default value|Description|
|---|---|---|
|**S_TimeLimit**|360|Time limit (in seconds)|