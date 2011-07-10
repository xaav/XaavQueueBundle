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


**See [The wiki][1] for more details**

[1]: https://github.com/xaav/QueueBundle/wiki 
[2]: http://en.wikipedia.org/wiki/Job_queue