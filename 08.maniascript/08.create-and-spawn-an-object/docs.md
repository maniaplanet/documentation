---
title: 'Create and spawn an object'
taxonomy:
    category:
        - docs
---

If you need to use a dynamic object (a 3D object that can be catched, dropped and can interact with the players and/or the bots).

First you have to declare all the dynamic objects (including mandatory skins if used) that you intend to use in your script:

```
declare Ident G_MyDynamicObject;
declare Ident G_MyMandatorySkin;

***StartServer***
***
ItemList_Begin();
	G_MyDynamicObject = ItemList_Add("aDynamicObject.Item.gbx");
	G_MyMandatorySkin = ItemList_Add("aCustomSkin.Item.gbx");
ItemList_End();
***
```

As you can see, you must declare a global variable as Ident to stock the desired item as reference in the `StartServer` section.

Second you have to create the object, once or as many times you need with those instructions:

```
declare CSmObject AnObject;
AnObject = ObjectCreate(G_MyDynamicObject);
```

Once created, you have (maybe, it's depending of your game design) to spawn the item on the World or on a player.

To spawn it on the world, you must check all the anchors of the map and spawn the object on them (all of them, you can't choose). The issue is that an anchor of the item must exist on the map or the item will not be spawned.

To spawn it with this method, you can do the following:

```
declare CSmMapObjectAnchor AnObjectAnchor;

foreach (MapLandmark in MapLandmarks_ObjectAnchor) {
	if (MapLandmark.Tag == "NameOfTheAnchor") {
		AnObject.SetAnchor(MapLandmark.ObjectAnchor);
		AnObjectAnchor = MapLandmark.ObjectAnchor;
	}
}
```

If you want to give it to a player, then you should do this:

```
AnObject.SetPlayer(_Player);
```

In this way the object will be carried by the specified player. You'll be able to find the object located on a player by listing his objects with:

```
Player.Objects[];
```