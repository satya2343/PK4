<?php
/**
 * Created by PhpStorm.
 * User: satya
 * Date: 04/01/17
 * Time: 5:53
 */

namespace app\controllers;

use yii\rest\ActiveController;

class ApiArduinoController extends ActiveController
{
    public $modelClass = 'app\models\Monitor';
}