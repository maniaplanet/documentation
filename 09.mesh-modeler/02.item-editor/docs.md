---
title: 'Item Editor'
taxonomy:
    category:
        - docs
visible: true
---

The Item Editor allows you to edit items (`.Item.Gbx` files) that can be placed in maps. It can be accessed directly from the *Title tools* menu, but it is recommended to open it from the Map Editor, via the *Item Edition* panel, at the left bottom corner of the screen in Item mode.

Let's go through the list of parameters you can set.


## Pivots

When you place an item in the map, the mouse cursor is aiming at a particular point in the map. But how should the item be placed compared to this point? If your item is a cube, should the editor place the item so that the cursor point is at the center of the cube ? Or the center of the bottom face? Or one corner of the cube?

Pivots are here to answer that question: a pivot is a point of the item that will coincide with the point of the map that is aimed by the cursor.

An item can have multiple pivots. In that case, the Map Editor might choose automatically one pivot according to the context, or you might be able to press the `Q` key (`A` with azerty keyboards) to cycle through the pivots of the current item: see the placement parameter *Switch pivot manually* for more information.

If an item has no pivot, the Map Editor will consider that it has one pivot at the coordinate (0,0,0).

>>>>> Pivots can also be used as magnets to help align items when you place them on each other: see *Pivot Snap Distance* for more information.


## Placement parameters

These are advanced parameters to help the mappers place the item in the map.

They are numerous and sometimes a bit difficult to understand. Just leave the default values, unless you have a specific need for your item.

>>>>>>  Two of them are far more useful than all the others: *Fly Step* and *Grid Horizontal Size*. You can read the explanations of these two and ignore all the others!


### Main placement parameters

**Fly Step** If 0, the item will always be placed "on something": the ground, the wall, another item, etc. whatever is aimed by the cursor. If greater than 0, the item can fly above the ground: each time you scroll with the mouse wheel (or press the PgUp/PgDown keys), the item will be offseted vertically by this step (in meters).

**Grid Horizontal Size** If greater than 0, the item will be snapped to the intersections of an invisible horizontal grid, and the distance between the parallel lines of this grid will be this *Grid Horizontal Size* (in meters). If 0, there will be no horizontal snapping, you can place the item exactly where you want (but it will be difficult to align several items or align items with blocks).


### Advanced placement parameters

**Switch pivot manually** If activated, the only way to change the pivot to use will be the `Q` key (`A` with azerty keyboard). If deactivated, the Map Editor will automatically change the pivot according to the direction of the surface you are aiming with the cursor (for example it may select the lowest pivot if you are aiming at the floor, and the highest pivot if you are aiming at a ceiling). If the editor selects several pivot candidates, you can cycle through them with the `Q` key.

**Fly Offset** Offsets vertically the invisible horizontal planes on which the cursor moves when it is in the air. For example, if the *Fly Step* parameter is 4 meters and the the *Fly Offset* is 0 meter, when you scroll with the mouse wheel, the cursor will move to the coordinates `y = 0, 4, 8, 12, 16... m`. But if you set the *Fly Offset* to 1 meter, then the cursor will be placed at `y = 1, 5, 9, 13, 17... m`. This parameter has no effect if *Fly Step* is 0.

**Grid Horizontal Offset** It is recommended to leave this parameter to 0, unless you really know what you are doing. It offsets the horizontal grid by this amount of meters, in both horizontal axis (x and z). The only value that might be useful sometimes would be half of *Grid Horizontal Size*, but even in that case it is probably a better idea to divide *Grid Horizontal Size* by 2 instead.

**Grid Vertical Size** If greater than 0, the item will be snapped on the vertical axis, and the value is the step of this snapping in meters. In other words, it sets the snapping along the y axis, just as the *Grid Horizontal Size* sets the snapping along the x and z axis. The difference with *Fly Step* is subtle: unlike *Fly Step*, *Grid Vertical Size* does not enable the item to fly. For instance, it can be used for an item which is meant to be placed on walls, to limit the available heights and then make it easy to align them. But if your item's *Fly Step* and *Grid Vertical Size* are both greater than 0, it is recommended to set the same value on both parameters.

**Grid Vertical Offset** No effect if *Grid Vertical Size* equals 0. Otherwise, it offsets the available heights by this value in meters. For example, if *Grid Vertical Size* is 8 and *Grid Vertical Offset* is 2, the available heights are `y = 2, 10, 18, 26, 34... m`. If the item's *Fly Offset* is different from zero, it is recommended to put the same value in *Grid Vertical Offset*.

**Cube Size** Obsolete feature, it will disappear in a future update.

**Cube Center** Obsolete feature, it will disappear in a future update.

**Yaw Only** If activated, the item can be rotated around the vertical axis only (y), by 90° with the right mouse button, or by 15° with the '+' or '-' keys of the numeric keypad. If deactivated, it can also be rotated in other directions using the arrow keys.

**Not On Object** If activated, the item cannot be placed on another item, it can only be placed on blocks (or in the air, if *Fly Step* is greater than 0). It is recommended to leave it deactivated.

**Auto Rotation** If activated, the Map Editor will try to automatically rotate the item you are about to place according to the direction of the surface you are aiming at with the mouse pointer. It can be useful for items which are supposed to stay perpendicular to the ground for example.

**Pivot Snap Distance** When you are about to place a new item on another item (in other words the mouse pointer is aiming at an item already placed on the map), the editor might try to snap the new item so that its current pivot would be placed exactly at the same spot as one of the pivots of the other item, as if the pivots of the already placed item were magnets that attract the pivot of the new item. If you do not want this feature for your item, set the value to 0. Otherwise, choose a positive value which will be the distance of this attraction (in meters), or use the special value -1 to let the editor choose an automatic distance (according to the current collection: for instance it will be shorter in Storm than in Canyon).


### About Free item mode

When you are already in Item mode in the Map Editor, you can activate the Free item mode by clicking again on the tree-shaped Item mode icon (the icon turns white). In this mode, all the placement parameters of the current item are ignored and replaced by some default parameters with tiny *Fly Step* and *Grid Horizontal Size*. It also activates a special placement parameter that we might call *Ghost Item*: the items placed with this mode will never be placed "on anything", they will completely ignore surrounding blocks and items, going through them if necessary.


## Mesh

Click on the wrench icon to edit the *crystal* embedded in the item file. This will open the Mesh Modeler.


## Icon

Set the icon that will be displayed in the inventory of the Map Editor. You have two options:
- take a picture of your item using its current geometry, in one of the four directions available.
- import an image from a file.

In both cases the result will be a 64x64 image embedded in the item file.

If you import an image with another resolution it will be automatically scaled to 64x64.

