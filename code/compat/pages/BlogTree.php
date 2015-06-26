<?php

/**
 * @deprecated since version 2.0
 */
class BlogTree extends Page {
	/**
	 * @var string
	 */
	private static $hide_ancestor = 'BlogTree';

	/**
	 * @var array
	 */
	private static $db = array(
		'Name' => 'Varchar(255)',
		'LandingPageFreshness' => 'Varchar',
	);

	/**
	 * {@inheritdoc}
	 */
	public function canCreate($member = null) {
		return false;
	}
}

/**
 * @deprecated since version 2.0
 */
class BlogTree_Controller extends Page_Controller {

}
