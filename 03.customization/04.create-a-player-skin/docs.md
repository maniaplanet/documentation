---
title: 'Create a player skin'
process:
    markdown: true
    twig: true
taxonomy:
    category: docs
---

>>>>>> Tutorial from **iyumichan** from the Maniaplanet forums

# Getting Started

First you will need a program able to edit or convert dds images.

There are 3 possible tools that I know off:

Directly Editing:
[Gimp][1] + [Gimp DDS Plugin][2] (Free)
[Adobe Photoshop][3] (Not free) + [Nvidia Texture Tools Plugin][4] (free)

Converting and viewing:
[DXTbmp][5] (Free)


# Getting the Playerdata

You can get the default StormMan Data from here: `C:\ProgramData\ManiaPlanet\PacksCache\ShootMania.zip\ShootMania\Items\Characters\ArenaPlayerDefaultSkin.zip`
Driveletter might differ!

Now that you have this file unpack it into a folder.


# Data Explained
What you are now seeing are the textures and meshes of the default player.

**Icon.dds**  
This is the icon you see in player selection.

**Diffuse.dds**  
This is the texture you normally see ingame. Heres the face and armor of the player.

**Normal.dds**  
This is basically a hightmap for the Diffuse.dds I recommend generating a new one if you edited Diffuse.dds

**Energy.dds**  
This contains the glowing parts of the armor. If you want the head of the player to glow purple then you would need to paint the place where the face in diffuse.dds is purple in Energy.dds

**Specular.dds**  
Defines shininess and highlight colour.  Same size as Diffuse.dds and everything is at the same place.

**TeamMask.dds**  
This defines which parts are teamcolored or colored with your set trailcolor. Same size as Diffuse.dds and everything is in the same place.

**Player.anim.gbx**  
Contains Player Animations.

**Player_1.Solid2.gbx**  
Contains Player Model.

**Horn.wav**
The default horn sound for this skin.  (which can be overriden in the profile menu in-game)

**Sound\**
Replicate (part of) the contents of `ShootMania\Media\Audio\Sound\Character\Man\` (included in `C:\ProgramData\ManiaPlanet\PacksCache\ShootMania.zip`) and override the sounds as you like for your skin.


# Packing the things up
Once you're done with your edits you probably want to see this ingame. To have this ingame you will need to pack the files I listed before into a zip archive. When you zip it the most important thing is that the archive should not contain any folders. Besides that the only thing worth to mention is that the zip archive name (excluding .zip) will be the name of your skin that is shown ingame.

You can use the following programs to zip your files:
* [7zip][6]
* [WinRAR][7]


# Moving it Ingame
Get your zip and move it to `username/my documents/maniaplanet/skins/vehicles/arenaplayer/`  
Once you got the zip there go ingame and start shootmania.

Go to Profile and then Models. Select your skin and when exiting the profile answer yes to "apply changes". Once you are going online you will be asked if you take responsibility for the skin you are using.  
At this point remember that you don't steal images or characters made by other people. Breaking a copyright is a crime. If you wish to use stuff other people created in your skin then you will have to ask them.


# Share Your Skin
You can share your skin easily with [Maniapark][8], which has a dedicated section (Shootmania => Skins).

Once you have your skin somewhere online you will have to ensure that other players also see it and therefore you will have to create a locator file.  Create an empty txt file and open it. Enter the link to your uploaded skin (for example [http://the-team-mystery.com/tm2/JokerMan.zip](#)) Now save the file and rename the txt file to the same name as your zip file plus adding the .loc ending. So if your file is called mycoolskin.zip then you name your locatorfile mycoolskin.zip.loc

Now you only have to move that loc file into the same directory you put your skin file. If you don't remember it then here it is again: `username/my documents/maniaplanet/skins/vehicles/arenaplayer/`

If you are playing now the players will download the skin from the link you specified in the locator file ;)


You are done! I hope you found this helpful and have fun being creative!

![](joker_skin.png)

[1]: http://www.gimp.org/
[2]: http://code.google.com/p/gimp-dds/
[3]: http://www.adobe.com/products/photoshop.html
[4]: http://developer.nvidia.com/nvidia-texture-tools-adobe-photoshop
[5]: http://www.mwgfx.co.uk/programs/dxtbmp.htm
[6]: https://www.7-zip.org/
[7]: https://www.win-rar.com/
[8]: http://www.maniapark.com/
