---
layout: static
title: Command Line
description: Maniaplanet.exe client command line 
---

<table>
  <tr>
    <th>Option Name</th><th>Role</th>
  </tr>
  <tr>
    <td>/login=xxx</td><td>Account login to be used to play online.</td>
  </tr>
  <tr>
    <td>/password=xxx</td><td>Account password</td>
  </tr>
  <tr>
    <td>/profile=xxx</td><td>Forces using a specific profile on disk. (to avoid the profile choice dialog)</td>
  </tr>
  <tr>
    <td>/validation=xxx</td><td>Specifies the account validation key (the last three chracters of the player key) to be able to perform copper transactions.</td>
  </tr>
  <tr>
	<td colspan="2"></td>
  </tr>
  <tr>
	<td>/join=xxx</td><td>Joins a server. (xxx = the server ip adress with optional port, or the server login.)</td>
  </tr>
  <tr>
	<td>/spectate=xxx</td><td>Same as /join, but join as spectator.</td>
  </tr>
  <tr>
	<td>/joinasreferee=xxx</td><td>Same as /join, but join as referee.</td>
  </tr>
  <tr>
	<td>/serverpassword=xxx</td><td>Password to use to join the server if the server is private.</td>
  </tr>
  <tr>
	<td>/silent</td><td>Skips news, etc... to allow joining a server without any user interaction.</td>
  </tr>
  <tr>
	<td colspan="2"></td>
  </tr>
  <tr>
	<td>/file=xxx</td><td>Opens a Replay.Gbx or a Challenge.Gbx file. (xxx = full path to the file.)</td>
  </tr>
  <tr>
	<td>/url=xxx</td><td>Opens a maniaplanet:// url with the game.</td>
  </tr>
  <tr>
	<td colspan="2"></td>
  </tr>
  <tr>
	<td>/shootvideo=xxx</td><td>Shoots a replay to a video file. (xxx = replay file. aboslute file name or relative to Tracks/Replays/).</td>
  </tr>
  <tr>
	<td>/validatepath=xxx</td><td>Mass validates all the replays in a directory (xxx = name relative to Tracks/Replays/).</td>
  </tr>
  <tr>
	<td>/windowless</td><td>Disable creation of the 3D viewport. (useful for batch processing with /validatepath, for instance)</td>
  </tr>
  <tr>
	<td colspan="2"></td>
  </tr>
  <tr>
	<td>/list_benchs=xxx</td><td>Benchmarks a list of replays. (xxx = name of a text file containing the replays file names.)</td>
  </tr>
  <tr>
	<td>/bench=xxx</td><td>Benchmarks a replay (xxx = full path to the replay file name) (Internal: if no filename is specified, performs a quick technical benchmark for the default launcher settings)</td>
  </tr>
  <tr>
	<td colspan="2"></td>
  </tr>
  <tr>
	<td>/computeallshadows</td><td>Computes the lightmaps for all the challenges on disk.</td>
  </tr>
  <tr>
	<td>/config=xxx</td><td>Use a specific ".SystemConfig.Gbx" config file.</td>
  </tr>
  <tr>
	<td>/userdir=xxx</td><td>Changes the default "My Documents/TmUnited/" location. (either a full path, or just "exe" to use the exe directory.)</td>
  </tr>
  <tr>
	<td>/useexedir</td><td>Run in the directory where the executable is, instead of the current directory.</td>
  </tr>
  <tr>
  <td>/title=xxx</td><td>Sets the title to be used. Only this title and its subtitles will be playable.</td>
  </tr>
  <tr>
	<td>/testtitle=mytitle@login</td><td>Launch and test a title directly instead of going into the pack editor, selecting the pack, going to the title section and clicking on test.</td>
  </tr>
</table>