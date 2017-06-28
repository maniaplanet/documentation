---
title: 'Relay server'
taxonomy:
    category:
        - docs
---

Relay server can be created to allow huge numbers of players to spectate the main server without interrupting the players on the main server. You see everything on the main server but the relay server's chat is not sent towards the main server, but main server chat can be seen on relay.

To start a relay server, you have to set `<allow_spectator_relays>True</allow_spectator_relays>` in main server config file.

`ManiaPlanetServer /dedicated_cfg=RelayCfgFile /join=MainServerLogin /joinpass=SpectatorPass`

* *RelayCfgFile*: the relay configuration file
* *MainServerLogin*: the login-name of the server you want to connect
* *SpectatorPass*: if your main server has spectator password, set it here, othervice don't set this