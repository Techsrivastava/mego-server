<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');

//include Rest Controller library
require APPPATH . '/libraries/REST_Controller.php';
 //error_reporting(0);
class Api extends REST_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('Model_admin');
        $this->load->model('Api_model');     
        date_default_timezone_set("Asia/Kolkata"); 

    }

   

    public function dropdownList_post() {
        error_reporting(0);
        $app_key = $this->input->post_get('APP_KEY', true);
       
         
            $countryArray = array();
            $genderArray = array();
            $gen['PR_DROPDOWN_ID'] = "MAN";
            $gen['PR_NAME'] = "MAN";
            $gen['PR_USED_FOR'] = "";
            $gen['PR_STATUS'] = "1";
            $gen['PR_LAT_LONG'] = "";
            $gen['PR_ENTRY_DATE'] = "";
            array_push($genderArray, $gen);
            $gen['PR_DROPDOWN_ID'] = "WOMEN";
            $gen['PR_NAME'] = "WOMEN";
            $gen['PR_USED_FOR'] = "";
            $gen['PR_STATUS'] = "1";
            $gen['PR_LAT_LONG'] = "";
            $gen['PR_ENTRY_DATE'] = "";
            array_push($genderArray, $gen);
            $gen['PR_DROPDOWN_ID'] = "TRANSGENDER";
            $gen['PR_NAME'] = "TRANSGENDER";
            $gen['PR_USED_FOR'] = "";
            $gen['PR_STATUS'] = "1";
            $gen['PR_LAT_LONG'] = "";
            $gen['PR_ENTRY_DATE'] = "";
            array_push($genderArray, $gen);

            $genderSexArray = array();
            $genSex['PR_DROPDOWN_ID'] = "Straight";
            $genSex['PR_NAME'] = "Straight";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Gay";
            $genSex['PR_NAME'] = "Gay";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Lesbian";
            $genSex['PR_NAME'] = "Lesbian";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Bisexual";
            $genSex['PR_NAME'] = "Bisexual";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Asexual";
            $genSex['PR_NAME'] = "Asexual";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Demisexual";
            $genSex['PR_NAME'] = "Demisexual";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Pansexual";
            $genSex['PR_NAME'] = "Pansexual";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Queer";
            $genSex['PR_NAME'] = "Queer";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Bicurious";
            $genSex['PR_NAME'] = "Bicurious";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);



            $passionArray2 = array();

            $passionList=$this->Api_model->getPassion();
            foreach ($passionList as $prow) 
            {               
                $passion['PR_DROPDOWN_ID'] =$prow->PR_PASSION;
                $passion['PR_NAME'] =$prow->PR_PASSION;
                $passion['PR_USED_FOR'] = "";
                $passion['PR_STATUS'] = "1";
                $passion['PR_LAT_LONG'] = "";
                $passion['PR_ENTRY_DATE'] = "";
                
                array_push($passionArray2, $passion);
            }


               



            $langArray = array();
            $lan['PR_DROPDOWN_ID'] = "English";
            $lan['PR_NAME'] = "English";
            $lan['PR_USED_FOR'] = "";
            $lan['PR_STATUS'] = "1";
            $lan['PR_LAT_LONG'] = "";
            $lan['PR_ENTRY_DATE'] = "";
            array_push($langArray, $lan);
            $lan['PR_DROPDOWN_ID'] = "Hindi";
            $lan['PR_NAME'] = "Hindi";
            $lan['PR_USED_FOR'] = "";
            $lan['PR_STATUS'] = "1";
            $lan['PR_LAT_LONG'] = "";
            $lan['PR_ENTRY_DATE'] = "";
            array_push($langArray, $lan);        


            $MaritalStatusArray = array();
            $maried['PR_DROPDOWN_ID'] = "Married";
            $maried['PR_NAME'] = "Married";
            $maried['PR_USED_FOR'] = "";
            $maried['PR_STATUS'] = "1";
            $maried['PR_LAT_LONG'] = "";
            $maried['PR_ENTRY_DATE'] = "";
            array_push($MaritalStatusArray, $maried);
            $maried['PR_DROPDOWN_ID'] = "Un-Married";
            $maried['PR_NAME'] = "Un-Married";
            $maried['PR_USED_FOR'] = "";
            $maried['PR_STATUS'] = "1";
            $maried['PR_LAT_LONG'] = "";
            $maried['PR_ENTRY_DATE'] = "";
            array_push($MaritalStatusArray, $maried);
            $maried['PR_DROPDOWN_ID'] = "Divorce";
            $maried['PR_NAME'] = "Divorce";
            $maried['PR_USED_FOR'] = "";
            $maried['PR_STATUS'] = "1";
            $maried['PR_LAT_LONG'] = "";
            $maried['PR_ENTRY_DATE'] = "";
            array_push($MaritalStatusArray, $maried);

              $mul[] = array('PR' => '1',
                
                             
                'GENDER'=>$genderArray,
                'SEXUAL_ORIENTATION'=>$genderSexArray,
                'MRITAL_STS'=>$MaritalStatusArray,
                'LANGUAGE'=>$langArray,
                'PASSION'=>$passionArray2

            );

            $aResponce = array('STATUS' => 'SUCCESS',
                'MESSAGE' => 'DropDown List',
                'DROPDOWN_LIST' => $mul
            );
        
        echo json_encode($aResponce);
        exit();
    }







      public function syncData_post() {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);

        $app_key =$jsonArray['APP_KEY']; //$this->input->post_get('APP_KEY', true);
        $COMPANY_CODE =$jsonArray['COMPANY_CODE']; //$this->input->post_get('COMPANY_CODE', true);       
        $EMPLOYEE_CODE =$jsonArray['EMPLOYEE_CODE'];// $this->input->post_get('EMPLOYEE_CODE', true);
        $SEARCH_BY =$jsonArray['SEARCH_BY'];
        $TOKEN =$jsonArray['TOKEN'];//$this->input->post_get('SEARCH_BY', true);
        $table="pr_users";
        // $getEmpData = $this->Employee->getEmployeeCode($EMPLOYEE_CODE);
        $this->Api_model->updateRow('pr_users',array('PR_TOKEN'=>$TOKEN),array('PR_USER_ID'=>$EMPLOYEE_CODE));
            
        // $LAT_LONG = $this->input->post_get('LAT_LONG', true); 

        // //print_r($getEmpData); exit;
        // $ROLE_ID=$getEmpData[0]->PR_DESIGNATION_ID;
        // $EMPLOYEE_ID=$getEmpData[0]->PR_EMPLOYEE_ID;

        // $trackData=array(
        //     'PR_EMPLOYEE_CODE'=>$EMPLOYEE_ID,
        //     'PR_LAT_LONG'=>$LAT_LONG ,
        //     'PR_ENTRY_DATE'=>date('Y-m-d h:i:s'),
        // );
        // $this->Employee->addRow('pr_track_record',$trackData);


        // $employeeInfoc = $this->Employee->getUserDta2(array('TABLE_NAME'=>$table,'PR_EMPLOYEE_ID'=>$EMPLOYEE_ID));
 

        $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Not valid data');
        if ($app_key != APP_KEY) {
            $aResponce['MESSAGE'] = 'APP KEY Not Matched';
        }
        else if (empty($COMPANY_CODE)) {
            $aResponce['MESSAGE'] = 'Please Enter Company Code !';
        }
        else 
        {
            
                  
           $likeList= $this->Api_model->getLikedUserData(array('EMPLOYEE_ID' => $EMPLOYEE_CODE));
            $unlikeList= $this->Api_model->getUnLikedUserData(array('EMPLOYEE_ID' => $EMPLOYEE_CODE));
           
 
            
            $menuArray = array(array('MENU_ID'=>'1','MENU_NAME'=>'CBT_DASHBOARD','MENU_CODE'=>'','MENU_IMAGE'=>'','SUB_MENU'=>array('SUB_MENU_ID'=>'1','SUB_MENU_NAME'=>'Test 1','SUB_MENU_CODE'=>'','SUB_MENU_IMAGE'=>'')));
            $controlArray = array(array('PACKAGE_YN'=>'Y','Test2'=>'2'));

            
            $countryArray = array();
            $genderArray = array();
            $gen['PR_DROPDOWN_ID'] = "MAN";
            $gen['PR_NAME'] = "MAN";
            $gen['PR_USED_FOR'] = "";
            $gen['PR_STATUS'] = "1";
            $gen['PR_LAT_LONG'] = "";
            $gen['PR_ENTRY_DATE'] = "";
            array_push($genderArray, $gen);
            $gen['PR_DROPDOWN_ID'] = "WOMEN";
            $gen['PR_NAME'] = "WOMEN";
            $gen['PR_USED_FOR'] = "";
            $gen['PR_STATUS'] = "1";
            $gen['PR_LAT_LONG'] = "";
            $gen['PR_ENTRY_DATE'] = "";
            array_push($genderArray, $gen);
            $gen['PR_DROPDOWN_ID'] = "TRANSGENDER";
            $gen['PR_NAME'] = "TRANSGENDER";
            $gen['PR_USED_FOR'] = "";
            $gen['PR_STATUS'] = "1";
            $gen['PR_LAT_LONG'] = "";
            $gen['PR_ENTRY_DATE'] = "";
            array_push($genderArray, $gen);

            $genderSexArray = array();
            $genSex['PR_DROPDOWN_ID'] = "Straight";
            $genSex['PR_NAME'] = "Straight";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Gay";
            $genSex['PR_NAME'] = "Gay";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Lesbian";
            $genSex['PR_NAME'] = "Lesbian";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Bisexual";
            $genSex['PR_NAME'] = "Bisexual";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Asexual";
            $genSex['PR_NAME'] = "Asexual";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Demisexual";
            $genSex['PR_NAME'] = "Demisexual";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Pansexual";
            $genSex['PR_NAME'] = "Pansexual";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Queer";
            $genSex['PR_NAME'] = "Queer";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);
            $genSex['PR_DROPDOWN_ID'] = "Bicurious";
            $genSex['PR_NAME'] = "Bicurious";
            $genSex['PR_USED_FOR'] = "";
            $genSex['PR_STATUS'] = "1";
            $genSex['PR_LAT_LONG'] = "";
            $genSex['PR_ENTRY_DATE'] = "";
            array_push($genderSexArray, $genSex);



            $passionArray = array();
            $passion['PR_DROPDOWN_ID'] = "Running";
            $passion['PR_NAME'] = "Running";
            $passion['PR_USED_FOR'] = "";
            $passion['PR_STATUS'] = "1";
            $passion['PR_LAT_LONG'] = "";
            $passion['PR_ENTRY_DATE'] = "";
            array_push($passionArray, $passion);
            $passion['PR_DROPDOWN_ID'] = "Art";
            $passion['PR_NAME'] = "Art";
            $passion['PR_USED_FOR'] = "";
            $passion['PR_STATUS'] = "1";
            $passion['PR_LAT_LONG'] = "";
            $passion['PR_ENTRY_DATE'] = "";
            array_push($passionArray, $passion); 
            $passion['PR_DROPDOWN_ID'] = "Cricket";
            $passion['PR_NAME'] = "Cricket";
            $passion['PR_USED_FOR'] = "";
            $passion['PR_STATUS'] = "1";
            $passion['PR_LAT_LONG'] = "";
            $passion['PR_ENTRY_DATE'] = "";
            array_push($passionArray, $passion); 
            $passion['PR_DROPDOWN_ID'] = "Dancing";
            $passion['PR_NAME'] = "Dancing";
            $passion['PR_USED_FOR'] = "";
            $passion['PR_STATUS'] = "1";
            $passion['PR_LAT_LONG'] = "";
            $passion['PR_ENTRY_DATE'] = "";
            array_push($passionArray, $passion); 
            $passion['PR_DROPDOWN_ID'] = "Singing";
            $passion['PR_NAME'] = "Singing";
            $passion['PR_USED_FOR'] = "";
            $passion['PR_STATUS'] = "1";
            $passion['PR_LAT_LONG'] = "";
            $passion['PR_ENTRY_DATE'] = "";
            array_push($passionArray, $passion); 



            $langArray = array();
            $lan['PR_DROPDOWN_ID'] = "English";
            $lan['PR_NAME'] = "English";
            $lan['PR_USED_FOR'] = "";
            $lan['PR_STATUS'] = "1";
            $lan['PR_LAT_LONG'] = "";
            $lan['PR_ENTRY_DATE'] = "";
            array_push($langArray, $lan);
            $lan['PR_DROPDOWN_ID'] = "Hindi";
            $lan['PR_NAME'] = "Hindi";
            $lan['PR_USED_FOR'] = "";
            $lan['PR_STATUS'] = "1";
            $lan['PR_LAT_LONG'] = "";
            $lan['PR_ENTRY_DATE'] = "";
            array_push($langArray, $lan);        


            $MaritalStatusArray = array();
            $maried['PR_DROPDOWN_ID'] = "Married";
            $maried['PR_NAME'] = "Married";
            $maried['PR_USED_FOR'] = "";
            $maried['PR_STATUS'] = "1";
            $maried['PR_LAT_LONG'] = "";
            $maried['PR_ENTRY_DATE'] = "";
            array_push($MaritalStatusArray, $maried);
            $maried['PR_DROPDOWN_ID'] = "Un-Married";
            $maried['PR_NAME'] = "Un-Married";
            $maried['PR_USED_FOR'] = "";
            $maried['PR_STATUS'] = "1";
            $maried['PR_LAT_LONG'] = ""; 
            $maried['PR_ENTRY_DATE'] = "";
            array_push($MaritalStatusArray, $maried);
            $maried['PR_DROPDOWN_ID'] = "Divorce";
            $maried['PR_NAME'] = "Divorce";
            $maried['PR_USED_FOR'] = ""; 
            $maried['PR_STATUS'] = "1";
            $maried['PR_LAT_LONG'] = "";
            $maried['PR_ENTRY_DATE'] = "";
            array_push($MaritalStatusArray, $maried); 

            $userarray=array();
            $usersList= $this->Api_model->getUserData(array('EMPLOYEE_ID' => $EMPLOYEE_CODE));
            $settingDataList= $this->Api_model->getUserSettingDataByuser(array('PR_USER_ID' =>$EMPLOYEE_CODE));
//getUserSettingData
            $settingData = array();
           

            foreach ($settingDataList as $cont) 
            {               
                $rr[$cont->PR_SETTING] = $cont->PR_VALUE;
              
            }

              array_push($settingData, $rr);
             if($settingData)
               {
                $settingData=$settingData;
               }
               else
               {
                $settingData=array(

                    "EMAIL"=>"",
                    "PHONE"=>"",
                    "LOCATION"=>"",
                    "MAXIMUM_DISTANCE"=>"",
                    "LOKING_FOR"=>"",
                    "AGE_RANGE"=>"",
                    "SHOW_ME_ON_TINDER"=>"",
                    "USERNAME"=>"",
                    "MANAGE_READ_RECEIPTENT"=>"",
                    "RECENTLY_ACTIVE_STS"=>"",
                    "EMAIL_MATCHES"=>"",
                    "EMAIL_MSG"=>"",
                    "EMAIL_PROMOTION"=>"",
                    "NOTIFICATION_MATCHES"=>"",
                    "NOTIFICATION_MSG"=>"",
                    "NOTIFICATION_PROMOTION"=>"",
                    "LANGUAGE"=>""
                );
               }



            foreach ($usersList as $urow) 
            {
                
                $getUserPackageData = $this->Api_model->getUserPackage(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
              
               $ulgalleryarray=array();
               $plgrow= $this->Api_model->getGalleryData(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
            //   foreach($galleryList as $grow)
            //   {
            //     $g['PR_IMAGE_ID']=$grow->PR_IMAGE_ID;
            //     $g['PR_IMAGE']=base_url()."files/".$grow->PR_IMAGE;  
            //     array_push($galleryarray, $g);        
             
            //   }
           //echo $gal['PR_IMAGE_ID'] =$plgrow[0]->PR_IMAGE; exit;
            if($plgrow[0]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[0]->PR_IMAGE;
            }
            else if($plgrow[0]->PR_IMAGE=="0")
            {
                $gal['PR_IMAGE'] ="";
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[1]->PR_IMAGE_ID;
            if($plgrow[1]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[1]->PR_IMAGE;
            }
             else if($plgrow[0]->PR_IMAGE=="0")
            {
                $gal['PR_IMAGE'] ="";
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[2]->PR_IMAGE_ID;
            if($plgrow[2]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[2]->PR_IMAGE;
            }
             else if($plgrow[0]->PR_IMAGE=="0")
            {
                $gal['PR_IMAGE'] ="";
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[3]->PR_IMAGE_ID;
            if($plgrow[3]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[3]->PR_IMAGE;
            }
             else if($plgrow[0]->PR_IMAGE=="0")
            {
                $gal['PR_IMAGE'] ="";
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[4]->PR_IMAGE_ID;
            if($plgrow[4]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[4]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
             $gal['PR_IMAGE_ID'] =$plgrow[5]->PR_IMAGE_ID;
            if($plgrow[5]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[5]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
               

               $uupassion= $this->Api_model->getUserPassion(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
               $uusexualOrientation= $this->Api_model->getUserSexualOrientation(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
               
              
 
               $urowData['PR_USER_ID']=$urow->PR_USER_ID;
               $urowData['PR_ROLE_ID']=$urow->PR_ROLE_ID;
               $urowData['PR_USER_CODE']=$urow->PR_USER_CODE;
               $urowData['PR_PASSWORD']=$urow->PR_PASSWORD;
               $urowData['PR_PIN']=$urow->PR_PIN;
               $urowData['PR_TITLE']=$urow->PR_TITLE;
               $urowData['PR_NAME']=$urow->PR_NAME;
               $urowData['PR_EMAIL']=$urow->PR_EMAIL;
               $urowData['PR_PHONE']=$urow->PR_PHONE;
               $urowData['PR_IMAGE']=base_url()."files/".$plgrow[0]->PR_IMAGE;
               $urowData['PR_PRESENT_ADDRESS']=$urow->PR_PRESENT_ADDRESS;
               $urowData['PR_PERMANENT_ADDRESS']=$urow->PR_PERMANENT_ADDRESS;
               $urowData['PR_COUNTRY']=$urow->PR_COUNTRY;
               $urowData['PR_STATE']=$urow->PR_STATE;
               $urowData['PR_CITY']=$urow->PR_CITY;
               $urowData['PR_PINCODE']=$urow->PR_PINCODE;
               $urowData['PR_GST_NO']=$urow->PR_GST_NO;
               $urowData['PR_AADHAR_CARD_NO']=$urow->PR_AADHAR_CARD_NO;
               $urowData['PR_PANCARD_NO']=$urow->PR_PANCARD_NO;
               $urowData['PR_DL_NO']=$urow->PR_DL_NO;
               $urowData['PR_PASSPORT_NO']=$urow->PR_PASSPORT_NO;
               $urowData['PR_ACCOUNT_NO']=$urow->PR_ACCOUNT_NO;
               $urowData['PR_IFSC_CODE']=$urow->PR_IFSC_CODE;
               $urowData['PR_BANK_NAME']=$urow->PR_BANK_NAME;
               $urowData['PR_BANK_BRANCH']=$urow->PR_BANK_BRANCH;
               $urowData['PR_STATUS']=$urow->PR_STATUS;
               $urowData['PR_IMEI']=$urow->PR_IMEI;
               $urowData['PR_BATTERY']=$urow->PR_BATTERY;
               $urowData['PR_APP_VERSION']=$urow->PR_APP_VERSION;
               $urowData['PR_PHONE_BRAND']=$urow->PR_PHONE_BRAND;
               $urowData['PR_LOCATION']=$urow->PR_LOCATION;
               $urowData['PR_TOKEN']=$urow->PR_TOKEN;
               $urowData['PR_CREATED_AT']=$urow->PR_CREATED_AT;
               $urowData['PR_UPDATED_AT']=$urow->PR_UPDATED_AT;
               $urowData['PR_ADDED_BY']=$urow->PR_ADDED_BY;
               $urowData['PR_LAT_LNG']=$urow->PR_LAT_LNG;
               $urowData['PR_CTC']=$urow->PR_CTC;
               $urowData['PR_OTP']=$urow->PR_OTP;
               $urowData['PR_GENDER']=$urow->PR_GENDER;
               $urowData['PR_SEXUAL_ORIENTATION']=$uusexualOrientation;
               $urowData['PR_PASSION']=$uupassion;
               $urowData['PR_DOB']=$urow->PR_DOB;
               $urowData['GALLERY']=$ulgalleryarray;

               $urowData['PR_PACKAGE']=$urow->PR_PACKAGE_ID;
               $urowData['PR_MIN_LOCATION']=$urow->PR_MIN_LOCATION;
               $urowData['PR_AGE_RANGE']=$urow->PR_AGE_RANGE;
               
               $urowData['PCAKAGE']=$getUserPackageData;
               

               $settingData = array();
           
               $settingDataList= $this->Api_model->getUserSettingDataByuser(array('PR_USER_ID' =>$urow->PR_USER_ID));
               $urowData['SETTING_DATA']=$settingDataList;


               array_push($userarray, $urowData);


            }


            $likeduserarray=array();
            //$likedusersList= $this->Api_model->getUserData(array('EMPLOYEE_ID' => $EMPLOYEE_CODE));
            foreach ($likeList as $lrow) 
            {
               $ulgalleryarray=array();
               $lgalleryList= $this->Api_model->getGalleryData(array('EMPLOYEE_ID' =>$lrow->PR_USER_ID));
            //   foreach($lgalleryList as $lgrow)
            //   {
            //     $lg['PR_IMAGE_ID']=$lgrow->PR_IMAGE_ID;
            //     $lg['PR_IMAGE']=base_url()."files/".$lgrow->PR_IMAGE;  
            //     array_push($lgalleryarray, $lg);        
             
            //   }
             $gal['PR_IMAGE_ID'] =$plgrow[0]->PR_IMAGE_ID;
            if($plgrow[0]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[0]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[1]->PR_IMAGE_ID;
            if($plgrow[1]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[1]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[2]->PR_IMAGE_ID;
            if($plgrow[2]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[2]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[3]->PR_IMAGE_ID;
            if($plgrow[3]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[3]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[4]->PR_IMAGE_ID;
            if($plgrow[4]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[4]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
             $gal['PR_IMAGE_ID'] =$plgrow[5]->PR_IMAGE_ID;
            if($plgrow[5]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[5]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
               
               
               
               

               $lpassion= $this->Api_model->getUserPassion(array('EMPLOYEE_ID' =>$lrow->PR_USER_ID));
               $lsexualOrientation= $this->Api_model->getUserSexualOrientation(array('EMPLOYEE_ID' =>$lrow->PR_USER_ID));

 
 
               $lrowData['PR_USER_ID']=$lrow->PR_USER_ID;
               $lrowData['PR_ROLE_ID']=$lrow->PR_ROLE_ID;
               $lrowData['PR_USER_CODE']=$lrow->PR_USER_CODE;
               $lrowData['PR_PASSWORD']=$lrow->PR_PASSWORD;
               $lrowData['PR_PIN']=$lrow->PR_PIN;
               $lrowData['PR_TITLE']=$lrow->PR_TITLE;
               $lrowData['PR_NAME']=$lrow->PR_NAME;
               $lrowData['PR_EMAIL']=$lrow->PR_EMAIL;
               $lrowData['PR_PHONE']=$lrow->PR_PHONE;
               $lrowData['PR_IMAGE']=base_url()."files/".$plgrow[0]->PR_IMAGE;
               $lrowData['PR_PRESENT_ADDRESS']=$lrow->PR_PRESENT_ADDRESS;
               $lrowData['PR_PERMANENT_ADDRESS']=$lrow->PR_PERMANENT_ADDRESS;
               $lrowData['PR_COUNTRY']=$lrow->PR_COUNTRY;
               $lrowData['PR_STATE']=$lrow->PR_STATE;
               $lrowData['PR_CITY']=$lrow->PR_CITY;
               $lrowData['PR_PINCODE']=$lrow->PR_PINCODE;
               $lrowData['PR_GST_NO']=$lrow->PR_GST_NO;
               $lrowData['PR_AADHAR_CARD_NO']=$lrow->PR_AADHAR_CARD_NO;
               $lrowData['PR_PANCARD_NO']=$lrow->PR_PANCARD_NO;
               $lrowData['PR_DL_NO']=$lrow->PR_DL_NO;
               $lrowData['PR_PASSPORT_NO']=$lrow->PR_PASSPORT_NO;
               $lrowData['PR_ACCOUNT_NO']=$lrow->PR_ACCOUNT_NO;
               $lrowData['PR_IFSC_CODE']=$lrow->PR_IFSC_CODE;
               $lrowData['PR_BANK_NAME']=$lrow->PR_BANK_NAME;
               $lrowData['PR_BANK_BRANCH']=$lrow->PR_BANK_BRANCH;
               $lrowData['PR_STATUS']=$lrow->PR_STATUS;
               $lrowData['PR_IMEI']=$lrow->PR_IMEI;
               $lrowData['PR_BATTERY']=$lrow->PR_BATTERY;
               $lrowData['PR_APP_VERSION']=$lrow->PR_APP_VERSION;
               $lrowData['PR_PHONE_BRAND']=$lrow->PR_PHONE_BRAND;
               $lrowData['PR_LOCATION']=$lrow->PR_LOCATION;
               $lrowData['PR_TOKEN']=$lrow->PR_TOKEN;
               $lrowData['PR_CREATED_AT']=$lrow->PR_CREATED_AT;
               $lrowData['PR_UPDATED_AT']=$lrow->PR_UPDATED_AT;
               $lrowData['PR_ADDED_BY']=$lrow->PR_ADDED_BY;
               $lrowData['PR_LAT_LNG']=$lrow->PR_LAT_LNG;
               $lrowData['PR_CTC']=$lrow->PR_CTC;
               $lrowData['PR_OTP']=$lrow->PR_OTP;
               $lrowData['PR_GENDER']=$lrow->PR_GENDER;
               $lrowData['PR_SEXUAL_ORIENTATION']=$lsexualOrientation;
               $lrowData['PR_PASSION']=$lpassion;
               $lrowData['PR_DOB']=$lrow->PR_DOB;
               $lrowData['GALLERY']=$ulgalleryarray;

               $lrowData['PR_PACKAGE']=$lrow->PR_PACKAGE_ID;
               $lrowData['PR_MIN_LOCATION']=$lrow->PR_MIN_LOCATION;
               $lrowData['PR_AGE_RANGE']=$lrow->PR_AGE_RANGE;

               $settingDataList= $this->Api_model->getUserSettingDataByuser(array('PR_USER_ID' =>$lrow->PR_USER_ID));
               $lrowData['SETTING_DATA']=$settingDataList;
               $getUserPackageData = $this->Api_model->getUserPackage(array('EMPLOYEE_ID' =>$lrow->PR_USER_ID));
              
                $lrowData['PCAKAGE']=$getUserPackageData;

               array_push($likeduserarray, $lrowData);


            }


            $unlikeduserarray=array();
            //$likedusersList= $this->Api_model->getUserData(array('EMPLOYEE_ID' => $EMPLOYEE_CODE));
            foreach ($unlikeList as $ulrow) 
            {
               $ulgalleryarray=array();
               $plgrow= $this->Api_model->getGalleryData(array('EMPLOYEE_ID' =>$ulrow->PR_USER_ID));
            //   foreach($ulgalleryList as $ulgrow)
            //   {
            //     $ug['PR_IMAGE_ID']=$ulgrow->PR_IMAGE_ID;
            //     $ug['PR_IMAGE']=base_url()."files/".$ulgrow->PR_IMAGE;  
            //     array_push($ulgalleryarray, $ug);        
             
            //   }
                 
                
   
            $gal['PR_IMAGE_ID'] =$plgrow[0]->PR_IMAGE_ID;
            if($plgrow[0]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[0]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[1]->PR_IMAGE_ID;
            if($plgrow[1]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[1]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[2]->PR_IMAGE_ID;
            if($plgrow[2]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[2]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[3]->PR_IMAGE_ID;
            if($plgrow[3]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[3]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[4]->PR_IMAGE_ID;
            if($plgrow[4]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[4]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
             $gal['PR_IMAGE_ID'] =$plgrow[5]->PR_IMAGE_ID;
            if($plgrow[5]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[5]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            
                
                

               $ulpassion= $this->Api_model->getUserPassion(array('EMPLOYEE_ID' =>$ulrow->PR_USER_ID));
               $ulsexualOrientation= $this->Api_model->getUserSexualOrientation(array('EMPLOYEE_ID' =>$ulrow->PR_USER_ID));

 
               $ulrowData['PR_USER_ID']=$ulrow->PR_USER_ID;
               $ulrowData['PR_ROLE_ID']=$ulrow->PR_ROLE_ID;
               $ulrowData['PR_USER_CODE']=$ulrow->PR_USER_CODE;
               $ulrowData['PR_PASSWORD']=$ulrow->PR_PASSWORD;
               $ulrowData['PR_PIN']=$ulrow->PR_PIN;
               $ulrowData['PR_TITLE']=$ulrow->PR_TITLE;
               $ulrowData['PR_NAME']=$ulrow->PR_NAME;
               $ulrowData['PR_EMAIL']=$ulrow->PR_EMAIL;
               $ulrowData['PR_PHONE']=$ulrow->PR_PHONE;
               $ulrowData['PR_IMAGE']=base_url()."files/".$plgrow[0]->PR_IMAGE;
               $ulrowData['PR_PRESENT_ADDRESS']=$ulrow->PR_PRESENT_ADDRESS;
               $ulrowData['PR_PERMANENT_ADDRESS']=$ulrow->PR_PERMANENT_ADDRESS;
               $ulrowData['PR_COUNTRY']=$ulrow->PR_COUNTRY;
               $ulrowData['PR_STATE']=$ulrow->PR_STATE;
               $ulrowData['PR_CITY']=$ulrow->PR_CITY;
               $ulrowData['PR_PINCODE']=$ulrow->PR_PINCODE;
               $ulrowData['PR_GST_NO']=$ulrow->PR_GST_NO;
               $ulrowData['PR_AADHAR_CARD_NO']=$ulrow->PR_AADHAR_CARD_NO;
               $ulrowData['PR_PANCARD_NO']=$ulrow->PR_PANCARD_NO;
               $ulrowData['PR_DL_NO']=$ulrow->PR_DL_NO;
               $ulrowData['PR_PASSPORT_NO']=$ulrow->PR_PASSPORT_NO;
               $ulrowData['PR_ACCOUNT_NO']=$ulrow->PR_ACCOUNT_NO;
               $ulrowData['PR_IFSC_CODE']=$ulrow->PR_IFSC_CODE;
               $ulrowData['PR_BANK_NAME']=$ulrow->PR_BANK_NAME;
               $ulrowData['PR_BANK_BRANCH']=$ulrow->PR_BANK_BRANCH;
               $ulrowData['PR_STATUS']=$ulrow->PR_STATUS;
               $ulrowData['PR_IMEI']=$ulrow->PR_IMEI;
               $ulrowData['PR_BATTERY']=$ulrow->PR_BATTERY;
               $ulrowData['PR_APP_VERSION']=$ulrow->PR_APP_VERSION;
               $ulrowData['PR_PHONE_BRAND']=$ulrow->PR_PHONE_BRAND;
               $ulrowData['PR_LOCATION']=$ulrow->PR_LOCATION;
               $ulrowData['PR_TOKEN']=$ulrow->PR_TOKEN;
               $ulrowData['PR_CREATED_AT']=$ulrow->PR_CREATED_AT;
               $ulrowData['PR_UPDATED_AT']=$ulrow->PR_UPDATED_AT;
               $ulrowData['PR_ADDED_BY']=$ulrow->PR_ADDED_BY;
               $ulrowData['PR_LAT_LNG']=$ulrow->PR_LAT_LNG;
               $ulrowData['PR_CTC']=$ulrow->PR_CTC;
               $ulrowData['PR_OTP']=$ulrow->PR_OTP;
               $ulrowData['PR_GENDER']=$ulrow->PR_GENDER;
               $ulrowData['PR_SEXUAL_ORIENTATION']=$ulsexualOrientation;
               $ulrowData['PR_PASSION']=$ulpassion;
               $ulrowData['PR_DOB']=$ulrow->PR_DOB;
               
               
               
               
               $ulrowData['GALLERY']=$ulgalleryarray;

               $ulrowData['PR_PACKAGE']=$ulrow->PR_PACKAGE_ID;
               $ulrowData['PR_MIN_LOCATION']=$ulrow->PR_MIN_LOCATION;
               $ulrowData['PR_AGE_RANGE']=$ulrow->PR_AGE_RANGE;

               $settingDataList= $this->Api_model->getUserSettingDataByuser(array('PR_USER_ID' =>$ulrow->PR_USER_ID));
               $ulrowData['SETTING_DATA']=$settingDataList;
                   $getUserPackageData = $this->Api_model->getUserPackage(array('EMPLOYEE_ID' =>$ulrow->PR_USER_ID));
$ulrowData['PCAKAGE']=$getUserPackageData;

               array_push($unlikeduserarray, $ulrowData);


            }




            $profilearray=array();
            $profileDtaa= $this->Api_model->getUserDataRow(array('EMPLOYEE_ID' => $EMPLOYEE_CODE));
            foreach ($profileDtaa as $prow) 
            {
               $plgalleryarray=array();
               $plgrow= $this->Api_model->getGalleryData(array('EMPLOYEE_ID' =>$prow->PR_USER_ID));
            //   foreach($plgalleryList as $plgrow)
            //   {
            //     $plg['PR_IMAGE_ID']=$plgrow->PR_IMAGE_ID;
            //     $plg['PR_IMAGE']=base_url()."files/".$plgrow->PR_IMAGE;  
            //     array_push($plgalleryarray, $plg);        
             
            //   }
                
                
                
                
            $plgalleryarray=array();
            $gal['PR_IMAGE_ID'] =$plgrow[0]->PR_IMAGE_ID;
            if($plgrow[0]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[0]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($plgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[1]->PR_IMAGE_ID;
            if($plgrow[1]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[1]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($plgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[2]->PR_IMAGE_ID;
            if($plgrow[2]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[2]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($plgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[3]->PR_IMAGE_ID;
            if($plgrow[3]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[3]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($plgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[4]->PR_IMAGE_ID;
            if($plgrow[4]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[4]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($plgalleryarray, $gal);
             $gal['PR_IMAGE_ID'] =$plgrow[5]->PR_IMAGE_ID;
            if($plgrow[5]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[5]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($plgalleryarray, $gal);
            
                
                
                
                
                
                
                
                
                
                
                
               $passion= $this->Api_model->getUserPassion(array('EMPLOYEE_ID' =>$plgrow->PR_USER_ID));
               $package_dtl= $this->Api_model->getPackageDtl();
               $sexualOrientation= $this->Api_model->getUserSexualOrientation(array('EMPLOYEE_ID' =>$plgrow->PR_USER_ID));

               $profileData['PR_USER_ID']=$prow->PR_USER_ID;
               $profileData['PR_ROLE_ID']=$prow->PR_ROLE_ID;
               $profileData['PR_USER_CODE']=$prow->PR_USER_CODE;
               $profileData['PR_PASSWORD']=$prow->PR_PASSWORD;
               $profileData['PR_PIN']=$prow->PR_PIN;
               $profileData['PR_TITLE']=$prow->PR_TITLE;
               $profileData['PR_NAME']=$prow->PR_NAME;
               $profileData['PR_EMAIL']=$prow->PR_EMAIL;
               $profileData['PR_PHONE']=$prow->PR_PHONE;
               $profileData['PR_IMAGE']=base_url()."files/".$plgrow[0]->PR_IMAGE;
               $profileData['PR_PRESENT_ADDRESS']=$prow->PR_PRESENT_ADDRESS;
               $profileData['PR_PERMANENT_ADDRESS']=$prow->PR_PERMANENT_ADDRESS;
               $profileData['PR_COUNTRY']=$prow->PR_COUNTRY;
               $profileData['PR_STATE']=$prow->PR_STATE;
               $profileData['PR_CITY']=$prow->PR_CITY;
               $profileData['PR_PINCODE']=$prow->PR_PINCODE;
               $profileData['PR_GST_NO']=$prow->PR_GST_NO;
               $profileData['PR_AADHAR_CARD_NO']=$prow->PR_AADHAR_CARD_NO;
               $profileData['PR_PANCARD_NO']=$prow->PR_PANCARD_NO;
               $profileData['PR_DL_NO']=$prow->PR_DL_NO;
               $profileData['PR_PASSPORT_NO']=$prow->PR_PASSPORT_NO;
               $profileData['PR_ACCOUNT_NO']=$prow->PR_ACCOUNT_NO;
               $profileData['PR_IFSC_CODE']=$prow->PR_IFSC_CODE;
               $profileData['PR_BANK_NAME']=$prow->PR_BANK_NAME;
               $profileData['PR_BANK_BRANCH']=$prow->PR_BANK_BRANCH;
               $profileData['PR_STATUS']=$prow->PR_STATUS;
               $profileData['PR_IMEI']=$prow->PR_IMEI;
               $profileData['PR_BATTERY']=$prow->PR_BATTERY;
               $profileData['PR_APP_VERSION']=$prow->PR_APP_VERSION;
               $profileData['PR_PHONE_BRAND']=$prow->PR_PHONE_BRAND;
               $profileData['PR_LOCATION']=$prow->PR_LOCATION;
               $profileData['PR_TOKEN']=$prow->PR_TOKEN;
               $profileData['PR_CREATED_AT']=$prow->PR_CREATED_AT;
               $profileData['PR_UPDATED_AT']=$prow->PR_UPDATED_AT;
               $profileData['PR_ADDED_BY']=$prow->PR_ADDED_BY;
               $profileData['PR_LAT_LNG']=$prow->PR_LAT_LNG;
               $profileData['PR_CTC']=$prow->PR_CTC;
               $profileData['PR_OTP']=$prow->PR_OTP;
               $profileData['PR_GENDER']=$prow->PR_GENDER;
               $profileData['PR_SEXUAL_ORIENTATION']=$sexualOrientation;
               $profileData['PR_PASSION']=$passion;
               $profileData['PR_DOB']=$prow->PR_DOB;
               $profileData['GALLERY']=$plgalleryarray;


               $profileData['PR_PACKAGE']=$prow->PR_PACKAGE_ID;
               $profileData['PR_MIN_LOCATION']=$prow->PR_MIN_LOCATION;
               $profileData['PR_AGE_RANGE']=$prow->PR_AGE_RANGE;

               $settingDataList= $this->Api_model->getUserSettingDataByuser(array('PR_USER_ID' =>$prow->PR_USER_ID));
               $profileData['SETTING_DATA']=$settingDataList;
            $getUserPackageData = $this->Api_model->getUserPackage(array('EMPLOYEE_ID' =>$prow->PR_USER_ID));
$profileData['PCAKAGE']=$getUserPackageData;
               array_push($profilearray, $profileData);


            }



            
            $mul[] = array(               
                             
                'GENDER'=>$genderArray,
                'SEXUAL_ORIENTATION'=>$genderSexArray,
                'MRITAL_STS'=>$MaritalStatusArray,
                'LANGUAGE'=>$langArray,
                'PASSION'=>$passionArray

            );

            if ($SEARCH_BY=='CONTROL') {
                $data[]=array(
               
                'CONTROL' =>$controlArray,
                'MENU' =>[],//$menuarray,                
                'DROPDOWN' =>[],
                'USERS_LIST'=>[],
                'LIKED_LIST'=>[],
                'UNLIKED_LIST'=>[],
                'PROFILE_DATA'=>[],
                'PACKAGE_DETAIL'=>[],
                'SETTING_DATA'=>[]

                

            );
            }
            elseif ($SEARCH_BY=='PACKAGE_DETAIL') {
                $data[]=array(
                
                'CONTROL' =>[],
                'MENU' =>[],                
                'DROPDOWN' =>[],
                'USERS_LIST'=>[],
                'LIKED_LIST'=>[],
                'UNLIKED_LIST'=>[],
                'PROFILE_DATA'=>[],
                'PACKAGE_DETAIL'=>$package_dtl,
                'SETTING_DATA'=>[]


            );
            }
            elseif ($SEARCH_BY=='SETTING_DATA') {
                $data[]=array(
                
                'CONTROL' =>[],
                'MENU' =>[],                
                'DROPDOWN' =>[],
                'USERS_LIST'=>[],
                'LIKED_LIST'=>[],
                'UNLIKED_LIST'=>[],
                'PROFILE_DATA'=>[],
                'PACKAGE_DETAIL'=>$package_dtl,
                'SETTING_DATA'=>$settingDataList


            );
            }

            elseif ($SEARCH_BY=='PROFILE_DATA') {
                $data[]=array(
                
                'CONTROL' =>[],
                'MENU' =>[],                
                'DROPDOWN' =>[],
                'USERS_LIST'=>[],
                'LIKED_LIST'=>[],
                'UNLIKED_LIST'=>[],
                'PROFILE_DATA'=>$profilearray,
                'PACKAGE_DETAIL'=>[],
                'SETTING_DATA'=>[]



            );
            }

            
            elseif ($SEARCH_BY=='MENU') {
                $data[]=array(
                
                'CONTROL' =>[],
                'MENU' =>$menuarray,                
                'DROPDOWN' =>[],
                'USERS_LIST'=>[],
                'LIKED_LIST'=>[],
                'UNLIKED_LIST'=>[],
                'PROFILE_DATA'=>[],
                'PACKAGE_DETAIL'=>[],
                'SETTING_DATA'=>[]



            );
            }

            
            elseif ($SEARCH_BY=='DROPDOWN') {
                $data[]=array(
             
                'CONTROL' =>[],
                'MENU' =>[],               
                'DROPDOWN' =>$mul,
                'USERS_LIST'=>[],
                'LIKED_LIST'=>[],
                'UNLIKED_LIST'=>[],
                'PROFILE_DATA'=>[],
                'PACKAGE_DETAIL'=>[],
                'SETTING_DATA'=>[]


               

            );
            }
            elseif ($SEARCH_BY=='USERS') {
                $data[]=array(
                
                'CONTROL' =>[],
                'MENU' =>[],//$menuarray,                
                'DROPDOWN' =>[],
                'USERS_LIST'=>$userarray,
                'LIKED_LIST'=>[],
                'UNLIKED_LIST'=>[],
                'PROFILE_DATA'=>[],
                'PACKAGE_DETAIL'=>[],
                'SETTING_DATA'=>[]


            );
            }
            elseif ($SEARCH_BY=='LIKED_LIST') {
                $data[]=array(
                
                'CONTROL' =>[],
                'MENU' =>[],//$menuarray,                
                'DROPDOWN' =>[],
                'USERS_LIST'=>[],
                'LIKED_LIST'=>$likeduserarray,
                'UNLIKED_LIST'=>[],
                'PROFILE_DATA'=>[],//$profilearray,
                'PACKAGE_DETAIL'=>[],
                'SETTING_DATA'=>[]


              

            );
            }
            elseif ($SEARCH_BY=='UNLIKED_LIST') {
                $data[]=array(
                
                'CONTROL' =>[],
                'MENU' =>[],//$menuarray,                
                'DROPDOWN' =>[],
                'USERS_LIST'=>[],
                'LIKED_LIST'=>[],
                'UNLIKED_LIST'=>$unlikeduserarray,//[],
                'PROFILE_DATA'=>[],
                'PACKAGE_DETAIL'=>[],
                'SETTING_DATA'=>[]


              

            );
            }
            
            else
            {
            $package_dtl= $this->Api_model->getPackageDtl();
            
            $packagearrayData=array();
          
            foreach ($package_dtl as $prow) 
            {
              $package_detail= $this->Api_model->getPackagePriceDtl(array('PACKAGE_ID'=>$prow->PR_PACKAGE_ID));
                $plg['PR_PACKAGE_ID']=$prow->PR_PACKAGE_ID;
                $plg['PR_PACKAGE_NAME']=$prow->PR_PACKAGE_NAME;
                $plg['PR_PACKAGE_DESC']=$prow->PR_PACKAGE_DESC;
                
                $plg['PACKAGE_DATA']=$package_detail;
                
                array_push($packagearrayData, $plg);        
             
            }
                
            $data[]=array(     
                'CONTROL' =>$controlArray,            
                'MENU' =>$menuArray ,                
                'DROPDOWN' =>$mul,
                'USERS_LIST'=>$userarray,
                'LIKED_LIST'=>$likeduserarray,
                'UNLIKED_LIST'=>$unlikeduserarray,
                'PROFILE_DATA'=>$profilearray,
                'PACKAGE_DETAIL'=>$packagearrayData,
                'SETTING_DATA'=>$settingDataList




               
                

            );
            }   
            $aResponce = array('STATUS' => 'SUCCESS',
                        'MESSAGE' => 'Sync Data List',
                        'TESTING'=>'N',
                        'SYNC_DATA'=>$data
                 );



        }
         $rks= json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);
//echo curl_setopt($ch, CURLOPT_POSTFIELDS, $rk);
        echo $rk;

        exit();
    }



 
    public function send_otp_post() 
    {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);

        $phone_no ="+91".$jsonArray['PHONE_NO'];
        $email =$jsonArray['EMAIL'];
        $login_type =$jsonArray['LOGIN_TYPE'];
        $token =$jsonArray['TOKEN'];
      // echo $email; exit;
        if($email)
        {
            $userMailExist = $this->Api_model->checkUserMailExist(array('EMAIL' =>$email));
            $usermCOunt = count($userMailExist);
            if ($usermCOunt == 0) 
            {
                $curdate=date('Y-m-d h:i:s');
                 $usermData=array(
                'PR_ROLE_ID'=>'3',                
                'PR_EMAIL'=>$email,
                'PR_OTP'=>$login_type,
                'PR_TOKEN'=>$token,
                'PR_CREATED_AT'=>$curdate,
                 );
                 $uid=$this->Api_model->addRow('pr_users',$usermData);

                 $this->Api_model->addRow('pr_user_setting',array('PR_USER_ID'=>$uid,'EMAIL'=>$email,'PR_STATUS'=>'1'));


                $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Login Successfully','OTP'=>"");            
            
                
                $rks = json_encode($aResponce);
                $rk = str_replace('null', '""', $rks);

                echo $rk;
            }
            else
            {
                $userMailBlock= $this->Api_model->checkUserMailExistCh(array('EMAIL' =>$email));
                $usermCOuntB = count($userMailBlock);
                if ($usermCOuntB == 0) 
                {
               

                }
                else
                {
                    $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Your are Blocked,Contact Support','OTP'=>"");            
            
                
                $rks = json_encode($aResponce);
                $rk = str_replace('null', '""', $rks);

                echo $rk;
                }
            
                

            }

        }
        else
        {
        // $this->input->post_get('PHONE_NO', true);
        $otp=rand (1000,9999 );
        $curdate=date('Y-m-d h:i:s');
        $userExist = $this->Api_model->checkUserExist(array('PR_PHONE' =>$phone_no));
        $userCOunt = count($userExist);
        if ($userCOunt == 0) 
        {
            $userData=array(
                'PR_ROLE_ID'=>'3',
                'PR_OTP'=>$otp,
                'PR_USER_CODE'=>$phone_no,
                'PR_PHONE'=>$phone_no,
                'PR_CREATED_AT'=>$curdate,
                'PR_TOKEN'=>$token
                 );
            $uid=$this->Api_model->addRow('pr_users',$userData);
            $this->Api_model->addRow('pr_user_setting',array('PR_USER_ID'=>$uid,'PHONE'=>$phone_no,'PR_STATUS'=>'1'));

                $curl = curl_init();

                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https:///api/v5/flow/",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => "{\n  \"flow_id\": \"EnterflowID\",\n  \"sender\": \"CBTECH\",\n  \"mobiles\": \"7992218175\",\n  \"VAR1\": \"VALUE 1\",\n  \"VAR2\": \"VALUE 2\"\n}",
                  CURLOPT_HTTPHEADER => array(
                    "authkey:261796Aqje0lZL5c5c0e1a",
                    "content-type: application/JSON"
                  ),
                ));

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                // if ($err) {
                //   echo "cURL Error #:" . $err;
                // } else {
                //   echo $response;
                // }
        } 
        else 
        {
                $userExistBlock = $this->Api_model->checkUserBlock(array('PR_PHONE' =>$phone_no));
            $userCOuntB = count($userExistBlock);
            if ($userCOuntB == 0) 
            {
                $this->Api_model->updateRow('pr_users',array('PR_OTP'=>$otp,'PR_UPDATED_AT'=>$curdate,'PR_TOKEN'=>$token),array('PR_PHONE'=>$phone_no));
                 $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Otp Send successfully','OTP'=>$otp);    
            }
            else
            {
                 $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Your are Blocked,Contact Support','OTP'=>'');    
            }
        }

               
            
                
        $rks = json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);

        echo $rk;
        }
    }




    public function verify_otp_post() 
    {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);

        $company_code=$jsonArray['COMPANY_CODE'];
        $phone_no =$jsonArray['PHONE_NO'];// $this->input->post_get('PHONE_NO', true);
        $otp=$jsonArray['OTP'];//$this->input->post_get('OTP', true);
        $token=$jsonArray['TOKEN'];

        if (empty($company_code)) {
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Company Code');

        }
        else if (empty($phone_no)) {
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Phone No');

        }
        // else if (empty($token)) {
          
        //     $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Token');

        // }
        else if (empty($otp)) {
          
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Otp');

        }
        else
        {



        $userExist = $this->Api_model->checkUserOtp(array('PR_PHONE' =>$phone_no));
        //$userCOunt = count($userExist);

        if ($userExist[0]->PR_OTP != $otp) 
        {
           $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Otp Not Matched'); 
        }
        // else if ($userExist[0]->PR_TOKEN != $token) 
        // {
        //    $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Token Not Matched'); 
        // } 
        else 
        {
            
            $userarray=array();
               foreach ($userExist as $urow) 
            {
                
                $getUserPackageData = $this->Api_model->getUserPackage(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
              
               $ulgalleryarray=array();
               $plgrow= $this->Api_model->getGalleryData(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
            //   foreach($galleryList as $grow)
            //   {
            //     $g['PR_IMAGE_ID']=$grow->PR_IMAGE_ID;
            //     $g['PR_IMAGE']=base_url()."files/".$grow->PR_IMAGE;  
            //     array_push($galleryarray, $g);        
             
            //   }
             $gal['PR_IMAGE_ID'] =$plgrow[0]->PR_IMAGE_ID;
            if($plgrow[0]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[0]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[1]->PR_IMAGE_ID;
            if($plgrow[1]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[1]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[2]->PR_IMAGE_ID;
            if($plgrow[2]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[2]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[3]->PR_IMAGE_ID;
            if($plgrow[3]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[3]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[4]->PR_IMAGE_ID;
            if($plgrow[4]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[4]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
             $gal['PR_IMAGE_ID'] =$plgrow[5]->PR_IMAGE_ID;
            if($plgrow[5]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[5]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
               

               $uupassion= $this->Api_model->getUserPassion(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
               $uusexualOrientation= $this->Api_model->getUserSexualOrientation(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
               
              
 
               $urowData['PR_USER_ID']=$urow->PR_USER_ID;
               $urowData['PR_ROLE_ID']=$urow->PR_ROLE_ID;
               $urowData['PR_USER_CODE']=$urow->PR_USER_CODE;
               $urowData['PR_PASSWORD']=$urow->PR_PASSWORD;
               $urowData['PR_PIN']=$urow->PR_PIN;
               $urowData['PR_TITLE']=$urow->PR_TITLE;
               $urowData['PR_NAME']=$urow->PR_NAME;
               $urowData['PR_EMAIL']=$urow->PR_EMAIL;
               $urowData['PR_PHONE']=$urow->PR_PHONE;
               $urowData['PR_IMAGE']=base_url()."files/".$urow->PR_IMAGE;
               $urowData['PR_PRESENT_ADDRESS']=$urow->PR_PRESENT_ADDRESS;
               $urowData['PR_PERMANENT_ADDRESS']=$urow->PR_PERMANENT_ADDRESS;
               $urowData['PR_COUNTRY']=$urow->PR_COUNTRY;
               $urowData['PR_STATE']=$urow->PR_STATE;
               $urowData['PR_CITY']=$urow->PR_CITY;
               $urowData['PR_PINCODE']=$urow->PR_PINCODE;
               $urowData['PR_GST_NO']=$urow->PR_GST_NO;
               $urowData['PR_AADHAR_CARD_NO']=$urow->PR_AADHAR_CARD_NO;
               $urowData['PR_PANCARD_NO']=$urow->PR_PANCARD_NO;
               $urowData['PR_DL_NO']=$urow->PR_DL_NO;
               $urowData['PR_PASSPORT_NO']=$urow->PR_PASSPORT_NO;
               $urowData['PR_ACCOUNT_NO']=$urow->PR_ACCOUNT_NO;
               $urowData['PR_IFSC_CODE']=$urow->PR_IFSC_CODE;
               $urowData['PR_BANK_NAME']=$urow->PR_BANK_NAME;
               $urowData['PR_BANK_BRANCH']=$urow->PR_BANK_BRANCH;
               $urowData['PR_STATUS']=$urow->PR_STATUS;
               $urowData['PR_IMEI']=$urow->PR_IMEI;
               $urowData['PR_BATTERY']=$urow->PR_BATTERY;
               $urowData['PR_APP_VERSION']=$urow->PR_APP_VERSION;
               $urowData['PR_PHONE_BRAND']=$urow->PR_PHONE_BRAND;
               $urowData['PR_LOCATION']=$urow->PR_LOCATION;
               $urowData['PR_TOKEN']=$urow->PR_TOKEN;
               $urowData['PR_CREATED_AT']=$urow->PR_CREATED_AT;
               $urowData['PR_UPDATED_AT']=$urow->PR_UPDATED_AT;
               $urowData['PR_ADDED_BY']=$urow->PR_ADDED_BY;
               $urowData['PR_LAT_LNG']=$urow->PR_LAT_LNG;
               $urowData['PR_CTC']=$urow->PR_CTC;
               $urowData['PR_OTP']=$urow->PR_OTP;
               $urowData['PR_GENDER']=$urow->PR_GENDER;
               $urowData['PR_SEXUAL_ORIENTATION']=$uusexualOrientation;
               $urowData['PR_PASSION']=$uupassion;
               $urowData['PR_DOB']=$urow->PR_DOB;
               $urowData['GALLERY']=$ulgalleryarray;

               $urowData['PR_PACKAGE']=$urow->PR_PACKAGE_ID;
               $urowData['PR_MIN_LOCATION']=$urow->PR_MIN_LOCATION;
               $urowData['PR_AGE_RANGE']=$urow->PR_AGE_RANGE;
               
               $urowData['PCAKAGE']=$getUserPackageData;
               

               $settingData = array();
           
               $settingDataList= $this->Api_model->getUserSettingDataByuser(array('PR_USER_ID' =>$urow->PR_USER_ID));
               $urowData['SETTING_DATA']=$settingDataList;


$urowData['PCAKAGE_UTILIZATION']=array('LIKE'=>'','SUPER_LIKE'=>'');
               array_push($profilearray, $profileData);


               $urowData['ABOUT']=$urow->ABOUT;
               $urowData['JOB_TITLE']=$urow->JOB_TITLE;
               $urowData['SCHOOL']=$urow->SCHOOL;
               $urowData['COMPANY']=$urow->COMPANY;
               $urowData['PROFILE_SHOW']=$urow->PROFILE_SHOW;
               $urowData['SYSYTEM_VISIBILITY']=$urow->SYSYTEM_VISIBILITY;
               $urowData['PROFILE_UPDATE_STS']=$urow->PROFILE_UPDATE_STS;
               $urowData['DONT_SHOW_MY_AGE']=$urow->DONT_SHOW_MY_AGE;
               $urowData['DONT_SHOW_MY_GENDER']=$urow->DONT_SHOW_MY_GENDER;
               $urowData['MARITAL_STS']=$urow->MARITAL_STS;
                $urowData['SHOW_GENDER']=$urow->SHOW_GENDER;

               array_push($userarray, $urowData);


}
           if($userExist[0]->PROFILE_UPDATE_STS=="1")
           {
            $rs="old";
           }
           else
           {
            $rs="new";
           }

           $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Otp Verified successfully','USER_DATA'=>$userarray,'USER_PROFILE_STS'=>$rs,'PROFILE_UPDATE_STS'=>$userExist[0]->PROFILE_UPDATE_STS); 
             
        }

           }      
            
                
        $rks = json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);

        echo $rk;
        exit();
    }

    public function profile_update_post() {
        error_reporting(0);

        $jsonArray=json_decode(file_get_contents('php://input'),true);
        //print_r($jsonArray); exit;
        $COMPANY_CODE=$jsonArray['COMPANY_CODE'];
        //$app_key =$jsonArray['APP_KEY'];// $this->input->post_get('APP_KEY', true);
        $COMPANY_CODE =$jsonArray['COMPANY_CODE']; // $this->input->post_get('COMPANY_CODE', true);
        $PHONE =$jsonArray['PHONE']; // $this->input->post_get('PHONE', true);
        $NAME =$jsonArray['NAME']; // $this->input->post_get('NAME', true);
        $GENDER =$jsonArray['GENDER']; 
       // $USER_ID =$jsonArray['USER_ID'];// $this->input->post_get('GENDER', true);
        $SEXUAL_ORIENTATION =$jsonArray['SEXUAL_ORIENTATION']; //$this->input->post_get('SEXUAL_ORIENTATION', true);
        $PASSION =$jsonArray['PASSION']; //exit; // $this->input->post_get('PASSION', true);
        $imageD =$jsonArray['FILE']; //exit;
        //$token =$jsonArray['TOKEN'];
        $profileSts =$jsonArray['PROFILE_UPDATE_STS'];
        $DOB =$jsonArray['DOB']; // $this->input->post_get('DOB', true);
        $curdate=date('Y-m-d h:i:s');
        
        $ABOUT =$jsonArray['ABOUT']; 
        $JOB_TITLE =$jsonArray['JOB_TITLE'];
        $COMPANY =$jsonArray['COMPANY']; 
        $SCHOOL=$jsonArray['SCHOOL']; 
        $PROFILE_SHOW =$jsonArray['PROFILE_SHOW']; 
        $SYSYTEM_VISIBILITY =$jsonArray['SYSYTEM_VISIBILITY']; 
        $PROFILE_UPDATE_STS =$jsonArray['PROFILE_UPDATE_STS']; 
        $PR_LOCATION =$jsonArray['PR_LOCATION']; 
        $PR_MARITAL_STS =$jsonArray['MARITAL_STS']; 
        $DONT_SHOW_MY_AGE =$jsonArray['DONT_SHOW_MY_AGE']; 
        $DONT_SHOW_MY_GENDER=$jsonArray['MARITAL_STS']; 
        $SHOW_GENDER=$jsonArray['SHOW_GENDER']; 

   

        //$aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Not valid data');
        if (empty($COMPANY_CODE)) {
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Company Code !');
            //$aResponce['MESSAGE'] = 'Please Enter Company Code !';
        }
        else if (empty($PHONE)) {
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Phone No !');
            //$aResponce['MESSAGE'] = 'Please Enter Phone No !';
        }
        else if (empty($NAME)) {
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Name !');
            //$aResponce['MESSAGE'] = 'Please Enter Name !';
        }
        else if (empty($GENDER)) {
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Gender !');
            //$aResponce['MESSAGE'] = 'Please Enter Gender !';
        }
        else 
        {
            //     $test="+91".$PHONE;
            //  $userExist = $this->Api_model->getUserDataRow(array('PHONE' =>$test));
            //  if($userExist)
            //  {
             
            $likeduserarray=array();
            // $r=str_replace("+91","",$PHONE);
            //echo "Hello"; exit;
            $test=$PHONE;
             $userExist = $this->Api_model->getUserDataRow(array('PHONE' =>$test));
    $r=$this->Api_model->updateRow('pr_users',array('SHOW_GENDER'=>$SHOW_GENDER,'MARITAL_STS'=>$PR_MARITAL_STS,'DONT_SHOW_MY_AGE'=>$DONT_SHOW_MY_AGE,'DONT_SHOW_MY_GENDER'=>$DONT_SHOW_MY_GENDER,'PR_LOCATION'=>$PR_LOCATION,'PROFILE_UPDATE_STS'=>$PROFILE_UPDATE_STS,'PROFILE_SHOW'=>$PROFILE_SHOW,'SYSYTEM_VISIBILITY'=>$SYSYTEM_VISIBILITY,'ABOUT'=>$ABOUT,'JOB_TITLE'=>$JOB_TITLE,'COMPANY'=>$COMPANY,'SCHOOL'=>$SCHOOL,'PR_NAME'=>$NAME,'PR_GENDER'=>$GENDER,'PR_DOB'=>$DOB,'PR_UPDATED_AT'=>$curdate,'PROFILE_UPDATE_STS'=>$profileSts),array('PR_PHONE'=>$test));
          
// $SEXUAL_ORIENTATION=str_replace("[","",$SEXUAL_ORIENTATION);
// $SEXUAL_ORIENTATION=str_replace("]","",$SEXUAL_ORIENTATION);
// $SEXUAL_ORIENTATION=explode(",",$SEXUAL_ORIENTATION);

$this->Api_model->deleteRow('pr_user_sexual_orientation',array('PR_USER_ID'=>$userExist[0]->PR_USER_ID));   
//print_r($SEXUAL_ORIENTATION); exit;
foreach($SEXUAL_ORIENTATION as $so)
{

        $this->Api_model->addRow('pr_user_sexual_orientation',array('PR_USER_ID'=>$userExist[0]->PR_USER_ID,'PR_SEXUAL_ORIENTATION'=>$so['NAME'],'PR_ENTRY_DATE'=>$curdate)); 
}

$this->Api_model->deleteRow('pr_user_passion',array('PR_USER_ID'=>$userExist[0]->PR_USER_ID));
foreach($PASSION as $pa)
{
    $this->Api_model->addRow('pr_user_passion',array('PR_USER_ID'=>$userExist[0]->PR_USER_ID,'PR_PASSION'=>$pa['NAME'],'PR_ENTRY_DATE'=>$curdate)); 
}

$this->Api_model->deleteRow('pr_user_images',array('PR_USER_ID'=>$userExist[0]->PR_USER_ID));
foreach($imageD as $img)
{
    $this->Api_model->addRow('pr_user_images',array('PR_USER_ID'=>$userExist[0]->PR_USER_ID,'PR_IMAGE'=>$img['NAME'],'PR_ENTRY_DATE'=>$curdate)); 
}


// $s=count($SEXUAL_ORIENTATION); 
// $this->Api_model->deleteRow('pr_user_sexual_orientation',array('PR_USER_ID'=>$userExist[0]->PR_USER_ID));
// for($i=0; $i<$s; $i++)
// {
//     $this->Api_model->addRow('pr_user_sexual_orientation',array('PR_USER_ID'=>$userExist[0]->PR_USER_ID,'PR_SEXUAL_ORIENTATION'=>$SEXUAL_ORIENTATION[$i],'PR_ENTRY_DATE'=>$curdate)); 
// }


// $PASSION=str_replace("[","",$PASSION);
// $PASSION=str_replace("]","",$PASSION);
// $PASSION=explode(",",$PASSION);
// $this->Api_model->deleteRow('pr_user_passion',array('PR_USER_ID'=>$userExist[0]->PR_USER_ID));
// $p=count($PASSION); 
// for($j=0; $j<$p;  $j++)
// {
//     $this->Api_model->addRow('pr_user_passion',array('PR_USER_ID'=>$userExist[0]->PR_USER_ID,'PR_PASSION'=>$PASSION[$j],'PR_ENTRY_DATE'=>$curdate));  
// }


// $imageD=str_replace("[","",$imageD);
// $imageD=str_replace("]","",$imageD);
// $imageD=explode(",",$imageD);
// $this->Api_model->deleteRow('pr_user_images',array('PR_USER_ID'=>$userExist[0]->PR_USER_ID));
// $f=count($imageD); 
// //echo $f; exit;
// for($rr=0; $rr<$f;  $rr++)
// {
//      $this->Api_model->addRow('pr_user_images',array('PR_USER_ID'=>$userExist[0]->PR_USER_ID,'PR_IMAGE'=>$imageD[$rr],'PR_ENTRY_DATE'=>$curdate));  
// }

// }
// else
// {
//          echo  $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'User Not Exist');   
// }

$likeduserarray=array();       
$userExist = $this->Api_model->getUserDataRow(array('PHONE' =>$test));
            
foreach($userExist as $lrow)
{
    
       $ulgalleryarray=array();
               $plgrow= $this->Api_model->getGalleryData(array('EMPLOYEE_ID' =>$userExist[0]->PR_USER_ID));
            //   foreach($galleryList as $grow)
            //   {
            //     $g['PR_IMAGE_ID']=$grow->PR_IMAGE_ID;
            //     $g['PR_IMAGE']=base_url()."files/".$grow->PR_IMAGE;  
            //     array_push($galleryarray, $g);        
             
            //   }
             $gal['PR_IMAGE_ID'] =$plgrow[0]->PR_IMAGE_ID;
            if($plgrow[0]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[0]->PR_IMAGE;
            }
            else if($plgrow[0]->PR_IMAGE=="0")
            {
                $gal['PR_IMAGE'] ="";
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[1]->PR_IMAGE_ID;
            if($plgrow[1]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[1]->PR_IMAGE;
            }
            else if($plgrow[0]->PR_IMAGE=="0")
            {
                $gal['PR_IMAGE'] ="";
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[2]->PR_IMAGE_ID;
            if($plgrow[2]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[2]->PR_IMAGE;
            }
            else if($plgrow[0]->PR_IMAGE=="0")
            {
                $gal['PR_IMAGE'] ="";
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[3]->PR_IMAGE_ID;
            if($plgrow[3]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[3]->PR_IMAGE;
            }
            else if($plgrow[0]->PR_IMAGE=="0")
            {
                $gal['PR_IMAGE'] ="";
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[4]->PR_IMAGE_ID;
            if($plgrow[4]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[4]->PR_IMAGE;
            }
            else if($plgrow[0]->PR_IMAGE=="0")
            {
                $gal['PR_IMAGE'] ="";
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
             $gal['PR_IMAGE_ID'] =$plgrow[5]->PR_IMAGE_ID;
            if($plgrow[5]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[5]->PR_IMAGE;
            }
            else if($plgrow[0]->PR_IMAGE=="0")
            {
                $gal['PR_IMAGE'] ="";
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
               
               $passion= $this->Api_model->getUserPassion(array('EMPLOYEE_ID' =>$userExist[0]->PR_USER_ID));
              //print_r($passion);
               $package_dtl= $this->Api_model->getPackageDtl();
               $sexualOrientation= $this->Api_model->getUserSexualOrientation(array('EMPLOYEE_ID' =>$userExist[0]->PR_USER_ID));

               $lrowData['PR_USER_ID']=$lrow->PR_USER_ID;
               $lrowData['PR_ROLE_ID']=$lrow->PR_ROLE_ID;
               $lrowData['PR_USER_CODE']=$lrow->PR_USER_CODE;
               $lrowData['PR_PASSWORD']=$lrow->PR_PASSWORD;
               $lrowData['PR_PIN']=$lrow->PR_PIN;
               $lrowData['PR_TITLE']=$lrow->PR_TITLE;
               $lrowData['PR_NAME']=$lrow->PR_NAME;
               $lrowData['PR_EMAIL']=$lrow->PR_EMAIL;
               $lrowData['PR_PHONE']=$lrow->PR_PHONE;
               $lrowData['PR_IMAGE']=$lrow->PR_IMAGE;
               $lrowData['PR_PRESENT_ADDRESS']=$lrow->PR_PRESENT_ADDRESS;
               $lrowData['PR_PERMANENT_ADDRESS']=$lrow->PR_PERMANENT_ADDRESS;
               $lrowData['PR_COUNTRY']=$lrow->PR_COUNTRY;
               $lrowData['PR_STATE']=$lrow->PR_STATE;
               $lrowData['PR_CITY']=$lrow->PR_CITY;
               $lrowData['PR_PINCODE']=$lrow->PR_PINCODE;
               $lrowData['PR_GST_NO']=$lrow->PR_GST_NO;
               $lrowData['PR_AADHAR_CARD_NO']=$lrow->PR_AADHAR_CARD_NO;
               $lrowData['PR_PANCARD_NO']=$lrow->PR_PANCARD_NO;
               $lrowData['PR_DL_NO']=$lrow->PR_DL_NO;
               $lrowData['PR_PASSPORT_NO']=$lrow->PR_PASSPORT_NO;
               $lrowData['PR_ACCOUNT_NO']=$lrow->PR_ACCOUNT_NO;
               $lrowData['PR_IFSC_CODE']=$lrow->PR_IFSC_CODE;
               $lrowData['PR_BANK_NAME']=$lrow->PR_BANK_NAME;
               $lrowData['PR_BANK_BRANCH']=$lrow->PR_BANK_BRANCH;
               $lrowData['PR_STATUS']=$lrow->PR_STATUS;
               $lrowData['PR_IMEI']=$lrow->PR_IMEI;
               $lrowData['PR_BATTERY']=$lrow->PR_BATTERY;
               $lrowData['PR_APP_VERSION']=$lrow->PR_APP_VERSION;
               $lrowData['PR_PHONE_BRAND']=$lrow->PR_PHONE_BRAND;
               $lrowData['PR_LOCATION']=$lrow->PR_LOCATION;
               $lrowData['PR_TOKEN']=$lrow->PR_TOKEN;
               $lrowData['PR_CREATED_AT']=$lrow->PR_CREATED_AT;
               $lrowData['PR_UPDATED_AT']=$lrow->PR_UPDATED_AT;
               $lrowData['PR_ADDED_BY']=$lrow->PR_ADDED_BY;
               $lrowData['PR_LAT_LNG']=$lrow->PR_LAT_LNG;
               $lrowData['PR_CTC']=$lrow->PR_CTC;
               $lrowData['PR_OTP']=$lrow->PR_OTP;
               $lrowData['PR_GENDER']=$lrow->PR_GENDER;
               $lrowData['PR_SEXUAL_ORIENTATION']=$sexualOrientation;
               $lrowData['PR_PASSION']=$passion;
               $lrowData['PR_DOB']=$lrow->PR_DOB;
               $lrowData['GALLERY']=$ulgalleryarray;

               $lrowData['PR_PACKAGE']=$lrow->PR_PACKAGE_ID;
               $lrowData['PR_MIN_LOCATION']=$lrow->PR_MIN_LOCATION;
               $lrowData['PR_AGE_RANGE']=$lrow->PR_AGE_RANGE;

               $settingDataList= $this->Api_model->getUserSettingDataByuser(array('PR_USER_ID' =>$lrow->PR_USER_ID));
               $lrowData['SETTING_DATA']=$settingDataList;
               
               $lrowData['ABOUT']=$lrow->ABOUT;
               $lrowData['JOB_TITLE']=$lrow->JOB_TITLE;
               $lrowData['SCHOOL']=$lrow->SCHOOL;
               $lrowData['COMPANY']=$lrow->COMPANY;
               $lrowData['PROFILE_SHOW']=$lrow->PROFILE_SHOW;
               $lrowData['SYSYTEM_VISIBILITY']=$lrow->SYSYTEM_VISIBILITY;
               $lrowData['PROFILE_UPDATE_STS']=$lrow->PROFILE_UPDATE_STS;
               $lrowData['DONT_SHOW_MY_AGE']=$lrow->DONT_SHOW_MY_AGE;
               $lrowData['DONT_SHOW_MY_GENDER']=$lrow->DONT_SHOW_MY_GENDER;
               $lrowData['MARITAL_STS']=$lrow->MARITAL_STS;
               $lrowData['SHOW_GENDER']=$lrow->SHOW_GENDER;

             


               array_push($likeduserarray, $lrowData);
              

   } 
    $aResponce = array('STATUS' => 'SUCCESS',
                        'MESSAGE' => 'Profile Updated Successfully',
                        'PROFILE_DATA'=>$likeduserarray
                  );    
}    
          $rks = json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);

        echo $rk;
        exit();
        
        exit();
    }


      public function setting_update_post() {
error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);

        $rks=$jsonArray['EMPLOYEE_CODE'];
        //print_r($rks); exit;
        $COMPANY_CODE=$jsonArray['COMPANY_CODE'];
        //$app_key =$jsonArray['APP_KEY'];// $this->input->post_get('APP_KEY', true);
        $USER_ID =$jsonArray['EMPLOYEE_CODE']; 
        $EMAIL =$jsonArray['EMAIL']; 
        $PHONE =$jsonArray['PHONE']; // $this->input->post_get('PHONE', true);
        $LOCATION =$jsonArray['LOCATION']; // $this->input->post_get('NAME', true);
        $MAXIMUM_DISTANCE =$jsonArray['MAXIMUM_DISTANCE']; // $this->input->post_get('GENDER', true);
        $LOKING_FOR =$jsonArray['MAXIMUM_DISTANCE']; // $jsonArray['SEXUAL_ORIENTATION']; //$this->input->post_get('SEXUAL_ORIENTATION', true);
        $AGE_RANGE =$jsonArray['AGE_RANGE']; //$jsonArray['PASSION']; // $this->input->post_get('PASSION', true);
        $SHOW_ME_ON_TINDER =$jsonArray['SHOW_ME_ON_TINDER']; // $this->input->post_get('DOB', true);
        $MANAGE_READ_RECEIPTENT=$jsonArray['MANAGE_READ_RECEIPTENT']; 
         $RECENTLY_ACTIVE_STS =$jsonArray['RECENTLY_ACTIVE_STS']; // $this->input->post_get('PHONE', true);
        $EMAIL_MATCHES =$jsonArray['EMAIL_MATCHES']; // $this->input->post_get('NAME', true);
        $EMAIL_MSG =$jsonArray['EMAIL_MSG']; // $this->input->post_get('GENDER', true);
        $EMAIL_PROMOTION =$jsonArray['EMAIL_PROMOTION']; // $jsonArray['SEXUAL_ORIENTATION']; //$this->input->post_get('SEXUAL_ORIENTATION', true);
        $NOTIFICATION_MATCHES =$jsonArray['NOTIFICATION_MATCHES']; //$jsonArray['PASSION']; // $this->input->post_get('PASSION', true);
        $NOTIFICATION_MSG =$jsonArray['NOTIFICATION_MSG']; // $this->input->post_get('DOB', true);
        $NOTIFICATION_PROMOTION=$jsonArray['NOTIFICATION_PROMOTION']; 

        $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Not valid data');
       if($jsonArray['EMPLOYEE_CODE']=="")
       {
        $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Employee Mandatory');
       }   
       else {       
     $userExist = $this->Api_model->getUserSettingDataByuser(array('PR_USER_ID' =>$jsonArray['EMPLOYEE_CODE']));
        $userCOunt = count($userExist);
        if($userCOunt=="0")
        {
       // $this->Api_model->addRow('pr_user_setting',array('EMAIL'=>$EMAIL,'PHONE'=>$PHONE,'LOCATION'=>$LOCATION,'MAXIMUM_DISTANCE'=>$MAXIMUM_DISTANCE,'LOKING_FOR'=>$LOKING_FOR,'AGE_RANGE'=>$AGE_RANGE,'SHOW_ME_ON_TINDER'=>$SHOW_ME_ON_TINDER,'MANAGE_READ_RECEIPTENT'=> $MANAGE_READ_RECEIPTENT,'RECENTLY_ACTIVE_STS'=> $RECENTLY_ACTIVE_STS,'EMAIL_MATCHES'=> $EMAIL_MATCHES,'EMAIL_MSG'=>$EMAIL_MSG,'EMAIL_PROMOTION'=>$EMAIL_PROMOTION,'NOTIFICATION_MATCHES'=> $NOTIFICATION_MATCHES,'NOTIFICATION_MSG'=>$NOTIFICATION_MSG,'NOTIFICATION_PROMOTION'=>$NOTIFICATION_PROMOTION,'PR_USER_ID'=>$USER_ID)); 

    $this->Api_model->addRow('pr_user_setting',array('MAXIMUM_DISTANCE'=>$MAXIMUM_DISTANCE,'AGE_RANGE'=>$AGE_RANGE,'PR_USER_ID'=>$jsonArray['EMPLOYEE_CODE'],'response'=>$rks)); 



}
else
{



    $this->Api_model->updateRow('pr_user_setting',array('MAXIMUM_DISTANCE'=>$MAXIMUM_DISTANCE,'AGE_RANGE'=>$AGE_RANGE,'response'=>$rks),array('PR_USER_ID'=>$jsonArray['EMPLOYEE_CODE'])); 

    // $this->Api_model->updateRow('pr_user_setting',array('EMAIL'=>$EMAIL,'PHONE'=>$PHONE,'LOCATION'=>$LOCATION,'MAXIMUM_DISTANCE'=>$MAXIMUM_DISTANCE,'LOKING_FOR'=>$LOKING_FOR,'AGE_RANGE'=>$AGE_RANGE,'SHOW_ME_ON_TINDER'=>$SHOW_ME_ON_TINDER,'MANAGE_READ_RECEIPTENT'=> $MANAGE_READ_RECEIPTENT,'RECENTLY_ACTIVE_STS'=> $RECENTLY_ACTIVE_STS,'EMAIL_MATCHES'=> $EMAIL_MATCHES,'EMAIL_MSG'=>$EMAIL_MSG,'EMAIL_PROMOTION'=>$EMAIL_PROMOTION,'NOTIFICATION_MATCHES'=> $NOTIFICATION_MATCHES,'NOTIFICATION_MSG'=>$NOTIFICATION_MSG,'NOTIFICATION_PROMOTION'=>$NOTIFICATION_PROMOTION),array('PR_USER_ID'=>$USER_ID));   

}

        $aResponce = array('STATUS' => 'SUCCESS',
                        'MESSAGE' => 'Setting Updated Successfully'
                  );
        }
        echo json_encode($aResponce);
        exit();
    }




    public function like_unlike_post() {
        error_reporting(0);

        $jsonArray=json_decode(file_get_contents('php://input'),true);
        //print_r($jsonArray); exit;
        $COMPANY_CODE=$jsonArray['COMPANY_CODE'];
        //$app_key =$jsonArray['APP_KEY'];// $this->input->post_get('APP_KEY', true);
        $EMPLOYEE_ID =$jsonArray['EMPLOYEE_ID']; // $this->input->post_get('COMPANY_CODE', true);
        $USER_ID =$jsonArray['USER_ID']; // $this->input->post_get('PHONE', true);
        $STATUS =$jsonArray['STATUS']; // $this->input->post_get('NAME', true);
        
        $curdate=date('Y-m-d h:i:s');

        if($STATUS =="1")
        {
            $message="Someone Liked You ! Click to see";
        }
        else if($STATUS =="2")
        {
            $message="Someone Super Liked You ! Click to see";
        }
        else
        {

        }


        $likeListCount= $this->Api_model->getLikedUserData(array('EMPLOYEE_ID'=>$EMPLOYEE_ID));

        if(count($likeListCount)=="5")
        {
             $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Already Liked !', 'PAYMENT_STS' => '1');
        }
        else
        {

        $likeList2= $this->Api_model->getLikedUserData_chk(array('PR_USER_ID'=>$EMPLOYEE_ID,'PR_LIKED_USER_ID'=>$USER_ID));
        if($likeList2)
        {
             $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Already Liked !', 'PAYMENT_STS' => '0');
        }
        else
        {
       

        $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Not valid data');
        if (empty($COMPANY_CODE)) {
            $aResponce['MESSAGE'] = 'Please Enter Company Code !';
        }
        else 
        {           
            $this->Api_model->addRow('users_like_unlike',array('PR_USER_ID'=>$EMPLOYEE_ID,'PR_LIKED_USER_ID'=>$USER_ID,'PR_LIKE_UNLIKE'=>$STATUS,'PR_STATUS'=>$STATUS ,'PR_ENTRY_DATE'=>$curdate));
            
            if($STATUS=="1" || $STATUS =="2" )
            {
            $empdata1 = $this->Api_model->getSingleUserDataRow(array('PR_USER_ID' =>$USER_ID));
           // print_r($empdata1); exit;
                   $token =$empdata1->PR_TOKEN;
                   //echo $token; exit;
                  // echo FCM_SERVER_KEY;
                    $headers = array
                        (
                        'Authorization: key='.FCM_SERVER_KEY,
                        'Content-Type: application/json'
                    );
                    $msg = array(
                        'message_id' => '1',
                        'notification_type' => 'Mail',
                        'title' => 'Mego',
                        'message' => $message,
                        'vibrate' => 1,
                        'sound' => 1,
                        'largeIcon' => 'large_icon',
                        'smallIcon' => 'small_icon'
                    );
                    $fields = array(
                        'to' => $token,
                        'data' => $msg
                    );
                    
//                     $fieldsNotify ='{
//   "notification": {
//     "body":'.$message.',
//     "title": "Mego"
//   },
//   "priority": "high",
//   "data": {
//     "click_action": "FLUTTER_NOTIFICATION_CLICK",
//     "other_data": "any message",
   
//   },
//   "to": "'.$token.'"
// }';

   $aRr = array(
                'notification' =>array('body'=>$message,'title'=>'Mego'),
                'priority'=>'high',
                'data'=>array('click_action'=>'FLUTTER_NOTIFICATION_CLICK','other_data'=>'any message'),
                'to'=>$token);
                
$rrrrr=json_encode($aRr);
//echo $rrrrr;
                       
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $rrrrr);
                    $result = curl_exec($ch);
//print_r($result); exit;
                    curl_close($ch);
$aResponce = array('STATUS' => 'SUCCESS',
                        'MESSAGE' => 'Liked Successfully',
                        'PAYMENT_STS' => '0',
                        // 'F_DATA'=>$fieldsNotify
                  );
                }

            
            else
            {
                $aResponce = array('STATUS' => 'SUCCESS','MESSAGE' => 'UnLiked Successfully','PAYMENT_STS' => '0',
                );
                }

        }
    }
}
        echo json_encode($aResponce);
        exit();
    }

//      public function image_post() {
//         // base_url(); exit;
//         error_reporting(0);
//         $app_key = $this->input->get_request_header('APP_KEY');
//         // $IMAGE= $this->input->post_get('IMAGE', true);
//         $COMPANY_CODE = $this->input->get_request_header('COMPANY_CODE');
// //         print_r($_FILES["IMAGE"]["name"]); 
// //         echo "__";
// //        echo $file_size = $_FILES['IMAGE']['size'];
// // echo "______";
// //        echo $file_type = $_FILES['IMAGE']['type'];
       
// //         exit;
//         $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Not valid data');


//         // $path='assets/uploaded_images/';
//         // file_put_contents($path . $IMAGE, $IMAGE);

//         $config['upload_path'] = 'files';
//         $config['allowed_types'] = '*';
//         $config['max_size'] = '10240'; //max_size in kb
//         if ($_FILES['IMAGE']['name']) {
//             $new_name = $_FILES['IMAGE']['name'];
//             $config['file_name'] = $_FILES['IMAGE']['name'];
//             $this->load->library('upload', $config);
//             $this->upload->initialize($config);
//             if ($this->upload->do_upload('IMAGE')) {
//                 $dataupload = $this->upload->data();
//                 $photo = $dataupload['file_name'];
//             } else {
//                 $photo = "";
//             }
//         } else {
//             $photo = "";
//         }

//         if($photo=="")
//         {
//             $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Oops ! something went wrong,Please try again ','IMAGE_NAME'=>"",'IMAGE_URL'=>"");
//         }
//         else{
//             $c=base_url().'files/'.$photo;
//             $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Image Submitted successfully','IMAGE_NAME'=>$photo,'IMAGE_URL'=>$c);

//         }

        


//         echo json_encode($aResponce);
//         exit();
//     }

     public function image_post() {
        // base_url(); exit;
        //error_reporting(0);
        $n='';//$_FILES['IMAGE']['name'];
        $si=$_FILES['IMAGE']['size'];
        $r=array('name'=>$n,'size'=>$si);
       // echo $_FILES['IMAGE']['name']; exit;
      // $data = file_get_contents("php://input");
   // echo $data; exit;

     $s=json_encode($r);

        $this->Api_model->addRow('pr_logs',array('TYP'=>'imageUpload','DATA' =>$s));


    //      exit;
        //echo $_FILES['IMAGE']['name']; exit;
        $app_key = $this->input->get_request_header('APP_KEY');
        // $IMAGE= $this->input->post_get('IMAGE', true);
        $COMPANY_CODE = $this->input->get_request_header('COMPANY_CODE');
        //print_r($_FILES["IMAGE"]["name"]); exit;
        $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Not valid data');


        // $path='assets/uploaded_images/';
        // file_put_contents($path . $IMAGE, $IMAGE);

        $config['upload_path'] = 'files';
        $config['allowed_types'] = '*';
        $config['max_size'] = '10240'; //max_size in kb
        if ($_FILES['IMAGE']['name']) {
            $new_name = $_FILES['IMAGE']['name'];
            $config['file_name'] = $_FILES['IMAGE']['name'];
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('IMAGE')) {
                $dataupload = $this->upload->data();
                $photo = $dataupload['file_name'];
            } else {
                $photo = "";
            }
        } else {
            $photo = "";
        }


        //    $config['upload_path'] =base_url().'assets/uploaded_images/1';
        // $config['allowed_types'] = '*';
        // $config['max_size']  = '10240';//max_size in kb
        //            $new_name =  $_FILES['IMAGE']['name'];
        //            $config['file_name'] =$new_name;
        //            $this->load->library('upload',$config);
        //         $this->upload->initialize($config);
        //            if($this->upload->do_upload('IMAGE'))
        //            {
        //                $dataupload=$this->upload->data();
        //                $new_name = $dataupload['file_name'];
        //            }
        //         else
        //            {
        //          $new_name="";
        //            }


        
        // if($photo=="")
        // {
        //     $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Oops ! something went wrong,Please try again ','IMAGE_NAME'=>"",'IMAGE_URL'=>"");
        // }
        // else{
        if($photo)
        {
            $c=base_url().'files/'.$photo;
            $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Image Submitted successfully','IMAGE_NAME'=>$photo,'IMAGE_URL'=>$c);
        }
        else
        {
             $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Image Not uploaded','IMAGE_NAME'=>'','IMAGE_URL'=>'');
        }

        // }


        echo json_encode($aResponce);
        exit();
    }

     public function profileimage_post() {
       $jsonArray=json_decode(file_get_contents('php://input'),true);
        //print_r($jsonArray); exit;
        $USER_ID=$jsonArray['EMPLOYEE_CODE'];
        $plgrow= $this->Api_model->getGalleryData(array('EMPLOYEE_ID' =>$USER_ID));
       // echo $plgrow[0]->PR_IMAGE_ID; exit;
        if($plgrow)
        {
        $IMAGE=$jsonArray['IMAGE'];
        $this->Api_model->updateRow('pr_user_images',array('PR_IMAGE'=>$IMAGE),array('PR_IMAGE_ID'=>$plgrow[0]->PR_IMAGE_ID));   
    }
    else
    {
        $this->Api_model->addRow('pr_user_images',array('PR_IMAGE'=>$IMAGE,'PR_USER_ID'=>$USER_ID));   
    }
        
        $aResponce = array('STATUS' => 'SUCCESS',
                        'MESSAGE' => 'Profile Image Successfully',
                        'IMAGE'=>'https://megodating.com/files/'.$IMAGE
                  );
        

        echo json_encode($aResponce);
        exit();
    }
    

    public function create_call_post() 
    {       error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);
        
        $dat=date('Y-m-d h:i:s');
        $startTime=date('h:i:s');
        $data = array(
            'PR_USER_ID' =>$jsonArray['PR_USER_ID'],
            'PR_CALLER_ID' =>$jsonArray['PR_CALLER_ID'],
            'APP_ID'=>"5dada291391941e2ac48aa229b2fe3c2",//"7601114608204952b496f90e2890c6d1",
            'CERTIFICAE_ID'=>"745e419369f44eaa9a1a5a9ccede957e",//"6f7f4339b0d64adab28ca56ef850a387",
            'PR_ROOM_ID' =>"",
            'PR_UID_TOKEN' =>"",
            'PR_ACCOUNT_TOKEN' =>"",
            'PR_CALLING_STATUS' =>"start",
            'PR_CALLING_TYPE' =>$jsonArray['PR_CALL_TYPE'],
            'PR_ENTRY_DATE' => $dat,
            'CALL_START_TIME'=>$startTime
        );
        $callSts= $this->Api_model->getUserCallDataSts($jsonArray['PR_USER_ID'],"engage");
        if($callSts)
        {
            $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Busy on Another Call');
        
        }
        
        else
        {
            
        $message="call";
        $empdata1 = $this->Api_model->getSingleUserDataRow(array('PR_USER_ID' =>$jsonArray['PR_CALLER_ID']));
        $token =$empdata1->PR_TOKEN; //exit;
        // echo FCM_SERVER_KEY;
        $headers = array
        (
            'Authorization: key='.FCM_SERVER_KEY,
            'Content-Type: application/json'
        ); 
        $callSts2= $this->Api_model->getUserCallDataSts($jsonArray['PR_USER_ID'],"start");
        if($callSts2)
        {  
           
        $callType=$jsonArray['PR_CALL_TYPE'];
        $rks2 = json_encode($callSts2, true);
        
       //  print_r($rks2); exit;
        $rkss2 = str_replace('null', '""', $rks2);
        $rkss2 = str_replace('\n', '', $rks2);
//echo $rkss2; exit;

        $aRr = array(
                'notification' =>array('body'=>$message,'title'=>'Mego'),
                'priority'=>'high',
                'data'=>array('click_action'=>'FLUTTER_NOTIFICATION_CLICK','other_data'=>'any message','call_type'=>$callType,'call_data'=>$rkss2),
                'to'=>$token);
                
$rrrrr=json_encode($aRr);
//echo $rrrrr; exit;
//  echo  $rrrrr = str_replace('null', '""', $rrrrr);
//   exit;               
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $rrrrr);
                    $result = curl_exec($ch);
//print_r($result); exit;
                    curl_close($ch);
          $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Channel Id Created','DATA'=>$callSts2);
        
      
        }
        else
        {
        $insertedData=$this->Api_model->addRow('create_call',$data);
        $callType=$jsonArray['PR_CALL_TYPE'];
        $passe =$jsonArray['PR_USER_ID'].''.time();
         
        $urrl="http://mego.codebright.in/tokenG/RtcTokenBuilderSample2.php?chanel_id=".$passe."&database=mego&sheduleid=".$insertedData;

        // header( "Location:".$urrl );

        
        $curl = curl_init();

        // set our url with curl_setopt()
        curl_setopt($curl, CURLOPT_URL,$urrl);
        // return the transfer as a string, also with setopt()
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);       
        curl_close($curl);
        
        $callingDta = $this->Api_model->getUserCallData($insertedData);
        $message="call";
        $empdata1 = $this->Api_model->getSingleUserDataRow(array('PR_USER_ID' =>$jsonArray['PR_CALLER_ID']));
      $token =$empdata1->PR_TOKEN; //exit;
        // echo FCM_SERVER_KEY;
        $headers = array
        (
            'Authorization: key='.FCM_SERVER_KEY,
            'Content-Type: application/json'
        );
        
        $rks2 = json_encode($callingDta, JSON_UNESCAPED_SLASHES);
        $rkss2 = str_replace('null', '""', $rks2);
         $rkss2 = str_replace('\n', '', $rks2);


        $aRr = array(
                'notification' =>array('body'=>$message,'title'=>'Mego'),
                'priority'=>'high',
                'data'=>array('click_action'=>'FLUTTER_NOTIFICATION_CLICK','other_data'=>'any message','call_type'=>$callType,'call_data'=>$rkss2),
                'to'=>$token);
                
$rrrrr=json_encode($aRr);
//echo $rrrrr;
//  echo  $rrrrr = str_replace('null', '""', $rrrrr);
//   exit;               
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $rrrrr);
                    $result = curl_exec($ch);
//print_r($result); exit;
                    curl_close($ch);
                    $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Channel Id Created','DATA'=>$callingDta);
        }
        }
                

                
        
         $rks = json_encode($aResponce, JSON_UNESCAPED_SLASHES);
        $rk = str_replace('null', '""', $rks);
        $rk = str_replace('\n', '', $rks);

        echo $rk;
        exit();

    }
    
    public function call_data_list_post() 
    {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);


        $user_id=$jsonArray['PR_USER_ID'];// $this->input->post_get('PHONE_NO', true);
       
        $callList= $this->Api_model->getUserCallDataList($user_id);
             
        $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Call Notification List','CALL_DATA_LIST'=>$callList); 
        
         echo json_encode($aResponce);
        exit();
             
    }
    
    
      public function call_sts_update_post() {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);
        //print_r($jsonArray); exit;
        $COMPANY_CODE=$jsonArray['COMPANY_CODE'];
       
        $CALL_ID =$jsonArray['PR_CALL_ID']; 
        $STATUS =$jsonArray['PR_STATUS']; 
       
        $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Not valid data');
    
        $this->Api_model->updateRow('create_call',array('PR_CALLING_STATUS'=>$STATUS),array('PR_CALL_ID'=>$CALL_ID));   
        if($STATUS=="finish")
        {
        $aResponce = array('STATUS' => 'EXCEPTION',
                        'MESSAGE' => 'CALl ENDED Successfully'
                  );
        }
        else
        {
        $aResponce = array('STATUS' => 'SUCCESS',
                        'MESSAGE' => 'Call Status Updated Successfully'
                  );
        }
        
        echo json_encode($aResponce);
        exit();
    }
    
    // public function checkout() 
    // {
    //     $jsonArray=json_decode(file_get_contents('php://input'),true);
    //     $EMPLOYEE_CODE=$jsonArray['$EMPLOYEE_CODE'];
    //     $usersList= $this->Api_model->getUserData(array('EMPLOYEE_ID' => $EMPLOYEE_CODE));
        
    //     print_r($usersList);
    //     exit;

    // }
    
    
    
      public function social_register_post() {
error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);
        //print_r($jsonArray); exit;
        $NAME=$jsonArray['NAME'];
        $EMAIL =$jsonArray['EMAIL']; 
        $PHONE =$jsonArray['PHONE']; 
        $GENDER =$jsonArray['GENDER'];
        $LOCATION =$jsonArray['PR_LOCATION'];
        $token =$jsonArray['TOKEN'];
        $curdate=date('Y-m-d h:i:s');

         if (empty($EMAIL)) {
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Email');

        }
        else if (empty($token)) {
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Token');

        }
       
        else
        {

           
     $userMailExist = $this->Api_model->checkUserMailExist(array('EMAIL' =>$EMAIL));
            $usermCOunt = count($userMailExist);
            if ($userMailExist) 
            {
                  $this->Api_model->updateRow('pr_users',array( 'PR_LOCATION'=>$LOCATION,'PR_ROLE_ID'=>'3','PR_NAME'=>$NAME,'PR_GENDER'=>$GENDER,'PR_TOKEN'=>$token,'PR_PHONE'=>$PHONE,'PR_CREATED_AT'=>$curdate,'PROFILE_UPDATE_STS'=>$jsonArray['PROFILE_UPDATE_STS']),array('PR_EMAIL'=>$EMAIL));   
                $USEReX="old";
                 $userD =$userMailExist;
            }
            else
            {
                $rrr="+91".$PHONE;
                 $curdate=date('Y-m-d h:i:s');
                 $usermData=array(
                'PR_ROLE_ID'=>'3',                
                'PR_EMAIL'=>$EMAIL,
                'PR_NAME'=>$NAME,
                'PR_GENDER'=>$GENDER,
                'PR_TOKEN'=>$token,
                'PR_PHONE'=>$rrr,
                'PR_CREATED_AT'=>$curdate,
                'PROFILE_UPDATE_STS'=>$jsonArray['PROFILE_UPDATE_STS']
                 );
                 $uid=$this->Api_model->addRow('pr_users',$usermData);
                
                   $aResponce = array('STATUS' => 'SUCCESS',
                        'MESSAGE' => 'User Added Successfully'
                  );
                  $USEReX="new";
                   $userD = $this->Api_model->getUserDataRow(array('EMPLOYEE_ID' =>$uid));
            }
          $userarray=array();
               foreach ($userD as $urow) 
            {
                
                $getUserPackageData = $this->Api_model->getUserPackage(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
              
               $ulgalleryarray=array();
               $plgrow= $this->Api_model->getGalleryData(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
            //   foreach($galleryList as $grow)
            //   {
            //     $g['PR_IMAGE_ID']=$grow->PR_IMAGE_ID;
            //     $g['PR_IMAGE']=base_url()."files/".$grow->PR_IMAGE;  
            //     array_push($galleryarray, $g);        
             
            //   }
             $gal['PR_IMAGE_ID'] =$plgrow[0]->PR_IMAGE_ID;
            if($plgrow[0]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[0]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[1]->PR_IMAGE_ID;
            if($plgrow[1]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[1]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[2]->PR_IMAGE_ID;
            if($plgrow[2]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[2]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[3]->PR_IMAGE_ID;
            if($plgrow[3]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[3]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[4]->PR_IMAGE_ID;
            if($plgrow[4]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[4]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
             $gal['PR_IMAGE_ID'] =$plgrow[5]->PR_IMAGE_ID;
            if($plgrow[5]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[5]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
               

               $uupassion= $this->Api_model->getUserPassion(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
               $uusexualOrientation= $this->Api_model->getUserSexualOrientation(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
               
              
 
               $urowData['PR_USER_ID']=$urow->PR_USER_ID;
               $urowData['PR_ROLE_ID']=$urow->PR_ROLE_ID;
               $urowData['PR_USER_CODE']=$urow->PR_USER_CODE;
               $urowData['PR_PASSWORD']=$urow->PR_PASSWORD;
               $urowData['PR_PIN']=$urow->PR_PIN;
               $urowData['PR_TITLE']=$urow->PR_TITLE;
               $urowData['PR_NAME']=$urow->PR_NAME;
               $urowData['PR_EMAIL']=$urow->PR_EMAIL;
               $urowData['PR_PHONE']=$urow->PR_PHONE;
               $urowData['PR_IMAGE']=base_url()."files/".$urow->PR_IMAGE;
               $urowData['PR_PRESENT_ADDRESS']=$urow->PR_PRESENT_ADDRESS;
               $urowData['PR_PERMANENT_ADDRESS']=$urow->PR_PERMANENT_ADDRESS;
               $urowData['PR_COUNTRY']=$urow->PR_COUNTRY;
               $urowData['PR_STATE']=$urow->PR_STATE;
               $urowData['PR_CITY']=$urow->PR_CITY;
               $urowData['PR_PINCODE']=$urow->PR_PINCODE;
               $urowData['PR_GST_NO']=$urow->PR_GST_NO;
               $urowData['PR_AADHAR_CARD_NO']=$urow->PR_AADHAR_CARD_NO;
               $urowData['PR_PANCARD_NO']=$urow->PR_PANCARD_NO;
               $urowData['PR_DL_NO']=$urow->PR_DL_NO;
               $urowData['PR_PASSPORT_NO']=$urow->PR_PASSPORT_NO;
               $urowData['PR_ACCOUNT_NO']=$urow->PR_ACCOUNT_NO;
               $urowData['PR_IFSC_CODE']=$urow->PR_IFSC_CODE;
               $urowData['PR_BANK_NAME']=$urow->PR_BANK_NAME;
               $urowData['PR_BANK_BRANCH']=$urow->PR_BANK_BRANCH;
               $urowData['PR_STATUS']=$urow->PR_STATUS;
               $urowData['PR_IMEI']=$urow->PR_IMEI;
               $urowData['PR_BATTERY']=$urow->PR_BATTERY;
               $urowData['PR_APP_VERSION']=$urow->PR_APP_VERSION;
               $urowData['PR_PHONE_BRAND']=$urow->PR_PHONE_BRAND;
               $urowData['PR_LOCATION']=$urow->PR_LOCATION;
               $urowData['PR_TOKEN']=$urow->PR_TOKEN;
               $urowData['PR_CREATED_AT']=$urow->PR_CREATED_AT;
               $urowData['PR_UPDATED_AT']=$urow->PR_UPDATED_AT;
               $urowData['PR_ADDED_BY']=$urow->PR_ADDED_BY;
               $urowData['PR_LAT_LNG']=$urow->PR_LAT_LNG;
               $urowData['PR_CTC']=$urow->PR_CTC;
               $urowData['PR_OTP']=$urow->PR_OTP;

               if($urow->DONT_SHOW_MY_GENDER=="1")
               {
                $urowData['PR_GENDER']="";
               }
               else
               {
                $urowData['PR_GENDER']=$urow->PR_GENDER;
               }

              
               // if($urow->DONT_SHOW_MY_AGE=="1")
               // {
               //  $urowData['PR_DOB']="";
               // }
               // else
               // {
               //  $urowData['PR_DOB']=$urow->PR_DOB;
               // }
               $urowData['PR_DOB']=$urow->PR_DOB;
                //$urowData['PR_GENDER']=$urow->PR_GENDER;
               $urowData['PR_SEXUAL_ORIENTATION']=$uusexualOrientation;
               $urowData['PR_PASSION']=$uupassion;
               $urowData['GALLERY']=$ulgalleryarray;

               $urowData['PR_PACKAGE']=$urow->PR_PACKAGE_ID;
               $urowData['PR_MIN_LOCATION']=$urow->PR_MIN_LOCATION;
               $urowData['PR_AGE_RANGE']=$urow->PR_AGE_RANGE;
               
               $urowData['PCAKAGE']=$getUserPackageData;
               

               $settingData = array();
           
               $settingDataList= $this->Api_model->getUserSettingDataByuser(array('PR_USER_ID' =>$urow->PR_USER_ID));
               $urowData['SETTING_DATA']=$settingDataList;


               array_push($userarray, $urowData);


}
        $aResponce = array('STATUS' => 'SUCCESS',
                        'MESSAGE' => 'User Updated Successfully',
                        'USER_PROFILE_STSE' =>$USEReX,
                        'USER_DATA' =>$userarray
                  );
    }
                    $rks= json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);
//echo curl_setopt($ch, CURLOPT_POSTFIELDS, $rk);
        echo $rk;
        exit();
    }

    
    
    
    public function complaint_post() {

        $jsonArray=json_decode(file_get_contents('php://input'),true);
        //print_r($jsonArray); exit;
        $COMPANY_CODE=$jsonArray['COMPANY_CODE'];
        //$app_key =$jsonArray['APP_KEY'];// $this->input->post_get('APP_KEY', true);
        $USER_ID =$jsonArray['USER_ID']; // $this->input->post_get('COMPANY_CODE', true);
        $GUILTY_ID =$jsonArray['GUILTY_ID']; // $this->input->post_get('PHONE', true);
        $CATEGORY_ID =$jsonArray['CATEGORY_ID'];
        $SUB_CATEGORY_ID =$jsonArray['SUB_CATEGORY_ID'];
        $REMARKS =$jsonArray['REMARKS']; // $this->input->post_get('NAME', true);
        
        $curdate=date('Y-m-d h:i:s');

               

        $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Not valid data');
        if (empty($COMPANY_CODE)) {
            $aResponce['MESSAGE'] = 'Please Enter Company Code !';
        }
        else 
        {           
            $this->Api_model->addRow('pr_complaint',array('USER_ID'=>$USER_ID,'GUILTY_ID'=>$GUILTY_ID,'CATEGORY_ID'=>$CATEGORY_ID,'SUB_CATEGORY_ID'=>$SUB_CATEGORY_ID,'REMARKS'=>$REMARKS,'STATUS'=>'1','CREATED_AT'=>$curdate));
            
            
            $aResponce = array('STATUS' => 'SUCCESS',
                        'MESSAGE' => 'Thanku for reaching about your experience.',
                        // 'F_DATA'=>$fieldsNotify
                  );
        }
        echo json_encode($aResponce);
        exit();
    }



 public function category_post() 
    {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);


      //  $user_id=$jsonArray['PR_USER_ID'];// $this->input->post_get('PHONE_NO', true);
       
        $categoryList= $this->Api_model->getcategoryList();
        $categoryArray=array();
        $subcategoryArray=array();
        foreach($categoryList as $crow)
        {
               $urowData['CATEGORY_ID']=$crow->CATEGORY_ID;
               $urowData['CATEGORY']=$crow->CATEGORY;
               $urowData['CATEGORY_DESC']=$crow->CATEGORY_DESC;
               $urowData['PARENT_ID']=$crow->PARENT_ID;
               $urowData['STATUS']=$crow->STATUS;

               $subcategoryList= $this->Api_model->getSubcategoryList($crow->CATEGORY_ID);
                 foreach($subcategoryList as $scrow)
            {
               $urow1Data['SUB_CATEGORY_ID']=$scrow->CATEGORY_ID;
               $urow1Data['SUB_CATEGORY']=$scrow->CATEGORY;
               $urow1Data['SUB_CATEGORY_DESC']=$scrow->CATEGORY_DESC;
               $urow1Data['PARENT_ID']=$scrow->PARENT_ID;
               $urow1Data['STATUS']=$scrow->STATUS;
                array_push($subcategoryArray, $urow1Data);
             }

               $urowData['SUB_CATEGORY']=$subcategoryArray;
               array_push($categoryArray, $urowData);
                //$subcategoryArray=array();
           }
             
        $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Category List','CATEGORY_LIST'=>$categoryArray); 
        
         echo json_encode($aResponce);
        exit();
             
    }
     public function sub_category_post() 
    {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);


        $category_id=$jsonArray['CATEGORY_ID'];// $this->input->post_get('PHONE_NO', true);
       
        $categoryList= $this->Api_model->getSubcategoryList($category_id);
             
        $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Sub Category List','SUB_CATEGORY_LIST'=>$categoryList); 
        
         echo json_encode($aResponce);
        exit();
             
    }
     public function complaint_list_post() 
    {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);


        $user_id=$jsonArray['USER_ID'];// $this->input->post_get('PHONE_NO', true);
       
        $categoryList= $this->Api_model->getUserComplaintList($user_id);
             
        $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Complaint List','Complaint_LIST'=>$categoryList); 
        
         echo json_encode($aResponce);
        exit();
             
    }






    /*****************New Api Collection**************************/

    public function send_otp2_post() 
    {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);
        //print_r($jsonArray); exit;
        $company_code =$jsonArray['COMPANY_CODE'];
        $phone_no =$jsonArray['PHONE_NO'];
        $email =$jsonArray['EMAIL']; 
        $LOCATION =$jsonArray['PR_LOCATION'];      
        $login_type =$jsonArray['LOGIN_TYPE'];
        $token =$jsonArray['TOKEN'];
        // echo $email; exit;
        if (empty($company_code)) {
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Company Code');

        }
        else if (empty($phone_no)) 
        {
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Phone No');

        }
        else if (empty($token)) 
        {
          
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Token');

        }
        else
        {


        $otp=rand (1000,9999 );
        $curdate=date('Y-m-d h:i:s');
        $userExist = $this->Api_model->checkUserExist(array('PR_PHONE' =>$phone_no));
        $userCOunt = count($userExist);
        if ($userCOunt == 0) 
        {
            $userData=array(
                'PR_ROLE_ID'=>'3',
                'PR_OTP'=>$otp,
                'PR_TOKEN'=>$token,
                'PR_USER_CODE'=>$phone_no,
                'PR_PHONE'=>$phone_no,
                'PR_CREATED_AT'=>$curdate,
                'PR_STATUS'=>'1',
                'PR_TOKEN'=>$token
                 );
            $uid=$this->Api_model->addRow('pr_users',$userData);
            $this->Api_model->addRow('pr_user_setting',array('PR_USER_ID'=>$uid,'PHONE'=>$phone_no));
//             $message="Your mego verification code is :-".$otp.".";
            
//                    $token =$token;
//                    //echo $token; exit;
//                   // echo FCM_SERVER_KEY;
//                     $headers = array
//                         (
//                         'Authorization: key='.FCM_SERVER_KEY,
//                         'Content-Type: application/json'
//                     );
//                     $msg = array(
//                         'message_id' => '1',
//                         'notification_type' => 'Otp',
//                         'title' => 'Mego',
//                         'message' => $message,
//                         'vibrate' => 1,
//                         'sound' => 1,
//                         'largeIcon' => 'large_icon',
//                         'smallIcon' => 'small_icon'
//                     );
//                     $fields = array(
//                         'to' => $token,
//                         'data' => $msg
//                     );
                    


//    $aRr = array(
//                 'notification' =>array('body'=>$message,'title'=>'Mego'),
//                 'priority'=>'high',
//                 'data'=>array('click_action'=>'FLUTTER_NOTIFICATION_CLICK','other_data'=>'any message'),
//                 'to'=>$token);
                
// $rrrrr=json_encode($aRr);
// //echo $rrrrr;
                       
//                     $ch = curl_init();
//                     curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
//                     curl_setopt($ch, CURLOPT_POST, true);
//                     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//                     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//                     curl_setopt($ch, CURLOPT_POSTFIELDS, $rrrrr);
//                     $result = curl_exec($ch);
// //print_r($result); exit;
//                     curl_close($ch);


// // $urlMsg="https://api.msg91.com/api/v5/otp?template_id=1207162525473296640&mobile=".$phone_no."&authkey=261796Aqje0lZL5c5c0e1a";
// $urlMsg="https://control.msg91.com/api/sendhttp.php";
// $senderId = "CBTCRM";
// $authKey="261796Aqje0lZL5c5c0e1a";
// //Your message to send, Add URL encoding here.
// $mess="Dear user, Your OTP is ".$otp.", Team CODEBRIGHT.";
// $message = urlencode($mess);

// //Define route
// $route = "4";
// //Prepare you post parameters
//         $postDataMsg = array(
//             'authkey' => $authKey,
//             'mobiles' => $phone_no,
//             'message' => $message,
//             'sender' => $senderId,
//             'route' => $route
//         );

//         $chMsg = curl_init();
//         curl_setopt_array($chMsg, array(
//             CURLOPT_URL => $urlMsg,
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_POST => true,
//             CURLOPT_POSTFIELDS => $postDataMsg
//                 //,CURLOPT_FOLLOWLOCATION => true
//         ));


// //Ignore SSL certificate verification
//         curl_setopt($chMsg, CURLOPT_SSL_VERIFYHOST, 0);
//         curl_setopt($chMsg, CURLOPT_SSL_VERIFYPEER, 0);


// //get response
//         $output = curl_exec($chMsg);

//         if (curl_errno($chMsg)) {
//             echo 'error:' . curl_error($chMsg);
//         }

// print_r(chMsg); exit;
//         curl_close($chMsg);



$apiKey = urlencode('NDU1MzU1NzA0YTUxNjk2MjczNDE3NjQ5MzQ2MjQ3NzE=');
  
    $phone=$phone_no;
        $numbers =array($phone_no);
        $sender = urlencode('MEGOAP');
 $mesage=rawurlencode("Your one-time OTP is ".$otp.". Do not share it with anyone.
Thank you,
Team Mego");

//echo $message;
     
        $numbers = implode(',', $numbers);
     
        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
     


    // $ch = curl_init();
    //    $target_url = 'https://api.textlocal.in/send/';
    //    curl_setopt($ch, CURLOPT_URL,$target_url);
    //    curl_setopt($ch, CURLOPT_POST,1);
    //    curl_setopt($ch, CURLOPT_ENCODING, '');
    //    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    //    curl_setopt($ch, CURLOPT_HEADER, false);
    //    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    //    $response = curl_exec($ch);
        $ch = curl_init();
        $target_url ='smsc.co.in/api/mt/SendSMS?APIKey=A2qfBNIpH0q0PbRnquJsLg&senderid=MEGOAP&channel=2&DCS=0&flashsms=0&number='.$phone.'&text='.$mesage.'&route=31';



      curl_setopt($ch, CURLOPT_URL,$target_url);
       curl_setopt($ch, CURLOPT_POST,1);
       curl_setopt($ch, CURLOPT_ENCODING, '');
       curl_setopt($ch, CURLOPT_POSTFIELDS, '');
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
       curl_setopt($ch, CURLOPT_HEADER, false);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

       $response = curl_exec($ch);













                     $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Otp Send successfully ..','OTP'=>$otp);
        }
        else 
        {


             $userExistBlock = $this->Api_model->checkUserBlock(array('PR_PHONE' =>$phone_no));
            $userCOuntB = count($userExistBlock);
            if ($userCOuntB == 0) 
            {


                    $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Your are Blocked,Contact Support','OTP'=>'');  
                }
                 else
                {
            $this->Api_model->updateRow('pr_users',array('PR_OTP'=>$otp,'PR_UPDATED_AT'=>$curdate,'PR_TOKEN'=>$token),array('PR_PHONE'=>$phone_no));





//              $message="Your mego verification code is :-".$otp.".";
            
//                    $token =$token;
//                    //echo $token; exit;
//                   // echo FCM_SERVER_KEY;
//                     $headers = array
//                         (
//                         'Authorization: key='.FCM_SERVER_KEY,
//                         'Content-Type: application/json'
//                     );
//                     $msg = array(
//                         'message_id' => '1',
//                         'notification_type' => 'Otp',
//                         'title' => 'Mego',
//                         'message' => $message,
//                         'vibrate' => 1,
//                         'sound' => 1,
//                         'largeIcon' => 'large_icon',
//                         'smallIcon' => 'small_icon'
//                     );
//                     $fields = array(
//                         'to' => $token,
//                         'data' => $msg
//                     );
                    


//    $aRr = array(
//                 'notification' =>array('body'=>$message,'title'=>'Mego'),
//                 'priority'=>'high',
//                 'data'=>array('click_action'=>'FLUTTER_NOTIFICATION_CLICK','other_data'=>'any message'),
//                 'to'=>$token);
                
// $rrrrr=json_encode($aRr);
// //echo $rrrrr;
                       
//                     $ch = curl_init();
//                     curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
//                     curl_setopt($ch, CURLOPT_POST, true);
//                     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//                     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//                     curl_setopt($ch, CURLOPT_POSTFIELDS, $rrrrr);
//                     $result = curl_exec($ch);
// //print_r($result); exit;
//                     curl_close($ch);







$apiKey = urlencode('NDU1MzU1NzA0YTUxNjk2MjczNDE3NjQ5MzQ2MjQ3NzE=');
  
    $phone=$phone_no;
        $numbers =array($phone_no);
        $sender = urlencode('VCAREJ');
//         $message = rawurlencode('Your one-time OTP is '.$otp.'. Do not share it with anyone.
// Thank you,
// Team VCare Jobs');
        $mesage=rawurlencode("Your one-time OTP is ".$otp.". Do not share it with anyone.
Thank you,
Team Mego");

//echo $message;
     
        $numbers = implode(',', $numbers);
     
        // Prepare data for POST request
        $data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
     


    // $ch = curl_init();
    //    $target_url = 'https://api.textlocal.in/send/';
    //    curl_setopt($ch, CURLOPT_URL,$target_url);
    //    curl_setopt($ch, CURLOPT_POST,1);
    //    curl_setopt($ch, CURLOPT_ENCODING, '');
    //    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    //    curl_setopt($ch, CURLOPT_HEADER, false);
    //    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

    //    $response = curl_exec($ch);
        $ch = curl_init();
        $target_url ='smsc.co.in/api/mt/SendSMS?APIKey=A2qfBNIpH0q0PbRnquJsLg&senderid=MEGOAP&channel=2&DCS=0&flashsms=0&number='.$phone.'&text='.$mesage.'&route=31';



      curl_setopt($ch, CURLOPT_URL,$target_url);
       curl_setopt($ch, CURLOPT_POST,1);
       curl_setopt($ch, CURLOPT_ENCODING, '');
       curl_setopt($ch, CURLOPT_POSTFIELDS, '');
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
       curl_setopt($ch, CURLOPT_HEADER, false);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

       $response = curl_exec($ch);
///print_r($response); exit;

// $url = 'smsc.co.in/api/mt/SendSMS?APIKey=A2qfBNIpH0q0PbRnquJsLg&senderid=MEGOAP&channel=2&DCS=0&flashsms=0&number='.$phone.'&text='.$mesage.'&route=31';
// echo $url; exit;
//         // init the resource
//         $ch = curl_init();
//         curl_setopt_array($ch, array(
//             CURLOPT_URL => $url,
//             CURLOPT_RETURNTRANSFER => true,
//             CURLOPT_POST => true,
//                 // CURLOPT_POSTFIELDS => $postData
//                 //,CURLOPT_FOLLOWLOCATION => true
//         ));


//         //Ignore SSL certificate verification
//         curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


//         //get response
//         $output = curl_exec($ch);

//         //Print error if any
//         if (curl_errno($ch)) {
//             echo 'error:' . curl_error($ch); exit;
//         }

//         curl_close($ch);


  // $url = 'http://smsc.co.in/api/mt/SendSMS?APIKey=A2qfBNIpH0q0PbRnquJsLg&senderid=MEGOAP&channel=2&DCS=0&flashsms=0&number='.$phone.'&text='.$message.'&route=31';
  //       // init the resource
  //       $ch = curl_init();
  //       curl_setopt_array($ch, array(
  //           CURLOPT_URL => $url,
  //           CURLOPT_RETURNTRANSFER => true,
  //           CURLOPT_POST => true,
  //               // CURLOPT_POSTFIELDS => $postData
  //               //,CURLOPT_FOLLOWLOCATION => true
  //       ));


  //       //Ignore SSL certificate verification
  //       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  //       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


  //       //get response
  //       $output = exit; curl_exec($ch);

// print_r($response); exit;
//print_r($response); exit;
        $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Otp Send successfully.','OTP'=>$otp);
                }
                
            }
        
        }
                   
          
                
        $rks = json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);

        echo $rk;
        
    }


      public function send_otp_mupdate_post() 
    {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);

        $s=json_encode($jsonArray);

        $this->Api_model->addRow('pr_logs',array('TYP'=>'sendUpdateOtp','DATA' =>$s));


        //print_r($jsonArray); exit;
        $company_code =$jsonArray['COMPANY_CODE'];
        $phone_no =$jsonArray['PHONE_NO'];
        $email =$jsonArray['EMAIL']; 
        $LOCATION =$jsonArray['PR_LOCATION'];      
        $login_type =$jsonArray['LOGIN_TYPE'];
        $token =$jsonArray['TOKEN'];
        // echo $email; exit;
        if (empty($company_code)) {
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Company Code');

        }
        else if (empty($phone_no)) 
        {
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Phone No');

        }
        else if (empty($token)) 
        {
          
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Token');

        }
        else
        {


        $otp=rand (1000,9999 );
        $curdate=date('Y-m-d h:i:s');
        // $userExist = $this->Api_model->checkUserExist(array('PR_PHONE' =>$phone_no));
        // $userCOunt = count($userExist);
        // if ($userCOunt == 0) 
        // {
            // $userData=array(
            //     'PR_ROLE_ID'=>'3',
            //     'PR_OTP'=>$otp,
            //     'PR_TOKEN'=>$token,
            //     'PR_USER_CODE'=>$phone_no,
            //     'PR_PHONE'=>$phone_no,
            //     'PR_CREATED_AT'=>$curdate,
               
            //     'PR_TOKEN'=>$token
            //      );
         $this->Api_model->updateRow('pr_users',array('PR_OTP'=>$otp,'PR_UPDATED_AT'=>$curdate),array('PR_TOKEN'=>$token));
           // $uid=$this->Api_model->addRow('pr_users',$userData);
            //$this->Api_model->addRow('pr_user_setting',array('PR_USER_ID'=>$uid,'PHONE'=>$phone_no));
            $message="Your mego verification code is :-".$otp.".";
            
                   $token =$token;
                   //echo $token; exit;
                  // echo FCM_SERVER_KEY;
                    $headers = array
                        (
                        'Authorization: key='.FCM_SERVER_KEY,
                        'Content-Type: application/json'
                    );
                    $msg = array(
                        'message_id' => '1',
                        'notification_type' => 'Otp',
                        'title' => 'Mego',
                        'message' => $message,
                        'vibrate' => 1,
                        'sound' => 1,
                        'largeIcon' => 'large_icon',
                        'smallIcon' => 'small_icon'
                    );
                    $fields = array(
                        'to' => $token,
                        'data' => $msg
                    );
                    


   $aRr = array(
                'notification' =>array('body'=>$message,'title'=>'Mego'),
                'priority'=>'high',
                'data'=>array('click_action'=>'FLUTTER_NOTIFICATION_CLICK','other_data'=>'any message'),
                'to'=>$token);
                
$rrrrr=json_encode($aRr);
//echo $rrrrr;
                       
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $rrrrr);
                    $result = curl_exec($ch);
//print_r($result); exit;
                    curl_close($ch);

                     $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Otp Send successfully','OTP'=>$otp);
//         }
//         else 
//         {
//             $this->Api_model->updateRow('pr_users',array('PR_OTP'=>$otp,'PR_UPDATED_AT'=>$curdate,'PR_TOKEN'=>$token),array('PR_PHONE'=>$phone_no));





//              $message="Your mego verification code is :-".$otp.".";
            
//                    $token =$token;
//                    //echo $token; exit;
//                   // echo FCM_SERVER_KEY;
//                     $headers = array
//                         (
//                         'Authorization: key='.FCM_SERVER_KEY,
//                         'Content-Type: application/json'
//                     );
//                     $msg = array(
//                         'message_id' => '1',
//                         'notification_type' => 'Otp',
//                         'title' => 'Mego',
//                         'message' => $message,
//                         'vibrate' => 1,
//                         'sound' => 1,
//                         'largeIcon' => 'large_icon',
//                         'smallIcon' => 'small_icon'
//                     );
//                     $fields = array(
//                         'to' => $token,
//                         'data' => $msg
//                     );
                    


//    $aRr = array(
//                 'notification' =>array('body'=>$message,'title'=>'Mego'),
//                 'priority'=>'high',
//                 'data'=>array('click_action'=>'FLUTTER_NOTIFICATION_CLICK','other_data'=>'any message'),
//                 'to'=>$token);
                
// $rrrrr=json_encode($aRr);
// //echo $rrrrr;
                       
//                     $ch = curl_init();
//                     curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
//                     curl_setopt($ch, CURLOPT_POST, true);
//                     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//                     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//                     curl_setopt($ch, CURLOPT_POSTFIELDS, $rrrrr);
//                     $result = curl_exec($ch);
// //print_r($result); exit;
//                     curl_close($ch);
//  $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Otp Send successfully','OTP'=>$otp);
//                 }
        
        }
                   
          
                
        $rks = json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);

        echo $rk;
        
    }



    public function verify_otp_mupdate_post() 
    {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);

        $s=json_encode($jsonArray);

        $this->Api_model->addRow('pr_logs',array('TYP'=>'verifyUpdateOtp','DATA' =>$s));


        $company_code=$jsonArray['COMPANY_CODE'];
        $phone_no =$jsonArray['PHONE_NO'];// $this->input->post_get('PHONE_NO', true);
        $otp=$jsonArray['OTP'];//$this->input->post_get('OTP', true);
        $token=$jsonArray['TOKEN'];

        if (empty($company_code)) {
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Company Code');

        }
        else if (empty($phone_no)) {
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Phone No');

        }
        else if (empty($token)) {
          
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Token');

        }
        else if (empty($otp)) {
          
            $aResponce= array('STATUS' => 'FAILURE', 'MESSAGE' => 'Please Enter Otp');

        }
        else
        {



        $userExist = $this->Api_model->checkUserOtp2(array('TOKEN' =>$token));
        //$userCOunt = count($userExist);

        if ($userExist[0]->PR_OTP != $otp) 
        {
           $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Otp Not Matched'); 
        }
        else if ($userExist[0]->PR_TOKEN != $token) 
        {
           $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Token Not Matched'); 
        } 
        else 
        {
            $this->Api_model->updateRow('pr_users',array('PR_UPDATED_AT'=>$curdate,'PR_PHONE'=>$phone_no),array('PR_TOKEN'=>$token));
            
            $userarray=array();
               foreach ($userExist as $urow) 
            {
                
                $getUserPackageData = $this->Api_model->getUserPackage(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
              
               $ulgalleryarray=array();
               $plgrow= $this->Api_model->getGalleryData(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
            //   foreach($galleryList as $grow)
            //   {
            //     $g['PR_IMAGE_ID']=$grow->PR_IMAGE_ID;
            //     $g['PR_IMAGE']=base_url()."files/".$grow->PR_IMAGE;  
            //     array_push($galleryarray, $g);        
             
            //   }
             $gal['PR_IMAGE_ID'] =$plgrow[0]->PR_IMAGE_ID;
            if($plgrow[0]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[0]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[1]->PR_IMAGE_ID;
            if($plgrow[1]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[1]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[2]->PR_IMAGE_ID;
            if($plgrow[2]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[2]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[3]->PR_IMAGE_ID;
            if($plgrow[3]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[3]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[4]->PR_IMAGE_ID;
            if($plgrow[4]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[4]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
             $gal['PR_IMAGE_ID'] =$plgrow[5]->PR_IMAGE_ID;
            if($plgrow[5]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[5]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
               

               $uupassion= $this->Api_model->getUserPassion(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
               $uusexualOrientation= $this->Api_model->getUserSexualOrientation(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
               
              
 
               $urowData['PR_USER_ID']=$urow->PR_USER_ID;
               $urowData['PR_ROLE_ID']=$urow->PR_ROLE_ID;
               $urowData['PR_USER_CODE']=$urow->PR_USER_CODE;
               $urowData['PR_PASSWORD']=$urow->PR_PASSWORD;
               $urowData['PR_PIN']=$urow->PR_PIN;
               $urowData['PR_TITLE']=$urow->PR_TITLE;
               $urowData['PR_NAME']=$urow->PR_NAME;
               $urowData['PR_EMAIL']=$urow->PR_EMAIL;
               $urowData['PR_PHONE']=$urow->PR_PHONE;
               $urowData['PR_IMAGE']=base_url()."files/".$urow->PR_IMAGE;
               $urowData['PR_PRESENT_ADDRESS']=$urow->PR_PRESENT_ADDRESS;
               $urowData['PR_PERMANENT_ADDRESS']=$urow->PR_PERMANENT_ADDRESS;
               $urowData['PR_COUNTRY']=$urow->PR_COUNTRY;
               $urowData['PR_STATE']=$urow->PR_STATE;
               $urowData['PR_CITY']=$urow->PR_CITY;
               $urowData['PR_PINCODE']=$urow->PR_PINCODE;
               $urowData['PR_GST_NO']=$urow->PR_GST_NO;
               $urowData['PR_AADHAR_CARD_NO']=$urow->PR_AADHAR_CARD_NO;
               $urowData['PR_PANCARD_NO']=$urow->PR_PANCARD_NO;
               $urowData['PR_DL_NO']=$urow->PR_DL_NO;
               $urowData['PR_PASSPORT_NO']=$urow->PR_PASSPORT_NO;
               $urowData['PR_ACCOUNT_NO']=$urow->PR_ACCOUNT_NO;
               $urowData['PR_IFSC_CODE']=$urow->PR_IFSC_CODE;
               $urowData['PR_BANK_NAME']=$urow->PR_BANK_NAME;
               $urowData['PR_BANK_BRANCH']=$urow->PR_BANK_BRANCH;
               $urowData['PR_STATUS']=$urow->PR_STATUS;
               $urowData['PR_IMEI']=$urow->PR_IMEI;
               $urowData['PR_BATTERY']=$urow->PR_BATTERY;
               $urowData['PR_APP_VERSION']=$urow->PR_APP_VERSION;
               $urowData['PR_PHONE_BRAND']=$urow->PR_PHONE_BRAND;
               $urowData['PR_LOCATION']=$urow->PR_LOCATION;
               $urowData['PR_TOKEN']=$urow->PR_TOKEN;
               $urowData['PR_CREATED_AT']=$urow->PR_CREATED_AT;
               $urowData['PR_UPDATED_AT']=$urow->PR_UPDATED_AT;
               $urowData['PR_ADDED_BY']=$urow->PR_ADDED_BY;
               $urowData['PR_LAT_LNG']=$urow->PR_LAT_LNG;
               $urowData['PR_CTC']=$urow->PR_CTC;
               $urowData['PR_OTP']=$urow->PR_OTP;
               $urowData['PR_GENDER']=$urow->PR_GENDER;
               $urowData['PR_SEXUAL_ORIENTATION']=$uusexualOrientation;
               $urowData['PR_PASSION']=$uupassion;
               $urowData['PR_DOB']=$urow->PR_DOB;
               $urowData['GALLERY']=$ulgalleryarray;

               $urowData['PR_PACKAGE']=$urow->PR_PACKAGE_ID;
               $urowData['PR_MIN_LOCATION']=$urow->PR_MIN_LOCATION;
               $urowData['PR_AGE_RANGE']=$urow->PR_AGE_RANGE;
               
               $urowData['PCAKAGE']=$getUserPackageData;
               

               $settingData = array();
           
               $settingDataList= $this->Api_model->getUserSettingDataByuser(array('PR_USER_ID' =>$urow->PR_USER_ID));
               $urowData['SETTING_DATA']=$settingDataList;


$urowData['PCAKAGE_UTILIZATION']=array('LIKE'=>'','SUPER_LIKE'=>'');
               array_push($profilearray, $profileData);


               $urowData['ABOUT']=$urow->ABOUT;
               $urowData['JOB_TITLE']=$urow->JOB_TITLE;
               $urowData['SCHOOL']=$urow->SCHOOL;
               $urowData['COMPANY']=$urow->COMPANY;
               $urowData['PROFILE_SHOW']=$urow->PROFILE_SHOW;
               $urowData['SYSYTEM_VISIBILITY']=$urow->SYSYTEM_VISIBILITY;
               $urowData['PROFILE_UPDATE_STS']=$urow->PROFILE_UPDATE_STS;
               $urowData['DONT_SHOW_MY_AGE']=$urow->DONT_SHOW_MY_AGE;
               $urowData['DONT_SHOW_MY_GENDER']=$urow->DONT_SHOW_MY_GENDER;
               $urowData['MARITAL_STS']=$urow->MARITAL_STS;
                $urowData['SHOW_GENDER']=$urow->SHOW_GENDER;

               array_push($userarray, $urowData);


}
           if($userExist[0]->PROFILE_UPDATE_STS=="1")
           {
            $rs="old";
           }
           else
           {
            $rs="new";
           }

           $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Otp Verified successfully','USER_DATA'=>$userarray,'USER_PROFILE_STS'=>$rs,'PROFILE_UPDATE_STS'=>$userExist[0]->PROFILE_UPDATE_STS); 
             
        }

           }      
            
                
        $rks = json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);

        echo $rk;
        exit();
    }









    public function user_data_post() 
    {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);


        //$user_id=$jsonArray['USER_ID'];// $this->input->post_get('PHONE_NO', true);
       
       $profilearray=array();
            $profileDtaa= $this->Api_model->getUserDataRow(array('EMPLOYEE_ID' => $jsonArray['EMPLOYEE_ID']));
            foreach ($profileDtaa as $prow) 
            {
               $plgalleryarray=array();
               $plgrow= $this->Api_model->getGalleryData(array('EMPLOYEE_ID' =>$jsonArray['EMPLOYEE_ID']));
            //   foreach($plgalleryList as $plgrow)
            //   {
            //     $plg['PR_IMAGE_ID']=$plgrow->PR_IMAGE_ID;
            //     $plg['PR_IMAGE']=base_url()."files/".$plgrow->PR_IMAGE;  
            //     array_push($plgalleryarray, $plg);        
             
            //   }
                
                
                
                
            $plgalleryarray=array();
            $gal['PR_IMAGE_ID'] =$plgrow[0]->PR_IMAGE_ID;
            if($plgrow[0]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[0]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($plgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[1]->PR_IMAGE_ID;
            if($plgrow[1]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[1]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($plgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[2]->PR_IMAGE_ID;
            if($plgrow[2]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[2]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($plgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[3]->PR_IMAGE_ID;
            if($plgrow[3]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[3]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($plgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[4]->PR_IMAGE_ID;
            if($plgrow[4]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[4]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($plgalleryarray, $gal);
             $gal['PR_IMAGE_ID'] =$plgrow[5]->PR_IMAGE_ID;
            if($plgrow[5]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[5]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($plgalleryarray, $gal);
            
                
                
                
                
                
                
                
                
                
                
                
               $passion= $this->Api_model->getUserPassion(array('EMPLOYEE_ID' =>$jsonArray['EMPLOYEE_ID']));
               $package_dtl= $this->Api_model->getPackageDtl();
               $sexualOrientation= $this->Api_model->getUserSexualOrientation(array('EMPLOYEE_ID' =>$jsonArray['EMPLOYEE_ID']));

               $profileData['PR_USER_ID']=$prow->PR_USER_ID;
               $profileData['PR_ROLE_ID']=$prow->PR_ROLE_ID;
               $profileData['PR_USER_CODE']=$prow->PR_USER_CODE;
               $profileData['PR_PASSWORD']=$prow->PR_PASSWORD;
               $profileData['PR_PIN']=$prow->PR_PIN;
               $profileData['PR_TITLE']=$prow->PR_TITLE;
               $profileData['PR_NAME']=$prow->PR_NAME;
               $profileData['PR_EMAIL']=$prow->PR_EMAIL;
               $profileData['PR_PHONE']=$prow->PR_PHONE;
               $profileData['PR_IMAGE']=base_url()."files/".$plgrow[0]->PR_IMAGE;
               $profileData['PR_PRESENT_ADDRESS']=$prow->PR_PRESENT_ADDRESS;
               $profileData['PR_PERMANENT_ADDRESS']=$prow->PR_PERMANENT_ADDRESS;
               $profileData['PR_COUNTRY']=$prow->PR_COUNTRY;
               $profileData['PR_STATE']=$prow->PR_STATE;
               $profileData['PR_CITY']=$prow->PR_CITY;
               $profileData['PR_PINCODE']=$prow->PR_PINCODE;
               $profileData['PR_GST_NO']=$prow->PR_GST_NO;
               $profileData['PR_AADHAR_CARD_NO']=$prow->PR_AADHAR_CARD_NO;
               $profileData['PR_PANCARD_NO']=$prow->PR_PANCARD_NO;
               $profileData['PR_DL_NO']=$prow->PR_DL_NO;
               $profileData['PR_PASSPORT_NO']=$prow->PR_PASSPORT_NO;
               $profileData['PR_ACCOUNT_NO']=$prow->PR_ACCOUNT_NO;
               $profileData['PR_IFSC_CODE']=$prow->PR_IFSC_CODE;
               $profileData['PR_BANK_NAME']=$prow->PR_BANK_NAME;
               $profileData['PR_BANK_BRANCH']=$prow->PR_BANK_BRANCH;
               $profileData['PR_STATUS']=$prow->PR_STATUS;
               $profileData['PR_IMEI']=$prow->PR_IMEI;
               $profileData['PR_BATTERY']=$prow->PR_BATTERY;
               $profileData['PR_APP_VERSION']=$prow->PR_APP_VERSION;
               $profileData['PR_PHONE_BRAND']=$prow->PR_PHONE_BRAND;
               $profileData['PR_LOCATION']=$prow->PR_LOCATION;
               $profileData['PR_TOKEN']=$prow->PR_TOKEN;
               $profileData['PR_CREATED_AT']=$prow->PR_CREATED_AT;
               $profileData['PR_UPDATED_AT']=$prow->PR_UPDATED_AT;
               $profileData['PR_ADDED_BY']=$prow->PR_ADDED_BY;
               $profileData['PR_LAT_LNG']=$prow->PR_LAT_LNG;
               $profileData['PR_CTC']=$prow->PR_CTC;
               $profileData['PR_OTP']=$prow->PR_OTP;
               $profileData['PR_GENDER']=$prow->PR_GENDER;
               $profileData['PR_SEXUAL_ORIENTATION']=$sexualOrientation;
               $profileData['PR_PASSION']=$passion;
               $profileData['PR_DOB']=$prow->PR_DOB;
               $profileData['GALLERY']=$plgalleryarray;


               $profileData['PR_PACKAGE']=$prow->PR_PACKAGE_ID;
               $profileData['PR_MIN_LOCATION']=$prow->PR_MIN_LOCATION;
               $profileData['PR_AGE_RANGE']=$prow->PR_AGE_RANGE;


               $settingDataList= $this->Api_model->getUserSettingDataByuser(array('PR_USER_ID' =>$prow->PR_USER_ID));
               $profileData['SETTING_DATA']=$settingDataList;
            $getUserPackageData = $this->Api_model->getUserPackage(array('EMPLOYEE_ID' =>$prow->PR_USER_ID));
$profileData['PCAKAGE']=$getUserPackageData;
$profileData['PCAKAGE_UTILIZATION']=array('LIKE'=>'','SUPER_LIKE'=>'');
              



               $profileData['ABOUT']=$prow->ABOUT;
               $profileData['JOB_TITLE']=$prow->JOB_TITLE;
               $profileData['SCHOOL']=$prow->SCHOOL;
               $profileData['COMPANY']=$prow->COMPANY;
               $profileData['PROFILE_SHOW']=$prow->PROFILE_SHOW;
               $profileData['SYSYTEM_VISIBILITY']=$prow->SYSYTEM_VISIBILITY;
               $profileData['PROFILE_UPDATE_STS']=$prow->PROFILE_UPDATE_STS;
               $profileData['DONT_SHOW_MY_AGE']=$prow->DONT_SHOW_MY_AGE;
               $profileData['DONT_SHOW_MY_GENDER']=$prow->DONT_SHOW_MY_GENDER;
               $profileData['MARITAL_STS']=$prow->MARITAL_STS;
                $profileData['SHOW_GENDER']=$prow->SHOW_GENDER;
                 $profileData['LIKED_STS']="";
                array_push($profilearray, $profileData);


            }
             
        $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'User Data','USER_DATA'=>$profilearray); 
        
        // echo json_encode($aResponce);
         $rks = json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);

        echo $rk;
        exit;
             
    }



 public function package_post() 
    {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);


        $package_id=$jsonArray['PR_PACKAGE_ID'];
         $user_id=$jsonArray['PR_USER_ID'];// $this->input->post_get('PHONE_NO', true);
       
        $packageList= $this->Api_model->getPackageDtl(array('PACKAGE_ID'=>$package_id));
        $packageArray=array();
       
        // foreach($packageList as $crow)
        // {
        //        $urowData['PR_PACKAGE_ID']=$crow->PR_PACKAGE_ID;
        //        $urowData['PR_PACKAGE_NAME']=$crow->PR_PACKAGE_NAME;
        //        $urowData['PR_PACKAGE_DESC']=$crow->PR_PACKAGE_DESC;
        //        $urowData['PR_PACKAGE_DURATION']=$crow->PR_PACKAGE_DURATION;
        //        $urowData['PR_IMAGE']=$crow->PR_IMAGE;
        //        $urowData['PR_PACKAGE_NAME']=$crow->PR_PACKAGE_NAME;
        //        $urowData['PR_PRICE']=$crow->PR_PRICE;
        //        $urowData['PR_LIKE_DAILY_LIMIT']=$crow->PR_LIKE_DAILY_LIMIT;
        //        $urowData['PR_SUPERLIKE_DAILY_LIMIT']=$crow->PR_SUPERLIKE_DAILY_LIMIT;
        //        $urowData['PR_STATUS']=$crow->PR_STATUS;
        //        $urowData['PR_ENTRY_DATE']=$crow->PR_ENTRY_DATE;
        //        $urowData['PR_MODIFIED_DATE']=$crow->PR_MODIFIED_DATE;

        //        array_push($packageArray, $urowData);
        //         //$subcategoryArray=array();
        //    }

         $package_dtl= $this->Api_model->getPackageDtl();
            
            $packagearrayData=array();
          
            foreach ($package_dtl as $prow) 
            {
              $package_detail= $this->Api_model->getPackagePriceDtl(array('PACKAGE_ID'=>$prow->PR_PACKAGE_ID));
                $plg['PR_PACKAGE_ID']=$prow->PR_PACKAGE_ID;
                $plg['PR_PACKAGE_NAME']=$prow->PR_PACKAGE_NAME;
                $plg['PR_PACKAGE_DESC']=$prow->PR_PACKAGE_DESC;
                
                $plg['PACKAGE_DATA']=$package_detail;
                
                array_push($packagearrayData, $plg);        
             
            }


               $settingDataList= $this->Api_model->getUserSettingDataByuser(array('PR_USER_ID' =>$user_id));
               $SETTING_DATA=$settingDataList;

             
        $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Package List & Setting List By User ','PACKAGE_LIST'=>$packagearrayData,'SETTING_DATA'=>$SETTING_DATA); 
        
      $rks = json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);

        echo $rk;
        exit;
             
             
    }


    public function offerAdvList_post() 
    {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);

        $offerAdvList= $this->Api_model->getOfferAdvDtl();
        $offerArray=array();
       
        foreach($offerAdvList as $crow)
        {
               $urowData['PR_OFFER_ADV_ID']=$crow->PR_OFFER_ADV_ID;
               $urowData['PR_OFFER_TITLE']=$crow->PR_OFFER_TITLE;
               $urowData['PR_OFFER_DESC']=$crow->PR_OFFER_DESC;
               $urowData['PR_IMAGE']=$crow->PR_IMAGE;            
               $urowData['PR_STATUS']=$crow->PR_STATUS;
               $urowData['PR_ENTRY_DATE']=$crow->PR_ENTRY_DATE;
               $urowData['PR_MODIFIED_DATE']=$crow->PR_MODIFIED_DATE;


         $package_dtl= $this->Api_model->getPackageDtl();
            
            $packagearrayData=array();
          
            foreach ($package_dtl as $prow) 
            {
              $package_detail= $this->Api_model->getPackagePriceDtl(array('PACKAGE_ID'=>$prow->PR_PACKAGE_ID));
                $plg['PR_PACKAGE_ID']=$prow->PR_PACKAGE_ID;
                $plg['PR_PACKAGE_NAME']=$prow->PR_PACKAGE_NAME;
                $plg['PR_PACKAGE_DESC']=$prow->PR_PACKAGE_DESC;
                
                $plg['PACKAGE_DATA']=$package_detail;
                
                array_push($packagearrayData, $plg);        
             
            }
               $urowData['PACKAGE']=$packagearrayData;

               array_push($offerArray, $urowData);
                //$subcategoryArray=array();
           }



        $packageArray=array();
            
        $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Offer Adv List','OFFER_ADV_LIST'=>$offerArray); 
        
        $rks = json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);

        echo $rk;
        exit;
             
             
    }


    // public function offerPackageAdvList_post() 
    // {
    //     error_reporting(0);
    //     $jsonArray=json_decode(file_get_contents('php://input'),true);

    //     $offerAdvList= $this->Api_model->getOfferAdvDtl();
    //     $offerArray=array();
       
    //     foreach($offerAdvList as $crow)
    //     {
    //            $urowData['PR_OFFER_ADV_ID']=$crow->PR_OFFER_ADV_ID;
    //            $urowData['PR_OFFER_TITLE']=$crow->PR_OFFER_TITLE;
    //            $urowData['PR_OFFER_DESC']=$crow->PR_OFFER_DESC;
    //            $urowData['PR_IMAGE']=$crow->PR_IMAGE;            
    //            $urowData['PR_STATUS']=$crow->PR_STATUS;
    //            $urowData['PR_ENTRY_DATE']=$crow->PR_ENTRY_DATE;
    //            $urowData['PR_MODIFIED_DATE']=$crow->PR_MODIFIED_DATE;


    //      $package_dtl= $this->Api_model->getPackageDtl();
            
    //         $packagearrayData=array();
          
    //         foreach ($package_dtl as $prow) 
    //         {
    //           $package_detail= $this->Api_model->getPackagePriceDtl(array('PACKAGE_ID'=>$prow->PR_PACKAGE_ID));
    //             $plg['PR_PACKAGE_ID']=$prow->PR_PACKAGE_ID;
    //             $plg['PR_PACKAGE_NAME']=$prow->PR_PACKAGE_NAME;
    //             $plg['PR_PACKAGE_DESC']=$prow->PR_PACKAGE_DESC;
                
    //             $plg['PACKAGE_DATA']=$package_detail;
                
    //             array_push($packagearrayData, $plg);        
             
    //         }
    //            $urowData['PACKAGE']=$packagearrayData;

    //            array_push($offerArray, $urowData);
    //             //$subcategoryArray=array();
    //        }



    //     $packageArray=array();
       


             
    //     $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Offer Package Adv List','OFFER_PACKAGE_ADV_LIST'=>$offerArray); 
        
    //   $rks = json_encode($aResponce);
    //     $rk = str_replace('null', '""', $rks);

    //     echo $rk;
    //     exit;
             
             
    // }



 public function likeList_post() 
    {  
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);

 
        $user_id=$jsonArray['PR_USER_ID'];// $this->input->post_get('PHONE_NO', true);
         $list_typ=$jsonArray['LIST_TYP'];//exit;
       
       if($list_typ=="liked")
       {
         $likeList= $this->Api_model->getLikedUserData(array('EMPLOYEE_ID' => $user_id));
       }
       else
       {
         $likeList= $this->Api_model->getLikedUserData2(array('EMPLOYEE_ID' => $user_id));
       }
       
         $likeduserarray=array();
            //$likedusersList= $this->Api_model->getUserData(array('EMPLOYEE_ID' => $EMPLOYEE_CODE));
            foreach ($likeList as $lrow) 
            {
               $ulgalleryarray=array();
               $lgalleryList= $this->Api_model->getGalleryData(array('EMPLOYEE_ID' =>$lrow->PR_USER_ID));
            //   foreach($lgalleryList as $lgrow)
            //   {
            //     $lg['PR_IMAGE_ID']=$lgrow->PR_IMAGE_ID;
            //     $lg['PR_IMAGE']=base_url()."files/".$lgrow->PR_IMAGE;  
            //     array_push($lgalleryarray, $lg);        
             
            //   }
             $gal['PR_IMAGE_ID'] =$lgalleryList[0]->PR_IMAGE_ID;
            if($lgalleryList[0]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$lgalleryList[0]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$lgalleryList[1]->PR_IMAGE_ID;
            if($lgalleryList[1]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$lgalleryList[1]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$lgalleryList[2]->PR_IMAGE_ID;
            if($lgalleryList[2]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$lgalleryList[2]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$lgalleryList[3]->PR_IMAGE_ID;
            if($lgalleryList[3]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$lgalleryList[3]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$lgalleryList[4]->PR_IMAGE_ID;
            if($lgalleryList[4]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$lgalleryList[4]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
             $gal['PR_IMAGE_ID'] =$lgalleryList[5]->PR_IMAGE_ID;
            if($lgalleryList[5]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$lgalleryList[5]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
               
               
               
               

               $lpassion= $this->Api_model->getUserPassion(array('EMPLOYEE_ID' =>$lrow->PR_USER_ID));
               $lsexualOrientation= $this->Api_model->getUserSexualOrientation(array('EMPLOYEE_ID' =>$lrow->PR_USER_ID));

 
 
               $lrowData['PR_USER_ID']=$lrow->PR_USER_ID;
               $lrowData['PR_ROLE_ID']=$lrow->PR_ROLE_ID;
               $lrowData['PR_USER_CODE']=$lrow->PR_USER_CODE;
               $lrowData['PR_PASSWORD']=$lrow->PR_PASSWORD;
               $lrowData['PR_PIN']=$lrow->PR_PIN;
               $lrowData['PR_TITLE']=$lrow->PR_TITLE;
               $lrowData['PR_NAME']=$lrow->PR_NAME;
               $lrowData['PR_EMAIL']=$lrow->PR_EMAIL;
               $lrowData['PR_PHONE']=$lrow->PR_PHONE;
               $lrowData['PR_IMAGE']=base_url()."files/".$plgrow[0]->PR_IMAGE;
               $lrowData['PR_PRESENT_ADDRESS']=$lrow->PR_PRESENT_ADDRESS;
               $lrowData['PR_PERMANENT_ADDRESS']=$lrow->PR_PERMANENT_ADDRESS;
               $lrowData['PR_COUNTRY']=$lrow->PR_COUNTRY;
               $lrowData['PR_STATE']=$lrow->PR_STATE;
               $lrowData['PR_CITY']=$lrow->PR_CITY;
               $lrowData['PR_PINCODE']=$lrow->PR_PINCODE;
               $lrowData['PR_GST_NO']=$lrow->PR_GST_NO;
               $lrowData['PR_AADHAR_CARD_NO']=$lrow->PR_AADHAR_CARD_NO;
               $lrowData['PR_PANCARD_NO']=$lrow->PR_PANCARD_NO;
               $lrowData['PR_DL_NO']=$lrow->PR_DL_NO;
               $lrowData['PR_PASSPORT_NO']=$lrow->PR_PASSPORT_NO;
               $lrowData['PR_ACCOUNT_NO']=$lrow->PR_ACCOUNT_NO;
               $lrowData['PR_IFSC_CODE']=$lrow->PR_IFSC_CODE;
               $lrowData['PR_BANK_NAME']=$lrow->PR_BANK_NAME;
               $lrowData['PR_BANK_BRANCH']=$lrow->PR_BANK_BRANCH;
               $lrowData['PR_STATUS']=$lrow->PR_STATUS;
               $lrowData['PR_IMEI']=$lrow->PR_IMEI;
               $lrowData['PR_BATTERY']=$lrow->PR_BATTERY;
               $lrowData['PR_APP_VERSION']=$lrow->PR_APP_VERSION;
               $lrowData['PR_PHONE_BRAND']=$lrow->PR_PHONE_BRAND;
               $lrowData['PR_LOCATION']=$lrow->PR_LOCATION;
               $lrowData['PR_TOKEN']=$lrow->PR_TOKEN;
               $lrowData['PR_CREATED_AT']=$lrow->PR_CREATED_AT;
               $lrowData['PR_UPDATED_AT']=$lrow->PR_UPDATED_AT;
               $lrowData['PR_ADDED_BY']=$lrow->PR_ADDED_BY;
               $lrowData['PR_LAT_LNG']=$lrow->PR_LAT_LNG;
               $lrowData['PR_CTC']=$lrow->PR_CTC;
               $lrowData['PR_OTP']=$lrow->PR_OTP;
               if($lrow->DONT_SHOW_MY_GENDER=="1")
               {
                $lrowData['PR_GENDER']="";
               }
               else
               {
                $lrowData['PR_GENDER']=$lrow->PR_GENDER;
               }

              
               // if($lrow->DONT_SHOW_MY_AGE=="1")
               // {
               //  $lrowData['PR_DOB']="";
               // }
               // else
               // {
               //  $lrowData['PR_DOB']=$lrow->PR_DOB;
               // }
               $lrowData['PR_DOB']=$lrow->PR_DOB;

               //$lrowData['PR_GENDER']=$lrow->PR_GENDER;
               $lrowData['PR_SEXUAL_ORIENTATION']=$lsexualOrientation;
               $lrowData['PR_PASSION']=$lpassion;
               //$lrowData['PR_DOB']=$lrow->PR_DOB;
               $lrowData['GALLERY']=$ulgalleryarray;

               $lrowData['PR_PACKAGE']=$lrow->PR_PACKAGE_ID;
               $lrowData['PR_MIN_LOCATION']=$lrow->PR_MIN_LOCATION;
               $lrowData['PR_AGE_RANGE']=$lrow->PR_AGE_RANGE;

               $settingDataList= $this->Api_model->getUserSettingDataByuser(array('PR_USER_ID' =>$lrow->PR_USER_ID));
               $lrowData['SETTING_DATA']=$settingDataList;
               $getUserPackageData = $this->Api_model->getUserPackage(array('EMPLOYEE_ID' =>$lrow->PR_USER_ID));
              
                $lrowData['PCAKAGE']=$getUserPackageData;

                $lrowData['LIKED_TYPE']=$lrow->LIKED_TYPE;


                 $lrowData['ABOUT']=$lrow->ABOUT;
               $lrowData['JOB_TITLE']=$lrow->JOB_TITLE;
               $lrowData['SCHOOL']=$lrow->SCHOOL;
               $lrowData['COMPANY']=$lrow->COMPANY;
               $lrowData['PROFILE_SHOW']=$lrow->PROFILE_SHOW;
               $lrowData['SYSYTEM_VISIBILITY']=$lrow->SYSYTEM_VISIBILITY;
               $lrowData['PROFILE_UPDATE_STS']=$lrow->PROFILE_UPDATE_STS;
               $lrowData['DONT_SHOW_MY_AGE']=$lrow->DONT_SHOW_MY_AGE;
               $lrowData['DONT_SHOW_MY_GENDER']=$lrow->DONT_SHOW_MY_GENDER;
               $lrowData['MARITAL_STS']=$lrow->MARITAL_STS;
               $lrowData['SHOW_GENDER']=$lrow->SHOW_GENDER;
                $lrowData['LIKED_STS']="";
               array_push($likeduserarray, $lrowData);


            }



             
        $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Liked And ULiked List','LIKED_LIST'=>$likeduserarray); 
        
      $rks = json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);

        echo $rk;
        exit;
             
             
    }






 public function dashboard_data_post() 
    {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);


        $user_id=$jsonArray['EMPLOYEE_ID'];// $this->input->post_get('PHONE_NO', true);
       
        $userarray=array();
        $usersList= $this->Api_model->getUserData(array('EMPLOYEE_ID' => $user_id));
      // print_r($usersList); exit;
          foreach ($usersList as $urow) 
            {

            
               $getUserPackageData = $this->Api_model->getUserPackage(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
              
               $ulgalleryarray=array();
               $plgrow= $this->Api_model->getGalleryData(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));


               $plikeChk= $this->Api_model->getLikedUserData3(array('USER_ID'=>$user_id,'EMPLOYEE_ID' =>$urow->PR_USER_ID));
               if($plikeChk)
               {

               }
               else
               {

            $pulikeChk= $this->Api_model->getuLikedUserData(array('USER_ID'=>$user_id,'EMPLOYEE_ID' =>$urow->PR_USER_ID));
               if($pulikeChk)
               {
                
               }
               else
               {


                    // if($plgrow[0]->PR_IMAGE=="0" || $plgrow[0]->PR_IMAGE=="")
                    // {
                    // }
                    // else
                    // {
       
                    if($plgrow[0]->PR_IMAGE)
                    {
                        $gal['PR_IMAGE'] =base_url()."files/".$plgrow[0]->PR_IMAGE;
                    }
                    else if($plgrow[0]->PR_IMAGE=="0")
                    {
                        $gal['PR_IMAGE'] ="";
                    }
                    else
                    {
                        $gal['PR_IMAGE'] ="";
                    }
                    array_push($ulgalleryarray, $gal);

                    $gal['PR_IMAGE_ID'] =$plgrow[1]->PR_IMAGE_ID;
                    if($plgrow[1]->PR_IMAGE)
                    {
                        $gal['PR_IMAGE'] =base_url()."files/".$plgrow[1]->PR_IMAGE;
                    }
                     else if($plgrow[0]->PR_IMAGE=="0")
                    {
                        $gal['PR_IMAGE'] ="";
                    }
                    else
                    {
                        $gal['PR_IMAGE'] ="";
                    }
                    array_push($ulgalleryarray, $gal);


            $gal['PR_IMAGE_ID'] =$plgrow[2]->PR_IMAGE_ID;
            if($plgrow[2]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[2]->PR_IMAGE;
            }
             else if($plgrow[0]->PR_IMAGE=="0")
            {
                $gal['PR_IMAGE'] ="";
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[3]->PR_IMAGE_ID;
            if($plgrow[3]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[3]->PR_IMAGE;
            }
             else if($plgrow[0]->PR_IMAGE=="0")
            {
                $gal['PR_IMAGE'] ="";
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$plgrow[4]->PR_IMAGE_ID;
            if($plgrow[4]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[4]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
             $gal['PR_IMAGE_ID'] =$plgrow[5]->PR_IMAGE_ID;
            if($plgrow[5]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$plgrow[5]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
               
        
               $uupassion= $this->Api_model->getUserPassion(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
               $uusexualOrientation= $this->Api_model->getUserSexualOrientation(array('EMPLOYEE_ID' =>$urow->PR_USER_ID));
               

 
               $urowData['PR_USER_ID']=$urow->PR_USER_ID;
               $urowData['PR_ROLE_ID']=$urow->PR_ROLE_ID;
               $urowData['PR_USER_CODE']=$urow->PR_USER_CODE;
               $urowData['PR_PASSWORD']=$urow->PR_PASSWORD;
               $urowData['PR_PIN']=$urow->PR_PIN;
               $urowData['PR_TITLE']=$urow->PR_TITLE;
               $urowData['PR_NAME']=$urow->PR_NAME;
               $urowData['PR_EMAIL']=$urow->PR_EMAIL;
               $urowData['PR_PHONE']=$urow->PR_PHONE;
               $urowData['PR_IMAGE']=base_url()."files/".$plgrow[0]->PR_IMAGE;
               $urowData['PR_PRESENT_ADDRESS']=$urow->PR_PRESENT_ADDRESS;
               $urowData['PR_PERMANENT_ADDRESS']=$urow->PR_PERMANENT_ADDRESS;
               $urowData['PR_COUNTRY']=$urow->PR_COUNTRY;
               $urowData['PR_STATE']=$urow->PR_STATE;
               $urowData['PR_CITY']=$urow->PR_CITY;
               $urowData['PR_PINCODE']=$urow->PR_PINCODE;
               $urowData['PR_GST_NO']=$urow->PR_GST_NO;
               $urowData['PR_AADHAR_CARD_NO']=$urow->PR_AADHAR_CARD_NO;
               $urowData['PR_PANCARD_NO']=$urow->PR_PANCARD_NO;
               $urowData['PR_DL_NO']=$urow->PR_DL_NO;
               $urowData['PR_PASSPORT_NO']=$urow->PR_PASSPORT_NO;
               $urowData['PR_ACCOUNT_NO']=$urow->PR_ACCOUNT_NO;
               $urowData['PR_IFSC_CODE']=$urow->PR_IFSC_CODE;
               $urowData['PR_BANK_NAME']=$urow->PR_BANK_NAME;
               $urowData['PR_BANK_BRANCH']=$urow->PR_BANK_BRANCH;
               $urowData['PR_STATUS']=$urow->PR_STATUS;
               $urowData['PR_IMEI']=$urow->PR_IMEI;
               $urowData['PR_BATTERY']=$urow->PR_BATTERY;
               $urowData['PR_APP_VERSION']=$urow->PR_APP_VERSION;
               $urowData['PR_PHONE_BRAND']=$urow->PR_PHONE_BRAND;
               $urowData['PR_LOCATION']=$urow->PR_LOCATION;
               $urowData['PR_TOKEN']=$urow->PR_TOKEN;
               $urowData['PR_CREATED_AT']=$urow->PR_CREATED_AT;
               $urowData['PR_UPDATED_AT']=$urow->PR_UPDATED_AT;
               $urowData['PR_ADDED_BY']=$urow->PR_ADDED_BY;
               $urowData['PR_LAT_LNG']=$urow->PR_LAT_LNG;
               $urowData['PR_CTC']=$urow->PR_CTC;
               $urowData['PR_OTP']=$urow->PR_OTP;
               if($urow->DONT_SHOW_MY_GENDER=="1")
               {
                $urowData['PR_GENDER']="";
               }
               else
               {
                $urowData['PR_GENDER']=$urow->PR_GENDER;
               }

              
               // if($urow->DONT_SHOW_MY_AGE=="1")
               // {
               //  $urowData['PR_DOB']="";
               // }
               // else
               // {
               //  $urowData['PR_DOB']=$urow->PR_DOB;
               // }
               $urowData['PR_SEXUAL_ORIENTATION']=$uusexualOrientation;
               $urowData['PR_PASSION']=$uupassion;
             $urowData['PR_DOB']=$urow->PR_DOB;
               $urowData['GALLERY']=$ulgalleryarray;

               $urowData['PR_PACKAGE']=$urow->PR_PACKAGE_ID;
               $urowData['PR_MIN_LOCATION']=$urow->PR_MIN_LOCATION;
               $urowData['PR_AGE_RANGE']=$urow->PR_AGE_RANGE;
               
               $urowData['PCAKAGE']=$getUserPackageData;
               

               $settingData = array();
           
               $settingDataList= $this->Api_model->getUserSettingDataByuser(array('PR_USER_ID' =>$urow->PR_USER_ID));
               $urowData['SETTING_DATA']=$settingDataList;
               $urowData['PCAKAGE_UTILIZATION']=array('LIKE'=>'','SUPER_LIKE'=>'');

               $urowData['ABOUT']=$urow->ABOUT;
               $urowData['JOB_TITLE']=$urow->JOB_TITLE;
               $urowData['SCHOOL']=$urow->SCHOOL;
               $urowData['COMPANY']=$urow->COMPANY;
               $urowData['PROFILE_SHOW']=$urow->PROFILE_SHOW;
               $urowData['SYSYTEM_VISIBILITY']=$urow->SYSYTEM_VISIBILITY;
               $urowData['PROFILE_UPDATE_STS']=$urow->PROFILE_UPDATE_STS;
               $urowData['DONT_SHOW_MY_AGE']=$urow->DONT_SHOW_MY_AGE;
               $urowData['DONT_SHOW_MY_GENDER']=$urow->DONT_SHOW_MY_GENDER;
               $urowData['MARITAL_STS']=$urow->MARITAL_STS;
               $urowData['SHOW_GENDER']=$urow->SHOW_GENDER;


               array_push($userarray, $urowData);


//}
}
}
            }
             
        $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Dashboard Data List','DASHBOARD_DATA_LIST'=>$userarray); 
        
      $rks = json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);

        echo $rk;
        exit;
             
             
    }





 public function matchList_post() 
    {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);


        $user_id=$jsonArray['PR_USER_ID'];// $this->input->post_get('PHONE_NO', true);
         
      
         $likeList= $this->Api_model->getLikedUserData(array('EMPLOYEE_ID' => $user_id));
      
       
         $likeduserarray=array();
            //$likedusersList= $this->Api_model->getUserData(array('EMPLOYEE_ID' => $EMPLOYEE_CODE));
            foreach ($likeList as $lrow) 
            {


                $likeList2= $this->Api_model->getLikedUserData2(array('EMPLOYEE_ID' =>$lrow->PR_USER_ID));

                if($likeList2)
                {

               $ulgalleryarray=array();
               $lgalleryList= $this->Api_model->getGalleryData(array('EMPLOYEE_ID' =>$lrow->PR_USER_ID));
            //   foreach($lgalleryList as $lgrow)
            //   {
            //     $lg['PR_IMAGE_ID']=$lgrow->PR_IMAGE_ID;
            //     $lg['PR_IMAGE']=base_url()."files/".$lgrow->PR_IMAGE;  
            //     array_push($lgalleryarray, $lg);        
             
            //   }
             $gal['PR_IMAGE_ID'] =$lgalleryList[0]->PR_IMAGE_ID;
            if($lgalleryList[0]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$lgalleryList[0]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$lgalleryList[1]->PR_IMAGE_ID;
            if($lgalleryList[1]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$lgalleryList[1]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$lgalleryList[2]->PR_IMAGE_ID;
            if($lgalleryList[2]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$lgalleryList[2]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$lgalleryList[3]->PR_IMAGE_ID;
            if($lgalleryList[3]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$lgalleryList[3]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
            $gal['PR_IMAGE_ID'] =$lgalleryList[4]->PR_IMAGE_ID;
            if($lgalleryList[4]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$lgalleryList[4]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
             $gal['PR_IMAGE_ID'] =$lgalleryList[5]->PR_IMAGE_ID;
            if($lgalleryList[5]->PR_IMAGE)
            {
                $gal['PR_IMAGE'] =base_url()."files/".$lgalleryList[5]->PR_IMAGE;
            }
            else
            {
                $gal['PR_IMAGE'] ="";
            }
            array_push($ulgalleryarray, $gal);
               
               
               
               

               $lpassion= $this->Api_model->getUserPassion(array('EMPLOYEE_ID' =>$lrow->PR_USER_ID));
               $lsexualOrientation= $this->Api_model->getUserSexualOrientation(array('EMPLOYEE_ID' =>$lrow->PR_USER_ID));

 
 
               $lrowData['PR_USER_ID']=$lrow->PR_USER_ID;
               $lrowData['PR_ROLE_ID']=$lrow->PR_ROLE_ID;
               $lrowData['PR_USER_CODE']=$lrow->PR_USER_CODE;
               $lrowData['PR_PASSWORD']=$lrow->PR_PASSWORD;
               $lrowData['PR_PIN']=$lrow->PR_PIN;
               $lrowData['PR_TITLE']=$lrow->PR_TITLE;
               $lrowData['PR_NAME']=$lrow->PR_NAME;
               $lrowData['PR_EMAIL']=$lrow->PR_EMAIL;
               $lrowData['PR_PHONE']=$lrow->PR_PHONE;
               $lrowData['PR_IMAGE']=base_url()."files/".$plgrow[0]->PR_IMAGE;
               $lrowData['PR_PRESENT_ADDRESS']=$lrow->PR_PRESENT_ADDRESS;
               $lrowData['PR_PERMANENT_ADDRESS']=$lrow->PR_PERMANENT_ADDRESS;
               $lrowData['PR_COUNTRY']=$lrow->PR_COUNTRY;
               $lrowData['PR_STATE']=$lrow->PR_STATE;
               $lrowData['PR_CITY']=$lrow->PR_CITY;
               $lrowData['PR_PINCODE']=$lrow->PR_PINCODE;
               $lrowData['PR_GST_NO']=$lrow->PR_GST_NO;
               $lrowData['PR_AADHAR_CARD_NO']=$lrow->PR_AADHAR_CARD_NO;
               $lrowData['PR_PANCARD_NO']=$lrow->PR_PANCARD_NO;
               $lrowData['PR_DL_NO']=$lrow->PR_DL_NO;
               $lrowData['PR_PASSPORT_NO']=$lrow->PR_PASSPORT_NO;
               $lrowData['PR_ACCOUNT_NO']=$lrow->PR_ACCOUNT_NO;
               $lrowData['PR_IFSC_CODE']=$lrow->PR_IFSC_CODE;
               $lrowData['PR_BANK_NAME']=$lrow->PR_BANK_NAME;
               $lrowData['PR_BANK_BRANCH']=$lrow->PR_BANK_BRANCH;
               $lrowData['PR_STATUS']=$lrow->PR_STATUS;
               $lrowData['PR_IMEI']=$lrow->PR_IMEI;
               $lrowData['PR_BATTERY']=$lrow->PR_BATTERY;
               $lrowData['PR_APP_VERSION']=$lrow->PR_APP_VERSION;
               $lrowData['PR_PHONE_BRAND']=$lrow->PR_PHONE_BRAND;
               $lrowData['PR_LOCATION']=$lrow->PR_LOCATION;
               $lrowData['PR_TOKEN']=$lrow->PR_TOKEN;
               $lrowData['PR_CREATED_AT']=$lrow->PR_CREATED_AT;
               $lrowData['PR_UPDATED_AT']=$lrow->PR_UPDATED_AT;
               $lrowData['PR_ADDED_BY']=$lrow->PR_ADDED_BY;
               $lrowData['PR_LAT_LNG']=$lrow->PR_LAT_LNG;
               $lrowData['PR_CTC']=$lrow->PR_CTC;
               $lrowData['PR_OTP']=$lrow->PR_OTP;

               if($lrow->DONT_SHOW_MY_GENDER=="1")
               {
                $lrowData['PR_GENDER']="";
               }
               else
               {
                $lrowData['PR_GENDER']=$lrow->PR_GENDER;
               }

              
               if($lrow->DONT_SHOW_MY_AGE=="1")
               {
                $lrowData['PR_DOB']="";
               }
               else
               {
                $lrowData['PR_DOB']=$lrow->PR_DOB;
               }


              // $lrowData['PR_GENDER']=$lrow->PR_GENDER;
               $lrowData['PR_SEXUAL_ORIENTATION']=$lsexualOrientation;
               $lrowData['PR_PASSION']=$lpassion;
              // $lrowData['PR_DOB']=$lrow->PR_DOB;
               $lrowData['GALLERY']=$ulgalleryarray;

               $lrowData['PR_PACKAGE']=$lrow->PR_PACKAGE_ID;
               $lrowData['PR_MIN_LOCATION']=$lrow->PR_MIN_LOCATION;
               $lrowData['PR_AGE_RANGE']=$lrow->PR_AGE_RANGE;

               $settingDataList= $this->Api_model->getUserSettingDataByuser(array('PR_USER_ID' =>$lrow->PR_USER_ID));
               $lrowData['SETTING_DATA']=$settingDataList;
               $getUserPackageData = $this->Api_model->getUserPackage(array('EMPLOYEE_ID' =>$lrow->PR_USER_ID));
              
                $lrowData['PCAKAGE']=$getUserPackageData;


                $lrowData['ABOUT']=$lrow->ABOUT;
               $lrowData['JOB_TITLE']=$lrow->JOB_TITLE;
               $lrowData['SCHOOL']=$lrow->SCHOOL;
               $lrowData['COMPANY']=$lrow->COMPANY;
               $lrowData['PROFILE_SHOW']=$lrow->PROFILE_SHOW;
               $lrowData['SYSYTEM_VISIBILITY']=$lrow->SYSYTEM_VISIBILITY;
               $lrowData['PROFILE_UPDATE_STS']=$lrow->PROFILE_UPDATE_STS;
               $lrowData['DONT_SHOW_MY_AGE']=$lrow->DONT_SHOW_MY_AGE;
               $lrowData['DONT_SHOW_MY_GENDER']=$lrow->DONT_SHOW_MY_GENDER;
               $lrowData['MARITAL_STS']=$lrow->MARITAL_STS;
               $lrowData['SHOW_GENDER']=$lrow->SHOW_GENDER;
                $lrowData['LIKED_STS']="";

                $lrowData['LIKED_TYPE']=$lrow->LIKED_TYPE;
               array_push($likeduserarray, $lrowData);


            }
        }



             
    $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Match List','MATCH_LIST'=>$likeduserarray); 
        
      $rks = json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);

        echo $rk;
        exit;
             
             
    }





    public function locationUpdate_post() {

        $jsonArray=json_decode(file_get_contents('php://input'),true);
        //print_r($jsonArray); exit;
        $COMPANY_CODE=$jsonArray['COMPANY_CODE'];
        //$app_key =$jsonArray['APP_KEY'];// $this->input->post_get('APP_KEY', true);
        $EMPLOYEE_ID =$jsonArray['EMPLOYEE_ID']; // $this->input->post_get('COMPANY_CODE', true);
        $LOCATION =$jsonArray['LOCATION']; // $this->input->post_get('PHONE', true);
     
        
        $curdate=date('Y-m-d h:i:s');
       


       

        $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Not valid data');
        if (empty($COMPANY_CODE)) {
            $aResponce['MESSAGE'] = 'Please Enter Company Code !';
        }
        else 
        {           
            
            $upd= $this->Api_model->updateRow('pr_users',array('PR_LOCATION'=>$LOCATION,'PR_LAT_LNG'=>$LOCATION),array('PR_USER_ID'=>$EMPLOYEE_ID));

            $aResponce = array('STATUS' => 'SUCCESS',
                        'MESSAGE' => 'Updated Successfully',
                       
                        // 'F_DATA'=>$fieldsNotify
                  );
        }
    
        echo json_encode($aResponce);
        exit();
    }


//////////CHAT API/////////////////
   
     public function usersChatDta_post() 
    {
         $jsonArray=json_decode(file_get_contents('php://input'),true);
        $chatusersList=array();
        
        $EMPLOYEE_ID = $jsonArray['EMPLOYEE_ID'];
        $RECIEVER_ID = $jsonArray['RECIEVER_ID'];
        
        $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Not valid data');
         if (empty($EMPLOYEE_ID)) {
            $aResponce['MESSAGE'] = 'Please Enter Employee !';
        } 
        else {
            
            $userchatDta= $this->Api_model->getChatDta(array('EMPLOYEE_ID' => $EMPLOYEE_ID,'RECIEVER_ID' => $RECIEVER_ID));
            foreach ($userchatDta as  $row) 
            {   
                $r['PR_SENDER_ID']=$EMPLOYEE_ID;
                $r['PR_RECIEVER_ID']=$RECIEVER_ID;            
               $r['PR_MESSAGE']=$row->PR_MESSAGE;                 
               $r['PR_TYPE']=$row->PR_MESSAGE_TYPE;
                $r['PR_PATH']=""; 
               $r['PR_DATETIME']=$row->PR_ENTRY_DATE; 
               $r['PR_TIME']=date("h:i a", strtotime($row->PR_MESS_DATETIME)); 
               $r['PR_SEEN_STATUS']=$row->PR_SEEN_STATUS;
               
               array_push($chatusersList, $r);
            }
            $aResponce = array('STATUS' => 'SUCCESS',
                'MESSAGE' => 'Chatt Users List',
                'CHATDTA' => $chatusersList
            );
        }
        $rks = json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);

        echo $rk;
        exit;
    }


    public function chatting_post() {
         $jsonArray=json_decode(file_get_contents('php://input'),true);
        $EMPLOYEE_ID = $jsonArray['EMPLOYEE_ID'];

        //$PR_SENDER_ID = $this->input->post_get('PR_SENDER_ID', true);
        $PR_RECIEVER_ID = $jsonArray['RECIEVER_ID'];
        $MESSAGE_DTA = $jsonArray['MESSAGE_DTA'];
        $TIM = $jsonArray['TIME'];

        $entry_date = date('Y-m-d h:i:s');
        $data = array(
            //'PR_EMPLOYEE_ID' => $EMPLOYEE_ID,
            'PR_SENDER_ID' => $EMPLOYEE_ID,
            'PR_RECIEVER_ID' => $PR_RECIEVER_ID,
            'MESSAGE_DTA' => $MESSAGE_DTA,
            'PR_MESS_DATETIME' => $TIM,
            'ENTRY_DATE'=>$entry_date
            //'dataa' => $datar,
            
        );
        $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Not valid data');
        if (empty($EMPLOYEE_ID)) {
            $aResponce['MESSAGE'] = 'Please Enter Employee Id !';
        } else {

           $insertData = $this->Api_model->insertChatRow($data);
            if ($insertData=='TRUE') {

                $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'Message Submitted Successfully');
            } else {
                $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Something Went Wrong !');
            }
        }
        $rks = json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);

        echo $rk;
        exit;
    }

    //////////CHAT END////////////////

    public function packageDetail_post() {
         $jsonArray=json_decode(file_get_contents('php://input'),true);
        $EMPLOYEE_ID = $jsonArray['EMPLOYEE_ID'];


        $aResponce = array('STATUS' => 'FAILURE', 'MESSAGE' => 'Not valid data');
        if (empty($EMPLOYEE_ID)) {
            $aResponce['MESSAGE'] = 'Please Enter Employee Id !';
        } else {
 $getUserPackageData = $this->Api_model->getUserPackage(array('EMPLOYEE_ID' =>$EMPLOYEE_ID));
        if($getUserPackageData)
        {
            $pack="1";
        }
        else
        {
            $pack="0";
        }
            
        $aResponce = array('STATUS' => 'SUCCESS', 'MESSAGE' => 'User Package Data','PACKAGE_STS'=>$pack,'PACKAGE_DETAIL'=>$getUserPackageData);
          
        }
        $rks = json_encode($aResponce);
        $rk = str_replace('null', '""', $rks);

        echo $rk;
        exit;
    }

    
    /***************Collection End****************************/





    public function testnotification_post() 
    {
        error_reporting(0);
        $jsonArray=json_decode(file_get_contents('php://input'),true);
      

        $otp=rand (1000,9999 );
               $message="Your mego verification code is :-".$otp.".";
            
                   $token ="cn1VKca1QQOhK7vPVGGaWR:APA91bE3HEMWUnfcP0vmLyZ-4KyOMabAIaKqgw-y_ktvXYNufIxQ2DH7HlclQntJYNxu5eZtivVxk6ypMQz7OjVKVSDHstciGPp0Js3TM0iGi63tzfmeDBfMdJ4FypDGv0VjI9fDonry";
                   //echo $token; exit;
                  // echo FCM_SERVER_KEY;
                    $headers = array
                        (
                        'Authorization: key='.FCM_SERVER_KEY,
                        'Content-Type: application/json'
                    );
                    $msg = array(
                        'message_id' => '1',
                        'notification_type' => 'Otp',
                        'title' => 'Mego',
                        'message' => $message,
                        'vibrate' => 1,
                        'sound' => 1,
                        'largeIcon' => 'large_icon',
                        'smallIcon' => 'small_icon'
                    );
                    $fields = array(
                        'to' => $token,
                        'data' => $msg
                    );
                    


   $aRr = array(
                'notification' =>array('body'=>$message,'title'=>'Mego'),
                'priority'=>'high',
                'data'=>array('click_action'=>'FLUTTER_NOTIFICATION_CLICK','other_data'=>'any message'),
                'to'=>$token);
                
$rrrrr=json_encode($aRr);
//echo $rrrrr;
                       
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $rrrrr);
                    $result = curl_exec($ch);
print_r($result); exit;
                    curl_close($ch);
    }



}
