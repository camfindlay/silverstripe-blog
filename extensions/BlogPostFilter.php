<?php

class BlogPostFilter extends DataExtension {

	/**
	 * Augment queries so that we don't fetch unpublished articles.
	**/
	public function augmentSQL(SQLQuery &$query) {

		$stage = Versioned::current_stage();
		if($stage == "Stage") $stage = "";
		else $stage = "_" . Convert::raw2sql($stage);

		$query->addWhere("PublishDate < NOW()");

	}

}