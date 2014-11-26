---
layout: default
title: Battle
description: Presentation of Battle
tags: modes
---

# Battle

## Introduction

Battle is a team based mode available in the Storm title pack of Shootmania.

## Rules

## Map validation

## Overtime

### Introduction

The overtime system is a new feature available since the `2014-11-13` version of Battle. It activates at the end of the round and creates new winning conditions. This system can be turned off by changing the `S_UseOvertime` setting in the server matchsettings file to False.

### Description

The overtime mode activates when the round timer reaches 0. At this point we check which team have the best capture score and give it the advantage. The game continues normally, the only differences are the winning conditions and the capture countdown. When the overtime is activated the pole capture won't reset the capture countdown to it's initial value, it will only be stopped. 

* The team with the advantage is attacking :

  * Someone from this team manages to touch an active pole before the end of the attack countdown -> The advantage team wins the round.
  * Nobody from this team manages to touch an active pole before the end of the attack countdown -> Switch roles, the team without the advantage is now in attack.

* The team without the advantage is attacking :

  * This team manages to equal the capture score of the other team before the end of the attack countdown -> Extended time, a new round during half the time of the previous one begins
  * This team doesn't manage to equal the capture score of the other team before the end of the attack countdown -> Switch roles, the team with the advantage is now in attack.

## Round auto balance

### Introduction

The round auto balance is a new feature available since the `2014-11-26` version of Battle. It activates at the end of the round and balances the teams depending on several criteria.  It can be turned off by changing the `S_AutoBalanceRound` setting in the server matchsettings file to False.

### Description

The round auto balance activates at the end of the round and apply the following steps :

* Set every player in their requested clan.
* Calculate the difference of players number between the two clans.
* If the difference is lower than the setting `S_AutoBalanceDelta` the balance is aborted.
* Subtract the round points of the smallest clan from the round points of the biggest clan. If the result is lower than 0, set it to 0.
* Divide the result by 2 and transfer the player that has the nearest round points from the biggest clan to the smallest clan.
* Repeat the process starting from the second point.

### Example

Initial values :

* `S_AutoBalanceDelta` : 2
* Clan 1 : PlayerA => 6 points, PlayerB => 14 points
* Clan 2 : PlayerC => 12 points, PlayerD => 14 points, PlayerE => 10 points, PlayerF => 2 points


Difference of players number between each clan :

* Clan 1 : 2
* Clan 2 : 4
* 4 - 2 = 2
* `S_AutoBalanceDelta` >= 2, run the balance

Difference of round points between biggest and smallest clan :

* Clan 1 : 6 + 14 = 20 points
* Clan 2 : 12 + 14 + 10 + 2 = 38 points
* (38 - 20) / 2 = 9 points
* The nearest round points from 9 is 10
* Transfer PlayerE to clan 1

Resulting clans :
* Clan 1 : PlayerA => 6 points, PlayerB => 14 points, PlayerE => 10 points
* Clan 2 : PlayerC => 12 points, PlayerD => 14 points, PlayerF => 2 points