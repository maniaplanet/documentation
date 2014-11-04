---
layout: default
title: ManiaLink in VR
description: ManiaLink friendly for Virtual Reality
tags:
- creation
- manialink
---

As you may know, is it possible to run Maniaplanet in 3D and Virtual Reality (i.e Occulus Rift) mode.

I'll give few tips to make a manialink (site or ingame interface) which is VR-friendly.

# Center your content
The content displayed via an Occulus Rift for example is centered on the foreground of the screen whatever you're looking at (the 2D interface (used for the manialink for example) is following the movements of the head). Moreover the border of the 2D interface are less visible (on the case of ingame User Interface, else the border is a lot visible for a "standard" manialink), **Take also note that when the VR (HMD) mode is activated, the useable surface to display to player is reduced from (-160, -90)/(160,90) to (-90, -90)/(90, 90) !**.

# Avoid opaque background
Opaque backgroud for content (like a background for a menu or an options) aren't rendered very well in VR-mode. Choose a semi-transparent colour which is way more classy when you look it through a VR device.

## Ingame UI specifics
If you try to create an ingame VR UI, as for manialink, center the info, hide all the content of the standard UI which are located next to the borders (speed meter, timer) and keep the screen as clean as possible. Put very few 2D elements on the UI, disable the labels above the characters/cars and you'll start to have a pleasant experience in VR.

# Increase the size/weight of the texts
Another thing specific to the VR topic is that the texts need to be bigger than usual since the resolution is (for now) pretty low because the screen is really close to the eyes and makes the pixels very visible which may make the texts hard to read. So choose the fonts which are quite thick (like the labels "TextButtonBig" or "TextButtonMedium").

# Make your manialink browsable with the gamepad
It's quite difficult to navigate in the manialink with the mouse and the keyboard when you've a VR headset on the head. That's why it's important to activate the pad navigation by adding the line `EnableMenuNavigation(Bool EnableInputs, Bool WithAutoFocus, Control AutoBackControl)` on your manialink code.

## About EnableMenuNavigation()
**EnableInputs**: Enbale the gamepad navigation  
**WithAutoFocus**: Enable the automatic focus on controls (with the gamepad and the keyboard)
**AutoBackControl**: Control to automatically click when the player hit the key `ESC` or the `B` button of the gamepad  

If `EnableInputs` is `True`, the inputs which aren't used for the automatic navigation will be sent to the script.


## Example
{% highlight xml %}
<?xml version="1.0" encoding="utf-8" standalone="yes" ?>
<manialink version="2">
<!-- MyManialink code -->
<script><!--
   main()
   {
      declare CMlFrame    Frame_Resume    <=> (Page.MainFrame   .GetFirstChild("Frame_Resume")       as CMlFrame);
      declare CMlFrame    Frame_General    <=> (Page.MainFrame   .GetFirstChild("Frame_General")    as CMlFrame);
      declare CMlQuad    Button_Resume    <=> (Frame_Resume   .GetFirstChild("Button_Bg")       as CMlQuad);
      declare CMlLabel    Label_Resume    <=> (Frame_Resume   .GetFirstChild("Label_Text")       as CMlLabel);

      declare CMlFrame    Frame_Quit       <=> (Page.MainFrame   .GetFirstChild("Frame_Quit")       as CMlFrame);
      declare CMlQuad    Button_Quit    <=> (Frame_Quit      .GetFirstChild("Button_Bg")       as CMlQuad);
      declare CMlLabel    Label_Quit      <=> (Frame_Quit      .GetFirstChild("Label_Text")       as CMlLabel);

      Label_Resume   .Value    = "RESUME";
      Label_Quit      .Value    = "QUIT";

      declare netwrite Boolean Net_StartMenuOpen   for UI;
      declare         Boolean   Pre_StartMenuOpen;
      Net_StartMenuOpen = False;
      Pre_StartMenuOpen = True;
      declare LatestPressMenuButton = Now;
      EnableMenuNavigation(False, True, Button_Resume);

      while (True)
      {
         yield;
         LibManialink_AnimLoop();

         Net_StartMenuOpen = PageIsVisible;
         // log(Now^"> "^Net_MenuOpen);

         if(Pre_StartMenuOpen != Net_StartMenuOpen) {
            if(Net_StartMenuOpen) {
               LibManialink_SetTargetScale      (Frame_General, 0.8);
               LibManialink_PresetAnimInsert   (Frame_General, 0, 500, "ElasticOut");
               Audio.PlaySoundEvent(CAudioManager::ELibSound::ShowMenu, 0, -5.);
            } else {
               LibManialink_SetTargetScale      (Frame_General, 0.0);
               LibManialink_PresetAnimInsert   (Frame_General, 0, 500, "ElasticOut");
               // Audio.PlaySoundEvent(CAudioManager::ELibSound::HideMenu, 0, -5.);
            }
            Pre_StartMenuOpen = Net_StartMenuOpen;
         }

         foreach (Event in PendingEvents)
         {
            if (Event.Type == CMlEvent::Type::MouseClick)
            {
               if (Event.Control == Button_Resume) {
                  CloseInGameMenu(CMlScriptIngame::EInGameMenuResult::Resume);
               }
               if (Event.Control == Button_Quit) {
                  CloseInGameMenu(CMlScriptIngame::EInGameMenuResult::Quit);
               }
            } else if (Event.Type == CMlEvent::Type::MouseOver) {
               Audio.PlaySoundEvent(CAudioManager::ELibSound::Focus, 0, 3.);
            }
         }
      }
   }
--></script>

</manialink>
{% endhighlight %}

`EnableMenuNavigationInputsAutoFocus` will allow the player to cycle automatically with the gamepad between all the controls including an URL (manialink or web), an action or with the scriptevents parameter set to `true`.

The default cycle between the buttons is basic but you can code one manually if you want to customize the experience. In that case, you should use the parameter `EnableMenuNavigationInputs` instead of `EnableMenuNavigationInputsAutoFocus`.
