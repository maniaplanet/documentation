---
title: 'XML-RPC Callbacks'
taxonomy:
    category:
        - docs
---

## List of XML-RPC Callbacks


* ManiaPlanet.BeginMap(SMapInfo Map);
* ManiaPlanet.BeginMatch();
* ManiaPlanet.BillUpdated(int BillId, int State, string StateName, int TransactionId);
* ManiaPlanet.Echo(string Internal, string Public);
* ManiaPlanet.EndMap(SMapInfo Map);
* ManiaPlanet.EndMatch(SPlayerRanking Rankings[], int WinnerTeam);
* ManiaPlanet.MapListModified(int CurMapIndex, int NextMapIndex, bool IsListModified);
* ManiaPlanet.ModeScriptCallback(string Param1, string Param2);
* ManiaPlanet.ModeScriptCallbackArray(string Param1, string Params[]);
* ManiaPlanet.PlayerAlliesChanged(string Login);
* ManiaPlanet.PlayerChat(int PlayerUid, string Login, string Text, bool IsRegistredCmd);
* ManiaPlanet.PlayerConnect(string Login, bool IsSpectator);
* ManiaPlanet.PlayerDisconnect(string Login, string DisconnectionReason);
* ManiaPlanet.PlayerInfoChanged(SPlayerInfo PlayerInfo);
* ManiaPlanet.PlayerManialinkPageAnswer(int PlayerUid, string Login, string Answer, SEntryVal Entries[]);
* ManiaPlanet.ServerStart();
* ManiaPlanet.ServerStop();
* ManiaPlanet.StatusChanged(int StatusCode, string StatusName);
* ManiaPlanet.TunnelDataReceived(int PlayerUid, string Login, base64 Data);
* ManiaPlanet.VoteUpdated(string StateName, string Login, string CmdName, string CmdParam);
* ScriptCloud.LoadData(string Type, string Id);
* ScriptCloud.SaveData(string Type, string Id);
* StateName values: NewVote, VoteCancelled, VotePassed or VoteFailed
* TrackMania.PlayerCheckpoint(int PlayerUid, string Login, int TimeOrScore, int CurLap, int CheckpointIndex);
* TrackMania.PlayerFinish(int PlayerUid, string Login, int TimeOrScore);
* TrackMania.PlayerIncoherence(int PlayerUid, string Login);

```
struct SEntryVal
{
  string Name;
  string Value;
}
```
```
struct SMapInfo
{
  string Uid;
  string Name;
  string FileName;
  string Author;
  string Environnement;
  string Mood;
  int BronzeTime;
  int SilverTime;
  int GoldTime;
  int AuthorTime;
  int CopperPrice;
  bool LapRace;
  int NbLaps;
  int NbCheckpoints;
  string MapType;
  string MapStyle;
}
```
```
struct SPlayerRanking
{
  string Login;
  string NickName;
  int PlayerId;
  int Rank;
  int BestTime;
  int[] BestCheckpoints;
  int Score;
  int NbrLapsFinished;
  double LadderScore;
}
```
```
struct SPlayerInfo
{
  string Login;
  string NickName;
  int PlayerId;
  int TeamId;
  int SpectatorStatus;
  int LadderRanking;
  int Flags;
}
```
