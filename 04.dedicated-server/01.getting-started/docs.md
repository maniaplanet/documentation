---
title: 'Getting started'
taxonomy:
    category:
        - docs
---

Using Debian/Ubuntu? You can use our [APT repository](../references/apt-repository).

## Quick start

1. Download and extract the latest dedicated server at [http://files.v04.maniaplanet.com/server/ManiaplanetServer_Latest.zip](http://files.v04.maniaplanet.com/server/ManiaplanetServer_Latest.zip)
2. Download the titlepacks you want to host your server for, and put them in the `Packs` folder. See below for links.
3. Create a dedicated server login on your [Player page](https://maniaplanet.com/account/dedicated-servers)
4. Create a Dedicated Config File named `dedicated_cfg.txt` in the folder `UserData\Config` by using the file `UserData\Config\dedicated_cfg.default.txt` as a template. For more info, see below.
5. Create a new MatchSettings (also called GameSettings) file called `matchsettings.txt` in the folder `UserData\Maps\MatchSettings`. You should use [a template](https://www.maniaplanet.com/account/dedicated-servers/helper) corresponding to your title in this folder. For more info, as well as how to add maps to this file, see below.
6. Start your server with the mininal options: `ManiaPlanetServer /nodaemon /dedicated_cfg=dedicated_cfg.txt /game_settings=MatchSettings/matchsettings.txt`

>>>>> Always use the `/nodaemon` option to be able to see any potential errors.

## Less quick start

### Download

The archive containing both Linux and Windows server is located at [http://files.v04.maniaplanet.com/server/ManiaplanetServer_Latest.zip](http://files.v04.maniaplanet.com/server/ManiaplanetServer_Latest.zip)

### Title packs

Download the titlepack file you want to host a server for, and put it in the `Packs` folder:

* [TMStadium@nadeo](https://maniaplanet.com/ingame/public/titles/download/TMStadium@nadeo.Title.Pack.gbx)
* [TMCanyon@nadeo](https://maniaplanet.com/ingame/public/titles/download/TMCanyon@nadeo.Title.Pack.gbx)
* [TMValley@nadeo](https://maniaplanet.com/ingame/public/titles/download/TMValley@nadeo.Title.Pack.gbx)
* [TMLagoon@nadeo](https://maniaplanet.com/ingame/public/titles/download/TMLagoon@nadeo.Title.Pack.gbx)
* [SMStorm@nadeo](https://maniaplanet.com/ingame/public/titles/download/SMStorm@nadeo.Title.Pack.gbx)
* [SMStormSiege@nadeolabs](https://maniaplanet.com/ingame/public/titles/download/SMStormSiege@nadeolabs.Title.Pack.gbx)
* [SMStormElite@nadeolabs](https://maniaplanet.com/ingame/public/titles/download/SMStormElite@nadeolabs.Title.Pack.gbx)
* [SMStormRoyal@nadeolabs](https://maniaplanet.com/ingame/public/titles/download/SMStormRoyal@nadeolabs.Title.Pack.gbx)
* [SMStormBattle@nadeolabs](https://maniaplanet.com/ingame/public/titles/download/SMStormBattle@nadeolabs.Title.Pack.gbx)
* [SMStormWarlords@nadeolabs](https://maniaplanet.com/ingame/public/titles/download/SMStormWarlords@nadeolabs.Title.Pack.gbx)
* [SMStormCombo@nadeolabs](https://maniaplanet.com/ingame/public/titles/download/SMStormCombo@nadeolabs.Title.Pack.gbx)
* [SMStormJoust@nadeolabs](https://maniaplanet.com/ingame/public/titles/download/SMStormJoust@nadeolabs.Title.Pack.gbx)

### Dedicated Server Login
A dedicated server login is required for internet servers. You can start LAN servers without login.

The **dedicated login** can be created on your [Player page](https://maniaplanet.com/account/dedicated-servers) and you can have multiple dedicated server logins. Just fill in the desired login-name, password, and server location which you want it to bind to.

### DedicatedConfig file

The Dedicated config (also called _DedicatedCfg_) file is an XML-file. It is located at `UserData\Config`.

#### "authorization_levels" section

Authorization levels section is used for authenticating the dedicated server controllers.
It's good practice to change the passwords for SuperAdmin and Admin here.

#### "masterserver_account" section
This is where you fill in your dedicated server login and password.

>>>>> If you want to enable Planets transactions for your server fill in the `<validation_key>`. You use your own ManiaPlanet account validation key here.

#### "server_options" section

Be sure to at least set your server `name`, and set the desired number of `max_players`.

#### "system_config" section

Be sure to at least configure the `title` to the TitleID of the game you want to start a server for. Here's a quick list:

* SMStorm
* TMCanyon
* TMStadium
* TMValley
* TMLagoon

Most other settings should work out of the box.

Please note down the `server_port` that you may have to open in your router/firewall (default is 2350, see below for more info).

## MatchSettings File

The MatchSettings define the rules and maps used by your server. You can get the default files from the [Config helper](https://www.maniaplanet.com/account/dedicated-servers/helper): select a title and you will get the MatchSettings for all modes.

Save the file in the Folder `UserData/Maps/MatchSettings`, for example as `UserData/Maps/MatchSettings/BestLolMaps.txt`

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

## Adding maps

To add maps to your server, first put the `Map.Gbx` files somewhere in the `UserData/Maps/` folder. Then, for each map you want to add to the playlist, add the following line to your match settings file:

```
<map><file>Downloaded\FilenameGoesHere.Map.Gbx</file></map>
```

These should be added just before the `</playlist>` ending tag. It might look something like this:

```
<?xml version="1.0" encoding="UTF-8"?>
<playlist>
  <gameinfos>
    <!-- ... -->
  </gameinfos>

  <filter>
    <!-- ... -->
  </filter>

  <script_settings>
    <!-- ... -->
  </script_settings>

  <startindex>0</startindex>
  <map><file>Downloaded\My cool track.Map.Gbx</file></map>
  <map><file>Downloaded\My other cool track.Map.Gbx</file></map>
  <map><file>My Maps\Going_in_circles.Map.Gbx</file></map>
</playlist>
```

If you choose to install a server controller, it is most likely capable of automatically adding maps to your matchsettings file. You do however need an initial matchsettings file, so it's good to know how to do it manually.

## Starting the server

The minimal command line to start the server is `ManiaPlanetServer /nodaemon /dedicated_cfg=DedicatedCfgFile /game_settings=MatchSettingsFile`.

>>>>> Always use the `/nodaemon` option to be able to see any potential errors.

You can find a complete list of command line arguments [here](../references/command-line).

Note that without any additional options on Linux, the server will be executed in the background which makes it difficult to see errors. Add the `/nodaemon` option to make it execute in the foreground.

## Advanced
### Server administration

There is no console (like *rcon* in *Source* games) bundled in the ManiaPlanetServer. Instead a powerful XML-RPC interface is provided by the server.

In order to use it, you will need a [Server Controller](tools/index.html#server-controllers).

### Server without dedicated config

It is possible to host a server without a dedicated config by providing the necessary settings on the command line. However, since not every setting has a command line setting, the possibilities are a little bit limited. Here's an example:

```
ManiaPlanetServer /nodaemon /login=myusername /password=mypassword /title=TMStadium /servername=Hello /game_settings=MatchSettings/maplist.txt
```

## Help

You can get help on the [dedicated server forum](http://forum.maniaplanet.com/viewforum.php?f=261).
