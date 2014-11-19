---
layout: default
title: Battle overtime explanation
description: Explanation of the inner working of the overtime in Battle.
tags:
- dedicated
- server
---


# Overtime in Battle

## Introduction

The overtime system is a new feature available since the `2014-11-13` version of Battle. It activates at the end of the round and creates new winning conditions. This system can be turned off by changing the `S_UseOvertime` setting in the server matchsettings file to False.

## Description

The overtime mode activates when the round timer reaches 0. At this point we check which team have the best capture score and give it the advantage. The game continues normally, the only differences are the winning conditions and the capture countdown. When the overtime is activated the pole capture won't reset the capture countdown to it's initial value, it will only be stopped. 

* The team with the advantage is attacking :

  * Someone from this team manages to touch an active pole before the end of the attack countdown -> The advantage team wins the round.
  * Nobody from this team manages to touch an active pole before the end of the attack countdown -> Switch roles, the team without the advantage is now in attack.

* The team without the advantage is attacking :

  * This team manages to equal the capture score of the other team before the end of the attack countdown -> Extended time, a new round during half the time of the previous one begins
  * This team doesn't manage to equal the capture score of the other team before the end of the attack countdown -> Switch roles, the team with the advantage is now in attack.