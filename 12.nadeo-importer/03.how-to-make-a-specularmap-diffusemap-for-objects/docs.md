---
title: 'How to make SpecularMap/DiffuseMap for objects'
taxonomy:
    category:
        - docs
---

!!! Tutorial from ***xrayjay*** from this address: [http://www.maniapark.com/forum/viewtopic.php?f=85&t=22289](http://www.maniapark.com/forum/viewtopic.php?f=85&t=22289)


## Objects/Item texture specs
If you want to make some objects with selfmade textures (_TDNS_) you need some textures and the specifications for them. We are doing here textures for objects (may also useful for creating mod textures).

I will explain very quickly what are the specifications and how to save them in the right dds format.

## What you need

* a graphic manipulation software (ps, gimp etc.)
* a dds converter which allows you to set the specific output format (like the nvidia dds tools)

## File specifications
For selfmade textures on objects we need _TDNS_ textures:

* filename_D = DiffuseMap
* filename_N = NormalMap
* filename_S = SpecularMap

## The DiffuseMap - filename_D

![](http://trackmania-carpark.com/imagespark/up4/52cea5bd6a098.jpg)

* DXT1 RGB 4bpp no alpha
* 2D texture
* Generate MIP maps

This is the base texture which is visible, no alpha channel here! Save as `filename_D`.

## The NormalMap - filename_N
See this tutorial how to do this on this **[page](../how-to-make-a-normalmap)**.

## The SpecularMap - filename_S

![](http://trackmania-carpark.com/imagespark/up4/52cea735d118b.jpg)

* DXT5 ARGB 8 bpp interpolated alpha
* 2D texture
* Generate MIP maps

This texture and it´s alpha channel manipulate and set the shininess of our object ingame, it´s like on normal 2D skins, from black (matte) to white (shiny). Just do it with the same file as the DiffuseMap and add an alpha channel and save this as `filename_S`.

There are also other specific formats which can used on objects:

* filename_I (for illuminated parts) / tuto will follow later

For glass objects the DiffuseMap is used a little different, tut will come later how to do this.

>>>> All these specs refer to objects (and not to 2D skins!)

An alternative way to do these textures is to save all of them as 24bit tga files and import this tga files with the importer (instead of the dds ones), the nadeo importer will convert em into the right dds format. For files with alpha channel: They need to be 32bit tga with alpha saved!
I recommend to do the dds files by your own

>>>>> You can work in tga and use the importer to create the dds (see first post). You won't destroy your source with dds compression, and saves will be faster.