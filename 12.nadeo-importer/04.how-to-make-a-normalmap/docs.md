---
title: 'How to make a NormalMap'
taxonomy:
    category:
        - docs
---

!!! Tutorial from ***xrayjay*** from this address: [http://www.maniapark.com/forum/viewtopic.php?f=85&t=22211](http://www.maniapark.com/forum/viewtopic.php?f=85&t=22211)


Since we need NormalMaps (a kind of BumpMap in Nadeo games) for mods / objects etc. i will show you how you can make em very easy.
It´s that file at the objects with the `Filename_N` what we are doing here, for mods it´s similar.

## What you need

* Photoshop (you can get a trial version of the newest version there > http://tinyurl.com/2jfh8v )
* The Nvidia DDS tool > http://tinyurl.com/6fxqkhu
make sure that the nvidia plugin is installed correctly by clicking at the `filter` menu in ps, there have to appear a new point in the menu named `NVIDIA Tools`.

## Open your file where you would like to do a NormalMap
Now it should look like this (i used an example texture here)

![](http://trackmania-carpark.com/imagespark/up4/52b7788e3e8a8.jpg)

If you got some layers you need to reduce em to one background image (save your work as psd before)

Just right click on the bottom layer and choose there "reduce to background image"
![](http://trackmania-carpark.com/imagespark/up4/52b778f5d49ca.jpg)

## Open the NormalMapFilter
Just go to your filter menu and choose there the "NormalMapFilter"

![](http://trackmania-carpark.com/imagespark/up4/52b7793ce2211.jpg)

The following window appears:

![](http://trackmania-carpark.com/imagespark/up4/52b77958d7482.jpg)

You just need to do some configurations here:

* Set to "Biased RGB"
* Set the "Scale" to ~30 (higher number here = more 3D effect)

Upper left you can see here a little preview how your file will look like.
Check the other configs that they are the same like in the image here.
Hit `OK` to confirm this.

That´s it!

## Save as dds file
Go to file>save as> choose here dds as output format and the following window appears:

![](http://trackmania-carpark.com/imagespark/up4/52b77a417789d.jpg)

Check if you got the same configuration like here on this pic:


* 3Dc XY 8 bpp | Normal Map
* Generate MIP maps
* 2D Texture

Set as image option `Normal Map: Tangent Space`
![](http://trackmania-carpark.com/imagespark/up4/545771fff4083.jpg)

Confirm this step with ok and now we´re ready to save our image.
Just hit the `Save` button and your dds file will be created.

We are finished, that´s all, really easy ;)