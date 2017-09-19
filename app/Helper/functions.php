<?php
function config($name) {
	return App\Contract\Config::get($name);
}
function view($template, $variables = null) {
	return App\Contract\View::show($template, $variables);
}
function root() {
	return Proyect\Root\Root::root('links');
}
?>