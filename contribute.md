---
layout: page
title: Contribute to the Documentation
tags: help
---

Thank you if you want to contribute to this documentation!

We'll help you to do this step by step, it's not as complicated as it seems ;)

# Setting Up
First you need to create (or connect to) a GitHub account on their website: http://github.com

![GitHub creation page][1]

Once you have done this, you must go on the documentation repository, available [at this page][2], and fork it. A repository is where all the files are saved and share between all the users. If a change is done in the repository, the change will be done to all the users.

To know everything about what is a fork and how to do it, follow the guide from GitHub: https://help.github.com/articles/fork-a-repo

You can also follow the help pages for GitHub for Windows if you are using the graphical client version:

* https://help.github.com/articles/adding-repositories-with-github-for-windows
* https://help.github.com/articles/getting-started-with-github-for-windows

# Contribute to the Maniaplanet Documentation
There is few things to know if you want to contribute on this documentation.

First if you want to format the text (adding bold, italic, tables), please follow the Markdown article on GitHub help page: https://help.github.com/articles/github-flavored-markdown

Then there is few specifics on how write a page for the documentation.

If you create a new page, you must specify the layout, its title and its tags.

```md
---
layout: page
title: Contribute to the Documentation
tags: help
---
```

The differents layouts are:

* page: For a main category
* menu: For the index of a section of a main category (for example `ManiaScript` in `Creation` category).
* default: the common layout for standard page

And for the tags, it's divided in two parts. The first tag is to specify the main category (creation, client, dedicated, tools) and the second tag for the section (for example maniascript, title or xmlrpc). The tags are used to create the submenu in the sidebar, in that way it gives an easy access to the articles of the same section.

For example if i create an article in the maniascript section, the tags will be:

```md
---
layout: default
title: A new ManiaScript article
tags:
- creation
- maniascript
---
```

The order is important, thanks to sort them correctly when you create a new article!

# Bonus
If you want to facilitate the maintenance of the documentation, you can write the links like this in markdown:

```md
[my link][1]
```

At the end of the documentation, put this code to tell to which link you are refer to (without ""):

```md
"[1]: http//doc.maniaplanet.net"
```

In that way, all the links (for both images and website) will be listed at the end of the documentation, which will make it easier to change or to find in source files. This little trick apply only for embedded links (a text with a link), not for plain link like http://doc.maniaplanet.com.

Thanks a lot for your help!

[1]: ./img/gh_createAccount.png
[2]: https://github.com/maniaplanet/documentation
