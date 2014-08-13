---
layout: menu
title: Title Pack
description: Title creation help
tags:
- creation
- title
---

#Introduction
A Title Pack is a set of elements "combined" together to create a new experience. By using a Title Pack, you will have access to several dedicated tools to create really custom the environment. With it you can use the following features:

* the ActionMaker: a tool to create custom animation, custom weapons
* The Item Editor: To create objects for the Map Editor dedicated to the Title Pack, items (like pickup boxes), bots, lights
* The ability to change the textures of the environment, to create new moods

Create a title pack offers also several features very helpful to control the experience:

* A dedicated ladder
* A customizable Home
* A way to control the progression of the online servers (open or not the 100k for example, how much point you can gain by victory)
* To hide the source code of the gamemode

Here is few examples of Title Packs:

* **TrackMania RPG**:
<iframe width="640" height="360" src="//www.youtube.com/embed/MJCvqsYPOP8" frameborder="0" allowfullscreen></iframe>

* **CardMelee**:
<iframe width="640" height="360" src="//www.youtube.com/embed/RS7je0ehHck" frameborder="0" allowfullscreen></iframe>

As you can understand now, a Title Pack can be equivalent to a little game when you use all the features (use of the item, new art design, use of the bots, creation of weapons), it can be totally different to ShootMania (a bit less for TrackMania for the moment as it has less possibilities than ShootMania).

<br/>
# Create a Title Pack
Description of the [ManiaPlanetTitle.xml](xml_description.html) file format.

## Where?
On the main menu with the stations, move up to the titles list by pressing page up, or dragging the stations down.  
Then clic on the little "+" on the bottom  
And clic on titles.

In the title menu, you can either "**create a new pack**", or update an existing one by clicking on it's name.
(when you edit an existing one, the people that already unlocked a previous version by paying you planets will not have to do it again for the update)

At this point you can just put together some of your creations in a pack - like a vehicle, or tracks... (as before Maniaplanet 2)  
You can set a pretty pack name, some description, the price.
And you can define a link.  
This should be a link of a page describing the title and how to get it, as this is the link that will be given to the players when they don't have the title, or it is outdated.

Or you can also include title informations to **create a title pack**, by clicking on the title button.

The first time you clic on the title button, you'll be requested to enter the identifier of the title, which is used to make the unique identifier of the title (in the form  title@yourlogin).
you can't alter it once it's created.


## Title creation infos

At this point a form is diplayed to select the **title creation infos**.

*As a general rules all fields are optional. Only fill in the ones you need to use.*

### Title

* *Base:* is to say whether it's a title that uses data from storm or canyon, or none. (like a manilink based minigame or infopage)

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

* *Manialink: * a  manilink page to display instead of the standard title menu. => [[2]][2]

* *Colour:*  not yet implemented, forgot to remove it..  :mrgreen:

**Editor:**

*  *Map type:*  you can select a maptype script, to be used when creating new maps in your pack.

### Solo
Here you can create a simple/classic campaign,  or you can further customise with a custom script.
(caveat: it doesn't work in SM yet, although it should be possible to create like timeattack campaigns once I fix it)

*  *Mode:*  you can choose a mode script to be used in solo races.  Other wise it's the classic timeattack mode.
*  *Campaign:* select a folder with the campaign tracks.  The layout should be:
{% highlight xml %}
..../My campaign/01-myfirst group/01-myfirstmap
..../My campaign/01-myfirst group/02-mysecondmap
..../My campaign/02-mysecond group/01-myfirstmap
{% endhighlight %}
point it to the `.../My campagin` folder.
The maps and groups are sorted in alphabetical order of the file names, so prefixing with a number is a good idea..
*  *Medals:*  the total number of medals that the player can win in the campaign. (that's usually 4 x number of maps, but if it's a custom mode the number may be different. for instance in the platform title only 3 medals per map are earnable)  --> that's used for the medal rankings.
*  *Playlist:* if you don't want to use the classic campaign menu and make advanced scripting, that's the way to input the list of maps to use. (But otherwise leave it empty.)

### Network

*  *Mode:* The script mode to use.  (that is, when creating a server, the mode is forced)
*  *Playlist:*  The playlist to use. (that is, when creating a server, the playlist is forced)  --> so use this only in a specific case where you want to alway enforce a specific playlist in the servers for this title.


## Extra contents
You can also add **extra contents** in the pack, to make it available to the player when he is in the title.
Clic on contents, an you'll see all data automatically included for the title description.

You can clic on "add" to add extra contents.

That's where, for instance,  you can include playlists to make them available when creating a server, but not enforce to use them or extra maps, and so on...


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

*caveat*: Still missing is the UI to have multiple beneficiaries of the planets, and to depracted old revisions of the packs.

As well as the audience statistics to know who installed your title, and so on.

## Building the title case and station
The title cases and stations are built from a image and some logos.

*  *Packimage.jpg* should be a 16:9 image, that is shown in the stations. and the central part is used for the title case.
*  *MenuBg.jpg* is a image that is used as background in the menus when there is no replay
*  *Logos.png* is the plate with all the logos. The layout is provided in the image attached to this post.
The icon on the top right is unused at this point, but will probably be used at least to replace the maniplanet logo in the systembar.
*  *Menuheader.png* is used for the menu bar on the left when enterring the title.

There is also ManiaplanetTile.xml in the folder, which contains the data from the title form.  
You shouldn't modify it if you're not an advanced user.

*However, advanced users can edit it to change data no exposed in the menu. But be carefull that the game overwrites it quite often while you're editing the pack in the menu and may not reload your changes.  The best is to leave the edition of the title in the game when you want to edit this file.*

![Logos Legend][3]

## Manialink
If you make a custom manilink for the menu, there are some specific actions available to redirect back to the usual menus.

Those actions are available in the [documentation][4].

Example:  
{% highlight xml %}
<label posn="-130 -80" halign="center" style="CardButtonMedium" text="Close" action="quit"/>
{% endhighlight %}


If you want to include data in the pack, you can put your files in `My Documents/Maniaplanet/Media/...`
and then use the url `file://Media/...` to use it.

*(note: Media/ is mandatory, you cannot  put the files in an other root folder)*

*Caveat*: as the automatic extration of data from manilink doesn't work yet, you also have to include explicitly the data in the pack.

# Create a weapon
As noted above, you can create a weapon for your title pack. To learn more about that, just [follow the tutorial](./actionmaker/create_weapon.html).

[1]: ./index.html#Building-the-title-case-and-station
[2]: ./index.html#Manialink
[3]: ./img/Title_LogosLegend.png
[4]: ../manialink/actions.html
