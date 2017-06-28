---
title: 'Dedicated config'
taxonomy:
    category:
        - docs
---

| Dedicated cfg file line                                                                                  | Explaination |
| --                                                                                           | -- |
| &lt;?xml version="1.0" encoding="utf-8"?&gt;                                                 |  |
| &lt;dedicated&gt;                                                                            |  |
| &emsp;&lt;authorization_levels&gt;                                                           |  |
| &emsp;&emsp;&lt;level&gt;                                                                    |  |
| &emsp;&emsp;&emsp;&lt;name&gt;SuperAdmin&lt;/name&gt;                                        |  |
| &emsp;&emsp;&emsp;&lt;password&gt;SuperAdmin&lt;/password&gt;                                |  |
| &emsp;&emsp;&lt;/level&gt;                                                                   |  |
| &emsp;&emsp;&lt;level&gt;                                                                    |  |
| &emsp;&emsp;&emsp;&lt;name&gt;Admin&lt;/name&gt;                                             |  |
| &emsp;&emsp;&emsp;&lt;password&gt;Admin&lt;/password&gt;                                     |  |
| &emsp;&emsp;&lt;/level&gt;                                                                   |  |
| &emsp;&emsp;&lt;level&gt;                                                                    |  |
| &emsp;&emsp;&emsp;&lt;name&gt;User&lt;/name&gt;                                              |  |
| &emsp;&emsp;&emsp;&lt;password&gt;User&lt;/password&gt;                                      |  |
| &emsp;&emsp;&lt;/level&gt;                                                                   |  |
| &emsp;&lt;/authorization_levels&gt;                                                          |  |
| &emsp;&lt;masterserver_account&gt;                                                           |  |
| &emsp;&emsp;&lt;login&gt;&lt;/login&gt;                                                      |  |
| &emsp;&emsp;&lt;password&gt;&lt;/password&gt;                                                |  |
| &emsp;&emsp;&lt;validation_key&gt;&lt;/validation_key&gt;                                    |  |
| &emsp;&lt;/masterserver_account&gt;                                                          |  |
| &emsp;&lt;server_options&gt;                                                                 |  |
| &emsp;&emsp;&lt;name&gt;Test server&lt;/name&gt;                                             |  |
| &emsp;&emsp;&lt;comment&gt;&lt;/comment&gt;                                                  |  |
| &emsp;&emsp;&lt;hide_server&gt;0&lt;/hide_server&gt;                                         |  |
| &emsp;&emsp;&lt;max_players&gt;32&lt;/max_players&gt;                                        |  |
| &emsp;&emsp;&lt;password&gt;&lt;/password&gt;                                                |  |
| &emsp;&emsp;&lt;max_spectators&gt;32&lt;/max_spectators&gt;                                  |  |
| &emsp;&emsp;&lt;password_spectator&gt;&lt;/password_spectator&gt;                            |  |
| &emsp;&emsp;&lt;keep_player_slots&gt;False&lt;/keep_player_slots&gt;                         |  |
| &emsp;&emsp;&lt;ladder_mode&gt;forced&lt;/ladder_mode&gt;                                    |  |
| &emsp;&emsp;&lt;enable_p2p_upload&gt;True&lt;/enable_p2p_upload&gt;                          |  |
| &emsp;&emsp;&lt;enable_p2p_download&gt;False&lt;/enable_p2p_download&gt;                     |  |
| &emsp;&emsp;&lt;callvote_timeout&gt;60000&lt;/callvote_timeout&gt;                           |  |
| &emsp;&emsp;&lt;callvote_ratio&gt;0.05&lt;/callvote_ratio&gt;                                |  |
| &emsp;&emsp;&lt;callvote_ratios&gt;                                                          |  |
| &emsp;&emsp;&emsp;&lt;voteratio command="Ban" ratio="-1" /&gt;                               |  |
| &emsp;&emsp;&lt;/callvote_ratios&gt;                                                         |  |
| &emsp;&emsp;&lt;allow_map_download&gt;True&lt;/allow_map_download&gt;                        |  |
| &emsp;&emsp;&lt;autosave_replays&gt;False&lt;/autosave_replays&gt;                           |  |
| &emsp;&emsp;&lt;autosave_validation_replays&gt;False&lt;/autosave_validation_replays&gt;     |  |
| &emsp;&emsp;&lt;referee_password&gt;&lt;/referee_password&gt;                                |  |
| &emsp;&emsp;&lt;referee_validation_mode&gt;0&lt;/referee_validation_mode&gt;                 |  |
| &emsp;&emsp;&lt;use_changing_validation_seed&gt;False&lt;/use_changing_validation_seed&gt;   |  |
| &emsp;&emsp;&lt;disable_horns&gt;False&lt;/disable_horns&gt;                                 |  |
| &emsp;&emsp;&lt;clientinputs_maxlatency&gt;0&lt;/clientinputs_maxlatency&gt;                 |  |
| &emsp;&lt;/server_options&gt;                                                                |  |
| &emsp;&lt;system_config&gt;                                                                  |  |
| &emsp;&emsp;&lt;connection_uploadrate&gt;8000&lt;/connection_uploadrate&gt;                  |  |
| &emsp;&emsp;&lt;connection_downloadrate&gt;8000&lt;/connection_downloadrate&gt;              |  |
| &emsp;&emsp;&lt;allow_spectator_relays&gt;False&lt;/allow_spectator_relays&gt;               |  |
| &emsp;&emsp;&lt;p2p_cache_size&gt;600&lt;/p2p_cache_size&gt;                                 |  |
| &emsp;&emsp;&lt;force_ip_address&gt;&lt;/force_ip_address&gt;                                |  |
| &emsp;&emsp;&lt;server_port&gt;2350&lt;/server_port&gt;                                      |  |
| &emsp;&emsp;&lt;server_p2p_port&gt;3450&lt;/server_p2p_port&gt;                              |  |
| &emsp;&emsp;&lt;client_port&gt;0&lt;/client_port&gt;                                         |  |
| &emsp;&emsp;&lt;bind_ip_address&gt;&lt;/bind_ip_address&gt;                                  |  |
| &emsp;&emsp;&lt;use_nat_upnp&gt;&lt;/use_nat_upnp&gt;                                        |  |
| &emsp;&emsp;&lt;gsp_name&gt;&lt;/gsp_name&gt;                                                |  |
| &emsp;&emsp;&lt;gsp_url&gt;&lt;/gsp_url&gt;                                                  |  |
| &emsp;&emsp;&lt;xmlrpc_port&gt;5000&lt;/xmlrpc_port&gt;                                      |  |
| &emsp;&emsp;&lt;xmlrpc_allowremote&gt;False&lt;/xmlrpc_allowremote&gt;                       |  |
| &emsp;&emsp;&lt;scriptcloud_source&gt;nadeocloud&lt;/scriptcloud_source&gt;                  |  |
| &emsp;&emsp;&lt;blacklist_url&gt;&lt;/blacklist_url&gt;                                      |  |
| &emsp;&emsp;&lt;guestlist_filename&gt;&lt;/guestlist_filename&gt;                            |  |
| &emsp;&emsp;&lt;blacklist_filename&gt;&lt;/blacklist_filename&gt;                            |  |
| &emsp;&emsp;&lt;title&gt;SMStorm&lt;/title&gt;                                               |  |
| &emsp;&emsp;&lt;minimum_client_build&gt;&lt;/minimum_client_build&gt;                        |  |
| &emsp;&emsp;&lt;disable_coherence_checks&gt;False&lt;/disable_coherence_checks&gt;           |  |
| &emsp;&emsp;&lt;disable_replay_recording&gt;False&lt;/disable_replay_recording&gt;           |  |
| &emsp;&emsp;&lt;use_proxy&gt;False&lt;/use_proxy&gt;                                         |  |
| &emsp;&emsp;&lt;proxy_login&gt;&lt;/proxy_login&gt;                                          |  |
| &emsp;&emsp;&lt;proxy_password&gt;&lt;/proxy_password&gt;                                    |  |
| &emsp;&lt;/system_config&gt;                                                                 |  |
| &lt;/dedicated&gt;                                                                           |  |