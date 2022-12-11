<?php

namespace app\modules\common\controllers;

use app\models\GeoCountry;
use app\models\StudentNationality;

class AutocompleteController extends CommonController
{
    public function actionNationality($q = null, $id = null)
    {
        /*
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $out['results'] = StudentNationality::find()->select('id, name AS text')->where(['like', 'name', $q])->asArray()->all();
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => StudentNationality::find($id)->name];
        }
        return $out;
        */
    }


    public function actionCitizenship($q = null, $id = null)
    {
        /*
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $out = ['results' => ['id' => '', 'text' => '']];
        if (!is_null($q)) {
            $out['results'] = GeoCountry::find()->select('id, name AS text')->where(['like', 'name', $q])->asArray()->all();;
        }
        elseif ($id > 0) {
            $out['results'] = ['id' => $id, 'text' => GeoCountry::find($id)->name];
        }
        return $out;
        */
    }

}
