---
title: 'Drop an object from a player'
taxonomy:
    category:
        - docs
---

For your mode you'll maybe have to drop a dynamic object (like a ball for example) from a player. To do so you'll need this kind of code:

```
Void DropObject(CSmPlayer _Shooter, CSmPlayer _Victim) {
	if (_Victim.Objects.count <= 0) return;

	declare CSmObject VictimItem = _Victim.Objects[0];
	if (VictimItem != Null) {
		declare Vec3 Pos;
		declare Vec3 Vel;

		if (_Shooter != Null) {
			Pos = _Victim.Position + <0., 3., 0.>;
			Vel = _Shooter.Position - _Victim.Position;
			declare Real DropForce = 5.;
			declare Real VelNorm = MathLib::Sqrt((Vel.X*Vel.X) + (Vel.Y*Vel.Y) + (Vel.Z*Vel.Z));
			Vel = (- (DropForce/VelNorm) * Vel)  + <0., 5., 0.>;
		} else {
			Pos = _Victim.Position + <0., 3., 0.>;
			Vel = <6., 6., 6.>;
		}
		VictimItem.SetPositionAndVel(Pos, Vel);
	}
}
```

With this function, the object will be dropped in the opposite direction of the shot (in that way you can suppose from where the shot is from).