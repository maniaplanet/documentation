---
layout: static
title: Jekyll tests test
description: Nothing good here
---

<ul>
{% assign currentPathArray = page.url | split:"/" %}
{% for p in site.pages %}
{% assign pPathArray = p.url | split:"/" %}
{% if (currentPathArray[0] == pPathArray[0]) %}
	<li> 
		{{ p.title }} :: {{ p.description }} :: {{ currentPathArray[1] }} // {{ pPathArray[0] }}
	</li>
{% endif %}
{% endfor %} <!-- page -->
</ul>