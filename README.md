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

Please see [the wiki][1] for more information and/or documentation. 

## Installation ##

Add the following to your `deps` file:

    [XaavQueueBundle]
        git=git://github.com/xaav/XaavQueueBundle.git
        target=/bundles/Xaav/QueueBundle

Run the vendors script:

    php bin/vendors install
    
Please see [here][5] for a more detailed guide.

## Contributing ##

The following contributions are welcome:

- Pull Requests
    - Adding adapters
    - Adding ways to empty the queue
- Reporting Issues
    - Reporting of bugs/crashes
    - Suggesting new features
- Improvement of Wiki Pages

If this bundle has been useful to you, please consider making one or more of the above contributions. 

## License ##

This work is released into the public domain and is also availiable under the [xaavnetwork openlicense][4].

[1]: https://github.com/xaav/XaavQueueBundle/wiki 
[2]: http://en.wikipedia.org/wiki/Job_queue
[4]: http://xaav.tk/OpenLicense
[5]: https://github.com/xaav/XaavQueueBundle/wiki/Installation