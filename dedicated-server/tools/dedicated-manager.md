---
layout: default
title: Dedicated Manager
description: Dedicated Manager tool
tags:
- dedicated
- tools
---

The dedicated manager is a maniaplanet dedicated server web manager.
This tools allows you to start, configure and manage easily your dedicated server.

## Installation
* Download the archive [here][1]. It contains all you need to setup the dedicated manager
* Unzip it wherever you want on your server
* Connect to your server in command line
* Run `$ php setup.php` this script will helped you to configure the dedicated manager
* Create the alias manager on your web server. This alias must linked to the www folder in DedicatedManager
* Create the following file:  `/etc/apache2/sites-available/manager.conf`
* Copy/paste the following apache configuration in this file:
* for Apache 2.4
```
Alias /manager /path/to/the/dedicated/manager
<Directory /path/to/the/dedicated/manager>
Options -Indexes +FollowSymLinks
AllowOverride All
Require all granted
</Directory>
```
* for Apache 2.2
```
Alias /manager /path/to/the/dedicated/manager
<Directory /path/to/the/dedicated/manager>
Options -Indexes +FollowSymLinks
AllowOverride All
Order allow,deny
Allow from all
</Directory>
```
* Enable the alias configuration `$ sudo a2ensite manager`
* Restart Apache `$ sudo service apache2 restart`
* Use `$ chmod o+w www/media/images/thumbnails` to grant write access to apache in the thumbnail folder
* The dedicated manager is now configured go to http://YourDomain/manager to access it

## Developers
In order have a working version, you need to have [Composer][2].

* Clone our repository: `$ git clone git@github.com:maniaplanet/dedicated-manager.git`
* Go in `dedicated-manager` directory: `$ cd dedicated-manager`
* Run composer to update the dependencies: `$ composer install`
* Use your SQL Manager (phpMyAdmin, HeidiSQL, etc.) to import Manager.sql, this will create the database and its tables
* Create a MySQL user and grant SELECT, INSERT, UPDATE, DELETE to Manager database
* Create an Apache alias, or a symbolic link to www folder
* Give write access to thumbnails folder in www/media/images/thumbnails
* Create your app.ini file
* Edit the DedicatedManager's config file (DedicatedManager/config/app.ini) and give the correct values to the following parameters:
```
application.URL
database.user
database.password
DedicatedManager\Config.dedicatedPath
DedicatedManager\Config.manialivePath
```

## Secure access with OAuth2
If you want to secured access to your Dedicated Manager page, you can enable OAuth2 authentication.
With this system only users with ManiaPlanet account allowed in your app.ini file.

* Create a web service account on your [Player Page][3]
* Create an application linked to your web service account
* Edite your app.ini file and set the following values:

```
DedicatedManager\Config.maniaConnect = On

webservices.username = 'Your API Username'
webservices.password = 'Your API Password'

DedicatedManager\Config.admins[] = 'Admin1Login'
DedicatedManager\Config.admins[] = 'Admin2Login'
DedicatedManager\Config.admins[] = 'Admin3Login'
```

[1]: https://github.com/maniaplanet/dedicated-manager/releases
[2]: https://getcomposer.org/
[3]: https://player.maniaplanet.com/webservices/
