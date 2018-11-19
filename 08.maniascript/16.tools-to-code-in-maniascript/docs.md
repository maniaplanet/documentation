---
title: 'Tools to code in ManiaScript'
taxonomy:
    category:
        - docs
---

## InGame editor

The easiest way to create and edit scripts is to use the in-game editor. It is accessible through different ways depending of which kind of script you want to create.

- Rules: create an ingame server (online or LAN) and select the mode you want to edit. Once you're playing on the server, press the `Scroll lock` key to open the editor.
- Map type: launch the map editor, select the map type you want to edit on the top left of the screen and then press the `Scroll lock` key.
- Map editor plugin: launch the map editor and click on the plugin icon on the bottom of the screen. Then just click on the create button on the left of the screen. If you want to edit an existing script, click on the small "+" button above a plugin and after on the edit button on the left of the screen.

![Script editor](./img/script-editor.png)

1. The main working area, this is were you'll type your script.
2. The include panel displays all the external scripts used by your own script.
3. The "Compile" button allows you to check if there's no error in your script.
4. The "Save as" button allows you to save the current script at a specific location with a new file name.
5. The "Include" button displays or hides the include panel (2).
6. The "Save and test" button saves all the open scripts and lets you test your game mode on the server.
7. The "Close" button lets you exit the script editor, __but you'll loose all the unsaved modifications__.

![Documentation example](./img/debugger-small.png)

While playing you can press ctrl+g to open the log window. This window will be essential when developing a new script, but we will see later how to use it efficiently.

![Documentation example](./img/debugger-big.png)

If you press ctrl+g a second time you will open the full debug window (and a third time will close it).

1. The script you are currently debugging. If there's an error in the script, the window will display the line causing the error.
2. The log window.
3. A list of all the running scripts. You can click on each script to open it in the left area. The scripts containing errors will be displayed in red.
4. A list of all the previous compilation errors. You can click on each error to have more information about it.


## Editor shorcuts

While playing:

  * scroll-lock: open the script editor
  * Shift + scroll-lock: reload the script from disk.
  * ctrl + g or ctrl + ² / ctrl + ~: open the log window / open the debug window / close the debug window

While editing a script

  * ctrl + a: select all
  * ctrl + z: undo
  * ctrl + y: redo
  * ctrl + f: search
  * ctrl + g: go to line #
  * ctrl + h: search and replace
  * ctrl + c: copy the selection
  * ctrl + x: cut the selection
  * ctrl + v: paste the selection
  * ctrl + home: go to the beginning the script
  * ctrl + end: go to the end of the script
  * ctrl + numpad+: increase the font size
  * ctrl + numpad-: decrease the font size
  * ctrl + F3: quick search next on the selection
  * ctrl + shift + F3: quick search previous on the selection


## External tools

It's not recommended to do that when you begin to write scripts, but you can also edit them with any text editor. __Be aware that Maniaplanet caches some resources like scripts. So if you update a script with an external editor it won't be reloaded in the game at the same time.__ Most of the time you have to restart the server running the script to get the newer version.

!!! Yet you can in some cases force reload the manialinks/scripts by doing `Shift + Scroll lock` on your keyboard.

Once you're accustomed to the ingame editor, you can use one of those editors:

* [Microsoft Visual Code](https://code.visualstudio.com) (Windows / MacOS / Linux)
* [Atom](https://atom.io) (Windows / MacOS / Linux)
* [Notepad++](https://notepad-plus-plus.org) (Windows)
* [Sublime Text 2 or 3](https://www.sublimetext.com/3) (Windows / MacOS)

Some of these editors have a syntax highlight (or even auto-completion) plugins for ManiaScript:

* [ManiaScript syntax highlighting and auto-completion for Microsoft Visual Code](https://marketplace.visualstudio.com/items?itemName=mmcfarland.vscode-maniascript) by tonechild
* [ManiaScript syntax highlighting and auto-completion for Sublime Text 2/3](https://github.com/ManiaPlanet/Sublime-ManiaScript) by Cerovan
* [Maniascript syntax highlighting for Notepad++](https://github.com/ManiaPlanet/notepadplusplus-maniascript) by Magnetik
