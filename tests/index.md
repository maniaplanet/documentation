---
layout: static
title: Jekyll tests test
description: Nothing good here
---

<ul>
{% for p in site.pages %}
{% assign currentPathArray = page.url | split:"/" %}
{% assign pPathArray = p.url | split:"/" %}
{% if (currentPathArray[0] == pPathArray[0]) %}
	<li> 
		{{ p.title }} :: {{ p.description }} :: {{ p.url | split:"/" }}
	</li>
{% endif %}
{% endfor %} <!-- page -->
</ul>