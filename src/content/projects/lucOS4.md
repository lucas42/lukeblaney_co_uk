---
type: project
title: lucOS (Version 4)
summary: A collection of personal projects used for my day-to-day use.
projects/lang: ["Java", "Javascript", "Erlang", "PHP", "Python", "Golang", "Clojure", "Ruby"]
technologies: ["Docker", "nginx", "SQLite", "PostgreSQL", "node.js", "HTML5", "Web Components"]
me: All of it.
weight: 5
years: 2019 Onwards
tags: ["tech"]
---

{{< figure src="/img/projects/lucOS4.png" alt="A screenshot of the lucOS homepage" caption="A screenshot of the lucOS homepage" class="right smaller" >}}

The fourth iteration of my set of personal computing projects, lucOS.

The main distinction between this version from previous ones is the use of containers.  Each project is deployed using docker compose.  I've also written a number of central infrastructure services to support the other apps.  This includes monitoring, DNS, routing & TLS management, logging & asynchronous messaging, authentication, build & deploy jobs, backups and credential handling.

Version 4 also makes use of Web Components.  This allows for more modular approach to frontend design.  It's also used to easily share frontend components across all projects to acheive design consistency.  Primarily the header bar which runs across every page.

## Notable features

### Media Player
A way to play tracks from my music collection wherever I am in the world, without being subject to the whims (and shifting licensing agreements) of a third-party streaming platform.

New tracks added to my collection are automatically scanned for metadata and unique acoustic fingerprint, then added to a central database.  From here, metadata can be manually edited, both on a track-by-track basis or through bulk edits.  Then a weighting is algorithmically determined for each track, based on its metadata.  This allows for Christmas music to play more frequently in December, or podcasts to never play without being deliberately chosen.  Tracks are selected for queuing at random, based on these weightings.  Depending on what mode the player is in, this selection either happens from across the whole music collection, or from a pre-selected subset.

Playback of music either happens on a player deployed to various raspberry pis around my home, or via a web app which can run on desktop or mobile.  Playback can be seemlessly switched between any instances of the a player currently online.  In addition to this, the web app version downloads queued tracks and can continue to play through them offline.

### Notes
A progressive web app which stores todo lists and various other notes.

State is kept in sync across all instances of the app using web sockets.  Service Workers are used to allow it to continue to work offline.

### Contacts
A django app with postgreSQL database to store contacts.

The app can store familial relationships and does automatic deduction to figure out additonal inferred relationships based on the data it has.  Using this feature, my contact list also doubles as a handy family tree.

There are multiple integrations with other data sources, which give additional functionality. For example: syncing phone numbers with my phone, birthdays appearing in my calendar.

### Scenes
An API written in Clojure which forms the basis of my attempts at home automation.

So far the only inputs are some physical buttons located around my home, and the only output is lucOS Media Player.  But the aim is for it to be easily extensible in future.

The logic in it is time dependant.  For example, if a button next to my bed is pressed at night, some sleepy music is played quietly in my bed.  But if the same button is pressed in the moring, wakey-up music is played at a slightly louder level.