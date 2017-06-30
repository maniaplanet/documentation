---
title: 'XML-RPC Script callbacks'
taxonomy:
    category:
        - docs
---

[TOC]

Usage
=====

Methods
-------

To call a script xml-rpc method, you need to use the *TriggerModeScriptEventArray* basic xml-rpc method. The script xml-rpc methods always take an array of string as parameter.

```
query('TriggerModeScriptEventArray', ['NameOfTheScriptMethod', ['Parameters', 'of', 'the', 'script', 'method']])
```

Be aware that when you call a script xml-rpc method, the answer you get is the answer to the 'TriggerModeScriptEventArray' basic xml-rpc method and not the one from the script method. Script methods that must return an answer will send it using a script callback.

Callbacks
---------

Like the basic xml-rpc api, the script xml-rpc callbacks are disabled by default and you need to turn them on manually if you want to use them.

```
query('TriggerModeScriptEventArray', ['XmlRpc.EnableCallbacks', ['true']])
```

Once the script callbacks are enabled you can listen for the *ManiaPlanet.ModeScriptCallbackArray* basic callback that will return two values. A string that is the name of the script callback and an array of strings that are the values of the callback.

Versionning
-----------

The script xml-rpc api uses a different versionning system than the basic xml-rpc api. You can get all the available version by using the *XmlRpc.GetAllApiVersions* script method and *XmlRpc.AllApiVersions* script callback. Then set the version you want to use with the *XmlRpc.SetApiVersion* script method. By default, the latest version is used.

Documentation
-------------

You can find the script xml-rpc api documentation on this [GitHub repository](https://github.com/maniaplanet/script-xmlrpc).