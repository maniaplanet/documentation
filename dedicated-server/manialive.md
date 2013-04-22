ManiaLive
=========

ManiaLive is ManiaPlanet server controller written in PHP

QuickStart
----------

### Preparation

You should have PHP installed with the cURL extension.

* On Windows, download and install [PHP 5.3 installer](http://windows.php.net/download/#php-5.3). CURL is bundled in the installer.
* On Debian/Ubuntu (or any derivative) you will need to install both php5-cli and php5-curl: `sudo apt-get install php5-cli php5-curl`

### Installation

You can download latest ManiaLive version on the [project website](https://code.google.com/p/manialive/downloads/list).

Command Line
------------

<table>
  <tr>
    <th>Option Name</th><th>Role</th>
  </tr>
  <tr>
    <td>--help</td><td>displays the ManiaLive? command line help </td>
  </tr>
  <tr>
    <td>--address=xxx</td><td>xxx represents the address of the server, it should be an IP address or localhost</td>
  </tr>
  <tr>
    <td>--rpcport=xxx</td><td>xxx represents the XML-RPC port to use for the connection to the server </td>
  </tr>
  <tr>
    <td>--user=xxx</td><td> xxx represents the name of the user to use for the communication. It should be User, Admin or SuperAdmin</td>
  </tr>
  <tr>
    <td>password=xxx</td><td>xxx represents the password relative to the user selected</td>
  </tr>
  <tr>
    <td>--manialive_cfg=xxx</td><td>xxx represents the name of the ManiaLive configuration file. This file should be present in the ManiaLive config file. </td>
  </tr>
</table>