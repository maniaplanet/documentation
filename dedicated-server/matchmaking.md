---
layout: static
title: Matchmaking
description: How to make a lobby or a match server in ManiaPlanet matchmaking
---

## Introduction

ManiaPlanet 3.0 introduces a **new matchmaking technical architecture** to make things **simplier for server hosters**. Server hosting is very popular in both TrackMania and ShootMania, and our goal is for matchmaking to benefits from the hosting skill and passion of the community.

For players, the idea remains the same: **you join lobbies to play casually while waiting for your match**; when opponents are matched in the lobby, they are sent to a match server to play their game.

For server hosters, new system is simplier than ever since **it now only requires the dedicated server** and a little configuration; no more ManiaLive or MySQL. Now, lobbies and match servers don't need to be close, or on the same server, or even owned by the same account. The game mode script as well as a **new centralized matchmaking API** hosted by Nadeo are doing all the dirty work.

- Link lobby and match server logins on the PlayerPage.
- Start a lobby: a dedicated server with a litte specific configuration.
- Start (or gather) match servers: again, dedicated servers with a little specific configuration.

The guide will cover the technical aspects. If you have any questions or feedback, feel free to join the discussion: http://forum.maniaplanet.com/viewtopic.php?f=261&t=27702

## Requirements

- You need to be familiar with ManiaPlanet dedicated servers ([quick start guide](basic.html))
- Make sure your title supports matchmaking (eg. Elite, Siege or Combo)

## Add match servers to a lobby

You can add **any server you want** as match server. As soon as it's launched and well configured, your lobby will start sending matches on it.

Easy, follow the instructions: https://player.maniaplanet.com/matchmaking-servers

## Whitelist lobbies for your match server

With the new matchmaking system every server can be used as a match server by a lobby - as long as the match server is configured as such. You can whitelist only some lobbies to use your match server.

Easy, follow the instructions: https://player.maniaplanet.com/matchmaking-servers

## Standard vs Universal servers

On a standard lobby, players for a match are selected by the matchmaking algorithm. You can ally yourself with your friends if you want to play with them and the system will find opponents of your level automatically. But you can't select the players you'll play against.
On an universal lobby, all the players of a match are selected by the players themselves. If a match needs 6 players to be played, you have to create a group and have 5 other players joining it. Inside the group you can select your team and once everybody is ready the lobby will find a server and send the group there.

## Dedicated server configuration

Edit the relevant settings in the matchsettings file to enable the matchmaking.

{% highlight xml %}
<?xml version="1.0" encoding="utf-8" ?>
<playlist>
  [...]
  <mode_script_settings>
    [...]
    <setting name="S_MatchmakingAPIUrl" type="text" value="https://matchmaking.maniaplanet.com/v5"/>
    <setting name="S_MatchmakingMode" type="integer" value="0"/>
    <setting name="S_LobbyTimePerRound" type="integer" value="30"/>
    <setting name="S_LobbyRoundPerMap" type="integer" value="60"/>
    <setting name="S_LobbyMatchmakerTime" type="integer" value="10"/>
    <setting name="S_LobbyInstagib" type="boolean" value="0"/>
    <setting name="S_LobbyDisplayMasters" type="boolean" value="1"/>
    <setting name="S_LobbyAllowMatchCancel" type="boolean" value="1"/>
    <setting name="S_LobbyLimitMatchCancel" type="integer" value="0"/>
    <setting name="S_MatchmakingErrorMessage" type="text" value="An error occured in the matchmaking API. If the problem persist please try to contact this server administrator."/>
    <setting name="S_MatchmakingLogAPIError" type="boolean" value="0"/>
    <setting name="S_MatchmakingLogAPIDebug" type="boolean" value="0"/>
    <setting name="S_MatchmakingLogMiscDebug" type="boolean" value="0"/>
    [...]
  </mode_script_settings>
  [...]
</playlist>
{% endhighlight %}

|Setting|Default value|Description|
|---|---|---|
|**S_MatchmakingAPIUrl**|https://matchmaking.maniaplanet.com/v5|URL of the matchmaking API. If you don't plan to use a custom matchmaking function leave this setting at its default value.|
|**S_MatchmakingMode**|0|This is the most important setting. It can take one of these five values : 0 -> matchmaking turned off, standard server; 1 -> matchmaking turned on, use this server as a lobby server; 2 -> matchmaking turned on, use this server as a match server; 3 -> matchmaking turned off, use this server as a universal lobby server; 4 -> matchmaking turned off, use this server as a universal match server.|
|**S_LobbyTimePerRound**|30|Duration (in seconds) of a round between the activations of the matchmaking function. It can't be smaller than 15 seconds.|
|**S_LobbyRoundPerMap**|60|Number of rounds played before going to the next map.|
|**S_LobbyMatchmakerTime**|10|Duration (in seconds) of the matchmaking function. It allows the players to see with who they will play their match or cancel it if necessary.|
|**S_LobbyInstagib**|0|Use the Laser instead of the Rocket in the lobby.|
|**S_LobbyDisplayMasters**|1|Display a list of Masters players in the lobby.|
|**S_LobbyAllowMatchCancel**|1|Allows or not the players in the lobby to cancel a match.|
|**S_LobbyLimitMatchCancel**|0|If the players are allowed to cancel, how many matches can they cancel before being penalized.|
|**S_MatchmakingErrorMessage**|An error occured in the matchmaking API. If the problem persist please try to contact this server administrator.|This message is displayed in the chat to inform the players that an error occured in the matchmaking system.|
|**S_MatchmakingLogAPIError**|0|Log the API errors. You can activate it if something doesn't work and you have to investigate. Otherwise it's better to let it turned off because this can quickly write huge log files.|
|**S_MatchmakingLogAPIDebug**|0|Same as above, turn it on only if necessary.|
|**S_MatchmakingLogMiscDebug**|0|Same as above, turn it on only if necessary.|


The others game modes specific settings can be configured as you wish. A match can be played in BO1, BO3, ... with any number of players, points limit, etc. Just be sure that the number of players required by the match server matches the number of players sent from the lobby. 
Now that your matchsettings file is ready you can associate your lobby and match servers on your player page.

## Conclusion

Your servers are now ready. You just have to launch and join them to see the new matchmaking system in action.

### Matchsettings Elite examples

For a lobby server :
{% highlight xml %}
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
    <!-- Default : <setting name="S_AutoManageAFK" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_AFKIdleTimeLimit" type="integer" value="90000"/> -->
    <!-- Default : <setting name="S_UseScriptCallbacks" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_NeutralEmblemUrl" type="text" value=""/> -->
    <!-- Default : <setting name="S_ScoresTableStylePath" type="text" value=""/> -->
    <!-- Default : <setting name="S_MatchmakingAPIUrl" type="text" value="https://matchmaking.maniaplanet.com/v5"/> -->
    <setting name="S_MatchmakingMode" type="integer" value="1"/> <!-- Default : 0 -->
    <!-- Default : <setting name="S_LobbyTimePerRound" type="integer" value="30"/> -->
    <!-- Default : <setting name="S_LobbyRoundPerMap" type="integer" value="60"/> -->
    <!-- Default : <setting name="S_LobbyMatchmakerTime" type="integer" value="10"/> -->
    <!-- Default : <setting name="S_LobbyInstagib" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_LobbyDisplayMasters" type="boolean" value="1"/> -->
    <!-- Default : <setting name="S_LobbyAllowMatchCancel" type="boolean" value="1"/> -->
    <!-- Default : <setting name="S_LobbyLimitMatchCancel" type="integer" value="0"/> -->
    <!-- Default : <setting name="S_MatchmakingErrorMessage" type="text" value="An error occured in the matchmaking API. If the problem persist please try to contact this server administrator."/> -->
    <!-- Default : <setting name="S_MatchmakingLogAPIError" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_MatchmakingLogAPIDebug" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_MatchmakingLogMiscDebug" type="boolean" value="0"/> -->
    <setting name="S_Mode" type="integer" value="1"/> <!-- Default : 0 -->
    <!-- Default : <setting name="S_TimeLimit" type="integer" value="60"/> -->
    <!-- Default : <setting name="S_TimePole" type="integer" value="15"/> -->
    <!-- Default : <setting name="S_TimeCapture" type="real" value="1.5"/> -->
    <setting name="S_WarmUpDuration" type="integer" value="0"/> <!-- Default : 90 -->
    <setting name="S_MapWin" type="integer" value="1"/> <!-- Default : 2 -->
    <!-- Default : <setting name="S_TurnGap" type="integer" value="2"/> -->
    <!-- Default : <setting name="S_TurnLimit" type="integer" value="15"/> -->
    <!-- Default : <setting name="S_DeciderTurnLimit" type="integer" value="20"/> -->
    <!-- Default : <setting name="S_QuickMode" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_UseLegacyCallback" type="boolean" value="1"/> -->
    <setting name="S_UsePlayerClublinks" type="boolean" value="1"/> <!-- Default : 0 -->
    <!-- Default : <setting name="S_ForceClublinkTeam1" type="text" value=""/> -->
    <!-- Default : <setting name="S_ForceClublinkTeam2" type="text" value=""/> -->
    <!-- Default : <setting name="S_DisplaySponsors" type="boolean" value="1"/> -->
    <!-- Default : <setting name="S_RestartMatchOnTeamChange" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_Practice" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_PracticeRoundLimit" type="integer" value="3"/> -->
    <!-- Default : <setting name="S_TurnWin" type="integer" value="9"/> -->
    <!-- Default : <setting name="S_UseDraft" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_DraftBanNb" type="integer" value="4"/> -->
    <!-- Default : <setting name="S_DraftPickNb" type="integer" value="3"/> -->
    <!-- Default : <setting name="S_RequiredPlayersNb" type="integer" value="3"/> -->
    <!-- Default : <setting name="S_DisplayRulesReminder" type="boolean" value="1"/> -->
  </mode_script_settings>

  <startindex>0</startindex>
  <map>
    <file>ShootMania\Lobby\Lobby - Heracles.Map.Gbx</file>
    <ident>NdA_yJkkC6zQayBWpIAdhZDzMg0</ident>
  </map>
  <map>
    <file>ShootMania\Lobby\Lobby - InMyBunk.Map.Gbx</file>
    <ident>wG6dXKa2QKFzpnJiyCPxB3w1Gvb</ident>
  </map>
  <map>
    <file>ShootMania\Lobby\Lobby - ThePit.Map.Gbx</file>
    <ident>9YEx6CLzZ9z82nmutdLOlSk4XE0</ident>
  </map>
</playlist>
{% endhighlight %}

For a match server :
{% highlight xml %}
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
    <!-- Default : <setting name="S_AutoManageAFK" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_AFKIdleTimeLimit" type="integer" value="90000"/> -->
    <!-- Default : <setting name="S_UseScriptCallbacks" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_NeutralEmblemUrl" type="text" value=""/> -->
    <!-- Default : <setting name="S_ScoresTableStylePath" type="text" value=""/> -->
    <!-- Default : <setting name="S_MatchmakingAPIUrl" type="text" value="https://matchmaking.maniaplanet.com/v5"/> -->
    <setting name="S_MatchmakingMode" type="integer" value="2"/> <!-- Default : 0 -->
    <!-- Default : <setting name="S_LobbyTimePerRound" type="integer" value="30"/> -->
    <!-- Default : <setting name="S_LobbyRoundPerMap" type="integer" value="60"/> -->
    <!-- Default : <setting name="S_LobbyMatchmakerTime" type="integer" value="10"/> -->
    <!-- Default : <setting name="S_LobbyInstagib" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_LobbyDisplayMasters" type="boolean" value="1"/> -->
    <!-- Default : <setting name="S_LobbyAllowMatchCancel" type="boolean" value="1"/> -->
    <!-- Default : <setting name="S_LobbyLimitMatchCancel" type="integer" value="0"/> -->
    <!-- Default : <setting name="S_MatchmakingErrorMessage" type="text" value="An error occured in the matchmaking API. If the problem persist please try to contact this server administrator."/> -->
    <!-- Default : <setting name="S_MatchmakingLogAPIError" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_MatchmakingLogAPIDebug" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_MatchmakingLogMiscDebug" type="boolean" value="0"/> -->
    <setting name="S_Mode" type="integer" value="1"/> <!-- Default : 0 -->
    <!-- Default : <setting name="S_TimeLimit" type="integer" value="60"/> -->
    <!-- Default : <setting name="S_TimePole" type="integer" value="15"/> -->
    <!-- Default : <setting name="S_TimeCapture" type="real" value="1.5"/> -->
    <setting name="S_WarmUpDuration" type="integer" value="0"/> <!-- Default : 90 -->
    <setting name="S_MapWin" type="integer" value="1"/> <!-- Default : 2 -->
    <!-- Default : <setting name="S_TurnGap" type="integer" value="2"/> -->
    <!-- Default : <setting name="S_TurnLimit" type="integer" value="15"/> -->
    <!-- Default : <setting name="S_DeciderTurnLimit" type="integer" value="20"/> -->
    <!-- Default : <setting name="S_QuickMode" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_UseLegacyCallback" type="boolean" value="1"/> -->
    <setting name="S_UsePlayerClublinks" type="boolean" value="1"/> <!-- Default : 0 -->
    <!-- Default : <setting name="S_ForceClublinkTeam1" type="text" value=""/> -->
    <!-- Default : <setting name="S_ForceClublinkTeam2" type="text" value=""/> -->
    <!-- Default : <setting name="S_DisplaySponsors" type="boolean" value="1"/> -->
    <!-- Default : <setting name="S_RestartMatchOnTeamChange" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_Practice" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_PracticeRoundLimit" type="integer" value="3"/> -->
    <!-- Default : <setting name="S_TurnWin" type="integer" value="9"/> -->
    <!-- Default : <setting name="S_UseDraft" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_DraftBanNb" type="integer" value="4"/> -->
    <!-- Default : <setting name="S_DraftPickNb" type="integer" value="3"/> -->
    <!-- Default : <setting name="S_RequiredPlayersNb" type="integer" value="3"/> -->
    <!-- Default : <setting name="S_DisplayRulesReminder" type="boolean" value="1"/> -->
  </mode_script_settings>

  <startindex>0</startindex>
  <map>
    <file>ShootMania\Elite\Elite - CastleCrasher.Map.Gbx</file>
    <ident>i2top8b_q6kHUHtLafyGc9jRLO4</ident>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - Collided.Map.Gbx</file>
    <ident>bIOWRz5WA5ZfAountYwweP2ZUac</ident>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - CrossRoads.Map.Gbx</file>
    <ident>6RwQcqP6h6Uo0XTQ8Xqv_EDkOxd</ident>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - Excursion.Map.Gbx</file>
    <ident>5fKJ9CRkCtzCn44_CBuHDrMon63</ident>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - EyeOfTheStorm.Map.Gbx</file>
    <ident>MUet8FtGteQ_aQyGEOeLj6MKQS7</ident>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - FaceToFace.Map.Gbx</file>
    <ident>p9g3nMNQMn_sOwIliTKgPgFGtg7</ident>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - Fortress.Map.Gbx</file>
    <ident>m8RgFwpekXe9bkV08I_9fJnuOL</ident>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - SeaOfDreams.Map.Gbx</file>
    <ident>GzUm_cavauvxBUEDnHAhPewMnP7</ident>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - TheCastle.Map.Gbx</file>
    <ident>Uj29Va8U1MzgJUTFaVx7UpUwcv0</ident>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - WatchYourBack.Map.Gbx</file>
    <ident>hQR7msvc44TtT4FA0Go5s3l3kdf</ident>
  </map>
  <map>
    <file>ShootMania\Elite\Elite - WindOfChange.Map.Gbx</file>
    <ident>s3bVSikgs9J5qtqespGYJ1FDDyf</ident>
  </map>
  <map>
    <file>ShootMania\Elite\Lobby - InMyBunk.Map.Gbx</file>
    <ident>F4SF2gjW8xtH0rwIF7bzxeiVhLe</ident>
  </map>
</playlist>
{% endhighlight %}
