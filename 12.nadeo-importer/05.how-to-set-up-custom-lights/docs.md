---
title: 'How to set up custom lights'
taxonomy:
    category:
        - docs
---

!!! Tutorial from ***xrayjay*** from this address: [http://www.maniapark.com/forum/viewtopic.php?f=85&t=20156](http://www.maniapark.com/forum/viewtopic.php?f=85&t=20156)


As many people asked me how to set up custom lights i will explain the needed steps for that action here.

First of all we have to know that we only can set custom lights to parts which are included inside the DetailsDiffuse.dds, it´s not possible to light up parts which are included inside the SkinDiffuse.dds

To make parts glow/light em up we only have to customize the DetailsIllum.dds alpha channel, thats pretty all the work we have to do, really easy i guess.

But don´t forget that you have to work on two files to set up a custom light:

* DetailsDiffuse.dds
* DetailsIllum.dds

Both files need the same light design/outfit that the illumination will look good. Inside the DetailsIllum.dds you can set up the light a bit different (same outfit but other light effect is possible, f.e. a highly illuminated brake light or similar).

Take as reference for that action the Nadeo specifications > http://www.maniapark.com/forum/viewtopic.php?f=14&t=19105 and the Nadeo Original Canyon Car files > http://www.maniapark.com/ressource.php?id=1 (I used this file in the picture here)

![](http://trackmania-carpark.com/imagespark/up3/4f57413c5e36c.jpg)

On this picture you will see the alpha channel of the DetailsIllum.dds

Another example with a part of the original Canyon Car Details textures

![](http://trackmania-carpark.com/imagespark/up3/51f6627f592ee.jpg)

Use as alpha color for normal lights (illuminated in the dark only tracks) `#676767`

Use as alpha color for brake lights (illuminated in the dark only and on day maps if the brake will be hit) `#030303`

### Alpha editing (most important here)
Inside the DetailsIllum.dds have to be only the parts which should lighten up (front/rear lights or other light parts), rest of the DetailsIllum.dds are black (the alpha channel for these parts are **white** here).

That's pretty much all we have to do, not really hard work i guess.

DDS settings for export:

![](http://trackmania-carpark.com/imagespark/up2/4e5d3c4caeb07.jpg)

Don´t forget to save as DXT5 with interpolated alpha DDS with mipmaps and your custom brake lights/other light parts will work.

As example i used this technique on my "Black Sheep" skin to light up the rims and other custom lights (only possible because the rims are included inside the DetailsDiffuse.dds) > http://www.maniapark.com/ressource.php?id=287 or another example for custom back and brake lights are my "Ultimax" skin > http://www.maniapark.com/ressource.php?id=253

>>>> Alpha channel must be correct that the lights will work correctly. Remember that for the light part all files have to match/fit together: DetailsDiffuse.dds // DetailsIllum.dds