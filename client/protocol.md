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
maniaplanet://#qjoin=serverlogin@TITLEID					| Join a specific server without the normal window before joining a server
maniaplanet://#join=serverlogin:serverpassword@TITLEID 	| Join a private server
maniaplanet://#joinasreferee=serverlogin 				| Join a specific server as referee
maniaplanet://#spectate=serverlogin 					| Logs you into a server as spectator from an external link
maniaplanet://#qspectate=serverlogin 					| QuickSpectate a server to join as Spectator
maniaplanet://url 										| Open an URL into the in-game browser
maniaplanet:///:manialink 								| Open a manialink into the in-game browser (please note the three slashes and the colon)
maniaplanet://#mailto=login								| Send a message to a preferred login
maniaplanet://#score=scoremeta							| Link is generated in game to send scores that one can challenge on another computer
maniaplanet://#campaign=#1,3@TITLEID        | Play the third map of the first group (usually A03)
maniaplanet://#openstore=TITLEID            | Will open a URL to the Online Maniaplanet Store according to TitleID
maniaplanet://#menustations=*               | * can be home, play, store, options

## TitleId?

You can find the official title ids on [this table](../dedicated-server/titleids.html).

## Example

`Hello ! Please <a title="Join us!" href="maniaplanet://#join=smcafe@SMStormElite@nadeolabs">our server</a> !`
