---
layout: default
title: The ScoresTable2 library
description: How to use the ScoresTable2 library in your scripts
tags: maniascript
---

# Purpose
The ScoresTable2 library replace the ScoresTable library and allow the users to create a custom scores table, with the look and the content needed by the game mode.

![Example of the library](./img/lib-scorestable2-example.jpg)

# Usage
If you use the `ModeBase.Script.txt` as the base of your game mode, then the ScoresTable2 library is already included with the namespace `ST2::`. It's ready to use, so you don't need to call the `Load()` and `Unload()` functions.

Otherwise you can include it by adding this line at the beginning of your script :
`#Include "Libs/Nadeo/ScoresTable2.Script.txt" as ST2`
And call the `Load()`and `Unload()`functions respectively in the `***StartServer***` and `***EndServer***` labels.

Now the library is loaded but there's a last step before you can see the scores table. You have to call the `Build()` function. It takes one parameter, a Text designing the game for which the table is built. It can be "SM" or "TM". Now if you press the Tab key while playing you can see the basic scores table.

To make it a bit prettier you can use the `SetStyle()` function and apply some pre-made styles included in the library. By example for a free for all mode in ShootMania like Melee you can do:
{% highlight js %}
ST2::SetStyle("LibST_SMBaseSolo");
ST2::SetStyle("LibST_SMBasePoints");
ST2::Build("SM");
{% endhighlight %}
The `Build()` function must always be called once after an update in the structure of the scores table.

The `ModeBase` script include the `XmlRpcLoop()` function to manage the XmlRpc methods and callbacks of the scores table so don't have to include it yourself.
There's also the `MB_SetScoresTableStyleFromXml()` function that can take in charge all the process of applying a style from an XML file by calling `RequestStyleFromXml()`, `WaitStyleFromXml()` and `SetStyleFromXml()`. For a detailed explanation on scores table customization from an XML file see [this page]({{ site.url }}/dedicated-server/customize-scores-table.html).

Now let's take a quick look on all the functions available in the library.

# Functions




{% highlight js %}
Void Load()

Load the library, must be called once at the beginning of the script
{% endhighlight %}





{% highlight js %}
Void Unload()

Unload the library, must be called once at the end of the script
{% endhighlight %}





{% highlight js %}
Void Reset()

Reset the scores table to its default state
{% endhighlight %}





{% highlight js %}
Void ClearScore(CScore _Score)

Clear the custom columns values of one player

@param _Score The score to clear
{% endhighlight %}





{% highlight js %}
Void ClearScores()

Clear all the custom colmumns values of all players
{% endhighlight %}





{% highlight js %}
Void DestroyCol(Text _ColId)

Destroy a column

@param _ColId The identifier of the column to destroy
{% endhighlight %}





{% highlight js %}
Void CreateCol(Text _Id, Text _Legend, Text _DefaultValue, Real _Width, Real _Weight)

Create a new column

Some ids are already used by the library, using one of this id will create a special column :

General -> LibST_Avatar, LibST_Name, LibST_ManiaStars, LibST_Tools, LibST_Tags
TM -> LibST_TMBestTime, LibST_PrevTime, LibST_TMStunts, LibST_TMRespawns, LibST_TMCheckpoints, LibST_TMPoints, LibST_TMPrevRaceDeltaPoints
SM -> LibST_SMPoints, LibST_SMRoundPoints

If a column with the same id already exists, the previous column will be destroyed and replaced by the new one.

@param  _ColId          The id of the column
@param  _Legend         The legend displayed above the column
@param  _DefaultValue   The default value of the column
@param  _Width          The width of the column
@param  _Weight         The weight used to order the column
{% endhighlight %}





{% highlight js %}
Void SetColTextStyle(Text _ColId, Text _TextStyle)

Set the text style of a column

@param  _ColId       The name of the column to set
@param  _TextStyle   The new text style of the column
{% endhighlight %}





{% highlight js %}
Void SetColTextSize(Text _ColId, Real _TextSize)

Set the text size of a column

@param  _ColId    The name of the column to update
@param  _TextSize The new text size of the column
{% endhighlight %}





{% highlight js %}
Void SetColTextAlign(Text _ColId, CMlControl::AlignHorizontal _HAlign)

Set the horizontal text align of a column

@param  _ColId    The name of the column to update
@param  _HAlign   The new text align of the column
{% endhighlight %}





{% highlight js %}
Void SetColStyle(Text _ColId, Text _TextStyle, Real _TextSize, CMlControl::AlignHorizontal _HAlign)

Set the text style, size and horizontal align of a column

@param  _ColId      The name of the column to update
@param  _TextStyle  The new text style of the column
@param  _TextSize   The new text size of the column
@param  _HAlign     The new text align of the column
{% endhighlight %}





{% highlight js %}
Void SetColScript(Text _ColId, Text _Script)

Assign a script to a column, this script will be used to fill the column
during an update instead of the default one

You have access to the score being updated with _Score (class CScore)
and the column label with Label_Col (class CMlLabel)
eg: Label_Col.SetText("Player LP: "^_Score.LadderScore);
You can check the CreateCol() function for more examples

@param  _ColId    The name of the column to script
@param  _Script   The script to use
{% endhighlight %}





{% highlight js %}
CUILayer GetLayer()

Get the scores table layer

@return   The scores table layer
{% endhighlight %}





{% highlight js %}
Void Attach()

Attach the scores table layer
{% endhighlight %}





{% highlight js %}
Void Detach()

Detach the scores table layer
{% endhighlight %}





{% highlight js %}
Void Show()

Show the scores table layer
{% endhighlight %}





{% highlight js %}
Void Hide()

Hide the scores table layer
{% endhighlight %}





{% highlight js %}
Void SetColLegend(Text _ColId, Text _Legend)

Set the legend of a column
The legend is displayed above the column
You can use the pre-made styles "LibST_SMWithLegends" or "LibST_TMWithLegends"
to add a space for the legends at the top of the scores table

@param  _ColId    The name of the column to set
@param  _Legend   The legend to use
{% endhighlight %}





{% highlight js %}
Void SetColWidth(Text _ColId, Real _Width)

Set the width of a column

@param  _ColId    The name of the column to set
@param  _Width    The new width of the column
{% endhighlight %}





{% highlight js %}
Void SetColWeight(Text _ColId, Real _Weight)

Set the weight of a column
The weight is used to order the columns in the scores table
The smallest numbers are on the left and the biggest on the right

@param  _ColId    The name of the column to set
@param  _Weight   The new weight of the column
{% endhighlight %}





{% highlight js %}
Void SetColDefaultValue(Text _ColId, Text _Value)

Set the default value of a column

@param  _ColId    The name of the column to set
@param  _Value    The new default value of the column
{% endhighlight %}





{% highlight js %}
Void SetColValue(Text _ColId, CScore _Score, Text _Value)

Set the value of a column for a player

@param  _ColId    The name of the column to set
@param  _Score    The score object of the player to update
@param  _Value    The new value of the column
{% endhighlight %}





{% highlight js %}
Void SetFooterText(Text _Value)

Set the text displayed in the footer

@param  _Value    The new text to display
{% endhighlight %}





{% highlight js %}
Void SetFooterScript(Text _Script)

Override the default script used to update the footer text

@param  _Script   The new script to use
{% endhighlight %}





{% highlight js %}
Void SetSize(Vec2 _HeaderSize, Vec2 _TableSize, Vec2 _FooterSize)

Set the sizes of the different scores table sections
Use a negative value to not modify a size

@param  _HeaderSize   The new size of the header section
@param  _TableSize    The new size of the players table section
@param  _FooterSize   The new size of the footer section
{% endhighlight %}





{% highlight js %}
Void SetPos(Vec3 _Pos)

Set the position of the scores table

@param  _Pos  The new position of the scores table
{% endhighlight %}





{% highlight js %}
Void SetScale(Real _Scale)

Change the global scale of the scores table

@param  _Scale    The new global scores table scale
{% endhighlight %}





{% highlight js %}
Void SetFormat(Integer _ColsNb, Integer _LinesNb)

Set the number of columns and lines in the players table

@param  _ColsNb   The number of columns
@param  _LinesNb  The number of lines
{% endhighlight %}





{% highlight js %}
Void SetTabName(Text _TabName)

Set the name of the tab (used by the TabsServer.Script.txt library)

@param  _TabName  The new name of the tab
{% endhighlight %}





{% highlight js %}
Void SetTextScale(Real _Scale)

Change the global scale of the text in the scores table

@param  _Scale    The new global text scale
{% endhighlight %}


The background image is displayed behind all the content of the scores table.



{% highlight js %}
Void SetBackgroundFilePath(Text _ImgPath)

Set the path to the background image of the scores table

@param  _ImgPath    The path to the background file
{% endhighlight %}





{% highlight js %}
Void SetBackgroundProperties(Vec2 _Pos, Vec2 _Size)

Set the background position and size of the scores table

@param  _Pos      The position of the background
@param  _Size     The size of the background
{% endhighlight %}





{% highlight js %}
Void SetBackgroundColor(Text _Color)

Colorize the background. This function uses the colorize property,
so your background picture must use pure green.

@param  _Color      The color of the background
{% endhighlight %}





{% highlight js %}
Void SetBackgroundImage(Text _ImgPath, Vec2 _Pos, Vec2 _Size)

Set the file path, position and size of the scores table background

@param  _ImgPath    The path to the background file
@param  _Pos        The position of the background
@param  _Size       The size of the background
{% endhighlight %}





{% highlight js %}
Void SetBackgroundImage(Text _ImgPath, Vec2 _Pos, Vec2 _Size, Text _Color)

Set the file path, position, size and color of the scores table background

@param  _ImgPath    The path to the background file
@param  _Pos        The position of the background
@param  _Size       The size of the background
@param  _Color      The color of the background
{% endhighlight %}





{% highlight js %}
Void SetBackgroundCollection(Text[Text] _Collection)

Create a group of background to use depending on
the CollectionName of the current map.
eg: set different backgrounds for Canyon, Valley, Stadium, ...

@param  _Collection   The list of image file [Environment => Image path]
{% endhighlight %}


The foreground image will be display over the content of the scores table.



{% highlight js %}
Void SetForegroundFilePath(Text _ImgPath)

Set the path to the foreground image of the scores table

@param  _ImgPath    The path to the foreground file
{% endhighlight %}





{% highlight js %}
Void SetForegroundProperties(Vec2 _Pos, Vec2 _Size)

Set the foreground position and size of the scores table

@param  _Pos      The position of the foreground
@param  _Size     The size of the foreground
{% endhighlight %}





{% highlight js %}
Void SetForegroundColor(Text _Color)

Colorize the foreground. This function uses the colorize property,
so your background picture must use pure green.

@param  _Color      The color of the foreground
{% endhighlight %}





{% highlight js %}
Void SetForegroundImage(Text _ImgPath, Vec2 _Pos, Vec2 _Size, Text _Color)

Set the file path, position and size of the scores table foreground

@param  _ImgPath    The path to the foreground file
@param  _Pos        The position of the foreground
@param  _Size       The size of the foreground
@param  _Color      The color of the foreground
{% endhighlight %}





{% highlight js %}
Void SetForegroundImage(Text _ImgPath, Vec2 _Pos, Vec2 _Size)

Set the file path, position and size of the scores table foreground

@param  _ImgPath    The path to the foreground file
@param  _Pos        The position of the foreground
@param  _Size       The size of the foreground
{% endhighlight %}





{% highlight js %}
Void SetForegroundCollection(Text[Text] _Collection)

Create a group of foreground to use depending
on the CollectionName of the current map.
eg: set different foreground for Canyon, Valley, Stadium, ...

@param  _Collection   The list of image file [Environment => Image path]
{% endhighlight %}


If there's green in your image, it will be colorized automatically to the color of the corresponding team.



{% highlight js %}
Void SetTeamFilePath(Integer _Team, Text _ImgPath)

Set the path to the team image of the scores table

@param  _Team       The team to set
@param  _ImgPath    The path to the foreground file
{% endhighlight %}





{% highlight js %}
Void SetTeamProperties(Integer _Team, Vec2 _Pos, Vec2 _Size)

Set the team image position and size in the scores table

@param  _Team     The team to set
@param  _Pos      The position of the foreground
@param  _Size     The size of the foreground
{% endhighlight %}





{% highlight js %}
Void SetTeamImage(Integer _Team, Text _ImgPath, Vec2 _Pos, Vec2 _Size)

Set the pictures colorizable by the teams

@param  _Team     The team to set
@param  _ImgPath  The path to the image file
@param  _Pos      The position of the image
@param  _Size     The size of the image
{% endhighlight %}





{% highlight js %}
Void SetTeamCollection(Integer _Team, Text[Text] _Collection)

Create a group of team images to use depending on
the CollectionName of the current map.
eg: set differents foreground for Canyon, Valley, Stadium, ...

@param  _Team         The team to set
@param  _Collection   The list of image file [Environment => Image path]
{% endhighlight %}


The player card images are displayed behind the frame of each player.



{% highlight js %}
Void SetPlayerCardImages(Text _Square, Text _Left, Text _Right)

Set the images used for the player cards
An empty path will remove the image
A non valid path will let the older path as is
A valid path will replace the old one

@param  _Square   The quad of the scores table
@param  _Left   The line of the scores table (left side)
@param  _Right    The line of the scores table (right side)
{% endhighlight %}


Use this function if you don't want to display the teams in the scores table while being in teams mode.



{% highlight js %}
Void SetTeamsMode(Boolean _UseTeamsMode)

Turn on/off the teams mode of the scores table

@param  _UseTeamsMode   True use the teams mode, false use the solo mode
{% endhighlight %}





{% highlight js %}
Void SetTeamsScoresVisibility(Boolean _Visible)

Display or not the teams scores in the header
Used only if TeamsMode is set to true

@param  _Visible  Turn on/off the visibility of the scores
{% endhighlight %}





{% highlight js %}
Void SetRevertPlayerCardInTeamsMode(Boolean _UseRevert)

Turn on/off the mirror of the player cards of the second team in teams mode

@param  _UseRevert    True use the revert, false don't use the revert
{% endhighlight %}





{% highlight js %}
Void SetModeIcon(Text _ImgPath)

Set the icon of the mode in the header

@param  _ImgPath    The path to the icon file or its style and substyle
                    path: "file://Media/Path/To/File.dds"
                    style/substyle: "Style|Substyle"
{% endhighlight %}





{% highlight js %}
Void SetPlayerDarkening(Boolean _UsePlayerDarkening)

Turn on/off the player darkening on unspawn

@param  _UsePlayerDarkening   Use the player darkening or not
{% endhighlight %}





{% highlight js %}
Void SetPlayerInfoVisibility(Boolean _Visible)

Display or not the player info in the footer

@param  _Visible  Turn on/off the visibility of the player info
{% endhighlight %}





{% highlight js %}
Void SetServerNameVisibility(Boolean _Visible)

Display or not the server name in the footer

@param  _Visible  Turn on/off the visibility of the server name
{% endhighlight %}


In TrackMania Cup mode, a player above a given points limit will see its score replaced by the "Finalist" or "Winner" text.



{% highlight js %}
Void SetUiScoresPointsLimit(Integer _PointsLimit)

Send the cup points limit to the UI (used in TM Cup mode)

@param  _PointsLimit  The new points limit
{% endhighlight %}





{% highlight js %}
Void FilterLogins(Text[] _Logins)

Filter the players displayed by logins

@param  _Logins   The logins of the players to display
{% endhighlight %}





{% highlight js %}
Void Build(Text _Game)

Build the scores table manialink
/!\ Use with care, this function uses a lot of resources
/!\ Rebuild the scores table only when necessary

@param  _Game Choose between SM and TM
{% endhighlight %}





{% highlight js %}
Void SetStyle(Text _Style)

Use a predefined style for the scores table

Available styles are:
- LibST_Base, add basic columns: avatar, name, ManiaStars and tools
- LibST_Reset, remove all the previous styles
- LibST_TMBaseSolo, basic free for all scores table for TrackMania
- LibST_TMBaseTeam, basic teams scores table for TrackMania
- LibST_TMWithLegends, add a space for columns legends in the header
- LibST_SMBaseSolo, basic free for all scores table for ShootMania
- LibST_SMBaseTeams, basic teams scores table for ShootMania
- LibST_SMBaseOneColumn, same as LibST_SMBaseSolo but with only one players column
- LibST_SMBasePoints, add the RoundPoints and Points columns
- LibST_SMWithLegends, add a space for columns legends in the header

@param  _Style    The name of the style to use
{% endhighlight %}





{% highlight js %}
Boolean RequestStyleFromXml(Text _XmlPath)

Create a request for the XML style file

@param  _Style    The path to the XML file to use

@return           True if the request was create, false otherwise
{% endhighlight %}





{% highlight js %}
Boolean WaitStyleFromXml()

Wait for a response to the request

@return       True if the request is not completed, false otherwise
{% endhighlight %}





{% highlight js %}
Boolean SetStyleFromXml(Boolean _SafeMode)

Read the XML file and set the style from it

@param  _SafeMode   Allow or not scripts to be added to the scores table

@return             True if the style was applied, false otherwise
{% endhighlight %}





{% highlight js %}
Void XmlRpcLoop()

Load a scores table style from an XmlRpc call
{% endhighlight %}
