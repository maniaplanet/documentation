---
title: 'Frequent errors'
taxonomy:
    category:
        - docs
---

## At server startup

### ERROR: The playlist file does not exist.

The matchsettings (also called gamesettings or playlist file) file you specified in the command line is wrong.

If you save your game settings in `UserData/Maps/MatchSettings/royal.txt`, your command line should contain `/game_settings=MatchSettings\royal.txt`.

You can also check for the file permission if you are using Linux.

### ERROR: New mode unknown.

Your MatchSettings file is specifying an unknown mode, change it to the value `0`:

```
<playlist>
<gameinfos>
<game_mode>0</game_mode>
...
```

## When players join your server

### ERROR: Corrupted Login.

Happens on servers which are online for more then 30 days.
Restart your server to remove this message for players.