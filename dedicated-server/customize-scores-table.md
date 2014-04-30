---
layout: static
title: Customize the scores table
description: How to customize the scores table by modifying an XML file.
---

# Introduction

The scores table of the Elite and Heroes modes ARE NOT customizable with this method.
If you want to know how to use the ScoresTable2 library in a game mode script you can read [this tutorial]({{ site.url }}/maniascript/libraries/library-scorestable2.html).

# Installation

The new scores table library (Libs/Nadeo/ScoresTable2.Script.txt) allows server owners to customize the style of the scores table. To do so you have to write an XML file containing the new properties and change a settings on the server.

The setting is named S_ScoresTableStylePath, you can set it in the MatchSettings or with XmlRpc. You have to use a path to a local or distant file.

Examples in the MatchSettings file:
{% highlight xml %}
<mode_script_settings>
    <setting name="S_ScoresTableStylePath" type="text" value="file://Media/Manialinks/Shootmania/ScoresTable/Styles/Example.ScoresTable.xml"/>
</mode_script_settings>
{% endhighlight %}

{% highlight xml %}
<mode_script_settings>
    <setting name="S_ScoresTableStylePath" type="text" value="http://www.example.com/Example.ScoresTable.xml"/>
</mode_script_settings>
{% endhighlight %}

It is recommended to use a local file when possible. The XML is loaded at script startup and when using a distant file the loading can take some time or fail.
If you modify the setting once the server is started you'll have to restart the map to take the new value into account.
The library will write informations about the loading of the XML file in the log. So, if you have a problem check you latest log file.

Another way to apply a custom style to the scores table is to send the xml string directly to the server with the `LibScoresTable2_SetStyleFromXml` XmlRpc method. Check the [script XmlRpc methods documentation]({{ site.url }}/dedicated-server/xml-rpc-scripts.html) to learn more about it.

# Complete XML file

You'll find below the complete XML file with the explanations on what each parameter do. All of them are optional, you can write a style file containing only some of them if you want.
You can also find this file in your ManiaPlanet installation in `ManiaPlanet/PacksCache/ShootMania_extras.zip/Media/Manialinks/Shootmania/ScoresTable/Styles` or `ManiaPlanet/PacksCache/TrackMania_extras.zip/Media/Manialinks/Trackmania/ScoresTable/Styles`.

{% highlight xml %}
<?xml version="1.0" encoding="utf-8"?>
<!--
  This file is just an example for documentation.
  The end result isn't exactly nice to see.
-->
<!-- 
  Each node in this file is optional and can be omitted.
  If it's the case then the previous value will be kept.
-->
<scorestable version="1">
  <!-- 
    List the premade styles to use with the scores table.
    The styles will be applied in the order you write them.
    If they set the same properties, only the ones from the
    latest style will be applied.
    Available style are:
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
  -->
  <styles>
    <style id="LibST_Base" />
    <style id="LibST_TMBaseTeams" />
    <style id="LibST_Reset" />
    <style id="LibST_Base" />
    <style id="LibST_TMWithLegends" />
  </styles>
  <!-- Properties of the scores table -->
  <properties>
    <!-- 
      Set the position of the scores table 
      (Real) x : position in X
      (Real) y : position in Y
      (Real) z : position in Z
    -->
    <position x="-20." y="80." z="20." />
    <!-- 
      Set the global scale of the scores table 
      (Real) scale : scale of the scores table
    -->
    <globalscale scale="1.25" />
    <!-- 
      Set the scale of the scores table text
      (Real) scale : scale of the text
    -->
    <textscale scale="2." />
    <!-- 
      Set the size of the header.
      (Real) x : width
      (Real) y : height
    -->
    <headersize x="30." y="20." />
    <!--
      Set the icon of the mode in the header
      (Text) icon : the icon displayed in the header
                    can be either a path (file://Path/To/File.ext) or Style|Substyle format
    -->
    <modeicon icon="Icons128x128_1|Rankings" />
    <!-- 
      Set the size of the players table part.
      (Real) x : width
      (Real) y : height
    -->
    <tablesize x="200." y="40." />
    <!-- 
      Set the format of the players table part.
      (Integer) columns : number of columns in the table
      (Integer) lines : number of lines in the table
    -->
    <taleformat columns="3" lines="5"/>
    <!-- 
      Set the size of the footer.
      (Real) x : width
      (Real) y : height
    -->
    <footersize x="100." y="20." />
    <!-- 
      Set the text of the footer.
      (Text) text : text displayed in the footer
    -->
    <footertext text="My footer text" />
    <!-- Change the tab name used by the Tab library -->
    <tabname name="ScoresTab" />
  </properties>
  <settings>
    <!-- Enable/Disable the teams mode -->
    <setting name="TeamsMode" value="True" />
    <!-- Show/Hide the teams scores -->
    <setting name="TeamsScoresVisibility" value="False" />
    <!-- Revert the player cards orientation in teams mode -->
    <setting name="RevertPlayerCardInTeamsMode" value="False" />
    <!-- Enable/Disable the darkening for unspawned players -->
    <setting name="PlayerDarkening" value="True" />
    <!-- Show/Hide the player info in the footer -->
    <setting name="PlayerInfoVisibility" value="False" />
    <!-- Show/Hide the server name in the footer -->
    <setting name="ServerNameVisibility" value="False" />
  </settings>
  <!-- Columns of the scores table -->
  <columns>
    <!-- 
      This line will add a new column.
      If the column already exists it will be destroyed and recreated.

      There's several ready to use columns ids:
      General: 
      - LibST_Avatar, displays the avatar
      - LibST_Name, displays the nickname
      - LibST_ManiaStars, displays the ManiaStars
      - LibST_Tools, displays the "profile" and "spectate" buttons 
      TrackMania: 
      - LibST_TMBestTime displays the best time
      - LibST_PrevTime, displays the previous time
      - LibST_TMStunts, displays the stunt score
      - LibST_TMRespawns, displays the number of respawns
      - LibST_TMCheckpoints, display the number of checkpoints activated
      - LibST_TMPoints, displays the total number of points
      - LibST_TMPrevRaceDeltaPoints, displays the number of points earned during the round
      ShootMania: 
      - LibST_SMPoints, displays the total number of points
      - LibST_SMRoundPoints, displays the number of points earned during the round
    -->
    <column id="LibST_Avatar" action="create"/>
    <!-- 
      The action can have three value :
      - create : create a new column
      - update : update an existing column
      - destroy : destroy an existing column
    -->
    <column id="TestEmpty" action="create"/>
    <column id="TestEmpty" action="update"/>
    <column id="TestEmpty" action="destroy" />
    <!-- This column uses all the available parameters
      (Text) legend : the legend displayed above the column
      (Text) default value : the default value displayed in the column
      (Real) width : the width of the column
      (Real) weight : the value used to sort the columns order
      (Text) textstyle : the style of the text
      (Real) textsize : the size of the text
      (Text) textalign : the horizontal align of the text
    -->
    <column id="TestFull" action="create">
      <legend>TestFull</legend>
      <defaultvalue>DefaultValue</defaultvalue>
      <width>20.</width>
      <weight>30.</weight>
      <textstyle>TextRaceMessageBig</textstyle>
      <textsize>0.1</textsize>
      <textalign>right</textalign>
    </column>
    <!-- All the columns properties are optional and can be omitted -->
    <column id="TestScript" action="create">
      <legend>TestScript</legend>
      <defaultvalue>Script</defaultvalue>
      <width>20.</width>
      <weight>100.</weight>
    </column>
    <column id="LibST_Avatar" action="update">
      <legend>My avatar</legend>
      <weight>250.</weight>
    </column>
  </columns>
  <!-- Manage the images of the scores table -->
  <images>
    <!-- Image for the background -->
    <background>
      <!-- path to the default image file -->
      <image path="file://Media/Manialinks/Shootmania/ScoresTable/bg-storm.dds" />
      <!-- position of the image -->
      <position x="20." y="-20." />
      <!-- size of the image -->
      <size width="150." height="100." />
      <!-- Color of the background -->
      <colorize color="05d" />
      <!-- Set a collection of images to use depending on the environment -->
      <collection>
        <!-- 
          (Text) environment : in which environment the image will be used
                               eg: Canyon, Valley, Stadium, Storm, ...
          (Text) path : the path to the image
        -->
        <image environment="Canyon" path="file://Media/Manialinks/Trackmania/ScoresTable/bg-canyon.dds" />
        <image environment="Valley" path="file://Media/Manialinks/Trackmania/ScoresTable/bg-valley.dds" />
        <image environment="Stadium" path="file://Media/Manialinks/Trackmania/ScoresTable/bg-stadium.dds" />
      </collection>
    </background>
    <!-- Images for the foreground -->
    <foreground>
      <!--
      <image path="" />
      <position x="" y="" />
      <size width="" height="" />
      <colorize color="" />
      <collection>
        <image environment="" path="" />
        <image environment="" path="" />
        <image environment="" path="" />
      </collection>
      -->
    </foreground>
    <!-- Images for the teams -->
    <team1>
      <!--
      <image path="" />
      <position x="" y="" />
      <size width="" height="" />
      <collection>
        <image environment="" path="" />
        <image environment="" path="" />
        <image environment="" path="" />
      </collection>
      -->
    </team1>
    <team2>
      <image path="file://Media/Manialinks/Shootmania/ScoresTable/teamversus-right.dds" />
      <position x="0." y="3.8" />
      <size width="100." height="20." />
      <!--
      <collection>
        <image environment="" path="" />
        <image environment="" path="" />
        <image environment="" path="" />
      </collection>
      -->
    </team2>
    <!-- Images for the player card -->
    <playercard>
      <!-- The quad used behind the rank -->
      <quad path="file://Media/Manialinks/ShootMania/ScoresTable/playerline-square.dds" />
      <!-- The background of the playercard when oriented to the left -->
      <left path="file://Media/Manialinks/ShootMania/ScoresTable/playerline-left.dds" />
      <!-- The background of the playercard when oriented to the right -->
      <right path="file://Media/Manialinks/Trackmania/ScoresTable/playerline-right.dds" />
    </playercard>
  </images>
  <!-- 
    Assign scripts to columns or footer.
    The script must be in a CDATA section.

    The game mode must allow the use of custom scripts in the scores table
    for this to work. It's not the case in the default Nadeo modes.

    Check the Libs/Nadeo/ScoresTable2.Script.txt file for more information
    about what you can do in the scripts.
  -->
  <scripts>
    <column id="TestScript">
      <![CDATA[
        Label_Col.Value = "Script loaded";
      ]]>
    </column>
    <footer>
      <![CDATA[
        Label_Footer.Value = "Script loaded : My footer text";
      ]]>
    </footer>
  </scripts>
</scorestable>
{% endhighlight %}


# Exemples

## Changing the background

{% highlight xml %}
<?xml version="1.0" encoding="utf-8"?>
<scorestable version="1">
  <images>
    <background>
      <image path="file://Media/Manialinks/Trackmania/ScoresTable/bg-canyon.dds" />
      <position x="20." y="-20." />
      <size width="150." height="100." />
    </background>
  </images>
</scorestable>
{% endhighlight %}


## Changing the format

{% highlight xml %}
<?xml version="1.0" encoding="utf-8"?>
<scorestable version="1">
  <properties>
    <tablesize x="260." y="35." />
    <taleformat columns="3" lines="4"/>
  </properties>
</scorestable>
{% endhighlight %}