---
layout: static
title: ManiaPlanet lobbies
description: How to run a ManiaPlanet lobby
---

Lobby
=====

To run a lobby, you can use our [ManiaLive plugin](start-a-combo-lobby) which bundle all the functionnalities you need. 

## Ladder

To make a 70K, 80K and 100K lobby, you have to upgrade the lobby and all match servers.
Since it can be very costly, do not hesitate to ask on [ladder server forum](http://forum.maniaplanet.com/viewforum.php?f=459).

## Technical part

To declare your server as a lobby, you have to send the XML-RPC method:

	SetLobbyInfo(boolean, int, int, double)
	
* boolean: true to declare as lobby
* int: current number of player on the architecture (lobby + match servers)
* int: maximum number of player on the architecture 
* double: averable LP on players on the architecture

## Demo players

To allow demo user to play on your lobby, you have to add :

	<allow_demotoken>true</allow_demotoken>

in the `<system_config>` part of the `dedicated.cfg` of both lobby and match servers.