---
title: OAuth2
taxonomy:
    category:
        - docs
---

## OAuth

The Web Services provides user authentication thanks to OAuth2.

### Auth code flow (or explicit flow, or server side flow)

1. Redirect the user to [https://v4.live.maniaplanet.com/login/oauth2/authorize](https://v4.live.maniaplanet.com/login/oauth2/authorize) with the query parameters:
  * `response_type`: the value `code`
  * `client_id`
  * `scope`: space separated list of scopes
  * `redirect_uri`: one the of the redirect URI mentioned in your Web Services application
  * `state`: a non predictable random string. You should store this value and check if the same is returned at other stages.
2. The use authorize your application, he is redirected to the `redirect_uri` wit the query parameters:
  * `code`
  * `state`: the state you provided at stage 1
3. Your application should send the POST request to [https://v4.live.maniaplanet.com/login/oauth2/access_token](https://v4.live.maniaplanet.com/login/oauth2/access_token) with the parameters:
  * `grant_type` the value `authorization_code`
  * `client_id`
  * `client_secret`
  * `code`: from stage 2
  * `redirect_uri`: from stage 1 

The answer will contain the keys:
    * `token_type`: the value `Bearer`
    * `expires_in`: an integer representing the TTL of the access token
    * `access_token`: the access token
    * `refresh_token`: the refresh token

### Refresh token flow

1. Send a POST request to [https://v4.live.maniaplanet.com/login/oauth2/access_token](https://v4.live.maniaplanet.com/login/oauth2/access_token) with the parameters:
  * `grant_type`: the value `refresh_token`
  * `refresh_token`: a refresh token
  * `client_id`
  * `client_secret`
  * `scope`: a list of space separated scopes
 
 The answer contains: 
  * `token_type`: the value `Bearer`
  * `expires_in`: an integer representing the TTL of the access token
  * `access_token`: the access token
  * `refresh_token`: the refresh token


### Implicit flow

To be used with user-agent-based clients that cannot keeps a secret.

1. Redirect the user to [https://v4.live.maniaplanet.com/login/oauth2/authorize](https://v4.live.maniaplanet.com/login/oauth2/authorize) with the query parameters:
   * `response_type`: the value `token`
   * `client_id`
   * `client_secret`
   * `redirect_uri`: one the of the redirect URI mentionned in your Web Services application
   * `scope`: a space separated list of scopes
   * `state`
2. The user approves, he is redirected to the `redirect_uri` with the following parameters in the query string:
    * `token_type`: the value `Bearer`
    * `expires_in`: an integer representing the TTL of the access token
    * `access_token`: the access token

### Client crendentials

It should be used for machine to machine authentication. 

1. Send a POST request to [https://v4.live.maniaplanet.com/login/oauth2/access_token](https://v4.live.maniaplanet.com/login/oauth2/access_token) with the parameters:
  * `grant_type`: the value `client_credentials`
  * `refresh_token`: a refresh token
  * `client_id`
  * `client_secret`
  * `scope`: a list of space separated scopes

The answer contains: 
  * `token_type`: the value `Bearer`
  * `expires_in`: an integer representing the TTL of the access token
  * `access_token`: the access token
   
### Scopes

The available scopes are:
* `basic`: access to basic user information login, nickname and zone path.
* `dedicated`: access to the list of dedicated servers of the player
* `titles`: access to the list of titles created by the player
* `events`: access to the list of events of the player
* `maps`: access to the maps of the player
* `email`: access to the player email
