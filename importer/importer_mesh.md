---
layout: static
title: Mesh import help 
description: Mesh import help 
---
Mesh import
==

You can import meshes from the fbx file format (**maximum version 2014.1**)  
Importer has been tested with files exported from Blender and 3dsMax (with Fbx 2012.2 exporter, available at http://usa.autodesk.com/fbx/)  
3d file must contain meshes with materials.

We distinguish 3 types of meshes : **static meshes**, **dynamic meshes** and **characters meshes**  
The static objects use static meshes, the dynamic object use dynamic meshes, and the characters use character meshes.  

The fbx file to import (and its depening assets (textures)) must be placed in the correct folders

- for item meshes : place in folder *{maniaplanet_user_dir}/Work/Items/{sub_folder_you_want}*
- for character skin meshes : place in folder *{maniaplanet_user_dir}/Work/Skins/Models/{sub_folder_you_want}*

To import a mesh, type the command : 

```
NadeoImporter Mesh {fbxSourceFileNameRelativeToWorkFolder}
```

When you import a mesh from a *.fbx* file, a corresponding *.mesh.gbx* file is produced (in the non-work folder)  
**Note** : for static meshes shapes (= collision models) files are also created during import (see below 1.1)

In order to specify how to import a fbx file, the **recommended** way is now to create a *xxx.meshparams.xml* file along the *xxx.fbx* file, instead of adding command line parameters.

In the samples, you have 2 files :  
*Work\Items\Samples\StaticObjects\Meshes\Block_Checkers.fbx*
and  
*Work\Items\Samples\StaticObjects\Meshes\Block_Checkers.meshparams.xml*  

1. Mesh types
--
 1.1 static meshes
---
- Uvs : for most of the static mesh materials, you will need 2 UV layers:
    - a layer named "Material" : base layer of the material, typically mapping your Diffuse texture)
    - a layer named "Lightmap" : Mandatory, needed for lightmap calculus in editor.
    
    **WARNING 1**: for this layer, the UV must not overlap, otherwise it will cause invalid lightmaps !
    **WARNING 2**: if you have lods, the Lod0 and Lod1 for a mesh must "share" the same UVs in the lightmap (we write lightmap only for Lod0, Lod1 will just use it)

    Note :
    - in blender, it's easy to name your layers
    - in 3dsMax (wich is classicaly index-based for layers),
        - the ChannelInfo utility to name your layers (comes with 3dsmax , available in panel Utility->More->Channel info)
        - or add to the [User Defined Property](http://download.autodesk.com/us/3dsmax/2012help/index.html?url=files/GUID-B7D0424E-6DCB-44D9-AD0B-85B9A1EE3F5-0.htm,topicNumber=d28e3788) (this is what Channel Info will do anyway) :
MapChannel:1 = BaseMaterial
MapChannel:2 = LightMap

- Lod : You can define (optionnaly) 2 levels of detail for a static mesh, by having two meshes (one with suffix "_Lod0", one with suffix "_Lod1")
 - Lod0 hightest quality, seen when near,
 - Lod1 lowest quality.

### static meshes shapes

During static mesh import, **shapes** (= collision models)  are created.
From the file `{meshname.fbx}`, a `{meshname}.shape.gbx` file is created.
The objects within the fbx file whose name start with `_socket_`(ex : `_socket_start`) are imported as "sockets", that can be used by the items. 
Use this when you import start or checkpoint items. (see the page [item import](importer_item.md))

If there are objects within in the fbx whose name starts with `_trigger_` (ex : `_trigger_A`), they will be imported as another shape file named `{meshname}Trigger.shape.gbx`.
This allows you to define a mesh and an associated trigger with a single fbx file.
Use this when you import checkpoint or finish items. (see the page [item import](importer_item))



1.2 non-static meshes (dynamic & character meshes)
--
- Uvs : Dynamic mesh materials don't require lightmap uv channel for static lighting (only 1 uv channel)
- Lod :You can define up to 3 level of details for a dynamic mesh, by having up to 3 meshes (suffix "_Lod0", "_Lod1", "_Lod2")
 

- **WARNING for character meshes (used in skins)**
    
 There are constraints on the maximum number of vertices of the     Lowest quality mesh (ie the highest Lod number) : 3500 vertexs max at this time.

 If your skin doesn't fit the requirements, it won't be transferred in peer to peer, and other players won't see it. 
 
 This to avoid unoptimized and costly skins to perturb the gameplay experience of other players.




2. Meshparam.xml file structure
--
2.1. MeshParams 
--
 `<MeshParams>` root node attributes :

- `MeshType` : mandatory. mesh type.
 values : `"Static", "Dynamic"`
 ex : `<MeshParams MeshType="Static">`

- `Collection` : optional. collection of the mesh (if it uses collection materials)
 values : `"Storm", "Canyon", "Stadium", "Valley"`
 ex : `<MeshParams MeshType="Static" Collection="Storm">`

- `Scale` : optional. import scale.
 ex : `<MeshParams MeshType="Static" Scale="1">`
 
2.2. Materials
-- 
It's now possible to define materials with more flexibility. 

For each material name present in the fbx file, you can define the corresponding imported material.
You can define the material model used, the path of the base texture, and the physics id.

That means **you can place you texture where you want in work the folder, and that you can more easily share texture between meshes**

the `<Materials>` node contains an array of `<Material>` nodes.

`<Material>` attributes :

- `Name` : mandatory. the name the fbx material
- `Model` : mandatory (except if you `"Link"` to an existing material. see below). name of the maniaplanet shading model
 values : (see appendix for more details about the material models)
 for static meshes (ie when MeshType = `"Static"`) : `"TDSN", "TDOSN","TDSNE", "TDSNI", "TDSNI_Night"`
 for dynamic meshes (ie when MeshType = `"Dynamic"`) : `"TDSNI", "TI", "TDSNE", "TE"`
 for character meshes : `"TDSNEM", "TE", "TDOSN", "TDOS"`

- `BaseTexture` : mandatory in `Model` mode. base texture file name to use for the materials.
 instead of specifying each material layer texture, you just define the base texture name, and from the material model, the importer adds suffixes (ex: _D.tga, _S.tga, _N.tga etc..) and tries to find the files on the disk.
 value : the path of the texture. either relative from the MeshParam.xml folder ( ex : `"../Textures/Checkers"`, or `"Textures/Checkers"`) or absolute ( absolute from the "Work" folder. ex : `"/Items/Samples/StaticObjects/Meshes/Textures/Checkers"`)

- `PhysicsId` : mandatory in `Model` mode. specify the physical type of the material.
 used in the game for gameplay (how fast we can go, in shootmania : if we can jump, if the rockets rebound, etc), and also used to decide wich impact effect to display.
 
 values : see below for the list.

- `Link` : mandatory if you want to use a library material. (== a predefined material of a collection : storm, canyon, etc)
 in that case, the value is the name of the library material.
 Please note that this material is to use in conjunction with the "Collection" attribute of the `<MeshParams>` node which define the collection.
  **Note** : the list of library materials can be found in the `NadeoImporterMaterialLib.txt` (that comes along `NadeoImporter.exe`)

####recap example :

```
<Materials>
    <Material Name="A" Model="TDSN" BaseTexture="../Textures/Checkers"  PhysicsId="TechGround" />
    <Material Name="B" Link="BaseGround" />
</Materials>
```

the fbx material named "A" will be imported as an instance of the TDSN model, using "../Textures/Checkers" for the base texture name,
( so the importer will look for the files : *../Textures/Checkers_D.tga*, *../Textures/Checkers_S.tga* and *../Textures/Checkers_N.tga*),
and with the physical id `"TechGround"`
the fbx material named "B" will be displayed as the "BaseGround" material of the storm collection

2.3. Lights
--
It's now possible to create lights  **only for static meshes.** 
For eah light name present in the fbx file, you can define the corresponding imported light.

You can define the light type and the light parameters

the `<Lights>` node contains an array of `<Light>` nodes.

`<Light>` attributes

- `Name` : mandatory. name the fbx light
- `Type` : mandatory. the type the light
 values : `"Point", "Spot"`
- `ColorRgb` :	optional. color of the light (sRGB space)
 value : 6 chars color in r, g, b order.
 ex : `"00ff00"` for pure green

- `Intensity` : optional. intensity of the light, (no real unit). typical value are 1
- `Distance` : optional. light influence distance in meters.
 - keep the distance as low as possible in order to keep the lightmap calculus time low. 
 - Many lights with long distance would cause long lightmap calculus time.
 - Prefer `"spot"` lights rather than `"point"` lights for long distances.
- `PointEmissionRadius` : optional. for point lights only, makes the light come from  ball of radius PointEmissionRadius meters instead of a single point.
- `PointEmissionLength`	: otpional. for point lights only, makes the light come form a segment of PointEmissionLength meters (along Z axis) instead of a single point
- `SpotInnerAngle` : optional. for spot lights only. inner angle of the spot in degrees. (angle without attenuation)
- `SpotOuterAngle` : optional. for spot lights only. outer angle of the spot in degrees. (angle at full attenuation)
the light intensity varies for maximum to null from  SpotInnerAngle to SpotOuterAngle
- `SpotEmissionSizeX` : optional. for spot lights only. size in meters of the emission rectangle along X axis
- `SpotEmissionSizeY` : optional. for spot lights only. size in meters of the emission rectangle along Y axis
- `NightOnly` : optional. tell if the light is active in night moods.
 values : `"true", "false"`

2.4.Textures 
--
  In the meshparam.xml file, you can now set the import texture parameters (as in command line)
 
 `<Textures>` attributes :
 
 - `MaxSize` : optional. in pixels, the max size of the max (width or height) of the imported texture
 - `HqDds` : opional. `"true"` if you want to use a better - but slower - dds compressor
 

3. Appendix 
--
3.1 material model list
--
material models uses different texture layers that must follow some conventions :

    Diffuse   : {BaseTextureName}_D.tga	24bits, RGB (32bits binary alpha if using Opacity)
    Specular  : {BaseTextureName}_S.tga	24bits, FIE (Fresnel, Intensity, Exponent)
    Normal    : {BaseTextureName}_N.tga	24bits, NxNyNz
    SelfIllum : {BaseTextureName}_I.tga	24Bits, RGB (selfillum)
    Energy    : {BaseTextureName}_E.tga	24bits, greyscale (0=> no energy 1=> full energy) (colorized by gameplay)
    TeamMask  : {BaseTextureName}_M.tga	24bits, binary mask (black => not colorizable, white=>colorizable)

The importer converts those textures into the right .dds format.
Textures size must be power of two. (2, 4, 8, 16, 32, 64, 128, 256, 512, 1024, 2048, 4096, (8192 < not supported by very old graphic cards)

here is a list of material models, with their texture layers.

###3.1.1. static mesh material models


- `TDSN` 

        Diffuse
        Specular
        Normal
- `TDOSN`

		DiffuseOpacity
		Specular
		Normal
- `TDSNE`

		Diffuse
		Specular
		Normal
		Energy
- `TDSNI` Layers :
	
		Diffuse
		Specular
		Normal
		SelfIllum

- `TDSNI_Night` same TDSNI, but self illum night only. Layers :

        Diffuse
        Specular
        Normal
        SelfIllum

###3.1.2. dynamic mesh material models

- `TDSNI`
		
		Diffuse
		Specular
		Normal
		SelfIllum
- `TI`
	
		SelfIllum
- `TDSNE`
		
		Diffuse	
		Specular
		Normal
		Energy
- `TE`

		Energy

###3.1.3. character mesh material models

- `TDSNEM`
		
		Diffuse
		Specular
		Normal
		Energy
		TeamMask
- `TE`
		
		Energy
- `TDOSN`

		DiffuseOpacity
		Specular
		Normal
- `TDOS`
	
		DiffuseOpacity
		Specular


3.2. material physicsId list
-

- `Tech` (blue pads = powerpath)
- `TechArmor` (regen pads)
- `TechSafe` (invulnerability) (green pads)
- `TechLaser` (rail weapon pads)
- `TechArrow` (arrow weapon pads (blocks not available yet))
- `TechGround` (floor of the new flying blocks : stamina jump)
- `TechWall` (walls of the new flying block : bounce rockets and big wall jump)
- `TechHook` (grappling hook spheres)
- `TechTeleport` (you can trigger a teleporter)
- `Energy` (forcefields, gates)
- `Bumper` (the storm bumpers, the directional bumpers have special properties stored in the blockinfo, not in the material))
- `WallJump` (not sure it's working, the wall jump property has been added directly into the stone material)
- `PlayerOnly` (I remember someone asking for this one : will block the player but not the weapons, usefull for loopholes or for avoiding dangerous areas where the player will get stuck)
- `NotCollidable` (as it sounds, no collisions, good for little anoying rocks or details)
- `Concrete` (the most used in TM)
- `Asphalt` (the second most used in TM)
- `Pavement` (rally mostly)
- `WetAsphalt` (rally )
- `WetPavement` (rally)
- `Grass` (the third most used in TM)
- `WetGrass` (rally mostly)
- `Ice` (snow mostly or on glass objects)
- `Snow` (snow mostly)
- `Sand` (mostly island I think)
- `Dirt` (another very common material)
- `DirtRoad`
- `WetDirtRoad` (mostly rally, some underwater of storm)
- `Rubber` (mostly stadium)
- `SlidingRubber` (I don't remember where it's been used)
- `Rock` (sliding when the slope is too vertical (to avoid cliff climb hacking in storm. Side effect : the player slides on some rocks)
- `Stone` (mostly Storm castle, adds walljump in storm)
- `Wood` (wood structures, bridges, etc..)
- `SlidingWood` (storm)
- `Trunk` (trees)
- `Water` (the activation of the water gameplay is linked to a waterheight stored in the environment parameters, so colliding a water surface at another height and in a block not flaged as "has water" will probably don't give the results you may expect (I think it's already the case with blockmixing when you place water blocks at another height)
- `OffZone` (never added it in a block, I don't know how this will react)
- `Metal` another very common material in maniaplanet
- `ResonantMetal` (the containers of desert, the tech towers of storm)
- `MetalTrans`
- `Turbo`
- `Turbo2`
- `TurboRoulette`


