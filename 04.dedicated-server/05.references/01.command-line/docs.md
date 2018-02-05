---
title: 'Command line'
taxonomy:
    category:
        - docs
---

| Option Name         | Role                                                                                                                                                                                                                            |
|:-------------------:|:-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------:|
| `/dedicated_cfg=xxx`  | Specify a configuration file "dedicated_cfg.txt" to use. (xxx = filename relative to UserData/Config/)                                                                                                                           |
| `/game_settings=xxx`  | Specify a match settings file to use. (xxx = absolute file name or relative to UserData/Maps/)                                                                                                                     |
| `/servername=xxx`     | Override the server name                                                                                                                                                                                                        |
| `/title=`             | Override which titlepack to load. Normally it takes this from the dedicated_cfg file. |
| `/login=xxx`          | Dedicated login (required for internet server). Create one on your PlayerPage                                                                                                                                                   |
| `/password=xxx`       | Dedicated password (required for internet server)                                                                                                                                                                               |
| `/lan`                | Must be specified to join or create a LAN game (that is, not an internet server)                                                                                                                                                |
| `/forceip=xxx(:xx)`   | Forces the public ip address to this value. optionally with a port as well                                                                                                                                                      |
| `/bindip=xxx(:xx)`    | Chooses the ip to bind to, and sets the public ip to this value. (you still can use /forceip to chose a different public ip). This is used when the machine has several network interfaces.                                     |
| `/nodaemon`           | (linux) Doesn't automatically detach the process                                                                                                                                                                                |
| `/loadcache`          | Loads the "checksum.txt" instead of recomputing it, to speed up first launch time if P2P is enabled. *DO NOT USE* if you run several servers in the same directory!                                                             |
| `/nologs`             | Disables the creation of "GameLog.txt" and "ConsoleLog.txt" in Logs/ directory.                                                                                                                                                 |
| `/noautoquit`         | Keeps the server running "waiting for rpc commands", even if it is not live (with a map loaded and ready to receive players). The default behaviour is to quit, because this situation is mostly caused by configuration errors |
| `/verbose_rpc_full`   | (Debug option) Display the whole contents of the xml-rpc requests the dedicated server receives                                                                                                                                 |
| `/verbose_rpc`        | (Debug option) Displays the xml-rpc requests the dedicated server receives, but only the name of the XmlRpc? command and some parameters                                                                                        |
| `/spectate=xxx`       | Joins a server as spectator. (xxx = the server ip adress with optional port, or the server login.) (this is used to start a relay server)                                                                                       |
| `/serverpassword=xxx` | Password to use to join the server if the server is private                                                                                                                                                                     |
| `/serverplugin=xxx`   | Specify a Maniascript file to load in the `CServerPlugin` context, relative to the `UserData/Scripts/` folder. |
| `/parsegbx=xxx`       | Dumps minor JSON output information for a Gbx file relative to the current directory. |
