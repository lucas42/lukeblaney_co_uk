---
type: project
title: lucOS
summary: A personal project which attempts to make a web-based operating system
projects/lang: ["Javascript", "PHP"]
technologies: ["mySQL", "AJAX"]
me: All of it.
weight: 17
years: 2007-2011
tags: ["tech"]
rdfurl: /projects/lucOS.rdf
---
{{< figure src="/img/afss5" alt="lucOS" caption="A screenshot of lucOS" class="left smaller" >}}

lucOS is a custom web application built in javascript utilising HTML5 and CSS3 technologies. My ultimate aim of this project is to create a system which will cater for all my day-to-day computing needs but can be accessed from anywhere. In a world of cloud computing, this is my attempt to create my own personalised cloud.

lucOS consists of many different modules. Each module can import dependencies and check which other modules have been imported. This allows modules to run independently, but also to integrate with each other when they are run together.

[Social Updates](/projects/allfeeds)
------------------------------------

On loading lucOs, the most obvious module is [allfeeds](/projects/allfeeds), which combines status updates from a variety of sources and displays them in a way that makes sense to me.

Audio Player
------------

lucOS has a built-in audio player which uses HTML5 audio elements. It has basic playlist features, including queuing up individual tracks, loading m3u playlists, loading all the tracks in a given folder (recursively) and shuffling the playlist. It stores a copy of the current playlist in a mySQL table so that it can be resumed the next time lucOS is loaded.

[Programmes](/projects/progs)
-----------------------------

lucOS keeps track of all the programmes I watch and makes it easy for me to work out what to watch next. It also remembers which BBC programmes my friends have mentioned in status updates, through links, hashtags or just mentioning the programme id.

Making it Open-Source?
----------------------

I have occasionally considered making lucOS available to others open source, however its probably been a bit too customised for me to be any use to anyone else in its current form. One example of this is that the system is bilingual: some words are in English, others are in Irish.