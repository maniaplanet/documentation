---
layout: static
title: Markers library 
description: Simplify the management of 3d markers
---

# Purpose
The Markers library ease the creation and management of markers for the HUD and the minimap.

# Usage
Add this line at the beginning of your game mode script to use it :
`#Include "Libs/Nadeo/Markers.Script.txt" as Markers`
Then call the `Load()`and `Unload()`functions respectively in the `***StartServer***` and `***EndServer***` labels.

The library uses the `MarkersXML` variable from `CUIConfig` to add the markers. It has a specificity in comparison to the others CUIConfig variables. The values of `MarkersXML` from `UIAll` and from the player `UI` aren't merged together. Instead the player value will override the global one. SO if you add some markers in the global scope and then add a marker to a single player, this player will only see this marker.

A marker is an XML node that can be customized with different attributes :
{% highlight xml %}
<marker label="My Label" pos="0 0 0" playerlogin="SomePlayerLogin" objectid="#123" box="1 5 1" gauge="0.5" color="f00" imageurl="http://www.example.com/image.png" distmax="100" isturning="1" visibility="always" minimapvisibility="always" manialinkframeid="MyFrameId" />
{% endhighlight %}
* label : a text to display in the marker.
* pos : the position of the marker in the world.
* playerlogin : instead of giving a fixed position you can use a player login, the marker will follow the player with the corresponding login.
* objectid : instead of giving a fixed position you can use an object id, the marker will follow the object with the corresponding id.
* box : add an offset to the marker position. It's useful if you want to display a marker above the head of a player by example.
* gauge : display a gauge in the marker. The value ranges from 0 to 1.
* color : change the color of the marker's background.
* imageurl : replace the default marker by an image.
* distmax : hide the markers that are further that this distance from the player.
* isturning : used only on the minimap, the marker rotate to follow the yaw of the associated player
* visibility : visibility of the marker in the hud, can have the folowing values : Never, Always, WhenInFrustum, WhenVisible or WhenInMiddleOfScreen.
* minimapvisibility : visibility of the marker on the minimap, can have the following values : Never, Always or WhenInFrame.
* manialinkframeid : id of a ManiaLink frame from the Markers layer.

By default the library will remove any attribute from your marker that is not in the above list. If you want to add some customs attributes you'll have to add them to the available list with the AddAttribute() function.

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
Void Add(Text _Marker, CUIConfig _UI)

Add a marker to a specific UI

@param  _Marker   The marker to add
@param  _UI       The UI that will receive the marker
{% endhighlight %}




{% highlight js %} 
Void Add(Text _Marker)

Add a marker to the global UI

@param  _Marker   The marker to add
{% endhighlight %}




{% highlight js %} 
Void Add(Text _Marker, CPlayer _Player)

Add a marker to a player

@param  _Marker   The marker to add
@param  _Player   The player that will receive the marker
{% endhighlight %}




{% highlight js %} 
Void Add(Text _Marker, Text _Manialink)

Create a marker associated with a manialink from the Markers layer. The <marker /> must contain a valid "manialinkframeid" parameter as well as the manialink.

@param  _Marker     The marker to add
@param  _Manialink  The manialink to associate
{% endhighlight %}




{% highlight js %} 
AddManialink(Text _Id, Text _Manialink)

Add a manialink in the layer Markers with the given manialinkframeid

@param  _Id         The manialinkframeid
@param  _Manialink  The manialink to add
{% endhighlight %}




{% highlight js %} 
Void Remove(Text _Marker, CUIConfig _UI)

Remove a marker from an UI

@param  _Marker   The marker to remove
@param  _UI       The UI from which the marker will be removed
{% endhighlight %}




{% highlight js %} 
Void Remove(Text _Marker)

Remove a marker from the global UI

@param  _Marker   The marker to remove
{% endhighlight %}




{% highlight js %} 
Void Remove(Text _Marker, CPlayer _Player)

Remove a marker from a player

@param  _Marker   The marker to remove
@param  _Player   The player from which the marker will be removed
{% endhighlight %}




{% highlight js %} 
Void Remove(Text _Attribute, Text _Value, CUIConfig _UI)

Remove all markers containing an attribute with the specified value from an UI

@param  _Attribute  The attribute to scan
@param  _Value      The value to remove
@param  _UI         The UI from which the markers will be removed
{% endhighlight %}




{% highlight js %} 
Void Remove(Text _Attribute, Text _Value)

Remove all markers containing an attribute with the specified value from the global UI

@param  _Attribute  The attribute to scan
@param  _Value      The value to remove
{% endhighlight %}




{% highlight js %} 
Void Remove(Text _Attribute, Text _Value, CPlayer _Player)

Remove all markers containing an attribute with the specified value from a player

@param  _Attribute  The attribute to scan
@param  _Value      The value to remove
@param  _Player     The player from which the markers will be removed
{% endhighlight %}




{% highlight js %} 
Void RemoveManialink(Text _Id)

Remove a manialink from the layer Markers with the given manialinkframeid

@param  _Id   The manialinkframeid to remove
{% endhighlight %}




{% highlight js %} 
Void Clear(CUIConfig _UI)

Remove all markers from an UI

@param  _UI   The UI from which the markers will be removed
{% endhighlight %}




{% highlight js %} 
Void Clear()

Remove all markers from the global UI
{% endhighlight %}




{% highlight js %} 
Void Clear(CPlayer _Player)

Remove all markers from a player

@param  _Player   The player from which the markers will be removed
{% endhighlight %}




{% highlight js %} 
Void SetManialinkScript(Text _Script)

Set the manialink script of the marker layer

@param  _Script   The script to set in the manialink
{% endhighlight %}




{% highlight js %} 
Void AddAttribute(Text _Attribute)

Add an attribute to the valid attributes array. Any attribute not present in this array will be removed from the marker.

@param  _Attribute    The attribute to add
{% endhighlight %}




{% highlight js %} 
Void AddAttributes(Text[] _Attributes)

Add several attributes to the valid attributes array

@param  _Attributes   The attributes to add
{% endhighlight %}




{% highlight js %} 
Void RemoveAttribute(Text _Attribute)

Remove an attribute from the valid attributes array

@param  _Attribute    The attribute to remove
{% endhighlight %}




{% highlight js %} 
Void RemoveAttributes(Text[] _Attributes)

Remove several attributes from the valid attributes array

@param  _Attributes   The attributes to remove
{% endhighlight %}




{% highlight js %} 
Text[] GetAttributes()

Get the valid attributes

@return   The valid attributes array
{% endhighlight %}

The following functions are helpers to add markers on a minimap.



{% highlight js %} 
Void Minimap_Add(Text _Id, Vec3 _Pos, Text _HudVisibility, Text _MinimapVisibility, Text _ImgUrl, CPlayer _Player)

Display an image on the minimap at a given position

@param  _Id                 Id of this point
@param  _Pos                Position of the point on the minimap
@param  _HudVisibility      Visibility of the point on the HUD
@param  _MinimapVisibility  Visibility of the point on the minimap
@param  _ImgUrl             URL to the point image
@param  _Player             The player who'll see the point (if null, global UI)
{% endhighlight %}




{% highlight js %} 
Void Minimap_Add(Text _Id, Vec3 _Pos, CPlayer _Player)

Display an image at a given position

@param  _Id       Id of this point
@param  _Pos      Position of the point on the minimap
@param  _Player   The player who'll see the point (if null, global UI)
{% endhighlight %}




{% highlight js %} 
Void Minimap_Add(Text _Id, Vec3 _Pos)

Display an image at a given position in the global UI

@param  _Id   Id of this point
@param  _Pos  Position of the point on the minimap
{% endhighlight %}




{% highlight js %} 
Void Minimap_Add(Text _Id, CPlayer _PlayerOnMinimap, Boolean _ShowDir, Text _HudVisibility, Text _MinimapVisibility, Text _ImgUrl, CPlayer _Player)

Display an image following a player

@param  _Id                 Id of this point
@param  _PlayerOnMinimap    The player to follow
@param  _ShowDir            Show the orientation of the player
@param  _HudVisibility      Visibility of the point on the HUD (Never, Always, WhenInFrustum, WhenVisible or WhenInMiddleOfScreen)
@param  _MinimapVisibility  Visibility of the point on the minimap (Never, Always or WhenInFrame)
@param  _ImgUrl             URL to the point image
@param  _Player             The player who'll see the point (if null, global UI)
{% endhighlight %}




{% highlight js %} 
Void Minimap_Add(Text _Id, CPlayer _PlayerOnMinimap, CPlayer _Player)

Display an image following a player

@param  _Id               Id of this point
@param  _PlayerOnMinimap  The player to follow
@param  _Player           The player who'll see the point (if null, global UI)
{% endhighlight %}




{% highlight js %} 
Void Minimap_Add(Text _Id, CPlayer _PlayerOnMinimap)

Display an image following a player

@param  _Id               Id of this point
@param  _PlayerOnMinimap  The player to follow
{% endhighlight %}




{% highlight js %} 
Void Minimap_Remove(Text _Id)

Remove one minimap point

@param  _Id   Id of the point to remove
{% endhighlight %}




{% highlight js %} 
Void Minimap_Remove(Text _Id, CPlayer _Player)

Remove one minimap point from a player

@param  _Id     Id of the point to remove
@param  _Player   The player who'll loose the point
{% endhighlight %}




{% highlight js %} 
Void Minimap_Clear()

Remove all minimap points
{% endhighlight %}




{% highlight js %} 
Void Minimap_Clear(CPlayer _Player)

Remove all minimap points from a player

@param  _Player   The player who'll loose the points
{% endhighlight %}