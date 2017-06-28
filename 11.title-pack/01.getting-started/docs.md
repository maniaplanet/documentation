---
title: 'Getting started'
taxonomy:
    category:
        - docs
---

[TOC]

## Where i create a Title Pack?

In the main menu with the stations, in the "options" tab, 
Click on "Edit packs".

In the title menu, you can either "**create a new pack**", or update an existing one by clicking on it's name.
(when you edit an existing one, the people that already unlocked a previous version by paying you planets will not have to do it again for the update)

At this point you can just put together some of your creations in a pack - like a vehicle, or tracks... (as before Maniaplanet 2)  
You can set a pretty pack name, some description, the price.
And you can define a link.  
This should be a link of a page describing the title and how to get it, as this is the link that will be given to the players when they don't have the title, or it is outdated.

Or you can also include title informations to **create a title pack**, by clicking on the title button.

The first time you click on the title button, you'll be requested to enter the identifier of the title, which is used to make the unique identifier of the title (in the form  title@yourlogin).
You can't alter it once it's created.

## Title creation infos

At this point a form is diplayed to select the **title creation infos**.

*As a general rules all fields are optional. Only fill in the ones you need to use.*

### Title

* *Base:* is to say whether it's a title that uses data from storm or canyon, or none. (like a manialink based minigame or infopage)

* *Packaging:* takes you to the folder in "My Documents/Maniaplanet/Packs/title@yourlogin" where all the title informations are stored.
You can then edit the files in the folder to customise the visuals of you title. => [[1]][1]

* collection and the number next to it are only used at this point as a sorting criteria to display the cases in the titles list.

* *Music:* you can select a folder with musics to be used in-game.

* *Mod: *If you want to enforce a mod for all the maps in the title.
(but you can also leave it empty and specify a mod for each individual map as usual.)

### Menu

* *Replay: *A replay to be used as menus background.
Limitations:  At this point, The replay shouldn't include any vehicles or characters, as they won't be played anyway.

* *Music:* A music to play when in the menus

* *Manialink: * a  manialink page to display instead of the standard title menu. => [[2]][2]

* *Colour:*  not yet implemented, forgot to remove it..  :mrgreen:

**Editor:**

*  *Map type:*  you can select a maptype script, to be used when creating new maps in your pack.

### Solo
Here you can create a simple/classic campaign,  or you can further customise with a custom script.

>>> It doesn't work in SM yet, although it should be possible to create timeattack-like campaigns once I fix it

*  *Mode:*  you can choose a mode script to be used in solo races.  Otherwise it's the classic timeattack mode.
*  *Campaign:* select a folder with the campaign tracks.  The layout should be:

    ..../My campaign/01-myfirst group/01-myfirstmap
    ..../My campaign/01-myfirst group/02-mysecondmap
    ..../My campaign/02-mysecond group/01-myfirstmap

point it to the `.../My campagin` folder.
The maps and groups are sorted in alphabetical order of the file names, so prefixing with a number is a good idea..
*  *Medals:*  the total number of medals that the player can win in the campaign. (that's usually 4 x number of maps, but if it's a custom mode the number may be different. for instance in the platform title only 3 medals per map are earnable)  --> that's used for the medal rankings.
*  *Playlist:* if you don't want to use the classic campaign menu and make advanced scripting, that's the way to input the list of maps to use. (But otherwise leave it empty.)

### Network

*  *Mode:* The script mode to use.  (that is, when creating a server, the mode is forced)
*  *Playlist:*  The playlist to use. (that is, when creating a server, the playlist is forced)  --> so use this only in a specific case where you always want to enforce a specific playlist in the servers for this title.

>>>>> You can also modify most of these parameters in the [ManiaPlanetTitle.xml](xml_description.html) file in the folder of the Title Pack.

## Extra contents
You can also add **extra contents** in the pack, to make it available to the player when he is in the title.
Click on contents, an you'll see all data automatically included for the title description.

You can click on "add" to add extra contents.

That's where, for instance, you can include playlists to make them available when creating a server, but not enforce to use them or extra maps, and so on...


##  Dependencies
If you add a playlist.txt, it will automatically include all the maps from it.  
And if you have custom data (mods, images, ...) in the maps they'll also be included.  
or if a map includes a MT that uses a image, they'll also be included.  
or if you add a script, all it's #include are included.  

What's known **not** to work at this point:  

* The dependencies of manialink pages
* The custom data in the maps that aren't in you "my documents" folder, but are downloaded in the cache.

## Credits
People need to unlock the pack to use it.

At this point you can either specify a number of planets to pay. (you can change it when you update the pack, people that already payed don't need to pay again, and the price isn't tied to a specific update)

You can also generate one shot unlock keys to give the pack to specific people, in the player.maniaplanet.com page. (advanced/maniacredits)

>>>> Still missing is the UI to have multiple beneficiaries of the planets, and to deprecate old revisions of the packs.

As well as the audience statistics to know who installed your title, and so on.

## Building the title case and station
The title cases and stations are built from a image and some logos.

*  *Packimage.jpg* should be a 16:9 image, that is shown in the stations. and the central part is used for the title case.
*  *MenuBg.jpg* is an image that is used as background in the menus when there is no replay
*  *Logos.png* is the plate with all the logos. The layout is provided in the image attached to this post.
The icon on the top right is unused at this point, but will probably be used at least to replace the maniaplanet logo in the systembar.
*  *Menuheader.png* is used for the menu bar on the left when entering the title.

There is also ManiaplanetTile.xml in the folder, which contains the data from the title form.  
You shouldn't modify it if you're not an advanced user.

>>>>> However, advanced users can edit it to change data which is not exposed in the menu. But be careful - the game overwrites it quite often while you're editing the pack in the menu and may not reload your changes. It's best to leave the editing of the title in the game when you want to edit this file.

![](Title_LogosLegend.png)

## Manialink
If you make a custom manialink for the menu, there are some specific actions available to redirect back to the usual menus.

Those actions are available in the [documentation][4].

Example:

	<label pos="-130 -80" z-index="0" halign="center" style="CardButtonMedium" text="Close" action="quit"/>

If you want to include data in the pack, you can put your files in `My Documents/Maniaplanet/Media/...`
and then use the url `file://Media/...` to use it.

>>>>> Media/ is mandatory, you cannot  put the files in another root folder
 
>>> As the automatic extration of data from manialinks doesn't work yet, you also have to explicitly include the data in the pack.

[1]: #building-the-title-case-and-stat-...
[2]: #manialink
[4]: ../../manialink/actions.html