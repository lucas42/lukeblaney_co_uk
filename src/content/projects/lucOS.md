---
type: project
title: lucOS (Version 1)
summary: A collection of web based modules for personal day-to-day use.
projects/lang: ["Javascript", "PHP"]
technologies: ["mySQL", "AJAX"]
me: All of it.
weight: 17
years: 2007-2011
tags: ["tech"]
---
{{< figure src="/img/afss5" alt="lucOS" caption="A screenshot of lucOS" class="left smaller" >}}

Version 1 of lucOS began in my spare time when I was at university.  My ultimate aim of this project is to create a system which will cater for all my day-to-day computing needs but can be accessed from anywhere.

The front-end was a single-page application built in javascript utilising HTML5 and CSS3 (both of which were emerging technologies at the time). The backend was written in PHP running on a LAMP stack.  Though as a student without much disposable income, I ran both the backend and client side code on the same home-built desktop computer in bedroom.

## Modules

lucOS consists of many different modules. Each module can import dependencies and check which other modules have been imported. This allows modules to run independently, but also to integrate with each other when they are run together.

### [Social Updates](/projects/allfeeds)


The most visible module of lucOS 1 was [allfeeds](/projects/allfeeds), which combined status updates from a variety of sources and displayed them in a way that makes sense to me.

### Audio Player


A built-in audio player which used HTML5 audio elements. It had basic playlist features, including queuing up individual tracks, loading m3u playlists, loading all the tracks in a given folder (recursively) and shuffling the playlist. It storeed a copy of the current playlist in a mySQL table so that it could be resumed the next time lucOS was loaded.

### [Programmes](/projects/progs)


lucOS kept track of all the programmes I was watching and made it easy for me to work out what to watch next. It also remembered which BBC programmes my friends have mentioned in status updates, through links, hashtags or just mentioning the programme id.

### Todo list

There was also a rudimentary todo list.  Tasks were added in a tree structure to model dependencies.  The root node of the tree was the idealised concept of a perfect life - the idea being that if all the tasks in tree were completely, everything would be perfect.

## Successor

lucOS version 1 was succeed by [version 2](/projects/lucOS2), which broke apart each of the modules (which had been served as a monolith), into individual applications.