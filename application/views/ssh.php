<?php
$ssh = new Net_SSH2('10.62.165.4');
if (!$ssh->login('ha19840219', 'telkom007')) {
    exit('Login Failed');
}

// echo $ssh->exec('pwd');
// echo $ssh->exec('ls -la');
?>