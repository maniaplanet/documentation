---
layout: default
title: Clublinks
description: How to create and setup a Clublink for your team
tags: mp-tools
---

# How to create and setup a Clublink for your team

Clubinks are a powerful way to personalize teams in Maniaplanet.
There's two ways to create a Clublink: automatically from your player page, or manually by editing an XML file.

## From the player page
To create a clublink, connect to [your player page](https://player.maniaplanet.com), select 'Community' and click on 'Teams'.

![Player Page clublink](https://dl.dropbox.com/s/w354dz89896inye/PlayerPageTeam.png)

If you do not have a team yet, it is a good time to create one!
To do so, click on 'Create a team' and follow the instructions.
Please note that you have to host the images yourself.

**The format for both emblem and logos images is .DDS, 512 x 512 pixels, compression DXT1 (no alpha) with mipmaps.**

![Team creation](https://dl.dropbox.com/s/vabtdg5ontwh8fd/teamCreation.png)

Once you belong to a team, its name should be visible on the [bottom of the 'teams' page](https://player.maniaplanet.com/teams/).

![Team page](https://dl.dropbox.com/s/rzx73kh28c9a87a/TeamPage.png)

Click on your team, then click on 'Clublink' on the right.

![Clublink page](https://dl.dropbox.com/s/x67vhvbrwyld439/ClublinkPage.png)

Copy the link given in the page (it starts with 'http://maniamatch.maniaplanet.com/club-link'). Please be sure you have copied the entire link: it is very long, and your browser may hide its end.

![The link](https://dl.dropbox.com/s/mylm085sr5fa4k3/TheLink.png)

Now start Maniaplanet, connect with your account and click on the game you want to set (e.g. Shootmania Storm).
Go to your profile ('Profile' on the left), and paste the Clublink in the 'clublink' field.

![Profile](https://dl.dropbox.com/s/e56nzcl7ltl0i4a/profile.png)

![Clublink profile](https://dl.dropbox.com/s/8naxzd44v5kgeu5/ClublinkInProfile.png)

Your Clublink is now set!
When you play team modes (e.g. Elite or Combo in ShootMania Storm), the game will be setup with your colors and visuals if the server allows it.

![In-game screen](https://dl.dropbox.com/s/czzxxkd12crj2my/InGameScreen.png)

## From an XML file
You can also create and host your own Clublink file. It will let you have a bit more control on its content. Once you have edited the XML file, you just have to host it somewhere on the web along with the various resources (emblems, logo, avatars, sponsors) and paste the link inside your profile (see above for more details).

{% highlight xml %}
<?xml version="1.0" encoding="utf-8"?>
<club version="1">
  <!-- Name of the team -->
  <name>Example</name>

  <!-- Zone of the team (See in game for the zone structure) -->
  <zone>World|France|Ile-de-France</zone>

  <!-- City of the team -->
  <city>Paris</city>

  <!-- Colors of the team (Used on the spawns, the poles and the UI) -->
  <color primary="0DA" secondary="95D" />

  <!-- Emblem of the team (Used on the spawns, the poles and the UI) -->
  <!-- Must be a dds file in BC1/DXT1 with mipmaps of 512x512 pixels-->
  <emblem>http://www.example.com/Emblem_Example.dds</emblem>

  <!-- Players list -->
  <players>
    <!-- ManiaPlanet login of the player -->
    <player login="Example1">
      <!-- Nickname of the player (Can be used by game modes to automatically rename the player on the server) -->
      <nickname>My name is Example 1</nickname>

      <!-- Avatar of the player (Can be used by game modes to automatically replace the avatar of the player on the server) -->
      <!-- Any format supported by ManiaPlanet can be used (jpg, png, tga, dds, bik) -->
      <avatar>http://www.example.com/Avatar_Example1.png</avatar>
    </player>

    <!-- You can add as many players as you want -->
    <player login="Example2">
      <nickname>I'm another Example</nickname>
      <avatar>http://www.example.com/Avatar_Example2.png</avatar>
    </player>
  </players>

  <!-- Sponsors list -->
  <!-- They'll be displayed on the sides of the screen during the end of the rounds/maps  -->
  <sponsors>
    <!-- Name of the sponsors -->
    <sponsor name="Sponsor 1">
      <!-- Image of the sponsor -->
      <!-- Any format supported by ManiaPlanet can be used (jpg, png, tga, dds, bik), image ratio 2:1. -->
      <image_2x1>http://www.example.com/Sponsor_1.png</image_2x1>
    </sponsor>
    <!-- You can add as many sponsors as you want -->
    <sponsor name="Sponsor 2">
      <image_2x1>http://www.example.com/Sponsor_2.png</image_2x1>
    </sponsor>
    <sponsor name="Sponsor 3">
      <image_2x1>http://www.example.com/Sponsor_3.png</image_2x1>
    </sponsor>
  </sponsors>
</club>
{% endhighlight %}
