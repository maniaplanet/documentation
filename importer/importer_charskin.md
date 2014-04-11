---
layout: static
title: Character skin import 
description: Character skin import
---

Character skins can be displayed and selected by players in the profile/models menu, and the scripts can also force skins to players during gameplay.

The asset files to import must be located in the folder `{maniaplanet_user_dir}/Work/Skins/Models/{name_of_the_model}/{name_of_the_skin}`
For the default shootmania model (aka 'the shootman'), `{name_of_the_model}` is `ArenaPlayer`

The asset files to provide are

 - the mesh file (.Fbx format, version 2013.3 maximum)
 - the textures (to place in subfolder "Texture")
 - the animations file(.Fbx format, version 2013.3 maximum)
 - the .anim.xml animation definition file
 - the icon (to place in a subfolder "Icon")
 - the sounds (optional)

See Sample skin : `Work/Skins/Models/ArenaPlayer/SintelSample` (in `NadeoImporterSamples.zip`)

to learn how to prepare the character mesh for import, see the dedicated page : [mesh import](importer_mesh) 