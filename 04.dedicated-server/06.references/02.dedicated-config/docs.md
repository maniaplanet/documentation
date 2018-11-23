---
title: 'Dedicated config'
taxonomy:
    category:
        - docs
---

Dedicated cfg                                                                               
--           
```                                                                               
<?xml version="1.0" encoding="utf-8"?>
<dedicated>
    <authorization_levels>
        <level>
            <name>SuperAdmin</name>
            <password>SuperAdmin</password>
        </level>
        <level>
            <name>Admin</name>
            <password>Admin</password>
        </level>
        <level>
            <name>User</name>
            <password>User</password>
        </level>
    </authorization_levels>
    <masterserver_account>
        <login></login>
        <password></password>
        <validation_key></validation_key>
    </masterserver_account>
    <server_options>
        <name>Test server</name>
        <comment></comment>
        <hide_server>0</hide_server>                                        <!-- 0: shown in server browser, 1: hidden -->

        <max_players>32</max_players>
        <password></password>

        <max_spectators>32</max_spectators>
        <password_spectator></password_spectator>

        <keep_player_slots>False</keep_player_slots>
        <ladder_mode>forced</ladder_mode>

        <enable_p2p_upload>True</enable_p2p_upload>
        <enable_p2p_download>False</enable_p2p_download>

        <callvote_timeout>60000</callvote_timeout>
        <callvote_ratio>0.05</callvote_ratio>                               <!-- Default ratio between 0 and 1, -1 to forbid -->
        <callvote_ratios>
            <voteratio command="Ban" ratio="-1" />
        </callvote_ratios>

        <allow_map_download>True</allow_map_download>
        <autosave_replays>False</autosave_replays>
        <autosave_validation_replays>False</autosave_validation_replays>

        <referee_password></referee_password>
        <referee_validation_mode>0</referee_validation_mode>
        <use_changing_validation_seed>False</use_changing_validation_seed>
        <disable_horns>False</disable_horns>
        <clientinputs_maxlatency>0</clientinputs_maxlatency>                <!-- 0 is automatic adjustment -->
        <server_plugin></server_plugin>                                     <!-- Server plugin file to load, from UserData/Scripts. -->
        <server_plugin_settings>
            <setting name="S_Hello" type="text" value="Hello World"/>
        </server_plugin_settings>
    </server_options>
    <system_config>
        <title>SMStorm</title>
        
        <server_port>2350</server_port>                                     <!-- If port is used, next port will be used automatically -->
        <server_p2p_port>3450</server_p2p_port>
    
        <connection_uploadrate>8000</connection_uploadrate>                 <!-- Kbits per second -->
        <connection_downloadrate>8000</connection_downloadrate>

        <allow_spectator_relays>False</allow_spectator_relays>
        <p2p_cache_size>600</p2p_cache_size>
        <force_ip_address></force_ip_address>
        
        <client_port>0</client_port>
        <bind_ip_address></bind_ip_address>
        <use_nat_upnp></use_nat_upnp>
        <gsp_name></gsp_name>
        <gsp_url></gsp_url>
        <xmlrpc_port>5000</xmlrpc_port>
        <xmlrpc_allowremote>False</xmlrpc_allowremote>
        <scriptcloud_source>nadeocloud</scriptcloud_source>
        <blacklist_url></blacklist_url>
        <guestlist_filename></guestlist_filename>
        <blacklist_filename></blacklist_filename>
        
        <minimum_client_build></minimum_client_build>
        <disable_coherence_checks>False</disable_coherence_checks>
        <disable_replay_recording>False</disable_replay_recording>

        <use_proxy>False</use_proxy>
        <proxy_url></proxy_url>                                             <!-- Not used if use_proxy is False -->
        <proxy_login></proxy_login>
        <proxy_password></proxy_password>
    </system_config>
</dedicated>
```
