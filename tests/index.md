---
layout: static
title: Jekyll tests test
description: Nothing good here
---

<ul>
{% assign currentPathArray = page.url | split:"/" %}
{% for p in site.pages %}
{% assign pPathArray = p.url | split:"/" %}
{% if (currentPathArray[1] == pPathArray[1]) %}
	<li> 
		{{ p.title }} :: {{ p.description }} 
	</li>
{% endif %}
{% endfor %} <!-- page -->
</ul>