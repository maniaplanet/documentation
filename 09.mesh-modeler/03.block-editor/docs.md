---
title: 'Block Editor'
taxonomy:
    category:
        - docs
visible: true
---

The Block Editor allows you to edit custom blocks (`.Block.Gbx` files) that can be placed in maps. It can be accessed only from the Map Editor, via the *Custom blocks* panel, at the left bottom corner of the screen in Block mode.

We will go through the list of parameters you can set, after a quick introduction about the difference between custom blocks and Nadeo blocks.


## Custom blocks vs Nadeo blocks

Blocks are the main elements used to build maps. You can place them in the Block mode of the Map Editor. They are automatically snapped to a wide 3d grid which make them easy to place and align.

The default official blocks that you can see in the Block mode inventory, which we will call *Nadeo blocks*, are complex data with a huge number of parameters defining how they will react to the terrain they are placed on, if they can be placed in the air, with which pillars, etc.

A unique Nadeo block can contain several *variants* of geometry, which are automatically selected according to the surroundings of the block (most blocks have one ground variant and one air variant, but some blocks can have only one of those, or even several dozens of variants).

Another of those complex parameters worth mentionning are *clips*: these are little pieces of geometry that are placed at the edges of the block and are automatically removed when you place another block with a matching clip just next to it (to smooth out the transition between the two blocks and save performance).

Custom blocks is a limited feature to allow players to make their own blocks. A custom block has to inherit from a Nadeo block (you select it when you create the custom block, in the Map Editor), and if you don't change anything, it will behave exactly as this parent Nadeo block. It has the same number of variants, the same clips, the same volume in the 3d grid... The only things that you can customize are:
- the icon to represent it in the block inventory
- the geometry of each variant



## Icon

Works exactly as in the Item Editor.


## Customized variants

Add one element in this list for each variant you want to customize. You must define:
- which variant is overriden: a variant is represented by a *Variant type* (generally *Ground* or *Air*), a *Variant group* (an integer) and a *Random variant* (another integer). Tick the option *Show original variant* to see the original geometry of the variant you are about to override.
- which *crystal* will replace the original geometry for this variant. Click on the button at the end of the parameter line (with a *New* or *Edit* icon) to edit this embedded *crystal* in the Mesh Modeler.

>>>>> When you first create a line of customized variant, it is marked as *(empty)*: it means that there is no *crystal* yet, and then the Map Editor will still use the original geometry for this variant.
