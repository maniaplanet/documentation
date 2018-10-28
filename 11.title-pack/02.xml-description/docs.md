---
title: 'XML Description'
taxonomy:
    category:
        - docs
---

All the description of the title is included in an xml file called `ManiaPlanetTitle.xml`.

While the most common options are editable with the in-game creation menu, more advanced options need (at this time) to be edited in the xml file.


General section
========================

```
	<id>title@login</id>
```
This is the internal identifier of the title.


----
```
	<name>Pretty Name</name>
	<desc>Short description</desc>
	<url></url>
```
Some *Meta-information* to describe what the title is about.


----
```
	<download_url></download_url>
 	<title_version></title_version>
	<allowed_client_title_version></allowed_client_title_version>
```
Those are used to manage updates to the tile.

If you specify a `download_url`, the game will make automatically download the file from this url (*) everytime you update the file.
The game uses http header requests to get the modification date of the file and know a new version is available.

`title_version` if left empty will default to the creation date in the form "2014-04-01 ....".

`allowed_client_title_version` if specified will reject connection on the server of any client having an older version of the title.
(a lexicographical comparison is used.)


(*) There are actually two additional mechanisms for the download:
The game will download the header of the pack first, and
- try to download the file from the maniaplanet cloud if it has been uploaded there.
- compare the contents of the previous version of the pack on the client computer and only download changed/new parts, using http range requests.


----
```
	<packaging>
		<image name="PackImage.jpg"/>
		<logos name="Logos.png"/>
		<collection></collection>
		<sortindex>100</sortindex>
		<station_manialink url=""/>
		<station_noquickenter>false</station_noquickenter>
		<boxcase_manialink url=""/>
	</packaging>
```
*Packaging information.*

`collection` and `sortindex` are used to sort the list of titles. (they are sorted according to collection, and the for equal collection by sortindex)

`station_manialink` is the url of the page to display on the station in the main menu. If unspecified the default one will be used.

By default the game allows to click anywhere on the station, or on the play button, or double click on the station thumbnail to enter into the title main menu.
If you specify `station_noquickenter`, the user will have to use the manialink on the station. This can allow the title to skip the menus altogether and only allow to join servers for instance or go directly to the solo campaign, etc...

`boxcase_manialink` is unused at this point.


----
```
	<menu>
		<background_img name="MenuBg.jpg"/>
		<background_replay name="Folder\Menu.Replay.Gbx"/>
		<header name="MenuHeader.png"/>
		<music name=""/>
		<manialink url=""/>
	</menu>
	<menu_style name=""/>
```
*Title menus customisation.*

If you specify a `background_replay`, it will be loaded and played in the background of the title menus. The replays used are limited, they cannot contain characters or cars for instance.

Otherwise, `background_img` will be used. please note that this image will be shown cropped to the actual screen ratio of the player instead of streched out. You can also use a video file.

If both `background_replay` and `background_img` are left empty, the background will be the clouds and the menu will be using 3d style.


The game default menus will be used, unless you set a `manialink` url to be used instead.

`menu_style` can be used to customize the look of the no background 3d style menus.


----
```
	<base></base>
	<player_model></player_model>
```

`base` can be
- *SMStorm*, *TMCanyon*, *TMStadium*, *TMValley*,
- It can also be empty. (For instance, if you're making a manialink game and don't need 3d data)
- It can also be *TMAll* to use all TrackMania environments.

`player_model` can only be used for ShootMania, and can contain a character item identifier to be used instead of the default shootmania model for all players.


----
```
	<music folder=""/>
	<mod name=""/>
	<editor>
		<maptype name=""/>
		<simple_editor_map name=""/>
		<internalitems>
			<item name="Storm\MeleeUltimate\Armor.Item.gbx"/>
			....
		</internalitems>
	</editor>
	<solo>
		<medals>0</medals>
		<!-- either campaign or playlist-->
		<mode name=""/>
		<campaign folder=""/>
		<playlist name=""/>
		<datapack name=""/>
	</solo>
	<network>
		<mode name=""/>
		<playlist name=""/>
	</network>
	<splitscreen>
		<mode name=""/>
		<playlist name=""/>
	</splitscreen>
```
*Title gameplay description*

TBD.

Most of those are used to force values. for instance, if you leave the `mode name=""` empty, the user will be able to choose any mode among the files provided by the title or that they have on their hardrive.

The `mod` will be used on all the maps that haven't any specific mod.

`datapack` can be used to provide a .zip file containing additional content only available to the solo campaign, but not the editor or online modes.

`internalitems` allows to provide a list of items to forbid using in new map creation. The items will still be available to allow loading of older maps, but will no longer be listed in the editor.


----
```
	<files>
		<!-- browsable public files  -->
		<!--- <file name="...." public="true" internal="false" /> -->

		<!-- internal dependencies accessible even if pack not bought  
				+ this file, "ManiaPlanetTitle.xml", implicitly -->
		<!--- <file name="...." public="true" internal="true" /> -->

		<!-- browsable private files  -->
		<!--- <file name="..." public="false" internal="false" /> -->

		<!-- internal dependencies -->
		<!--- <file name="..." public="false" internal="true" /> -->
	</files>
	<folders>
		<!--- <folder name="...." public="..." internal="..." /> -->
	</folders>
```
*Data to pack inside the title.*


----
```
	<scriptcloud_enabled>false</scriptcloud_enabled>
```
TBD. (allows for the script to declare clouded variables that can then be shared accross all servers using the tile)


----
```
	<gameplay_features>0</gameplay_features>
```
(unused at this time)
