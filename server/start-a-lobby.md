How to start a lobby ?
======================


Requirements
------------

* The title installed on your computer. You can get titles from NADEO on the manialink `store`.
* Windows or Linux dedicated server.
* MySQL server.

Initial set up
--------------

* Download and extract (or use the APT repository) latest ManiaPlanet dedicated (using [this permalink](http://files.maniaplanet.com/ManiaPlanet2Beta/ManiaPlanetBetaServer_latest.zip)).
* If you do not have the file `Title.Pack.Gbx` in the `UserData\Packs` folder of your dedicated server install dir, you can find it in your personal folder : `Documents\ManiaPlanet\Packs`. Just copy it in the `UserData\Pack\` folder of your dedicated.
* Get at least two dedicated logins on the PlayerPage: https://player.maniaplanet.com/advanced/dedicated-servers
* Check title id and match setting file in the table:

<table>
  <tr>
    <th>Title name</th><th>Id</th><th>MatchSettings file</th>
  </tr>
  <tr>
    <td>Combo</td><td>SMStormCombo@nadeolabs</td><td>MatchSettings/SMStormCombo1.txt</td>
  </tr>
  <tr>
    <td>Elite</td><td>SMStormElite@nadeolabs</td><td>MatchSettings/SMStormElite1.txt</td>
  </tr>
</table>

*Your title is not on the list? Contact the title author*



Instructions 
------------

#### 1 - Starting servers

You should have a dedicated login and password (different from your ManiaPlanet password), a folder with the dedicated server (with the `Title.Pack.Gbx` file).
For the example, we will have **lobbyLogin** (with the password **lobbyPassword**) and **matchLogin** (with the password **matchPassword**)

* Download the proposed ```dedicated_cfg.txt``` file 




