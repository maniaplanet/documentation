---
layout: default
title: Shootmania Mappacks
description: List all the current Shootmania mappacks
tags:
- dedicated
- server
---

# Shootmania Elite
## ESL Go4

* Elite - Battlefield
* Elite - Breach
* Elite - IronFist
* Elite - Numb
* Elite - Papercut
* Elite - Rust
* Elite - Spitfire
* Elite - Valiant
* Elite - Versace

## Paragon League

* Elite - Battlefield_
* Elite - IronFist [MP3]
* Elite - Old Sun - Kommu
* Elite - Paladin 2k13 by Kryw
* Elite - Reign [FPS]
* Elite - Rust [MP3]
* Elite - Spitfire (by Tatar)
* Elite - Valley of the Damned - Kommu
* Elite - Versace ESWC

## CPlay

* Elite - GreenValley 2k15
* Elite - Interupt'o
* Elite - IronFirst [MP3]
* Elite - Malevolence 2k15
* Elite - Old sun 2k15
* Elite - Rust [MP3]
* Elite - Spitfire (by Tatar)
* Elite - Valley of the Damned - Kommu
* Elite - Versace 2k15

## Current Ubisoft Elite Gold Lobby matchsettings

{% highlight xml %}
<?xml version="1.0" encoding="utf-8"?>
<playlist>
  <gameinfos>
    <game_mode>0</game_mode>
    <chat_time>10000</chat_time>
    <finishtimeout>1</finishtimeout>
    <allwarmupduration>0</allwarmupduration>
    <disablerespawn>0</disablerespawn>
    <forceshowallopponents>0</forceshowallopponents>
    <script_name>ShootMania\Elite.Script.txt</script_name>
    <rounds_pointslimit>50</rounds_pointslimit>
    <rounds_usenewrules>0</rounds_usenewrules>
    <rounds_forcedlaps>0</rounds_forcedlaps>
    <rounds_pointslimitnewrules>5</rounds_pointslimitnewrules>
    <team_pointslimit>5</team_pointslimit>
    <team_maxpoints>6</team_maxpoints>
    <team_usenewrules>0</team_usenewrules>
    <team_pointslimitnewrules>5</team_pointslimitnewrules>
    <timeattack_limit>300000</timeattack_limit>
    <timeattack_synchstartperiod>0</timeattack_synchstartperiod>
    <laps_nblaps>5</laps_nblaps>
    <laps_timelimit>0</laps_timelimit>
    <cup_pointslimit>100</cup_pointslimit>
    <cup_roundsperchallenge>5</cup_roundsperchallenge>
    <cup_nbwinners>3</cup_nbwinners>
    <cup_warmupduration>2</cup_warmupduration>
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
    <random_map_order>1</random_map_order>
  </filter>
  <mode_script_settings>
    <!-- Default : <setting name="S_AutoManageAFK" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_AFKIdleTimeLimit" type="integer" value="90000"/> -->
    <!-- Default : <setting name="S_UseScriptCallbacks" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_NeutralEmblemUrl" type="text" value=""/> -->
    <!-- Default : <setting name="S_ScoresTableStylePath" type="text" value=""/> -->
    <!-- Default : <setting name="S_MatchmakingAPIUrl" type="text" value="https://matchmaking.maniaplanet.com/v5"/> -->
    <setting name="S_MatchmakingMode" type="integer" value="2" />
    <!-- Default : 0 -->
    <setting name="S_MatchmakingRematchRatio" type="real" value="1.0" />
    <!-- Default : -1 -->
    <!-- Default : <setting name="S_MatchmakingRematchNbMax" type="integer" value="2"/> -->
    <setting name="S_MatchmakingVoteForMap" type="boolean" value="1" />
    <!-- Default : 0 -->
    <setting name="S_MatchmakingProgressive" type="boolean" value="0" />
    <!-- Default : 0 -->
    <!-- Default : <setting name="S_LobbyRoundPerMap" type="integer" value="60"/> -->
    <!-- Default : <setting name="S_LobbyMatchmakerPerRound" type="integer" value="6"/> -->
    <!-- Default : <setting name="S_LobbyMatchmakerWait" type="integer" value="2"/> -->
    <!-- Default : <setting name="S_LobbyMatchmakerTime" type="integer" value="8"/> -->
    <!-- Default : <setting name="S_LobbyInstagib" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_LobbyDisplayMasters" type="boolean" value="1"/> -->
    <!-- Default : <setting name="S_LobbyAllowMatchCancel" type="boolean" value="1"/> -->
    <!-- Default : <setting name="S_LobbyLimitMatchCancel" type="integer" value="0"/> -->
    <!-- Default : <setting name="S_LobbyBasePenalty" type="integer" value="120"/> -->
    <!-- Default : <setting name="S_MatchmakingErrorMessage" type="text" value="An error occured in the matchmaking API. If the problem persist please try to contact this server administrator."/> -->
    <setting name="S_MatchmakingLogAPIError" type="boolean" value="1" />
    <!-- Default : 0 -->
    <setting name="S_MatchmakingLogAPIDebug" type="boolean" value="1" />
    <!-- Default : 0 -->
    <setting name="S_MatchmakingLogMiscDebug" type="boolean" value="1" />
    <!-- Default : 0 -->
    <setting name="S_Mode" type="integer" value="1" />
    <!-- Default : 0 -->
    <!-- Default : <setting name="S_TimeLimit" type="integer" value="60"/> -->
    <!-- Default : <setting name="S_TimePole" type="integer" value="15"/> -->
    <!-- Default : <setting name="S_TimeCapture" type="real" value="1.5"/> -->
    <setting name="S_WarmUpDuration" type="integer" value="0" />
    <!-- Default : 90 -->
    <setting name="S_MapWin" type="integer" value="1" />
    <!-- Default : 2 -->
    <!-- Default : <setting name="S_TurnGap" type="integer" value="2"/> -->
    <!-- Default : <setting name="S_TurnLimit" type="integer" value="15"/> -->
    <!-- Default : <setting name="S_DeciderTurnLimit" type="integer" value="20"/> -->
    <!-- Default : <setting name="S_QuickMode" type="boolean" value="0"/> -->
    <!-- Default : <setting name="S_UseLegacyCallback" type="boolean" value="1"/> -->
    <setting name="S_UsePlayerClublinks" type="boolean" value="1" />
    <!-- Default : 0 -->
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
    <!-- Default : <setting name="S_MinimumPlayersNb" type="integer" value="2"/> -->
    <!-- Default : <setting name="S_DisplayRulesReminder" type="boolean" value="1"/> -->
    <!-- Default : <setting name="S_GameplayVersion" type="integer" value="0"/> -->
  </mode_script_settings>
  <startindex>0</startindex>
  <map>
    <file>Go4/Elite - Breach.Map.Gbx</file>
  </map>
  <map>
    <file>CPlay/Elite - GreenValley 2k15.Map.Gbx</file>
  </map>
  <map>
    <file>Go4/Elite - Numb.Map.Gbx</file>
  </map>
  <map>
    <file>Go4/Elite - Papercut.Map.Gbx</file>
  </map>
  <map>
    <file>Go4/Elite - Battlefield.Map.Gbx</file>
  </map>
  <map>
    <file>Go4/Elite - IronFist.Map.Gbx</file>
  </map>
  <map>
    <file>CPlay/Elite - Old sun 2k15.Map.Gbx</file>
  </map>
  <map>
    <file>Elite_Paragon_November_2014/Elite - Paladin 2k13 by Kryw.Map.Gbx</file>
  </map>
  <map>
    <file>Go4/Elite - Rust.Map.Gbx</file>
  </map>
  <map>
    <file>Go4/Elite - Spitfire.Map.Gbx</file>
  </map>
  <map>
    <file>Elite_Paragon_November_2014/Elite - Valley of the Damned - Kommu.Map.Gbx</file>
  </map>
  <map>
    <file>Go4/Elite - Versace.Map.Gbx</file>
  </map>
  <map>
    <file>Go4/Elite - Valiant.Map.Gbx</file>
  </map>
  <map>
    <file>CPlay/Elite - Malevolence 2k15.Map.Gbx</file>
  </map>
  <map>
    <file>CPlay/Elite - Interupt'o.Map.Gbx</file>
  </map>
</playlist>
{% endhighlight %}
