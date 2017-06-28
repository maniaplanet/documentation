---
title: 'The Actions from the ActionMaker in the script'
taxonomy:
    category:
        - docs
---

We'll talk a bit about the `Actions`. An `Action` is a element created in the `ActionMaker` which gives you the possibility to build a new weapon or a custom animation for the player.

From a script point of view, you can assign up to 8 actions to a player at the same time from `Slot_A` to `Slot_H`.

First to use an action, you must declare it on the `StartServer` section of your script inside an `ActionList` as follows:

```
declare Ident G_MyCustomWeapon;

***StartServer***
***
ActionList_Begin();
	G_MyCustomWeapon = ActionList_Add("mycustombullet.Action.Gbx");
ActionList_End();
***
```

`G_MyCustomWeapon` must be declared as a global variable to be usable everywhere in your script. Note also that the Actions will be searched in the folder `Actions` (at the root of the package tree).

## Assigning a weapon/action
To assign a weapon created with the ActionMaker to a player, you have to use the following code:

```
ActionLoad(Player, CSmMode::EActionSlot::Slot_A, G_MyCustomWeapon);
ActionBind(Player, CSmMode::EActionSlot::Slot_A, CSmMode::EActionInput::Weapon);
```

`CSmMode::EActionInput::Weapon` is referencing the fire button (left click usually), if you want to put an action on the right-click, you have to specify `Movement` as input instead of `Weapon`. But if you do that, the player won't be able to jump/use his stamina.

The actions can be assigned on the buttons 1, 2, 3 or 4 through `Activable1`, `Activable2`, `Activable3` and `Activable4`.

## Managing the event of an action
If you use an action as a weapon, you can't exactly manage the event the same way as a Storm bullet (rocket/nucleus/arrow/laser). You have to manage the fire and hit events on the `OnActionCustomEvent` event instead of `OnHit`.

For a bullet, the state of an action is symbolized with its first parameter: `Event.Param1[0]`. For example if you want to know if a bullet has been fired, you have to compare this parameter with the text `"fire"`.

If you want to retrieve the damage done by the bullet, you should check the second parameter of the action: `Event.Param2[0]` and be sure that the event sent by action is `"damage"` for the first parameter. Note that the parameter is a Text type, so you have to convert it with the TextLib if you want to use it directly during the calculation of the damage.

>>>>> Note also the parameters can be altered by the creator of the action (if he has customized the script of the weapon to do so).

Here is an example on how to manage the event of an action:

```
if (Event.Type == CSmModeEvent::EType::OnActionCustomEvent) {
	// On shoot
	if (Event.Param1 == "fire" && Event.Shooter != Null) {
		log("The Player has fired");
		Events::Valid(Event);
	}
	// On player hit
	else if (Event.Param1 == "damage" && Event.Victim != Null && Event.Victim != Event.Shooter) {
		declare EventDamage = TextLib::ToInteger(Event.Param2[0]);
		declare Points = EventDamage / 100;
		RemovePlayerArmor(Event.Victim, EventDamage, Event.Shooter, Points);
		Score::AddPoints(Event.Shooter, Points);
		
		Events::Valid(Event);
	}
}
```

You can still manage the death of the players through the `OnArmorEmpty` event.