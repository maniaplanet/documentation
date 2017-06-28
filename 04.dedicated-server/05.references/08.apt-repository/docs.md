---
title: 'APT Repository'
taxonomy:
    category:
        - docs
---

An APT repository provides packages for maniaplanet dedicated server.

## Installation

Add this to your APT source configuration, in `/etc/apt/sources.list.d/maniaplanet-server.list`:

    deb http://apt.live.nadeo.com/ stable main

Load our GPG key:

	 sudo apt-key adv --keyserver keys.gnupg.net --recv-keys 312C7E7F7CB56282
     
Update:

	sudo apt-get update
    
Install our packages:

	sudo apt-get install maniaplanet-server
    
This will install `maniaplanet-server`, `maniaplanet-server-trackmania` and `maniaplanet-server-shootmania`

## Advanced usage

If you plan to use only Trackmania or Shootmania server, you can use:

* For Trackmania: `sudo apt-get install --no-install-recommends maniaplanet-server-trackmania`
* For Trackmania: `sudo apt-get install --no-install-recommends maniaplanet-server-shootmania`