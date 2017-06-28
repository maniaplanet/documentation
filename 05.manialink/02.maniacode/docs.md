---
title: 'Maniacode'
taxonomy:
    category:
        - docs
---

[TOC]

A ManiaCode is a XML file. You must write the content in the following markers: 

```xml
<?xml version='1.0' encoding='utf-8' ?>
<maniacode>
    The code that you want
</maniacode>
```

If we usethe line below, there will be not message at the end of the ManiaCode (useful for redirections)

```xml
<maniacode noconfirmation="1">
```

## The differents functions
### Write a message message

```xml
<show_message>
    <message>Your message</message>
</show_message>
```

### Install a map

```xml
<install_map>
	<name>Name of the map</name>
	<url>direct url of the map.Map.Gbx</url>
</install_map>
```

### Play a map without install it

```xml
<play_map>
	<name>Name of the map</name>
	<url>direct url of the map.Map.Gbx </url>
</play_map>
```

### Install a replay

```xml
<install_replay>
	<name>Name of the replay</name>
	<url>direct url of the replay.Replay.Gbx</url>
</install_replay>
```

### Watch a replay

```xml
<view_replay>
	<name>Name of the replay</name>
	<url>direct url of the replay.Replay.Gbx </url>
</view_replay>
```

### Fight a replay

```xml
<play_replay>
       <name>Name of the replay</name>
       <url>direct url of the replay.Replay.Gbx </url>
</play_replay>
```

### Install a skin

```xml
<install_skin>
	<name>Name of the skin</name>
	<file>Skins/Vehicles/CommonCar/Name of the skin.zip</file>
	<url>direct url of the skin</url>
</install_skin>
```

### Get a skin without install it (It will be in the cache of the game)

```xml
<get_skin>
       <name>Name of the skin</name>
       <file>Skins/Vehicles/CarCommon/Name of the skin.zip</file>
       <url>direct url of the skin</url>
</get_skin>
```

### Add a friend

```xml
<add_buddy>
         <login>login of the player</login>
</add_buddy>
```

### Redirection to another page

```xml
<goto>
       <link>address of the manialink</link>
</goto>
```

### Join a server via ip

```xml
<join_server>
	<ip>ip of the server:port of the server</ip>
</join_server>
```

### Join a server via server login

```xml
<join_server>
	<login>login of the server</login>
</join_server>
```

### Add a server in favorites via ip

```xml
<add_favourite>
	<ip>ip of the server:port of the server</ip>
</add_favourite>
```

### Add a server in favorites via server login

```xml
<add_favourite>
	<login>login of the server</login>
</add_favourite>
```

### Install a script

```xml
<install_script>
	<name>NameOfTheScript</name>
	<file>Scripts/EditorPlugins/Trackmania/MyScript.Script.txt</file>
	<url>http://my.website.com/MyScript.Script.txt</url>
</install_script>
```

### Install a title pack

```xml
<install_pack>
  <name>Name of the Title Pack</name>
   <file>Packs/MyPack.Title.Pack.Gbx</file>
  <url>http://my.website.com/MyPack.Title.Pack.Gbx</url>
</install_pack>
```

## Example

```xml
<?xml version='1.0' encoding='utf-8' ?>
<maniacode noconfirmation="1">
    <show_message>
        <message>Maniacode tutorial</message>
    </show_message>

    <install_map>
        <name>Map</name>
        <url>url of the map</url>
    </install_map>

    <goto>
        <link>redirection to another page of my manialink</link>
    </goto>
</maniacode>
```