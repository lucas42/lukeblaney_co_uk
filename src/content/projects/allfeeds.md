---
type: project
title: All feeds [working title]
summary: Gets updates from various sources and formats them.
projects/lang: ["Javascript", "PHP"]
technologies: ["mySQL", "AJAX"]
me: All of it.
weight: 15
years: 2007-2011
tags: ["tech"]
rdfurl: /projects/allfeeds.rdf
---
{{< figure src="/img/afss5" alt="allfeeds" caption="A screenshot of allfeeds" class="left smaller" >}}

Allfeeds is part of my [lucOS](/projects/lucOS) project. It combines status updates from a variety of sources and displays them in a way that makes sense to me.

Getting Updates
---------------

Status updates are taken from Twitter, Facebook, RSS feeds, BBC blog comments and Audioboo and stored in a mySQL database.
These updates are then parsed to find links, hashtags, BBC programme Ids, postcodes, ISBNs, emoticons, chemical symbols and references to other users.
When found, these are replaced by appropriate media (eg pictures, videos etc.)
A javascript client then uses ajax to fetch these updates from the database.

{{< figure src="/img/afss15" alt="BBC Radio 4's profile" caption="BBC Radio 4's profile" class="right smaller" >}}


Organising Agents
-----------------

Some people use mulitple social networks, some even have multiple accounts on the same network, so its important to differentiate between Agents and Personas. Each agent can have mulitple personas (each of which is linked to an account). Agents can also be part of groups, which are themselves agents. For example, BBC Radio 4 is an agent. It has two personas: their twitter account and their blog. It is part of the BBC group, but is also a group itself.

Styling Updates
---------------

Updates are styled based on the agent who sent them. Agents can be assigned values for their background, main text colour, border/links colour and border radius. Agents inherit style from any groups they are in, though their own style can override this.

Formatting Links
----------------

One of the most useful features of allfeeds is that it imports relevant media and information from other websites. For example, if someone includes a link to an img hosting service, then I use the API to automatically get the relevant picture and title/caption and embed it in the tweet. For sites without an API, then I resort to screen scrapping.
For video sites, the relevant video is embedded in the update using the HTML5 video tag. Using HTML5 has many benefits: I don't need any plugins installed. I can use javascript event listeners to pause and resume any music I have playing in the built-in audio player when the video plays / finishes. I can use CSS3 transforms to rotate the video if its the wrong way up (or just for fun). I can easily adjust the volume for the video using the same control as for my audio player.
For audio sites (such as audioboo) I can either interrupt what's playing in my audio player, or queue it up to play as part of the current playlist.
Links to BBC programmes or iplayer are replaced with the relevant thumbnail and if a copy of the programme is found on my harddrive, then the option to play is given. I also create a list of programmes mentioned so I can see what is the most popular.

{{< figure src="/img/afss10" alt="RDF example" caption="Displaying info taken from RDF" class="left smaller" >}}

When looking up links, allfeeds sends a preference for RDF using conneg. If RDF is returned, then it is parsed to look for suitable information to embed in the update.

However, it's not just links that are formatted. Common marks used for **\*emphasis\*** are styled appropriately. Common emoticons are embeded. Subscripts and superscripts are inserted in places such as H{{< sub "2" >}}O, 2{{< sup "nd" >}} and E=mc{{< sup "2" >}}. Numbers labeled as ISBNs are replaced by a picture of a book (created by combining the cover from amazon and the bulk of the book from a picture of my own). Hashtags in twitter and audiobook updates are linked to the search result for that hashtag. I also use fanhubz's SPARQL endpoint to check if a hashtag corresponds to a BBC programme, in which case I treat it as such. I do the same for any strings that are clearly BBC programme IDs. I also link common RDF namespace identifiers to their URLs, and link shorthands used often by people I follow (e.g. "/progs").