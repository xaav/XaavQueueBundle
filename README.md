# JobQueue for Symfony2 #

A Job Queue lets you avoid doing resource intensive operations while
serving a page request. The philosophy of a Job Queue is this: if 
you do not need to do something while serving a page, then do not. 
Instead, put it in a Job Queue for it to be done later. This improves
the speed of your site overall, and improves user experience.

**See [The wiki][1] for more details**



[1]: https://github.com/xaav/QueueBundle/wiki 