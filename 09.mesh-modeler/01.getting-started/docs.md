---
title: 'Getting Started'
taxonomy:
    category:
        - docs
visible: true
---

[TOC]

The Mesh Modeler allows you to edit 3D geometry. If you open the Mesh Modeler directly from the *Title Tools* menu and save your work, it will generate a .Crystal.Gbx file of very limited use: you cannot put a *crystal* directly in a map.

Maps can contain items and custom blocks, which are .Item.Gbx and .Block.Gbx files automatically embedding a crystal file. So the Mesh Modeler must be used in combination with the Item Editor and the Block Editor to actually put your custom geometry into maps.

So here is the recommended way to use the Mesh Modeler:

- first open the Map Editor, and then use the *Item edition* or *Custom blocks* panels (at the bottom left corner of the screen in Item mode or Block mode) to create or edit items or custom blocks
- those options will take you to the Item editor or the Block editor, where you can set a few parameters, including the geometry of your item or block (*Mesh* in Item editor, *Customized variants* in Block editor)
- if you try to edit this geometry, you will switch to the Mesh Modeler, which has all the tools you need to build 3d models
- when you save your work in the Mesh Modeler opened from the Item Editor or the Block Editor, it will not save a .Crystal.Gbx file but a .Item.Gbx or .Block.Gbx file.
- when you go back to the map editor, you can find your item or custom block in the corresponding inventory (in Item mode or Block mode) and place it in the map.