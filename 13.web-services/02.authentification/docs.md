---
title: Authentification
taxonomy:
    category:
        - docs
---

You can access the API anonymously, but we recommand that you use your Web Services credentials.

## Basic authentication

You can use your credentials through HTTP Basic authentication.

## Oauth2 access token

To access the routes starting with `/webservices/me` you should include an OAuth2 token with the header: `Authorization: Bearer THE_ACCESS_TOKEN`.