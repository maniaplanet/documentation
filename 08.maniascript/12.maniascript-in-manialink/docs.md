---
title: 'ManiaScript in Manialink'
taxonomy:
    category:
        - docs
---

You can use some ManiaScript in your Manialink too and even have access to few script elements directly in your Manialink or in the ManiaScript of the Manialink.

First to use some ManiaScript in your Manialink, you have to write the ManiaScript code after the Manialink code like this:

```
Text MyManialink() {
	declare Text MLText = """
		<quad id="aQuad" pos="0 0" z-index="0" size="360 180" halign="center" scriptevents="1" image="file://Media/Manialinks/MyImage.dds"/>
		<script><!--
		main() {
			declare Integer aVar = 0;

			declare aQuad <=> (Page.GetFirstChild("aQuad") as CMlQuad);

			aQuad.Show();

			while (True) {
				yield;

				// EVENT
				foreach (Event in PendingEvents) {
					if (Event.Type == CMlEvent::Type::MouseClick) {
						if (Event.ControlId == "aQuad") {
							log("I clicked on a quad");
					}
				}
			}
		}
		--></script>
	""";

	Layers::Create("ExampleUI", MLText);
	Layers::SetType("ExampleUI", CUILayer::EUILayerType::Normal;
	Layers::Attach("ExampleUI", Player);
}
```

>>>>> Please note the `scriptevents="1"` attribute on the quad that is mandatory to receive the events in your script.

In this example you can see how the ManiaScript works in the Manialink. Once you've written your ManiaLink you can start writing your script between the tag `<script><!-- //code --></script>`. In this portion of code you can use the ManiaScript present in the `CSmMlScriptIngame`, `CMlControl` and `CMlPage` classes.

>>>>> You can check several events like the different sort of clicks of the mouse on the elements (like Quad, Label, Gauge, etc).

If you want the script to run during the whole time it's attached to the UI of the player, you should put your code in a loop. Otherwise the code will be executed only at the very moment when the layer is attached.

>>>>> GUIPlayer in `CSmMlScriptIngame` is very useful because you have access to the attributes of the CSmPlayer attributes with it.

>>>>> You call variables from the main script if you surround the name of the variable with triple curly brackets like this: `{{{S_PointLimit}}}`. But with this method you can't manipulate them (like doing calculation, modification). See below to know how to do it properly.
