---
layout: default
title: ManiaPlanet dedicated server command line
description: FAQ
tags:
- dedicated
- server
---

# ManiaPlanetServer.exe command line

| Option Name         | Role                                                                                                                                                                                                                            |
|:-------------------:|:-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------:|
| /dedicated_cfg=xxx  | Specify a configuration file "dedicated_cfg.txt" to use. (xxx = name of the file in UserData/config/)                                                                                                                           |
| /game_settings=xxx  | Specify a match settings file to use. (xxx = absolute file name or relative to UserData/Maps/MatchSettings)                                                                                                                     |
| /servername=xxx     | Override the server name                                                                                                                                                                                                        |
| /login=xxx          | Dedicated login (required for internet server). Create one on your PlayerPage                                                                                                                                                   |
| /password=xxx       | Dedicated password (required for internet server)                                                                                                                                                                               |
| /lan                | Must be specified to join or create a LAN game (that is, not an internet server)                                                                                                                                                |
| /forceip=xxx(:xx)   | Forces the public ip address to this value. optionally with a port as well                                                                                                                                                      |
| /bindip=xxx(:xx)    | Chooses the ip to bind to, and sets the public ip to this value. (you still can use /forceip to chose a different public ip). This is used when the machine has several network interfaces.                                     |
| /nodaemon           | (linux) Doesn't automatically detach the process                                                                                                                                                                                |
| /loadcache          | Loads the "checksum.txt" instead of recomputing it, to speed up first launch time if P2P is enabled. *DO NOT USE* if you run several servers in the same directory!                                                             |
| /nologs             | Disables the creation of "GameLog.txt" and "ConsoleLog.txt" in Logs/ directory.                                                                                                                                                 |
| /noautoquit         | Keeps the server running "waiting for rpc commands", even if it is not live (with a map loaded and ready to receive players). The default behaviour is to quit, because this situation is mostly caused by configuration errors |
| /verbose_rpc_full   | (Debug option) Display the whole contents of the xml-rpc requests the dedicated server receives                                                                                                                                 |
| /verbose_rpc        | (Debug option) Displays the xml-rpc requests the dedicated server receives, but only the name of the XmlRpc? command and some parameters                                                                                        |
| /join=xxx       | Makes the server a [relay server][1] of xxx. (xxx = the server login, or the server ip adress with optional port.)                                                                                       |
| /joinpass=xxx | Spectator password on the server of which we are a relay of (if it is private)                                                                                                                                                                     |

[1]: http://doc.maniaplanet.com/dedicated-server/basic.html#Relay-Servers
