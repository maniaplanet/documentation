---
title: 'Using layers'
taxonomy:
    category:
        - docs
---

[TOC]

In ManiaScript you can create a layer if you want to divide or limite the amount of Manialink code in your ManiaScript code. There is two way to do it. One for the gamemode and another for others usages.

## Layers in Manialink outside of gamemodes
Creating a layer for Manialink is very simple. First you must declare it in the `main()`:

```javascript
declare Layer_MyLayer                                               = UILayerCreate();
Layer_MyLayer.Type                                                  = CUILayer::EUILayerType::ManiaplanetPlugin;
Layer_MyLayer.ManialinkPage                                         = "./Layer_MyLayer.xml";
Layer_MyLayer.IsVisible                                             = True;
```

Your layer file must have this structure:

```javascript
<?xml version="1.0" encoding="utf-8" standalone="yes" ?>

<manialink version="3">
    <frame pos="0 0" z-index="1">
        <label pos="0 0" z-index="0" />
    </frame>

    // That's a comment, if you want to write script related to this layer, you can do it directly here
    <script><!--
    #Include "MathLib" as ML
    #Include "TextLib" as TL

    Void MyFunction(){
        declare integer aVriable;

        aVariable = 1 + 1;
    }

    main(){
        while(True){
            yield;

            MyFunction();
        }
    }

    --></script>
</manialink>
```

>>>> All the variables (including the global ones) from the main script are not accessible by the layer(s) except if they have been expressly declared for it.

### Sharing a variable between the main script and a layer

To share a variable between the main script and the script of a layer, you must declare a `declare for Page` variable. In the script it looks like this:

```javascript
main(){
    declare Text MyLayer_SharedVariable for Layer_MyLayer.LocalPage;

    MyLayer_SharedVariable = "Test";
}
```

In the layer (`Layer_MyLayer` in this example), to get this variable, you must do the following thing:

```javascript
main(){
    declare Text MyLayer_SharedVariable for Page;

    log(MyLayer_SharedVariable);
}
```

The layer will output `Test` as a result.

## Layers in game script

To create/handle layers in a game script is a little more complex. First you have to create a layer in the main script:

```javascript
#Include "Libs/Nadeo/Layers2.Script.txt" as Layers             // Don't forget it!

main(){
    Layers::Create("Layer_MyLayer", GetMyLayer());
}

Text GetMyLayer(){
    declare Text MyLayer = """
        <frame pos="0 0" z-index="1">
            <label pos="0 0" z-index="0" />
        </frame>
    """;

    return MyLayer;
}
```

Then you have to attach it on the screen of the player and set its type:

```javascript
main(){
    Layers::Create("Layer_MyLayer", GetLayer_MyLayer()); //written again to show where to add the code to attach and set the type of a layer
    Layers::Attach("Layer_MyLayer");
    Layers::SetType("MyLayer", CUILayer::EUILayerType::Normal);
}
```

>>> You may share the variables between the main scripts and the layer(s) if the layers are located in the main script. If the layer(s) are in a library for example, the variables will be unaccessible.

If you want to manage the visibility a layer from the player screen, you'll just have to change it: `Layers::SetVisibility("Layer_MyLayer", False);`

>>>> It's strongly recommended to destroy the layers at a changemap and to recreate them to prevent visual glitches. You can destroy layers with `Layers::Destroy("Layer_MyLayer");`