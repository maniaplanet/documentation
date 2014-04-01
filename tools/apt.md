---
layout: static
title: APT repository
description: ManiaPlanet APT repository
---

## Available packages

package 				        | description								| install dir
--------------------------------|-------------------------------------------|-------------------------------------------
maniaplanet-server 				| ManiaPlanet dedicated package				| /opt/maniaplanet-server/
manialive              		| ManiaLive latest package (+ some plugins) | /opt/manialive/
maniaplanet-competition-manager | ManiaPlanet competition manager			| /var/lib/maniaplanet-competition-manager/

## Usage

Add the following line to /etc/apt/sources.list.

`deb http://static.maniaplanet.com/repository any main`

(Optional) Import our GPG key

`$ sudo apt-key adv --recv-keys --keyserver subkeys.pgp.net 4A46CD4DD71D8F6F`

Install a package

`$ sudo apt-get install maniaplanet-server`
