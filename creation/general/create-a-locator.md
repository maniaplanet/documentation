---
layout: default
title: Create a locator
description: Tutorial for creating a locator for Trackmania² & Shootmania
tags:
- creation
- general
---

*Note: Tutorial from **Zazibar** from [VineSauce forums][1]*  
*Note 2: This tutorial works for all Maniaplanet environments (Trackmania² Canyon, Trackmania² Stadium, Trackmania² Valley and Shootmania Storm)*

You will need:

* A text editor (Notepad is fine)
* A file host (See below)

By default, custom content in Trackmania is shared via P2P (Peer-to-Peer). This can be pretty slow and it can be taxing on your connection too. Imagine playing with 40 other players and having to share your custom content via P2P with each of them. This is where locators come in.

A locator is basically a text file that contains a URL to custom content hosted online. This means that when you join a game, the other players will download your custom content from the URL in the locator file instead of downloading it via P2P. This not only saves bandwidth but it also allows the other players to download your custom content faster.

You'll need a file host that allows direct linking (i.e. no waiting times for downloads, the file downloads as soon as you visit the URL). For now, I am using [Dropbox][2] although I'm not sure if I'm even allowed to use it for hosting these files but fuck the police. An alternative is [FileDen][3] which would probably be better in the long run.

**Note from Nadeo: we strongly suggest to host locators on personal webservers. Dropbox may disable content linked from them if the bandwidth used is too high. We also suggest to avoid all file hosters requesting a captcha in order to download the file, it won't work.**

You can create locators for all custom content including horns and I'll show you how to do both.

First, you'll want to make sure you can see the file extensions in your folders. In Windows 7/Vista, open a folder and click `Organize` -> `Folder` and search `Options` -> `View` -> `Uncheck Hide extensions for known file types`. On Windows XP and earlier, upgrade your shit, it's 2011. :3

![][4]

When you paint a car, the skin is saved in a .zip file in `Documents\ManiaPlanet\Skins\Vehicles\CanyonCar`. Browse to the folder that contains the custom content you want to create a locator for, right click -> `New` -> `Text document`.  
Name this file exactly the same name as the file you're creating it for and add .loc to the end. I'll be creating a locator for ThatDog.zip so I named my locator ThatDog.zip.loc.  
**The locator must have the same name and be in the same folder as the file you're creating it for.**

![][5]

Now you'll want to upload the file you're creating the locator for to your selected file host and copy the URL for it. Here's how it looks on Dropbox.

![][6]

Now, open the .loc file you created earlier in Notepad, paste the URL into it and save. I'm using Notepad++ because I'm awesome.

![][7]

As I said earlier, you can do this for any custom content. Here's how my Gal O Sengen horn is set up.

![][8]

**And you're done!**



[1]: http://vinesauce.com/vinetalk/index.php?topic=850.msg13648#msg13648
[2]: http://www.dropbox.com/
[3]: http://www.fileden.com/
[4]: ./img/Locator_img_explorer.jpg
[5]: ./img/Locator_img_explorer2.png
[6]: ./img/Locator_img_explorer3.jpg
[7]: ./img/Locator_img_npp.jpg
[8]: ./img/Locator_img_explorer4.jpg
