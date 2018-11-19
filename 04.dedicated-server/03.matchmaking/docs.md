---
title: Matchmaking (manual)
taxonomy:
    category:
        - docs
---

[TOC]

## Introduction

ManiaPlanet 3.0 introduces a **new matchmaking technical architecture** to make things **simplier for server hosters**. Server hosting is very popular in both TrackMania and ShootMania, and our goal is for matchmaking to benefit from the hosting skill and passion of the community.

For players, the idea remains the same: **you join lobbies to play casually while waiting for your match**; when opponents are matched in the lobby, they are sent to a match server to play their game.

For server hosters, this new system is simpler than ever since **it now only requires the dedicated server** and a little configuration; no more ManiaLive or MySQL. Now, lobbies and match servers don't need to be close, or on the same server, or even owned by the same account. The game mode script as well as a **new centralized matchmaking API** hosted by Nadeo are doing all the dirty work.

- Start a lobby: a dedicated server with a litte specific configuration.
- Start (or gather) match servers: again, dedicated servers with a little specific configuration.

Moreover once you linked a match server to a lobby server, the match server will have its Echelon limits defined automatically to the lobby Echelon limits for no cost.
For example if you set up a Echelon 9 lobby, you only need to pay the limits for the lobby server, the linked match servers will automatically get the lobby limits.

The guide will cover the technical aspects. If you have any questions or feedback, feel free to [join the discussion](http://forum.maniaplanet.com/viewtopic.php?f=261&t=27702)

## Requirements

- You need to be familiar with ManiaPlanet dedicated servers ([quick start guide](../getting-started))
- Make sure the game mode supports matchmaking
- Always set the `max_players` setting of the matches servers to a **higher value** than the number of players required for the match. Example : for a 6 players match in Elite, set the players limit at 8 at least. `<max_players>8</max_players>`

## Supported game modes

- Shootmania Battle
- Shootmania Combo
- Shootmania Elite
- Shootmania Royal
- Shootmania Siege
- Shootmania Warlords
- Trackmania Chase
- Trackmania Cup
- Trackmania Team

## Add match servers to a lobby

You can add **any server you want** as match server. As soon as it's launched and well configured, your lobby will start sending matches to it.

Use the "S_MatchmakingMatchServers" setting on the lobby to list the logins of the servers used for the matches. eg: "matchserver1,matchserver2,matchserver3"

## Standard vs Universal servers

On a standard lobby, players for a match are selected by the matchmaking algorithm. You can ally yourself with your friends if you want to play with them and the system will find opponents of your level automatically. But you can't select the players you'll play against.

On an universal lobby, all the players of a match are selected by the players themselves. If a match needs 6 players to be played, you have to create a group and have 5 other players joining it. Inside the group you can select your team and once everybody is ready the lobby will find a server and send the group there.

## Lobby Maps

### Trackmania

Any map can be used in your lobby, you just need to validate it. It can be a multilaps map or a classic race map.

### Shootmania

If you want to create a map for your lobby, you need to select the "LobbyArena" map type in the map editor and validate your map with it.

## Progressive matchmaking

Progressive matchmaking eases the launch of matches on game modes that require a lot of people. If there's not enough players on the lobby, the matchmaking can start a match with less players than the maximum required. Later the lobby will send substitutes to complete the match line up.

Eg: 5vs5 Siege needs 10 players on the lobby to start a match. With progressive matchmaking turned on, the lobby can start a match with only 4 players (2vs2). Then this match will receive substitutes from the lobby until there's 10 players.

Use the "S_MatchmakingProgressive" setting to turn on/off this feature. The progressive matchmaking only works with standard servers, not universal ones. In Battle, Combo, Elite, Siege, Chase and Team you can setup the minimum number of players per team with the "S_NbPlayersPerTeamMin" setting and the maximum number of players with "S_NbPlayersPerTeamMax".

Eg: S_NbPlayersPerTeamMax = 5 and S_NbPlayersPerTeamMin = 2 means that the lobby can create 2vs2, 3vs3, 4vs4 and 5vs5 matches depending on the number of ready players in the lobby. Any match started with less than 10 players will receive substitutes when new players connect to the lobby until it reaches a 5vs5 state.

## Dedicated server configuration

Edit the relevant settings in the matchsettings file to enable the matchmaking.

```
<?xml version="1.0" encoding="utf-8" ?>
<playlist>
  [...]
  <mode_script_settings>
    [...]
    <setting name="S_MatchmakingAPIUrl" type="text" value="https://v4.live.maniaplanet.com/ingame/public/matchmaking"/>
  <setting name="S_MatchmakingMatchServers" type="text" value=""/>
    <setting name="S_MatchmakingMode" type="integer" value="0"/>
    <setting name="S_MatchmakingRematchRatio" type="real" value="-1.0"/>
    <setting name="S_MatchmakingRematchNbMax" type="integer" value="2"/>
    <setting name="S_MatchmakingVoteForMap" type="boolean" value="0"/>
    <setting name="S_MatchmakingProgressive" type="boolean" value="0"/>
  <setting name="S_MatchmakingWaitingTime" type="integer" value="20"/>
    <setting name="S_LobbyRoundPerMap" type="integer" value="60"/>
    <setting name="S_LobbyMatchmakerPerRound" type="integer" value="6"/>
    <setting name="S_LobbyMatchmakerWait" type="integer" value="2"/>
    <setting name="S_LobbyMatchmakerTime" type="integer" value="8"/>
    <setting name="S_LobbyInstagib" type="boolean" value="0"/>
    <setting name="S_LobbyDisplayMasters" type="boolean" value="1"/>
  <setting name="S_LobbyDisableUI" type="boolean" value="0"/>
  <setting name="S_LobbyAggressiveTransfer" type="boolean" value="1"/>
  <setting name="S_KickTimedOutPlayers" type="boolean" value="1"/>
    <setting name="S_MatchmakingErrorMessage" type="text" value="An error occured in the matchmaking API. If the problem persist please try to contact this server administrator."/>
    <setting name="S_MatchmakingLogAPIError" type="boolean" value="0"/>
    <setting name="S_MatchmakingLogAPIDebug" type="boolean" value="0"/>
    <setting name="S_MatchmakingLogMiscDebug" type="boolean" value="0"/>
  <setting name="S_ProgressiveActivation_WaitingTime" type="integer" value="180000"/> -->
  <setting name="S_ProgressiveActivation_PlayersNbRatio" type="integer" value="1"/>
    [...]
  </mode_script_settings>
  [...]
</playlist>
```

|Setting|Default value|Description|
|:-:|:-:|:-:|
|**S_MatchmakingAPIUrl**|"[https://...](https://prod.live.maniaplanet.com/ingame/public/matchmaking)"|URL of the matchmaking API. If you don't plan to use a custom matchmaking function leave this setting at its default value.|
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


The others game modes specific settings can be configured as you wish. A match can be played in BO1, BO3, ... with any number of players, points limit, etc. Just be sure that the number of players required by the match server matches the number of players sent from the lobby.

## Conclusion

Your servers are now ready. You just have to launch and join them to see the new matchmaking system in action.

### Matchsettings Elite examples

For a lobby server :
```
<?xml version="1.0" encoding="utf-8" ?>
<playlist>
  <gameinfos>
    <game_mode>0</game_mode>
    <script_name>ShootMania\Elite\ElitePro.Script.txt</script_name>
    <title>SMStormElite@nadeolabs</title>
    <chat_time>10000</chat_time>
    <finishtimeout>1</finishtimeout>
    <allwarmupduration>0</allwarmupduration>
    <disablerespawn>0</disablerespawn>
    <forceshowallopponents>0</forceshowallopponents>
  </gameinfos>

  <hotseat>
    <game_mode>0</game_mode>
    <time_limit>300000</time_limit>
    <rounds_count>5</rounds_count>
  </hotseat>

  <filter>
    <is_lan>1</is_lan>
    <is_internet>1</is_internet>
    <is_solo>0</is_solo>
    <is_hotseat>0</is_hotseat>
    <sort_index>1000</sort_index>
    <random_map_order>0</random_map_order>
  </filter>

  <mode_script_settings>
    <setting name="S_MatchmakingMatchServers" type="text" value="matchserver1,matchserver2,matchserver3"/>
    <setting name="S_MatchmakingMode" type="integer" value="1"/>
    <setting name="S_MatchmakingProgressive" type="boolean" value="1"/>
    <setting name="S_NbPlayersPerTeamMax" type="integer" value="3"/>
    <setting name="S_NbPlayersPerTeamMin" type="integer" value="2"/>
  </mode_script_settings>

  <startindex>0</startindex>
  <map>
    <file>ShootMania\Lobby\Lobby - Heracles.Map.Gbx</file>
  </map>
  <map>
    <file>ShootMania\Lobby\Lobby - InMyBunk.Map.Gbx</file>
  </map>
  <map>
    <file>ShootMania\Lobby\Lobby - ThePit.Map.Gbx</file>
  </map>
</playlist>
```

For a match server :
```
<?xml version="1.0" encoding="utf-8" ?>
<playlist>
  <gameinfos>
    <game_mode>0</game_mode>
    <script_name>ShootMania\Elite.Script.txt</script_name>
    <title>SMStormElite@nadeolabs</title>
    <chat_time>10000</chat_time>
    <finishtimeout>1</finishtimeout>
    <allwarmupduration>0</allwarmupduration>
    <disablerespawn>0</disablerespawn>
    <forceshowallopponents>0</forceshowallopponents>
  </gameinfos>

  <hotseat>
    <game_mode>0</game_mode>
    <time_limit>300000</time_limit>
    <rounds_count>5</rounds_count>
  </hotseat>

  <filter>
    <is_lan>1</is_lan>
    <is_internet>1</is_internet>
    <is_solo>0</is_solo>
    <is_hotseat>0</is_hotseat>
    <sort_index>1000</sort_index>
    <random_map_order>0</random_map_order>
  </filter>

  <mode_script_settings>
    <setting name="S_MatchmakingMode" type="integer" value="2"/>
    <setting name="S_MatchmakingRematchRatio" type="real" value="1.0"/>
    <setting name="S_MatchmakingVoteForMap" type="boolean" value="1"/>
    <setting name="S_MatchmakingProgressive" type="boolean" value="1"/>
    <setting name="S_Mode" type="integer" value="1"/>
    <setting name="S_WarmUpDuration" type="integer" value="0"/>
    <setting name="S_MapWin" type="integer" value="1"/>
    <setting name="S_QuickMode" type="boolean" value="1"/>
    <setting name="S_NbPlayersPerTeamMax" type="integer" value="3"/>
    <setting name="S_NbPlayersPerTeamMin" type="integer" value="2"/>
  </mode_script_settings>

  <startindex>0</startindex>
  <map>
    <file>ShootMania\Elite\Elite - CastleCrasher.Map.Gbx</file>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - Collided.Map.Gbx</file>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - CrossRoads.Map.Gbx</file>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - Excursion.Map.Gbx</file>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - EyeOfTheStorm.Map.Gbx</file>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - FaceToFace.Map.Gbx</file>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - Fortress.Map.Gbx</file>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - SeaOfDreams.Map.Gbx</file>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - TheCastle.Map.Gbx</file>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - WatchYourBack.Map.Gbx</file>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - WindOfChange.Map.Gbx</file>
  </map>
  <map>
    <file>ShootMania\Elite\Lobby - InMyBunk.Map.Gbx</file>
  </map>
</playlist>
```
