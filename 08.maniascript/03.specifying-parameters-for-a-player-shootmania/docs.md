---
title: 'Specifying parameters for a player - Shootmania'
taxonomy:
    category:
        - docs
---

It's possible to customize the parameters of a player when you spawn him (or while he plays but let's assume the first situation).

Instead of calling the function `SM::SpawnPlayer(_Player, 0, MapLandmarks_PlayerSpawn[SpawnId]);`, we'll create our own function to call to spawn of player.

```
Void VSpawnPlayer(CSmPlayer _Player) {
    _Player.ArmorMax 		= 400;
    _Player.Armor 			= _Player.ArmorMax;
    _Player.ArmorGain 		= 0;
    _Player.AmmoGain 		= 1.;
    _Player.AmmoPower 		= 1.;
    _Player.SpeedPower 		= 1.;
    _Player.IsHighlighted 	= True;
    _Player.StaminaMax 		= 1.;
    _Player.StaminaGain 	= 1.;
    _Player.StaminaPower 	= 1.;
    SetPlayerWeapon(_Player, CSmMode::EWeapon::Rocket, False);
    SM::SpawnPlayer(_Player, 0, MapLandmarks_PlayerSpawn[0].PlayerSpawn, Now + 50);
    SetPlayerAmmoMax(_Player, CSmMode::EWeapon::Rocket, 4);
    SetPlayerAmmo(_Player, CSmMode::EWeapon::Rocket, 4);
}
```

All the usable parameters are listed in the `CSmPlayer` class (check the technical documentation about it).

>>>> Several parameters will refuse `0.0` as value. Also, a max value can exist for a parameter.