<?php

use Acme\Jobs\PostJobListingCommand;
use Acme\Jobs\JobFilledCommand;

class JobsController extends BaseController {

	public function store()
	{
		$input = Input::only('title', 'description');

		$command = new PostJobListingCommand($input['title'], $input['description']);
	
		$this->commandBus->execute($command);
	}


	/**
	*
	*Set job as filled
	*
	*/

	public function delete($jobId)
	{


		$command = new JobFilledCommand($jobId);

		$this->commandBus->execute($command);
	}




	public function tinker()
	{
		$test = Acme\Jobs\Job::first()->toArray();

		print_r($test);

		die();
	}
}