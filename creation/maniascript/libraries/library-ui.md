---
layout: default
title: Customize the user interface
description: How to customize the user interface of the players by modifying an XML file.
tags:
- dedicated
- server
---

# Introduction

The new UI library (Libs/Nadeo/TrackMania/UI.Script.txt & Libs/Nadeo/ShootMania/UI.Script.txt) enables XmlRpc controls on the user interface of the players currently on the server. You can hide or show different parts of the UI like the chat, countdown, checkpoint list on Trackmania or armor bar on Shootmania. Some of them can also be moved on the screen.

# Usage

Two XmlRpc methods and one callback are available to control the UI : `UI_SetProperties`, `UI_GetProperties` and `UI_Properties`. You can check the [XmlRpc documentation]({{ site.docurl }}/dedicated-server/xml-rpc-scripts.html) to get more informations about them.

* UI_SetProperties : Set the properties of the UI.
* UI_GetProperties : Get the properties of the Trackmania UI. This method triggers the `UI_Properties` callback.
* UI_Properties : An xml string with the Trackmania ui properties.

To customize the UI, you have to trigger the UI_SetProperties XmlRpc method with an XML string containing the UI properties. Below you'll find the complete XML file with the explanations on what each parameter does.

# Complete XML file

## Trackmania

{% highlight xml %}
<!--
  Each node in this file is optional and can be omitted.
  If it's the case then the previous value will be kept.
-->
<ui_properties>
  <!-- The map name and author displayed in the top right of the screen when viewing the scores table -->
  <map_info visible="true" />
  <!-- ... -->
  <opponents_info visible="true" />
  <!-- 
    The server chat displayed on the bottom right of the screen 
    The offset values range from 0. to -3.2 for x and from 0. to 1.8 for y
    The linecount property must be between 0 and 40
  -->
  <chat visible="true" offset="0. 0." linecount="7" />
  <!-- Time of the players at the current checkpoint displayed at the bottom of the screen -->
  <checkpoint_list visible="true" pos="40. -90. 5." />
  <!-- Small scores table displayed at the end of race of the round based modes (Rounds, Cup, ...) on the right of the screen -->
  <round_scores visible="true" pos="104. 14. 5." />
  <!-- Race time left displayed at the bottom right of the screen -->
  <countdown visible="true" pos="154. -57. 5." />
  <!-- 3, 2, 1, Go! message displayed on the middle of the screen when spawning -->
  <go visible="true" />
  <!-- Current race chrono displayed at the bottom center of the screen -->
  <chrono visible="true" pos="0. -80. 5." />
  <!-- Speed and distance raced displayed in the bottom right of the screen -->
  <speed_and_distance visible="true" pos="158. -79.5 5." />
  <!-- Previous and best times displayed at the bottom right of the screen -->
  <personal_best_and_rank visible="true" pos="158. -61. 5." />
  <!-- Current position in the map ranking displayed at the bottom right of the screen -->
  <position visible="true" />
  <!-- Checkpoint time information displayed in the middle of the screen when crossing a checkpoint -->
  <checkpoint_time visible="true" pos="-8. 31.8 -10." />
  <!-- The avatar of the last player speaking in the chat displayed above the chat -->
  <chat_avatar visible="true" />
  <!-- Warm-up progression displayed on the right of the screen during warm-up -->
  <warmup visible="true" pos="170. 27. 0." />
</ui_properties>
{% endhighlight %}

## Shootmania
