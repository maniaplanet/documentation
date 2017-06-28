---
title: 'Sending ManiaScript script vars to ManiaScript Manialink vars'
taxonomy:
    category:
        - docs
---

First you need to know that the script of the gamemode and the manialink inside are two separate layers which don't communicate with each other initially. The script is run on the server while the manialink is read locally on the computer of the player. To make it so, you need to use a "new" type of variable which will be read by the script and the manialink.

It works like an "input/output" system in simple language. In a logic sense, you must create first an "output" variable, symbolized with the parameter `netwrite` in ManiaScript. This parameter tell that the variable will register/put a value to send to the other layer (the script or the manialink):

```
declare netwrite Integer Net_MyVariable for UI;
```

The "for UI" means that the variable is adressed to a specific player (first you have to retrieve the UI of the player with the instruction `declare UI <=> UIManager.GetUI(Player);`).

>>>>> Instead of retrieving all the UIs if the variable is addressed for all players, you can specify `for Teams[0]` or `for Teams[1]`.

>>> This type of variable (netwrite/netread) doesn't work with the bots, it'll crash the script if you try do it, so be sure that when you manipulate this type of variable in the script, to exclude the bot from the execution of the code (**Tip:** the bot doesn't have an UI, so you can do a check when you have retrieve the UI of a player by test it with `if(UI != Null)`).

You have to create an "input" variable on the side where you will receive the value of the other part (for example from the script to the variable) with the `netread` parameter between the declaration and the type of the variable:

```
declare netread Integer Net_MyReadVariable for UI;
```

>>>> You can't name a netread/netwrite variable with the same name of an existing "standard" variable (name conflict)

>>>> You can't manipulate the value of a `netread` variable (or the script will crash)