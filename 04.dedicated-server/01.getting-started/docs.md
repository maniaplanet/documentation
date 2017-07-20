---
title: 'Getting started'
taxonomy:
    category:
        - docs
---

Using Debian/Ubuntu? You can use our [APT repository](../references/apt-repository).

##  Quick start

1. Download and extract the latest dedicated server at http://files.v04.maniaplanet.com/server/ManiaplanetServer_Latest.zip
2. Create a dedicated server login on your [PlayerPage](https://v4.live.maniaplanet.com/account/dedicated-servers)
3. Create a Dedicated Config File named `dedicated_cfg.txt` in the folder `UserData\Config` by using the file `UserData\Config\dedicated_cfg.default.txt` as a template.
4. Create a new MatchSettings (also called GameSettings) file called `matchsettings.txt` in the folder `UserData\Maps\MatchSettings`. You should use a template corresponding to your title in this folder.
5. Start your server with the mininal options: `ManiaPlanetServer /nodaemon /dedicated_cfg=dedicated_cfg.txt /game_settings=MatchSettings/matchsettings.txt`

>>>>> Always use the `/nodaemon` option to be able to see the potential errors.

## Less quick start

### Download

The archive containing both Linux and Windows server is located at http://files.v04.maniaplanet.com/server/ManiaplanetServer_Latest.zip

### Dedicated Server Login
A dedicated server login is required for internet servers. You can start LAN servers without login.

The **dedicated login** can be created at your [PlayerPage](https://v4.live.maniaplanet.com/account/dedicated-servers) and you can have multiple dedicated server logins. Just fill in the desired login-name and choose password and server location where you want it to bind. 

### DedicatedConfig file

The Dedicated config (also called _DedicatedCfg_) file is an XML-file. It is located at `UserData\Config`.

#### "authorization_levels" section

Authorization levels section is used for authenticating the dedicated server controllers.
You usually do not have to change it.

#### "masterserver_account" section
This is where you fill in your dedicated server login and password. 

>>>>> If you want to enable Planets transactions for your server fill in the `<validation_key>`, use your own ManiaPlanet account validation key here. 

#### "server_options" section

Be sure to at least set your server `name`, and set the desired number of `max_players`.

#### "system_config" section

Be sure to at least configure the `title` to the TitleID of the game you want to start a server for. You can find some in the [Title IDs list](../reference/title-ids).

Most other settings should work out of the box.

Please note down the `server_port` that you may have to open in your router/firewall (default is 2350).  

## MatchSettings File

The MatchSettings define the rules and maps used by your server. You can get the default files from the [Config helper](https://www.maniaplanet.com/account/dedicated-servers/helper): select a title and you will get the MatchSettings for all modes.

Save the file in the Folder `UserData/Maps/MatchSettings`, for example as `UserData/Maps/MatchSettings/BestLolMaps.txt

>>>>> From Maniaplanet 4.0, the title packs of the environment must finish with *@nadeo*. Example: `ManiaPlanetServer /Title=TMStadium@nadeo /dedicated_cfg=dedicated_cfg.txt /game_settings=MatchSettings/BestLolMaps.txt`

## Network configuration

ManiaPlanet server uses the default following ports by default:

|  Port #  |  Protocol  |  Usage  |
|  :-----          |  :-----          |  :-----          |
|  2350 |  TCP & UDP |  General |
|  3450 |  TCP & UDP |  P2P |
|  5000 |  TCP |  XML-RPC |


>>>> The **XML-RPC port (5000) SHOULD NOT BE OPENED TO PUBLIC** unless you change the `<authorization_levels>` logins and passwords in the dedicated configuration.

Note: If you run multiple servers on the same host, port numbers are automatically increased by one for each instance: second server will have 2351 for general usage, 3451 for P2P, 5001 for xml-rpc.

>>>>> You can test if your network configuration is correct using: <http://www.yougetsignal.com/tools/open-ports/>


## Starting the server

The minimal command line to start the server is `ManiaPlanetServer /nodaemon /Title=TitleId@CreatorLogin /dedicated_cfg=DedicatedCfgFile /game_settings=MatchSettingsFile`.

>>>>> Always use the `/nodaemon` option to be able to see the potential errors.

*[Complete list of ManiaPlanetServer arguments](../references/command-line)*

Please note that without options, the server will be executed in the background which make it difficult to see errors, add the `/nodaemon` option to make it execute in the foreground.

## Advanced 
### Server administration

There is no console (like *rcon* in *Source* games) bundled in the ManiaPlanetServer. Instead a powerful XML-RPC interface is provided by the server.

In order to use it, you will need a [Server Controller](tools/index.html#server-controllers).

## Help

You can get help on the [dedicated server forum](http://forum.maniaplanet.com/viewforum.php?f=261).
