---
type: project
title: Jalk
summary: A program which monitors who is logged into what computers and what they're up to.
projects/lang: ["Java", "Bash"]
technologies: ["SSH", "AJAX"]
me: All of it.
weight: 9
source: "/source/jalk.tar"
defaultthumb: true
years: 2007-2010
rdfurl: /projects/jalk.rdf
---

{{< figure src="/img/projects/computers" alt="A blurry composite photo of some computers" class="left" >}}

After spending quite a bit of time in the university computer labs, I discovered the joys of bash scripting, ssh and finger. By combining these utilities I was able to write a script which would list who was logged into various computers around the lab. My next step was to map computers' hostnames or ip addresses to their physical locations. Unfortunately I had to do this manually, but once it was done I was able to modify the script to output a html file which contained a basic map of the lab including who was logged onto each machine.

There were three main problems with this: To update the map, the script had to be re-run. The script logged into each machine in turn so was quite slow, meaning that it wouldn't scale well to cover multiple labs. One the script was finished, the browser needed to be refreshed to see the new map.

I solved these problems by creating a threaded java programme. This programme would use ssh to log into each computer and run a bash script. The bash script would save its results to the filesystem which was shared between all the machines. By using threads, it was possible for the script to be running on mulitple machines in parallel. The java programme also acted as web server, this enabled AJAX to be used to update the map asynchronously. It also meant that the system only needed to be running once and multiple users could access it rather than having to run their own copies of the script.

Another benefit of running the bash script on each machine in parallel was that the script itself could do more without having too much of an effect on the speed of the overall result. The script was able to find out everyone who was logged onto a machine (name and username), what programmes they were running and also some information about the machine itself.

I extended the map to cover all the lab computers in the department and added a search function making it easier to find which lab had people I knew in. I also added printers to the map with information about how many jobs were in each print queue.