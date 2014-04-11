---
layout: static
title: Jekyll tests
description: Nothing good here
---

<ul>
{% for page in site.pages %}
<li> {{ page.title }} :: {{ page.categories | first }}
</li>
{% endfor %} <!-- page -->
</ul>