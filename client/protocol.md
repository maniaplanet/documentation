---
layout: static
title: maniaplanet:// protocol
description: maniaplanet:// protocol
---

command 												| description
--------------------------------------------------------|----------------------------
maniaplanet://#join=serverlogin@TITLEID					| Join a specific server
maniaplanet://#spectate=serverlogin 					| Logs you into a server as spectator from an external link
maniaplanet://#qjoin=serverlogin@TITLEID				| QuickJoin a specific server without the normal window before joining a server
maniaplanet://#qspectate=serverlogin 					| QuickSpectate a server to join as Spectator
maniaplanet://#joinasreferee=serverlogin 				| Join a specific server as referee
maniaplanet://#addfavorite=serverlogin 					| Add a specific server as favorite server
maniaplanet://#score=scoremeta							| Link is generated in game to send scores that one can challenge on another computer
maniaplanet://#opponent=login:map:group@TITLEID			| play a campaign track against an opponent
maniaplanet://#campaign=map@TITLEID			       		| Play a specific map of the title's campaign
maniaplanet://#menutitle=TITLEID      | Will open the menuTitle of a TitleUID
maniaplanet://#openstore=TITLEID						| Will open the shop to buy the game, depending on the distribution platform. (no usefull for user titles)
maniaplanet://#menustations=*							| * can be home, play, store, options
maniaplanet://#addbuddy=login 							| Add a buddy
maniaplanet://#invitebuddy=login 						| Invite a buddy
maniaplanet://#mailto=login								| Send a message to a preferred login with the in-game mail system
maniaplanet://url 										| Open an URL into the in-game browser
maniaplanet:///:manialink 								| Open a manialink into the in-game browser (please note the three slashes and the colon)

## TitleId?

You can find the official title ids on [this table](../dedicated-server/titleids.html).

## Details

### For #join, #spectate, #qjoin, #qspectate:

command 										| description
------------------------------------------------|----------------------------
 #xxx=serverlogin@TITLEID						| Join a specific server
 #xxx=serverlogin:serverpassword@TITLEID		| Join a private server
 #xxx=192.168.xx.xx::port@TITLEID				| Join a LAN server (default port is 2350)
 #xxx=192.168.xx.xx:serverpassword:port@TITLEID	| Join a private LAN server


### for #campaign:

command 										| description
------------------------------------------------|----------------------------
 #campaign=mapname@TITLEID						| play the map from the campaign matching the name
 #campaign=#5@TITLEID							| play the fifth map of the campaign
 #campaign=#3,1@TITLEID							| play the thirs map of the first group (usually A03)


### for #menustations:

command 										| description
------------------------------------------------|----------------------------
 #menustations=									| open the stations menu
 #menustations=home								| open the home tab on the stations menu
 #menustations=play@TITLEID						| open the play station on the title specified (if it is installed)
 #menustations=store?titleUid=TITLEID			| open the store tab, on the title page (if it's published in the store)
 #menustations=store?TITLEID			| open the store tab, on the title page (if it's published in the store)


## Example

`Hello ! Please <a title="Join us!" href="maniaplanet://#join=smcafe@SMStormElite@nadeolabs">our server</a> !`
