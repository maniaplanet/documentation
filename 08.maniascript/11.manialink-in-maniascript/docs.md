---
title: 'Manialink in ManiaScript'
taxonomy:
    category:
        - docs
---

It's possible to write some Manialink code in your script. This is useful when you want to display some custom information or even to create a complete custom ingame UI.

If you want to do so, you first have to create a text variable which will contain the manialink and then treat the manialink:

```
declare Text MLText = "<label pos="0 0" z-index="0" text="This is an example"/>";

Layers::Create("ExampleUI", MLText);
Layers::SetType("ExampleUI", CUILayer::EUILayerType::Normal);
Layers::Attach("ExampleUI", Player);
```

In the example, once you have stocked your manialink in the text variable, you check if a layer (of the UI) already has the desired name for the layer. If not, we create it and then we specify the type of the layer and we attach it to the UI of the player.

>>>>> You can add a multilines content text variable by using the delimiter `"""` instead of `""`. By doing this you can write on multiple lines with the formatting and then indicate the end of the content to add in the variable.

At the end of the round (or the map), I recommend to destroy all the layers to avoid redundant information on the screen of the player. To destroy the layers, you must use this instruction directly in the script:

```
Layers::DestroyAll();
```