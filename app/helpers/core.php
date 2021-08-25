<?php

function language($language = null) {
    return \App\Core\Language::get($language);
}


function settings() {
    return \App\Core\Settings::$settings;
}
