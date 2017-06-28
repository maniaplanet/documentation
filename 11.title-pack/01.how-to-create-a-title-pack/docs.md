---
title: 'How to create a Title Pack?'
taxonomy:
    category:
        - docs
---

[TOC]

In the Maniaplanet menu, click on the *Options* menu and then *Edit packs*. In this new menu, *Create new...*, the interface will propose you to put a name, comment, manialink and price. Those information are facultative except the name.

! I strongly recommend to click on the ***Title*** button to customize a bit further the pack to be able to use it, even in an extremely limited way.

In the ***Title*** window, the fields really important are:

* **Base:** You must choose on which environment is based your title pack.
* **Manialink:** Is containing the code of your home screen.

If you want to put a solo campaign, you can specify the script of the gamemode of the solo mode (**Mode** in *Solo*), the Manialink of the solo screen in **Campaign** and the playlist of the campaign in **Playlist**.

For the maps of the campaign, the folder must be organized this way:
```txt
..../My campaign/01-myfirst group/01-myfirstmap
..../My campaign/01-myfirst group/02-mysecondmap
..../My campaign/02-mysecond group/01-myfirstmap
```

The same for the multiplayer, you can specify a gamemode script and a playlist (that you can use as example for instance).

>>>>> Putting a gamemode will made it mandatory to create a server for it, if you leave it blank, any gamemodes scripts can be loaded on the servers.

Once you have filled the fields you wanted, a folder will be created in `..\Documents\ManiaPlanet4\Packs` named with **TitlePackName**@**YourLogin**.

In this folder you'll find all the files related to your title pack. While you can add content in your title pack through the interface ingame, i recommend to edit the `ManiaPlanetTitle.xml` file to ease the process since with the interface, you have to put each element one by one instead just indicate a folder in file. To do it, open the file with a text editor and search this block (you may find more or less lines, that's normal):

```xml
<folders>
    <folder name="Scripts\" public="false" internal="false"/>
    <folder name="Maps\" public="false" internal="false"/>
    <folder name="Blocks\" public="false" internal="false"/>
    <folder name="Media\Images\TMConsole\" public="false" internal="false"/>
    <folder name="Media\Sounds\TMConsole\" public="false" internal="false"/>
    <folder name="Skins\Any\Advertisement\" public="false" internal="false"/>
    <folder name="Media\Manialinks\" public="false" internal="true"/>
    <folder name="Media\Font\" public="false" internal="true"/>
    <folder name="Items\" public="false" internal="false"/>
</folders>
```
In this section you're free to add any folder you want as long as they are located in the Title Pack folder.

The attribute `public` indicated if you want to let the players to see the files in these folders in the menus (like when you create a server and to add the maps of the titles in their servers).

You can also change almost any parameter in this xml file if you want to edit the settings quickier than to open the Maniaplanet client each time. Yet you'll have to update it in ***Edit Packs*** options ingame to take into account the changes.

>>>>> Also few options are only available in this file, like for setting correctly the logo, image or background of the Title Pack.

If you want to test your title without redoing the title pack each time (and being able to change files on the fly), put this text at the end of the shortcut of your ManiaPlanet.exe file: ` /testtitle=TitlePack_Name@YourLogin`

With the complete path:
```txt
X:\Path\To\ManiaPlanet\ManiaPlanet.exe /testtitle=TitlePack_Name@YourLogin
```

While in *Test mode*, if you want to refresh the manialinks/scripts of the title, press `Shift + Scroll lock`.

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

___

>>> As the automatic extration of data from manialinks doesn't work yet, you also have to explicitly include the data in the pack.

[1]: #building-the-title-case-and-stat-...
[2]: #manialink
[4]: ../../manialink/actions.html