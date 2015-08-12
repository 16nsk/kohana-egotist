<?php defined('SYSPATH') or die('No direct script access');

/**
 * Message Model
 * Handles CRUD for User messages
 */
class Model_Message extends ORM {

    // Table name used by this model (not needed with ORM)
    // protected $_table = 'messages';

    /**
     * Adds a new message for a user
     *
     * @param $user_id
     * @param $message
     * @return Database
     * @throws Kohana_Exception
     */
    public function create($user_id, $content)
    {
//        $data = array('user_id', 'content', 'date_published');
//
//        return DB::insert($this->_table, $data)
//            ->values(array(
//                $user_id,
//                $content,
//                time())
//            )
//            ->execute();
		
		// Using ORM
		$this->clear();
		$this->user_id = $user_id;
		$this->content = $content;
		$this->date_published = time();
		return $this->save();
    }

    /**
     * Updates a message
     *
     * @param int $message_id
     * @param string $content
     * @return Database
     */
	public function update($message_id, $content)
	{
		$this->find($message_id);
		$this->content = $content;
		return $this->save();
	}
	// previous, before ORM
//    public function edit($message_id, $content)
//    {
//        return DB::update($this->_table)
//            ->set(array(
//                'content' => $content
//            ))
//            ->where('id', '=', $message_id)
//            ->execute();
//    }

	/**
	 * Get a certain message
	 * 
	 * @param int $message_id
	 * @return Database
	 */
//    public function get_message($message_id)
//    {
//        return DB::select()
//            ->from($this->_table)
//            ->where('id', '=', $message_id)
//            ->execute()
//            ->current();
//    }

    /**
     * Gets all messages
     *
     * @param int $limit
     * @param int $offset
     * @param int $user_id
     * @return array
     */
    public function get_all($limit = 10, $offset = 0, $user_id = null)
    {
//        $query = DB::select()
//            ->from($this->_table)
//            ->order_by('date_published', 'DESC')
//            ->limit($limit)
//            ->offset($offset);
//
//        if($user_id)
//        {
//            $query->where('user_id', '=', (int) $user_id);
//        }
//
//        return $query->as_assoc()->execute();
		
		// with ORM
		$this->order_by('date_published', 'DESC')
			->limit($limit)
			->offset($offset);
		if ($user_id)
		{
			$this->where('user_id', '=', $user_id);
		}
		return $this->find_all();
    }

    /**
     * Counts all messages
     *
     * @param int $user_id
     * @return int
     */
//    public function count_all($user_id = null)
//    {
//        $query = DB::select(DB::expr('COUNT(*) AS message_count'))
//            ->from($this->_table);
//
//        if ( $user_id )
//        {
//            $query->where('user_id', '=', $user_id);
//        }
//
//        return $query->execute()->get('message_count');
//    }

    /**
     * Deletes a message from the DB
     *
     * @param int $user_id
     * @param string $message
     * @return Database
     */
//    public function delete($id)
//    {
//        return DB::delete($this->_table)
//            ->where('id', '=', $id)
//            ->execute();
//    }

}

