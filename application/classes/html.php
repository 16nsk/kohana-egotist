<?php defined('SYSPATH') or die('No direct script access');

/**
 * Extending the HTML helper class
 */

class HTML extends Kohana_HTML {
	
	/**
	 * Format a message in a div with spans for author and fuzzy time
	 * 
	 * @param string The content of the message
	 * @param string The author of the message
	 * @param int The timestamp the message was published
	 * @return string
	 * @uses HTML::chars
	 * @uses Date::fuzzy_span
	 */
	public static function message($content, $author, $timestamp)
	{
	
		$formatted = '<div class="message">';
		$formatted .= self::chars($content);
		$formatted .= '<span class="author">' . self::chars($author) . '</span>';
		$formatted .= '</div>';
		
		return $formatted;
		
	}
}
