---
title: Importer
process:
    markdown: true
    twig: true
taxonomy:
    category: docs
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
See [this page](../../nadeo-importer/getting-started) for more informations.
