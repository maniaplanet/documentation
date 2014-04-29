---
layout: static
title: Basic dedicated guide
description: Quick start to make a dedicated server on ManiaPlanet
---

[Dedicated server package contains both the Linux and the Windows versions of the dedicated server][class:note].

Using Debian/Ubuntu? You can use our [APT repository](../tools/apt.html).

1. Download the latest dedicated server at http://files.maniaplanet.com/ManiaPlanet2Beta/ManiaPlanetBetaServer_latest.zip 
2. Create a server account at [PlayerPage](https://player.maniaplanet.com/advanced/dedicated-servers)
3. Change the server settings *DedicatedCfgFile* to match your server account, this file needs to be located at `UserData\Config`
4. Create a new (or use predefined) *MatchSettingsFile* this file needs to be located in `UserData\Maps\MatchSettings` 
5. Create a new launcher to launch the server with commandline options: `ManiaPlanetServer /Title=TitleId /dedicated_cfg=DedicatedCfgFile /game_settings=MatchSettingsFile`
6. (optional) Start a dedicated server controller


####Dedicated Server Login

To start an Internet server, you will need a **dedicated login** (which is different from your ManiaPlanet login). Dedicated server can be run in Lan-mode without a dedicated login defined. The **dedicated login** can be created at your [PlayerPage](https://player.maniaplanet.com/advanced/dedicated-servers) and you can have multiple dedicated server accounts for each ManiaPlanet title. Just fill in the desired login-name and choose password and server location where you want it to bind. After you create the server, it binds to your maniaplanet account and you can edit the details and reset the password if needed.

The newly created dedicated servers will be at the lowest ladder rank which is 0-50k, this means the players visiting your server will gain ladder point as long as they have no more than 50 000 ladder points. To raise the ladder rank of your server, visit the [advanced ladder server page](https://player.maniaplanet.com/advanced/ladder-servers) section in your ManiaPlanet player page.

####DedicatedConfig file

*DedicatedCfgFile* is located at `UserData\Config`.
To run multiple servers, just use the same server with different commandline arguments to start the servers.

Dedicated config file a XML-file, where the config variables goes between tags, which are:

* starting tag: `<tag>`
* ending tag: `</tag>`

Make sure that the tags are in place, if there is error with xml filesyntax, the dedicated just won't start without any error messages. You can copy paste the content in an [xml validator](http://www.validome.org/xml/) to verify it.

**Sections on Config-file:**

	<authorization_levels>
		<level>
			<name>SuperAdmin</name>
			<password>SuperAdmin</password>
		</level>
		<level>
			<name>Admin</name>
			<password>Admin</password>
		</level>
		<level>
			<name>User</name>
			<password>User</password>
		</level>
	</authorization_levels>

	
Authorization levels section is used for authenticating the dedicated server controllers. 
Change this only if you open the xml-rpc port later to public.


	<masterserver_account>
		<login>   </login>
		<password>   </password>
		<validation_key>   </validation_key>
	</masterserver_account>

	
Masterserver_account section: this is where you fill in your dedicated server login and password that you created earlier. 
If you want to enable Planets transactions for your server fill in the `<validation_key>`, use your own ManiaPlanet account validation key here. The validation key has been sent in email message when you created your ManiaPlanet account. If you have forgotten your validation key you can get a new one [on the player page](https://player.maniaplanet.com/account/validation-code). You also need to send in-game mail with initial 100 Planets to the server login. After this the donate plugins works and server planets transactions are enabled. 

####Network configuration

ManiaPlanet server uses the default following ports by default:

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

Note: If you run the game and the dedicated server on same host the launch order of the game and server will affect the default ports, this may lead to problems when you use dedicated server controller. In this case, increase all of the dedicated server ports by one.

The **XML-RPC port (5000) SHOULD NOT BE OPENED TO PUBLIC** unless you change the `<authorization_levels>` logins and passwords in the dedicated configuration.

If you run multiple servers on the same host, ports numbers are automatically increased by one for each instance: second server will have 2351 for general usage, 3451 for P2P et 5001 for xml-rpc.

Note: if you run same dedicated server instance on the same host: the dedicated servers ports must start from 5000 and every new dedicated server port has to be increased by 1, and there can not be any gaps between the ports. Othervice you can't connect to any server...

*You can test if your network configuration is correct using: <http://www.yougetsignal.com/tools/open-ports/>*


####MatchSettings File

There are *MatchSettings* file bundled in each title, use the table below to get the default one. 

[This table summerize the information you need](titleids.html).

Examples to start the server with Shootmania:Storm Elite: `ManiaPlanetServer /Title=SMStormElite@nadeolabs /dedicated_cfg=dedicated_cfg.txt /game_settings=MatchSettings/SMStormElite1.txt`.

Starting the server
-------------------

The minimal command line to start the server is `ManiaPlanetServer /Title=TitleId /dedicated_cfg=DedicatedCfgFile /game_settings=MatchSettingsFile`.

*[Complete list of ManiaPlanetServer arguments](command-line.html)*

* *TitleId*: the identifier of the title you want to start. Check [this table](titleids.html) to get the correct value.
* *DedicatedCfgFile*: the server configuration file. It is a text (XML) file located in your `ManiaPlanetServer/UserData/Config` folder. You should configure at least the **server name** (tag ` <name>`), and your **dedicated login** (tag `<login>`) and **dedicated password** (tag `<password>`).
* *MatchSettingsFile*: it is the game mode configuration. It is a text (XML) file located in your `ManiaPlanetServer/UserData/Maps/MatchSettings` folder.

####Relay Servers


Relay server can be created to allow huge numbers of players spectate the main server without interrupting the players on the main server. You see everything on the main server but relay server chat is not sent toward the main server, but main server chat can be seen on relay.

To start the relay server, you have to set `<allow_spectator_relays>True</allow_spectator_relays>` in main server config file. 

`ManiaPlanetServer /dedicated_cfg=RelayCfgFile /join=MainServerLogin /joinpass=SpectatorPass`

* *RelayCfgFile*: the relay configuration file
* *MainServerLogin*: the login-name of the server you want to connect
* *SpectatorPass*: if your main server has spectator password, set it here, othervice don't set this


Advanced
--------

### Server administration

There is no console (like *rcon* in *Source* games) bundled in the ManiaPlanetServer. Instead a powerful XML-RPC interface is provided by the server.

In order to use it, you will need a [Server Controller](tools.html#server-controllers).

## Help

You can get help on the [dedicated server forum](http://forum.maniaplanet.com/viewforum.php?f=261).


