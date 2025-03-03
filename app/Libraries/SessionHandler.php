<?php

namespace App\Libraries;

use CodeIgniter\Session\Handlers\DatabaseHandler;

class SessionHandler extends DatabaseHandler
{
    public function write($session_id, $session_data): bool
    {
        $session = session();
        $userid = $session->get('logged_id');

        if (isset($userid)) {
            $this->db->table('ci_sessions')
                ->where('id', "tuptrms:$session_id")
                ->update(['user_id' => $userid]);
        }

        return parent::write($session_id, $session_data);
    }

}

