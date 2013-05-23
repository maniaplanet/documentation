Basic server information
========================

Quick start
-----------

You can download latest ManiaPlanet via this permalink : http://files.maniaplanet.com/ManiaPlanet2Beta/ManiaPlanetBetaServer_latest.zip

You will need a **dedicated login** (which is different from your ManiaPlanet login) to start an Internet server. You can create one on your [PlayerPage](https://player.maniaplanet.com/advanced/dedicated-servers). 

The minimal command line is `ManiaPlanetServer /Title=TitleId /dedicated_cfg=DedicatedCfgFile /game_settings=MatchSettingsFile`.

*[Complete list of ManiaPlanetServer arguments](command-line.md)*

* *TitleId*: the identifier of the title you want to start. Check the table below to get the correct value.
* *DedicatedCfgFile*: the server configuration file. It is a text (XML) file located in your `ManiaPlanetServer/UserData/Config` folder. You should configure at least the **server name** (tag ` <name>`), and your **dedicated login** (tag `<login>`) and **dedicated password** (tag `<password>`).
* *MatchSettingsFile*: it is the game mode configuration. There are *MatchSettings* file bundled in each title, use the table below to get the default one. 

This table summerize the information you need:

<table>
  <tr>
    <th>Title name</th><th>Title Id</th><th>MatchSettings file(s)</th>
  </tr>
  <tr>
    <td>Stadium</td><td>TMStadium</td><td><em>Check the ManiaPlanetServer/UserData/Maps/MatchSettings/ folder</em></td>
  </tr>
  <tr>
    <td>Canyon</td><td>TMCanyon</td><td><em>Check the ManiaPlanetServer/UserData/Maps/MatchSettings/ folder</em></td>
  </tr>
  <tr>
    <td>Storm</td><td>SMStorm</td><td><em>Check the ManiaPlanetServer/UserData/Maps/MatchSettings/ folder</em></td>
  </tr>
  <tr>
    <td>Royal</td><td>SMStormRoyal@nadeolabs</td><td>MatchSettings/Royal.Script.txt</td>
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

Example: `ManiaPlanetServer /Title=SMStormElite@nadeolabs /dedicated_cfg=dedicated_cfg.txt /game_settings=MatchSettings/SMStormElite1.txt`.


Network configuration
---------------------

ManiaPlanet server uses the default following ports :

<table>
  <tr>
    <th>Port #</th><th>Protocol</th><th>Usage</th>
  </tr>
  <tr>
    <td>2350</td><td>TCP & UDP</td><td>General</td>
  </tr>
  <tr>
    <td>3450</td><td>TCP & UDP</td><td>P2P</td>
  </tr>
  <tr>
    <td>5000</td><td>TCP</td><td>XML-RPC</td>
  </tr>
</table>

The **XML-RPC port (5000) SHOULD NOT BE OPEN** unless you change the `<authorization_levels>` logins and passwords in the dedicated configuration.

If you run multiple servers on the same host, ports numbers are automatically increased by one for each instance: second server will have 2351 for general usage, 3451 for P2P et 5001 for xml-rpc.

*You can test if your network configuration is correct using: http://www.yougetsignal.com/tools/open-ports/*


Advanced
--------

### Server administration

There is no console (like *rcon* in *Source* games) bundled in the ManiaPlanetServer. Instead a powerful XML-RPC interface is provided by the server. In order to use it, you will need a **Server Controller**.

Nadeo is developing and supporting *ManiaLive*, but other are available:

* ManiaLive: [Website](https://code.google.com/p/manialive/) | [QuickStart](manialive.md)



