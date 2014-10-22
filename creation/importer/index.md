---
layout: menu
title: Importer help
description: Importer help
tags:
- creation
- importer
---

The importer is a tool to generate items (static objects, dynamic objects, characters), and also to generate character or vehicle skins.


The source assets must be placed in sub folders of `{maniaplanet_user_dir}/Work`.  
The corresponding imported files will be created in sub folders of `{maniaplanet_user_dir}` (whithout `/Work`)  

for instance:  
`{maniaplanet_user_dir}\Work\Skins\Models\ArenaPlayer\Susu` => `{maniaplanet_user_dir}\Skins\Models\ArenaPlayer\Susu.zip`  
`{maniaplanet_user_dir}\Work\Items\SMCommon\Pickups\Laser.Item.xml`=>`{maniaplanet_user_dir}\Items\SMCommon\Pickups\Laser.Item.gbx`  
`{maniaplanet_user_dir}\Work\Items\Storm\Dolmen\DolmenHorizontalA.Item.xml` => `{maniaplanet_user_dir}\Items\Storm\Dolmen\Laser.DolmenHorizontalA.gbx`  
and so on.

Current Release
-
importer : http://files.maniaplanet.com/tools/NadeoImporter_2014_10_22.zip

sample files : http://files.maniaplanet.com/tools/NadeoImporterSamples_2014_04_09.zip


the importer must be unzipped in the `{Maniaplanet_exe_dir}` folder (the same folder that contains `ManiaPlanet.exe`, typically `c:/program files/Maniaplanet` or `c:/Program files (x86)/Maniaplanet` )  
You might neeed administrator rights to unzip and place the importer files here

the sample files must be unzipped in the `{maniaplanet_user_dir}` folder (typically the folder `{My Documents}/Maniaplanet`)

Import an item
-
See the dedicated page: [item import](importer_item.html)

Import an character skin
-
See the dedicated page: [character skin import](importer_charskin.html)

Import a car skin
-
See the dedicated page: [car skin import](importer_carskin.html)

Import a mesh
-
See the dedicated page: [mesh import](importer_mesh.html)  
Note : A mesh itself isn't usable in Maniaplanet, but is a component of items and char skins

Import a font
-
See the dedicated page: [font import](importer_font.html)


ChangeLog
-
```
2014-10-22  - mesh import fixes : fixed Collada (DAE) import. 
                                  fixed import crashes
2014-09-10  - mesh import fixes :
				- wrong mesh optimisation when smoothing groups (for .3ds)
				- fix crash with "not collidable"
				- fix a bug causing too much faces in shapes for items with lod. (re-import recommended)
				- fix a bug causing duplicated vertices on some materials.
	
2014-07-23  - font importer
2014-04-08  - major importer update, new doc
2014-03-28  - pivot snapping parameter (pivot snapping already existed but it could not be customized nor deactivated)
			- pivot switching now binded to numpad "." key (because 'tab' is now used to hide item list in the editor)
2014-01-08  - added link for NadeoImporter_2013_09_17.zip with fixes the "nojoint" problem on skelgeneric import
2013-09-25	- updated dynamic mesh material list
2013-08-21  - fix wildcard '*' problem
2013-07-26 	- flying items
2013-07-08 	- additional placement options
2013-06-08  - new version, with support for valley materials.
			  the available material list for each environment is now a separate file NadeoImporterMaterialLib.txt.
			  new <Option> tag in item xml
2013-06-03  - fixed some typos
2013-05-13 	- major conventions changes
			- support for fbx 2013.3.
			- custom character skin import
			- dynamic objects
2012-12-27	- corrected the scale problem
2012-12-21	- grid snapping and cube parameters in the xml file
2012-11-07	- support for tga textures as input
2012-09-19 	- ObjectImportMaterialList from command line, added Canyon materials
			- corrected ObjectImportMaterialList.txt
			- typo TDSN, updated importer (fixed a crash when no material), added ObjectImportMaterialList.txt
2012-09-18	- xml file, lightmapUV warnings, editor notes, command line import
2012-09-07	- initial revision
```

All releases
--
- http://files.maniaplanet.com/tools/NadeoImporter_2014_10_22.zip
- http://files.maniaplanet.com/tools/NadeoImporter_2014_09_10.zip
- http://files.maniaplanet.com/tools/NadeoImporter_2014_07_23.zip
- http://files.maniaplanet.com/tools/NadeoImporter_2014_04_09.zip
- http://files.maniaplanet.com/tools/NadeoImporter_2014_03_27.zip
- http://files.maniaplanet.com/tools/NadeoImporter_2013_09_17.zip
- http://files.maniaplanet.com/tools/NadeoImporter_2013_08_21.zip

sample files :
--
- http://files.maniaplanet.com/tools/NadeoImporterSamples_2014_04_09.zip
- http://files.maniaplanet.com/tools/NadeoImporterSamples2014.zip
- http://files.maniaplanet.com/tools/NadeoImporterSamples.zip
