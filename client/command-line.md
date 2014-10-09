---
layout: default
title: Command Line
description: Maniaplanet.exe client command line
tags: client
---

# ManiaPlanet.exe command line options

| Option Name              | Role                                                                                                                                                                          |
|:------------------------:|:-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------:|
| /login=xxx               | Account login to be used to play online.                                                                                                                                      |
| /password=xxx            | Account password                                                                                                                                                              |
| /profile=xxx             | Forces using a specific profile on disk. (to avoid the profile choice dialog)                                                                                                 |
| /validation=xxx          | Specifies the account validation key (the last three chracters of the player key) to be able to perform copper transactions.                                                  |
| /join=xxx                | Joins a server. (xxx = the server ip adress with optional port, or the server login.)                                                                                         |
| /spectate=xxx            | Same as /join, but join as spectator.                                                                                                                                         |
| /joinasreferee=xxx       | Same as /join, but join as referee.                                                                                                                                           |
| /serverpassword=xxx      | Password to use to join the server if the server is private.                                                                                                                  |
| /silent                  | Skips news, etc... to allow joining a server without any user interaction.                                                                                                    |
| /file=xxx                | Opens a Replay.Gbx or a Challenge.Gbx file. (xxx = full path to the file.)                                                                                                    |
| /url=xxx                 | Opens a maniaplanet:// url with the game.                                                                                                                                     |
| /shootvideo=xxx          | Shoots a replay to a video file. (xxx = replay file. aboslute file name or relative to Tracks/Replays/).                                                                      |
| /validatepath=xxx        | Mass validates all the replays in a directory (xxx = name relative to Tracks/Replays/).                                                                                       |
| /windowless              | Disable creation of the 3D viewport. (useful for batch processing with /validatepath, for instance)                                                                           |
| /list_benchs=xxx         | Benchmarks a list of replays. (xxx = name of a text file containing the replays file names.)                                                                                  |
| /bench=xxx               | Benchmarks a replay (xxx = full path to the replay file name) (Internal: if no filename is specified, performs a quick technical benchmark for the default launcher settings) |
| /computeallshadows       | Computes the lightmaps for all the challenges on disk.                                                                                                                        |
| /config=xxx              | Use a specific ".SystemConfig.Gbx" config file.                                                                                                                               |
| /userdir=xxx             | Changes the default "My Documents/TmUnited/" location. (either a full path, or just "exe" to use the exe directory.)                                                          |
| /useexedir               | Run in the directory where the executable is, instead of the current directory.                                                                                               |
| /title=xxx               | Sets the title to be used. Only this title and its subtitles will be playable.                                                                                                |
| /testtitle=mytitle@login | Launch and test a title directly instead of going into the pack editor, selecting the pack, going to the title section and clicking on test.                                  |
| /checkdataintegrity | Launch and check for data integrity on titlepacks.                                  |
