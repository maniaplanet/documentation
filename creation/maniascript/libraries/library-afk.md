---
layout: default
title: AFK library
description: AFK players management
tags: maniascript
---

# Purpose
The AFK library manages the players who are AFK on the server. To be considered AFK a player must be spawned and inactive since a defined time. The library can be controlled from the script and/or through XmlRpc.


# Usage
The library is included in the ModeBase by default. If you're creating a full custom mode, add this line at the beginning of your script to use it :
`#Include "Libs/Nadeo/ShootMania/AFK.Script.txt" as AFK`

As most of the other libraries there are a Load() and Unload() functions. They are best called respectively in the `***StartServer***` and `***EndServer***` labels.

To turn on or off the library you must change the value of the `S_AutoManageAFK` from ModeBase. It's at False by default, but some modes like Royal, Siege and Battle turn it on.

The library can be controlled through XmlRpc with the following methods and callbacks.

## Callbacks

##### LibAFK_IsAFK
* Data : An array with the login of the AFK player
* Example : ["Login"]
* Note : This callback is sent when the library detects an AFK player, it will be sent for each call to `ManageAFKPlayers()` until the player is forced into spectator mode.

##### LibAFK_Properties
* Data : An array with the properties of the AFK library
* Example : ["90000", "15000", "10000", "True"]
* Note :
    * IdleTimeLimit -> Time after which a player is considered to be AFK
    * SpawnTimeLimit -> Time after spawn before which a player can't be considered to be AFK
    * CheckInterval -> Time between each AFK check
    * ForceSpec -> Let the library force the AFK player into spectator mode

## Methods

##### LibAFK_SetProperties
* Note : Set the properties of the AFK library. The parameters are in this order: IdleTimeLimit, SpawnTimeLimit, CheckInterval, ForceSpec.
* String : "LibAFK_SetProperties"
* Array : ["90000", "15000", "10000", "True"]

##### LibAFK_GetProperties
* Note : Get the properties of the AFK library. This will sent the `LibAFK_Properties` callback in return.
* String1 : "LibAFK_GetProperties"
* String2 : ""


# Functions



{% highlight js %}
Void Load()

Load the library, must be called once at the beginning of the script
{% endhighlight %}




{% highlight js %}
Void Unload()

Unload the library, must be called once at the end of the script
{% endhighlight %}




{% highlight js %}
Boolean IsAFK(CSmPlayer _Player, Integer _MaxIdleDuration, Integer _SpawnTimeMercy)

Check if a player is AFK

@param  _Player           The player to check
@param  _MaxIdleDuration  Time of inactivity to be considered AFK
@param  _SpawnTimeMercy   Time after spawning during which one can not be considered AFK
{% endhighlight %}




{% highlight js %}
Void ManageAFKPlayers(Integer _MaxIdleDuration, Integer _SpawnTimeMercy)

Try to force AFK players to spectators

@param  _MaxIdleDuration  In milliSec., time of inactivity to be considered AFK
@param  _SpawnTimeMercy   In milliSec., time after spawning during which one can not be considered AFK
{% endhighlight %}




{% highlight js %}
Void ManageAFKPlayers()

Try to force AFK players to spectators using the default _MaxIdleDuration and _SpawnTimeMercy values
{% endhighlight %}




{% highlight js %}
Void AutoManageAFKPlayers()

Try to force AFK players to spectators, this function use the properties defined by the script or XmlRpc
{% endhighlight %}




{% highlight js %}
Void SetIdleTimeLimit(Integer _Time)

Update the idle time limit

@param  _Time   The new time limit
{% endhighlight %}




{% highlight js %}
Void SetSpawnTimeLimit(Integer _Time)

Update the spawn mercy time

@param  _Time   The new spawn mercy time
{% endhighlight %}




{% highlight js %}
Void SetCheckInterval(Integer _Interval)

Update the check time interval

@param  _Interval   The new time interval
{% endhighlight %}




{% highlight js %}
Void SetForceSpec(Boolean _ForceSpec)

Update the force spec value

@param  _Interval   The new force spec value
{% endhighlight %}




{% highlight js %}
Void XmlRpcLoop()

Manage the XmlRpc events
{% endhighlight %}
