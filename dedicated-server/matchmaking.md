---
layout: static
title: Matchmaking
description: How to make a lobby or a match server in ManiaPlanet matchmaking
---

## Introduction

Since the release of the ManiaPlanet 3.0 update the previous matchmaking based on the ManiaLive server controller has been replaced by a centralized system hosted by Nadeo. 

The new matchmaking system is easy to use, demands only a small amount of configuration and doesn't require any external dependency. Everything is integrated within ManiaPlanet and can be used by anybody ranging from a single player to a servers hosting company. With this guide you will have a matchmaking architecture ready in a few minutes.

## For server hoster

### Installation

First you need to download the latest dedicated server for your system and set it up. You can take a look in the [quick start guide](http://maniaplanet.github.io/documentation/dedicated-server/basic.html) to learn how to do it. Once your server is ready you have to select a game mode that supports the matchmaking system. Currently there are Elite and Siege but more game modes will be added with time.

### Matchsettings

Now you can edit the relevant settings in the matchsettings file to enable the matchmaking.

{% highlight xml %}
<?xml version="1.0" encoding="utf-8" ?>
<playlist>
  [...]
  <mode_script_settings>
    <setting name="S_MatchmakingAPIUrl" type="text" value="matchmaking.maniaplanet.com/v3"/>
    <setting name="S_MatchmakingAPIProtocol" type="text" value="https"/>
    <setting name="S_MatchmakingMode" type="integer" value="0"/>
    <setting name="S_LobbyTimePerRound" type="integer" value="60"/>
    <setting name="S_LobbyRoundPerMap" type="integer" value="30"/>
    <setting name="S_LobbyMatchmakerTime" type="integer" value="10"/>
    <setting name="S_LobbyInstagib" type="boolean" value="0"/>
    <setting name="S_LobbyDisplayMasters" type="boolean" value="1"/>
    <setting name="S_LogAPIError" type="boolean" value="0"/>
    <setting name="S_LogAPIDebug" type="boolean" value="0"/>
  </mode_script_settings>
  [...]
</playlist>
{% endhighlight %}

|Setting|Default value|Description|
|---|---|---|
|**S_MatchmakingAPIUrl**|matchmaking.maniaplanet.com/v3|URL of the matchmaking API. If you don't plan to use a custom matchmaking function leave this setting at its default value.|
|**S_MatchmakingAPIProtocol**|https|The protocol used to communicate with the API. You shouldn't have to change it if you use the default matchmaking API.|
|**S_MatchmakingMode**|0|This is the most important setting. It can take one of these three values : 0 -> matchmaking turned off; 1 -> matchmaking turned on, use this server as a lobby server; 3 -> matchmaking turned on, use this server as a match server.|
|**S_LobbyTimePerRound**|60|Duration (in seconds) of a round between the activations of the matchmaking function.|
|**S_LobbyRoundPerMap**|30|Number of rounds played before going to the next map.|
|**S_LobbyMatchmakerTime**|10|Duration (in seconds) of the matchmaking function. It allows the players to see with who they will play their match or cancel it if necessary.|
|**S_LobbyInstagib**|0|Use the Laser instead of the Rocket in the lobby.|
|**S_LobbyDisplayMasters**|1|Display a list of Masters players in the lobby.|
|**S_LogAPIError**|0|Log the API errors. You can activate it if something doesn't work and you have to investigate. Otherwise it's better to let it turned off because this can quickly write huge log files.|
|**S_LogAPIDebug**|0|Same as above, turn it on only if necessary.|


The others game modes specific settings can be configured as you wish. A match can be played in BO1, BO3, ... with any number of players, etc. Just be sure that the number of players required by the match server matches the number of players sent from the lobby. 
Now that your matchsettings file is ready you can associate your lobby and match servers on your player page.

### Adding a match server to your lobby

To associate a server as match server of your lobby you have to go on your [player page](https://player.maniaplanet.com/matchmaking-servers).

- Select the dedicated server login of your lobby server. 
- On the next page click on *This is a lobby (add a match server)*. 
- In the text box enter the login of the server you want to associate.

You can add **any server you want** as match server. As soon as this one will be ready, it will be able to host a game.

### Reserving a match server for a lobby

With the new matchmaking system every server can be used as a match server by a lobby. If you want to allow only some lobbies to use your server you have to do that on your [player page](https://player.maniaplanet.com/matchmaking-servers).

- Select the dedicated server login of your match server. 
- On the next page click on *This is a match server (whitelist a lobby)*.
- In the text box enter the login of the lobby you want to allow. 

You can allow **any** login you want. If there is no lobby allowed your server can be used by all.

### Conclusion

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
    <!-- Default : <setting name="S_MatchmakingAPIUrl" type="text" value="matchmaking.maniaplanet.com/v3"/> -->
    <!-- Default : <setting name="S_MatchmakingAPIProtocol" type="text" value="https"/> -->
    <setting name="S_MatchmakingMode" type="integer" value="1"/>
    <!-- Default : <setting name="S_LobbyTimePerRound" type="integer" value="60"/> -->
    <!-- Default : <setting name="S_LobbyRoundPerMap" type="integer" value="30"/> -->
    <!-- Default : <setting name="S_LobbyMatchmakerTime" type="integer" value="10"/> -->
    <!-- Default : <setting name="S_LobbyInstagib" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_LobbyDisplayMasters" type="boolean" value="1"/> -->
    <!-- Default : <setting name="S_LogAPIError" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_LogAPIDebug" type="boolean" value="0"/> -->
    <setting name="S_Mode" type="integer" value="1"/> <!-- Default : 0 -->
    <!-- Default : <setting name="S_TimeLimit" type="integer" value="60"/> -->
    <!-- Default : <setting name="S_TimePole" type="integer" value="15"/> -->
    <!-- Default : <setting name="S_TimeCapture" type="real" value="1.5"/> -->
    <setting name="S_WarmUpDuration" type="integer" value="0"/> <!-- Default : 90 -->
    <!-- Default : <setting name="S_MapWin" type="integer" value="2"/> -->
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
    <!-- Default : <setting name="S_MatchmakingAPIUrl" type="text" value="matchmaking.maniaplanet.com/v3"/> -->
    <!-- Default : <setting name="S_MatchmakingAPIProtocol" type="text" value="https"/> -->
    <setting name="S_MatchmakingMode" type="integer" value="2"/>
    <!-- Default : <setting name="S_LobbyTimePerRound" type="integer" value="60"/> -->
    <!-- Default : <setting name="S_LobbyRoundPerMap" type="integer" value="30"/> -->
    <!-- Default : <setting name="S_LobbyMatchmakerTime" type="integer" value="10"/> -->
    <!-- Default : <setting name="S_LobbyInstagib" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_LobbyDisplayMasters" type="boolean" value="1"/> -->
    <!-- Default : <setting name="S_LogAPIError" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_LogAPIDebug" type="boolean" value="0"/> -->
    <setting name="S_Mode" type="integer" value="1"/> <!-- Default : 0 -->
    <!-- Default : <setting name="S_TimeLimit" type="integer" value="60"/> -->
    <!-- Default : <setting name="S_TimePole" type="integer" value="15"/> -->
    <!-- Default : <setting name="S_TimeCapture" type="real" value="1.5"/> -->
    <setting name="S_WarmUpDuration" type="integer" value="0"/> <!-- Default : 90 -->
    <!-- Default : <setting name="S_MapWin" type="integer" value="2"/> -->
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
    <file>ShootMania\Elite\Elite - DayDreaming.Map.Gbx</file>
    <ident>c9hygnTxx42fIArDMtUdV4vBOUl</ident>
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
</playlist>
{% endhighlight %}

## For script creators