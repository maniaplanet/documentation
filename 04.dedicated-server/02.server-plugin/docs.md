---
title: 'Create a server plugin'
---

You can create ManiaScript server plugins that can interact like any server controller. 

They are loaded through the dedicated_cfg:
```
 <server_options>
        <server_plugin>server-plugins/plugin.Script.txt</server_plugin>
 </server_options>
```

With the file `UserData/Scripts/server-plugins/plugin.Script.txt` being:

```
#RequireContext CServerPlugin

#Setting S_Message "Hello World!"

main () {
    //Let's do nothing hapily
    while (True) {
        yield;
    }

}
```

You can change the value of the settings in the dedicated_cfg:

```
 <server_options>
        <server_plugin>server-plugins/plugin.Script.txt</server_plugin>
		<server_plugin_settings>
            <setting name="S_Message" type="text" value="!dlroW olleH"/>
        </server_plugin_settings>
 </server_options>
```