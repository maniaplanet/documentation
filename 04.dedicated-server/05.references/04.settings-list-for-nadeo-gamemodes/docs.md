---
title: 'Settings list for Nadeo gamemodes'
taxonomy:
    category:
        - docs
---

# Common

## All

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_ChatTime**|10|Chat time at the end of a map or match|
|**S_UseClublinks**|False|Use the players clublinks, or otherwise use the default teams|
|**S_UseClublinksSponsors**|False|Display the clublinks sponsors|
|**S_NeutralEmblemUrl**|""|Url of the neutral emblem url to use by default|
|**S_ScriptEnvironment**|"production"|Environment in which the script runs, used mainly for debugging purpose|
|**S_IsChannelServer**|False|Set the server as a channel server|

## Matchmaking

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_MatchmakingAPIUrl**|"[https://...](https://v4.live.maniaplanet.com/ingame/public/matchmaking)"|URL of the matchmaking API. If you don't plan to use a custom matchmaking function leave this setting at its default value.|
|**S_MatchmakingMatchServers**|""|A comma separated list of match servers logins|
|**S_MatchmakingMode**|0|This is the most important setting. It can take one of these five values : 0 -> matchmaking turned off, standard server; 1 -> matchmaking turned on, use this server as a lobby server; 2 -> matchmaking turned on, use this server as a match server; 3 -> matchmaking turned off, use this server as a universal lobby server; 4 -> matchmaking turned off, use this server as a universal match server.|
|**S_MatchmakingRematchRatio**|-1.|Set the minimum ratio of players that have to agree to play a rematch before launching one. The value range from 0.0 to 1.0. Any negative value turns off the rematch vote.|
|**S_MatchmakingRematchNbMax**|2|Maxium number of consecutive rematch|
|**S_MatchmakingVoteForMap**|False|Allow players to vote for the next played map|
|**S_MatchmakingProgressive**|False|Can start a match with less players than the required number|
|**S_MatchmakingWaitingTime**|20|Waiting time at the beginning of the matches|
|**S_LobbyRoundPerMap**|60|Nb of rounds per map in lobby mode|
|**S_LobbyMatchmakerPerRound**|6|Set how many times the matchmaking function is called before ending the current round of King of the Lobby|
|**S_LobbyMatchmakerWait**|2|Set the waiting time before calling the matchmaking function again|
|**S_LobbyMatchmakerTime**|8|Duration of the matchmaking function. It allows the players to see who they will play their match with or cancel it if necessary.|
|**S_LobbyInstagib**|False|Use the Laser instead of the Rocket in the lobby.|
|**S_LobbyDisplayMasters**|True|Display a list of Masters players in the lobby|
|**S_LobbyDisableUI**|False|Disable lobby UI|
|**S_LobbyAggressiveTransfer**|True|Enable or disable the aggressive transfert mechanism|
|**S_KickTimedOutPlayers**|True|Kick timed out players|
|**S_MatchmakingErrorMessage**|"..."|This message is displayed in the chat to inform the players that an error occured in the matchmaking system|
|**S_MatchmakingLogAPIError**|False|Log the API errors. You can activate it if something doesn't work and you have to investigate. Otherwise it's better to leave it turned off because this can quickly write huge log files.|
|**S_MatchmakingLogAPIDebug**|False|Same as above, only turn it on if necessary|
|**S_MatchmakingLogMiscDebug**|False|Same as above, only turn it on if necessary|
|**S_ProgressiveActivation_WaitingTime**|180000|Average waiting time before progressive matchmaking activate|
|**S_ProgressiveActivation_PlayersNbRatio**|1|Multiply the required players nb by this, if there's less player in the lobby activate progressive|

# TrackMania

## All

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_AllowRespawn**|True|Allow the players to respawn or not|
|**S_RespawnBehaviour**|0|This setting control the behavior of the respawn button. It overrides the respawn behavior set by the game mode script and the S_AllowRespawn setting. It can takes one of the following values: 0 -> use the game mode value , 1 -> normal (respawn when pressing the button), 2 -> do nothing, 3 -> give up before first checkpoint, respawn after, 4 -> always give up|
|**S_UseLegacyXmlRpcCallbacks**|True|Turn on/off the legacy xmlrpc callbacks|

## RoundsBase

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_PointsLimit**|100|Points limit|
|**S_FinishTimeout**|-1|Finish timeout (-1 automatic based on author time)|
|**S_UseAlternateRules**|False|Use alternate rules|
|**S_ForceLapsNb**|-1|Force number of laps (-1 to use the map default)|
|**S_DisplayTimeDiff**|False|Display time difference at checkpoint|

## Chase (+Matchmaking)

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_TimeLimit**|900|Time limit (0 to disable, -1 automatic based on author time)|
|**S_MapPointsLimit**|3|Map points limit|
|**S_RoundPointsLimit**|-5|Round points limit (0 to disable, negative values automatic based on number of checkpoints)|
|**S_RoundPointsGap**|3|The number of round points lead a team must have to win the round|
|**S_GiveUpMax**|1|Maximum number of give up per team|
|**S_MinPlayersNb**|3|Minimum number of players in a team|
|**S_ForceLapsNb**|10|Number of Laps (-1 to use the map default, 0 to disable laps limit)|
|**S_FinishTimeout**|-1|Finish timeout (-1 automatic based on author time)|
|**S_DisplayWarning**|True|Display a big red message in the middle of the screen of the player that crosses a checkpoint when it wasn't it's turn|
|**S_CompetitiveMode**|False|Use competitive mode|
|**S_PauseBetweenRound**|20|Pause duration between rounds|
|**S_WaitingTimeMax**|600|Maximum waiting time before next map|
|**S_WaypointEventDelay**|500|Waypoint event buffer delay|
|**S_WarmUpNb**|0|Number of warm up|
|**S_WarmUpDuration**|0|Duration of one warm up|
|**S_NbPlayersPerTeamMax**|3|Maximum number of players per team in matchmaking|
|**S_NbPlayersPerTeamMin**|3|Minimum number of players per team in matchmaking|

## Cup (+RoundsBase) (+Matchmaking)

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_RoundsPerMap**|5|Rounds per map|
|**S_NbOfWinners**|3|Number of winners before ending the match|
|**S_WarmUpNb**|0|Number of warm up|
|**S_WarmUpDuration**|0|Duration of one warm up|
|**S_NbOfPlayersMax**|4|Maximum number of players in matchmaking|
|**S_NbOfPlayersMin**|4|Minimum number of players in matchmaking|

## Laps

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_TimeLimit**|0|Time limit (0 to disable, -1 automatic based on author time)|
|**S_ForceLapsNb**|5|Number of Laps (-1 to use the map default)|
|**S_FinishTimeout**|-1|Finish timeout (-1 automatic based on author time)|
|**S_WarmUpNb**|0|Number of warm up|
|**S_WarmUpDuration**|0|Duration of one warm up|

## Rounds (+RoundsBase)

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_PointsLimit**|50|Points limit (negative value to disable)|
|**S_RoundsPerMap**|-1|Number of round to play on one map before going to the next one (negative value to disable)|
|**S_MapsPerMatch**|-1|Number of maps to play before finishing the match (negative value to disable)|
|**S_UseTieBreak**|True|Continue to play the map until the tie is broken|
|**S_WarmUpNb**|0|Number of warm up|
|**S_WarmUpDuration**|0|Duration of one warm up|

## Team (+RoundsBase) (+Matchmaking)

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_PointsLimit**|5|Points limit|
|**S_MaxPointsPerRound**|6|The maximum number of points attributed to the first player to cross the finish line|
|**S_PointsGap**|1|The number of points lead a team must have to win the map|
|**S_WarmUpNb**|0|Number of warm up|
|**S_WarmUpDuration**|0|Duration of one warm up|
|**S_NbPlayersPerTeamMax**|3|Maximum number of players per team in matchmaking|
|**S_NbPlayersPerTeamMin**|3|Minimum number of players per team in matchmaking|

## TimeAttack

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_TimeLimit**|300|Time limit|
|**S_WarmUpNb**|0|Number of warm up|
|**S_WarmUpDuration**|0|Duration of one warm up|

# ShootMania

## All

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_AutoManageAFK**|False|Switch inactive players to spectator mode|

## Battle Fun & Pro (+Matchmaking)

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_TimeLimitForFirstCapture**|300|Time limit for first capture|
|**S_TimeLimitAfterFirstCapture**|600|Time limit after first capture|
|**S_WaveDuration**|15|Wave duration|
|**S_StayInAttackOnCapture**|True|Reset timer when a pole is beeing captured|
|**S_CaptureMaxValue**|30|Pole capture time (seconds)|
|**S_UseOvertime**|True|Use the overtime system|
|**S_MapsToWin**|1|Number of maps to win a match|
|**S_RoundsToWin**|2|Points to win a map|
|**S_RoundGapToWin**|1|Minimum gap between the two teams to win a map|
|**S_RoundsLimit**|3|Point limit on map|
|**S_WarmUpDuration**|0|Warm up duration (seconds)|
|**S_AllowBeginners**|False|Is a Beginners Welcome server|
|**S_NbPlayersPerTeamMax**|0|Maximum number of players per team (0: no max)|
|**S_NbPlayersPerTeamMin**|1|Minumum number of players per team|
|**S_DisplayTopsRound**|True|Display the tops at the end of the round|
|**S_DisplayTopsMap**|True|Display the tops at the end of the map|
|**S_DisplayTopsOnlyShooter**|False|Only display the shooter top|
|**S_DisplayPoleRecords**|False|Display pole running time record|
|**S_AutoBalance**|True|Use auto balance at the start of the map|
|**S_AutoBalanceRound**|True|Use auto balance at the end of the round|
|**S_AutoBalanceDelta**|2|Maximum difference of players number before autobalance|


## Combo (+Matchmaking)

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_NbPlayersPerTeamMax**|2|Number of players per team (Max. 5)|
|**S_NbPlayersPerTeamMin**|2|Minimum number of players per team in matchmaking|
|**S_PointsLimit**|3|Points limit (0: No points limit)|
|**S_RoundTimeLimit**|300|Round time limit (0: No time limit)|
|**S_WarmUpDuration**|90|Warmup duration (0: disabled)|
|**S_AllowUnbalancedTeams**|False|Allow a game to begin without the same number of players in each team|
|**S_UseArmorReduction**|False|Reduce the armor of players above two armor points|
|**S_ArmorMax**|4|Maximum number of armors a player can have|
|**S_SpawnProtectionTime**|2|Invincibility time after spawn|
|**S_RespawnAmmo**|0.5|Ratio of ammo reloaded at respawn|

## Elite (+Matchmaking)

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_Mode**|0|Mode 0: classic, 1: free|
|**S_TimeLimit**|60|Time for an attack on a map|
|**S_TimePole**|15|Time allowed to reach the pole by the end of the attack|
|**S_TimeCapture**|1.5|Time to capture a pole for the attack clan (* NbPoles)|
|**S_WarmUpDuration**|90|Duration of the warmup (-1 to disable)|
|**S_MapWin**|2|How many maps a clan has to win to win the match|
|**S_TurnWin**|9|Number of points to win a map|
|**S_TurnGap**|2|Points lead necessary to win a map|
|**S_TurnLimit**|15|Maximum number of points before next map|
|**S_DeciderTurnLimit**|20|Points limit on decider map|
|**S_QuickMode**|False|Multiplier for the sleep times between rounds|
|**S_WarnWhenSpectating**|False|Send a message in the chat when a player switch to spectator mode|
|**S_DisplaySponsors**|True|Display the sponsors of the attacker when spectating them|
|**S_RestartMatchOnTeamChange**|False|Restart the match after the warm up if the teams have changed|
|**S_UseDraft**|False|Use draft mode at match beginning|
|**S_DraftBanNb**|4|Number of map to ban during draft|
|**S_DraftPickNb**|3|Number of map to pick during draft|
|**S_NbPlayersPerTeamMax**|3|Maximum number of players per team in matchmaking|
|**S_NbPlayersPerTeamMin**|2|Minimum number of players per team in matchmaking|
|**S_DisplayRulesReminder**|True|Display a window with the rules when the match begins|

## Joust (+Matchmaking)

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_RoundPointsToWin**|7|Round points to win|
|**S_RoundPointsGap**|2|Round points gap|
|**S_RoundPointsLimit**|11|Round points limit|
|**S_RoundTimeLimit**|0|Round time limit (0 to disable)|
|**S_PoleTimeLimit**|45|Pole capture time limit|
|**S_MatchPointsToWin**|3|Match points to win|
|**S_MatchPointsGap**|0|Match points gap|
|**S_MatchPointsLimit**|3|Match points limit|
|**S_UseWarmup**|False|Start with a warmup|

## Melee

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_TimeLimit**|6001|Time limit on a map. Setting a negative value disables the limit|
|**S_PointLimit**|25|Points limit on a map. Setting a negative value disables the limit|

## Royal Fun (+Matchmaking)

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_MapPointsLimit**|200|Points to win a map|
|**S_PoleCaptureTime**|4|Pole's capture time|
|**S_OffZoneAutoStartTime**|90|Time before auto activation of the tornado|
|**S_OffZoneShrinkDuration**|45|Tornado shrink duration|
|**S_EndRoundTimeLimit**|60|Time limit after the tornado is completly shrunk|
|**S_SpawnInterval**|5|Time between each wave of spawns|
|**S_OffZoneMinRadius**|16.|Final size of the tornado|
|**S_NbPlayersMax**|24|Maximum number of players in a matchmaking match|
|**S_NbPlayersMin**|2|Minimum number of players in a matchmaking match|
|**S_MapsPerMatch**|5|Number of maps before the end of the matchmaking match|

## Royal Pro (+Matchmaking)

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_MapPointsLimit**|200|Points to win a map|
|**S_OffZoneActivationTime**|4|Tornado activation duration|
|**S_OffZoneAutoStartTime**|90|Time before auto activation of the tornado|
|**S_OffZoneTimeLimit**|50|Tornado shrink duration|
|**S_OffZoneMaxSpeed**|1.25|Maximum speed multiplier for the tornado|
|**S_OffZoneMinRadius**|16.|Final size of the tornado|
|**S_EndRoundTimeLimit**|60|Time limit after the tornado is completly shrunk|
|**S_SpawnInterval**|5|Time between each wave of spawns|
|**S_UseEarlyRespawn**|True|Allow early respawn|
|**S_EndMapChatTime**|20|End map chat time|
|**S_MultiClans**|True|Allow multi clans mode|
|**S_MinPlayersNbPerClan**|3|Minimum number of players per clan|
|**S_ReloadSpeed**|1.|Reload speed|
|**S_StartingArmor**|2|Starting armor amount|
|**S_ResetScoreLeavers**|False|Reset the score of the players that left the game|
|**S_DisableWidgets**|False|Disable the UI widgets (tops and players remaining)|
|**S_NbPlayersMax**|24|Maximum number of players in a matchmaking match|
|**S_NbPlayersMin**|2|Minimum number of players in a matchmaking match|
|**S_MapsPerMatch**|5|Number of maps before the end of the matchmaking match|

## Royal Fun (+Matchmaking)

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_MapPointsLimit**|200|Points to win a map|
|**S_PoleCaptureTime**|4|Pole's capture time|
|**S_OffZoneAutoStartTime**|90|Time before auto activation of the tornado|
|**S_OffZoneShrinkDuration**|45|Tornado shrink duration|
|**S_EndRoundTimeLimit**|60|Time limit after the tornado is completly shrunk|
|**S_SpawnInterval**|5|Time between each wave of spawns|
|**S_OffZoneMinRadius**|16.|Final size of the tornado|
|**S_ShopTime**|5|Time to shop at the beginning of the round|
|**S_NbPlayersMax**|24|Maximum number of players in a matchmaking match|
|**S_NbPlayersMin**|2|Minimum number of players in a matchmaking match|
|**S_MapsPerMatch**|5|Number of maps before the end of the matchmaking match|

## Siege (+Matchmaking)

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_TimeBetweenCapture**|0|Minimum time between two captures (0 = unlimited)|
|**S_CaptureTimeLimit**|45|Time limit to capture one goal (0 = unlimited)|
|**S_CaptureTimeBonus**|10|Bonus time for capturing|
|**S_GoalCaptureTime**|4.5|Time to capture a gate in seconds|
|**S_NbRoundMax**|5|Set a winner after xx rounds (0 = unlimited)|
|**S_MapsToWin**|1|Number of maps to win the match (0 = don't do match)|
|**S_WarmUpDuration**|0|Duration of the warm up round (0 = no warmup)|
|**S_NbPlayersPerTeamMin**|1|Wait until this minimum is reach before starting the map|
|**S_NbPlayersPerTeamMax**|0|Do not spawn players beyond this limit, 0=no limit|
|**S_UseSuddenDeathMode**|True|Do not allow a team to win on first turn|
|**S_AutoBalance**|True|Use auto balance at the start of the map|
|**S_WeaponMode**|2|0: Rocket vs Laser, 1: WeaponSelection, 2: WeaponSwitch, 3: Store|
|**S_UseOldCaptureMode**|False|Capture only one gate per checkpoint instead of all the gates|
|**S_AtkNbIncreaseCaptureSpeed**|False|More attackers on gate means faster capture|
|**S_CaptureThreshold**|300|Time (in ms) before the activation/annulation of the capture|
|**S_GatesStopDefenders**|True|Don't let defenders go through closed gates|

## Warlords (+Matchmaking)

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_WorldFile**|"..."|World file to load|
|**S_MaxYearsCount**|20|Years before sudden death|
|**S_GoldPerCastlePerYear**|100|Gold per planet per year|
|**S_TurnDuration**|50|Turn duration (in seconds)|
|**S_Battle_MaxTime**|90|Maximum time to capture a gate (in seconds)|
|**S_RandomizeStartPointsChoice**|True|Automatically attribute capitals|