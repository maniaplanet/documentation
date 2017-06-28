---
title: 'Manialink example'
taxonomy:
    category:
        - docs
---

### Content of the file example.xml

```xml
<?xml version="1.0" encoding="utf-8" standalone="yes"?>
<manialink version="3">
    <include url="./background.xml"/>
    <quad pos="-80 45" z-index="1" size="160 90" style="Bgs1" substyle="BgWindow"/>
    <quad pos="-70 44" z-index="2" size="140 12" style="Bgs1" substyle="BgWindow2"/>
    <label pos="0 40" z-index="3" halign="center" textcolor="F00" text="$wWelcome to our test page"/>
    <label pos="0 30" z-index="2" halign="center" text="$h[Exemple]Link to a ManiaLink"/>
    <label pos="0 20" z-index="2" halign="center" text="$l[www.maniaplanet.com]Link to our homepage www.maniaplanet.com"/>
    <label pos="0 0" z-index="2" halign="center" style="CardButtonMedium" text="Maniacode" manialink="Link inside ManiaCode"/>
</manialink>
```

### Content of the file background.xml

```
<quad pos="-160 90" z-index="0" size="320 180" image="./background.jpg"/>
```