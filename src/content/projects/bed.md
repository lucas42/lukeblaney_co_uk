---
type: project
title: Lights & Audio Bed
summary: A bed with built-in audio and lighting
me: I added lighting and audio to an existing bed.
weight: 2
years: 2023
tags: ["diy"]
---

{{< figure src="/img/projects/bed-chisel" alt="A hammer and chisel being used to cut a circle in the base of a bed" class="left smaller" >}}

I decided to jazz up my bed with some lighting and audio.  The bed itself is an oak-veneer Ikea Malm flat-pack bed.

{{< figure src="/img/projects/bed-backboard" alt="Various electronics attached to the back of a bed's headboard" class="right smaller" >}}
## Lights

I attached two LED strips to the back of the bed's headboard.  This lights up the wall behind the bed.  A colour-wheel on the side of the bed lets me choose the specific colour (normally I aim to match the colour to whichever bed linen I have on it at the time).

## Audio

I've also stuck a pair of Dayton Audio sound excitiers to the headboard.  These turn the backboard itself into a speaker without adding any visible bulk to the bed.  Using 2 of them allows for stereo sound to be played.

{{< figure src="/img/projects/bed-subwoofer" alt="A bass shaker emebbed in the base of the bed" class="left smaller" >}}
In the base of the bed, I chisseld a hole to make space for a bass shaker.  This acts like a subwoofer by transmitting low-frequency vibrations into the frame of the bed itself.

All these audio output are then plugged into a small amplifier, which itself connects to a raspberry pi.  The amp and pi are housed in a homemade wooden box which sits neatly under the bedside table.  The raspberry pi runs [lucOS Media Player](/projects/lucOS4#media-player), allowing the bed to play any music from my media collection.  A small flic.io button is on the edge of the bedside table.  This button is configured to start the bed playing some time-appropirate music (eg if pressed at night, it plays soothing music to fall asleep to).

{{< figure src="/img/projects/bed-purple" alt="The bed with a purple duvet and pillows, basked in purple light" class="left" >}}