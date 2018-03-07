<?php

interface Authentication {

    public function isAuthenticated ();
    public function verifyAuthentication ($proof);
    public function setToAuthenticated ();
    public function setToUnauthenticated ();
    public function signup ($userdata);
}

?>
