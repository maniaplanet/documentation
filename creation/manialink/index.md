---
layout: menu
title: ManiaLink
description: ManiaLink help
tags:
- creation
- manialink
---

ManiaLinks are the "web pages" of ManiaPlanet.

You have also register for a (short) ManiaLink [on the PlayerPage][1]. It's a way to have a shorter link for your ManiaLink.

* [Dedicated server manialinks][2]
* [Manialink actions][3]
* [Manialink Virtual Reality friendly][4]
* [Manialink styles and substyles reference (JSON)][5]

## The structure of Manialinks
This is the structure of a Manialink

{% highlight xml %}
<?xml version="1.0" encoding="utf-8" standalone="yes" ?>
<manialink version="2">
<label text="Hello World!" />
</manialink>
{% endhighlight %}


This allow to tell which version of the xml that we use and the encoding format. In ManiaPlanet, we use UTF-8 because it allows to take into consideration specials characters.
{% highlight xml %}
<?xml version="1.0" encoding="utf-8" standalone="yes" ?>
{% endhighlight %}


This means that we begin a ManiaLink page with the version 2. The version 1 fit with ManiaPlanet convention. It's possible to not indicate the version or version="0" but in that case, it will be the norm of TrackMania Forever. The version 1 is the one used from Maniaplanet 1 to Maniaplanet 3 updates, the version 2 add several improvements like stylesheets. In the next part of this tutorial, we will use only the version 2.
{% highlight xml %}
<manialink version="2">
{% endhighlight %}


This line allow to write a text. In that case, it'll be written Hello World. As there is no parameters added in this line, the text wil lbe centered in height and the letter "H" will be centered on the width.
{% highlight xml %}<label text="Hello World!" />{% endhighlight %}


This means that we'll finish our ManiaLink page.{% highlight xml %}</manialink>{% endhighlight %}


## The coordinates
Let see now the cooordinates to place the elements on our page.


The version 1 of Manialink are here to fit on 16:9 screens. The coordinates in X go to -160 to 160, in Y to -90 to 90 and on Z to -75 to 75.

To place an element, you have only to add posn="X Y Z" in a marker. X, Y and Z are the coordinates on X, Y and Z.

For the size of a element, you have only to add sizen="X Y" in a marker. X and Y are the size on X and on Y.

It's possible to align an element to related to the coordinates given with <halign> in horizontal or <vhalign> in vertical and in adding either center, left, right for halign and top, center,bottom for vhalign. this can be useful for texts and then to center them in a block.

It is advisable to use the new standard in ManiaPlanet.

## The common functions
We will now learn the new common functions. There is more but it will for a more elaborate tutorial.

**<frame>** : a frame is a set of elements that we stick together with the tag <frame>. A frame is a non-visible element but we can move the ensemble of the frame at the same time, which will allow to earn some time to place the elements to one from each other.

In our example, the first quad is placed at the location X=10, Y=10 et Z=0. The second one is placed at X=-10, Y=0 and Z=0 in comparaison to the frame, so en X=0, Y=10 abd Z=0 in absolute position.
{% highlight xml %}
<frame posn="10 10 0">
<quad sizen="10 10" bgcolor="F00A" />
<quad posn="-10 0 0" sizen="10 10" bgcolor="00FA" />
</frame>
{% endhighlight %}


**<quad>** : allow to insert an element as a picture, a block with a background or a ManiaPlanet element which are available on the ManiaLink "exemple".



In our example, we display a rectangle of 10x10 with a blue background. For the color code, this is in hexadecimal, this is working like the username in the game and the fourth character match with 0 without transparency and F entirely transparent.
{% highlight xml %}
<quad posn="-10 0 0" sizen="10 10" bgcolor="00FA" />
{% endhighlight %}


**<label>** : allow to display text with differents styles which are available on the ManiaLink « exemple ».


**<audio>** : allow to put an audio file on a ManiaLink with a button or to stop the music. play="1" means that the song will be loaded, else to have to put 0.
looping="0" signifie que la musique ne recommencera pas à la fin, sinon il faut mettre 1.
{% highlight xml %}
<audio data="./audio.ogg" play="1" looping="0" />
{% endhighlight %}


**<music>** : allow to put an audio file but without that the visitor can lstart or stop the music, it will be launched automatically in background after the loading. Only ogg files or mux are accepted. The line must be outside of <frame>.
{% highlight xml %}
<music data="./music.ogg" />
{% endhighlight %}


**<include>** : allow to insert a xml file.
{% highlight xml %}
<include url="./page.xml" />
{% endhighlight %}


## Concret example

### Content of the file example.xml

{% highlight xml %}
<?xml version="1.0" encoding="utf-8" standalone="yes" ?>
<manialink version="2">
<include url="./background.xml"/>
<quad posn="-80 45 1" sizen="160 90" style="Bgs1" substyle="BgWindow" />
<quad posn="-70 44 2" sizen="140 12" style="Bgs1" substyle="BgWindow2" />
<label posn="0 40 3" halign="center" text="$w$f00Bienvenue sur notre page de test" />
<label posn="0 30 2" halign="center" text="$h[Exemple]Voici un lien manialink$h" />
<label posn="0 20 2" halign="center" text="$l[www.maniaplanet.com]Voici un lien url vers le site www.maniaplanet.com$l" />
<label posn="0 0 2" halign="center" style="CardButtonMedium" text="Maniacode" manialink="Lien vers un maniacode" />
</manialink>
{% endhighlight %}


### Content of the file background.xml

{% highlight xml %}
<quad posn="-160 90 0" sizen="320 180" image="./background.jpg"/>
{% endhighlight %}


### This is the result

![Tutorial Manialink][6]


You can download all the file [here][7]

[1]: https://player.maniaplanet.com/advanced/manialinks
[2]: server.html
[3]: actions.html
[4]: vr.html
[5]: styles.json
[6]: img/tutoriel_manialink.jpg
[7]: http://bczteam.com/~jonthekiller/Manialinks/Tutoriel_manialink.zip
