---
layout: default
title: Mood XML Description
description: Information about on how modify a mood in Maniaplanet
tags:
- creation
- title
---

In your mood directory ( /Land/Day for instance), you can now place a Mood.MoodSetting.xml

You will have access to parameters only nadeo was able to tweak before, some can have disastrous effects if badly used.

# Lighting
Some of these parameters will impact the light map calculation. You will need to recompute the lightmap to see what they did.

**Light EnableStars="1" ** :  show stars in the sky even if Day (no effect on lightmap)  
**Latitude="45"**  : will modify the height of the sun above the horizon depending the time of the day.  
**DayTime01="0.56" ** defines the clock, and so the height of the sun : 0 = after_midnight 0.5 : midday 1 = before_midnight  
**LocalLightX="1"** multiplier to make local lights (all lights in blocks that are not the sun) stronger or lower than default settings (has effect on lightmap)

**HelperHdrX="0.8"** multiplier to adapt the editor cursor  to the mood brightness (no effect on lightmap)

**LAmbient Color="cee3ff" Scale="1.18933"** : color & intensity of the "warp" (horizon) and of the blocks before computing shadows  
**LDirSun Color="ffebbf" Scale="1.80008"** : color & intensity of the Sun Light  
**LDirMoon Color="000000" Scale="1"** : color & intensity of the Moon Light (night mood)

## T3SpecularLocal

These are only visible if Light Index are enabled in the launcher.

**--ScaleIntens="1"  **: intensity of (the bright dot) specular of local lights  
**--ScaleExponent="1.2" **: glossiness (size of the dot) of local lights.  
Highexponent = wet, low = matte. like Alpha channel of specular maps

## T3LightMap

 Dangerous settings to tweak the lightmap calculation

**--MaxHDR="2.5" ** : low dynamic range is 0 to 1. High value lights will generate high values lightmap. The higher this value, the lower the precision on dark areas.  
You can choose to clamp the max values to this MaxHdr to improve this by loosing some gradients on very bright areas (most of the time they are very white and won't loose too much.  
Very dangerous value!! if you add very high scales of sun or local lights or in the sky Hdr texture you will have to make this one very high as well.  
**--BounceFactor="2" ** : default = 1. when light bounces are computed, you can artificially add strength to the re-emited light.  
**--SkyFactor="1" ** : to add energy to light coming from the skydome and clouds.  
**--SkyUseClouds="1"** : use clouds or not when computing shadows (will remove some blue of the sky in the ambient if [ON] for instance)

# Atmosphere
**MoonHdrScale="1" **: to scale the intensity of the moon sprite (no effect on lighting)  
**FxSmSelfIllumScaleGamePlay="2.5" **: to scale the intensity of Shootmania player, projectiles and pole effects

## HdrSun

These parameters will impact the light map calculation

**Power="80000"** : size of the sun dot
**Atmo1 Power="10" Color="95cfff" Scale="1.12004"** : size of the sun glow  
**Atmo2 Power="2" Color="89b8ff" Scale="0.294012"** : size of the second sun glow

This defines the sun dot size and it's glow on the sky around it.
Low power : big sun, high power = small.
Scale : Hdr intensity


## Clouds

Some of these parameters will impact the light map calculation
Clouds are also colored by the textures AmbCubeP.dds and SkyClouds.dds

**MinRgb="000000" ** : darkest color of the cloud paks (the shadow part of the clouds)  
**MinRgbX="1" ** : intensity of the previous color  
**MaxRgb="ffffff" ** : brightest color of the cloud paks (the part of the clouds facing the sun)  
**MaxRgbX="1.00004" **  : intensity of the previous color

**GodLightIntens="0.08" ** : intensity of the god lights (these are not enable in all TM titles yet) (no effect on lighting)  
**SunThroughIntens="0.75">** : intensity of the glow of the sun we see inside the clouds (no effect on lighting)

**`<EdgeLight>`** : these will define, like the Atmo power, how the bright outlines of the clouds are looking (no effect on lighting)  
**`<Layer0 Power="16" Scale="2"/>`**  
**`<Layer1 Power="2" Scale="1.5"/>`**  
**`<Layer2 Power="1" Scale="1.2"/>`**  
**`</EdgeLight>`**

## Clouds X2

This will colorize the cloudsX2 texture of the mood (fake cloud shadow moving on the ground and blocks)

**MinRgb="ffffff" ** : will colorize all greys darker than 128.128.128  
**MinRgbX="0.380016" ** : scale the previous color  
**MaxRgb="ffffff" ** : will colorize all greys brighter than 128.128.128  
**MaxRgbX="0.627024"** : scale the previous color

**`<CloudsVortex MinRgb="000000" MaxRgb="ffffff"/>`** colors of the tornado in Royal(to fit the sky clouds colors)(no effect on lighting)

**`<FogMatter Count="0"/>`**  (no effect on lighting)

## Fog
(no effect on lighting)

**Fog Enabled="1"**
**DepthMin="16"** : in meters, no fog before this distance  
**DepthMax="4500"** : in meters, fog will be at max at this distance  
**Exponant="0.7"** : defines how fast it reaches its max value : low value : light fog very far (create visible line at depth min if too low), high value : somes very dense very fast.  
**IntensMin="0"** : opacity of the fog at DepthMin  
**IntensMax="0.846"** : opacity of the fog at DepthMax  
**Color="92b5dc"** : color of the fog

**Height** : you can specify a vertical gradient (to have fog only at low altitude, or only at high altitude for instance)  
**YBottom="-50"** : in meters, lowest altitude (it's like DepthMin but vertically)  
**YTop="400"** : in meters, highest altitude (it's like DepthMax but vertically)  
**MulBottom="0.914"** : opacity of the fog at YBottom  
**MulTop="0.686"** : opacity of the fog at YTop

**Clouds ** : the fog can be applied differently on the clouds this settings are the same as above, but only for clouds.  
**DepthMax="55000" **  
**Exponant="0.8" **  
**IntensMax="0.518"**  
** SkyClouds GlobalIntens="0"**

# Special Effects
These are post process settings, does not affect lightmap calculations.

## T3Bloom

**StreaksIntens="0.2" ** : affects intensity of the "spikes" (streaks ;p) created by high intensity lighting values (sun, lights, projectiles, etc...). these comes from the HdrNorm_to_Intens settings below  
**StreaksAttenuation="0.7"** : affects the size of those spikes

**HdrNorm_to_Intens** : affects how much parts of the image will create bloom, depending on their intensity. Key In : Light intensity value of the pixel in the image, Key Out : it's intensity after the post process.  
**<Key In="0" Out="0"** : black areas : no bloom  
**<Key In="2" Out="0.001"** : dark areas : almost no bloom  
**<Key In="4" Out="0.6"** : very bright areas : a lot of bloom (and streaks)  
**<Key In="48" Out="0.001"** : extremely bright areas (it goes back to low bloom to avoid global feary/ poney/ love effect. This will only create bloom on some high dots) : almost no bloom


## T3ToneMap
These will change how the camera will adapt to the changes of lighting (going inside outside, looking at the sun, etc...)

**FilmCurve="Preset3"** : Film Curve is a post process that adds contrast to the image, making darks darker, and brights brighter. Preset 1 and 2 have lower contrast.

**AutoExp** : a high exposure means enhancing light, low exposure means lowering light (eye or camera adaptation)  
**MinExposure="-2"** : Exposure will never go below this value, to avoid very bright areas to make everything black.  
**MaxExposure="4.5"** : Exposure will never go above this value, to avoid very dark areas (less lightmap precision) to be shown very bright  
**SecondsToMidFalloff="0.3">** : how fast the lighting will change. Realistic ones are slower, but beeing blind after going out of a tunnel for tunnel can be bad for gameplay. Making it too fast will make the screen flicker/blink when going fast between a lot of light changes (alternating shadow/light/shadow uner bridges for instance)

**<AvgLumi_to_KeyValue>** these define how much the image must be made brighter or darker, depending on its average Luminosity.  
**`<Key In="0.001" Out="0.06"/>`** : Very Dark Area (deep underground, no lights) : Brighten  x60  
**`<Key In="0.1" Out="0.11"/>`** : Dark Areas (shadows, Tunnel entries)  : Brighten  x10  
**`<Key In="0.5" Out="0.52"/>`** : most common areas : (outside) no change.  
**`<Key In="1.4" Out="0.6"/>`** : very bright , blinding areas : (sun, lights very close) : Darken x 2.3


**`<ColorGrading FileName="" Intensity="1"/>`** You can force a colorgrading effect for your mood, instead of using a MediaTrack. Add the name of the .png located in the mood folder. explanations of how it works [here](http://forum.maniaplanet.com/viewtopic.php?f=264&t=17358&p=157049&hilit=color+grading&sid=d7aed22430188f6bbcb8716ef5fadb38#p157049)


# Settings of the moods

* [Shootmania][1]
* [Trackmania][2]


[1]: ./shootmania_moods.html
[2]: ./trackmania_moods.html
