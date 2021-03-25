<?php
namespace app\components;
use Yii;
use DateTime;
use yii\db\Query;
use DateTimeZone;
use Notification;
use yii\base\Component;

class CommonComponent extends Component{
    
    
    public function getDate()
    {
        $date = new DateTime('now', new DateTimeZone('Asia/Kolkata'));
        return $date->format('Y-m-d');
    }
    public function getName()
    {
        // $date =  $model->updated_by = Yii::$app->user->identity->username;
        $data="ajay";
        return $data;
    }
    public function getAndroid_id()
    {
        return "1234567";
    }
    public function getModel_id()
    {
        return "123";
    }
    public function getLimit($name)
    {
        $data=strlen("$name");
        if($data<5)
        {
            return "your Name should be 4 letter";

        }

    }
    public function getMessage()
    {
        return "Successfully Registered";
    }
    function get_patient(){
        $count = (new \yii\db\Query())
        ->from('patient')
        ->count();

		return("".$count);
    }
    function get_doctor(){
        $count = (new \yii\db\Query())
        ->from('doctor')
        ->count();

		return("".$count);
    }
    function get_category(){
        $count = (new \yii\db\Query())
        ->from('category')
        ->count();

		return("".$count);
    }
    function get_subcategory(){
        $count = (new \yii\db\Query())
        ->from('subcategory')
        ->count();

		return("".$count);
    }
    function get_bill_item(){
        $count = (new \yii\db\Query())
        ->from('bill_item')
        ->count();

		return("".$count);
    }
    function get_bill(){
        $count = (new \yii\db\Query())
        ->from('bill')
        ->count();

		return("".$count);
    }
    function get_reciept(){
        $count = (new \yii\db\Query())
        ->from('receipt')
        ->count();

		return("".$count);
    }
    function get_Dcommision(){
        $count = (new \yii\db\Query())
        ->from('doctor_commission')
        ->count();

		return("".$count);
    }
 
    function get_Scommision(){
        $count = (new \yii\db\Query())
        ->from('   stored_commission')
        ->count();

		return("".$count);
    }
    function get_Hospitalbill_id(){
        $count = (new \yii\db\Query())
        ->from('   hospital_bill')
        ->count();

		return("".$count);
    }
    function get_Alert(){
        
        

        return("This patient has no bill ");
    }
}
?>