---
layout: static
title: Jekyll tests test
description: Nothing good here
---

<ul>
{% for p in site.pages %}
<li> {{ p.title }} :: {{ p.description }} :: {{ p.path | join:',' }}
</li>
{% endfor %} <!-- page -->
</ul>