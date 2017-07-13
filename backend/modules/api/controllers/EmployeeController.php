<?php

namespace backend\modules\api\controllers;

use \backend\modules\api\models\Employee;

class EmployeeController extends \yii\web\Controller
{

    public $enableCsrfValidation = false;

    public function actionIndex()
    {

        return $this->render('index');
    }

    public function actionCreateEmployee(){
      \Yii::$app->response->format= \yii\web\Response::FORMAT_JSON; // This will return response in json
      $employee=new Employee();
      $employee->scenario = Employee::SCENARIO_CREATE;
      $employee->attributes = \Yii::$app->request->post();

      if($employee->validate()){
        $employee->save();
        return array('status'=>true,'data'=>'Employee created successfully.');
      }else{
        return array('status'=>false, 'data'=>$employee->getErrors());
      }
    }

    public function actionListEmployee(){
      \Yii::$app->response->format= \yii\web\Response::FORMAT_JSON; // This will return response in json

      $employee= Employee::find()->all();

      if(count($employee)>0){
        return array('status'=>true,'data'=>$employee);
      }else {
        return array('status'=>false, 'data'=>'No employees found.');
      }
    }

}
