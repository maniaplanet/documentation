---
layout: menu
title: ManiaScript
description: ManiaScript help
tags:
- creation
- maniascript
---

# Introduction to Maniascript

Maniascript is a powerful scripting language for ManiaPlanet games, you can write new games modes, plugins for the map editor, or make you manialinks more interactive.

If you have programmed before, the basic keywords and language syntax should be quite easy to master.

Filename extension for scripts is ".script.txt"

### Where to write your script ?

The way to create or change a script depends on the type of script you want.

- To edit a GameMode, launch a solo or LAN game, and press Ctrl + ScrollLock. If you want to create a new one, lanch an existing one, then press Ctrl + ScrollLock, then SaveAs with a new name.
- To edit or create an mapeditor plugin, use the plugin menu (the "fork" icon) in the editor
- To have a script in a manialink XML file, add a <script> ... </script> part in the manialink XML file

To learn more about those different contexts, see [here...](./script-contexts.html)


### Debug
When trying to found bugs in a script, you'll use the Debugger. For now, you can only access it by pressing Ctrl+~. It works pretty much anywhere in game. It has 2 modes : a reduced mode where you can only see the logs without interacting, and the Full mode. In Full mode you can select the script that you want to debug (because many scripts can be running at once, for example a camera effect, and the rules of your game). It will show you only the log of the selected script, along with the code of the script, which you can not edit there.

# General

* [Syntax basics](general/syntax-basics.html)
* [Reference card](general/refcard.html)
* [Useful links](general/links.html)
* [How to generate the documentation](general/generate-doc.html)
* [ManiaScript style convention](conventions.html)
* [Landmarks in ManiaScript](general/landmarks.html)

# Libraries

* [UI](libraries/library-ui.html)
* [CustomUI](libraries/library-customui.html)
* [Manialink](libraries/library-manialink.html)
* [Markers](libraries/library-markers.html)
* [MiniMap2](libraries/library-minimap2.html)
* [ScoresTable2](libraries/library-scorestable2.html)
* [ShootMania/AFK](libraries/library-afk.html)
* [ShootMania/Map](libraries/library-shootmania-map.html)

# Tutorial

- [Introduction](tuto/introduction/)
    - [What is ManiaScript?](tuto/introduction.html#what-is-maniscript)
    - [What can I do with it?](tuto/introduction.html#what-can-i-do-with-it)
        - [Rules](tuto/introduction.html#rules)
        - [Map Type](tuto/introduction.html#map-type)
        - [ManiaLink](tuto/introduction.html#manialink)
        - [Map editor plugins](tuto/introduction.html#map-editor-plugins)
        - [ManiaPlanet plugins](tuto/introduction.html#maniaplanet-plugins)
    - [Tools](tuto/introduction.html#tools)
        - [InGame editor](tuto/introduction.html#ingame-editor)
        - [Editor shortcuts](tuto/introduction.html#editor-shortcuts)
        - [External tools](tuto/introduction.html#external-tools)
    - [How to extract the Nadeo script](tuto/introduction.html#how-to-extract-the-nadeo-scripts)
    - [Script folder structure](tuto/introduction.html#script-folder-structure)
- [Your first script](tuto/your-first-script.html)
    - [Create a basic script](tuto/your-first-script.html#create-a-basic-script)
    - [Create a map](tuto/your-first-script.html#create-a-map)
    - [Create a server](tuto/your-first-script.html#create-a-server)
    - [Structure of a gamemode](tuto/your-first-script.html#structure-of-a-game-mode)
    - [Download the source of the gamemode](tuto/your-first-script.html#download-the-source-of-the-mode)
- [Learn more about the ManiaScript](tuto/going-further-with-maniascript.html)
