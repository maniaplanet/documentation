---
layout: default
title: APT repository
description: ManiaPlanet APT repository
tags: tools
---

## Available packages

<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
</style>
<table class="tg">
  <tr>
    <th class="tg-031e">package</th>
    <th class="tg-031e">description</th>
    <th class="tg-031e">install dir</th>
  </tr>
  <tr>
    <td class="tg-031e">Maniaplanet-server</td>
    <td class="tg-031e">ManiaPlanet dedicated package</td>
    <td class="tg-031e">/opt/maniaplanet-server/</td>
  </tr>
  <tr>
    <td class="tg-031e">manialive</td>
    <td class="tg-031e">ManiaLive latest package (+ some plugins)</td>
    <td class="tg-031e">/opt/manialive/</td>
  </tr>
  <tr>
    <td class="tg-031e">Maniaplanet-competition-manager</td>
    <td class="tg-031e">ManiaPlanet competition manager</td>
    <td class="tg-031e">/var/lib/maniaplanet-competition-manager/</td>
  </tr>
</table>

## Usage

Add the following line to /etc/apt/sources.list.

`deb http://static.maniaplanet.com/repository any main`

(Optional) Import our GPG key

`$ sudo apt-key adv --recv-keys --keyserver keyserver.ubuntu.com 4A46CD4DD71D8F6F`

Install a package

`$ sudo apt-get install maniaplanet-server`
