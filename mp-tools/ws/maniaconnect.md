---
layout: default
title: ManiaConnect
description: ManiaConnect
tags:
- tools
- ws
---

ManiaConnect is a unified authentication system and a set of Web Services that lets your application authenticate players with their Maniaplanet account and retrieve various protected information.

##Technology

The great thing is that it works both on Manialinks and on Websites. With the open-source PHP SDK, integration is very easy.

It all relies on the OAuth 2.0 protocol. It's a standard that you can find on Facebook's, Twitter's and Google's APIs for instance. Here's a couple quotes that describe what OAuth does:

OAuth (Open Authorization) is an open standard for authorization. It allows users to share their private resources (e.g. photos, videos, contact lists) stored on one site with another site without having to hand out their credentials, typically username and password.  <http://en.wikipedia.org/wiki/OAuth>

## Use cases

Let's imagine a few use cases for ManiaConnect:

* Securely authenticate a player with its Maniaplanet account on your Website or your Manialink
* Get access to protected information, provided the player gave your application the permission to do so ; for example you will be able to access the list of buddies, the online status, the email, etc.


## How do players manage authorized applications?

On the player page: <http://player.maniaplanet.com/account/authorizations>

## Get a ManiaConnect access

First you obviously need to have access to the [Maniaplanet Web Services API](ws.html).

Then you need to create a ManiaConnect application. Just go, on the [Maniaplanet Developers Website](https://player.maniaplanet.com/webservices), then to the page to manage your API user and create a ManiaConnect application. It should be pretty straightforward.

## Available scope

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
</style>
<table class="tg">
  <tr>
    <th class="tg-031e">Scope</th>
    <th class="tg-031e">Description</th>
  </tr>
  <tr>
    <td class="tg-031e">basic</td>
    <td class="tg-031e">Basic account information: login, nickname, zone, tags, rankings.</td>
  </tr>
  <tr>
    <td class="tg-031e">buddies</td>
    <td class="tg-031e">Access the list of your buddies.</td>
  </tr>
  <tr>
    <td class="tg-031e">email</td>
    <td class="tg-031e">View the email address associated with your account.</td>
  </tr>
  <tr>
    <td class="tg-031e">online_status</td>
    <td class="tg-031e">View whether you are connected to the game or an online multiplayer server.</td>
  </tr>
  <tr>
    <td class="tg-031e">dedicated</td>
    <td class="tg-031e">View your registered dedicated servers, their online statuses and their report abuse.</td>
  </tr>
  <tr>
    <td class="tg-031e">manialinks</td>
    <td class="tg-031e">View your registered Manialink codes.</td>
  </tr>
  <tr>
    <td class="tg-031e">teams</td>
    <td class="tg-031e">Access your teams</td>
  </tr>
  <tr>
    <td class="tg-031e">titles</td>
    <td class="tg-031e">Access your titles (installed and owned)</td>
  </tr>
  <tr>
    <td class="tg-031e">favorite_servers</td>
    <td class="tg-031e">Access your favorite servers</td>
  </tr>
  <tr>
    <td class="tg-031e">medals</td>
    <td class="tg-031e">Access your solo medal count</td>
  </tr>
  <tr>
    <td class="tg-031e">offline</td>
    <td class="tg-031e">Usable with [ManiaConnect](maniaconnect.html), gives you access to a refresh token</td>
  </tr>
</table>

## Help

*You can get help about ManiaConnect on the [ManiaPlanet Web Services forum](http://forum.maniaplanet.com/viewforum.php?f=282).*
