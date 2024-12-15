<?php

namespace App\Core\Controller\Pages;

use App\Classes\Utils\View;
use App\Core\Controller\Components\BaseStructure;

class Home {

    public static function render() {

        echo BaseStructure::render(View::render("Pages/Home"), [
            "links" => [
                ["rel" => "stylesheet", "href" => URL_BASE."/assets/css/home.css"]
            ]
        ]);

    }

}