<?php

/**
 * @deprecated since version 2.0
 *
 * @property int $ParentID
 * @property string $Date
 * @property string $PublishDate
 * @property string $Tags
 */
class BlogEntry extends BlogPost {
	/**
	 * @var string
	 */
	private static $hide_ancestor = 'BlogEntry';

	/**
	 * @var array
	 */
	private static $db = array(
		'Date' => 'SS_Datetime',
		'Author' => 'Text',
		'Tags' => 'Text',
	);

	/**
	 * {@inheritdoc}
	 */
	public function canCreate($member = null) {
		return false;
	}

	/**
	 * Safely split and parse all distinct tags assigned to this BlogEntry.
	 *
	 * @deprecated since version 2.0
	 *
	 * @return array
	 */
	public function TagNames() {
		$tags = preg_split('/\s*,\s*/', trim($this->Tags));

		$results = array();

		foreach($tags as $tag) {
			if($tag) $results[mb_strtolower($tag)] = $tag;
		}

		return $results;
	}
}

/**
 * @deprecated since version 2.0
 */
class BlogEntry_Controller extends BlogPost_Controller {

}
