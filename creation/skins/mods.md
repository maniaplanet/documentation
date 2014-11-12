---
layout: default
title: Mods Documentation
description: Specification for modding environement textures
tags:
- creation
---


## Description of `Canyon\Mod\` skin

- `UiBgBottom [Image]`: remaps Menu\Media\Texture\Image\UiBgBottom.dds
- `UiBgBottomCenterRace [Image]`: remaps Menu\Media\Texture\Image\UiBgBottomCenterRace.dds
- `UiBgCard [Image]`: remaps Menu\Media\Texture\Image\UiBgCard.dds
- `AmbiantSound [Sound]`: remaps Canyon\Media\Audio\Sound\Wav\Amb.ogg
- `Moods\ [Media]`: remaps Canyon\Media\Moods\
- `Image\ [Image]`: remaps Canyon\Media\Texture\Image\
- `Icon [Image]`: remaps Canyon\Media\Texture Menus\Image\IconCollection.dds
- `DecalsImage\ [Image]`: remaps Canyon\Media\Texture Decal\Image\
- `CarFxImage\ [Image]`: remaps Canyon\Media\Texture CarFx\Image\
- `CarAsphaltMarks [Image]`: remaps Canyon\Media\Texture CarFx\Image\CarAsphaltMarks.dds
- `CarAsphaltSmoke [Image]`: remaps Canyon\Media\Texture CarFx\Image\CarAsphaltSmoke.dds
- `CarDirtGravels [Image]`: remaps Canyon\Media\Texture CarFx\Image\CarDirtGravels.dds
- `CarDirtMarks [Image]`: remaps Canyon\Media\Texture CarFx\Image\CarDirtMarks.dds
- `CarDirtSmoke [Image]`: remaps Canyon\Media\Texture CarFx\Image\CarDirtSmoke.dds
- `CarGrassMarks [Image]`: remaps Canyon\Media\Texture CarFx\Image\CarGrassMarks.dds
- `Sound\ [Sound]`: remaps Canyon\Media\Audio\Sound\Wav\
- `AudioSettings [Text]`: remaps Effects\Media\Text\AudioSettingsMod.xml

----

## Description of `Stadium\Mod\` skin

- `AmbiantSound [Sound]`: remaps Stadium\Media\Audio\Sound\Wav\AmbStadium.ogg
- `Moods\ [Media]`: remaps Stadium\Media\Moods\
- `Image\ [Image]`: remaps Stadium\Media\Texture\Image\
- `Turbine [Sound]`: remaps Stadium\Media\Audio\Sound\Wav\turbine.ogg
- `UiBgBottom [Image]`: remaps Menu\Media\Texture\Image\UiBgBottom.dds
- `UiBgBottomCenterRace [Image]`: remaps Menu\Media\Texture\Image\UiBgBottomCenterRace.dds
- `UiBgCard [Image]`: remaps Menu\Media\Texture\Image\UiBgCard.dds
- `DirtMarks [Image]`: remaps Stadium\Media\Texture CarFx\Image\CarDirtMarks.dds
- `DirtSmoke [Image]`: remaps Stadium\Media\Texture CarFx\Image\CarDirtSmoke.dds
- `CarFxImage\ [Image]`: remaps Stadium\Media\Texture CarFx\Image\
- `Sound\ [Sound]`: remaps Stadium\Media\Audio\Sound\Wav\
- `Icon [Image]`: remaps Stadium\Media\Texture Icon\Image\IconEnvStadium.dds
- `AudioSettings [Text]`: remaps Effects\Media\Text\AudioSettingsMod.xml

----

## Description of `Valley\Mod\` skin

- `UiBgBottom [Image]`: remaps Menu\Media\Texture\Image\UiBgBottom.dds
- `UiBgBottomCenterRace [Image]`: remaps Menu\Media\Texture\Image\UiBgBottomCenterRace.dds
- `UiBgCard [Image]`: remaps Menu\Media\Texture\Image\UiBgCard.dds
- `Image\ [Image]`: remaps Valley\Media\Texture\Image\
- `Moods\ [Media]`: remaps Valley\Media\Moods\
- `Sound\ [Sound]`: remaps Valley\Media\Audio\Sound\Wav\
- `Icon [Image]`: remaps Valley\Media\Texture Menus\Image\IconCollection.dds
- `LoadScreen [Image]`: remaps Valley\Media\Texture Menus\Image\LoadScreen.dds
- `CarFxImage\ [Image]`: remaps Valley\Media\Texture CarFx\Image\
- `DecalsImage\ [Image]`: remaps Valley\Media\Texture Decal\Image\
- `AmbiantSound [Sound]`: remaps Valley\Media\Audio\Sound\Wav\AmbWind.ogg
- `AudioSettings [Text]`: remaps Effects\Media\Text\AudioSettingsMod.xml

----

## Description of `Storm\Mod\` skin

- `Image\ [Image]`: remaps Storm\Media\Texture\Image\
- `Wav\ [Sound]`: remaps Storm\Media\Audio\Sound\Wav\
- `Icon [Image]`: remaps Storm\Media\Texture Menus\Image\IconCollection.dds
- `LoadScreen [Image]`: remaps Storm\Media\Texture Menus\Image\LoadScreen.dds
- `DecalsImage\ [Image]`: remaps Storm\Media\Texture Decal\Image\
- `MoodsLand\ [Media]`: remaps Storm\Media\Moods\Land\
- `MoodsWater\ [Media]`: remaps Storm\Media\Moods\Water\
- `WeaponsImage\ [Image]`: remaps ShootMania\Media\Texture\Image\
- `CharMaterialWav\ [Sound]`: remaps ShootMania\Media\Audio\Sound\Character\Material\
- `ImpactWav\ [Sound]`: remaps ShootMania\Media\Audio\Sound\Impact\
- `MiscWav\ [Sound]`: remaps ShootMania\Media\Audio\Sound\Misc\
- `WeaponWav\ [Sound]`: remaps ShootMania\Media\Audio\Sound\Weapon\
- `AudioSettings [Text]`: remaps Effects\Media\Text\AudioSettingsMod.xml
- `UIWav\ [Sound]`: remaps ShootMania\Media\Audio\Sound\UI\

----

## AudioSettingsMod.xml

Allows to tweak the overall mix for the mood.

{% highlight xml %}
<?xml version="1.0" encoding="utf-8" ?>
<audio_settings version="1">
	<mix>
		<ambiance	volume_db="0" rolloff="1" />
		<players	volume_db="0" rolloff="1" />
		<weapons	volume_db="0" rolloff="1" />
		<interface	volume_db="0" rolloff="1" />
	</mix>
</audio_settings>
{% endhighlight %}

## Moods:

The various `Moods\` folder can also contain a `Mood.MoodSetting.xml` file to change the lighting conditions.

Documentation and examples available on this [documentation][1].

## [How to] Specular maps in mods
Some modders are using the diffuse map as specular map, this can work a little bit, but the best results are really obtained by doing each specular channel separately.  
We are not using a real PBR technique (PBR = Physically Based Rendering) which is used nowadays a lot in current and nextgen engines, but we are using similar concepts in the maniaplanet engine.

You can learn a lot from PBR tutorials, especially how light works and interacts with materials.  
* [Google search for PBR tutorials][2]
* [PBR Theory][3]

In our engine, you could translate the **PBR** like this :  
1. **We don't have metals like PBR"s**
2. **Albedo** = Diffuse
3. **Microsurface** = Specular exponent = Specular's Alpha channel = glossiness / roughness (black = rough, white = glossy)
4. **Reflectivity** = Specular intensity = Specular's Green channel (black : matte, white = shiny)
5. **Fresnel** = Specular's Red channel (black = low, white = high) (the color shown by our fresnel is given by the lightmap, it's a very low quality averaged color of the world around the pixel)
6. **Ambient occlusion** : is computed in the lightmap

Work your specular map in RGB because most filters/modifiers don't touch the alpha channel:  
* <span style="color: red;">R</span><span style="color: green;">G</span><span style="color: blue;">B</span> = **FIE**
* <span style="color: red;">Red</span> = Fresnel
* <span style="color: green;">Green</span> = Intensity
* <span style="color: blue;">Blue</span> = Exponent

Before saving your map as .dds, convert it to <span style="color: red;">R</span><span style="color: green;">G</span><span style="color: blue;">B</span>A=FI0E (0=zero).  
This means cut/paste your Blue channel into Alpha channel, and set your blue channel to black.

### Random Tips

* Unless really wanted, avoid too high exponent, makes everything wet or plastic
* Be cautious with the specular intensity, this can makes very bright spots.
* The fresnel helps reading the volumes but adds a faery/virtual/toonish look to your material if too strong
* Wet materials are darker than when they're dry, to simulate a puddle of water on the road : darken the diffuse, very strong fresnel, very high exponent, and high intensity (normal map of water/liquid should be flat (rgb = 127.127.255))
* To simulate oil : use a very dark almost black diffuse, and treat it like water. use brown for mud.
* In some "stoneish" materials, the brighter parts are more matte than the other ones (expecially true for concrete) : if you use your diffuse as a source for your specular, invert its glossiness values (bright diffuse = dark exponent/ intensity)
* Asphalt as often an inversed specular : dark asphalt is shiny/new, and bright/grey asphalt is old, matte.
* Do not apply the same modifications (brightness/contrast/curves, etc...) to the 3 channels of the specular maps, you'll have deeper and more interesting results if they are not synchronized (I use Curves adjustment in photoshop, and I tweak the curve for Red Green and Blue separately.

[1]: ../title/mood.html
[2]: https://www.google.fr/search?q=pbr+tutorial&oq=pbr+tutorial&aqs=chrome..69i57j0l4.1719j0j4&sourceid=chrome&es_sm=93&ie=UTF-8
[3]: http://www.marmoset.co/toolbag/learn/pbr-theory
