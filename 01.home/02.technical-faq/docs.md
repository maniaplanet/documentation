---
title: 'Technical FAQ'
process:
    markdown: true
    twig: true
taxonomy:
    category:
        - docs
---

# General

## On which platforms can I play Maniaplanet?

Maniaplanet and its games (Shootmania Storm, Trackmania² Canyon, Trackmania² Valley, Trackmania² Lagoon, and Trackmania² Stadium) are available exclusively on Microsoft Windows.

The system requirements for Maniaplanet are:

* OS: Windows Vista SP2, Windows 7 SP1, Windows 8.1, or Windows 10
* CPU: Dual core from Intel or AMD at 2GHz
* RAM: 2 GB
* HD: 2GB free space
* Video: 512MB, DirectX 10 compatible
* Drivers: DirectX® 11.0 with video drivers

## I want to redownload the Maniaplanet client
[Click here](https://www.maniaplanet.com/download) to redownload the Maniaplanet client.

## I have lost my validation code
[Click here](https://www.maniaplanet.com/account/validation-code) to generate a new validation code. You will need to provide the key of one of your Maniaplanet title(s) to be able to generate a new validation code.


# Technical

## How to configure your firewall for use with Maniaplanet
A software firewall is an application installed on the computer or provided by the Operating System that actively blocks communication between the computer and the internet. Maniaplanet requires TCP ports 80 & 443. Important note: Modifying your firewall settings may reduce the security of the computer it affects. Most of the dedicated servers use ports in the `2350-2450` and `3450-3550` range, for both **TCP** and **UDP**.

## Why are actions in-game delayed? (i.e lag)
The primary cause of lag is due to playing on a server which is located very far away from your location (for example, when you try to play in France on a server located in China). You will usually notice lag when you try to turn right or left and you have one second or more between your action and the result on screen. Another cause of lag is high latency.

Also be sure that your network configuration in the Maniaplanet launcher is set correctly via `Configure -> Advanced -> Network -> Network upload & Network Download`.

## Network card issues.

There are several drivers that, if out-of-date, could cause issues for broadband users. If you need more help in locating drivers for your hardware or finding the settings listed, please contact the hardware manufacturer or a qualified technician.

* If you access the internet through an external broadband modem, be sure you have the latest firmware and drivers available for your modem.
* If your computer connects to the modem via USB, be sure you have the latest drivers for your motherboard or your USB PCI card.
* If your computer connects to the modem via Ethernet, be sure that your network card has the latest drivers installed.
* If you have a power management tab in your network card properties, click it and unselect the "allow the computer to turn off this device to save power" if selected.

## Configure your Firewall and/or Router
Firewalls and routers are designed specifically to control your computer's incoming and outgoing connections. You may need to set up these security features to allow access to the game servers. If these are not set up correctly, the firewall or router may prevent you from connecting to Maniaplanet. Simplifying your connection (temporarily removing your router, for example) may reveal the source of the problem.

## Testing your Connection and Performing a Trace Route
Running a Trace Route will track each step of your internet connection to Maniaplanet, and can help identify if and where connection problems may be occurring. Please see this page for instructions on doing a Trace Route test

## A dialog box indicates that the file D3D11.dll can not be found
If the file D3D11.dll is missing, you need to install Microsoft DirectX version 11.0 or higher.

You can download it from Microsoft's official website: [http://go.microsoft.com/fwlink/?LinkID=128945](http://go.microsoft.com/fwlink/?LinkID=128945).

## The game crashes when I move the mouse
In the launcher, click Configuration > Advanced > Compatibility and check Emulate cursor. Click OK twice and Save. When the cursor is emulated, its reaction time will be slightly slower.

## The game has display problems
Always get the latest drivers of your graphics card from the manufacturer’s web site. Compatibility and performance issue are regularly corrected.

## Manufacturer Websites

* [NVidia](https://www.nvidia.com/Download/index.aspx)
* [AMD (Radeon)](https://support.amd.com/en-us/download/)
* [Intel](http://support.intel.com/support/) (Click Download Drivers and Software then Graphics Drivers).

Laptops can cause problems since most graphic chips manufacturers (including AMD and NVidia) don't support them in their drivers. Laptops often use proprietary drivers (supported by the assembler, but rarely updated). Some other, more complex manipulations can help: disable Fastwrite in the advanced properties of your card, reduce AGP aperture to 64 Mo, set AGP to 4X. Some display problems are linked to advanced functions (shadows, reflections...) that you can disable in the game's launcher.

## The display is very slow
The display speed depends mostly on the display options that can be reduced to gain performance.

From the launcher, click Configuration to access the display setting dialog box. Try to reduce the resolution. The full screen mode is usually faster than the windowed. Set the graphical quality to « Best performance ».

For even more performance, you can set the graphical quality to « Custom » to access advanced display configuration. The minimum settings are: Shader quality == PC0, Texture quality == Low, Antialiasing == None, MaxFiltering == Bilinear, Shadows == None.

In the game settings, you can lower the quality of the opponents.
The sound may also cause lag on some machines (set in the audio settings).

## I have a 0xc150002 error code at launch
You have to download and install the latest [Visual C++ Redistributable Package](http://www.microsoft.com/download/en/details.aspx?id=5555).

## I have another technical issue with one of the Maniaplanet titles
>>> Please contact the Ubisoft Support at the following address: [http://support.ubisoft.com](http://support.ubisoft.com). If for any reason you do not find the answer to your question, you can click on the Ask a question link in the FAQ to send them an email, ensuring that they get all the important information on your system and your problem so they can answer correctly the first time.

## How can I create a dedicated server for a Maniaplanet game ?
Everything is explained on [this page](../../dedicated-server/getting-started).
You can also consult the [dedicated section on the forum](http://forum.maniaplanet.com/viewforum.php?f=261).
