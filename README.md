# A Job Queue Bundle for Symfony2 #

A job queue is a system software data structure maintained by job scheduler software.

Users submit their programs that they want executed, "jobs", to the queue for batch processing. The scheduler software maintains the queue as the pool of jobs available for it to run.

Multiple batch queues might be used by the scheduler to differentiate types of jobs depending on parameters such as:

* job priority
* estimated execution time
* resource requirements

The use of a batch queue gives these benefits:

* sharing of computer resources among many users
* time-shifts job processing to when the computer is less busy
* avoids idling the compute resources without minute-by-minute human supervision
* allows around-the-clock high utilization of expensive computing resources

## Installation ##

Add the following to your `deps` file:

    [XaavQueueBundle]
        git=git://github.com/xaav/XaavQueueBundle.git
        target=/bundles/Xaav/QueueBundle

Run the vendors script:

    php bin/vendors install

## Contributing ##

If you believe this bundle helped you in some way, please send a pull request, as right now I am the only one maintaining 
this bundle. If you aren't sure what to do, just look at some of the [issues][3], and fix the ones you can. If we all 
contribute something to this, we might get a decent Job Queue Bundle for everyone!

## License ##

This work is released into the public domain.

**See [The wiki][1] for more details**

[1]: https://github.com/xaav/XaavQueueBundle/wiki 
[2]: http://en.wikipedia.org/wiki/Job_queue
[3]: https://github.com/xaav/XaavQueueBundle/issues
[4]: http://xaav.tk/openlicense