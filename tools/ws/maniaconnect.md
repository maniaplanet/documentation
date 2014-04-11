---
layout: static
title: ManiaConnect
description: ManiaConnect
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

First you obviously need to have access to the [Maniaplanet Web Services API](ws).

Then you need to create a ManiaConnect application. Just go, on the [Maniaplanet Developers Website](https://player.maniaplanet.com/webservices), then to the page to manage your API user and create a ManiaConnect application. It should be pretty straightforward. 

## Available scope

Scope				| Description
--------------------| ----------------------------------------------------------------------------------------
basic 				| Basic account information: login, nickname, zone, tags, rankings.
buddies 			| Access the list of your buddies.
email 				| View the email address associated with your account.
online_status 		| View whether you are connected to the game or an online multiplayer server.
dedicated 			| View your registered dedicated servers, their online statuses and their report abuse.
manialinks 			| View your registered Manialink codes.
teams 				| Access your teams
titles 				| Access your titles (installed and owned)
favorite_servers 	| Access your favorite servers 
medals				| Access your solo medal count
offline				| Usable with [ManiaConnect](maniaconnect), gives you access to a refresh token

## Help

*You can get help about ManiaConnect on the [ManiaPlanet Web Services forum](http://forum.maniaplanet.com/viewforum.php?f=282).*