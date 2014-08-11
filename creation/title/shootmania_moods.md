---
layout: default
title: Shootmania mood settings list
description: List the settings of all Shootmania default moods
tags:
- creation
- title
---

# ShootMania Storm

## Land/Day
{% highlight xml %}
<Mood>
  <Light EnableStars="0" Latitude="5" DayTime01="0.56" LocalLightX="1" HelperHdrX="0.7">
    <LAmbient Color="dce5ff" Scale="0.22323"/>
    <LDirSun Color="fff7ea" Scale="0.685014"/>
    <LDirMoon Color="000000" Scale="1"/>
    <T3SpecularLocal ScaleIntens="0.5" ScaleExponent="1"/>
    <T3LightMap MaxHDR="2" BounceFactor="1.7" SkyFactor="1.2" SkyUseClouds="1"/>
  </Light>
  <Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="1.2">
    <HdrSun Power="1">
      <Atmo1 Power="500" Color="ffebd4" Scale="1.10002"/>
      <Atmo2 Power="10" Color="ffead2" Scale="0.286006"/>
    </HdrSun>
    <Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1.00002" GodLightIntens="0.05" SunThroughIntens="0.01">
      <EdgeLight>
        <Layer0 Power="128" Scale="2"/>
        <Layer1 Power="4" Scale="1"/>
        <Layer2 Power="1" Scale="0.25"/>
      </EdgeLight>
    </Clouds>
    <CloudsX2 MinRgb="f1f4ff" MinRgbX="0.200004" MaxRgb="ffffff" MaxRgbX="0.659014"/>
    <CloudsVortex MinRgb="32383d" MaxRgb="5a6878"/>
    <FogMatter Count="0"/>
  </Atmo>
  <Fog Enabled="1" DepthMin="12" DepthMax="3000" Exponant="0.5" IntensMin="0" IntensMax="0.9" Color="414344">
    <Height YBottom="-50" YTop="400" MulBottom="1" MulTop="1"/>
    <Clouds DepthMax="45000" Exponant="1.2" IntensMax="0.9"/>
    <SkyClouds GlobalIntens="0"/>
  </Fog>
  <Fx>
    <T3Bloom StreaksIntens="0.15" StreaksAttenuation="0.5">
      <HdrNorm_to_Intens>
        <Key In="0" Out="0"/>
        <Key In="0.75" Out="0"/>
        <Key In="1.5" Out="0.7"/>
        <Key In="64" Out="0.01"/>
      </HdrNorm_to_Intens>
    </T3Bloom>
    <T3ToneMap FilmCurve="Preset3">
      <AutoExp MinExposure="-1" MaxExposure="6" SecondsToMidFalloff="0.4">
        <AvgLumi_to_KeyValue>
          <Key In="0" Out="0.06"/>
          <Key In="0.025" Out="0.1"/>
          <Key In="0.05" Out="0.15"/>
          <Key In="0.18" Out="0.5"/>
          <Key In="0.2" Out="0.55"/>
        </AvgLumi_to_KeyValue>
      </AutoExp>
    </T3ToneMap>
    <ColorGrading FileName="" Intensity="1"/>
  </Fx>
</Mood>
{% endhighlight %}

## Land/Night
{% highlight xml %}
<Mood>
  <Light EnableStars="1" Latitude="48" DayTime01="0.15" LocalLightX="0.9" HelperHdrX="0.25">
    <LAmbient Color="bbccff" Scale="0.0271536"/>
    <LDirSun Color="000000" Scale="1"/>
    <LDirMoon Color="91a4ff" Scale="0.0887009"/>
    <T3SpecularLocal ScaleIntens="2" ScaleExponent="1"/>
    <T3LightMap MaxHDR="1.4" BounceFactor="2" SkyFactor="1" SkyUseClouds="1"/>
  </Light>
  <Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="1">
    <HdrSun Power="10000">
      <Atmo1 Power="20" Color="8ea3ff" Scale="0.105001"/>
      <Atmo2 Power="2" Color="8aa6ff" Scale="0.0481005"/>
    </HdrSun>
    <Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1.00001" GodLightIntens="0" SunThroughIntens="0.75">
      <EdgeLight>
        <Layer0 Power="32" Scale="20"/>
        <Layer1 Power="8" Scale="4"/>
        <Layer2 Power="2" Scale="2"/>
      </EdgeLight>
    </Clouds>
    <CloudsX2 MinRgb="ffffff" MinRgbX="0.208002" MaxRgb="ffffff" MaxRgbX="0.812008"/>
    <CloudsVortex MinRgb="060709" MaxRgb="171726"/>
    <FogMatter Count="0"/>
  </Atmo>
  <Fog Enabled="1" DepthMin="16" DepthMax="4000" Exponant="0.7" IntensMin="0" IntensMax="0.95" Color="0e0e12">
    <Height YBottom="-500" YTop="800" MulBottom="0.898" MulTop="0.372"/>
    <Clouds DepthMax="45000" Exponant="1.3" IntensMax="0.95"/>
    <SkyClouds GlobalIntens="0"/>
  </Fog>
  <Fx>
    <T3Bloom StreaksIntens="0.2" StreaksAttenuation="0.6">
      <HdrNorm_to_Intens>
        <Key In="0" Out="0"/>
        <Key In="1.5" Out="0"/>
        <Key In="2" Out="0.4"/>
        <Key In="6" Out="0.45"/>
        <Key In="64" Out="0.01"/>
      </HdrNorm_to_Intens>
    </T3Bloom>
    <T3ToneMap FilmCurve="Preset3">
      <AutoExp MinExposure="0" MaxExposure="4" SecondsToMidFalloff="0.4">
        <AvgLumi_to_KeyValue>
          <Key In="0.001" Out="0.02"/>
          <Key In="0.002" Out="0.025"/>
          <Key In="0.005" Out="0.03"/>
          <Key In="0.025" Out="0.07"/>
        </AvgLumi_to_KeyValue>
      </AutoExp>
    </T3ToneMap>
    <ColorGrading FileName="" Intensity="1"/>
  </Fx>
</Mood>
{% endhighlight %}

## Land/Sunrise
{% highlight xml %}
<Mood>
  <Light EnableStars="0" Latitude="15" DayTime01="0.519" LocalLightX="0.85" HelperHdrX="0.4">
    <LAmbient Color="ffe5d4" Scale="0.090583"/>
    <LDirSun Color="ffe3c4" Scale="0.445004"/>
    <LDirMoon Color="000000" Scale="1"/>
    <T3SpecularLocal ScaleIntens="0.35" ScaleExponent="1"/>
    <T3LightMap MaxHDR="1.3" BounceFactor="2" SkyFactor="0.9" SkyUseClouds="1"/>
  </Light>
  <Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="1">
    <HdrSun Power="300000">
      <Atmo1 Power="30" Color="cbe8ff" Scale="0.474005"/>
      <Atmo2 Power="5" Color="ffb368" Scale="0.238002"/>
    </HdrSun>
    <Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1.00001" GodLightIntens="0.05" SunThroughIntens="2">
      <EdgeLight>
        <Layer0 Power="32" Scale="4"/>
        <Layer1 Power="8" Scale="1"/>
        <Layer2 Power="4" Scale="1"/>
      </EdgeLight>
    </Clouds>
    <CloudsX2 MinRgb="e1e6ff" MinRgbX="0.267003" MaxRgb="ffffff" MaxRgbX="0.773008"/>
    <CloudsVortex MinRgb="302723" MaxRgb="554a42"/>
    <FogMatter Count="0"/>
  </Atmo>
  <Fog Enabled="1" DepthMin="4" DepthMax="2500" Exponant="0.5" IntensMin="0" IntensMax="0.896" Color="33363f">
    <Height YBottom="-50" YTop="300" MulBottom="0.85" MulTop="0.672"/>
    <Clouds DepthMax="30000" Exponant="0.7" IntensMax="0.87"/>
    <SkyClouds GlobalIntens="0"/>
  </Fog>
  <Fx>
    <T3Bloom StreaksIntens="0.2" StreaksAttenuation="0.7">
      <HdrNorm_to_Intens>
        <Key In="0" Out="0"/>
        <Key In="2" Out="0"/>
        <Key In="4" Out="0.65"/>
        <Key In="8" Out="0.8"/>
        <Key In="64" Out="0.01"/>
      </HdrNorm_to_Intens>
    </T3Bloom>
    <T3ToneMap FilmCurve="Preset3">
      <AutoExp MinExposure="-4" MaxExposure="4" SecondsToMidFalloff="0.25">
        <AvgLumi_to_KeyValue>
          <Key In="0.005" Out="0.07"/>
          <Key In="0.01" Out="0.07"/>
          <Key In="0.03" Out="0.15"/>
          <Key In="0.1" Out="0.25"/>
        </AvgLumi_to_KeyValue>
      </AutoExp>
    </T3ToneMap>
    <ColorGrading FileName="" Intensity="1"/>
  </Fx>
</Mood>
{% endhighlight %}

## Land/Sunset
{% highlight xml %}
<Mood>
  <Light EnableStars="1" Latitude="60" DayTime01="0.67" LocalLightX="1" HelperHdrX="0.5">
    <LAmbient Color="ffc8bd" Scale="0.337167"/>
    <LDirSun Color="ffbb9c" Scale="0.768016"/>
    <LDirMoon Color="000000" Scale="1"/>
    <T3SpecularLocal ScaleIntens="1" ScaleExponent="1"/>
    <T3LightMap MaxHDR="1.7" BounceFactor="2" SkyFactor="1" SkyUseClouds="0"/>
  </Light>
  <Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="1.5">
    <HdrSun Power="15000">
      <Atmo1 Power="150" Color="ffb33f" Scale="0.847016"/>
      <Atmo2 Power="4" Color="ff924a" Scale="0.428008"/>
    </HdrSun>
    <Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1.00002" GodLightIntens="0.05" SunThroughIntens="3">
      <EdgeLight>
        <Layer0 Power="48" Scale="16"/>
        <Layer1 Power="8" Scale="8"/>
        <Layer2 Power="2" Scale="2"/>
      </EdgeLight>
    </Clouds>
    <CloudsX2 MinRgb="ffffff" MinRgbX="0.153004" MaxRgb="ffffff" MaxRgbX="0.827016"/>
    <CloudsVortex MinRgb="453932" MaxRgb="80604d"/>
    <FogMatter Count="0"/>
  </Atmo>
  <Fog Enabled="1" DepthMin="32" DepthMax="4500" Exponant="0.5" IntensMin="0" IntensMax="0.96" Color="463a35">
    <Height YBottom="-100" YTop="400" MulBottom="0.8" MulTop="1"/>
    <Clouds DepthMax="45000" Exponant="1" IntensMax="0.9"/>
    <SkyClouds GlobalIntens="0"/>
  </Fog>
  <Fx>
    <T3Bloom StreaksIntens="0.2" StreaksAttenuation="0.7">
      <HdrNorm_to_Intens>
        <Key In="0" Out="0"/>
        <Key In="1.5" Out="0"/>
        <Key In="3" Out="0.3"/>
        <Key In="4" Out="1"/>
        <Key In="64" Out="0.01"/>
      </HdrNorm_to_Intens>
    </T3Bloom>
    <T3ToneMap FilmCurve="Preset3">
      <AutoExp MinExposure="-2" MaxExposure="4.5" SecondsToMidFalloff="0.25">
        <AvgLumi_to_KeyValue>
          <Key In="0" Out="0.03"/>
          <Key In="0.005" Out="0.03"/>
          <Key In="0.01" Out="0.07"/>
          <Key In="0.05" Out="0.13"/>
          <Key In="0.2" Out="0.245"/>
          <Key In="0.5" Out="0.4"/>
          <Key In="1" Out="0.5"/>
        </AvgLumi_to_KeyValue>
      </AutoExp>
    </T3ToneMap>
    <ColorGrading FileName="" Intensity="1"/>
  </Fx>
</Mood>
{% endhighlight %}

## Water/Day
{% highlight xml %}
<Mood>
  <Light EnableStars="1" Latitude="45" DayTime01="0.56" LocalLightX="1" HelperHdrX="0.8">
    <LAmbient Color="cee3ff" Scale="1.18933"/>
    <LDirSun Color="ffebbf" Scale="1.80008"/>
    <LDirMoon Color="000000" Scale="1"/>
    <T3SpecularLocal ScaleIntens="1" ScaleExponent="1.2"/>
    <T3LightMap MaxHDR="2.5" BounceFactor="2" SkyFactor="1" SkyUseClouds="1"/>
  </Light>
  <Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="2.5">
    <HdrSun Power="80000">
      <Atmo1 Power="10" Color="95cfff" Scale="1.12004"/>
      <Atmo2 Power="2" Color="89b8ff" Scale="0.294012"/>
    </HdrSun>
    <Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1.00004" GodLightIntens="0.08" SunThroughIntens="0.75">
      <EdgeLight>
        <Layer0 Power="16" Scale="2"/>
        <Layer1 Power="2" Scale="1.5"/>
        <Layer2 Power="1" Scale="1.2"/>
      </EdgeLight>
    </Clouds>
    <CloudsX2 MinRgb="ffffff" MinRgbX="0.380016" MaxRgb="ffffff" MaxRgbX="0.627024"/>
    <CloudsVortex MinRgb="000000" MaxRgb="ffffff"/>
    <FogMatter Count="0"/>
  </Atmo>
  <Fog Enabled="1" DepthMin="16" DepthMax="4500" Exponant="0.7" IntensMin="0" IntensMax="0.846" Color="92b5dc">
    <Height YBottom="-50" YTop="400" MulBottom="0.914" MulTop="0.686"/>
    <Clouds DepthMax="55000" Exponant="0.8" IntensMax="0.518"/>
    <SkyClouds GlobalIntens="0"/>
  </Fog>
  <Fx>
    <T3Bloom StreaksIntens="0.2" StreaksAttenuation="0.7">
      <HdrNorm_to_Intens>
        <Key In="0" Out="0"/>
        <Key In="2" Out="0.001"/>
        <Key In="4" Out="0.6"/>
        <Key In="48" Out="0.001"/>
      </HdrNorm_to_Intens>
    </T3Bloom>
    <T3ToneMap FilmCurve="Preset3">
      <AutoExp MinExposure="-2" MaxExposure="4.5" SecondsToMidFalloff="0.3">
        <AvgLumi_to_KeyValue>
          <Key In="0.001" Out="0.06"/>
          <Key In="0.005" Out="0.06"/>
          <Key In="0.01" Out="0.04"/>
          <Key In="0.02" Out="0.05"/>
          <Key In="0.03" Out="0.08"/>
          <Key In="0.06" Out="0.09"/>
          <Key In="0.1" Out="0.11"/>
          <Key In="0.25" Out="0.25"/>
          <Key In="0.35" Out="0.3"/>
          <Key In="0.5" Out="0.35"/>
          <Key In="0.7" Out="0.4"/>
          <Key In="1.4" Out="0.6"/>
        </AvgLumi_to_KeyValue>
      </AutoExp>
    </T3ToneMap>
    <ColorGrading FileName="" Intensity="1"/>
  </Fx>
</Mood>
{% endhighlight %}

## Water/Night
{% highlight xml %}
<Mood>
  <Light EnableStars="1" Latitude="48" DayTime01="0.15" LocalLightX="1" HelperHdrX="0.2">
    <LAmbient Color="dddfff" Scale="0.0706324"/>
    <LDirSun Color="000000" Scale="1"/>
    <LDirMoon Color="95b1ff" Scale="0.0168758"/>
    <T3SpecularLocal ScaleIntens="2" ScaleExponent="2"/>
    <T3LightMap MaxHDR="1.4" BounceFactor="3" SkyFactor="2" SkyUseClouds="1"/>
  </Light>
  <Atmo MoonHdrScale="0.5" FxSmSelfIllumScaleGamePlay="2">
    <HdrSun Power="10000">
      <Atmo1 Power="50" Color="a7afff" Scale="0.122102"/>
      <Atmo2 Power="1" Color="9db0ff" Scale="0.0193221"/>
    </HdrSun>
    <Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1.00003" GodLightIntens="0" SunThroughIntens="0.5">
      <EdgeLight>
        <Layer0 Power="10" Scale="40"/>
        <Layer1 Power="2" Scale="0.5"/>
        <Layer2 Power="1" Scale="0.2"/>
      </EdgeLight>
    </Clouds>
    <CloudsX2 MinRgb="ffffff" MinRgbX="0.208006" MaxRgb="ffffff" MaxRgbX="0.812024"/>
    <CloudsVortex MinRgb="060709" MaxRgb="171726"/>
    <FogMatter Count="0"/>
  </Atmo>
  <Fog Enabled="1" DepthMin="8" DepthMax="500" Exponant="0.6" IntensMin="0" IntensMax="0.872" Color="1f1f2c">
    <Height YBottom="-50" YTop="300" MulBottom="0.91" MulTop="0.5"/>
    <Clouds DepthMax="40000" Exponant="1" IntensMax="0.9"/>
    <SkyClouds GlobalIntens="0"/>
  </Fog>
  <Fx>
    <T3Bloom StreaksIntens="0.8" StreaksAttenuation="0.5">
      <HdrNorm_to_Intens>
        <Key In="0" Out="0"/>
        <Key In="2" Out="0"/>
        <Key In="4" Out="0.1"/>
        <Key In="5" Out="0.5"/>
        <Key In="30" Out="0.01"/>
      </HdrNorm_to_Intens>
    </T3Bloom>
    <T3ToneMap FilmCurve="Preset3">
      <AutoExp MinExposure="0" MaxExposure="4" SecondsToMidFalloff="0.4">
        <AvgLumi_to_KeyValue>
          <Key In="0.001" Out="0.01"/>
          <Key In="0.0025" Out="0.012"/>
          <Key In="0.006" Out="0.028"/>
          <Key In="0.02" Out="0.1"/>
        </AvgLumi_to_KeyValue>
      </AutoExp>
    </T3ToneMap>
    <ColorGrading FileName="" Intensity="1"/>
  </Fx>
</Mood>
{% endhighlight %}

## Water/Sunrise
{% highlight xml %}
<Mood>
  <Light EnableStars="1" Latitude="45" DayTime01="0.525" LocalLightX="1" HelperHdrX="0.65">
    <LAmbient Color="cfd8ff" Scale="0.430004"/>
    <LDirSun Color="ffcd82" Scale="1.80008"/>
    <LDirMoon Color="000000" Scale="1"/>
    <T3SpecularLocal ScaleIntens="1.2" ScaleExponent="2"/>
    <T3LightMap MaxHDR="2.2" BounceFactor="3" SkyFactor="0.5" SkyUseClouds="1"/>
  </Light>
  <Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="3">
    <HdrSun Power="300000">
      <Atmo1 Power="50" Color="ffcc32" Scale="1.00004"/>
      <Atmo2 Power="5" Color="ffe5a8" Scale="0.216925"/>
    </HdrSun>
    <Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1.00004" GodLightIntens="0.1" SunThroughIntens="0.8">
      <EdgeLight>
        <Layer0 Power="15" Scale="1"/>
        <Layer1 Power="1" Scale="1"/>
        <Layer2 Power="1" Scale="1"/>
      </EdgeLight>
    </Clouds>
    <CloudsX2 MinRgb="e9f1ff" MinRgbX="0.400016" MaxRgb="fffef8" MaxRgbX="0.580024"/>
    <CloudsVortex MinRgb="000000" MaxRgb="ffffff"/>
    <FogMatter Count="0"/>
  </Atmo>
  <Fog Enabled="1" DepthMin="8" DepthMax="3000" Exponant="0.5" IntensMin="0" IntensMax="0.808" Color="6c6d86">
    <Height YBottom="-50" YTop="400" MulBottom="0.944" MulTop="0.432"/>
    <Clouds DepthMax="50000" Exponant="1" IntensMax="0.688"/>
    <SkyClouds GlobalIntens="0.218"/>
  </Fog>
  <Fx>
    <T3Bloom StreaksIntens="0.2" StreaksAttenuation="0.6">
      <HdrNorm_to_Intens>
        <Key In="0" Out="0"/>
        <Key In="3" Out="0"/>
        <Key In="5" Out="0.5"/>
        <Key In="64" Out="0.01"/>
      </HdrNorm_to_Intens>
    </T3Bloom>
    <T3ToneMap FilmCurve="Preset3">
      <AutoExp MinExposure="-4" MaxExposure="4" SecondsToMidFalloff="0.3">
        <AvgLumi_to_KeyValue>
          <Key In="0.001" Out="0.03"/>
          <Key In="0.005" Out="0.04"/>
          <Key In="0.01" Out="0.08"/>
          <Key In="0.04" Out="0.11"/>
          <Key In="0.07" Out="0.14"/>
          <Key In="0.1" Out="0.2"/>
          <Key In="0.15" Out="0.24"/>
          <Key In="0.2" Out="0.25"/>
          <Key In="0.25" Out="0.28"/>
          <Key In="0.3" Out="0.3"/>
          <Key In="0.4" Out="0.4"/>
          <Key In="0.6" Out="0.6"/>
          <Key In="1" Out="1"/>
          <Key In="1.5" Out="1"/>
        </AvgLumi_to_KeyValue>
      </AutoExp>
    </T3ToneMap>
    <ColorGrading FileName="" Intensity="1"/>
  </Fx>
</Mood>
{% endhighlight %}

## Water/Sunset
{% highlight xml %}
<Mood>
  <Light EnableStars="1" Latitude="60" DayTime01="0.67" LocalLightX="1" HelperHdrX="0.5">
    <LAmbient Color="ffd8ec" Scale="0.18115"/>
    <LDirSun Color="ffbb9c" Scale="0.768016"/>
    <LDirMoon Color="000000" Scale="1"/>
    <T3SpecularLocal ScaleIntens="1" ScaleExponent="1"/>
    <T3LightMap MaxHDR="1.7" BounceFactor="2" SkyFactor="1" SkyUseClouds="1"/>
  </Light>
  <Atmo MoonHdrScale="1" FxSmSelfIllumScaleGamePlay="1.5">
    <HdrSun Power="20000">
      <Atmo1 Power="50" Color="ff974a" Scale="0.776016"/>
      <Atmo2 Power="2" Color="ff654a" Scale="0.428008"/>
    </HdrSun>
    <Clouds MinRgb="000000" MinRgbX="1" MaxRgb="ffffff" MaxRgbX="1.00002" GodLightIntens="0.05" SunThroughIntens="3">
      <EdgeLight>
        <Layer0 Power="48" Scale="8"/>
        <Layer1 Power="4" Scale="6"/>
        <Layer2 Power="1" Scale="4"/>
      </EdgeLight>
    </Clouds>
    <CloudsX2 MinRgb="ffffff" MinRgbX="0.153004" MaxRgb="ffffff" MaxRgbX="0.827016"/>
    <CloudsVortex MinRgb="453932" MaxRgb="80604d"/>
    <FogMatter Count="0"/>
  </Atmo>
  <Fog Enabled="1" DepthMin="32" DepthMax="4500" Exponant="0.5" IntensMin="0" IntensMax="0.96" Color="403d47">
    <Height YBottom="-10" YTop="400" MulBottom="1" MulTop="0.744"/>
    <Clouds DepthMax="40000" Exponant="0.8" IntensMax="0.97"/>
    <SkyClouds GlobalIntens="0"/>
  </Fog>
  <Fx>
    <T3Bloom StreaksIntens="0.2" StreaksAttenuation="0.7">
      <HdrNorm_to_Intens>
        <Key In="0" Out="0"/>
        <Key In="1.5" Out="0"/>
        <Key In="3" Out="0.3"/>
        <Key In="4" Out="1"/>
        <Key In="64" Out="0.01"/>
      </HdrNorm_to_Intens>
    </T3Bloom>
    <T3ToneMap FilmCurve="Preset3">
      <AutoExp MinExposure="-2" MaxExposure="4.5" SecondsToMidFalloff="0.25">
        <AvgLumi_to_KeyValue>
          <Key In="0" Out="0.03"/>
          <Key In="0.005" Out="0.03"/>
          <Key In="0.01" Out="0.07"/>
          <Key In="0.05" Out="0.13"/>
          <Key In="0.2" Out="0.245"/>
          <Key In="0.5" Out="0.4"/>
          <Key In="1" Out="0.5"/>
        </AvgLumi_to_KeyValue>
      </AutoExp>
    </T3ToneMap>
    <ColorGrading FileName="" Intensity="1"/>
  </Fx>
</Mood>
{% endhighlight %}
