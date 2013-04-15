How to start a lobby ?
======================


Requirements
------------

* The title installed on your computer. You can get titles from NADEO on the manialink `store`.
* Windows or Linux dedicated server.
* MySQL server.

Initial set up
--------------

* Download and extract (or use the APT repository) latest ManiaPlanet dedicated (using [this permalink](http://files.maniaplanet.com/ManiaPlanet2Beta/ManiaPlanetBetaServer_latest.zip)).
* Download latest ManiaLive
* Get at least two dedicated logins on the PlayerPage: https://player.maniaplanet.com/advanced/dedicated-servers

Instructions 
------------

#### 1 - Starting servers

You should have a dedicated login and password (different from your ManiaPlanet password), a folder with the dedicated server.
For the example, we will have **lobbyLogin** (with the password **lobbyPassword**) and **matchLogin** (with the password **matchPassword**)

##### Lobby

* Download the proposed [dedicated_cfg_combo_lobby.txt](examples/dedicated_cfg/dedicated_cfg_combo_lobby.txt) file. Search `CHANGE_ME` and replace with the correct values.
* Start the server with the command line : 
	* Unix: 	`./ManiaPlanetServer /dedicated_cfg=dedicated_cfg_combo_lobby.txt /game_settings="MatchSettings/SMStormCombo1.txt"
	* Windoww: 	`ManiaPlanetServer.exe /dedicated_cfg=dedicated_cfg_combo_lobby.txt /game_settings="MatchSettings/SMStormCombo1.txt"

##### Match server

* Download the proposed [dedicated_cfg_combo_match.txt](examples/dedicated_cfg/dedicated_cfg_combo_match.txt) file. Search `CHANGE_ME` and replace with the correct values.
* Start the server with the command line : 
	* Unix: 	`./ManiaPlanetServer /dedicated_cfg=dedicated_cfg_combo_match.txt /game_settings="MatchSettings/SMStormCombo1.txt"
	* Windoww: 	`ManiaPlanetServer.exe /dedicated_cfg=dedicated_cfg_combo_match.txt /game_settings="MatchSettings/SMStormCombo1.txt"

#### 2 - Starting ManiaLive

* Download latest ManiaLive + matchmaking plugin : http://code.google.com/p/manialive/downloads/list?q=label:matchmaking
* Download the proposed [manialive_combo_lobby.ini](examples/manialive/manialive_combo_lobby.ini) 