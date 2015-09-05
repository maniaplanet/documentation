---
layout: default
title: ManiaScript Refcard
description: ManiaScript Quick Reference Card
tags:
- creation
- maniascript
---

If you are already used to programming, this should be useful.

ManiaScript Types
=====

Language primary types are:

<table>
<tr><td>Boolean</td></tr>
<tr><td>Text</td></tr>
<tr><td>Integer</td></tr>
<tr><td>Real</td></tr>
<tr><td>Vec2</td></tr>
<tr><td>Vec3</td></tr>
<tr><td>Int3</td></tr>
<tr><td>Ident</td></tr>
</tr>
</table>

The other types, known as Classes, are composite types whose name start with a 'C'. CSmPlayer, CMlLabel, etc...

ManiaScript Values
=====

Language constant values are :

<table>
<tr><td>Type</td><td>Values</td></tr>
<tr><td>Boolean</td><td>True, False</td></tr>
<tr><td>Text</td><td>Everything like "XXX" or """XXX"""</td></tr>
<tr><td>Integer</td><td>Everything like 123789</td></tr>
<tr><td>Real</td><td>Everything like 123789. or .12312</td></tr>
<tr><td>Vec2</td><td> &lt; Real1, Real2 &gt; </td></tr>
<tr><td>Vec3</td><td> &lt; Real1, Real2, Real3 &gt; </td></tr>
<tr><td>Int3</td><td> &lt; Integer1, Integer2, Integer3 &gt; </td></tr>
<tr><td>Ident</td><td> NullId </td></tr>
<tr><td>Class</td><td> Null </td></tr>
</tr>
</table>

You can not create your own Ident or Class values, however many API functions return such values, and you can store them or use them like other ManiaScript variables

See more [here...](./values.html)

Operators
=====

Mathematical operators:
<table>
<tr>
<td>+</td><td>add value</td>
</tr>
<tr>
<td>-</td><td>substract value</td>
</tr>
<tr>
<td>*</td><td>multiply value</td>
</tr>
<tr>
<td>/</td><td>divide value</td>
</tr>
<tr>
<td>%</td><td>remainder of value divison</td>
</tr>
</table>

Boolean operators:
<table>
<tr><td>!</td><td>boolean "not", this will negate the boolean expression</td></tr>
<tr><td>&&</td><td> boolean "and"</td></tr>
<tr><td>||</td><td>boolean "or"</td></tr>
</tr>
</table>

Comparison operators:
<table>
<tr><td>==</td><td>equals</td></tr>
<tr><td>!=  </td><td>not equals</td></tr>
<tr><td>&lt;   </td><td> less than</td></tr>
<tr><td>&gt;   </td><td>greater than</td></tr>
<tr><td>&lt;=  </td><td>less or equal than</td></tr>
<tr><td>&gt;=   </td><td>greater or equal than</td></tr>
<table>

Incremention operators:
<table>
<tr><td>+=</td><td>add value to current</td></tr>
<tr><td>-=</td><td>substract value from current </td></tr>
<tr><td>*=</td><td>multiply current value</td></tr>
<tr><td>/=</td><td>divide current value</td></tr>
<table>
