---
title: 'Create a ManiaApp'
process:
    markdown: true
    twig: true
taxonomy:
    category: docs
---

## Basic ManiaApp

A ManiaApp is a ManiaLink that is an application.
Here is a minimal ManiaApp application :

```
<?xml version="1.0" encoding="utf-8"?>
<maniaapp>
    <script><!--
        #RequireContext CManiaApp

        main() {    
            log("Hello ManiaApp");

            while (True) {
                yield;
            }
        }
        --></script>
</maniaapp>
```

You must write the `RequireContext` directive and the `while (True)` condition (with `yield;`) to make it work.

To observe the result without any web server, you must create your files in `My documents\ManiaPlanet\Media\Manialinks\YourManiaApp.xml` 
Then past the link `file://Media/Manialinks/YourManiaApp.xml` in your Maniaplanet browser.

You should see `Hello Maniaplanet` logged in your console when you open your debugger with `CTRL + G`.

## Layers

A *layer* is a ManiaLink that interact with its owner ; the ManiaApp.
The ManiaApp can handle, display and communicate with many layers (ManiaLink).

To display or interact with a ManiaLink from your ManiaApp, you must declare it as a `CUILayer` and modify its properties. 

Below is an exemple of a ManiaApp creating and loading a layer :

```
<?xml version="1.0" encoding="utf-8"?>
<maniaapp>
    <script><!--
        #RequireContext CManiaApp

        main() {    
            declare CUILayer MyLayer;

            MyLayer = UILayerCreate();
            MyLayer.IsVisible = True; 
            MyLayer.ManialinkPage = ManiaAppBaseUrl ^ "Layer_MyLayer.xml";

            while (True) {
                yield;
            }
        }
        --></script>
</maniaapp>
```

* `IsVisible` allow you to *hide* or *display* your layer.
* `ManialinkPage` is the **absolute path** of you layer file. When the ManialinkPage property is filled, your layer will **load**.
* ⚠ ️`ManiaAppBaseUrl` is the absolute path, handled by the server, where your ManiaApp is.

The layer (ManiaLink) :
```
<?xml version="1.0" encoding="utf-8" standalone="yes" ?>
<manialink version="3">
    <quad pos="-38 16" z-index="0" size="65 30" bgcolor="29B1B1AA"/>
    <label pos="-27 5" z-index="0" size="45 11" text="My ManiaApp" textemboss="1" textsize="8"/>

    <script><!--
        main() {
            log("Layer_MyLayer.xml loaded!");
            
            while (True) {
                yield;
            }
        }
    --></script>
</manialink>
```

It will show a square with a label inside with the text *My ManiaApp*.

## Sharing data from ManiaApp to Layer

You must declare a variable for the `LocalPage` of your Layer. The Layer must have the same variable name declared for its `Page`.
You can then set the value of this variable and it will be transmitted to the *Layer*.

Exemple :

```
<?xml version="1.0" encoding="utf-8"?>
<maniaapp>
    <script><!--
        #RequireContext CManiaApp

        main() {    
            declare CUILayer MyLayer;

            MyLayer = UILayerCreate();
            MyLayer.IsVisible = True; 
            MyLayer.ManialinkPage = ManiaAppBaseUrl ^ "Layer_MyLayerAgain.xml";

            // The variables WelcomeMessage must be declared after MyLayer /!\
            declare Text WelcomeMessage for MyLayer.LocalPage;
            WelcomeMessage = "Hello from ManiaApp!";

            while (True) {
                yield;
            }
        }
        --></script>
</maniaapp>
```

And the ManiaLink :

```
<?xml version="1.0" encoding="utf-8" standalone="yes" ?>
<manialink version="3">
    <script><!--
        main() {
            declare Text WelcomeMessage for Page;
            log(WelcomeMessage);

            while (True) {
                yield;
            }
        }
    --></script>
</manialink>
```

It will log `Hello from ManiaApp!` in the console.

## Events

You can send any **custom event** to your ManiaApp from your Layer.

Use the `SendCustomEvent()` function with the name of the event and additional data that you want to transmit to the ManiaApp.

ManiaApp example that receives a custom event:
```
<?xml version="1.0" encoding="utf-8"?>
<maniaapp>
    <script><!--
        #RequireContext CManiaApp

        main() {  
            declare CUILayer MyLayer;

            MyLayer = UILayerCreate();
            MyLayer.IsVisible = True; 
            MyLayer.ManialinkPage = ManiaAppBaseUrl ^ "Layer_MyEvent.xml";

            while (True) {
                  foreach (Event in PendingEvents) {
                    if (Event.Type != CManiaAppEvent::EType::LayerCustomEvent) {
                        continue;
                    }
                    switch (Event.CustomEventType) {
                        case "Square_Click": {
                            log("The square has been clicked !");
                        }
                    }
                }    
                
                yield;
            }
        }
        --></script>
</maniaapp>
```

> Note : Don’t forget to set `scriptevents` value to `1` to accept events from the `quad` element.

For the Layer:

```
<?xml version="1.0" encoding="utf-8" standalone="yes" ?>
<manialink version="3">
    <quad id="MySquare" pos="-38 16" z-index="0" size="65 30" bgcolor="29B1B1AA" scriptevents="1"/>
    <label pos="-27 5" z-index="0" size="45 11" text="My ManiaApp" textemboss="1" textsize="8"/>

    <script><!--
        main() {
            while (True) {
                foreach (Event in PendingEvents) {
                    if (Event.Type == CMlScriptEvent::Type::MouseClick) {
                        SendCustomEvent("Square_Click", [Event.ControlId]);
                    }
                }

                yield;
            }
        }
    --></script>
</manialink>

```

This will output `The square has been clicked!` when you click on it.
