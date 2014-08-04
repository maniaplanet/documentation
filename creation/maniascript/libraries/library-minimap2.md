---
layout: static
title: MiniMap2 library 
description: Create and display a minimap
---

# Purpose
Create, customize and display a minimap.

# Usage
Add this line at the beginning of your game mode script to use it :
`#Include "Libs/Nadeo/MiniMap2.Script.txt" as MiniMap`
Then call the `Load()`and `Unload()`functions respectively in the `***StartServer***` and `***EndServer***` labels.

The minimap library only display a map, if you want to add markers on it you'll have to use the Markers library.

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
Void Pos(Vec3 _Pos)

Set the position of the minimap in the HUD
{% endhighlight %}




{% highlight js %} 
Void Size(Vec2 _Size)

Set the size of the minimap

@param  _Size The new size
{% endhighlight %}




{% highlight js %} 
Void Scale(Real _Scale)

Set the scale of the minimap

@param  _Scale  The new size
{% endhighlight %}




{% highlight js %} 
Void Visibility(Boolean _Visible)

Set the visibility of the minimap by default

@param  _Visible  True to show the minimap
{% endhighlight %}




{% highlight js %} 
Void Visibility(CPlayer _Player, Boolean _Visible)

Set the visibility of the minimap for one player. This setting will override the default one.

@param  _Player   The player to update
@param  _Visible  True to show the minimap
{% endhighlight %}




{% highlight js %} 
Void ResetVisibility(CPlayer _Player)

Reset the visibility of the minimap at the player level to the default

@param  _Player   The player to reset
{% endhighlight %}




{% highlight js %} 
Void Overlay(Text _ImgPath, Vec2 _Pos, Vec2 _Size)

Set the properties of the overlay on the minimap

@param  _ImgPath    The path to the image
@param  _Pos      The position of the overlay
@param  _Size     The size of the overlay
{% endhighlight %}




{% highlight js %} 
Void Zoom(Real _Zoom)

Set the zoom of the minimap

@param  _Zoom   The new zoom
{% endhighlight %}




{% highlight js %} 
Void WorldPosition(Vec3 _Pos)

Set the world position of the minimap

@param  _Pos  The new world position
{% endhighlight %}




{% highlight js %} 
Void WorldPositionFollow(Boolean _Follow)

The world position is equal to the GUIPlayer position + the default world position

@param  _Follow   The map follow the player position or not
{% endhighlight %}




{% highlight js %} 
Void MapPosition(Vec2 _Pos)

Set the map position of the minimap

@param  _Pos  The new map position
{% endhighlight %}




{% highlight js %}
Void MapYaw(Real _Yaw)

Set the map yaw of the minimap

@param  _Yaw  The new yaw
{% endhighlight %}




{% highlight js %}
Void MapYawFollow(Boolean _Follow)

The map yaw is equal to the GUIPlayer yaw + the default yaw

@param  _Follow   The map follow the player yaw or not
{% endhighlight %}