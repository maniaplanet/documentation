---
layout: default
title: mods doc
description: Specifiaction for modding environement textures
tags:
- creation
---

----
*Description of `Canyon\Mod\` skin:*
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

*Description of `Stadium\Mod\` skin:*
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

*Description of `Valley\Mod\` skin:*
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

*Description of `Storm\Mod\` skin:*
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
**AudioSettingsMod.xml**

Allows to tweak the overall mix for the mood.

```
<?xml version="1.0" encoding="utf-8" ?>
<audio_settings version="1">
	<mix>
		<ambiance	volume_db="0" rolloff="1" />
		<players	volume_db="0" rolloff="1" />
		<weapons	volume_db="0" rolloff="1" />
		<interface	volume_db="0" rolloff="1" />
	</mix>
</audio_settings>
```

----
**Moods:**

The various `Moods\` folder can also contain a `Mood.MoodSetting.xml` file to change the lighting conditions.

Documentation and examples available on the [forum](http://forum.maniaplanet.com/viewtopic.php?f=321&t=27372).

