---
title: 'Using bots in Shootmania'
taxonomy:
    category:
        - docs
---

Spawning a bot is almost the same as spawning a player. The difference is that you also use a BotPath on the map where the bot can be spawned.
You can differentiate bot from another by modifying their `kind` in the map editor (with a value between 0 and 10). In the script, you'll find them like this:

    foreach (Spawn in MapLandmarks_BotPath) {
        if (Spawn.BotPath.Clan == _BotClass) VSpawnBot(Spawn);
    }

`_BotClass` is the `kind` of the bot (so the one you search, you can put directly an integer if there is one class of bots or if you specifically search one class only).

To change the behaviour of a bot, you have to use the attributes and functions existing in the `CSmPlayerDriver` class (check the references).

>>>>> A bot use the same parameters as human players (check the previous page). Nevertheless, several parameters can be used only by the bots.