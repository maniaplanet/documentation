Basic server information
========================

You can download latest ManiaPlanet via this permalink : http://files.maniaplanet.com/ManiaPlanet2Beta/ManiaPlanetBetaServer_latest.zip

You will need a **dedicated login** (which is different from your ManiaPlanet login) to start an Internet server. You can create one on your PlayerPage: https://player.maniaplanet.com/advanced/dedicated-servers

The minimal command line is `ManiaPlanetServer /Title=TitleId /dedicated_cfg=DedicatedCfgFile /game_settings=MatchSettingsFile`

* *TitleId*: the identifier of the title you want to start. Check the 
* *DedicatedCfgFile*: it is the server configuration. It is a text (XML) file located in your `ManiaPlanetServer/UserData/Config` folder. You should configure at least the **server name**, and your **dedicated login** and **dedicated password**.
* *MatchSettingsFile*: it is the game mode configuration. There are *MatchSettings* file bundled in each title, use the table below to get the default. 

This table summerize the information you want

<table>
  <tr>
    <th>Title name</th><th>Title Id</th><th>MatchSettings file(s)</th>
  </tr>
  <tr>
    <td>Storm</td><td>SMStorm</td><td>*Check the ManiaPlanetServer/UserData/Maps/MatchSettings/ folder*</td>
  </tr>
  <tr>
    <td>Combo</td><td>SMStormCombo@nadeolabs</td><td>MatchSettings/SMStormCombo1.txt</td>
  </tr>
  <tr>
    <td>Elite</td><td>SMStormElite@nadeolabs</td><td>MatchSettings/SMStormElite1.txt</td>
  </tr>
  <tr>
    <td>Joust</td><td>SMStormJoust@nadeolabs</td><td>MatchSettings/SMStormJoust1.txt</td>
  </tr>
</table>

