---
slug: bedlam
type: project
title: Bedlam Theatre Website
summary: I was webmaster of the Edinburgh University Theatre Company in my last year of University.
projects/lang: ["PHP", "Javascript"]
technologies: ["Linked Data", "RDF", "mySQL", "BBC Glow", "HTML5"]
homepage: "http://www.bedlamtheatre.co.uk"
me: I kept the existing style and bits of the content, but completely rewrote the backend.
weight: 21
years: 2009-2010
rdfurl: /projects/bedlam.rdf
---


{{< figure src="/img/projects/bedlam" alt="The exterior of Bedlam Theatre" caption="Bedlam Theatre" class="left" >}}

I was webmaster of the Edinburgh University Theatre Company in my last year of University. I redesigned the website using a linked data approach and created alternate RDF views where applicable. I also added a login system to allow members of the Company to edit relevant parts of the site and which allowed various admin tasks to be done online.

{{< figure src="/img/projects/theaont" alt="Theatre Ontology" caption="A diagram of the [Theatre Ontology](http://purl.org/theatre)." class="right" >}}

Domain Driven Design
--------------------

I was unable to find an existing Ontology for theatre, so went about designing my own. There are several approaches to modelling theatre data, one of the simplest being a number of performances linked to one show. However, I wanted a system which would be able to handle the same show being produced multiple times sometimes decades apart. For this I needed to distinguish between shows and productions.

It was important to be able to give a list of people involved in each project. [FOAF](http://xmlns.com/foaf/spec/) has the properties _currentProject_ and _pastProject_, however these were unsuitable for a number of reasons, the main one being that they didn't provide a way of indicating what the person did. Instead I used the concept of roles. Each role consists of an agent, project and position; for acting roles the position is the portrayal of a character. Characters are themselves agents, which allows for people like Shakespeare who is the writer of many shows, but is also a character in others.

{{< figure src="/img/projects/shakespeare" alt="A page on William Shakespeare" caption="A page about [William Shakespeare](http://www.bedlamtheatre.co.uk/people/79)." class="left" >}}

The web as a CMS
----------------

There is a lot of information already on the web about theatre. Wikipedia has information about many well-known plays and their writers. Also, many of the EUTC's alumni have gone on to become notable enough to have their own Wikipedia articles. Some alumni have also appeared on various BBC programmes. Rather than recreating all this information, I have incorporated existing information into the site. An example of this is the page on [Shakespeare](http://www.bedlamtheatre.co.uk/people/79). His picture was found using DBpedia. The information about him comes from Wikipedia. And at the bottom of the page there is are some BBC programmes taken from [bbc.co.uk/programmes/people](http://www.bbc.co.uk/programmes/people).

There's no such thing as the archive
------------------------------------

The previous system was quite disjointed. New productions were proposed on paper. Some of the larger productions had a webpage which was live until their run finished. There was an online archive hosted by our alumni organisation, but it often took about a year for shows to be added to it. Each of these things were completely separate and maintained by different people.

To create some sort of consistency, I implemented online proposals. Now, as soon as a proposal is marked as successful, it is given a permanent web presence. Each production has a URL which stays the same before, during and after its run. Basic information is taken from the proposal form, which can then be edited and added to by members of the production team.

Automated Permissions
---------------------

It is often difficult to manage large numbers of permissions manually. Things can get overlooked when circumstances change and the system can be open to abuse by whoever sets the permissions. Rather than granting permissions to particular people, I decided permissions should be set based on positions. So, for example, a producer has permission to edit their productions or the productions manager of a season can edit all productions in that season. These positions are those which appear on the credits list on the website. So by adding someone as a director, you are also giving them permission to edit that production.

To prevent any abuse, I made sure that the part of the system which grants permissions doesn't have information about who is signed in, only their positions and projects. This meant that whenever anyone asked me to make an exception "just this once" I was able to honestly tell them that the system wouldn't let me.

Links
-----

Relevant bits and pieces from around the web:

*   [The Programmes Ontology](http://purl.org/ontology/po/) - the BBC
*   [The web as a CMS](http://derivadow.com/2009/01/13/the-web-as-a-cms/) - Tom Scott
*   [There’s no such thing as the archive](http://jonathan.tweed.name/2008/12/30/theres_no_such_thing_as_the_archive/) - Jonathan Tweed