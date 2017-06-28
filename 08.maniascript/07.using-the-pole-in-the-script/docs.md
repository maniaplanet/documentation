---
title: 'Using the pole in the script'
taxonomy:
    category:
        - docs
---

In case you want to use a pole in your script because it is a pole based gamemode like Battle or Siege.

First you must reset the progression of the pole (to prevent to have a half-captured pole at the beginning of the round):

```
***StartRound***
***
foreach (MapLandmark in MapLandmarks_Gauge) {
	if (MapLandmark.Gate != Null) continue;
	
	MapLandmark.Gauge.Value = 0;
	MapLandmark.Gauge.Max = S_CaptureMaxValue;
	MapLandmark.Gauge.Speed = 1;
	MapLandmark.Gauge.Captured = False;
}
***
```

Then you have to manage the pole during the `Playloop`:

```
foreach (MapLandmark in MapLandmarks_Gauge) {
 if (MapLandmark.Gate != Null) continue;
 
 foreach (PlayerId in MapLandmark.Sector.PlayersIds) {
 	declare Player <=> AlPlayers[PlayerId];
 	if (Player == Null) continue;
 	
 	if (Pole.Gauge.Value == Pole.Gauge.Max) {
 		MapLandmark.Gauge.Captured = True;
 		Score::AddPoints(Player, 1);
 		MB_StopRound = True;
 		Message::SendBigMessage(TextLib::Compose("$<%1$> has loaded the Pole!", Player.Name), 4000, 10);
			}
		}
	}
    
	if (MapLandmark.Sector.PlayersIds.count == 0) {
 		MapLandmark.Gauge.Speed = 0;
 		MapLandmark.Gauge.Captured = False;
	}
}
```

In this example, we check all the pole of the map and on each of them, we check if there is a player around it, if so we are loading the pole and if the pole is loaded, we give one point to the player and we stop the round. If there is no one, the pole is reset.