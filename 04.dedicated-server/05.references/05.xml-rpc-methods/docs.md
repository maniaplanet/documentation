---
title: 'XML-RPC Methods'
taxonomy:
    category:
        - docs
---

<table>
<tr>
<th>Method (arguments)</th>
<th>Return Type</th>
<th>Help</th>
</tr>
<tr>
<td>system.listMethods()</td>
<td>array</td>
<td>Return an array of all available XML-RPC methods on this server.</td>
</tr>
<tr>
<td>system.methodSignature(string)</td>
<td>array</td>
<td>Given the name of a method, return an array of legal signatures. Each signature is an array of strings.  The first item of each signature is the return type, and any others items are parameter types.</td>
</tr>
<tr>
<td>system.methodHelp(string)</td>
<td>string</td>
<td>Given the name of a method, return a help string.</td>
</tr>
<tr>
<td>system.multicall(array)</td>
<td>array</td>
<td>Process an array of calls, and return an array of results.  Calls should be structs of the form {'methodName': string, 'params': array}. Each result will either be a single-item array containing the result value, or a struct of the form {'faultCode': int, 'faultString': string}.  This is useful when you need to make lots of small calls without lots of round trips.</td>
</tr>
<tr>
<td>Authenticate(string, string)</td>
<td>boolean</td>
<td>Allow user authentication by specifying a login and a password, to gain access to the set of functionalities corresponding to this authorization level.</td>
</tr>
<tr>
<td>ChangeAuthPassword(string, string)</td>
<td>boolean</td>
<td>Change the password for the specified login/user. Only available to SuperAdmin.</td>
</tr>
<tr>
<td>EnableCallbacks(boolean)</td>
<td>boolean</td>
<td>Allow the GameServer to call you back.</td>
</tr>
<tr>
<td>SetApiVersion(string)</td>
<td>boolean</td>
<td>Define the wanted api.</td>
</tr>
<tr>
<td>GetVersion()</td>
<td>struct</td>
<td>Returns a struct with the <i>Name</i>, <i>TitleId</i>, <i>Version</i>, <i>Build</i> and <i>ApiVersion</i> of the application remotely controlled.</td>
</tr>
<tr>
<td>GetStatus()</td>
<td>struct</td>
<td>Returns the current status of the server.</td>
</tr>
<tr>
<td>QuitGame()</td>
<td>boolean</td>
<td>Quit the application. Only available to SuperAdmin.</td>
</tr>
<tr>
<td>CallVote(string)</td>
<td>boolean</td>
<td>Call a vote for a cmd. The command is a XML string corresponding to an XmlRpc request. Only available to Admin.</td>
</tr>
<tr>
<td>CallVoteEx(string, double, int, int)</td>
<td>boolean</td>
<td>Extended call vote. Same as CallVote, but you can additionally supply specific parameters for this vote: a ratio, a time out and who is voting. Special timeout values: a ratio of '-1' means default; a timeout of '0' means default, '1' means indefinite; Voters values: '0' means only active players, '1' means any player, '2' is for everybody, pure spectators included. Only available to Admin.</td>
</tr>
<tr>
<td>InternalCallVote()</td>
<td>boolean</td>
<td>Used internally by game.</td>
</tr>
<tr>
<td>CancelVote()</td>
<td>boolean</td>
<td>Cancel the current vote. Only available to Admin.</td>
</tr>
<tr>
<td>GetCurrentCallVote()</td>
<td>struct</td>
<td>Returns the vote currently in progress. The returned structure is { CallerLogin, CmdName, CmdParam }.</td>
</tr>
<tr>
<td>SetCallVoteTimeOut(int)</td>
<td>boolean</td>
<td>Set a new timeout for waiting for votes. A zero value disables callvote. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetCallVoteTimeOut()</td>
<td>struct</td>
<td>Get the current and next timeout for waiting for votes. The struct returned contains two fields 'CurrentValue' and 'NextValue'.</td>
</tr>
<tr>
<td>SetCallVoteRatio(double)</td>
<td>boolean</td>
<td>Set a new default ratio for passing a vote. Must lie between 0 and 1. Only available to Admin.</td>
</tr>
<tr>
<td>GetCallVoteRatio()</td>
<td>double</td>
<td>Get the current default ratio for passing a vote. This value lies between 0 and 1.</td>
</tr>
<tr>
<td>SetCallVoteRatios(array)</td>
<td>boolean</td>
<td>Set the ratios list for passing specific votes. The parameter is an array of structs {string <i>Command</i>, double <i>Ratio</i>}, ratio is in [0,1] or -1 for vote disabled. Only available to Admin.</td>
</tr>
<tr>
<td>GetCallVoteRatios()</td>
<td>array</td>
<td>Get the current ratios for passing votes.</td>
</tr>
<tr>
<td>SetCallVoteRatiosEx(boolean, array)</td>
<td>boolean</td>
<td>Set the ratios list for passing specific votes, extended version with parameters matching. The parameters, a boolean <i>ReplaceAll</i> (or else, only modify specified ratios, leaving the previous ones unmodified) and an array of structs {string <i>Command</i>, string <i>Param</i>, double <i>Ratio</i>}, ratio is in [0,1] or -1 for vote disabled. Param is matched against the vote parameters to make more specific ratios, leave empty to match all votes for the command. Only available to Admin.</td>
</tr>
<tr>
<td>GetCallVoteRatiosEx()</td>
<td>array</td>
<td>Get the current ratios for passing votes, extended version with parameters matching.</td>
</tr>
<tr>
<td>ChatSendServerMessage(string)</td>
<td>boolean</td>
<td>Send a text message to all clients without the server login. Only available to Admin.</td>
</tr>
<tr>
<td>ChatSendServerMessageToLanguage(array, string)</td>
<td>boolean</td>
<td>Send a localised text message to all clients without the server login, or optionally to a Login (which can be a single login or a list of comma-separated logins). The parameter is an array of structures {<i>Lang</i>='xx', <i>Text</i>='...'}. If no matching language is found, the last text in the array is used. Only available to Admin.</td>
</tr>
<tr>
<td>ChatSendServerMessageToId(string, int)</td>
<td>boolean</td>
<td>Send a text message without the server login to the client with the specified PlayerId. Only available to Admin.</td>
</tr>
<tr>
<td>ChatSendServerMessageToLogin(string, string)</td>
<td>boolean</td>
<td>Send a text message without the server login to the client with the specified login. Login can be a single login or a list of comma-separated logins. Only available to Admin.</td>
</tr>
<tr>
<td>ChatSend(string)</td>
<td>boolean</td>
<td>Send a text message to all clients. Only available to Admin.</td>
</tr>
<tr>
<td>ChatSendToLanguage(array, string)</td>
<td>boolean</td>
<td>Send a localised text message to all clients, or optionally to a Login (which can be a single login or a list of comma-separated logins). The parameter is an array of structures {<i>Lang</i>='xx', <i>Text</i>='...'}. If no matching language is found, the last text in the array is used. Only available to Admin.</td>
</tr>
<tr>
<td>ChatSendToLogin(string, string)</td>
<td>boolean</td>
<td>Send a text message to the client with the specified login. Login can be a single login or a list of comma-separated logins. Only available to Admin.</td>
</tr>
<tr>
<td>ChatSendToId(string, int)</td>
<td>boolean</td>
<td>Send a text message to the client with the specified PlayerId. Only available to Admin.</td>
</tr>
<tr>
<td>GetChatLines()</td>
<td>array</td>
<td>Returns the last chat lines. Maximum of 40 lines. Only available to Admin.</td>
</tr>
<tr>
<td>ChatEnableManualRouting(boolean, boolean)</td>
<td>boolean</td>
<td>The chat messages are no longer dispatched to the players, they only go to the rpc callback and the controller has to manually forward them. The second (optional) parameter allows all messages from the server to be automatically forwarded. Only available to Admin.</td>
</tr>
<tr>
<td>ChatForwardToLogin(string, string, string)</td>
<td>boolean</td>
<td>(Text, SenderLogin, DestLogin) Send a text message to the specified DestLogin (or everybody if empty) on behalf of SenderLogin. DestLogin can be a single login or a list of comma-separated logins. Only available if manual routing is enabled. Only available to Admin.</td>
</tr>
<tr>
<td>SendNotice(string, string, int)</td>
<td>boolean</td>
<td>Display a notice on all clients. The parameters are the text message to display, and the login of the avatar to display next to it (or '' for no avatar), and an optional 'variant' in [0 = normal, 1 = Sad, 2 = Happy]. Only available to Admin.</td>
</tr>
<tr>
<td>SendNoticeToId(int, string, int, int)</td>
<td>boolean</td>
<td>Display a notice on the client with the specified UId. The parameters are the Uid of the client to whom the notice is sent, the text message to display, and the UId of the avatar to display next to it (or '255' for no avatar), and an optional 'variant' in [0 = normal, 1 = Sad, 2 = Happy]. Only available to Admin.</td>
</tr>
<tr>
<td>SendNoticeToLogin(string, string, string, int)</td>
<td>boolean</td>
<td>Display a notice on the client with the specified login. The parameters are the login of the client to whom the notice is sent, the text message to display, and the login of the avatar to display next to it (or '' for no avatar), and an optional 'variant' in [0 = normal, 1 = Sad, 2 = Happy]. Login can be a single login or a list of comma-separated logins.  Only available to Admin.</td>
</tr>
<tr>
<td>SendDisplayManialinkPage(string, int, boolean)</td>
<td>boolean</td>
<td>Display a manialink page on all clients. The parameters are the xml description of the page to display, a timeout to autohide it (0 = permanent), and a boolean to indicate whether the page must be hidden as soon as the user clicks on a page option. Only available to Admin.</td>
</tr>
<tr>
<td>SendDisplayManialinkPageToId(int, string, int, boolean)</td>
<td>boolean</td>
<td>Display a manialink page on the client with the specified UId. The first parameter is the UId of the player, the other are identical to 'SendDisplayManialinkPage'. Only available to Admin.</td>
</tr>
<tr>
<td>SendDisplayManialinkPageToLogin(string, string, int, boolean)</td>
<td>boolean</td>
<td>Display a manialink page on the client with the specified login. The first parameter is the login of the player, the other are identical to 'SendDisplayManialinkPage'. Login can be a single login or a list of comma-separated logins. Only available to Admin.</td>
</tr>
<tr>
<td>SendHideManialinkPage()</td>
<td>boolean</td>
<td>Hide the displayed manialink page on all clients. Only available to Admin.</td>
</tr>
<tr>
<td>SendHideManialinkPageToId(int)</td>
<td>boolean</td>
<td>Hide the displayed manialink page on the client with the specified UId. Only available to Admin.</td>
</tr>
<tr>
<td>SendHideManialinkPageToLogin(string)</td>
<td>boolean</td>
<td>Hide the displayed manialink page on the client with the specified login. Login can be a single login or a list of comma-separated logins. Only available to Admin.</td>
</tr>
<tr>
<td>GetManialinkPageAnswers()</td>
<td>array</td>
<td>Returns the latest results from the current manialink page, as an array of structs {string <i>Login</i>, int <i>PlayerId</i>, int <i>Result</i>} Result==0 -&gt; no answer, Result&gt;0.... -&gt; answer from the player.</td>
</tr>
<tr>
<td>SendOpenLinkToId(int, string, int)</td>
<td>boolean</td>
<td>Opens a link in the client with the specified UId. The parameters are the Uid of the client to whom the link to open is sent, the link url, and the 'LinkType' (0 in the external browser, 1 in the internal manialink browser). Only available to Admin.</td>
</tr>
<tr>
<td>SendOpenLinkToLogin(string, string, int)</td>
<td>boolean</td>
<td>Opens a link in the client with the specified login. The parameters are the login of the client to whom the link to open is sent, the link url, and the 'LinkType' (0 in the external browser, 1 in the internal manialink browser). Login can be a single login or a list of comma-separated logins.  Only available to Admin.</td>
</tr>
<tr>
<td>Kick(string, string)</td>
<td>boolean</td>
<td>Kick the player with the specified login, with an optional message. Only available to Admin.</td>
</tr>
<tr>
<td>KickId(int, string)</td>
<td>boolean</td>
<td>Kick the player with the specified PlayerId, with an optional message. Only available to Admin.</td>
</tr>
<tr>
<td>Ban(string, string)</td>
<td>boolean</td>
<td>Ban the player with the specified login, with an optional message. Only available to Admin.</td>
</tr>
<tr>
<td>BanAndBlackList(string, string, boolean)</td>
<td>boolean</td>
<td>Ban the player with the specified login, with a message. Add it to the black list, and optionally save the new list. Only available to Admin.</td>
</tr>
<tr>
<td>BanId(int, string)</td>
<td>boolean</td>
<td>Ban the player with the specified PlayerId, with an optional message. Only available to Admin.</td>
</tr>
<tr>
<td>UnBan(string)</td>
<td>boolean</td>
<td>Unban the player with the specified login. Only available to Admin.</td>
</tr>
<tr>
<td>CleanBanList()</td>
<td>boolean</td>
<td>Clean the ban list of the server. Only available to Admin.</td>
</tr>
<tr>
<td>GetBanList(int, int)</td>
<td>array</td>
<td>Returns the list of banned players. This method takes two parameters. The first parameter specifies the maximum number of infos to be returned, and the second one the starting index in the list. The list is an array of structures. Each structure contains the following fields : <i>Login</i>, <i>ClientName</i> and <i>IPAddress</i>.</td>
</tr>
<tr>
<td>BlackList(string)</td>
<td>boolean</td>
<td>Blacklist the player with the specified login. Only available to SuperAdmin.</td>
</tr>
<tr>
<td>BlackListId(int)</td>
<td>boolean</td>
<td>Blacklist the player with the specified PlayerId. Only available to SuperAdmin.</td>
</tr>
<tr>
<td>UnBlackList(string)</td>
<td>boolean</td>
<td>UnBlackList the player with the specified login. Only available to SuperAdmin.</td>
</tr>
<tr>
<td>CleanBlackList()</td>
<td>boolean</td>
<td>Clean the blacklist of the server. Only available to SuperAdmin.</td>
</tr>
<tr>
<td>GetBlackList(int, int)</td>
<td>array</td>
<td>Returns the list of blacklisted players. This method takes two parameters. The first parameter specifies the maximum number of infos to be returned, and the second one the starting index in the list. The list is an array of structures. Each structure contains the following fields : <i>Login</i>.</td>
</tr>
<tr>
<td>LoadBlackList(string)</td>
<td>boolean</td>
<td>Load the black list file with the specified file name. Only available to Admin.</td>
</tr>
<tr>
<td>SaveBlackList(string)</td>
<td>boolean</td>
<td>Save the black list in the file with specified file name. Only available to Admin.</td>
</tr>
<tr>
<td>AddGuest(string)</td>
<td>boolean</td>
<td>Add the player with the specified login on the guest list. Only available to Admin.</td>
</tr>
<tr>
<td>AddGuestId(int)</td>
<td>boolean</td>
<td>Add the player with the specified PlayerId on the guest list. Only available to Admin.</td>
</tr>
<tr>
<td>RemoveGuest(string)</td>
<td>boolean</td>
<td>Remove the player with the specified login from the guest list. Only available to Admin.</td>
</tr>
<tr>
<td>RemoveGuestId(int)</td>
<td>boolean</td>
<td>Remove the player with the specified PlayerId from the guest list. Only available to Admin.</td>
</tr>
<tr>
<td>CleanGuestList()</td>
<td>boolean</td>
<td>Clean the guest list of the server. Only available to Admin.</td>
</tr>
<tr>
<td>GetGuestList(int, int)</td>
<td>array</td>
<td>Returns the list of players on the guest list. This method takes two parameters. The first parameter specifies the maximum number of infos to be returned, and the second one the starting index in the list. The list is an array of structures. Each structure contains the following fields : <i>Login</i>.</td>
</tr>
<tr>
<td>LoadGuestList(string)</td>
<td>boolean</td>
<td>Load the guest list file with the specified file name. Only available to Admin.</td>
</tr>
<tr>
<td>SaveGuestList(string)</td>
<td>boolean</td>
<td>Save the guest list in the file with specified file name. Only available to Admin.</td>
</tr>
<tr>
<td>SetBuddyNotification(string, boolean)</td>
<td>boolean</td>
<td>Sets whether buddy notifications should be sent in the chat. <i>login</i> is the login of the player, or '' for global setting, and <i>enabled</i> is the value. Only available to Admin.</td>
</tr>
<tr>
<td>GetBuddyNotification(string)</td>
<td>boolean</td>
<td>Gets whether buddy notifications are enabled for <i>login</i>, or '' to get the global setting.</td>
</tr>
<tr>
<td>WriteFile(string, base64)</td>
<td>boolean</td>
<td>Write the data to the specified file. The filename is relative to the Maps path. Only available to Admin.</td>
</tr>
<tr>
<td>TunnelSendDataToId(int, base64)</td>
<td>boolean</td>
<td>Send the data to the specified player. Only available to Admin.</td>
</tr>
<tr>
<td>TunnelSendDataToLogin(string, base64)</td>
<td>boolean</td>
<td>Send the data to the specified player. Login can be a single login or a list of comma-separated logins. Only available to Admin.</td>
</tr>
<tr>
<td>Echo(string, string)</td>
<td>boolean</td>
<td>Just log the parameters and invoke a callback. Can be used to talk to other xmlrpc clients connected, or to make custom votes. If used in a callvote, the first parameter will be used as the vote message on the clients. Only available to Admin.</td>
</tr>
<tr>
<td>Ignore(string)</td>
<td>boolean</td>
<td>Ignore the player with the specified login. Only available to Admin.</td>
</tr>
<tr>
<td>IgnoreId(int)</td>
<td>boolean</td>
<td>Ignore the player with the specified PlayerId. Only available to Admin.</td>
</tr>
<tr>
<td>UnIgnore(string)</td>
<td>boolean</td>
<td>Unignore the player with the specified login. Only available to Admin.</td>
</tr>
<tr>
<td>UnIgnoreId(int)</td>
<td>boolean</td>
<td>Unignore the player with the specified PlayerId. Only available to Admin.</td>
</tr>
<tr>
<td>CleanIgnoreList()</td>
<td>boolean</td>
<td>Clean the ignore list of the server. Only available to Admin.</td>
</tr>
<tr>
<td>GetIgnoreList(int, int)</td>
<td>array</td>
<td>Returns the list of ignored players. This method takes two parameters. The first parameter specifies the maximum number of infos to be returned, and the second one the starting index in the list. The list is an array of structures. Each structure contains the following fields : <i>Login</i>.</td>
</tr>
<tr>
<td>Pay(string, int, string)</td>
<td>int</td>
<td>Pay planets from the server account to a player, returns the BillId. This method takes three parameters: <i>Login</i> of the payee, <i>Cost</i> in planets to pay and a <i>Label</i> to send with the payment. The creation of the transaction itself may cost planets, so you need to have planets on the server account. Only available to Admin.</td>
</tr>
<tr>
<td>SendBill(string, int, string, string)</td>
<td>int</td>
<td>Create a bill, send it to a player, and return the BillId. This method takes four parameters: <i>LoginFrom</i> of the payer, <i>Cost</i> in planets the player has to pay, <i>Label</i> of the transaction and an optional <i>LoginTo</i> of the payee (if empty string, then the server account is used). The creation of the transaction itself may cost planets, so you need to have planets on the server account. Only available to Admin.</td>
</tr>
<tr>
<td>GetBillState(int)</td>
<td>struct</td>
<td>Returns the current state of a bill. This method takes one parameter, the <i>BillId</i>. Returns a struct containing <i>State</i>, <i>StateName</i> and <i>TransactionId</i>. Possible enum values are: <i>CreatingTransaction</i>, <i>Issued</i>, <i>ValidatingPayement</i>, <i>Payed</i>, <i>Refused</i>, <i>Error</i>.</td>
</tr>
<tr>
<td>GetServerPlanets()</td>
<td>int</td>
<td>Returns the current number of planets on the server account.</td>
</tr>
<tr>
<td>GetSystemInfo()</td>
<td>struct</td>
<td>Get some system infos, including connection rates (in kbps).</td>
</tr>
<tr>
<td>SetConnectionRates(int, int)</td>
<td>boolean</td>
<td>Set the download and upload rates (in kbps).</td>
</tr>
<tr>
<td>GetServerTags()</td>
<td>array</td>
<td>Returns the list of tags and associated values set on this server. Only available to Admin.</td>
</tr>
<tr>
<td>SetServerTag(string, string)</td>
<td>boolean</td>
<td>Set a tag and its value on the server. This method takes two parameters. The first parameter specifies the name of the tag, and the second one its value. The list is an array of structures {string <i>Name</i>, string <i>Value</i>}. Only available to Admin.</td>
</tr>
<tr>
<td>UnsetServerTag(string)</td>
<td>boolean</td>
<td>Unset the tag with the specified name on the server. Only available to Admin.</td>
</tr>
<tr>
<td>ResetServerTags()</td>
<td>boolean</td>
<td>Reset all tags on the server. Only available to Admin.</td>
</tr>
<tr>
<td>SetServerName(string)</td>
<td>boolean</td>
<td>Set a new server name in utf8 format. Only available to Admin.</td>
</tr>
<tr>
<td>GetServerName()</td>
<td>string</td>
<td>Get the server name in utf8 format.</td>
</tr>
<tr>
<td>SetServerComment(string)</td>
<td>boolean</td>
<td>Set a new server comment in utf8 format. Only available to Admin.</td>
</tr>
<tr>
<td>GetServerComment()</td>
<td>string</td>
<td>Get the server comment in utf8 format.</td>
</tr>
<tr>
<td>SetHideServer(int)</td>
<td>boolean</td>
<td>Set whether the server should be hidden from the public server list (0 = visible, 1 = always hidden, 2 = hidden from nations). Only available to Admin.</td>
</tr>
<tr>
<td>GetHideServer()</td>
<td>int</td>
<td>Get whether the server wants to be hidden from the public server list.</td>
</tr>
<tr>
<td>IsRelayServer()</td>
<td>boolean</td>
<td>Returns true if this is a relay server.</td>
</tr>
<tr>
<td>SetServerPassword(string)</td>
<td>boolean</td>
<td>Set a new password for the server. Only available to Admin.</td>
</tr>
<tr>
<td>GetServerPassword()</td>
<td>string</td>
<td>Get the server password if called as Admin or Super Admin, else returns if a password is needed or not.</td>
</tr>
<tr>
<td>SetServerPasswordForSpectator(string)</td>
<td>boolean</td>
<td>Set a new password for the spectator mode. Only available to Admin.</td>
</tr>
<tr>
<td>GetServerPasswordForSpectator()</td>
<td>string</td>
<td>Get the password for spectator mode if called as Admin or Super Admin, else returns if a password is needed or not.</td>
</tr>
<tr>
<td>SetMaxPlayers(int)</td>
<td>boolean</td>
<td>Set a new maximum number of players. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetMaxPlayers()</td>
<td>struct</td>
<td>Get the current and next maximum number of players allowed on server. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetMaxSpectators(int)</td>
<td>boolean</td>
<td>Set a new maximum number of Spectators. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetMaxSpectators()</td>
<td>struct</td>
<td>Get the current and next maximum number of Spectators allowed on server. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetLobbyInfo(boolean, int, int, double)</td>
<td>boolean</td>
<td>Declare if the server is a lobby, the number and maximum number of players currently managed by it, and the average level of the players. Only available to Admin.</td>
</tr>
<tr>
<td>GetLobbyInfo()</td>
<td>struct</td>
<td>Get whether the server if a lobby, the number and maximum number of players currently managed by it. The struct returned contains 4 fields <i>IsLobby</i>, <i>LobbyPlayers</i>, <i>LobbyMaxPlayers</i>, and <i>LobbyPlayersLevel</i>.</td>
</tr>
<tr>
<td>CustomizeQuitDialog(string, string, boolean, int)</td>
<td>boolean</td>
<td>Customize the clients 'leave server' dialog box. Parameters are: <i>ManialinkPage</i>, <i>SendToServer</i> url '#qjoin=login@title', <i>ProposeAddToFavorites</i> and <i>DelayQuitButton</i> (in milliseconds). Only available to Admin.</td>
</tr>
<tr>
<td>KeepPlayerSlots(boolean)</td>
<td>boolean</td>
<td>Set whether, when a player is switching to spectator, the server should still consider them a player and keep their player slot, or not. Only available to Admin.</td>
</tr>
<tr>
<td>IsKeepingPlayerSlots()</td>
<td>boolean</td>
<td>Get whether the server keeps player slots when switching to spectator.</td>
</tr>
<tr>
<td>EnableP2PUpload(boolean)</td>
<td>boolean</td>
<td>Enable or disable peer-to-peer upload from server. Only available to Admin.</td>
</tr>
<tr>
<td>IsP2PUpload()</td>
<td>boolean</td>
<td>Returns if the peer-to-peer upload from server is enabled.</td>
</tr>
<tr>
<td>EnableP2PDownload(boolean)</td>
<td>boolean</td>
<td>Enable or disable peer-to-peer download for server. Only available to Admin.</td>
</tr>
<tr>
<td>IsP2PDownload()</td>
<td>boolean</td>
<td>Returns if the peer-to-peer download for server is enabled.</td>
</tr>
<tr>
<td>AllowMapDownload(boolean)</td>
<td>boolean</td>
<td>Allow clients to download maps from the server. Only available to Admin.</td>
</tr>
<tr>
<td>IsMapDownloadAllowed()</td>
<td>boolean</td>
<td>Returns if clients can download maps from the server.</td>
</tr>
<tr>
<td>GameDataDirectory()</td>
<td>string</td>
<td>Returns the path of the game datas directory. Only available to Admin.</td>
</tr>
<tr>
<td>GetMapsDirectory()</td>
<td>string</td>
<td>Returns the path of the maps directory. Only available to Admin.</td>
</tr>
<tr>
<td>GetSkinsDirectory()</td>
<td>string</td>
<td>Returns the path of the skins directory. Only available to Admin.</td>
</tr>
<tr>
<td>SetTeamInfo(string, double, string, string, double, string, string, double, string)</td>
<td>boolean</td>
<td>Set Team names and colors (deprecated). Only available to Admin.</td>
</tr>
<tr>
<td>GetTeamInfo(int)</td>
<td>struct</td>
<td>Return Team info for a given clan (0 = no clan, 1, 2). The structure contains: <i>Name</i>, <i>ZonePath</i>, <i>City</i>, <i>EmblemUrl</i>, <i>HuePrimary</i>, <i>HueSecondary</i>, <i>RGB</i>, <i>ClubLinkUrl</i>. Only available to Admin.</td>
</tr>
<tr>
<td>SetForcedClubLinks(string, string)</td>
<td>boolean</td>
<td>Set the clublinks to use for the two clans. Only available to Admin.</td>
</tr>
<tr>
<td>GetForcedClubLinks()</td>
<td>struct</td>
<td>Get the forced clublinks.</td>
</tr>
<tr>
<td>ConnectFakePlayer()</td>
<td>string</td>
<td>(debug tool) Connect a fake player to the server and returns the login. Only available to Admin.</td>
</tr>
<tr>
<td>DisconnectFakePlayer(string)</td>
<td>boolean</td>
<td>(debug tool) Disconnect a fake player, or all the fake players if login is '*'. Only available to Admin.</td>
</tr>
<tr>
<td>GetDemoTokenInfosForPlayer(string)</td>
<td>struct</td>
<td>Returns the token infos for a player. The returned structure is { TokenCost, CanPayToken }.</td>
</tr>
<tr>
<td>DisableHorns(boolean)</td>
<td>boolean</td>
<td>Disable player horns. Only available to Admin.</td>
</tr>
<tr>
<td>AreHornsDisabled()</td>
<td>boolean</td>
<td>Returns whether the horns are disabled.</td>
</tr>
<tr>
<td>DisableServiceAnnounces(boolean)</td>
<td>boolean</td>
<td>Disable the automatic mesages when a player connects/disconnects from the server. Only available to Admin.</td>
</tr>
<tr>
<td>AreServiceAnnouncesDisabled()</td>
<td>boolean</td>
<td>Returns whether the automatic mesages are disabled.</td>
</tr>
<tr>
<td>AutoSaveReplays(boolean)</td>
<td>boolean</td>
<td>Enable the autosaving of all replays (vizualisable replays with all players, but not validable) on the server. Only available to SuperAdmin.</td>
</tr>
<tr>
<td>AutoSaveValidationReplays(boolean)</td>
<td>boolean</td>
<td>Enable the autosaving on the server of validation replays, every time a player makes a new time. Only available to SuperAdmin.</td>
</tr>
<tr>
<td>IsAutoSaveReplaysEnabled()</td>
<td>boolean</td>
<td>Returns if autosaving of all replays is enabled on the server.</td>
</tr>
<tr>
<td>IsAutoSaveValidationReplaysEnabled()</td>
<td>boolean</td>
<td>Returns if autosaving of validation replays is enabled on the server.</td>
</tr>
<tr>
<td>SaveCurrentReplay(string)</td>
<td>boolean</td>
<td>Saves the current replay (vizualisable replays with all players, but not validable). Pass a filename, or '' for an automatic filename. Only available to Admin.</td>
</tr>
<tr>
<td>SaveBestGhostsReplay(string, string)</td>
<td>boolean</td>
<td>Saves a replay with the ghost of all the players' best race. First parameter is the login of the player (or '' for all players), Second parameter is the filename, or '' for an automatic filename. Only available to Admin.</td>
</tr>
<tr>
<td>GetValidationReplay(string)</td>
<td>base64</td>
<td>Returns a replay containing the data needed to validate the current best time of the player. The parameter is the login of the player.</td>
</tr>
<tr>
<td>SetLadderMode(int)</td>
<td>boolean</td>
<td>Set a new ladder mode between ladder disabled (0) and forced (1). Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetLadderMode()</td>
<td>struct</td>
<td>Get the current and next ladder mode on server. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>GetLadderServerLimits()</td>
<td>struct</td>
<td>Get the ladder points limit for the players allowed on this server. The struct returned contains two fields <i>LadderServerLimitMin</i> and <i>LadderServerLimitMax</i>.</td>
</tr>
<tr>
<td>SetVehicleNetQuality(int)</td>
<td>boolean</td>
<td>Set the network vehicle quality to Fast (0) or High (1). Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetVehicleNetQuality()</td>
<td>struct</td>
<td>Get the current and next network vehicle quality on server. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetServerOptions(struct)</td>
<td>boolean</td>
<td>Set new server options using the struct passed as parameters. This struct must contain the following fields : <i>Name</i>, <i>Comment</i>, <i>Password</i>, <i>PasswordForSpectator</i>, <i>NextMaxPlayers</i>, <i>NextMaxSpectators</i>, <i>IsP2PUpload</i>, <i>IsP2PDownload</i>, <i>NextLadderMode</i>, <i>NextVehicleNetQuality</i>, <i>NextCallVoteTimeOut</i>, <i>CallVoteRatio</i>, <i>AllowMapDownload</i>, <i>AutoSaveReplays</i>, and optionally for forever: <i>RefereePassword</i>, <i>RefereeMode</i>, <i>AutoSaveValidationReplays</i>, <i>HideServer</i>, <i>UseChangingValidationSeed</i>, <i>ClientInputsMaxLatency</i>, <i>DisableHorns</i>, <i>DisableServiceAnnounces</i>, <i>KeepPlayerSlots</i>. Only available to Admin. A change of NextMaxPlayers, NextMaxSpectators, NextLadderMode, NextVehicleNetQuality, NextCallVoteTimeOut or UseChangingValidationSeed requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetServerOptions()</td>
<td>struct</td>
<td>Returns a struct containing the server options: <i>Name</i>, <i>Comment</i>, <i>Password</i>, <i>PasswordForSpectator</i>, <i>CurrentMaxPlayers</i>, <i>NextMaxPlayers</i>, <i>CurrentMaxSpectators</i>, <i>NextMaxSpectators</i>, <i>KeepPlayerSlots</i>, <i>IsP2PUpload</i>, <i>IsP2PDownload</i>, <i>CurrentLadderMode</i>, <i>NextLadderMode</i>, <i>CurrentVehicleNetQuality</i>, <i>NextVehicleNetQuality</i>, <i>CurrentCallVoteTimeOut</i>, <i>NextCallVoteTimeOut</i>, <i>CallVoteRatio</i>, <i>AllowMapDownload</i>, <i>AutoSaveReplays</i>, <i>RefereePassword</i>, <i>RefereeMode</i>, <i>AutoSaveValidationReplays</i>, <i>HideServer</i>, <i>CurrentUseChangingValidationSeed</i>, <i>NextUseChangingValidationSeed</i>, <i>ClientInputsMaxLatency</i>, <i>DisableHorns</i>, <i>DisableServiceAnnounces</i>.</td>
</tr>
<tr>
<td>SetForcedTeams(boolean)</td>
<td>boolean</td>
<td>Set whether the players can choose their side or if the teams are forced by the server (using ForcePlayerTeam()). Only available to Admin.</td>
</tr>
<tr>
<td>GetForcedTeams()</td>
<td>boolean</td>
<td>Returns whether the players can choose their side or if the teams are forced by the server.</td>
</tr>
<tr>
<td>SetForcedMods(boolean, array)</td>
<td>boolean</td>
<td>Set the mods to apply on the clients. Parameters: <i>Override</i>, if true even the maps with a mod will be overridden by the server setting; and <i>Mods</i>, an array of structures [{<i>EnvName</i>, <i>Url</i>}, ...]. Requires a map restart to be taken into account. Only available to Admin.</td>
</tr>
<tr>
<td>GetForcedMods()</td>
<td>struct</td>
<td>Get the mods settings.</td>
</tr>
<tr>
<td>SetForcedMusic(boolean, string)</td>
<td>boolean</td>
<td>Set the music to play on the clients. Parameters: <i>Override</i>, if true even the maps with a custom music will be overridden by the server setting, and a <i>UrlOrFileName</i> for the music. Requires a map restart to be taken into account. Only available to Admin.</td>
</tr>
<tr>
<td>GetForcedMusic()</td>
<td>struct</td>
<td>Get the music setting.</td>
</tr>
<tr>
<td>SetForcedSkins(array)</td>
<td>boolean</td>
<td>Defines a list of remappings for player skins. It expects a list of structs <i>Orig</i>, <i>Name</i>, <i>Checksum</i>, <i>Url</i>.  Orig is the name of the skin to remap, or '*' for any other. Name, Checksum, Url define the skin to use. (They are optional, you may set value '' for any of those. All 3 null means same as Orig). Will only affect players connecting after the value is set. Only available to Admin.</td>
</tr>
<tr>
<td>GetForcedSkins()</td>
<td>array</td>
<td>Get the current forced skins.</td>
</tr>
<tr>
<td>GetLastConnectionErrorMessage()</td>
<td>string</td>
<td>Returns the last error message for an internet connection. Only available to Admin.</td>
</tr>
<tr>
<td>SetRefereePassword(string)</td>
<td>boolean</td>
<td>Set a new password for the referee mode. Only available to Admin.</td>
</tr>
<tr>
<td>GetRefereePassword()</td>
<td>string</td>
<td>Get the password for referee mode if called as Admin or Super Admin, else returns if a password is needed or not.</td>
</tr>
<tr>
<td>SetRefereeMode(int)</td>
<td>boolean</td>
<td>Set the referee validation mode. 0 = validate the top3 players, 1 = validate all players. Only available to Admin.</td>
</tr>
<tr>
<td>GetRefereeMode()</td>
<td>int</td>
<td>Get the referee validation mode.</td>
</tr>
<tr>
<td>SetUseChangingValidationSeed(boolean)</td>
<td>boolean</td>
<td>Set whether the game should use a variable validation seed or not. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetUseChangingValidationSeed()</td>
<td>struct</td>
<td>Get the current and next value of UseChangingValidationSeed. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetClientInputsMaxLatency(int)</td>
<td>boolean</td>
<td>Set the maximum time the server must wait for inputs from the clients before dropping data, or '0' for auto-adaptation. Only used by ShootMania. Only available to Admin.</td>
</tr>
<tr>
<td>GetClientInputsMaxLatency()</td>
<td>int</td>
<td>Get the current ClientInputsMaxLatency. Only used by ShootMania.</td>
</tr>
<tr>
<td>SetWarmUp(boolean)</td>
<td>boolean</td>
<td>Sets whether the server is in warm-up phase or not. Only available to Admin.</td>
</tr>
<tr>
<td>GetWarmUp()</td>
<td>boolean</td>
<td>Returns whether the server is in warm-up phase.</td>
</tr>
<tr>
<td>GetModeScriptText()</td>
<td>string</td>
<td>Get the current mode script.</td>
</tr>
<tr>
<td>SetModeScriptText(string)</td>
<td>boolean</td>
<td>Set the mode script and restart. Only available to Admin.</td>
</tr>
<tr>
<td>GetModeScriptInfo()</td>
<td>struct</td>
<td>Returns the description of the current mode script, as a structure containing: Name, CompatibleTypes, Description, Version and the settings available.</td>
</tr>
<tr>
<td>GetModeScriptSettings()</td>
<td>struct</td>
<td>Returns the current settings of the mode script.</td>
</tr>
<tr>
<td>SetModeScriptSettings(struct)</td>
<td>boolean</td>
<td>Change the settings of the mode script. Only available to Admin.</td>
</tr>
<tr>
<td>SendModeScriptCommands(struct)</td>
<td>boolean</td>
<td>Send commands to the mode script. Only available to Admin.</td>
</tr>
<tr>
<td>SetModeScriptSettingsAndCommands(struct, struct)</td>
<td>boolean</td>
<td>Change the settings and send commands to the mode script. Only available to Admin.</td>
</tr>
<tr>
<td>GetModeScriptVariables()</td>
<td>struct</td>
<td>Returns the current xml-rpc variables of the mode script.</td>
</tr>
<tr>
<td>SetModeScriptVariables(struct)</td>
<td>boolean</td>
<td>Set the xml-rpc variables of the mode script. Only available to Admin.</td>
</tr>
<tr>
<td>TriggerModeScriptEvent(string, string)</td>
<td>boolean</td>
<td>Send an event to the mode script. Only available to Admin.</td>
</tr>
<tr>
<td>TriggerModeScriptEventArray(string, array)</td>
<td>boolean</td>
<td>Send an event to the mode script. Only available to Admin.</td>
</tr>
<tr>
<td>GetScriptCloudVariables(string, string)</td>
<td>struct</td>
<td>Get the script cloud variables of given object. Only available to Admin.</td>
</tr>
<tr>
<td>SetScriptCloudVariables(string, string, struct)</td>
<td>boolean</td>
<td>Set the script cloud variables of given object. Only available to Admin.</td>
</tr>
<tr>
<td>RestartMap()</td>
<td>boolean</td>
<td>Restarts the map, with an optional boolean parameter <i>DontClearCupScores</i> (only available in cup mode). Only available to Admin.</td>
</tr>
<tr>
<td>NextMap()</td>
<td>boolean</td>
<td>Switch to next map, with an optional boolean parameter <i>DontClearCupScores</i> (only available in cup mode). Only available to Admin.</td>
</tr>
<tr>
<td>AutoTeamBalance()</td>
<td>boolean</td>
<td>Attempt to balance teams. Only available to Admin.</td>
</tr>
<tr>
<td>StopServer()</td>
<td>boolean</td>
<td>Stop the server. Only available to SuperAdmin.</td>
</tr>
<tr>
<td>ForceEndRound()</td>
<td>boolean</td>
<td>In Rounds or Laps mode, force the end of round without waiting for all players to giveup/finish. Only available to Admin.</td>
</tr>
<tr>
<td>SetGameInfos(struct)</td>
<td>boolean</td>
<td>Set new game settings using the struct passed as parameters. This struct must contain the following fields : <i>GameMode</i>, <i>ChatTime</i>, <i>RoundsPointsLimit</i>, <i>RoundsUseNewRules</i>, <i>RoundsForcedLaps</i>, <i>TimeAttackLimit</i>, <i>TimeAttackSynchStartPeriod</i>, <i>TeamPointsLimit</i>, <i>TeamMaxPoints</i>, <i>TeamUseNewRules</i>, <i>LapsNbLaps</i>, <i>LapsTimeLimit</i>, <i>FinishTimeout</i>, and optionally: <i>AllWarmUpDuration</i>, <i>DisableRespawn</i>, <i>ForceShowAllOpponents</i>, <i>RoundsPointsLimitNewRules</i>, <i>TeamPointsLimitNewRules</i>, <i>CupPointsLimit</i>, <i>CupRoundsPerMap</i>, <i>CupNbWinners</i>, <i>CupWarmUpDuration</i>. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetCurrentGameInfo()</td>
<td>struct</td>
<td>Returns a struct containing the current game settings, ie: <i>GameMode</i>, <i>ChatTime</i>, <i>NbMaps</i>, <i>RoundsPointsLimit</i>, <i>RoundsUseNewRules</i>, <i>RoundsForcedLaps</i>, <i>TimeAttackLimit</i>, <i>TimeAttackSynchStartPeriod</i>, <i>TeamPointsLimit</i>, <i>TeamMaxPoints</i>, <i>TeamUseNewRules</i>, <i>LapsNbLaps</i>, <i>LapsTimeLimit</i>, <i>FinishTimeout</i>, and additionally for version 1: <i>AllWarmUpDuration</i>, <i>DisableRespawn</i>, <i>ForceShowAllOpponents</i>, <i>RoundsPointsLimitNewRules</i>, <i>TeamPointsLimitNewRules</i>, <i>CupPointsLimit</i>, <i>CupRoundsPerMap</i>, <i>CupNbWinners</i>, <i>CupWarmUpDuration</i>.</td>
</tr>
<tr>
<td>GetNextGameInfo()</td>
<td>struct</td>
<td>Returns a struct containing the game settings for the next map, ie: <i>GameMode</i>, <i>ChatTime</i>, <i>NbMaps</i>, <i>RoundsPointsLimit</i>, <i>RoundsUseNewRules</i>, <i>RoundsForcedLaps</i>, <i>TimeAttackLimit</i>, <i>TimeAttackSynchStartPeriod</i>, <i>TeamPointsLimit</i>, <i>TeamMaxPoints</i>, <i>TeamUseNewRules</i>, <i>LapsNbLaps</i>, <i>LapsTimeLimit</i>, <i>FinishTimeout</i>, and additionally for version 1: <i>AllWarmUpDuration</i>, <i>DisableRespawn</i>, <i>ForceShowAllOpponents</i>, <i>RoundsPointsLimitNewRules</i>, <i>TeamPointsLimitNewRules</i>, <i>CupPointsLimit</i>, <i>CupRoundsPerMap</i>, <i>CupNbWinners</i>, <i>CupWarmUpDuration</i>.</td>
</tr>
<tr>
<td>GetGameInfos()</td>
<td>struct</td>
<td>Returns a struct containing two other structures, the first containing the current game settings and the second the game settings for next map. The first structure is named <i>CurrentGameInfos</i> and the second <i>NextGameInfos</i>.</td>
</tr>
<tr>
<td>SetGameMode(int)</td>
<td>boolean</td>
<td>Set a new game mode between Script (0), Rounds (1), TimeAttack (2), Team (3), Laps (4), Cup (5) and Stunts (6). Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetGameMode()</td>
<td>int</td>
<td>Get the current game mode.</td>
</tr>
<tr>
<td>SetChatTime(int)</td>
<td>boolean</td>
<td>Set a new chat time value in milliseconds (actually 'chat time' is the duration of the end race podium, 0 means no podium displayed.). Only available to Admin.</td>
</tr>
<tr>
<td>GetChatTime()</td>
<td>struct</td>
<td>Get the current and next chat time. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetFinishTimeout(int)</td>
<td>boolean</td>
<td>Set a new finish timeout (for rounds/laps mode) value in milliseconds. 0 means default. 1 means adaptative to the duration of the map. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetFinishTimeout()</td>
<td>struct</td>
<td>Get the current and next FinishTimeout. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetAllWarmUpDuration(int)</td>
<td>boolean</td>
<td>Set whether to enable the automatic warm-up phase in all modes. 0 = no, otherwise it's the duration of the phase, expressed in number of rounds (in rounds/team mode), or in number of times the gold medal time (other modes). Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetAllWarmUpDuration()</td>
<td>struct</td>
<td>Get whether the automatic warm-up phase is enabled in all modes. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetDisableRespawn(boolean)</td>
<td>boolean</td>
<td>Set whether to disallow players to respawn. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetDisableRespawn()</td>
<td>struct</td>
<td>Get whether players are disallowed to respawn. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetForceShowAllOpponents(int)</td>
<td>boolean</td>
<td>Set whether to override the players preferences and always display all opponents (0=no override, 1=show all, other value=minimum number of opponents). Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetForceShowAllOpponents()</td>
<td>struct</td>
<td>Get whether players are forced to show all opponents. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetScriptName(string)</td>
<td>boolean</td>
<td>Set a new mode script name for script mode. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetScriptName()</td>
<td>struct</td>
<td>Get the current and next mode script name for script mode. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetTimeAttackLimit(int)</td>
<td>boolean</td>
<td>Set a new time limit for time attack mode. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetTimeAttackLimit()</td>
<td>struct</td>
<td>Get the current and next time limit for time attack mode. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetTimeAttackSynchStartPeriod(int)</td>
<td>boolean</td>
<td>Set a new synchronized start period for time attack mode. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetTimeAttackSynchStartPeriod()</td>
<td>struct</td>
<td>Get the current and synchronized start period for time attack mode. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetLapsTimeLimit(int)</td>
<td>boolean</td>
<td>Set a new time limit for laps mode. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetLapsTimeLimit()</td>
<td>struct</td>
<td>Get the current and next time limit for laps mode. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetNbLaps(int)</td>
<td>boolean</td>
<td>Set a new number of laps for laps mode. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetNbLaps()</td>
<td>struct</td>
<td>Get the current and next number of laps for laps mode. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetRoundForcedLaps(int)</td>
<td>boolean</td>
<td>Set a new number of laps for rounds mode (0 = default, use the number of laps from the maps, otherwise forces the number of rounds for multilaps maps). Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetRoundForcedLaps()</td>
<td>struct</td>
<td>Get the current and next number of laps for rounds mode. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetRoundPointsLimit(int)</td>
<td>boolean</td>
<td>Set a new points limit for rounds mode (value set depends on UseNewRulesRound). Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetRoundPointsLimit()</td>
<td>struct</td>
<td>Get the current and next points limit for rounds mode (values returned depend on UseNewRulesRound). The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetRoundCustomPoints(array, boolean)</td>
<td>boolean</td>
<td>Set the points used for the scores in rounds mode. <i>Points</i> is an array of decreasing integers for the players from the first to last. And you can add an optional boolean to relax the constraint checking on the scores. Only available to Admin.</td>
</tr>
<tr>
<td>GetRoundCustomPoints()</td>
<td>array</td>
<td>Gets the points used for the scores in rounds mode.</td>
</tr>
<tr>
<td>SetUseNewRulesRound(boolean)</td>
<td>boolean</td>
<td>Set if new rules are used for rounds mode. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetUseNewRulesRound()</td>
<td>struct</td>
<td>Get if the new rules are used for rounds mode (Current and next values). The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetTeamPointsLimit(int)</td>
<td>boolean</td>
<td>Set a new points limit for team mode (value set depends on UseNewRulesTeam). Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetTeamPointsLimit()</td>
<td>struct</td>
<td>Get the current and next points limit for team mode (values returned depend on UseNewRulesTeam). The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetMaxPointsTeam(int)</td>
<td>boolean</td>
<td>Set a new number of maximum points per round for team mode. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetMaxPointsTeam()</td>
<td>struct</td>
<td>Get the current and next number of maximum points per round for team mode. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetUseNewRulesTeam(boolean)</td>
<td>boolean</td>
<td>Set if new rules are used for team mode. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetUseNewRulesTeam()</td>
<td>struct</td>
<td>Get if the new rules are used for team mode (Current and next values). The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetCupPointsLimit(int)</td>
<td>boolean</td>
<td>Set the points needed for victory in Cup mode. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetCupPointsLimit()</td>
<td>struct</td>
<td>Get the points needed for victory in Cup mode. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetCupRoundsPerMap(int)</td>
<td>boolean</td>
<td>Sets the number of rounds before going to next map in Cup mode. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetCupRoundsPerMap()</td>
<td>struct</td>
<td>Get the number of rounds before going to next map in Cup mode. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetCupWarmUpDuration(int)</td>
<td>boolean</td>
<td>Set whether to enable the automatic warm-up phase in Cup mode. 0 = no, otherwise it's the duration of the phase, expressed in number of rounds. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetCupWarmUpDuration()</td>
<td>struct</td>
<td>Get whether the automatic warm-up phase is enabled in Cup mode. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>SetCupNbWinners(int)</td>
<td>boolean</td>
<td>Set the number of winners to determine before the match is considered over. Only available to Admin. Requires a map restart to be taken into account.</td>
</tr>
<tr>
<td>GetCupNbWinners()</td>
<td>struct</td>
<td>Get the number of winners to determine before the match is considered over. The struct returned contains two fields <i>CurrentValue</i> and <i>NextValue</i>.</td>
</tr>
<tr>
<td>GetCurrentMapIndex()</td>
<td>int</td>
<td>Returns the current map index in the selection, or -1 if the map is no longer in the selection.</td>
</tr>
<tr>
<td>GetNextMapIndex()</td>
<td>int</td>
<td>Returns the map index in the selection that will be played next (unless the current one is restarted...)</td>
</tr>
<tr>
<td>SetNextMapIndex(int)</td>
<td>boolean</td>
<td>Sets the map index in the selection that will be played next (unless the current one is restarted...)</td>
</tr>
<tr>
<td>SetNextMapIdent(string)</td>
<td>boolean</td>
<td>Sets the map in the selection that will be played next (unless the current one is restarted...)</td>
</tr>
<tr>
<td>JumpToMapIndex(int)</td>
<td>boolean</td>
<td>Immediately jumps to the map designated by the index in the selection.</td>
</tr>
<tr>
<td>JumpToMapIdent(string)</td>
<td>boolean</td>
<td>Immediately jumps to the map designated by its identifier (it must be in the selection).</td>
</tr>
<tr>
<td>GetCurrentMapInfo()</td>
<td>struct</td>
<td>Returns a struct containing the infos for the current map. The struct contains the following fields : <i>Name</i>, <i>UId</i>, <i>FileName</i>, <i>Author</i>, <i>Environnement</i>, <i>Mood</i>, <i>BronzeTime</i>, <i>SilverTime</i>, <i>GoldTime</i>, <i>AuthorTime</i>, <i>CopperPrice</i>, <i>LapRace</i>, <i>NbLaps</i>, <i>NbCheckpoints</i>, <i>MapType</i>, <i>MapStyle</i>.</td>
</tr>
<tr>
<td>GetNextMapInfo()</td>
<td>struct</td>
<td>Returns a struct containing the infos for the next map. The struct contains the following fields : <i>Name</i>, <i>UId</i>, <i>FileName</i>, <i>Author</i>, <i>Environnement</i>, <i>Mood</i>, <i>BronzeTime</i>, <i>SilverTime</i>, <i>GoldTime</i>, <i>AuthorTime</i>, <i>CopperPrice</i>, <i>LapRace</i>, <i>MapType</i>, <i>MapStyle</i>. (<i>NbLaps</i> and <i>NbCheckpoints</i> are also present but always set to -1)</td>
</tr>
<tr>
<td>GetMapInfo(string)</td>
<td>struct</td>
<td>Returns a struct containing the infos for the map with the specified filename. The struct contains the following fields : <i>Name</i>, <i>UId</i>, <i>FileName</i>, <i>Author</i>, <i>Environnement</i>, <i>Mood</i>, <i>BronzeTime</i>, <i>SilverTime</i>, <i>GoldTime</i>, <i>AuthorTime</i>, <i>CopperPrice</i>, <i>LapRace</i>, <i>MapType</i>, <i>MapStyle</i>. (<i>NbLaps</i> and <i>NbCheckpoints</i> are also present but always set to -1)</td>
</tr>
<tr>
<td>CheckMapForCurrentServerParams(string)</td>
<td>boolean</td>
<td>Returns a boolean if the map with the specified filename matches the current server settings.</td>
</tr>
<tr>
<td>GetMapList(int, int)</td>
<td>array</td>
<td>Returns a list of maps among the current selection of the server. This method take two parameters. The first parameter specifies the maximum number of infos to be returned, and the second one the starting index in the selection. The list is an array of structures. Each structure contains the following fields : <i>Name</i>, <i>UId</i>, <i>FileName</i>, <i>Environnement</i>, <i>Author</i>, <i>GoldTime</i>, <i>CopperPrice</i>, <i>MapType</i>, <i>MapStyle</i>.</td>
</tr>
<tr>
<td>AddMap(string)</td>
<td>boolean</td>
<td>Add the map with the specified filename at the end of the current selection. Only available to Admin.</td>
</tr>
<tr>
<td>AddMapList(array)</td>
<td>int</td>
<td>Add the list of maps with the specified filenames at the end of the current selection. The list of maps to add is an array of strings. Only available to Admin.</td>
</tr>
<tr>
<td>RemoveMap(string)</td>
<td>boolean</td>
<td>Remove the map with the specified filename from the current selection. Only available to Admin.</td>
</tr>
<tr>
<td>RemoveMapList(array)</td>
<td>int</td>
<td>Remove the list of maps with the specified filenames from the current selection. The list of maps to remove is an array of strings. Only available to Admin.</td>
</tr>
<tr>
<td>InsertMap(string)</td>
<td>boolean</td>
<td>Insert the map with the specified filename after the current map. Only available to Admin.</td>
</tr>
<tr>
<td>InsertMapList(array)</td>
<td>int</td>
<td>Insert the list of maps with the specified filenames after the current map. The list of maps to insert is an array of strings. Only available to Admin.</td>
</tr>
<tr>
<td>ChooseNextMap(string)</td>
<td>boolean</td>
<td>Set as next map the one with the specified filename, if it is present in the selection. Only available to Admin.</td>
</tr>
<tr>
<td>ChooseNextMapList(array)</td>
<td>int</td>
<td>Set as next maps the list of maps with the specified filenames, if they are present in the selection. The list of maps to choose is an array of strings. Only available to Admin.</td>
</tr>
<tr>
<td>LoadMatchSettings(string)</td>
<td>int</td>
<td>Set a list of maps defined in the playlist with the specified filename as the current selection of the server, and load the gameinfos from the same file. Only available to Admin.</td>
</tr>
<tr>
<td>AppendPlaylistFromMatchSettings(string)</td>
<td>int</td>
<td>Add a list of maps defined in the playlist with the specified filename at the end of the current selection. Only available to Admin.</td>
</tr>
<tr>
<td>SaveMatchSettings(string)</td>
<td>int</td>
<td>Save the current selection of map in the playlist with the specified filename, as well as the current gameinfos. Only available to Admin.</td>
</tr>
<tr>
<td>InsertPlaylistFromMatchSettings(string)</td>
<td>int</td>
<td>Insert a list of maps defined in the playlist with the specified filename after the current map. Only available to Admin.</td>
</tr>
<tr>
<td>GetPlayerList(int, int, int)</td>
<td>array</td>
<td>Returns the list of players on the server. This method take two parameters. The first parameter specifies the maximum number of infos to be returned, and the second one the starting index in the list, an optional 3rd parameter is used for compatibility: struct version (0 = united, 1 = forever, 2 = forever, including the servers). The list is an array of PlayerInfo structures. Forever PlayerInfo struct is: <i>Login</i>, <i>NickName</i>, <i>PlayerId</i>, <i>TeamId</i>, <i>SpectatorStatus</i>, <i>LadderRanking</i>, and <i>Flags</i>. <br><i>LadderRanking</i> is 0 when not in official mode, <br><i>Flags</i> = <i>ForceSpectator</i>(0,1,2) + <i>IsReferee</i> * 10 + <i>IsPodiumReady</i> * 100 + <i>StereoDisplayMode</i> * 1000 + <i>IsManagedByAnOtherServer</i> * 10000 + <i>IsServer</i> * 100000 + <i>HasPlayerSlot</i> * 1000000 + <i>IsBroadcasting</i> * 10000000 + <i>HasJoinedGame</i> * 100000000<br><i>SpectatorStatus</i> = <i>Spectator</i> + <i>TemporarySpectator</i> * 10 + <i>PureSpectator</i> * 100 + <i>AutoTarget</i> * 1000 + <i>CurrentTargetId</i> * 10000</td>
</tr>
<tr>
<td>GetPlayerInfo(string, int)</td>
<td>struct</td>
<td>Returns a struct containing the infos on the player with the specified login, with an optional parameter for compatibility: struct version (0 = united, 1 = forever). The structure is identical to the ones from GetPlayerList. Forever PlayerInfo struct is: <i>Login</i>, <i>NickName</i>, <i>PlayerId</i>, <i>TeamId</i>, <i>SpectatorStatus</i>, <i>LadderRanking</i>, and <i>Flags</i>. <br><i>LadderRanking</i> is 0 when not in official mode, <br><i>Flags</i> = <i>ForceSpectator</i>(0,1,2) + <i>IsReferee</i> * 10 + <i>IsPodiumReady</i> * 100 + <i>StereoDisplayMode</i> * 1000 + <i>IsManagedByAnOtherServer</i> * 10000 + <i>IsServer</i> * 100000 + <i>HasPlayerSlot</i> * 1000000 + <i>IsBroadcasting</i> * 10000000 + <i>HasJoinedGame</i> * 100000000<br><i>SpectatorStatus</i> = <i>Spectator</i> + <i>TemporarySpectator</i> * 10 + <i>PureSpectator</i> * 100 + <i>AutoTarget</i> * 1000 + <i>CurrentTargetId</i> * 10000</td>
</tr>
<tr>
<td>GetDetailedPlayerInfo(string)</td>
<td>struct</td>
<td>Returns a struct containing the infos on the player with the specified login. The structure contains the following fields : <i>Login</i>, <i>NickName</i>, <i>PlayerId</i>, <i>TeamId</i>, <i>IPAddress</i>, <i>DownloadRate</i>, <i>UploadRate</i>, <i>Language</i>, <i>IsSpectator</i>, <i>IsInOfficialMode</i>, a structure named <i>Avatar</i>, an array of structures named <i>Skins</i>, a structure named <i>LadderStats</i>, <i>HoursSinceZoneInscription</i> and <i>OnlineRights</i> (0: nations account, 3: united account). Each structure of the array <i>Skins</i> contains two fields <i>Environnement</i> and a struct <i>PackDesc</i>. Each structure <i>PackDesc</i>, as well as the struct <i>Avatar</i>, contains two fields <i>FileName</i> and <i>Checksum</i>.</td>
</tr>
<tr>
<td>GetMainServerPlayerInfo(int)</td>
<td>struct</td>
<td>Returns a struct containing the player infos of the game server (ie: in case of a basic server, itself; in case of a relay server, the main server), with an optional parameter for compatibility: struct version (0 = united, 1 = forever). The structure is identical to the ones from GetPlayerList. Forever PlayerInfo struct is: <i>Login</i>, <i>NickName</i>, <i>PlayerId</i>, <i>TeamId</i>, <i>SpectatorStatus</i>, <i>LadderRanking</i>, and <i>Flags</i>. <br><i>LadderRanking</i> is 0 when not in official mode, <br><i>Flags</i> = <i>ForceSpectator</i>(0,1,2) + <i>IsReferee</i> * 10 + <i>IsPodiumReady</i> * 100 + <i>StereoDisplayMode</i> * 1000 + <i>IsManagedByAnOtherServer</i> * 10000 + <i>IsServer</i> * 100000 + <i>HasPlayerSlot</i> * 1000000 + <i>IsBroadcasting</i> * 10000000 + <i>HasJoinedGame</i> * 100000000<br><i>SpectatorStatus</i> = <i>Spectator</i> + <i>TemporarySpectator</i> * 10 + <i>PureSpectator</i> * 100 + <i>AutoTarget</i> * 1000 + <i>CurrentTargetId</i> * 10000</td>
</tr>
<tr>
<td>GetCurrentRanking(int, int)</td>
<td>array</td>
<td>Returns the current rankings for the race in progress. (In trackmania legacy team modes, the scores for the two teams are returned. In other modes, it's the individual players' scores) This method take two parameters. The first parameter specifies the maximum number of infos to be returned, and the second one the starting index in the ranking. The ranking returned is a list of structures. Each structure contains the following fields : <i>Login</i>, <i>NickName</i>, <i>PlayerId</i> and <i>Rank</i>. In addition, for legacy trackmania modes it also contains <i>BestTime</i>, <i>Score</i>, <i>NbrLapsFinished</i>, <i>LadderScore</i>, and an array <i>BestCheckpoints</i> that contains the checkpoint times for the best race.</td>
</tr>
<tr>
<td>GetCurrentRankingForLogin(string)</td>
<td>array</td>
<td>Returns the current ranking for the race in progressof the player with the specified login (or list of comma-separated logins). The ranking returned is a list of structures. Each structure contains the following fields : <i>Login</i>, <i>NickName</i>, <i>PlayerId</i> and <i>Rank</i>. In addition, for legacy trackmania modes it also contains <i>BestTime</i>, <i>Score</i>, <i>NbrLapsFinished</i>, <i>LadderScore</i>, and an array <i>BestCheckpoints</i> that contains the checkpoint times for the best race.</td>
</tr>
<tr>
<td>GetCurrentWinnerTeam()</td>
<td>int</td>
<td>Returns the current winning team for the race in progress. (-1: if not in team mode, or draw match)</td>
</tr>
<tr>
<td>ForceScores(array, boolean)</td>
<td>boolean</td>
<td>Force the scores of the current game. Only available in rounds and team mode. You have to pass an array of structs {int <i>PlayerId</i>, int <i>Score</i>}. And a boolean <i>SilentMode</i> - if true, the scores are silently updated (only available for SuperAdmin), allowing an external controller to do its custom counting... Only available to Admin/SuperAdmin.</td>
</tr>
<tr>
<td>ForcePlayerTeam(string, int)</td>
<td>boolean</td>
<td>Force the team of the player. Only available in team mode. You have to pass the login and the team number (0 or 1). Only available to Admin.</td>
</tr>
<tr>
<td>ForcePlayerTeamId(int, int)</td>
<td>boolean</td>
<td>Force the team of the player. Only available in team mode. You have to pass the playerid and the team number (0 or 1). Only available to Admin.</td>
</tr>
<tr>
<td>ForceSpectator(string, int)</td>
<td>boolean</td>
<td>Force the spectating status of the player. You have to pass the login and the spectator mode (0: user selectable, 1: spectator, 2: player, 3: spectator but keep selectable). Only available to Admin.</td>
</tr>
<tr>
<td>ForceSpectatorId(int, int)</td>
<td>boolean</td>
<td>Force the spectating status of the player. You have to pass the playerid and the spectator mode (0: user selectable, 1: spectator, 2: player, 3: spectator but keep selectable). Only available to Admin.</td>
</tr>
<tr>
<td>ForceSpectatorTarget(string, string, int)</td>
<td>boolean</td>
<td>Force spectators to look at a specific player. You have to pass the login of the spectator (or '' for all) and the login of the target (or '' for automatic), and an integer for the camera type to use (-1 = leave unchanged, 0 = replay, 1 = follow, 2 = free). Only available to Admin.</td>
</tr>
<tr>
<td>ForceSpectatorTargetId(int, int, int)</td>
<td>boolean</td>
<td>Force spectators to look at a specific player. You have to pass the id of the spectator (or -1 for all) and the id of the target (or -1 for automatic), and an integer for the camera type to use (-1 = leave unchanged, 0 = replay, 1 = follow, 2 = free). Only available to Admin.</td>
</tr>
<tr>
<td>SpectatorReleasePlayerSlot(string)</td>
<td>boolean</td>
<td>Pass the login of the spectator. A spectator that once was a player keeps their player slot, so that they can go back to race mode. Calling this function frees this slot for another player to connect. Only available to Admin.</td>
</tr>
<tr>
<td>SpectatorReleasePlayerSlotId(int)</td>
<td>boolean</td>
<td>Pass the playerid of the spectator. A spectator that once was a player keeps their player slot, so that they can go back to race mode. Calling this function frees this slot for another player to connect. Only available to Admin.</td>
</tr>
<tr>
<td>ManualFlowControlEnable(boolean)</td>
<td>boolean</td>
<td>Enable control of the game flow: the game will wait for the caller to validate state transitions. Only available to Admin.</td>
</tr>
<tr>
<td>ManualFlowControlProceed()</td>
<td>boolean</td>
<td>Allows the game to proceed. Only available to Admin.</td>
</tr>
<tr>
<td>ManualFlowControlIsEnabled()</td>
<td>int</td>
<td>Returns whether the manual control of the game flow is enabled. 0 = no, 1 = yes by the xml-rpc client making the call, 2 = yes, by some other xml-rpc client. Only available to Admin.</td>
</tr>
<tr>
<td>ManualFlowControlGetCurTransition()</td>
<td>string</td>
<td>Returns the transition that is currently blocked, or '' if none. (That's exactly the value last received by the callback.) Only available to Admin.</td>
</tr>
<tr>
<td>CheckEndMatchCondition()</td>
<td>string</td>
<td>Returns the current match ending condition. Return values are: 'Playing', 'ChangeMap' or 'Finished'.</td>
</tr>
<tr>
<td>GetNetworkStats()</td>
<td>struct</td>
<td>Returns a struct containing the networks stats of the server. The structure contains the following fields : <i>Uptime</i>, <i>NbrConnection</i>, <i>MeanConnectionTime</i>, <i>MeanNbrPlayer</i>, <i>RecvNetRate</i>, <i>SendNetRate</i>, <i>TotalReceivingSize</i>, <i>TotalSendingSize</i> and an array of structures named <i>PlayerNetInfos</i>. Each structure of the array PlayerNetInfos contains the following fields : <i>Login</i>, <i>IPAddress</i>, <i>LastTransferTime</i>, <i>DeltaBetweenTwoLastNetState</i>, <i>PacketLossRate</i>. Only available to SuperAdmin.</td>
</tr>
<tr>
<td>StartServerLan()</td>
<td>boolean</td>
<td>Start a server on lan, using the current configuration. Only available to SuperAdmin.</td>
</tr>
<tr>
<td>StartServerInternet()</td>
<td>boolean</td>
<td>Start a server on internet, using the current configuration. Only available to SuperAdmin.</td>
</tr>
</table>
[older versions](https://github.com/maniaplanet/documentation/tree/gh-pages/dedicated-server/xmlrpc/methods)