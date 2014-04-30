---
layout: static
title: Manialink library
description: Utilities functions for ManiaLinks
---

# Purpose
The Manialink library offer different modules and functions to use in manialink: animations, tooltips, draggable ...

# Usage
Add this line at the beginning of your game mode script to use it :
`#Include "Libs/Nadeo/Manialink.Script.txt" as Manialink`

All the functions of the libraries will return script parts that you'll have to inject in the manialink you want to enhance.

## Animations

To use the animation module you first have to inject it into your manialink with the `Animations()` function. This function can take one optional parameter, an array of Text containing the easings that you want to use in your animations. Depending on the easings you might have to include `MathLib` and in all cases you have to include `TextLib`. You can take a look at all the available easing functions [here](http://easings.net/).
Once you have injected the module you can call the `LibManialink_AnimLoop()` function in your script to update your animations.

Example of the basic setting :
{% highlight js %} 
<frame id="Frame_Global">
  <quad sizen="15 15" halign="center" valign="center" bgcolor="047" id="Quad_Anim" />
  <label posn="-30 20" halign="center" style="CardButtonMedium" text="Anim 1" scriptevents="1" id="Button_Anim1" />
  <label posn="30 20" halign="center" style="CardButtonMedium" text="Anim 2" scriptevents="1" id="Button_Anim2" />
</frame>
<script><!--
{{{Manialink::Includes(["TextLib" => "TL", "MathLib" => "ML"])}}}
{{{Manialink::Animations(["EaseInOutElastic", "EaseOutBounce", "EaseInOutExp", "EaseOutBack", "EaseOutElastic"])}}}
main() {
  while (True) {
    yield;
    
    LibManialink_AnimLoop();
  }
}
--></script>
{% endhighlight %}

You have access to three animation functions:
* `LibManialink_Anim()` : clear the animation queue of the element and start a new animation sequence
* `LibManialink_AnimChain()` : add an animation at the end of the animation queue
* `LibManialink_AnimInsert()`: insert an animation inside the animation queue

Let's start with a simple animation. I want the quad to move to another position when I click on the "Anim 1" button :
{% highlight js %} 
<frame id="Frame_Global">
  <quad sizen="15 15" halign="center" valign="center" bgcolor="047" id="Quad_Anim" />
  <label posn="-30 20" halign="center" style="CardButtonMedium" text="Anim 1" scriptevents="1" id="Button_Anim1" />
  <label posn="30 20" halign="center" style="CardButtonMedium" text="Anim 2" scriptevents="1" id="Button_Anim2" />
</frame>
<script><!--
{{{Manialink::Includes(["TextLib" => "TL", "MathLib" => "ML"])}}}
{{{Manialink::Animations(["EaseInOutElastic", "EaseOutBounce", "EaseInOutExp", "EaseOutBack", "EaseOutElastic"])}}}
main() {
  while (True) {
    yield;
    
    LibManialink_AnimLoop();
    
    foreach (Event in PendingEvents) {
      if (Event.Type == CMlEvent::Type::MouseClick) {
        if (Event.ControlId == "Button_Anim1") {
          LibManialink_Anim({{{Manialink::Inject("""<quad posn="50 -50" id="Quad_Anim" />""")}}}, 3000, "EaseOutBounce");
        }
      }
    }
  }
}
--></script>
{% endhighlight %}

The first thing to notice is the use of the `Inject()` function. It is used to avoid the insertion of escaped double quote (\"). It's really useful when inserting long Text with a lot of double quotes inside. We could have write the exact same thing like that :
{% highlight js %} 
LibManialink_Anim("<quad posn=\"50 -50\" id=\"Quad_Anim\" />", 3000, "EaseOutBounce");
{% endhighlight %}

So the `LibManialink_Anim()` function take 3 parameters. The first one is the element and the properties we want to animate. In this case it's the position of the quad with an id equal to "Quad_Anim". The second parameter is the duration of the animation and the third the easing method. 
All the animations start from the current properties of the animated element. This is the reason why when we click on the "Anim 1" button a second time the animation doesn't play anymore. The element is already at its desired position.

You can send the quad to it's original position with a second animation bind on the "Anim 2" button :
{% highlight js %} 
foreach (Event in PendingEvents) {
  if (Event.Type == CMlEvent::Type::MouseClick) {
    if (Event.ControlId == "Button_Anim1") {
      LibManialink_Anim({{{Manialink::Inject("""<quad posn="50 -50" id="Quad_Anim" />""")}}}, 3000, "EaseOutBounce");
    } else if (Event.ControlId == "Button_Anim2") {
      LibManialink_Anim({{{Manialink::Inject("""<quad posn="0 0" id="Quad_Anim" />""")}}}, 3000, "EaseInOutElastic");
    }
  }
}
{% endhighlight %}

If you press the opposing button while an animation is running you'll see that it will stop and the new one start from the current position of the quad.

You can animate multiple properties during one animation :
{% highlight js %} 
foreach (Event in PendingEvents) {
  if (Event.Type == CMlEvent::Type::MouseClick) {
    if (Event.ControlId == "Button_Anim1") {
      LibManialink_Anim({{{Manialink::Inject("""<quad posn="50 -50" sizen="10 30" scale="2" rot="45" bgcolor="f70" opacity="0.5" id="Quad_Anim" />""")}}}, 3000, "EaseOutBounce");
    } else if (Event.ControlId == "Button_Anim2") {
      LibManialink_Anim({{{Manialink::Inject("""<quad posn="0 0" id="Quad_Anim" />""")}}}, 3000, "EaseInOutElastic");
    }
  }
}
{% endhighlight %}

If you press the "Anim 2" button after the "Anim 1" button you'll see that the quad position will return to it's original value but not the other properties. Not specifying a property in the animation function will leave it at it's current value. Which is the case in the second animation where we just specify the position property.

Now let's take a look at the `LibManialink_AnimChain()` function. It works exactly like `LibManialink_Anim()` but instead of clearing the animation queue of the element it will add a new animation at the end of the queue. So taking our previous example :
{% highlight js %} 
foreach (Event in PendingEvents) {
  if (Event.Type == CMlEvent::Type::MouseClick) {
    if (Event.ControlId == "Button_Anim1") {
      LibManialink_Anim({{{Manialink::Inject("""<quad posn="50 -50" sizen="10 30" scale="2" rot="45" bgcolor="f70" opacity="0.5" id="Quad_Anim" />""")}}}, 3000, "EaseOutBounce");
      LibManialink_AnimChain({{{Manialink::Inject("""<quad posn="-50 -50" rot="-45" bgcolor="7f7" opacity="1" id="Quad_Anim" />""")}}}, 2000, "");
    } else if (Event.ControlId == "Button_Anim2") {
      LibManialink_Anim({{{Manialink::Inject("""<quad posn="0 0" id="Quad_Anim" />""")}}}, 3000, "EaseInOutElastic");
    }
  }
}
{% endhighlight %}

With this, when you click on the "Anim 1" button the quad will start to go to it's first position during 3 seconds and then move to the second one during 2 seconds.

But let's say you want to have an animation where the quad go from position A to B in 5 seconds and rotate during the translation for 3 seconds starting after one second. You'll have to use the `LibManialink_AnimInsert()` for that :
{% highlight js %} 
foreach (Event in PendingEvents) {
  if (Event.Type == CMlEvent::Type::MouseClick) {
    if (Event.ControlId == "Button_Anim1") {
      LibManialink_Anim({{{Manialink::Inject("""<quad posn="100 0" id="Quad_Anim" />""")}}}, 5000, "");
      LibManialink_AnimInsert({{{Manialink::Inject("""<quad rot="180" id="Quad_Anim" />""")}}}, 1000, 3000, "");
    } else if (Event.ControlId == "Button_Anim2") {
      LibManialink_Anim({{{Manialink::Inject("""<quad posn="0 0" rot="0" id="Quad_Anim" />""")}}}, 3000, "EaseInOutElastic");
    }
  }
}
{% endhighlight %}

The function takes one more parameter than `LibManialink_Anim()`. The first parameter is still the element and the properties we want to animate. Then we have time at which the animation will start. Finally we have the duration of the animation and the easing method.

And now let's see what we could do by combining them all together :
{% highlight js %} 
foreach (Event in PendingEvents) {
  if (Event.Type == CMlEvent::Type::MouseClick) {
    if (Event.ControlId == "Button_Anim1") {
      LibManialink_Anim({{{Manialink::Inject("""<quad posn="0 -40" id="Quad_Anim" />""")}}}, 3000, "EaseOutBounce");
      LibManialink_AnimInsert({{{Manialink::Inject("""<quad rot="-2" id="Quad_Anim" />""")}}}, 0, 1000, "");
      LibManialink_AnimInsert({{{Manialink::Inject("""<quad rot="90" id="Quad_Anim" />""")}}}, 1000, 1500, "");
      LibManialink_AnimChain({{{Manialink::Inject("""<quad rot="45" id="Quad_Anim" />""")}}}, 2500, "EaseInOutExp");
      LibManialink_AnimChain({{{Manialink::Inject("""<quad posn="0 -10" id="Quad_Anim" />""")}}}, 2500, "EaseInOutExp");
      LibManialink_AnimChain({{{Manialink::Inject("""<quad scale="2" id="Quad_Anim" />""")}}}, 2500, "EaseOutBack");
      LibManialink_AnimChain({{{Manialink::Inject("""<quad posn="-20 -20" sizen="30 10" bgcolor="f7f" id="Quad_Anim" />""")}}}, 2500, "EaseOutElastic");
    } else if (Event.ControlId == "Button_Anim2") {
      LibManialink_Anim({{{Manialink::Inject("""<quad posn="0 0" sizen="15 15" scale="1" rot="0" bgcolor="047" id="Quad_Anim" />""")}}}, 1000, "EaseInOutElastic");
    }
  }
}
{% endhighlight %}

You can also repeat a whole animation for a definite number of time or indefinitely. To do so you have to inject the repeat function in your Manialink script.
{% highlight js %}
<script><!--
{{{Manialink::Includes(["TextLib" => "TL", "MathLib" => "ML"])}}}
{{{Manialink::Animations(["EaseInOutElastic", "EaseOutBounce", "EaseInOutExp", "EaseOutBack", "EaseOutElastic"])}}}
{{{Manialink::Functions(["AnimRepeat"])}}}

main() {
  ...
}
--></script>
{% endhighlight %}

Now you must wrap the animation you want to repeat between two functions, `LibManialink_AnimRepeatStart()` and `LibManialink_AnimRepeatEnd()` :
{% highlight js %}
foreach (Event in PendingEvents) {
  if (Event.Type == CMlEvent::Type::MouseClick) {
    if (Event.ControlId == "Button_Anim1") {
      LibManialink_AnimRepeatStart(1000, 3);
      LibManialink_Anim({{{Manialink::Inject("""<quad scale="2" id="Quad_Anim" />""")}}}, 500, "EaseOutBack");
      LibManialink_AnimChain({{{Manialink::Inject("""<quad scale="1" id="Quad_Anim" />""")}}}, 500, "EaseOutBack");
      LibManialink_AnimRepeatEnd();
    } else if (Event.ControlId == "Button_Anim2") {
      LibManialink_Anim({{{Manialink::Inject("""<quad scale="1" rot="0" id="Quad_Anim" />""")}}}, 250, "EaseOutBack");
    }
  }
}
{% endhighlight %}

`LibManialink_AnimRepeatStart()` take two arguments :
* The time interval between each loop
* The number of repeat
In this case we want to repeat the animation each second three times.
`LibManialink_AnimRepeatStart()` can also take only the first argument and in this case the animation will be repeated indefinitely.

If you can't identify the element you want to animate by an unique id, the animations functions can take an optional parameter as first argument. You can pass the CMlControl directly to the function :
{% highlight js %}
LibManialink_Anim(((Page.MainFrame.Controls[0] as CMlFrame).Controls[0] as CMlFrame).Controls[0], {{{Manialink::Inject("""<quad posn="0 0" />""")}}}, 3000, "EaseInOutElastic");
{% endhighlight %}

To stop an animation on an element you can use the `LibManialink_AnimStop()` function. Two versions of the function exist. the first one take a CMlControl as argument while the second one take a Text, the ControlId of the control.
{% highlight js %} 
Void LibManialink_AnimStop(CMlControl _Control)

@param  _Control   The control to stop
{% endhighlight %}
{% highlight js %} 
Void LibManialink_AnimStop(Text _ControlId)

@param  _ControlId   The ControlId of the control to stop
{% endhighlight %}

If you want to know if an animation is currently running on a control you can use the `LibManialink_IsAnimated()` function. To use it you have to make another injection at the beginning of your manialink :
{% highlight js %}
<script><!--
{{{Manialink::Includes(["TextLib" => "TL", "MathLib" => "ML"])}}}
{{{Manialink::Animations(["EaseInOutElastic", "EaseOutBounce", "EaseInOutExp", "EaseOutBack", "EaseOutElastic"])}}}
{{{Manialink::Functions(["AnimRepeat", "IsAnimated"])}}}

main() {
  ...
}
--></script>
{% endhighlight %}

There's two versions of the function, the first one take a CMlControl as argument while the second one take a Text, the ControlId of the control. Both return a Boolean : True if an animation is running, False otherwise.
{% highlight js %} 
Boolean LibManialink_IsAnimated(CMlControl _Control)

@param  _Control   The control to test
{% endhighlight %}
{% highlight js %} 
Boolean LibManialink_IsAnimated(Text _ControlId)

@param  _ControlId   The ControlId of the control to test
{% endhighlight %}

Not all properties can be animated, this is the list of the available ones.
CMlControl :
- Position
- Size
- Scale
- Rotation

CMlQuad :
- Opacity
- Colorize
- BgColor

CMlLabel :
- Opacity
- TextColor

CMlGauge :
- Ratio
- Color

## Tooltips

The tooltips module allow to display a contextual help. In the next example we will display a small help text when the mouse is over a quad.
{% highlight js %} 
<quad sizen="15 15" halign="center" valign="center" bgcolor="047" scriptevents="1" id="Quad_Tooltip" />
{{{Manialink::Tooltip("Help")}}}

<script><!--
{{{Manialink::Functions(["Tooltip"])}}}

main() {
  while (True) {
    yield;
    
    foreach (Event in PendingEvents) {
      if (Event.Type == CMlEvent::Type::MouseOver) {
        if (Event.ControlId == "Quad_Tooltip") {
          LibManialink_TooltipShow("Help", Event.Control, "This is a small help text");
        }
      } else if (Event.Type == CMlEvent::Type::MouseOut) {
        if (Event.ControlId == "Quad_Tooltip") {
          LibManialink_TooltipHide("Help");
        }
      }
    }
  }
}
--></script>
{% endhighlight %}

First you must include the tooltip function in your script.
{% highlight js %} 
{{{Manialink::Functions(["Tooltip"])}}}
{% endhighlight %}
Then you have to create a tooltip frame in the manialink. You can use the `Tooltip()` function to create a simple one :
{% highlight js %} 
{{{Manialink::Tooltip("Help")}}}
{% endhighlight %}
With this you'll create a default frame with one line of text of 50 by 6 pixels. The function argument is the id of the tooltip. You can customize it a little more with the overloaded version of the function :
{% highlight js %} 
{{{Manialink::Tooltip("Help", <100., 20.>, 4)}}}
{% endhighlight %}
The first argument is still the id of the tooltip. The second one the size and the last the number of text lines displayed in the tooltip.
You could also create manually your own tooltip frame :
{% highlight xml %} 
<frame hidden="1" id="Tooltip_MyId">
  <label posn="0 0 1" sizen="100 50" halign="center" valign="center2" autonewline="1" maxline="8" id="Label_Tooltip" />
  <quad sizen="100 50" halign="center" valign="center" bgcolor="000d" id="Quad_Tooltip" />
</frame>
{% endhighlight %}
The tooltip frame must have an id beginning with the "Tooltip_" prefix. Then inside the frame there are two elements:
* A label to display the tooltip text with the id "Label_Tooltip".
* A quad used as a background with the id "Quad_Tooltip".
Other than that you can display what you want in your tooltip. You can have any number of tooltip frames in the manialink as loing as they ave a different id. So you can create different styles to fit your needs.

The tooltip manialink frame must always be placed at the root level of your manialink because the library use the absolute coordinates set the position of the frame.

Once you have your tootltip frame in your manialink you can display it from your script.
{% highlight xml %} 
foreach (Event in PendingEvents) {
  if (Event.Type == CMlEvent::Type::MouseOver) {
    if (Event.ControlId == "Quad_Tooltip") {
      LibManialink_TooltipShow("Help", Event.Control, "This is a small help text");
    }
  } else if (Event.Type == CMlEvent::Type::MouseOut) {
    if (Event.ControlId == "Quad_Tooltip") {
      LibManialink_TooltipHide("Help");
    }
  }
}
{% endhighlight %}

There are two functions, `LibManialink_TooltipShow()` to display the tooltip and `LibManialink_TooltipHide()` to hide it. 

`LibManialink_TooltipShow()` take three parameters :
* The id of the tooltip to show
* The control next to which the tooltip will be positioned
* The text to display in the tooltip
There's also on overloaded version of the function that will display the tooltip below the mouse cursor instead of below a specific control :
{% highlight xml %} 
LibManialink_TooltipShow("Help", 2., "This is a small help text");
{% endhighlight %}
The second parameter is the z position of the tooltip.

`LibManialink_TooltipHide()` take one parameter :
* The id of the tooltip to hide



Le tooltip prend l'alignement et le z-index de l'élément avec la classe LibManialink_TooltipShow