---
title: 'Batching videos'
taxonomy:
    category:
        - docs
---

Are you tired of waiting for your video rendering to be done in the MediaTracker? I'm sure you wished many times that it could be great to render many video clips while you're sleeping.

Thanks to the video batch command, you can render several replays in a row.

The command is `"/shootvideo=yourclip1.Replay.Gbx;yourclip2.Replay.Gbx;yourclip3.Replay.Gbx;"`

Place it just after the ManiaPlanet.exe. To make it easier, i suggest you to create a batch file.

Example:

	Maniaplanet.exe /login=yourlogin /shootvideo=yourclip1.Replay.Gbx;yourclip2.Replay.Gbx;yourclip3.Replay.Gbx;


Just make sure you target the "ManiaPlanet.exe" file. My batch file is in the ManiaPlanet installation folder, then i just wrote the executable file name.

# Very important
The replays you need to render must be placed in the Replay root folder. For instance : `C:\your_windows_session\Documents\ManiaPlanet\Replay\``

The character string is limited. Then it's not possible to launch 3698 clips in a row. Especially if your replay file names are too long. I suggest your to limit it to two characters as a numeric suite: `01.Replay.Gbx;02.Replay.Gbx; ...`
Make sure you finish your command line by a ";"

# Launch it!

This is it! Save your batch file and double click on it. ManiaPlanet will launch and the video rendering dialog box will appear. Keep it mind that the settings you choose will be applied to all the replays that will be rendered. (depth of field, fps, resolution, antialias, ...)

(Not so) Pro tip: max out your graphic settings in the launcher, don't forget to set the lightmap computing at the maximum too. Save your profile for your next rendering sessions.