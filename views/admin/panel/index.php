<h1> hello Panel</h1>
<?php
if ( false === strpos($_SERVER['PATH_INFO'], 'admin'))
 {
    echo 'admin';
}
else {
    echo 'lamba';
}
dump($_SERVER['PATH_INFO']);