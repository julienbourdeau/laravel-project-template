<?php

function is_root(\App\Models\User $user){
    return 'julien@julienbourdeau.com' == $user->email;
}
