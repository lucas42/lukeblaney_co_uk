---
type: project
title: Transport For Luke
summary: A web app for tracking transport, mainly in London
projects/lang: ["Ruby", "Javascript"]
technologies: ["nodejs", "Service Workers"]
homepage: "https://app.tfluke.uk"
me: All of it
weight: 6
years: 2012 Onwards
tags: ["tech"]
---



{{< figure src="/img/projects/tfluke1.png" alt="A screenshot listing departure times of various trains at Barons Court Underground Station" caption="Station Departure Boards" class="smaller right" >}}

A web app, with offline capabilites, used for tracking various modes of transport, primarily in London.

The site displays a real-time departure board for each platform in a given station.  Clicking on a given departure, then shows a view of that given train (or other vehicle) and its upcoming stops.  This vehicle view's design is roughly based on TFL's line diagram standard.  Both views can also be accompanied by live announcements.

{{< figure src="/img/projects/tfluke2.png" alt="A screenshot showing the upcoming stations for a Juiblee line train" caption="Vehicle View" class="smaller left" >}}

Originally the project was written with a ruby backend and utilised app-cache.  Was rewritten gradually from 2015-17 to switch to nodejs and service worker.  The real-time data has come from various APIs over the years, including TrackerNet and TFL's unified API.  This has been augmented by additional data I've collated myself, for example, station interchanges and Thames Clipper boat names and colours.