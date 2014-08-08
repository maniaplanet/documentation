---
layout: default
title: Maniascript intro
description: Introduction to Maniascript
tags:
- creation
- maniascript
---

Introduction to Maniascript
=====

Maniascript is a powerful scripting language for ManiaPlanet games, you can write new games modes, plugins for the map editor, or make you manialinks more interactive.

If you have programmed before, the basic keywords and language syntax should be quite easy to master.

Filename extension for scripts is ".script.txt"

###Where to write your script ?

The way to create or change a script depends on the type of script you want.
 - To edit a GameMode, launch a solo or LAN game, and press Ctrl + ScrollLock. If you want to create a new one, lanch an existing one, then press Ctrl + ScrollLock, then SaveAs with a new name.
 - To edit or create an mapeditor plugin, use the plugin menu (the "fork" icon) in the editor
 - To have a script in a manialink XML file, add a <script> ... </script> part in the manialink XML file
 
 To learn more about those different contexts, see [here...](./script-contexts.md)


###Debug
When trying to found bugs in a script, you'll use the Debugger. For now, you can only access it by pressing Ctrl+~. It works pretty much anywhere in game. It has 2 modes : a reduced mode where you can only see the logs without interacting, and the Full mode. In Full mode you can select the script that you want to debug (because many scripts can be running at once, for example a camera effect, and the rules of your game). It will show you only the log of the selected script, along with the code of the script, which you can not edit there.
