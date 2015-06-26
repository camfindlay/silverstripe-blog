<?php

class BlogMigrationTask extends MigrationTask {

	/**
	 * {@inheritdoc}
	 */
	public function up() {
		//Migrate BlogHolder
		/*$blogHolders = BlogHolder::get();
		foreach($blogHolders as $blogHolder){
			if($blogHolder->ClassName === 'BlogHolder') {
				$blogHolder->ClassName = 'Blog';
				$blogHolder->RecordClassName = 'Blog';
				$blogHolder->writeWithoutVersion();
			}
			if($blogHolder->IsPublished()){
				$blogHolder->publish('Stage','Live');
				$this->message("PUBLISHED: " . $blogHolder->Title);	
			} else {
				$this->message("DRAFT: " . $blogHolder->Title . "<br/>");	
			}
		}*/

		//Migrate BlogEntry
		$blogEntries = SiteTree::get()->filter('ClassName', 'BlogEntry');
		foreach($blogEntries as $blogEntry){	
			$blogEntry->PublishDate = $blogEntry->Date;
			$blogEntry->AuthorNames = $blogEntry->Author;
			$blogEntry->write();
			
			if($blogEntry->ClassName === 'BlogEntry') {
				$blogEntry->ClassName = 'BlogPost';
				$blogEntry->RecordClassName = 'BlogPost';
			}
			$blogEntry->write();
			if($blogEntry->IsPublished()){
				$blogEntry->publish('Stage','Live');
				$this->message("PUBLISHED: " . $blogEntry->Title  . "<br/>");	
			} else {
				$this->message("DRAFT: " . $blogEntry->Title . "<br/>");	
			}
				
	
		}
	
	}

	/**
	 * @param string $text
	 */
	protected function message($text) {
		if(Controller::curr() instanceof DatabaseAdmin) {
			DB::alteration_message($text, 'obsolete');
		} else {
			echo $text;
		}
	}
}
