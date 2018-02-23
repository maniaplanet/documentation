---
title: 'Shootmania script example'
taxonomy:
    category:
        - docs
---

```
#Extends "Modes/ShootMania/ModeBase.Script.txt"

#Const  CompatibleMapTypes  "MeleeArena"
#Const  Version             "1.0.0"
#Const  ScriptName          "Melee_Tutorial.Script.txt"

#Include "Libs/Nadeo/Settings.Script.txt" as Settings
#Include "TextLib" as TextLib
#Include "MathLib" as MathLib
#Include "Libs/Nadeo/ShootMania/SM.Script.txt" as SM
#Include "Libs/Nadeo/ShootMania/Score.Script.txt" as Score
#Include "Libs/Nadeo/Message.Script.txt" as Message
#Include "Libs/Nadeo/Interface.Script.txt" as Interface
#Include "Libs/Nadeo/Layers.Script.txt" as Layers

// ---------------------------------- //
// Settings
// ---------------------------------- //
#Setting S_TimeLimit    600 as _("Time limit")      ///< Time limit on a map
#Setting S_PointLimit   25  as _("Points limit")    ///< Points limit on a map

declare Ident[]	G_SpawnsList;		///< Id of all the BlockSpawns of the map
declare Ident	G_LatestSpawnId;	///< Id of the last BlockSpawn used

***StartServer***
***
UseClans = False;

declare PointsLayerId      = Layers::Create("PointsLayer", PointLayerLayerText());
declare Attached           = Layers::Attach("PointsLayer", NullId);

ST2::SetStyle("LibST_SMBaseSolo");
ST2::SetTeamsMode(False);
ST2::SetTeamsScoresVisibility(False);
ST2::Build("SM");
***

***StartMap***
***
Score::MatchBegin();
Score::RoundBegin();

G_SpawnsList.clear();
G_LatestSpawnId = NullId;

// ---------------------------------- //
// Init bases
foreach (Base in MapBases) {
	Base.Clan = 0;
	Base.IsActive = True;
}

// ---------------------------------- //
// Init scores
MB_Sleep(1); ///< Allow the scores array to be sorted
foreach (Score in Scores) {
	declare Integer LastPoint for Score;
	LastPoint = 0;
}

declare LeadId = NullId;
if (Scores.existskey(0)) LeadId = Scores[0].User.Id;

declare CurrentPointLimit = S_PointLimit;

// ---------------------------------- //
// Start game
StartTime = Now;
EndTime = StartTime + (S_TimeLimit * 1000);
UIManager.UIAll.UISequence = CUIConfig::EUISequence::Playing;
***

***StartRound***
***
foreach (Player in Players){
	declare UI <=> UIManager.GetUI(Player);
	declare netwrite Integer Net_Points for UI;
	Net_Points = 0;
}
***

***PlayLoop***
***
foreach (Event in PendingEvents) {
	// ---------------------------------- //
	// On armor empty
	if (Event.Type == CSmModeEvent::EType::OnArmorEmpty) {
		if (Event.Shooter == Null) Score::RemovePoints(Event.Victim, 1);
		
			Event.Shooter.Score.Points += 1;
            declare UI <=> UIManager.GetUI(Event.Shooter);
            declare netwrite Integer Net_Points for UI;
            Net_Points = Event.Shooter.Score.Points;
        }
		XmlRpc::OnArmorEmpty(Event);
		Events::Valid(Event);
	}
	// ---------------------------------- //
	// On hit
	else if (Event.Type == CSmModeEvent::EType::OnHit) {
		if (Event.Victim == Null || Event.Shooter == Event.Victim) {
			Events::Invalid(Event);
		} else {
			XmlRpc::OnHit(Event);
			Events::Valid(Event);
		}
	}
	// ---------------------------------- //
	// On player request respawn
	else if (Event.Type == CSmModeEvent::EType::OnPlayerRequestRespawn) {
		Score::RemovePoints(Event.Player, 1);
		XmlRpc::OnPlayerRequestRespawn(Event);
		Events::Valid(Event);
	}
	// ---------------------------------- //
	// Others
	else Events::Valid(Event);
}

// ---------------------------------- //
// Spawn players
foreach (Player in Players) {
    if (Player.SpawnStatus == CSmPlayer::ESpawnStatus::NotSpawned && !Player.RequestsSpectate) {
        MeleeSpawnPlayer(Player);
    }
}

// ---------------------------------- //
// Play sound and notice if someone is taking the lead
if (Scores.existskey(0) && Scores[0].User.Id != LeadId) {
	LeadId = Scores[0].User.Id;
	Message::SendBigMessage(TextLib::Compose(_("$<%1$> takes the lead!"), Scores[0].User.Name), 3000, 1, CUIConfig::EUISound::PhaseChange, 1);
}

// ---------------------------------- //
// victory conditions
declare IsMatchOver = False;
if (Now > EndTime) IsMatchOver = True;
foreach (Player in Players) {
	if (Player.Score != Null && Player.Score.Points >= CurrentPointLimit) IsMatchOver = True;
}
if (IsMatchOver) MB_StopMap = True;
***

***EndMap***
***
EndTime = -1;
Score::RoundEnd();
Score::MatchEnd(True);

// ---------------------------------- //
// End match sequence
declare CUser Winner <=> Null;
declare MaxPoints = 0;
foreach (Score in Scores) {
	if (Score.Points > MaxPoints) {
		MaxPoints = Score.Points;
		Winner <=> Score.User;
	} else if (Score.Points == MaxPoints) {
		Winner <=> Null;
	}
}

foreach (Player in Players) {
	if (Player.User != Winner) UnspawnPlayer(Player);
	Interface::UpdatePosition(Player);
}

MB_Sleep(1000);

Message::CleanBigMessages();

UIManager.UIAll.BigMessageSound = CUIConfig::EUISound::EndRound;

UIManager.UIAll.BigMessageSoundVariant = 0;
if (Winner != Null) {
	UIManager.UIAll.BigMessage = TextLib::Compose(_("$<%1$> wins the match!"), Winner.Name);
} else {
	UIManager.UIAll.BigMessage = _("|Match|Draw");
}
MB_Sleep(2000);

UIManager.UIAll.UISequence = CUIConfig::EUISequence::EndRound;
UIManager.UIAll.ScoreTableVisibility = CUIConfig::EVisibility::ForcedVisible;
MB_Sleep(5000);

UIManager.UIAll.UISequence = CUIConfig::EUISequence::Podium;
while(!UIManager.UIAll.UISequenceIsCompleted) MB_Yield();

UIManager.UIAll.ScoreTableVisibility = CUIConfig::EVisibility::Normal;
UIManager.UIAll.BigMessage = "";
***

Void MeleeSpawnPlayer(CSmPlayer _Player) {
	if (G_SpawnsList.count == 0) foreach (PlayerSpawn in MapLandmarks_PlayerSpawn) G_SpawnsList.add(PlayerSpawn.Id);
	
	declare SpawnId = NullId;
	while (True) {
		SpawnId = G_SpawnsList[MathLib::Rand(0, G_SpawnsList.count - 1)];
		if (SpawnId != G_LatestSpawnId) break;
		if (G_SpawnsList.count == 1) break;
	}
	G_LatestSpawnId = SpawnId;
	
	SM::SpawnPlayer(_Player, 0, MapLandmarks_PlayerSpawn[SpawnId]);
	declare Removed = G_SpawnsList.remove(SpawnId);
}

Text PointLayerLayerText(){
	return """
<label pos="130 50" z-index="35" text="YOUR POINTS: 0" style="TextButtonMedium" id="Label_Points" scale="0.90" halign="center" valign="center" textsize="4" />
<script><!--
#Include "TextLib" as TL

main() {
	declare netread Integer Net_Points for UI;
	
	declare Label_Points <=> (Page.GetFirstChild("Label_Points") as CMlLabel);
	
	Label_Points.Show();
	
	while (True) {
		yield;
		Label_Points.SetText("YOUR POINTS: "^TL::ToText(Net_Points));
	}
}
--></script>""";
}
```
