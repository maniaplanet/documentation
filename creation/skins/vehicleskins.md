---
layout: default
title: Vehicle skin specification
description: Vehicle skin import
tags:
- creation
---

Documentation can be found in the [forum](http://forum.maniaplanet.com/viewtopic.php?f=321&t=4372).


*Description of `Models\XXXCar\` skin:*

- `Icon [Image]`: icon for the skin

- `*Diffuse;SkinDiffuse [Image]`: remaps Vehicles\Media\Texture\Image\CommonCarSkin.dds
- `Details;DetailsDiffuse [Image]`: remaps Vehicles\Media\Texture\Image\CommonCarDetails.dds
- `Wheels;WheelsDiffuse [Image]`: remaps Vehicles\Media\Texture\Image\CommonCarWheels.dds
- `Pilot [Image]`: remaps Vehicles\Media\Texture\Image\CommonCarPilot.dds
- `Illum;DetailsIllum [Image]`: remaps Vehicles\Media\Texture\Image\CommonCarDetailsSelfIllum.dds

- `DiffuseDirty;SkinDirty [Image]`: remaps Vehicles\Media\Texture\Image\CommonCarSkinDirty.dds
- `DetailsDirty [Image]`: remaps Vehicles\Media\Texture\Image\CommonCarDetailsDirty.dds
- `WheelsDirty [Image]`: remaps Vehicles\Media\Texture\Image\CommonCarWheelsDirty.dds
- `PilotDirty;Dirty [Image]`: remaps Vehicles\Media\Texture\Image\CommonCarPilotDirty.dds

- `SkinDamage [Image]`: remaps Vehicles\Media\Texture\Image\CommonCarSkinDamage.dds
- `DetailsDamage [Image]`: remaps Vehicles\Media\Texture\Image\CommonCarDetailsDamage.dds
- `WheelsDamage [Image]`: remaps Vehicles\Media\Texture\Image\CommonCarWheelsDamage.dds

- `ProjShad;FakeShad [Image]`: remaps Vehicles\Media\Texture\Image\CommonCarShadowProj.dds
- `ProjWheelShad [Image]`: remaps Vehicles\Media\Texture\Image\CommonCarWheelShadowProj.dds

- `*Horn [Sound]`: remaps Vehicles\Media\Audio\Sound\WavData\ValleyCarHorn.wav
- `Engine\ [Sound]`: list of ogg files for each engine rev. (see below)

---

*Engine sound*  

To make an engine, you just throw engine loops in a folder called "Engine/", with the following naming convention:

    loop_{rpm}_{gas}_{perspective}.wav/ogg

with:  
-    {rpm} = xxxRpm  
    internally the engine goes from 2500 -> 10000. The game will pick the lower and higher value from the file list, and expand to this range
    
-    {gas} = throttle, release  
    whether the loop is to be used when pressing the gas pedal or not

-    {perspective} = in high quality, 3 spatialised sound sources are used: the exhaust, engine and body  
                     in low quality, 1 source is used: only exhaust.  

    exhaust if mostly heard from behind  
    engine from the front  
    and body from inside view / or when close to the car.  

You can put any number of files matching those criteria, and the game will pick up and use what fits best.
(well any: at most 16 for each perspective. And the duration of each loop should not be lower than 8 samples - avoid empty files)
The sounds must be 1-channel ogg or wav files.

For an example, see `Vehicles\Media\Audio\Sound\WavData\ValleyEngine_2013_03_06\` in `C:\ProgramData\ManiaPlanet\PacksCache\TMValley_HD.zip`

The horn must be a mono sound shorter than 10 seconds.
