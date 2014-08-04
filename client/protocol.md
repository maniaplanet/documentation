---
layout: default
title: maniaplanet:// protocol
description: maniaplanet:// protocol
tags: client
---

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
</style>
<table class="tg">
  <tr>
    <th class="tg-031e">command</th>
    <th class="tg-031e">description</th>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://#join=serverlogin@TITLEID</td>
    <td class="tg-031e">Join a specific server</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://#spectate=serverlogin</td>
    <td class="tg-031e">Logs you into a server as spectator from an external link</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://#qjoin=serverlogin@TITLEID</td>
    <td class="tg-031e">QuickJoin a specific server without the normal window before joining a server</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://#qspectate=serverlogin</td>
    <td class="tg-031e">QuickSpectate a server to join as Spectator</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://#joinasreferee=serverlogin</td>
    <td class="tg-031e">Join a specific server as referee</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://#addfavorite=serverlogin</td>
    <td class="tg-031e">Add a specific server as favorite server</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://#score=scoremeta</td>
    <td class="tg-031e">Link is generated in game to send scores that one can challenge on another computer</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://#opponent=login:map:group@TITLEID</td>
    <td class="tg-031e">play a campaign track against an opponent</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://#campaign=map@TITLEID</td>
    <td class="tg-031e">Play a specific map of the title's campaign</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://#menutitle=TITLEID</td>
    <td class="tg-031e">Will open the menuTitle of a TitleUID</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://#openstore=TITLEID</td>
    <td class="tg-031e">Will open the shop to buy the game, depending on the distribution platform. (no usefull for user titles)</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://#menustations=*</td>
    <td class="tg-031e">* can be home, play, store, options</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://#addbuddy=login</td>
    <td class="tg-031e">Add a buddy</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://#invitebuddy=login</td>
    <td class="tg-031e">Invite a buddy</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://#mailto=login</td>
    <td class="tg-031e">Send a message to a preferred login with the in-game mail system</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet://url</td>
    <td class="tg-031e">Open an URL into the in-game browser</td>
  </tr>
  <tr>
    <td class="tg-031e">maniaplanet:///:manialink</td>
    <td class="tg-031e">Open a manialink into the in-game browser (please note the three | slashes and the colon)</td>
  </tr>
</table>

## TitleId?

You can find the official title ids on [this table](../dedicated-server/titleids).

## Details

### For #join, #spectate, #qjoin, #qspectate:

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
</style>
<table class="tg">
  <tr>
    <th class="tg-031e">command</th>
    <th class="tg-031e">description</th>
  </tr>
  <tr>
    <td class="tg-031e">#xxx=serverlogin@TITLEID</td>
    <td class="tg-031e">Join a specific server</td>
  </tr>
  <tr>
    <td class="tg-031e">#xxx=serverlogin:serverpassword@TITLEID</td>
    <td class="tg-031e">Join a private server</td>
  </tr>
  <tr>
    <td class="tg-031e">#xxx=192.168.xx.xx::port@TITLEID</td>
    <td class="tg-031e">Join a LAN server (default port is 2350)</td>
  </tr>
  <tr>
    <td class="tg-031e">#xxx=192.168.xx.xx:serverpassword:port@TITLEID</td>
    <td class="tg-031e">Join a private LAN server</td>
  </tr>
</table>


### for #campaign:

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
</style>
<table class="tg">
  <tr>
    <th class="tg-031e">command</th>
    <th class="tg-031e">description</th>
  </tr>
  <tr>
    <td class="tg-031e">#campaign=mapname@TITLEID</td>
    <td class="tg-031e">play the map from the campaign matching the name</td>
  </tr>
  <tr>
    <td class="tg-031e">#campaign=#5@TITLEID</td>
    <td class="tg-031e">play the fifth map of the campaign</td>
  </tr>
  <tr>
    <td class="tg-031e">#campaign=#3,1@TITLEID</td>
    <td class="tg-031e">play the thirs map of the first group (usually A03)</td>
  </tr>
</table>


### for #menustations:

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
</style>
<table class="tg">
  <tr>
    <th class="tg-031e">command</th>
    <th class="tg-031e">description</th>
  </tr>
  <tr>
    <td class="tg-031e">#menustations=</td>
    <td class="tg-031e">open the stations menu</td>
  </tr>
  <tr>
    <td class="tg-031e">#menustations=home</td>
    <td class="tg-031e">open the home tab on the stations menu</td>
  </tr>
  <tr>
    <td class="tg-031e">#menustations=play@TITLEID</td>
    <td class="tg-031e">open the play station on the title specified (if it is installed)</td>
  </tr>
  <tr>
    <td class="tg-031e">#menustations=store?titleUid=TITLEID</td>
    <td class="tg-031e">open the store tab, on the title page (if it's published in the store)</td>
  </tr>
  <tr>
    <td class="tg-031e">#menustations=store?TITLEID</td>
    <td class="tg-031e">open the store tab, on the title page (if it's published in the store)</td>
  </tr>
</table>


## Example

`Hello ! Please <a title="Join us!" href="maniaplanet://#join=smcafe@SMStormElite@nadeolabs">our server</a> !`
