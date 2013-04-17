How to start a lobby ?
======================

A lobby is composed of multiple ManiaPlanet servers connected via (multiple instances of) the server controller ManiaLive.
Players can enjoy the game while waiting for a match to start. When a match is ready, they are sent to the match server. As soon as the match is finished, they are sent back to the lobby to play another match.

Requirements
------------

* Windows or Linux dedicated server (with SSH access).
* MySQL server.

Initial set up
--------------

* Download and extract (or use the APT repository) latest ManiaPlanet dedicated (using [this permalink](http://files.maniaplanet.com/ManiaPlanet2Beta/ManiaPlanetBetaServer_latest.zip)).
* Download latest ManiaLive + matchmaking plugin: https://code.google.com/p/manialive/downloads/list?q=label:matchmaking
* Get at least two dedicated logins on the PlayerPage: https://player.maniaplanet.com/advanced/dedicated-servers

Instructions 
------------

#### 1 - Starting servers

You should have a dedicated login and password (different from your ManiaPlanet password), and a folder with the dedicated server (called `DedicatedServerDir` in this guide).
For the example, we will have **lobbyLogin** (with the password **lobbyPassword**) and **matchLogin** (with the password **matchPassword**)

##### Lobby

* Download the proposed [dedicated_cfg_combo_lobby.txt](examples/dedicated_cfg/dedicated_cfg_combo_lobby.txt) file. Search `CHANGE_ME` and replace with the correct values.
* Copy the config file to `DedicatedServerDir/UserData/Config/`.
* Start the server with the command line: 
	* Unix: 	`./ManiaPlanetServer /dedicated_cfg=dedicated_cfg_combo_lobby.txt /game_settings="MatchSettings/SMStormCombo1.txt"`
	* Windows: 	`ManiaPlanetServer.exe /dedicated_cfg=dedicated_cfg_combo_lobby.txt /game_settings="MatchSettings/SMStormCombo1.txt"`

##### Match server(s)

* Download the proposed [dedicated_cfg_combo_match.txt](examples/dedicated_cfg/dedicated_cfg_combo_match.txt) file. Search `CHANGE_ME` and replace with the correct values.
* Copy the config file to `DedicatedServerDir/UserData/Config/`.
* Start the server with the command line: 
	* Unix: 	`./ManiaPlanetServer /dedicated_cfg=dedicated_cfg_combo_match.txt /game_settings="MatchSettings/SMStormCombo1.txt"`
	* Windows: 	`ManiaPlanetServer.exe /dedicated_cfg=dedicated_cfg_combo_match.txt /game_settings="MatchSettings/SMStormCombo1.txt"`

#### 2 - Starting ManiaLive

##### Lobby

* Download latest ManiaLive + matchmaking plugin: http://code.google.com/p/manialive/downloads/list?q=label:matchmaking
* Download the proposed [manialive_combo_lobby.ini](examples/manialive/manialive_combo_lobby.ini) and copy it to the `ManiaLiveDir/Config`.
* Copy the config file to the `ManiaLiveDir/Config`.
* Start ManiaLive : `php bootstrapper.php --manialive_cfg=manialive_combo_lobby.ini`

##### Match server(s)

* Download latest ManiaLive + matchmaking plugin: http://code.google.com/p/manialive/downloads/list?q=label:matchmaking
* Download the proposed [manialive_combo_match.ini](examples/manialive/manialive_combo_match.ini) and copy it to the `ManiaLiveDir/Config/`
* Copy the config file to the `ManiaLiveDir/Config`.
* Start ManiaLive : `php bootstrapper.php --manialive_cfg=manialive_combo_match.ini`

How to change the maps used ?
-----------------------------

In order to change the map pool, you have to cutomize the MatchSettings file instead of using the embedded one. 

* The default MatchSettings is available here: [Combo](examples/MatchSettings/Combo.txt)
* Copy and paste it in the following directory: `DedicatedServerDir/UserData/Maps/MatchSettings` and add or remove the maps you want.
* Start the server with the modified command line: 
	* Unix: 	`./ManiaPlanetServer /dedicated_cfg=dedicated_cfg_combo_lobby.txt /game_settings="MatchSettings/Combo.txt"`
	* Windows: 	`ManiaPlanetServer.exe /dedicated_cfg=dedicated_cfg_combo_lobby.txt /game_settings="MatchSettings/Combo.txt"`


