---
type: project
title: Progs
summary: A programme which tracks which TV and Radio programmes I've listened to/watched and lets me know what episode comes next.
projects/lang: ["Bash", "Java", "PHP"]
technologies: ["mySQL"]
me: All of it.
weight: 16
defaultthumb: true
years: 2006-2011
tags: ["tech"]
---
{{< figure src="/img/projects/progs" alt="A screenshot of progs" class="right" >}}

Bash script
-----------

It started as a bash script. It would take a directory of media files and use a hidden file to store the name of the latest episode I'd watched. It relied on the path names to decide what order I should watch them in.

Java
----

I later wrote a simple Java web server to give the script a web interface. I also removed the hidden files from each folder and replaced them with a centralised list of all the episodes that I had watched. This allowed the system to be multi-user.

PHP
---

Recently I rewrote the whole thing in PHP as part of my [lucOS](/projects/lucOS) project. I used a mySQL database instead of a text file to store which episodes I had seen.

BBC Programmes
--------------

As part of the Java system, BBC programme IDs were detected so that the web interface could use the BBC's iPlayer pictures and descriptions. However, episodes were still ordered alphabetically based on these pids. This method was unexpectedly accurate for most programmes, although there were a couple of programmes where this didn't work correctly.

In the PHP version of the system, rdf files for BBC programmes are looked up. For many programmes, this includes the order of episodes. For programmes which don't list the order, the system bases the order on episode titles. For episodes whose title are a date, the system parses this date, for other programmes, they are sorted alphabetically.