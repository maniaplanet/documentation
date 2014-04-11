---
layout: static
title: Jekyll tests
description: Nothing good here
---

<ul>
{% for page in site.pages %}
<li> {{ page.page }} :: {{ page.categories | join:',' }}
</li>
{% endfor % } <!-- page -->
</ul>