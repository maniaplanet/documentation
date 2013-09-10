---
layout: static
title: maniaplanet:// protocol
description: maniaplanet:// protocol
---

ManiaPlanet protocol
====================

command 												| description
--------------------------------------------------------|----------------------------
maniaplanet://#addbuddy=login 							| Add a buddy
maniaplanet://#invitebuddy=login 						| Invite a buddy
maniaplanet://#addfavourite=serverlogin 				| Add a specific server as favourite server
maniaplanet://#addfavorite=serverlogin 					| Add a specific server as favorite server
maniaplanet://#join=serverlogin@TITLEID					| Join a specific server
maniaplanet://#join=serverlogin:serverpassword@TITLEID 	| Join a private server
maniaplanet://#joinasreferee=serverlogin 				| Join a specific server as referee
maniaplanet://#spectate=serverlogin 					| Logs you into a server as spectator from an external link
maniaplanet://#qspectate=serverlogin 					| QuickSpectate a server to join as Spectator
maniaplanet://url 										| Open an URL into the in-game browser
maniaplanet:///:manialink 								| Open a manialink into the in-game browser (please note the three slashes and the colon)
maniaplanet://#qjoin=serverlogin@TITLEID				| Quickjoin a serverlogin through Titlepack 


## TitleId?

You can find the official title ids on [this table](../dedicated-server/titleids.html).

## Example

`Hello ! Please <a title="Join us!" href="maniaplanet://#join=smcafe@SMStormElite@nadeolabs">our server</a> !`