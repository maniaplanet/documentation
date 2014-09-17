---
layout: default
title: Landmarks
description: Landmarks in ManiaScript
tags:
- creation
- maniascript
---

## Introduction

With the latest version of ManiaPlanet the way "interactive" blocks are managed in ManiaScript changed. Several classes like `CSmBlockPole` or `CSmBlockSpawn` are now deprecated and replaced by a new one: `CSmMapLandmark`.
This new class represent a kind of meta object that can contains several components like spawn, gauge, gate, etc.


## Deprecated

All this classes are now considered deprecated and will be removed from the ManiaScript API at some points (in the far future).

* `CSmBase`
* `CSmBlock`
* `CSmBlockPole`
* `CSmBlockSpawn`
* `CSmScriptBotPath`
* `CSmGauge`
* `CSmLandmark`
* `CSmObjectAnchor `
* `CSmSector`


## Landmark structure

A landmark have the following components:
{% highlight text %}
CSmMapLandmark
|-- (Text) Tag
|-- (Integer) Order
|-- (Vec3) Position
|-- (CSmMapBase) Base
|-- (CSmMapGate) Gate
|-- (CSmMapGauge) Gauge
|-- (CSmMapSector) Sector
|-- (CSmMapPlayerSpawn) PlayerSpawn
|-- (CSmMapBotPath) BotPath
|-- (CSmMapObjectAnchor) ObjectAnchor
{% endhighlight %}
All the members of the `CSmLandmark` class (`Tag`, `Order` and `Position`) are now in the `CSmMapLandmark` class at the exception of `DirFront` which is removed.
With the introduction of custom objects import, the landmarks are more versatile than before. A player can create a spawn block combined with a gauge and a sector and then write a game mode where this spawn must be captured before being able to spawn players.
All the components of a landmark are optional. In the above example you'll find a value in `Gauge`, `Sector` and `PlayerSpawn` but `Null` in the others components of the landmark.
So when going through a landmark array, be sure to check if the component you're trying to access is `Null` or not before using it.

The default ShootMania blocks have the following components:

* Pole and checkpoint: `Base`, `Gauge`, `Sector`
* Gate : `Base`, `Gauge`, `Sector`, `Gate`
* Spawn : `Base`, `PlayerSpawn`
* Item : `ObjectAnchor`
* Bot path : `BotPath`


## Working with landmarks

When working in the `CSmMode` or `CSmMlScriptIngame` context you now have access to several arrays listing different kinds of landmarks.

* `MapLandmarks`
* `MapLandmarks_PlayerSpawn`
* `MapLandmarks_Gauge`
* `MapLandmarks_BotPath`
* `MapLandmarks_ObjectAnchor`
* `MapLandmarks_Gate`

Their names should be quite explicit. `MapLandmarks` contains all the landmarks while the others contain landmarks with at least one specific component: `PlayerSpawn`, `Gauge`, `BotPath`, `ObjectAnchor` or `Gate`. So if you go through the `MapLandmarks_Gauge` array you could find poles, gates or custom objects with a `Gauge`.
All these arrays contain objects of class `CSmMapLandmarks` and not the specified component. So in `MapLandmarks_PlayerSpawn` you'll find objects with the class `CSmMapLandmark` and not `CSmMapPlayerSpawn`.

Beside these arrays you can also use the ShootMania/Map library to find and access the landmarks of the current map. You can find its documentation [here]({{ site.docurl }}/creation/maniascript/libraries/library-shootmania-map.html).


## Converting old modes

If your mode uses some deprecated elements it should continue to work without any errors. But if you try to compile it again you'll receive a warning suggesting to replace the deprecated variables by their new counterparts.
`BlockPoles` is now replaced by the `MapLandmarks_Gauge` array, `BlockSpawns` by `MapLandmarks_PlayerSpawn` and `Bases` by `MapBases`. In most cases just updating the variables is enough, but in the case of the poles it will need a little more work for several reasons.

Until now the Captured variable was located in the `CSmBlockPole` class. Now this variable can be found in `CSmMapGauge` and not in `CSmMapLandmark`. It's a common mistake at first.

You should also be cautious on the content of the MapLandmarks_XXX arrays. By example in `BlockPoles` you had only the poles listed, but in `MapLandmarks_Gauge` you can find the poles, the gates and maybe some custom objects. You can't do something like that safely:
{% highlight text %}
foreach (Landmark in MapLandmarks_Gauge) {
  if (Landmark.Sector.PlayersIds.count > 0) {
    // Capture ...
  }
}
{% endhighlight %}
The Sector component of the landmark can be Null and you're not certain that it is really a pole. So you should check that Sector is not Null and/or check the Tag of the landmark to be sure it is a pole.

The `BlockPole` variable of the `CSmPlayer` class is replaced by `CapturedLandmark` which contains the landmark on which the player is. This Landmark must have a valid `Sector` to detect the presence of the player.

The `BlockPole` variable of the `CSmModeEvent` class is replaced by `Landmark` which contains the landmark associated to the gauge that was captured.
