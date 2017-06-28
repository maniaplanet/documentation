---
title: 'Display messages on the HUD'
taxonomy:
    category:
        - docs
---

You mainly have two functions for displaying a message to the players (all of them or only one of them). Both functions can be use generally or targeted to a player.

The first one is with SendBigMessage which will display... well a big message at the top center of the player screen. The instruction is:

```
Message::SendBigMessage(TextLib::Compose("$<%1$> has scored!", _Player.Name), 3000, 10);
```

`Message` is the call for the library declared before at the beginning of the script. We ask the script to call the function `SendBigMessage` of the `Message` library.

In the example above, the first argument is the text to display. Thanks to the `Compose` function of the `TextLib` library, we can put arguments if you want to display messages that are a bit more dynamic. While you're writing the text you can add the text `$<%1$>` to tell the Compose function that you're adding an argument that you'll fill in just after. In the example, we indicate a player name (but it could be anything else). Then we indicate the duration of the message, 3000 milliseconds which equal 3 seconds.

You can specify a receiver if you indicate a CSmPlayer variable as first argument of the `SendBigMessage` function like this:

```
Message::SendBigMessage(ReceiverPlayer, TextLib::Compose("$<%1$> has scored!", _Player.Name), 3000, 10);
```

Else there is another function to display messages, smaller ones, on the HUD, by using the function `SendStatusMessage`:

```
Message::SendStatusMessage(TextLib::Compose("$<%1$> has scored!", _Player.Name), 3000, 10);
```

It works like `SendBigMessage`.