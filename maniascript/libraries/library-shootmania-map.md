---
layout: static
title: The ShootMania Map library
description: How to use the ShootMania Map library in your scripts
---

# Purpose
The map library mainly allow the users to easily manipulate the landmarks in a ShootMania map. It regroup a lot of functions to access the landmarks and their component depending on their type, tag or order.


# Usage
To use this library add this line at the beginning of your script:
`#Include "Libs/Nadeo/ShootMania/Map.Script.txt" as CustomUI`

This lib doesn't have a `Load()` and  `Unload()` functions and can be used as is.

If the MapType used to validate the Map saved a version number in the map you can use the `GetMapTypeVersion()` function to retrieve it. The function doesn't take any parameter and returns the version as an Integer.

Then you have several function to access the landmarks in the map:

* `CSmMapLandmark GetLandmark(Text _Tag, Integer _Order)`
* `CSmMapLandmark GetLandmarkBase(Text _Tag, Integer _Order)`
* `CSmMapLandmark GetLandmarkGate(Text _Tag, Integer _Order)`
* `CSmMapLandmark GetLandmarkGauge(Text _Tag, Integer _Order)`
* `CSmMapLandmark GetLandmarkSector(Text _Tag, Integer _Order)`
* `CSmMapLandmark GetLandmarkPlayerSpawn(Text _Tag, Integer _Order)`
* `CSmMapLandmark GetLandmarkBotPath(Text _Tag, Integer _Order)`
* `CSmMapLandmark GetLandmarkObjectAnchor(Text _Tag, Integer _Order)`
* `CSmMapLandmark GetLandmarkCapturable(Text _Tag, Integer _Order)`
All this functions will return the first landmark matching corresponding Component (Base, Sector, Gauge, ...), Tag and Order. So if several landmarks share the same properties, only the first in the MapLandmarks array will be returned.

You also have functions to get direct access to the landmarks components:

* `CSmMapBase GetBase(Text _Tag, Integer _Order)`
* `CSmMapGate GetGate(Text _Tag, Integer _Order)`
* `CSmMapGauge GetGauge(Text _Tag, Integer _Order)`
* `CSmMapSector GetSector(Text _Tag, Integer _Order)`
* `CSmMapPlayerSpawn GetPlayerSpawn(Text _Tag, Integer _Order)`
* `CSmMapBotPath GetBotPath(Text _Tag, Integer _Order)`
* `CSmMapObjectAnchor GetObjectAnchor(Text _Tag, Integer _Order)`
This functions work as the ones above, but they return the first landmark component matching the criteria instead of the landmark itself.

Eventually you can use this functions to now how many landmarks of each type are there on the map:

* `Integer GetLandmarksCount()`
* `Integer GetBasesCount()`
* `Integer GetGatesCount()`
* `Integer GetGaugesCount()`
* `Integer GetSectorsCount()`
* `Integer GetPlayerSpawnsCount()`
* `Integer GetBotPathsCount()`
* `Integer GetObjectAnchorsCount()`
* `Integer GetCapturablesCount()`
These functions are pretty straightforward and simply return the number of landmarks of the requested type found as an Integer.