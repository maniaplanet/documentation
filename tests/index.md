---
layout: static
title: Jekyll tests test
description: Nothing good here
---

<ul>
{% for p in site.pages %}
{% if p.path == page.path %}
<li> {{ p.title }} :: {{ p.description }}
</li>
{% endif %}
{% endfor %} <!-- page -->
</ul>