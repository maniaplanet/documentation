---
layout: default
title: ManiaScript contexts
description: The various ManiaScript contexts
tags:
- creation
- maniascript
---


Where to write your script ? The short version.
=========================

The way to create or change a script depends on the type of script you want.
 - To edit a GameMode, launch a solo or LAN game, and press Ctrl + ScrollLock. If you want to create a new one, lanch an existing one, then press Ctrl + ScrollLock, then SaveAs with a new name.
 - To edit or create an map-editor plugin, use the plugin menu (the "fork" icon) in the editor
 - To have a script in a manialink XML file, add a &lt;script&gt; ... &lt;/script&gt; part in the manialink XML file
 
 
More details
=========================

## GameModes

GameModes for Trackmania and Shootmania are located in the "" folder of your Maniaplanet User directory (Usually "My Documents/Maniaplanet")


## Manialink

There are two ways for specifying your ManiaScript in a ManiaLink XML file:
* XML comment
	* Surround the script with the XML comment tags. Make sure the script itself does not contain "-->" or it will break the XML file.
```
<script><!--
	*your script here*
--></script>
```

* CDATA block
	* Define the script as a CDATA block. If the string "]]>" occur within your script, replace it with "]]]]><![CDATA[>" to keep the XML file valid.
```
<script><![CDATA[
	*your script here*
]]></script>
```
