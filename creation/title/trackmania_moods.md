---
layout: default
title: Trackmania mood settings list
description: List the settings of all Trackmania default moods
tags:
- creation
- title
---

# Trackmania Stadium

## Day
```xml
<Mood>
	<Light EnableStars="1" Latitude="45" DayTime01="0.6" LocalLightX="0.25" HelperHdrX="1">
		<LAmbient Color="fffbff" Scale="0.0369" />
		<LDirSun Color="fff5e6" Scale="1.15" />
		<LDirMoon Color="000000" Scale="1" />
		<T3SpecularLocal ScaleIntens="1" ScaleExponent="1.2" />
		<T3LightMap MaxHDR="2.5" BounceFactor="2" SkyFactor="1" SkyUseClouds="1" />
	</Light>
	<Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="5">
		<HdrSun Power="8e+004">
			<Atmo1 Power="10" Color="95cfff" Scale="1.12" />
			<Atmo2 Power="2" Color="89b8ff" Scale="0.294" />
		</HdrSun>
		<Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1" GodLightIntens="0.05" SunThroughIntens="0.75">
			<EdgeLight>
				<Layer0 Power="16" Scale="2" />
				<Layer1 Power="2" Scale="1.5" />
				<Layer2 Power="1" Scale="1.2" />
			</EdgeLight>
		</Clouds>
		<CloudsX2 MinRgb="ffffff" MinRgbX="0.38" MaxRgb="ffffff" MaxRgbX="0.627" />
		<CloudsVortex MinRgb="000000" MaxRgb="ffffff" />
		<FogMatter Count="0" />
	</Atmo>
	<Fog Enabled="1" DepthMin="24" DepthMax="4.5e+003" Exponant="1" IntensMin="0" IntensMax="1" Color="abc9f6">
		<Height YBottom="-200" YTop="500" MulBottom="0.808" MulTop="1" />
		<Clouds DepthMax="8e+004" Exponant="2" IntensMax="0.4" />
		<SkyClouds GlobalIntens="0" />
	</Fog>
	<Fx>
		<T3Bloom StreaksIntens="0.2" StreaksAttenuation="0.7">
			<HdrNorm_to_Intens>
				<Key In="0" Out="0" />
				<Key In="2" Out="0.001" />
				<Key In="4" Out="0.6" />
				<Key In="48" Out="0.001" />
			</HdrNorm_to_Intens>
		</T3Bloom>
		<T3ToneMap FilmCurve="Preset3">
			<AutoExp MinExposure="-2" MaxExposure="4.5" SecondsToMidFalloff="0.3">
				<AvgLumi_to_KeyValue>
					<Key In="0.001" Out="0.06" />
					<Key In="0.005" Out="0.06" />
					<Key In="0.01" Out="0.04" />
					<Key In="0.02" Out="0.05" />
					<Key In="0.03" Out="0.08" />
					<Key In="0.06" Out="0.09" />
					<Key In="0.1" Out="0.11" />
					<Key In="0.25" Out="0.25" />
					<Key In="0.35" Out="0.3" />
					<Key In="0.5" Out="0.35" />
					<Key In="0.7" Out="0.4" />
					<Key In="1.4" Out="0.6" />
				</AvgLumi_to_KeyValue>
			</AutoExp>
		</T3ToneMap>
	</Fx>
</Mood>
```

## Night
```xml
<Mood>
	<Light EnableStars="1" Latitude="48" DayTime01="0.15" LocalLightX="1" HelperHdrX="1">
		<LAmbient Color="ffffff" Scale="0.0908" />
		<LDirSun Color="000000" Scale="1" />
		<LDirMoon Color="98b4ff" Scale="1.16" />
		<T3SpecularLocal ScaleIntens="1.1" ScaleExponent="1.5" />
		<T3LightMap MaxHDR="3.5" BounceFactor="2" SkyFactor="1" SkyUseClouds="1" />
	</Light>
	<Atmo MoonHdrScale="2" FxSmSelfIllumScaleGamePlay="1">
		<HdrSun Power="5e+003">
			<Atmo1 Power="400" Color="92acff" Scale="0.648" />
			<Atmo2 Power="4" Color="8aa6ff" Scale="0.0882" />
		</HdrSun>
		<Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1" GodLightIntens="0" SunThroughIntens="1">
			<EdgeLight>
				<Layer0 Power="100" Scale="5" />
				<Layer1 Power="16" Scale="2" />
				<Layer2 Power="1" Scale="1" />
			</EdgeLight>
		</Clouds>
		<CloudsX2 MinRgb="edefff" MinRgbX="0.376" MaxRgb="f1f4ff" MaxRgbX="0.6" />
		<CloudsVortex MinRgb="000000" MaxRgb="ffffff" />
		<FogMatter Count="0" />
	</Atmo>
	<Fog Enabled="1" DepthMin="16" DepthMax="2e+003" Exponant="1" IntensMin="0" IntensMax="0.6" Color="353547">
		<Height YBottom="-600" YTop="500" MulBottom="0.15" MulTop="1" />
		<Clouds DepthMax="6e+004" Exponant="1.5" IntensMax="0.868" />
		<SkyClouds GlobalIntens="0" />
	</Fog>
	<Fx>
		<T3Bloom StreaksIntens="0.7" StreaksAttenuation="0.7">
			<HdrNorm_to_Intens>
				<Key In="0" Out="0" />
				<Key In="0.2" Out="0" />
				<Key In="1" Out="0.5" />
				<Key In="32" Out="0.01" />
			</HdrNorm_to_Intens>
		</T3Bloom>
		<T3ToneMap FilmCurve="Preset3">
			<AutoExp MinExposure="-4" MaxExposure="4" SecondsToMidFalloff="0.3">
				<AvgLumi_to_KeyValue>
					<Key In="0.001" Out="0.02" />
					<Key In="0.003" Out="0.04" />
					<Key In="0.07" Out="0.06" />
					<Key In="0.17" Out="0.1" />
					<Key In="0.4" Out="0.2" />
				</AvgLumi_to_KeyValue>
			</AutoExp>
		</T3ToneMap>
	</Fx>
</Mood>
```

## Sunrise
```xml
<Mood>
	<Light EnableStars="1" Latitude="45" DayTime01="0.52" LocalLightX="1" HelperHdrX="1">
		<LAmbient Color="d0e7ff" Scale="0.361" />
		<LDirSun Color="ffd997" Scale="1.8" />
		<LDirMoon Color="000000" Scale="1" />
		<T3SpecularLocal ScaleIntens="1" ScaleExponent="3" />
		<T3LightMap MaxHDR="2.2" BounceFactor="3" SkyFactor="0.5" SkyUseClouds="1" />
	</Light>
	<Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="1">
		<HdrSun Power="3e+005">
			<Atmo1 Power="50" Color="ffcc32" Scale="0.888" />
			<Atmo2 Power="3" Color="ffd46f" Scale="0.521" />
		</HdrSun>
		<Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1" GodLightIntens="0.2" SunThroughIntens="0.8">
			<EdgeLight>
				<Layer0 Power="15" Scale="2" />
				<Layer1 Power="2" Scale="1" />
				<Layer2 Power="1" Scale="1" />
			</EdgeLight>
		</Clouds>
		<CloudsX2 MinRgb="e9f1ff" MinRgbX="0.4" MaxRgb="fffef8" MaxRgbX="0.58" />
		<CloudsVortex MinRgb="000000" MaxRgb="ffffff" />
		<FogMatter Count="0" />
	</Atmo>
	<Fog Enabled="1" DepthMin="32" DepthMax="3e+003" Exponant="1" IntensMin="0" IntensMax="1" Color="9ba7ba">
		<Height YBottom="-500" YTop="500" MulBottom="0" MulTop="0.85" />
		<Clouds DepthMax="4e+004" Exponant="1.5" IntensMax="0.866" />
		<SkyClouds GlobalIntens="0" />
	</Fog>
	<Fx>
		<T3Bloom StreaksIntens="0.2" StreaksAttenuation="0.6">
			<HdrNorm_to_Intens>
				<Key In="0" Out="0" />
				<Key In="3" Out="0" />
				<Key In="5" Out="0.5" />
				<Key In="64" Out="0.01" />
			</HdrNorm_to_Intens>
		</T3Bloom>
		<T3ToneMap FilmCurve="Preset3">
			<AutoExp MinExposure="-4" MaxExposure="4" SecondsToMidFalloff="0.3">
				<AvgLumi_to_KeyValue>
					<Key In="0.001" Out="0.03" />
					<Key In="0.005" Out="0.04" />
					<Key In="0.01" Out="0.08" />
					<Key In="0.04" Out="0.11" />
					<Key In="0.07" Out="0.14" />
					<Key In="0.1" Out="0.2" />
					<Key In="0.15" Out="0.24" />
					<Key In="0.2" Out="0.25" />
					<Key In="0.25" Out="0.28" />
					<Key In="0.3" Out="0.3" />
					<Key In="0.4" Out="0.4" />
					<Key In="0.6" Out="0.6" />
					<Key In="1" Out="1" />
					<Key In="1.5" Out="1" />
				</AvgLumi_to_KeyValue>
			</AutoExp>
		</T3ToneMap>
	</Fx>
</Mood>
```

## Sunset
```xml
<Mood>
	<Light EnableStars="1" Latitude="65" DayTime01="0.73" LocalLightX="0.8" HelperHdrX="1">
		<LAmbient Color="f7dcff" Scale="0.319" />
		<LDirSun Color="ff8f39" Scale="2" />
		<LDirMoon Color="000000" Scale="1" />
		<T3SpecularLocal ScaleIntens="1.3" ScaleExponent="1.2" />
		<T3LightMap MaxHDR="2.7" BounceFactor="2" SkyFactor="1" SkyUseClouds="1" />
	</Light>
	<Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="1">
		<HdrSun Power="5e+005">
			<Atmo1 Power="30" Color="ff5f12" Scale="2.97" />
			<Atmo2 Power="1.5" Color="ffaa69" Scale="1.09" />
		</HdrSun>
		<Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1" GodLightIntens="0.05" SunThroughIntens="0.6">
			<EdgeLight>
				<Layer0 Power="12" Scale="4" />
				<Layer1 Power="2" Scale="2" />
				<Layer2 Power="1" Scale="1" />
			</EdgeLight>
		</Clouds>
		<CloudsX2 MinRgb="dadfff" MinRgbX="0.392" MaxRgb="fffdfc" MaxRgbX="0.647" />
		<CloudsVortex MinRgb="000000" MaxRgb="ffffff" />
		<FogMatter Count="0" />
	</Atmo>
	<Fog Enabled="1" DepthMin="32" DepthMax="2.5e+003" Exponant="0.9" IntensMin="0" IntensMax="1" Color="685d74">
		<Height YBottom="-500" YTop="600" MulBottom="1" MulTop="0.85" />
		<Clouds DepthMax="6e+004" Exponant="0.8" IntensMax="0.834" />
		<SkyClouds GlobalIntens="0" />
	</Fog>
	<Fx>
		<T3Bloom StreaksIntens="0.2" StreaksAttenuation="0.7">
			<HdrNorm_to_Intens>
				<Key In="0" Out="0" />
				<Key In="1" Out="0" />
				<Key In="4" Out="0.5" />
				<Key In="64" Out="0.01" />
			</HdrNorm_to_Intens>
		</T3Bloom>
		<T3ToneMap FilmCurve="Preset3">
			<AutoExp MinExposure="-2" MaxExposure="4.5" SecondsToMidFalloff="0.3">
				<AvgLumi_to_KeyValue>
					<Key In="0.001" Out="0.01" />
					<Key In="0.005" Out="0.02" />
					<Key In="0.01" Out="0.04" />
					<Key In="0.02" Out="0.07" />
					<Key In="0.04" Out="0.1" />
					<Key In="0.06" Out="0.12" />
					<Key In="0.1" Out="0.155" />
					<Key In="0.2" Out="0.22" />
					<Key In="0.3" Out="0.27" />
					<Key In="0.5" Out="0.32" />
					<Key In="1" Out="0.5" />
				</AvgLumi_to_KeyValue>
			</AutoExp>
		</T3ToneMap>
	</Fx>
</Mood>
```

# Trackmania Canyon

## Day
```xml
<Mood>
	<Light EnableStars="0" Latitude="35" DayTime01="0.644" LocalLightX="0.3" HelperHdrX="1">
		<LAmbient Color="cce2ff" Scale="0.815" />
		<LDirSun Color="fffef1" Scale="2.86" />
		<LDirMoon Color="000000" Scale="1" />
		<T3SpecularLocal ScaleIntens="1" ScaleExponent="2" />
		<T3LightMap MaxHDR="5" BounceFactor="3" SkyFactor="0.3" SkyUseClouds="1" />
	</Light>
	<Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="1">
		<HdrSun Power="8e+004">
			<Atmo1 Power="80" Color="87c9ff" Scale="2.21" />
			<Atmo2 Power="10" Color="6c9fff" Scale="0.543" />
		</HdrSun>
		<Clouds MinRgb="ebf3ff" MinRgbX="0.874" MaxRgb="e6f6ff" MaxRgbX="2.31" GodLightIntens="0" SunThroughIntens="0.75">
			<EdgeLight>
				<Layer0 Power="0" Scale="0" />
				<Layer1 Power="0" Scale="0" />
				<Layer2 Power="0" Scale="0" />
			</EdgeLight>
		</Clouds>
		<CloudsX2 MinRgb="fff9f5" MinRgbX="0.31" MaxRgb="f8fbff" MaxRgbX="0.58" />
		<CloudsVortex MinRgb="000000" MaxRgb="ffffff" />
		<FogMatter Count="0" />
	</Atmo>
	<Fog Enabled="1" DepthMin="72" DepthMax="1.5e+004" Exponant="1" IntensMin="0" IntensMax="1" Color="abc9f6">
		<Height YBottom="-200" YTop="500" MulBottom="0.618" MulTop="1" />
		<Clouds DepthMax="4.5e+004" Exponant="1" IntensMax="0.85" />
		<SkyClouds GlobalIntens="0" />
	</Fog>
	<Fx>
		<T3Bloom StreaksIntens="0.2" StreaksAttenuation="0.7">
			<HdrNorm_to_Intens>
				<Key In="0" Out="0" />
				<Key In="1.5" Out="0" />
				<Key In="3" Out="0.6" />
				<Key In="64" Out="0.01" />
			</HdrNorm_to_Intens>
		</T3Bloom>
		<T3ToneMap FilmCurve="Preset3">
			<AutoExp MinExposure="-2" MaxExposure="4.5" SecondsToMidFalloff="0.3">
				<AvgLumi_to_KeyValue>
					<Key In="0.001" Out="0.06" />
					<Key In="0.005" Out="0.055" />
					<Key In="0.01" Out="0.058" />
					<Key In="0.02" Out="0.07" />
					<Key In="0.03" Out="0.1" />
					<Key In="0.06" Out="0.16" />
					<Key In="0.1" Out="0.2" />
					<Key In="0.125" Out="0.22" />
					<Key In="0.25" Out="0.29" />
					<Key In="0.35" Out="0.35" />
					<Key In="0.5" Out="0.5" />
					<Key In="0.8" Out="0.8" />
					<Key In="1.4" Out="0.7" />
				</AvgLumi_to_KeyValue>
			</AutoExp>
		</T3ToneMap>
	</Fx>
</Mood>
```
## Night
```xml
<Mood>
	<Light EnableStars="1" Latitude="48" DayTime01="0.15" LocalLightX="1" HelperHdrX="0.25">
		<LAmbient Color="e6e6ff" Scale="0.0123" />
		<LDirSun Color="000000" Scale="1" />
		<LDirMoon Color="91a4ff" Scale="0.0887" />
		<T3SpecularLocal ScaleIntens="2" ScaleExponent="2" />
		<T3LightMap MaxHDR="1.5" BounceFactor="3" SkyFactor="0.3" SkyUseClouds="1" />
	</Light>
	<Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="1">
		<HdrSun Power="1e+004">
			<Atmo1 Power="500" Color="8ea3ff" Scale="0.0523" />
			<Atmo2 Power="5" Color="8aa6ff" Scale="0.016" />
		</HdrSun>
		<Clouds MinRgb="bdc6ff" MinRgbX="0.00803" MaxRgb="a4b2ff" MaxRgbX="0.0449" GodLightIntens="0" SunThroughIntens="1">
			<EdgeLight>
				<Layer0 Power="0" Scale="0" />
				<Layer1 Power="0" Scale="0" />
				<Layer2 Power="0" Scale="0" />
			</EdgeLight>
		</Clouds>
		<CloudsX2 MinRgb="edf0ff" MinRgbX="0.361" MaxRgb="f3f7ff" MaxRgbX="0.639" />
		<CloudsVortex MinRgb="000000" MaxRgb="ffffff" />
		<FogMatter Count="0" />
	</Atmo>
	<Fog Enabled="1" DepthMin="16" DepthMax="2e+004" Exponant="1" IntensMin="0" IntensMax="0.3" Color="353547">
		<Height YBottom="-600" YTop="500" MulBottom="0.15" MulTop="1" />
		<Clouds DepthMax="4.5e+004" Exponant="2" IntensMax="0.8" />
		<SkyClouds GlobalIntens="0" />
	</Fog>
	<Fx>
		<T3Bloom StreaksIntens="0.7" StreaksAttenuation="0.7">
			<HdrNorm_to_Intens>
				<Key In="0" Out="0" />
				<Key In="0.5" Out="0" />
				<Key In="3" Out="0.4" />
				<Key In="64" Out="0.01" />
			</HdrNorm_to_Intens>
		</T3Bloom>
		<T3ToneMap FilmCurve="Preset3">
			<AutoExp MinExposure="-4" MaxExposure="4" SecondsToMidFalloff="0.3">
				<AvgLumi_to_KeyValue>
					<Key In="0.001" Out="0.03" />
					<Key In="0.002" Out="0.03" />
					<Key In="0.005" Out="0.04" />
					<Key In="0.007" Out="0.05" />
					<Key In="0.01" Out="0.06" />
					<Key In="0.05" Out="0.05" />
				</AvgLumi_to_KeyValue>
			</AutoExp>
		</T3ToneMap>
	</Fx>
</Mood>
```
## Sunrise
```xml
<Mood>
	<Light EnableStars="1" Latitude="63" DayTime01="0.56" LocalLightX="0.5" HelperHdrX="1">
		<LAmbient Color="e0ecff" Scale="0.54601" />
		<LDirSun Color="ffeebd" Scale="1.81004" />
		<LDirMoon Color="000000" Scale="1" />
		<T3SpecularLocal ScaleIntens="1" ScaleExponent="3" />
		<T3LightMap MaxHDR="2.6" BounceFactor="3" SkyFactor="0.3" SkyUseClouds="1" />
	</Light>
	<Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="1">
		<HdrSun Power="300000">
			<Atmo1 Power="50" Color="ffdb4a" Scale="1.00002" />
			<Atmo2 Power="3" Color="ffd46f" Scale="0.52101" />
		</HdrSun>
		<Clouds MinRgb="ced2ff" MinRgbX="0.51201" MaxRgb="fffab0" MaxRgbX="1.46002" GodLightIntens="0.5" SunThroughIntens="0.8">
			<EdgeLight>
				<Layer0 Power="0" Scale="0" />
				<Layer1 Power="0" Scale="0" />
				<Layer2 Power="0" Scale="0" />
			</EdgeLight>
		</Clouds>
		<CloudsX2 MinRgb="e9f2ff" MinRgbX="0.322006" MaxRgb="ffffff" MaxRgbX="0.55953" />
		<CloudsVortex MinRgb="000000" MaxRgb="ffffff" />
		<FogMatter Count="0" />
	</Atmo>
	<Fog Enabled="1" DepthMin="32" DepthMax="4000" Exponant="0.6" IntensMin="0" IntensMax="0.836" Color="9ba7ba">
		<Height YBottom="-500" YTop="500" MulBottom="0" MulTop="0.85" />
		<Clouds DepthMax="45000" Exponant="2" IntensMax="0.8" />
		<SkyClouds GlobalIntens="0.508" />
	</Fog>
	<Fx>
		<T3Bloom StreaksIntens="0.2" StreaksAttenuation="0.6">
			<HdrNorm_to_Intens>
				<Key In="0" Out="0" />
				<Key In="1" Out="0" />
				<Key In="1.5" Out="0.8" />
				<Key In="64" Out="0.01" />
			</HdrNorm_to_Intens>
		</T3Bloom>
		<T3ToneMap FilmCurve="Preset3">
			<AutoExp MinExposure="-4" MaxExposure="4" SecondsToMidFalloff="0.3">
				<AvgLumi_to_KeyValue>
					<Key In="0.001" Out="0.03" />
					<Key In="0.005" Out="0.04" />
					<Key In="0.01" Out="0.08" />
					<Key In="0.04" Out="0.11" />
					<Key In="0.07" Out="0.14" />
					<Key In="0.1" Out="0.2" />
					<Key In="0.15" Out="0.24" />
					<Key In="0.2" Out="0.25" />
					<Key In="0.25" Out="0.28" />
					<Key In="0.3" Out="0.3" />
					<Key In="0.4" Out="0.4" />
					<Key In="0.6" Out="0.6" />
					<Key In="1" Out="1" />
					<Key In="1.5" Out="1" />
				</AvgLumi_to_KeyValue>
			</AutoExp>
		</T3ToneMap>
		<ColorGrading FileName="" Intensity="1" />
	</Fx>
</Mood>
```
## Sunset
```xml
<Mood>
	<Light EnableStars="1" Latitude="30" DayTime01="0.743" LocalLightX="1" HelperHdrX="0.75">
		<LAmbient Color="e3daff" Scale="0.515" />
		<LDirSun Color="ffa378" Scale="2.84" />
		<LDirMoon Color="000000" Scale="1" />
		<T3SpecularLocal ScaleIntens="2" ScaleExponent="2" />
		<T3LightMap MaxHDR="2.7" BounceFactor="3" SkyFactor="0.3" SkyUseClouds="1" />
	</Light>
	<Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="1">
		<HdrSun Power="5e+005">
			<Atmo1 Power="50" Color="ff7713" Scale="5" />
			<Atmo2 Power="4" Color="ffaa69" Scale="0.905" />
		</HdrSun>
		<Clouds MinRgb="beb9ff" MinRgbX="0.381" MaxRgb="ffb398" MaxRgbX="0.98" GodLightIntens="0" SunThroughIntens="0.6">
			<EdgeLight>
				<Layer0 Power="0" Scale="0" />
				<Layer1 Power="0" Scale="0" />
				<Layer2 Power="0" Scale="0" />
			</EdgeLight>
		</Clouds>
		<CloudsX2 MinRgb="dadfff" MinRgbX="0.392" MaxRgb="fffdfc" MaxRgbX="0.612" />
		<CloudsVortex MinRgb="000000" MaxRgb="ffffff" />
		<FogMatter Count="0" />
	</Atmo>
	<Fog Enabled="1" DepthMin="32" DepthMax="1.2e+004" Exponant="1" IntensMin="0" IntensMax="0.9" Color="685d74">
		<Height YBottom="-500" YTop="600" MulBottom="1" MulTop="0.85" />
		<Clouds DepthMax="4.5e+004" Exponant="2" IntensMax="0.8" />
		<SkyClouds GlobalIntens="0" />
	</Fog>
	<Fx>
		<T3Bloom StreaksIntens="0.2" StreaksAttenuation="0.7">
			<HdrNorm_to_Intens>
				<Key In="0" Out="0" />
				<Key In="1" Out="0" />
				<Key In="2" Out="0.5" />
				<Key In="64" Out="0.01" />
			</HdrNorm_to_Intens>
		</T3Bloom>
		<T3ToneMap FilmCurve="Preset3">
			<AutoExp MinExposure="-2" MaxExposure="4.5" SecondsToMidFalloff="0.3">
				<AvgLumi_to_KeyValue>
					<Key In="0.001" Out="0.03" />
					<Key In="0.005" Out="0.035" />
					<Key In="0.01" Out="0.065" />
					<Key In="0.02" Out="0.1" />
					<Key In="0.04" Out="0.12" />
					<Key In="0.06" Out="0.125" />
					<Key In="0.1" Out="0.15" />
					<Key In="0.2" Out="0.22" />
					<Key In="0.3" Out="0.28" />
					<Key In="0.5" Out="0.3" />
					<Key In="1" Out="0.5" />
				</AvgLumi_to_KeyValue>
			</AutoExp>
		</T3ToneMap>
	</Fx>
</Mood>
```

# Trackmania Valley

## Day
```xml
<Mood>
	<Light EnableStars="0" Latitude="35" DayTime01="0.644" LocalLightX="0.5" HelperHdrX="1">
		<LAmbient Color="b1cdff" Scale="0.982" />
		<LDirSun Color="fff8dd" Scale="1.9" />
		<LDirMoon Color="000000" Scale="1" />
		<T3SpecularLocal ScaleIntens="1" ScaleExponent="2" />
		<T3LightMap MaxHDR="2.51" BounceFactor="3" SkyFactor="0.5" SkyUseClouds="1" />
	</Light>
	<Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="0.7">
		<HdrSun Power="8e+004">
			<Atmo1 Power="10" Color="95cfff" Scale="1.12" />
			<Atmo2 Power="2" Color="89b8ff" Scale="0.294" />
		</HdrSun>
		<Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1" GodLightIntens="0.05" SunThroughIntens="0.75">
			<EdgeLight>
				<Layer0 Power="16" Scale="2" />
				<Layer1 Power="2" Scale="1.5" />
				<Layer2 Power="1" Scale="1.2" />
			</EdgeLight>
		</Clouds>
		<CloudsX2 MinRgb="ffffff" MinRgbX="0.38" MaxRgb="ffffff" MaxRgbX="0.627" />
		<CloudsVortex MinRgb="000000" MaxRgb="ffffff" />
		<FogMatter Count="1">
			<Matter0 Id="Forest" Density="0.0007" Color="bebd8f" />
		</FogMatter>
	</Atmo>
	<Fog Enabled="1" DepthMin="64" DepthMax="7e+003" Exponant="1.1" IntensMin="0" IntensMax="0.9" Color="abc9f6">
		<Height YBottom="-200" YTop="500" MulBottom="0.618" MulTop="1" />
		<Clouds DepthMax="4.5e+004" Exponant="2" IntensMax="0" />
		<SkyClouds GlobalIntens="0" />
	</Fog>
	<Fx>
		<T3Bloom StreaksIntens="0.2" StreaksAttenuation="0.7">
			<HdrNorm_to_Intens>
				<Key In="0" Out="0" />
				<Key In="2" Out="0.001" />
				<Key In="4" Out="0.6" />
				<Key In="48" Out="0.001" />
			</HdrNorm_to_Intens>
		</T3Bloom>
		<T3ToneMap FilmCurve="Preset3">
			<AutoExp MinExposure="-2" MaxExposure="4.5" SecondsToMidFalloff="0.4">
				<AvgLumi_to_KeyValue>
					<Key In="0.001" Out="0.065" />
					<Key In="0.005" Out="0.075" />
					<Key In="0.01" Out="0.085" />
					<Key In="0.02" Out="0.105" />
					<Key In="0.03" Out="0.12" />
					<Key In="0.125" Out="0.21" />
					<Key In="0.25" Out="0.31" />
					<Key In="0.5" Out="0.52" />
					<Key In="0.8" Out="0.8" />
					<Key In="1.4" Out="0.7" />
				</AvgLumi_to_KeyValue>
			</AutoExp>
		</T3ToneMap>
	</Fx>
</Mood>
```
## Night
```xml
<Mood>
	<Light EnableStars="1" Latitude="48" DayTime01="0.15" LocalLightX="1" HelperHdrX="0.25">
		<LAmbient Color="ececff" Scale="0.0232" />
		<LDirSun Color="ff854e" Scale="0.212" />
		<LDirMoon Color="000000" Scale="1" />
		<T3SpecularLocal ScaleIntens="2" ScaleExponent="1" />
		<T3LightMap MaxHDR="1" BounceFactor="2" SkyFactor="1" SkyUseClouds="1" />
	</Light>
	<Atmo MoonHdrScale="2" FxSmSelfIllumScaleGamePlay="1">
		<HdrSun Power="1e+004">
			<Atmo1 Power="300" Color="c1cfff" Scale="0.0744" />
			<Atmo2 Power="5" Color="becfff" Scale="0.0148" />
		</HdrSun>
		<Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1" GodLightIntens="0" SunThroughIntens="1">
			<EdgeLight>
				<Layer0 Power="100" Scale="5" />
				<Layer1 Power="16" Scale="2" />
				<Layer2 Power="1" Scale="1" />
			</EdgeLight>
		</Clouds>
		<CloudsX2 MinRgb="edefff" MinRgbX="0.376" MaxRgb="f1f4ff" MaxRgbX="0.6" />
		<CloudsVortex MinRgb="000000" MaxRgb="ffffff" />
		<FogMatter Count="1">
			<Matter0 Id="Forest" Density="0.001" Color="121318" />
		</FogMatter>
	</Atmo>
	<Fog Enabled="1" DepthMin="16" DepthMax="2.5e+003" Exponant="0.7" IntensMin="0" IntensMax="0.716" Color="23232e">
		<Height YBottom="-600" YTop="500" MulBottom="0.284" MulTop="1" />
		<Clouds DepthMax="2.5e+004" Exponant="1.5" IntensMax="0.868" />
		<SkyClouds GlobalIntens="0" />
	</Fog>
	<Fx>
		<T3Bloom StreaksIntens="0.7" StreaksAttenuation="0.7">
			<HdrNorm_to_Intens>
				<Key In="0" Out="0" />
				<Key In="0.5" Out="0" />
				<Key In="3" Out="0.4" />
				<Key In="64" Out="0.01" />
			</HdrNorm_to_Intens>
		</T3Bloom>
		<T3ToneMap FilmCurve="Preset3">
			<AutoExp MinExposure="-4" MaxExposure="4" SecondsToMidFalloff="0.3">
				<AvgLumi_to_KeyValue>
					<Key In="0.001" Out="0.03" />
					<Key In="0.002" Out="0.03" />
					<Key In="0.005" Out="0.04" />
					<Key In="0.007" Out="0.05" />
					<Key In="0.01" Out="0.06" />
					<Key In="0.05" Out="0.05" />
				</AvgLumi_to_KeyValue>
			</AutoExp>
		</T3ToneMap>
	</Fx>
</Mood>
```
## Sunrise
```xml
<Mood>
	<Light EnableStars="1" Latitude="63" DayTime01="0.56" LocalLightX="0.5" HelperHdrX="1">
		<LAmbient Color="d7e3ff" Scale="0.571" />
		<LDirSun Color="ffefb4" Scale="1.26" />
		<LDirMoon Color="000000" Scale="1" />
		<T3SpecularLocal ScaleIntens="1" ScaleExponent="3" />
		<T3LightMap MaxHDR="2.2" BounceFactor="3" SkyFactor="0.5" SkyUseClouds="1" />
	</Light>
	<Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="1">
		<HdrSun Power="5e+005">
			<Atmo1 Power="200" Color="ffe7ba" Scale="0.0783" />
			<Atmo2 Power="10" Color="fff4d9" Scale="0.121" />
		</HdrSun>
		<Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1" GodLightIntens="0.2" SunThroughIntens="0.5">
			<EdgeLight>
				<Layer0 Power="15" Scale="1" />
				<Layer1 Power="2" Scale="0.7" />
				<Layer2 Power="1" Scale="0.5" />
			</EdgeLight>
		</Clouds>
		<CloudsX2 MinRgb="e9f1ff" MinRgbX="0.4" MaxRgb="fffef8" MaxRgbX="0.58" />
		<CloudsVortex MinRgb="000000" MaxRgb="ffffff" />
		<FogMatter Count="1">
			<Matter0 Id="Forest" Density="0.0005" Color="536c6c" />
		</FogMatter>
	</Atmo>
	<Fog Enabled="1" DepthMin="32" DepthMax="3e+003" Exponant="0.7" IntensMin="0" IntensMax="1" Color="838ca2">
		<Height YBottom="-500" YTop="500" MulBottom="0" MulTop="0.884" />
		<Clouds DepthMax="2e+004" Exponant="1" IntensMax="0.866" />
		<SkyClouds GlobalIntens="0" />
	</Fog>
	<Fx>
		<T3Bloom StreaksIntens="0.2" StreaksAttenuation="0.6">
			<HdrNorm_to_Intens>
				<Key In="0" Out="0" />
				<Key In="1" Out="0" />
				<Key In="1.5" Out="0.8" />
				<Key In="64" Out="0.01" />
			</HdrNorm_to_Intens>
		</T3Bloom>
		<T3ToneMap FilmCurve="Preset3">
			<AutoExp MinExposure="-4" MaxExposure="4" SecondsToMidFalloff="0.3">
				<AvgLumi_to_KeyValue>
					<Key In="0.001" Out="0.03" />
					<Key In="0.005" Out="0.04" />
					<Key In="0.01" Out="0.08" />
					<Key In="0.04" Out="0.11" />
					<Key In="0.07" Out="0.14" />
					<Key In="0.1" Out="0.2" />
					<Key In="0.15" Out="0.24" />
					<Key In="0.2" Out="0.25" />
					<Key In="0.25" Out="0.28" />
					<Key In="0.3" Out="0.3" />
					<Key In="0.4" Out="0.4" />
					<Key In="0.6" Out="0.6" />
					<Key In="1" Out="1" />
					<Key In="1.5" Out="1" />
				</AvgLumi_to_KeyValue>
			</AutoExp>
		</T3ToneMap>
	</Fx>
</Mood>
```
## Sunset
```xml
<Mood>
	<Light EnableStars="1" Latitude="30" DayTime01="0.743" LocalLightX="1" HelperHdrX="1">
		<LAmbient Color="ffe3ed" Scale="0.738" />
		<LDirSun Color="ff8f39" Scale="3" />
		<LDirMoon Color="000000" Scale="1" />
		<T3SpecularLocal ScaleIntens="2" ScaleExponent="2" />
		<T3LightMap MaxHDR="1.5" BounceFactor="2" SkyFactor="0.7" SkyUseClouds="1" />
	</Light>
	<Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="1">
		<HdrSun Power="5e+005">
			<Atmo1 Power="200" Color="ff5f12" Scale="2.97" />
			<Atmo2 Power="1.5" Color="ffaa69" Scale="1.36" />
		</HdrSun>
		<Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1" GodLightIntens="0.05" SunThroughIntens="0.6">
			<EdgeLight>
				<Layer0 Power="12" Scale="4" />
				<Layer1 Power="2" Scale="2" />
				<Layer2 Power="1" Scale="1" />
			</EdgeLight>
		</Clouds>
		<CloudsX2 MinRgb="dadfff" MinRgbX="0.392" MaxRgb="fffdfc" MaxRgbX="0.647" />
		<CloudsVortex MinRgb="000000" MaxRgb="ffffff" />
		<FogMatter Count="1">
			<Matter0 Id="Forest" Density="0.0015" Color="785849" />
		</FogMatter>
	</Atmo>
	<Fog Enabled="1" DepthMin="10" DepthMax="2.5e+003" Exponant="0.6" IntensMin="0" IntensMax="0.858" Color="685d74">
		<Height YBottom="0" YTop="200" MulBottom="0.73" MulTop="1" />
		<Clouds DepthMax="2e+004" Exponant="1.5" IntensMax="0.8" />
		<SkyClouds GlobalIntens="0" />
	</Fog>
	<Fx>
		<T3Bloom StreaksIntens="0.2" StreaksAttenuation="0.7">
			<HdrNorm_to_Intens>
				<Key In="0" Out="0" />
				<Key In="1" Out="0" />
				<Key In="2" Out="0.5" />
				<Key In="64" Out="0.01" />
			</HdrNorm_to_Intens>
		</T3Bloom>
		<T3ToneMap FilmCurve="Preset3">
			<AutoExp MinExposure="-2" MaxExposure="4.5" SecondsToMidFalloff="0.3">
				<AvgLumi_to_KeyValue>
					<Key In="0" Out="0.02" />
					<Key In="0.01" Out="0.045" />
					<Key In="0.05" Out="0.1" />
					<Key In="0.2" Out="0.23" />
					<Key In="0.5" Out="0.4" />
					<Key In="1" Out="0.5" />
				</AvgLumi_to_KeyValue>
			</AutoExp>
		</T3ToneMap>
	</Fx>
</Mood>
```
