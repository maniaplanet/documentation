---
layout: default
title: Item import
description: Item import
tags:
- creation
- importer 
---

You can import 3 types of items  

- static objects
- dynamic objects
- characters

Static objects are placed on maps, and are part of the static data of the map.  
Dynamic objects and Characters can be placed on maps, as hints for the scripts, but are created / destroyed by scripts during gameplay.  
To import a item, you must create a .item.xml file describing how to import it.  

The asset files to import must be located in the folder :  
`{maniaplanet_user_dir}/Work/Items/{sub_folder_you_want}`

To import an item, type the command :  
```
NadeoImporter Item {Item.xml_Filename_Relative_To_WorkFolder}
```

**Note 1** : For items using meshes and shapes, (static & dynamic objects), those must have been imported **before** Item import.  
 see the dedicated page : `[mesh import](importer_mesh.html)`

**Note 2** : Once you have imported and item, the only way to play online with it to do it through a Title (add the items to the title during title creation)

**Note 3** : **Icon** : if you want to see an icon for your item in the editor, you need to provide a icon file.  
Unlike the other files which are explicitly referenced in the item.xml file, the icon file is automatically retrieved and imported.  
The icon mus be a tga 64x64, it must have the same base name than the item.xml file and be placed in a sub folder `icon`.  
see sample : `Work/Items/Samples/DynamicObjects/Icon`

Item.xml file structure
--
1. Item
--
`<Item>` root node attributes :

- `Type` : mandatory. item type  
	values : `"StaticObject","DynaObject","Character"`  
	ex :`<Item Type="StaticObject" >`  
- `AuthorName` : optional : author name  
	ex :`<Item Type="StaticObject" AuthorName="NadeoSamples">`  
- `Collection` : optional. collection of the item. (if one of its meshes use collection materials)  
	values : `"Storm", "Canyon", "Stadium", "Valley", "SMCommon"`  
- `Archetype`: mandatory for character items. archetype of the character  
	value : filename of the archetype  
	available archetypes for shootmania :  
	- `"ShootMania/Items/Characters/ArenaPlayer.Item.gbx"`
	- `"ShootMania/Items/Characters/ArenaPlayerSmall.Item.gbx"`
	- `"ShootMania/Items/Characters/Minion.Item.gbx"`

	ex : `<Item Archetype="ShootMania/Items/Characters/ArenaPlayer.Item.gbx">`  
- `DefaultSkin`: mandatory for character items.	name of the default skin for this item.  
	value : filename of the defaut skin
- `SkinFolder` : mandatory for character items. folder where to browse skins for this item.  

recap example for character items:

```xml
<Item Type="Character" Archetype="ShootMania\Items\Characters\ArenaPlayer.Item.gbx"
DefaultSkin="Skins\Models\StormManBig\A.zip" SkinFolder="Models\StormManBig"
Collection="SMCommon" AuthorName="NadeoSamples">
```
2. Phy and Vis
--
The physical and visual parts, `<Phy>` and `<Vis>` tags depends on the type of the item (see below).  

Inside the `<Phy>` tag, there is all the information needed for the "physical" simulation of the item (ie : what will be simulated on client and on dedicated server).  
Inside the `<Vis>` tag, there is all the information needed for the "visual" simulation of the item (ie : what will necessary only on client : meshes, lights, sounds, particles).  

Referenced .Mesh.gbx and .Shape.gbx files that must be already imported.  
Shape.gbx files are automatically generated along the the mesh.gbx when you import static meshes.  

2.1 Static objects
--

- `<Phy>`
	- `<MoveShape>` : the physical part of a static object conains the "moveshape" (ie : the "hard" collision shape).  
		attributes :  
		- `Type`: shape type. "mesh" for static meshes.  
		- `File`: the shape filename. ex : `File="Meshes/Checkpoint.Shape.gbx"`  
	- `<TriggerShape>` : if your static object needs has a trigger  (for checkpoints or finishs).
		attributes :  
		- `Type`: shape type. "mesh" for static meshes  
		- `File`: the shape filename. ex : `File="Meshes/CheckpointTrigger.Shape.gbx`  
- `<Vis>`
	- `<Mesh>` : the displayed mesh. attributes :  
		- `File`: the mesh filename. ex : `File="Meshes/Checkpoint.Mesh.gbx"`  
			**Warning** : the mesh have been imported as a **static mesh**  

- `<Waypoint>`: use this node for defining start, checkpoints, & finishs.  
	attributes :
	- `Type` : values : `"Start", "Finish", "Checkpoint", "StartFinish"`  
		the start location will be retrieved from the "start" socket of the MoveShape  
		(a "socket" is a named location)

recap example for static object :

```xml
<Item Type="StaticObject" Collection="Common" AuthorName="NadeoSamples">
	<Waypoint Type="Checkpoint"/>
	<Phy>
		<TriggerShape Type="mesh" File="Meshes/CheckpointTrigger.Shape.gbx"/>
		<MoveShape Type="mesh" File="Meshes/Checkpoint.Shape.gbx"/>
	</Phy>
	<Vis>
		<Mesh File="Meshes/Checkpoint.Mesh.gbx"/>
	</Vis>
</Item>
```

2.2 Dynamic objects
--

- `<Phy>`
	- `<DynaPointModel>` : this tag allow the object to move according to the "point dynamics" (a ball not rolling).  
		attributes :
		- `Center` : relative center of the dynamic point
		- `Radius` : fake ball radius in meters
		- `Restitution` : restitution coef, between 0 and 1
		- `Friction` : friction coef, between 0 and 1
		- `GravityCoef` : coef to make objects fall faster or slower

	- `<TriggerShape>` : the shape (currently AABB only) that will be used for object interaction. when a player touches this box, a event will be sent to the script.
		- `Type` : currently only AABB
		- `Min` : min coord of AABB (in case of AABB)
		- `Max` : max coord of AABB (in case of AABB)

- `<Vis>`
	- `<Mesh>` : the displayed mesh.  
		attributes :  
		- `File`: the mesh filename. ex : `<Mesh File="Meshes/SampleArmor.Mesh.gbx"`  
			**Warning** : the mesh have been imported as a **dynamic mesh**  
	- `<LightBallSimple>` : a simple light following the dynamic object.  
		attributes :  
		- `Radius` : radius in meters  
		- `sRgb` : color in sRgb  
		- `Pos` : relative position of the light, vector in meters  
	- `<LocAnimSimple>` : simple rotation+translation animation (used for pickups).
		attributes :
		- `RotPeriod` rotation period in milliseconds
		- `TransPeriod`  translation period milliseconds
		- `TransY` translation distance in meters

recap example for dynamic object :

```xml
<Item Type="DynaObject" Collection="SMCommon">
   <Phy>
      <TriggerShape Type="AABB" min="-0.4 0 -0.4" max="0.4 0.8 0.4"/>
   </Phy>
   <Vis>
      <Mesh File="Meshes/SampleArmor.Mesh.gbx"/>
      <LightBallSimple Radius="2" sRgb="0 1 0" Pos="0 0.3 0"/>
      <LocAnimSimple RotPeriod="1000" TransPeriod="1000" TransY="0.1"/>
   </Vis>
</Item>
```
2.3 Characters
--
a character inherits the physics from its archetype. however, you can tune some parameters:

- `<Phy>`
	- `<CharPhyCustom>` : optional customisation of the inherited character physics  
		- `Radius` : radius of the character  
		- `EyesHeight` : height of the eyes of the character (ie : where the camera is placed in first person, and also where the bullets are sent from)  
		- `SpeedCoef` : the speed coef from the archetype  

there is no `<vis>` node for characters. the display is defined by the DefaultSkin attribute of the `<Item>` node.  
recap example for character :

```xml
<Item Type="Character" Archetype="ShootMania/Items/Characters/ArenaPlayer.Item.gbx"
DefaultSkin="Skins/Models/StormManBig/A.zip" SkinFolder="Models/StormManBig"
Collection="SMCommon" AuthorName="NadeoSamples">
	<Phy>
		<CharPhyCustom Radius="1.2" EyesHeight="4.8" SpeedCoef="3"/>
	</Phy>
</Item>
```

3. Placement parameters : pivots, gridsnap, cube
--
in order to facilitate the item placement in the editor, you can define parameters

- `<Pivots>` : pivot points (instead of the origin of the object), first parameter is X, secound is Z and third is Y axis

	```xml
<Pivots>
	<Pivot Pos="0 0 0"/>
	<Pivot Pos="0 0 -1.5"/>
	<Pivot Pos="0 0 1.5"/>
</Pivots>
```
Note : In the editor, since the Beta2 release, the pivot is chosen automatically according to the surface under the mouse pointer (if you are pointing at ground for instance, it will choose the lowest pivot).  
Sometimes, several pivots are chosen: you can switch from one to another using the numpad '.' key or 'Q' key ('A' for azerty keyboards).  

- `<GridSnap>` : the object can be placed every x meters  
	- ex. good parameters for the environment Canyon:  
		`<GridSnap HStep="8" VStep="4" />`  
	- ex. good parameters for the environment Storm:  
		`<GridSnap HStep="1" VStep="1" />`  
	- ex. you can offset the grid (even if decreasing the grid steps may be a better solution in some cases):  
		`<GridSnap HStep="1" VStep="1" HOffset="0.5" VOffset="0.3"/>`
- `<Levitation>` : the object can be placed not only on the ground and on blocks/items but also in the air every x meters)  
	- ex. good parameters for the environment Valley:  
		`<Levitation VStep="2"/>`  
	- ex. you can offset the levels where the object can be placed in the air (as for grid snapping):  
		`<Levitation VStep="2" VOffset="1"/>`  
	- ex. "ghost mode" (the object ignores existing blocks, it can be placed through them, not on them):  
		`<Levitation VStep="4" GhostMode="true" />`  
- `<Cube>` special objects with a specific snappig system, easy to place; try to use them in Royal Exp title!  
	- ex. for a 2-meter box from (0,0,0) to (2,2,2):  
		`<Cube Center="1 1 1" Size="2" />`
- `<PivotSnap>`: when you are about to place a new item B next to an already placed item A, with the mouse cursor on A, B may be offseted in order that B's pivot and A's nearest pivot coincide  
	- ex. for a small item, if you want to activate pivot snapping only when this item's pivot and another item's pivot are very close to each other (25cm or less)  
		`<PivotSnap Distance="0.25" />`  
	- ex. if you want to completely deactivate pivot snapping for this item, set the distance to 0  
		`<PivotSnap Distance="0" />`
	- ex. if you want to let the map editor use the default environment-dependent value, just don't put any PivotSnap tag, or you can put a negative value in the Distance property  
		`<PivotSnap Distance="-1" />`

 Note: If the item you are about to place (B) and the item which is already placed (A) do not have the same pivot-snapping distance value, only the lowest distance is used.  

- `<Options>` : other placement options (default values are "false"). attributes  
	- `NotOnItem`: prevents the object from being placed on another item (boolean, default = false)  
	- `OneAxisRotation`  : prevents the item from being rotated with arrow keys (you can rotate it around the vertical axis only, with right click, '+' key and '-' key)  
	- `ManualPivotSwitch` : the pivot used to place the object won't change automatically; the only way to change it is to press numpad '.' key or 'Q' key ('A' for azerty keyboards)  
	- `"AutoRotation` : the object rotates automatically according to the surface pointed by the mouse cursor  
	- ex. an object that will always be perpendicular to the surface it is placed on:  
		`<Options OneAxisRotation="true" AutoRotation="true" />`  
	- ex. if you want to let the user choose the pivot to use but prevent him from placing it on another item:  
		`<Options NotOnItem="true" ManualPivotSwitch="true" />`  
