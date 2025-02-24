<?php

namespace App\Controllers;

use App\Models\AccountsModel;
use App\Models\FilesModel;
use App\Models\FoldersModel;
use App\Models\PDSCivilServiceItemsModel;
use App\Models\PDSCivilServiceModel;
use App\Models\PDSEducationModel;
use App\Models\PDSFamilyChildrenModel;
use App\Models\PDSFamilyModel;
use App\Models\PDSFinalModel;
use App\Models\PDSFinalReferenceItemsModel;
use App\Models\PDSModel;
use App\Models\PDSOtherInformationItemsModel;
use App\Models\PDSOtherInformationModel;
use App\Models\PDSPersonalModel;
use App\Models\PDSTrainingProgramItemsModel;
use App\Models\PDSTrainingProgramModel;
use App\Models\PDSVoluntaryWorkItemsModel;
use App\Models\PDSVoluntaryWorkModel;
use App\Models\PDSWorkExperienceItemsModel;
use App\Models\PDSWorkExperienceModel;
use Config\Services;
use Dompdf\Dompdf;
use Dompdf\Options;

class EmployeeController extends BaseController
{
    public function DashboardPage()
    {
        return view('/Employee/Pages/dashboard', $this->data);
    }

    // [ PDS Views ]
    public function PersonalDataSheetPage()
    {
        $fdcolumn = session()->get('fd_column');
        if (!isset($fdcolumn)) {
            session()->setFlashdata('fd_column', 'personal');
        }

        $accountid = session()->get('logged_id');
        $pdsModel = new PDSModel();
        $pds = $pdsModel->checkPDS($accountid);

        // Personal
        if (isset($pds) && $pds['personal']) {
            $personalid = $pds['personal'];
            $personalModel = new PDSPersonalModel();
            $personaldata = $personalModel->getPersonalData($personalid);

            $checkpersonal = true;
        } else {
            $personaldata = '';
            $checkpersonal = false;
        }

        // Family
        if (isset($pds) && $pds['family']) {
            $familyid = $pds['family'];
            $familyModel = new PDSFamilyModel();
            $familydata = $familyModel->getfamilyData($familyid);

            $childrenModel = new PDSFamilyChildrenModel();
            $childrendata = $childrenModel->getFamilyChildrens($familyid);

            if (!isset($familydata)) {
                echo "cannot find row in tblfamily";
                exit;
            }

            $checkfamily = true;
        } else {
            $familydata = '';
            $childrendata = '';
            $checkfamily = false;
        }

        // Education
        if (isset($pds) && $pds['education']) {
            $educationid = $pds['education'];
            $educationModel = new PDSEducationModel();
            $educationdata = $educationModel->getEducationData($educationid);

            $checkeducation = true;
        } else {
            $educationdata = '';
            $checkeducation = false;
        }

        // Civil Service
        if (isset($pds) && $pds['civil_service']) {
            $civilserviceid = $pds['civil_service'];
            $civilserviceModel = new PDSCivilServiceModel();
            $civilservicedata = $civilserviceModel->getCivilServiceData($civilserviceid);

            $civilserviceItemsModel = new PDSCivilServiceItemsModel();
            $civilserviceitems = $civilserviceItemsModel->getCivilServiceItems($civilserviceid);

            if (!isset($civilservicedata)) {
                echo "cannot find row in tblcivilservice";
                exit;
            }

            $checkcivilservice = true;
        } else {
            $civilservicedata = '';
            $civilserviceitems = '';
            $checkcivilservice = false;
        }

        // Work Experience
        if (isset($pds) && $pds['work_experience']) {
            $workexperienceid = $pds['work_experience'];
            $workexperienceModel = new PDSWorkExperienceModel();
            $workexperiencedata = $workexperienceModel->getWorkExperienceData($workexperienceid);

            $workexperienceItemsModel = new PDSWorkExperienceItemsModel();
            $workexperienceitems = $workexperienceItemsModel->getWorkExperienceItems($workexperienceid);

            if (!isset($workexperiencedata)) {
                echo "cannot find row in tblworkepxrience";
                exit;
            }

            $checkworkexperience = true;
        } else {
            $workexperiencedata = '';
            $workexperienceitems = '';
            $checkworkexperience = false;
        }

        // Voluntary Work
        if (isset($pds) && $pds['voluntary_work']) {
            $voluntaryworkid = $pds['voluntary_work'];
            $voluntaryworkModel = new PDSVoluntaryWorkModel();
            $voluntaryworkdata = $voluntaryworkModel->getVoluntaryWorkData($voluntaryworkid);

            $voluntaryworkItemsModel = new PDSVoluntaryWorkItemsModel();
            $voluntaryworkitems = $voluntaryworkItemsModel->getVoluntaryWorkItems($voluntaryworkid);

            if (!isset($voluntaryworkdata)) {
                echo "cannot find row in tblpdsvoluntarywork";
                exit;
            }

            $checkvoluntarywork = true;
        } else {
            $voluntaryworkdata = '';
            $voluntaryworkitems = '';
            $checkvoluntarywork = false;
        }

        // Training Program
        if (isset($pds) && $pds['training_program']) {
            $trainingprogramid = $pds['training_program'];
            $trainingprogramModel = new PDSTrainingProgramModel();
            $trainingprogramdata = $trainingprogramModel->getTrainingProgramData($trainingprogramid);

            $trainingprogramItemsModel = new PDSTrainingProgramItemsModel();
            $trainingprogramitems = $trainingprogramItemsModel->getTrainingProgramItems($trainingprogramid);

            if (!isset($trainingprogramdata)) {
                echo "cannot find row in tblpdstrainingprogram";
                exit;
            }

            $checktrainingprogram = true;
        } else {
            $trainingprogramdata = '';
            $trainingprogramitems = '';
            $checktrainingprogram = false;
        }

        // Other Information *****
        if (isset($pds) && $pds['other_information']) {
            $otherinformationid = $pds['other_information'];
            $otherinformationModel = new PDSOtherInformationModel();
            $otherinformationdata = $otherinformationModel->getOtherInformationData($otherinformationid);

            $otherinformationItemsModel = new PDSOtherInformationItemsModel();
            $otherinformationitems = $otherinformationItemsModel->getOtherInformationItems($otherinformationid);

            if (!isset($otherinformationdata)) {
                echo "cannot find row in tblpdsotherinformation";
                exit;
            }

            $checkotherinformation = true;
        } else {
            $otherinformationdata = '';
            $otherinformationitems = '';
            $checkotherinformation = false;
        }

        // Other Information *****
        if (isset($pds) && $pds['final']) {
            $finalid = $pds['final'];
            $finalModel = new PDSFinalModel();
            $finaldata = $finalModel->getFinalData($finalid);

            $refrenceItemsModel = new PDSFinalReferenceItemsModel();
            $refrenceitems = $refrenceItemsModel->getFinalReferenceItems($finalid);

            if (!isset($finaldata)) {
                echo "cannot find row in tblpdsotherinformation";
                exit;
            }

            $checkfinal = true;
        } else {
            $finaldata = '';
            $refrenceitems = '';
            $checkfinal = false;
        }

        $data = [
            'pds' => $pds,
            'checkpersonal' => $checkpersonal,
            'checkfamily' => $checkfamily,
            'checkeducation' => $checkeducation,
            'checkcivilservice' => $checkcivilservice,
            'checkworkexperience' => $checkworkexperience,
            'checkvoluntarywork' => $checkvoluntarywork,
            'checktrainingprogram' => $checktrainingprogram,
            'checkotherinformation' => $checkotherinformation,
            'checkfinal' => $checkfinal,

            'personal' => $personaldata,
            'family' => $familydata,
            'childrens' => $childrendata,
            'education' => $educationdata,
            'civilservice' => $civilservicedata,
            'civilserviceitems' => $civilserviceitems,
            'workexperience' => $workexperiencedata,
            'workexperienceitems' => $workexperienceitems,
            'voluntarywork' => $voluntaryworkdata,
            'voluntaryworkitems' => $voluntaryworkitems,
            'trainingprogram' => $trainingprogramdata,
            'trainingprogramitems' => $trainingprogramitems,
            'otherinformation' => $otherinformationdata,
            'otherinformationitems' => $otherinformationitems,
            'final' => $finaldata,
            'refrenceitems' => $refrenceitems,
            'sampleimage' => ''
        ];
        $data = array_merge($this->data, $data);
        return view('/Employee/Pages/personal-data-sheet', $data);
    }

    public function PDSPrintPage()
    {
        $accountid = session()->get('logged_id');
        $pdsModel = new PDSModel();
        $pds = $pdsModel->checkPDS($accountid);

        $personaldata = '';
        $familydata = '';
        $childrendata = '';
        $educationdata = '';
        $civilservicedata = '';
        $civilserviceitems = '';
        $workexperiencedata = '';
        $workexperienceitems = '';
        $voluntaryworkdata = '';
        $voluntaryworkitems = '';
        $trainingprogramdata = '';
        $trainingprogramitems = '';
        $otherinformationdata = '';
        $otherinformationitems = '';
        $finaldata = '';
        $referenceitems = '';

        if ($pds) {
            $personalid = $pds['personal'];
            if ($personalid) {
                $personalModel = new PDSPersonalModel();
                $personaldata = $personalModel->getPersonalData($personalid);
            }

            $familyid = $pds['family'];
            if ($familyid) {
                $familyModel = new PDSFamilyModel();
                $familydata = $familyModel->getFamilyData($familyid);

                $childrenModel = new PDSFamilyChildrenModel();
                $childrendata = $childrenModel->getFamilyChildrens($familyid);
            }

            $educationid = $pds['education'];
            if ($educationid) {
                $educationModel = new PDSEducationModel();
                $educationdata = $educationModel->getEducationData($educationid);
            }

            $civilserviceid = $pds['civil_service'];
            if ($civilserviceid) {
                $civilserviceModel = new PDSCivilServiceModel();
                $civilservicedata = $civilserviceModel->getCivilServiceData($civilserviceid);

                $civilserviceItemsModel = new PDSCivilServiceItemsModel();
                $civilserviceitems = $civilserviceItemsModel->getCivilServiceItems($civilserviceid);
            }

            $workexperienceid = $pds['work_experience'];
            if ($workexperienceid) {
                $workexperienceModel = new PDSWorkExperienceModel();
                $workexperiencedata = $workexperienceModel->getWorkExperienceData($workexperienceid);

                $workexperienceItemsModel = new PDSWorkExperienceItemsModel();
                $workexperienceitems = $workexperienceItemsModel->getWorkExperienceItems($workexperienceid);
            }

            $voluntaryworkid = $pds['voluntary_work'];
            if ($workexperienceid) {
                $voluntaryworkModel = new PDSVoluntaryWorkModel();
                $voluntaryworkdata = $voluntaryworkModel->getVoluntaryWorkData($voluntaryworkid);

                $voluntaryworkItemsModel = new PDSVoluntaryWorkItemsModel();
                $voluntaryworkitems = $voluntaryworkItemsModel->getVoluntaryWorkItems($voluntaryworkid);
            }

            $trainingprogramid = $pds['training_program'];
            if ($trainingprogramid) {
                $trainingprogramModel = new PDSTrainingProgramModel();
                $trainingprogramdata = $trainingprogramModel->getTrainingProgramData($trainingprogramid);

                $trainingprogramItemsModel = new PDSTrainingProgramItemsModel();
                $trainingprogramitems = $trainingprogramItemsModel->getTrainingProgramItems($trainingprogramid);
            }

            $otherinformationid = $pds['other_information'];
            if ($otherinformationid) {
                $otherinformationModel = new PDSOtherInformationModel();
                $otherinformationdata = $otherinformationModel->getOtherInformationData($otherinformationid);

                $otherinformationItemsModel = new PDSOtherInformationItemsModel();
                $otherinformationitems = $otherinformationItemsModel->getOtherInformationItems($otherinformationid);
            }


            $finalid = $pds['final'];
            if ($finalid) {
                $finalModel = new PDSFinalModel();
                $finaldata = $finalModel->getFinalData($finalid);

                $refrenceItemsModel = new PDSFinalReferenceItemsModel();
                $referenceitems = $refrenceItemsModel->getFinalReferenceItems($finalid);
            }
        }

        $data = [
            'personal' => $personaldata,
            'family' => $familydata,
            'childrens' => $childrendata,
            'education' => $educationdata,
            'civilservice' => $civilservicedata,
            'civilserviceitems' => $civilserviceitems,
            'workexperience' => $workexperiencedata,
            'workexperienceitems' => $workexperienceitems,
            'voluntarywork' => $voluntaryworkdata,
            'voluntaryworkitems' => $voluntaryworkitems,
            'trainingprogram' => $trainingprogramdata,
            'trainingprogramitems' => $trainingprogramitems,
            'otherinformation' => $otherinformationdata,
            'otherinformationitems' => $otherinformationitems,
            'final' => $finaldata,
            'referenceitems' => $referenceitems,
        ];
        $data = array_merge($this->data, $data);
        return view('/Admin/PDS/pds-print', $data);
    }

    // [ PDS Functions ]
    public function SavePDS()
    {
        $accountid = session()->get('logged_id');
        $isinserted = false;

        $pdsModel = new PDSModel();
        $pds = $pdsModel->checkPDS($accountid);
        if (!isset($pds)) {
            $pdsModel->insert(['account_id' => $accountid]);
        }

        $column = $this->request->getPost('pds_column');
        if ($column == 'personal') {
            $rqst_personalid = $this->request->getPost('prsnl_id');
            $rqst_firstname = $this->request->getPost('prsnl_firstname');
            $rqst_middlename = $this->request->getPost('prsnl_middlename');
            $rqst_lastname = $this->request->getPost('prsnl_lastname');
            $rqst_extension = $this->request->getPost('prsnl_extension');
            $rqst_placeofbirth = $this->request->getPost('prsnl_placeofbirth');
            $rqst_birthdate = $this->request->getPost('prsnl_birthdate');
            $rqst_sex = $this->request->getPost('prsnl_sex');
            $rqst_civilstatus = $this->request->getPost('prsnl_civilstatus');
            $rqst_height = $this->request->getPost('prsnl_height');
            $rqst_weight = $this->request->getPost('prsnl_weight');
            $rqst_bloodtype = $this->request->getPost('prsnl_bloodtype');
            $rqst_gsis = $this->request->getPost('prsnl_gsis');
            $rqst_pagibig = $this->request->getPost('prsnl_pagibig');
            $rqst_philhealth = $this->request->getPost('prsnl_philhealth');
            $rqst_sss = $this->request->getPost('prsnl_sss');
            $rqst_tin = $this->request->getPost('prsnl_tin');
            $rqst_agency = $this->request->getPost('prsnl_agency');
            $rqst_citizenship = $this->request->getPost('prsnl_citizenship');
            $rqst_citizenshipby = $this->request->getPost('prsnl_citizenshipby');
            $rqst_secondcountry = $this->request->getPost('prsnl_secondcountry');

            $rqst_residentaddressno = $this->request->getPost('prsnl_residentialnumber');
            $rqst_residentstreet = $this->request->getPost('prsnl_residentialstreet');
            $rqst_residentvillage = $this->request->getPost('prsnl_residentialvillage');
            $rqst_residentcity = $this->request->getPost('prsnl_residentialcity');
            $rqst_residentbarangay = $this->request->getPost('prsnl_residentialbarangay');
            $rqst_residentprovince = $this->request->getPost('prsnl_residentialprovince');
            $rqst_residentzipcode = $this->request->getPost('prsnl_residentialzipcode');

            $rqst_permanentaddressno = $this->request->getPost('prsnl_permanentnumber');
            $rqst_permanentstreet = $this->request->getPost('prsnl_permanentstreet');
            $rqst_permanentvillage = $this->request->getPost('prsnl_permanentvillage');
            $rqst_permanentcity = $this->request->getPost('prsnl_permanentcity');
            $rqst_permanentbarangay = $this->request->getPost('prsnl_permanentbarangay');
            $rqst_permanentprovince = $this->request->getPost('prsnl_permanentprovince');

            $rqst_permanentzipcode = $this->request->getPost('prsnl_permanentzipcode');
            $rqst_telephone = $this->request->getPost('prsnl_telephone');
            $rqst_mobile = $this->request->getPost('prsnl_mobilenumber');
            $rqst_email = $this->request->getPost('prsnl_emailaddress');

            $pdspersonalModel = new PDSPersonalModel();
            $personalData = [
                'personal_id' => $rqst_personalid,
                'account_id' => $accountid,
                'first_name' => $rqst_firstname,
                'middle_name' => $rqst_middlename,
                'last_name' => $rqst_lastname,
                'extension_name' => $rqst_extension,
                'place_of_birth' => $rqst_placeofbirth,
                'birthdate' => $rqst_birthdate,
                'sex' => $rqst_sex,
                'civil_status' => $rqst_civilstatus,
                'height' => $rqst_height,
                'weight' => $rqst_weight,
                'blood_type' => $rqst_bloodtype,
                'gsis' => $rqst_gsis,
                'pagibig' => $rqst_pagibig,
                'philhealth' => $rqst_philhealth,
                'sss' => $rqst_sss,
                'tin' => $rqst_tin,
                'agency' => $rqst_agency,
                'citizenship' => $rqst_citizenship,
                'citizenship_by' => $rqst_citizenshipby,
                'second_country' => $rqst_secondcountry ? $rqst_secondcountry : 'Philippines',
                'raddress_no' => $rqst_residentaddressno,
                'raddress_street' => $rqst_residentstreet,
                'raddress_village' => $rqst_residentvillage,
                'raddress_city' => $rqst_residentcity,
                'raddress_barangay' => $rqst_residentbarangay,
                'raddress_province' => $rqst_residentprovince,
                'raddress_zipcode' => $rqst_residentzipcode,
                'paddress_no' => $rqst_permanentaddressno,
                'paddress_street' => $rqst_permanentstreet,
                'paddress_village' => $rqst_permanentvillage,
                'paddress_city' => $rqst_permanentcity,
                'paddress_barangay' => $rqst_permanentbarangay,
                'paddress_province' => $rqst_permanentprovince,
                'paddress_zipcode' => $rqst_permanentzipcode,
                'telephone_no' => $rqst_telephone,
                'mobile_no' => $rqst_mobile,
                'email_address' => $rqst_email,
            ];
            $saverow = $pdspersonalModel->save($personalData);
            $rowid = $pdspersonalModel->getInsertID();

            if ($saverow) {
                if ($rowid != 0) {
                    $pdsModel = new PDSModel();
                    $pdsModel->updatePDS($accountid, $column, $rowid);
                    $isinserted = true;
                } else {
                    $isinserted = false;
                }
            } else {
                session()->setFlashdata('alert_failed', 'Something Went Wrong!');
            }
        } else if ($column == 'family') {
            $rqst_familyid = $this->request->getPost('fmly_id');
            $rqst_spousefirstname = $this->request->getPost('fmly_spouse_firstname');
            $rqst_spousemiddlename = $this->request->getPost('fmly_spouse_middlename');
            $rqst_spouselastname = $this->request->getPost('fmly_spouse_lastname');
            $rqst_spouseextension = $this->request->getPost('fmly_spouse_extension');
            $rqst_spouseoccupation = $this->request->getPost('fmly_spouse_occupation');
            $rqst_spouseemployerbusinessname = $this->request->getPost('fmly_spouse_employerbusinessname');
            $rqst_spousebusinessaddress = $this->request->getPost('fmly_spouse_businessaddress');
            $rqst_spousetelephone = $this->request->getPost('fmly_spouse_telephone');
            $rqst_childrencount = $this->request->getPost('fmly_childrencount');
            $rqst_fatherfirstname = $this->request->getPost('fmly_father_firstname');
            $rqst_fathermiddlename = $this->request->getPost('fmly_father_middlename');
            $rqst_fatherlastname = $this->request->getPost('fmly_father_lastname');
            $rqst_fatherextension = $this->request->getPost('fmly_father_extension');
            $rqst_motherfirstname = $this->request->getPost('fmly_mother_firstname');
            $rqst_mothermiddlename = $this->request->getPost('fmly_mother_middlename');
            $rqst_motherlastname = $this->request->getPost('fmly_mother_lastname');
            $rqst_mothermaidenname = $this->request->getPost('fmly_mother_maidenname');

            $rqst_children = $this->request->getPost("fmly_children_1");
            if ($rqst_children == '') {
                $rqst_childrencount = 0;
                $childrenModel = new PDSFamilyChildrenModel();
                $childrenModel->where('family_id', $rqst_familyid)->delete();
            }

            $pdsfamilyModel = new PDSFamilyModel();
            $familyData = [
                'family_id' => $rqst_familyid,
                'account_id' => $accountid,
                'spouse_last_name' => $rqst_spouselastname,
                'spouse_first_name' => $rqst_spousefirstname,
                'spouse_middle_name' => $rqst_spousemiddlename,
                'spouse_extension_name' => $rqst_spouseextension,
                'spouse_occupation' => $rqst_spouseoccupation,
                'spouse_employer_or_business_name' => $rqst_spouseemployerbusinessname,
                'spouse_business_address' => $rqst_spousebusinessaddress,
                'spouse_telephone_no' => $rqst_spousetelephone,
                'children_count' => $rqst_childrencount,
                'father_last_name' => $rqst_fatherlastname,
                'father_first_name' => $rqst_fatherfirstname,
                'father_middle_name' => $rqst_fathermiddlename,
                'father_extension_name' => $rqst_fatherextension,
                'mother_last_name' => $rqst_motherlastname,
                'mother_first_name' => $rqst_motherfirstname,
                'mother_middle_name' => $rqst_mothermiddlename,
                'mother_maiden_name' => $rqst_mothermaidenname,
            ];
            $saverow = $pdsfamilyModel->save($familyData);
            $rowid = $pdsfamilyModel->getInsertID();

            if ($saverow) {
                if ($rowid != 0) {
                    $pdsModel = new PDSModel();
                    $pdsModel->updatePDS($accountid, $column, $rowid);
                    $isinserted = true;
                } else {
                    $rowid = $rqst_familyid;
                    $isinserted = false;
                }
            } else {
                session()->setFlashdata('alert_failed', 'Something Went Wrong!');
                return redirect()->to('/EmployeeController/PersonalDataSheetPage');
            }

            if (!empty($rqst_childrencount)) {
                $childrenModel = new PDSFamilyChildrenModel();
                $childrenModel->where('family_id', $rqst_familyid)->delete();

                for ($count = 1; $count <= $rqst_childrencount; $count++) {
                    $rqst_childrenname = $this->request->getPost("fmly_children_$count");
                    $rqst_childrenbday = $this->request->getPost("fmly_children_birthdate_$count");

                    if (!empty($rqst_childrenname)) {
                        $childrenModel = new PDSFamilyChildrenModel();
                        $childrenData = [
                            'family_id' => $rowid,
                            'children_name' => $rqst_childrenname,
                            'children_birthdate' => $rqst_childrenbday
                        ];
                        $childrenModel->save($childrenData);
                    }
                }
            }
        } else if ($column == 'education') {
            $educationid = $this->request->getPost('educ_id');
            $rqst_elementary_school = $this->request->getPost('educ_elementary_school');
            $rqst_elementary_education = $this->request->getPost('educ_elementary_education');
            $rqst_elementary_periodfrom = $this->request->getPost('educ_elementary_period_from');
            $rqst_elementary_periodto = $this->request->getPost('educ_elementary_period_to');
            $rqst_elementary_highestlevel = $this->request->getPost('educ_elementary_highest_level');
            $rqst_elementary_yeargraduated = $this->request->getPost('educ_elementary_year_graduated');
            $rqst_elementary_honors = $this->request->getPost('educ_elementary_honors');

            $rqst_secondary_school = $this->request->getPost('educ_secondary_school');
            $rqst_secondary_education = $this->request->getPost('educ_secondary_education');
            $rqst_secondary_periodfrom = $this->request->getPost('educ_secondary_period_from');
            $rqst_secondary_periodto = $this->request->getPost('educ_secondary_period_to');
            $rqst_secondary_highestlevel = $this->request->getPost('educ_secondary_highest_level');
            $rqst_secondary_yeargraduated = $this->request->getPost('educ_secondary_year_graduated');
            $rqst_secondary_honors = $this->request->getPost('educ_secondary_honors');

            $rqst_vocational_school = $this->request->getPost('educ_vocational_school');
            $rqst_vocational_education = $this->request->getPost('educ_vocational_education');
            $rqst_vocational_periodfrom = $this->request->getPost('educ_vocational_period_from');
            $rqst_vocational_periodto = $this->request->getPost('educ_vocational_period_to');
            $rqst_vocational_highestlevel = $this->request->getPost('educ_vocational_highest_level');
            $rqst_vocational_yeargraduated = $this->request->getPost('educ_vocational_year_graduated');
            $rqst_vocational_honors = $this->request->getPost('educ_vocational_honors');

            $rqst_graduatestudies_school = $this->request->getPost('educ_graduatestudies_school');
            $rqst_graduatestudies_education = $this->request->getPost('educ_graduatestudies_education');
            $rqst_graduatestudies_periodfrom = $this->request->getPost('educ_graduatestudies_period_from');
            $rqst_graduatestudies_periodto = $this->request->getPost('educ_graduatestudies_period_to');
            $rqst_graduatestudies_highestlevel = $this->request->getPost('educ_graduatestudies_highest_level');
            $rqst_graduatestudies_yeargraduated = $this->request->getPost('educ_graduatestudies_year_graduated');
            $rqst_graduatestudies_honors = $this->request->getPost('educ_graduatestudies_honors');

            $rqst_college_school = $this->request->getPost('educ_college_school');
            $rqst_college_education = $this->request->getPost('educ_college_education');
            $rqst_college_periodfrom = $this->request->getPost('educ_college_period_from');
            $rqst_college_periodto = $this->request->getPost('educ_college_period_to');
            $rqst_college_highestlevel = $this->request->getPost('educ_college_highest_level');
            $rqst_college_yeargraduated = $this->request->getPost('educ_college_year_graduated');
            $rqst_college_honors = $this->request->getPost('educ_college_honors');

            $educationModel = new PDSEducationModel();
            $educationData = [
                'education_id' => $educationid,
                'elementary_school' => $rqst_elementary_school,
                'elementary_education' => $rqst_elementary_education,
                'elementary_period_from' => $rqst_elementary_periodfrom,
                'elementary_period_to' => $rqst_elementary_periodto,
                'elementary_highest_level' => $rqst_elementary_highestlevel,
                'elementary_year_graduated' => $rqst_elementary_yeargraduated,
                'elementary_honors' => $rqst_elementary_honors,
                'secondary_school' => $rqst_secondary_school,
                'secondary_education' => $rqst_secondary_education,
                'secondary_period_from' => $rqst_secondary_periodfrom,
                'secondary_period_to' => $rqst_secondary_periodto,
                'secondary_highest_level' => $rqst_secondary_highestlevel,
                'secondary_year_graduated' => $rqst_secondary_yeargraduated,
                'secondary_honors' => $rqst_secondary_honors,
                'vocational_school' => $rqst_vocational_school,
                'vocational_education' => $rqst_vocational_education,
                'vocational_period_from' => $rqst_vocational_periodfrom,
                'vocational_period_to' => $rqst_vocational_periodto,
                'vocational_highest_level' => $rqst_vocational_highestlevel,
                'vocational_year_graduated' => $rqst_vocational_yeargraduated,
                'vocational_honors' => $rqst_vocational_honors,
                'graduatestudies_school' => $rqst_graduatestudies_school,
                'graduatestudies_education' => $rqst_graduatestudies_education,
                'graduatestudies_period_from' => $rqst_graduatestudies_periodfrom,
                'graduatestudies_period_to' => $rqst_graduatestudies_periodto,
                'graduatestudies_highest_level' => $rqst_graduatestudies_highestlevel,
                'graduatestudies_year_graduated' => $rqst_graduatestudies_yeargraduated,
                'graduatestudies_honors' => $rqst_graduatestudies_honors,
                'college_school' => $rqst_college_school,
                'college_education' => $rqst_college_education,
                'college_period_from' => $rqst_college_periodfrom,
                'college_period_to' => $rqst_college_periodto,
                'college_highest_level' => $rqst_college_highestlevel,
                'college_year_graduated' => $rqst_college_yeargraduated,
                'college_honor' => $rqst_college_honors,
            ];
            $saverow = $educationModel->save($educationData);
            $rowid = $educationModel->getInsertID();

            if ($saverow) {
                if ($rowid != 0) {
                    $pdsModel = new PDSModel();
                    $pdsModel->updatePDS($accountid, $column, $rowid);
                    $isinserted = true;
                } else {
                    $isinserted = false;
                }
            } else {
                session()->setFlashdata('alert_failed', 'Something Went Wrong!');
            }
        } else if ($column == 'civil_service') {
            $rqst_civilservicecount = $this->request->getPost("cse_count");
            $rqst_civilserviceid = $this->request->getPost("cse_id");

            $rqst_civilservice = $this->request->getPost("cse_career_service_1");
            if (empty($rqst_civilservice)) {
                $rqst_civilservicecount = 0;
            }

            if (!empty($rqst_civilservicecount)) {
                $civilserviceModel = new PDSCivilServiceModel();
                $civilserviceData = [
                    'civilservice_id' => $rqst_civilserviceid,
                    'account_id' => $accountid,
                    'civilservice_count' => $rqst_civilservicecount,
                ];
                $saverow = $civilserviceModel->save($civilserviceData);
                $rowid = $civilserviceModel->getInsertID();

                if ($saverow) {
                    if ($rowid != 0) {
                        $pdsModel = new PDSModel();
                        $pdsModel->updatePDS($accountid, $column, $rowid);
                        $isinserted = true;
                    } else {
                        $rowid = $rqst_civilserviceid;
                        $isinserted = false;
                    }
                } else {
                    session()->setFlashdata('alert_failed', 'Something Went Wrong!');
                }

                $civilserviceItemsModel = new PDSCivilServiceItemsModel();
                $civilserviceItemsModel->where('civilservice_id', $rqst_civilserviceid)->delete();

                for ($count = 1; $count <= $rqst_civilservicecount; $count++) {
                    $rqst_civilservice = $this->request->getPost("cse_career_service_$count");
                    $rqst_rating = $this->request->getPost("cse_rating_$count");
                    $rqst_examinationdate = $this->request->getPost("cse_examination_date_$count");
                    $rqst_examinationplace = $this->request->getPost("cse_examination_place_$count");
                    $rqst_licensenumber = $this->request->getPost("cse_license_number_$count");
                    $rqst_licensevalidity = $this->request->getPost("cse_license_validity_$count");

                    if (!empty($rqst_civilservice)) {
                        $civilserviceItemsModel = new PDSCivilServiceItemsModel();
                        $civilserviceData = [
                            'civilservice_id' => $rowid,
                            'career_service' => $rqst_civilservice,
                            'rating' => $rqst_rating,
                            'date_of_examination' => $rqst_examinationdate,
                            'place_of_examination' => $rqst_examinationplace,
                            'license_number' => $rqst_licensenumber,
                            'validity_date' => $rqst_licensevalidity,
                        ];
                        $civilserviceItemsModel->insert($civilserviceData);
                    }
                }
            }
        } else if ($column == 'work_experience') {
            $rqst_workexperiencecount = $this->request->getPost("workexp_count");
            $rqst_workexperienceid = $this->request->getPost("workexp_id");

            $rqst_position = $this->request->getPost("workexp_position_title_1");
            if (empty($rqst_position)) {
                $rqst_workexperiencecount = 0;
            }

            if (!empty($rqst_workexperiencecount)) {
                $workexperienceModel = new PDSWorkExperienceModel();
                $civilserviceData = [
                    'workexperience_id' => $rqst_workexperienceid,
                    'account_id' => $accountid,
                    'workexperience_count' => $rqst_workexperiencecount,
                ];
                $saverow = $workexperienceModel->save($civilserviceData);
                $rowid = $workexperienceModel->getInsertID();

                if ($saverow) {
                    if ($rowid != 0) {
                        $pdsModel = new PDSModel();
                        $pdsModel->updatePDS($accountid, $column, $rowid);
                        $isinserted = true;
                    } else {
                        $rowid = $rqst_workexperienceid;
                        $isinserted = false;
                    }
                } else {
                    session()->setFlashdata('alert_failed', 'Something Went Wrong!');
                }

                $workexperienceModel = new PDSWorkExperienceItemsModel();
                $workexperienceModel->where('workexperience_id', $rqst_workexperienceid)->delete();

                for ($count = 1; $count <= $rqst_workexperiencecount; $count++) {
                    $rqst_position = $this->request->getPost("workexp_position_title_$count");
                    $rqst_datefrom = $this->request->getPost("workexp_inclusivefrom_$count");
                    $rqst_dateto = $this->request->getPost("workexp_inclusiveto_$count");
                    $rqst_company = $this->request->getPost("workexp_company_$count");
                    $rqst_monthlysalary = $this->request->getPost("workexp_monthly_salary_$count");
                    $rqst_increment = $this->request->getPost("workexp_increment_$count");
                    $rqst_status = $this->request->getPost("workexp_status_$count");
                    $rqst_service = $this->request->getPost("workexp_govservice_$count");

                    if (!empty($rqst_position)) {
                        $workexperienceItemsModel = new PDSWorkExperienceItemsModel();
                        $workexperienceData = [
                            'workexperience_id' => $rowid,
                            'position' => $rqst_position,
                            'inclusive_date_from' => $rqst_datefrom,
                            'inclusive_date_to' => $rqst_dateto,
                            'company' => $rqst_company,
                            'mothly_salary' => $rqst_monthlysalary,
                            'increment' => $rqst_increment,
                            'appointment_status' => $rqst_status,
                            'gov_service' => $rqst_service,
                        ];
                        $workexperienceItemsModel->insert($workexperienceData);
                    }
                }
            }
        } else if ($column == 'voluntary_work') {
            $rqst_voluntaryworkcount = $this->request->getPost("vltrywork_count");
            $rqst_voluntaryworkid = $this->request->getPost("vltrywork_id");

            $rqst_organization = $this->request->getPost("vltrywork_oganization_1");
            if (empty($rqst_organization)) {
                $rqst_voluntaryworkcount = 0;
            }

            if (!empty($rqst_voluntaryworkcount)) {
                $voluntaryworkModel = new PDSVoluntaryWorkModel();
                $voluntaryworkData = [
                    'voluntarywork_id' => $rqst_voluntaryworkid,
                    'account_id' => $accountid,
                    'voluntarywork_count' => $rqst_voluntaryworkcount,
                ];
                $saverow = $voluntaryworkModel->save($voluntaryworkData);
                $rowid = $voluntaryworkModel->getInsertID();

                if ($saverow) {
                    if ($rowid != 0) {
                        $pdsModel = new PDSModel();
                        $pdsModel->updatePDS($accountid, $column, $rowid);
                        $isinserted = true;
                    } else {
                        $rowid = $rqst_voluntaryworkid;
                        $isinserted = false;
                    }
                } else {
                    session()->setFlashdata('alert_failed', 'Something Went Wrong!');
                }

                $voluntaryworkItemsModel = new PDSVoluntaryWorkItemsModel();
                $voluntaryworkItemsModel->where('voluntarywork_id', $rqst_voluntaryworkid)->delete();

                for ($count = 1; $count <= $rqst_voluntaryworkcount; $count++) {
                    $rqst_organization = $this->request->getPost("vltrywork_oganization_$count");
                    $rqst_datefrom = $this->request->getPost("vltrywork_inclusivefrom_$count");
                    $rqst_dateto = $this->request->getPost("vltrywork_inclusiveto_$count");
                    $rqst_hours = $this->request->getPost("vltrywork_hours_$count");
                    $rqst_natureofwork = $this->request->getPost("vltrywork_nature_of_work_$count");

                    if (!empty($rqst_organization)) {
                        $voluntaryworkItemsModel = new PDSVoluntaryWorkItemsModel();
                        $voluntaryworkData = [
                            'voluntarywork_id' => $rowid,
                            'organization' => $rqst_organization,
                            'inclusive_date_from' => $rqst_datefrom,
                            'inclusive_date_to' => $rqst_dateto,
                            'hours' => $rqst_hours,
                            'nature_of_work' => $rqst_natureofwork,
                        ];
                        $voluntaryworkItemsModel->insert($voluntaryworkData);
                    }
                }
            }
        } else if ($column == 'training_program') {
            $rqst_trainingprogramcount = $this->request->getPost("prgm_count");
            $rqst_trainingprogramid = $this->request->getPost("prgm_id");

            $rqst_program = $this->request->getPost("prgm_title_1");
            if (empty($rqst_program)) {
                $rqst_trainingprogramcount = 0;
            }

            if (!empty($rqst_trainingprogramcount)) {
                $trainingprogramModel = new PDSTrainingProgramModel();
                $trainingprogramData = [
                    'trainingprogram_id' => $rqst_trainingprogramid,
                    'account_id' => $accountid,
                    'trainingprogram_count' => $rqst_trainingprogramcount,
                ];
                $saverow = $trainingprogramModel->save($trainingprogramData);
                $rowid = $trainingprogramModel->getInsertID();

                if ($saverow) {
                    if ($rowid != 0) {
                        $pdsModel = new PDSModel();
                        $pdsModel->updatePDS($accountid, $column, $rowid);
                        $isinserted = true;
                    } else {
                        $rowid = $rqst_trainingprogramid;
                        $isinserted = false;
                    }
                } else {
                    session()->setFlashdata('alert_failed', 'Something Went Wrong!');
                }

                $trainingprogramItemsModel = new PDSTrainingProgramItemsModel();
                $trainingprogramItemsModel->where('trainingprogram_id', $rqst_trainingprogramid)->delete();

                for ($count = 1; $count <= $rqst_trainingprogramcount; $count++) {
                    $rqst_program = $this->request->getPost("prgm_title_$count");
                    $rqst_datefrom = $this->request->getPost("prgm_inclusivefrom_$count");
                    $rqst_dateto = $this->request->getPost("prgm_inclusiveto_$count");
                    $rqst_hours = $this->request->getPost("prgm_hours_$count");
                    $rqst_typeofld = $this->request->getPost("prgm_type_of_ld_$count");
                    $rqst_sponsoredby = $this->request->getPost("prgm_sponsored_by_$count");

                    if (!empty($rqst_program)) {
                        $trainingprogramItemsModel = new PDSTrainingProgramItemsModel();
                        $trainingprogramData = [
                            'trainingprogram_id' => $rowid,
                            'training_program' => $rqst_program,
                            'inclusive_date_from' => $rqst_datefrom,
                            'inclusive_date_to' => $rqst_dateto,
                            'hours' => $rqst_hours,
                            'type_of_ld' => $rqst_typeofld,
                            'sponsored_by' => $rqst_sponsoredby,
                        ];
                        $trainingprogramItemsModel->insert($trainingprogramData);
                    }
                }
            }
        } else if ($column == 'other_information') {
            $rqst_skillcount = $this->request->getPost("othrinfo_skill_count");
            $rqst_recognitioncount = $this->request->getPost("othrinfo_recognition_count");
            $rqst_membershipcount = $this->request->getPost("othrinfo_membership_count");
            $rqst_otherinformationid = $this->request->getPost("othrinfo_id");

            $rqst_skill = $this->request->getPost("othrinfo_skill_1");
            if (empty($rqst_skill)) {
                $rqst_skillcount = 0;
            }

            $rqst_recognition = $this->request->getPost("othrinfo_recognition_1");
            if (empty($rqst_recognition)) {
                $rqst_recognitioncount = 0;
            }

            $rqst_membership = $this->request->getPost("othrinfo_membership_1");
            if (empty($rqst_membership)) {
                $rqst_membershipcount = 0;
            }

            if (!empty($rqst_skillcount) || !empty($rqst_recognitioncount) || !empty($rqst_membershipcount)) {
                $otherinformationModel = new PDSOtherInformationModel();
                $otherinformationData = [
                    'otherinformation_id' => $rqst_otherinformationid,
                    'account_id' => $accountid,
                    'skill_count' => $rqst_skillcount,
                    'recognition_count' => $rqst_recognitioncount,
                    'membership_count' => $rqst_membershipcount,
                ];
                $saverow = $otherinformationModel->save($otherinformationData);
                $rowid = $otherinformationModel->getInsertID();

                if ($saverow) {
                    if ($rowid != 0) {
                        $pdsModel = new PDSModel();
                        $pdsModel->updatePDS($accountid, $column, $rowid);
                        $isinserted = true;
                    } else {
                        $rowid = $rqst_otherinformationid;
                        $isinserted = false;
                    }
                } else {
                    session()->setFlashdata('alert_failed', 'Something Went Wrong!');
                }

                $otherinformationItemsModel = new PDSOtherInformationItemsModel();
                $otherinformationItemsModel->where('otherinformation_id', $rqst_otherinformationid)->delete();

                if (!empty($rqst_skillcount)) {
                    for ($count = 1; $count <= $rqst_skillcount; $count++) {
                        $rqst_skill = $this->request->getPost("othrinfo_skill_$count");

                        if (!empty($rqst_skill)) {
                            $otherinformationItemsModel = new PDSOtherInformationItemsModel();
                            $otherinformationData = [
                                'otherinformation_id' => $rowid,
                                'item_type' => 1,
                                'information' => $rqst_skill,
                            ];
                            $otherinformationItemsModel->insert($otherinformationData);
                        }
                    }
                }

                if (!empty($rqst_recognitioncount)) {
                    for ($count = 1; $count <= $rqst_recognitioncount; $count++) {
                        $rqst_recognition = $this->request->getPost("othrinfo_recognition_$count");

                        if (!empty($rqst_recognition)) {
                            $otherinformationItemsModel = new PDSOtherInformationItemsModel();
                            $otherinformationData = [
                                'otherinformation_id' => $rowid,
                                'item_type' => 2,
                                'information' => $rqst_recognition,
                            ];
                            $otherinformationItemsModel->insert($otherinformationData);
                        }
                    }
                }

                if (!empty($rqst_membershipcount)) {
                    for ($count = 1; $count <= $rqst_membershipcount; $count++) {
                        $rqst_membership = $this->request->getPost("othrinfo_membership_$count");

                        if (!empty($rqst_membership)) {
                            $otherinformationItemsModel = new PDSOtherInformationItemsModel();
                            $otherinformationData = [
                                'otherinformation_id' => $rowid,
                                'item_type' => 3,
                                'information' => $rqst_membership,
                            ];
                            $otherinformationItemsModel->insert($otherinformationData);
                        }
                    }
                }
            }
        } else if ($column == 'final') {
            $rqst_finalid = $this->request->getPost("final_id");
            $rqst_idpicture = $this->request->getFile("final_idpicture");
            $rqst_govid = $this->request->getPost("final_government_id");
            $rqst_govidnum = $this->request->getPost("final_government_idnumber");
            $rqst_govdoi = $this->request->getPost("final_date_of_issuance");
            $rqst_referenceid = $this->request->getPost("rfrnc_id");
            $rqst_referencecount = $this->request->getPost("rfrnc_count");

            $rqst_reference = $this->request->getPost("final_reference_1");
            if (empty($rqst_reference)) {
                $rqst_referencecount = 0;
            }

            $idpicturepath = '';
            if (!empty($rqst_idpicture)) {
                $imagepath = "/tup-files/pds-pictures/";
                $directorypath = FCPATH . $imagepath;

                if (!is_dir($directorypath)) {
                    mkdir($directorypath, 0777, true);
                }

                if ($rqst_idpicture->isValid()) {
                    $usercode = session()->get('logged_code');
                    $filetype = $rqst_idpicture->getExtension();
                    $filename = $usercode . "_IDPicture." . $filetype;
                    $filepath = $directorypath . DIRECTORY_SEPARATOR . $filename;

                    if (file_exists($filepath)) {
                        unlink($filepath);
                    }

                    $rqst_idpicture->move($directorypath, $filename);
                    $idpicturepath = $imagepath . "$filename";
                }
            }

            if (!empty($rqst_idpicture) || !empty($rqst_govid) || !empty($rqst_govidnum) || !empty($rqst_referencecount)) {
                $finalModel = new PDSFinalModel();
                $finalData = [
                    'final_id' => $rqst_finalid,
                    'account_id' => $accountid,
                    'id_picture' => $idpicturepath,
                    'government_id' => $rqst_govid,
                    'id_number' => $rqst_govidnum,
                    'date_or_issuance' => $rqst_govdoi,
                    'reference_count' => $rqst_referencecount,
                ];
                $saverow = $finalModel->save($finalData);
                $rowid = $finalModel->getInsertID();

                if ($saverow) {
                    if ($rowid != 0) {
                        $pdsModel = new PDSModel();
                        $pdsModel->updatePDS($accountid, $column, $rowid);
                        $isinserted = true;
                    } else {
                        $rowid = $rqst_finalid;
                        $isinserted = false;
                    }
                } else {
                    session()->setFlashdata('alert_failed', 'Something Went Wrong!');
                }

                $referenceItemsModel = new PDSFinalReferenceItemsModel();
                $referenceItemsModel->where('final_id ', $rqst_finalid)->delete();

                for ($count = 1; $count <= $rqst_referencecount; $count++) {
                    $rqst_reference = $this->request->getPost("final_reference_$count");
                    $rqst_address = $this->request->getPost("final_address_$count");
                    $rqst_telephone = $this->request->getPost("final_telephone_$count");

                    if (!empty($rqst_reference)) {
                        $referenceItemsModel = new PDSFinalReferenceItemsModel();
                        $referenceData = [
                            'final_id' => $rowid,
                            'reference_name' => $rqst_reference,
                            'reference_address' => $rqst_address,
                            'reference_telephone' => $rqst_telephone,
                        ];
                        $referenceItemsModel->insert($referenceData);
                    }
                }
            }
        } else {
            echo "column not found";
            exit;
        }

        // alert
        session()->setFlashdata('fd_column', $column);

        $pdsModel = new PDSModel();
        $userpds = $pdsModel->checkPDS($accountid);
        if ($userpds['is_complete'] == 0) {
            $iscomplete = $pdsModel->checkPDSComplete($accountid);
        } else {
            $iscomplete = false;
        }

        if ($iscomplete) {
            session()->setFlashdata('alert_complete', 'PDS Complete!');
            return redirect()->to('/EmployeeController/PersonalDataSheetPage');
        } else {
            if ($isinserted) {
                session()->setFlashdata('alert_insertsuccess', 'Saved!');
                return redirect()->to('/EmployeeController/PersonalDataSheetPage');
            } else {
                session()->setFlashdata('alert_updatesuccess', 'Updated!');
                return redirect()->to('/EmployeeController/PersonalDataSheetPage');
            }
        }
    }

    // [ Files Views ]
    public function FilesPage($foldercode)
    {
        $accountid = session()->get('logged_id');
        $page = 'myfiles';
        $folderid = 0;
        $hierarchy = 1;
        $ishome = true;

        // [ Folders ]
        $foldersModel = new FoldersModel();
        if ($foldercode != 0) {
            $checkfolder = $foldersModel->where('account_id', $accountid)->where('folder_code', $foldercode)->first();

            if (!$checkfolder) {
                session()->setFlashdata('alert_failed', 'Cannot Access Folder!');
                return redirect()->to('/EmployeeController/FilesPage/0');
            } else {
                $folderid = $checkfolder['folder_id'];
                $hierarchy = $checkfolder['hierarchy'];
                $ishome = false;
            }
        }

        $folders = $foldersModel->getMyFolders($accountid, $folderid);
        $hierarchypath = $foldersModel->getFolderHierarchyPath($folderid, $hierarchy);
        $parentfolders = $foldersModel->where('account_id', $accountid)->where('parent_folder', 0)->findAll();

        if (!$ishome) {
            $mainparent = $hierarchypath[0];
            $mainparentid = $mainparent['folder_id'];
            $this->FolderTriggers($folderid, $mainparentid, $page);
        }

        // [ Files ]
        $filesModel = new FilesModel();
        $folderfiles = $filesModel->where('folder_id', $folderid)->findAll();

        $data = [
            'folderid' => $folderid,
            'foldercode' => $foldercode,
            'parentfolders' => $parentfolders,
            'folders' => $folders,
            'folderfiles' => $folderfiles,
            'hierarchypath' => $hierarchypath,
            'ishome' => $ishome
        ];
        $data = array_merge($this->data, $data);
        return view('/Employee/Pages/files', $data);
    }

    public function PublicFilesPage($foldercode)
    {
        $accountid = session()->get('logged_id');
        $page = 'publicfiles';
        $folderid = 0;
        $hierarchy = 1;
        $ishome = true;

        // [ Folders ]
        $foldersModel = new FoldersModel();
        if ($foldercode != 0 && $ishome) {
            $checkfolder = $foldersModel->where('access_level', 1)->where('folder_code', $foldercode)->first();
            if (!$checkfolder) {
                session()->setFlashdata('alert_failed', 'Cannot Access Folder!');
                return redirect()->to('/EmployeeController/PublicFilesPage/0');
            } else {
                $folderid = $checkfolder['folder_id'];
                $hierarchy = $checkfolder['hierarchy'];
                $ishome = false;
            }
        }

        $folders = $foldersModel->getPublicFolders($folderid);
        $hierarchypath = $foldersModel->getFolderHierarchyPath($folderid, $hierarchy);
        $parentfolders = $foldersModel->where('account_id', $accountid)->where('parent_folder', 0)->findAll();

        if (!$ishome) {
            $mainparent = $hierarchypath[0];
            $mainparentid = $mainparent['folder_id'];

            $this->FolderTriggers($folderid, $mainparentid, $page);
        }

        $filesModel = new FilesModel();
        $folderfiles = $filesModel->where('folder_id', $folderid)->findAll();

        $data = [
            'folderid' => $folderid,
            'foldercode' => $foldercode,
            'parentfolders' => $parentfolders,
            'folders' => $folders,
            'folderfiles' => $folderfiles,
            'hierarchypath' => $hierarchypath,
            'ishome' => $ishome,
        ];
        $data = array_merge($this->data, $data);
        return view('/Employee/Pages/files-public', $data);
    }

    // [ Folder and Files Logic Functions ]
    public function SaveFolder()
    {
        $accountid = session()->get('logged_id');
        $usertype = session()->get('logged_usertype');

        $rqst_folderid = $this->request->getPost('emp_folderid');
        $rqst_foldername = $this->request->getPost('emp_foldername');
        $rqst_parentfolder = $this->request->getPost('emp_parentfolder');
        $rqst_parentfoldercode = $this->request->getPost('emp_parentfoldercode');
        $rqst_accesslevel = $this->request->getPost('emp_accesslevel');

        // Functions
        $foldercode = $this->GenerateCode();
        $accessleveltitle = $this->AccessLevelTitle($rqst_accesslevel);

        if (!isset($rqst_parentfolder)) {
            if ($rqst_parentfoldercode != 0) {
                $foldersModel = new FoldersModel();
                $folder = $foldersModel->where('folder_code', $rqst_parentfoldercode)->first();
                $parentfolder = $folder['folder_id'];
            } else {
                $parentfolder = 0;
            }
        } else {
            $parentfolder = $rqst_parentfolder;
        }

        $foldersModel = new FoldersModel();
        $hierarchy = $foldersModel->getFolderHierarchyLevel($rqst_parentfoldercode);

        $foldersData = [
            'folder_id' => $rqst_folderid,
            'folder_code' => $foldercode,
            'folder_name' => $rqst_foldername,
            'account_id' => $accountid,
            'user_type' => $usertype,
            'parent_folder' => $parentfolder,
            'hierarchy' => $hierarchy,
            'access_level' => $rqst_accesslevel,
            'access_level_title' => $accessleveltitle,
        ];
        $saverow = $foldersModel->save($foldersData);
        $rowid = $foldersModel->getInsertID();
        if ($saverow) {
            if ($rowid != 0) {
                // added
                session()->setFlashdata('alert_insertsuccess', 'Added!');
            } else {
                // updated
                $foldersModel->updateFolderAccessLevel($rqst_folderid, $rqst_accesslevel, $accessleveltitle);
                session()->setFlashdata('alert_updatesuccess', 'Updated!');
            }
        } else {
            session()->setFlashdata('alert_failed', 'Failed!');
        }

        return redirect()->to("/EmployeeController/FilesPage/$rqst_parentfoldercode");
    }

    public function SaveFile()
    {
        $usercode = session()->get('logged_code');

        $rqst_parentfoldercode = $this->request->getPost('emp_parentfoldercode');
        $files = $this->request->getFiles();

        $foldersModel = new FoldersModel();
        $folder = $foldersModel->where('folder_code', $rqst_parentfoldercode)->first();
        $folderid = $folder['folder_id'];
        $accesslevel = $folder['access_level'];
        $accessleveltitle = $this->AccessLevelTitle($accesslevel);

        $imagepath = "/tup-files/employee-files/$usercode";
        $directorypath = FCPATH . $imagepath;
        if (!is_dir($directorypath)) {
            mkdir($directorypath, 0777, true);
        }

        foreach ($files['emp_files'] as $file) {
            if ($file->isValid() && !$file->hasMoved()) {
                $filename = $file->getClientName();
                $filetype = $file->getExtension();
                $filesize = $file->getSize('kb');
                $formatsize = number_format($filesize / 1048576, 2) . ' MB';

                $file->move($directorypath, $filename);
                $savedfilename = $file->getName();

                $filepath = $imagepath . '/' . $savedfilename;

                $filesModel = new FilesModel();
                $fileData = [
                    'folder_id' => $folderid,
                    'file_name' => $savedfilename,
                    'file_type' => $filetype,
                    'file_size' => $formatsize,
                    'file_path' => $filepath,
                    'access_level' => $accesslevel,
                    'access_level_title' => $accessleveltitle,
                ];
                $saverow = $filesModel->insert($fileData);
                if ($saverow) {
                    session()->setFlashdata('alert_insertsuccess', 'Files Uploaded');
                }
            }
        }

        return redirect()->to("/EmployeeController/FilesPage/$rqst_parentfoldercode");
    }

    public function RenameFile()
    {
        $rqst_fileid = $this->request->getPost('emp_fileid');
        $rqst_filename = $this->request->getPost('emp_filename');
        $rqst_parentfoldercode = $this->request->getPost('emp_parentfoldercode');

        $filesModel = new FilesModel();
        $file = $filesModel->find($rqst_fileid);

        if ($file) {
            $filetype = $file['file_type'];
            $filepath = $file['file_path'];

            $directorypath = FCPATH . dirname($filepath);
            $oldfilepath = FCPATH . $filepath;
            $newfilename = "$rqst_filename.$filetype";
            $newfilepath = $directorypath . '/' . $newfilename;

            if (is_dir($directorypath) && file_exists($oldfilepath)) {
                if (rename($oldfilepath, $newfilepath)) {
                    $newfilepath = dirname($filepath) . '/' . $newfilename;
                    $filesModel->update($rqst_fileid, [
                        'file_name' => $newfilename,
                        'file_path' => $newfilepath
                    ]);
                    session()->setFlashdata('alert_updatesuccess', 'Updated!');
                } else {
                    session()->setFlashdata('alert_failed', 'Error renaming file!');
                }
                echo "Exist";
            } else {
                session()->setFlashdata('alert_failed', 'File not found');
            }
        } else {
            session()->setFlashdata('alert_failed', 'File not found');
        }

        return redirect()->to("/EmployeeController/FilesPage/$rqst_parentfoldercode");
    }

    public function DeleteFolder()
    {
        $folderid = $this->request->getPost('folder_id');

        $foldersModel = new FoldersModel();
        $foldersModel->deleteFolder($folderid);

        return $this->response->setJSON(['success' => true]);
    }

    public function DeleteFile()
    {
        $fileid = $this->request->getPost('file_id');

        $filesModel = new FilesModel();
        $file = $filesModel->find($fileid);

        if (!$file) {
            return $this->response->setJSON(['success' => false, 'message' => 'File not found in the database.']);
        }

        $filePath = FCPATH . $file['file_path'];

        if (file_exists($filePath)) {
            unlink($filePath);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'File not found on the server.']);
        }

        $delete = $filesModel->deleteFile($fileid);

        if ($delete) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false, 'message' => 'Failed to delete the file record.']);
        }
    }

    public function AccessLevelTitle($accesslevel)
    {
        switch ($accesslevel) {
            case 1:
                $accessleveltitle = 'Public';
                break;

            case 2:
                $accessleveltitle = 'Restricted';
                break;

            case 3:
                $accessleveltitle = 'Private';
                break;
        }

        return $accessleveltitle;
    }

    public function FolderTriggers($folderid, $mainparentid, $page)
    {
        $foldersModel = new FoldersModel();
        $foldersModel->folderVisit($folderid);

        // Sidenav
        if ($page == "publicfiles") {
            session()->setFlashdata('nav_publicfiles', true);
        } elseif ($page == "myfiles") {
            session()->setFlashdata('nav_myfiles', $mainparentid);
        }
    }

    // [ Profile Views ]
    public function AccountProfilePage()
    {
        $tab = 'profile';
        $form = '';
        $oldinput = '';
        $validation = '';

        $passwordform = session()->getFlashdata('passwordFormData');
        if (!empty($passwordform)) {
            $form = 'passwordform';
            $tab = $passwordform['tab'];

            if (!empty($passwordform['validation'])) {
                $validation = $passwordform['validation'];
            }

            if (!empty($passwordform['oldinput'])) {
                $oldinput = $passwordform['oldinput'];
            }
        }

        $profileform = session()->getFlashdata('profileFormData');
        if (!empty($profileform)) {
            $form = 'profileform';
            $tab = $profileform['tab'];

            if (!empty($profileform['validation'])) {
                $validation = $profileform['validation'];
            }

            if (!empty($profileform['oldinput'])) {
                $oldinput = $profileform['oldinput'];
            }
        }

        $data = [
            'tab' => $tab,
            'oldinput' => $oldinput,
            'validation' => $validation,
            'form' => $form,
        ];
        $data = array_merge($this->data, $data);
        return view('/Employee/Pages/profile', $data);
    }

    // [ Profile Functions ]
    public function UpdateProfile()
    {
        $rqst = $this->request->getPost();
        $rqst_firstname = $this->request->getPost('admn_firstname');
        $rqst_lastname = $this->request->getPost('admn_lastname');
        $rqst_middlename = $this->request->getPost('admn_middlename');
        $rqst_extension = $this->request->getPost('admn_extension');
        $rqst_mobilenumber = $this->request->getPost('admn_mobilenumber');
        $rqst_address = $this->request->getPost('admn_address');
        $rqst_gender = $this->request->getPost('admn_gender');
        $rqst_birthdate = $this->request->getPost('admn_birthdate');
        $rqst_accountid = $this->request->getPost('account_id');

        $validation = \Config\Services::validation();
        $validationRules = [
            'admn_firstname' => [
                'label' => 'First Name',
                'rules' => 'required|alpha_space|max_length[255]',
                'errors' => [
                    'required' => 'First Name field is required.',
                    'alpha_space' => 'First Name cannot contain special characters or numbers.',
                    'max_length' => 'First Name is too long; it must be 255 characters or fewer.'
                ],
            ],
            'admn_middlename' => [
                'label' => 'Middle Name',
                'rules' => 'required|alpha_space|max_length[255]',
                'errors' => [
                    'required' => 'Middle Name field is required. Type N/A if not applicable.',
                    'alpha_space' => 'Middle Name cannot contain special characters or numbers.',
                    'max_length' => 'Middle Name is too long; it must be 255 characters or fewer.'
                ],
            ],
            'admn_lastname' => [
                'label' => 'Last Name',
                'rules' => 'required|alpha_space|max_length[255]',
                'errors' => [
                    'required' => 'Last Name field is required.',
                    'alpha_space' => 'Last Name cannot contain special characters or numbers.',
                    'max_length' => 'Last Name is too long; it must be 255 characters or fewer.'
                ],
            ],
            'admn_mobilenumber' => [
                'label' => 'Phone Number',
                'rules' => 'required|regex_match[/^\d{3} \d{3} \d{4}$/]',
                'errors' => [
                    'required' => 'Phone Number field is required.',
                    'regex_match' => 'Invalid Phone Number.'
                ],
            ],
            'admn_address' => [
                'label' => 'Address',
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Address field is required.',
                    'max_length' => 'Address is too long; it must be 255 characters or fewer.'
                ],
            ],
            'admn_birthdate' => [
                'label' => 'Birthdate',
                'rules' => 'required|valid_date[Y-m-d]',
                'errors' => [
                    'required' => 'Birthdate field is required.',
                    'valid_date' => 'Birthdate must be in a valid format (YYYY-MM-DD).',
                ],
            ],
            'admn_gender' => [
                'label' => 'Gender',
                'rules' => 'required|alpha_space|max_length[255]',
                'errors' => [
                    'required' => 'Gender field is required.',
                    'alpha_space' => 'Gender cannot contain special characters or numbers.',
                    'max_length' => 'Gender is too long; it must be 255 characters or fewer.'
                ],
            ],
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('profileFormData', [
                'tab' => 'myaccount',
                'validation' => $validation,
                'oldinput' => $rqst,
            ]);
            return redirect()->to('/EmployeeController/AccountProfilePage');
        }

        $accountData = [
            'account_id' => $rqst_accountid,
            'first_name' => $rqst_firstname,
            'last_name' => $rqst_lastname,
            'middle_name' => $rqst_middlename,
            'extension_name' => $rqst_extension,
            'address' => $rqst_address,
            'mobile_number' => $rqst_mobilenumber,
            'sex' => $rqst_gender,
            'birthdate' => $rqst_birthdate,
        ];
        $accountModel = new AccountsModel();
        $accountModel->save($accountData);

        session()->setFlashdata('passwordFormData', [
            'tab' => 'myaccount',
        ]);
        session()->setFlashdata('alert_updatesuccess', 'Updated!');
        return redirect()->to('/EmployeeController/AccountProfilePage');
    }

    public function UploadProfilePicture()
    {
        $rqst_profilepicture = $this->request->getFile('admn_profile_picture');
        $accounid = session()->get('logged_id');

        $img_path = "/profile-pictures";
        $directoryPath = FCPATH . $img_path;

        if (!is_dir($directoryPath)) {
            mkdir($directoryPath, 0777, true);
        }

        if ($rqst_profilepicture && $rqst_profilepicture->isValid() && !$rqst_profilepicture->hasMoved()) {
            $profile_name = $rqst_profilepicture->getRandomName();
            $profile_path = "$img_path/$profile_name";

            $rqst_profilepicture->move($directoryPath, $profile_name);

            $updatedata = [
                'image_path' => $profile_path,
            ];
            $accountModel = new AccountsModel();
            $accountModel->update($accounid, $updatedata);

            session()->setFlashdata('alert_upload', 'Profile Picture Uploaded');
            return redirect()->to('/EmployeeController/AccountProfilePage');
        }

        return redirect()->to('/EmployeeController/AccountProfilePage');
    }

    public function ChangePassword()
    {
        $rqst = $this->request->getPost();
        $rqst_accountid = $this->request->getPost('account_id');
        $rqst_oldpassword = $this->request->getPost('admn_oldpassword');
        $rqst_newpassword = $this->request->getPost('admn_newpassword');

        $validation = \Config\Services::validation();
        $validationRules = [
            'admn_oldpassword' => [
                'rules' => 'required|max_length[255]|oldPasswordCheck[' . $rqst_accountid . ',' . $rqst_oldpassword . ']',
                'errors' => [
                    'required' => 'Old Password field is required.',
                    'max_length' => 'Old Password is too long; it must be 255 characters or fewer.',
                    'oldPasswordCheck' => 'Password does not match to old password'
                ],
            ],
            'admn_newpassword' => [
                'rules' => 'required|max_length[255]|regex_match[/^(?=.*[A-Z])(?=.*\d).{8,}$/]',
                'errors' => [
                    'required' => 'New Password field is required.',
                    'max_length' => 'New Password is too long; it must be 255 characters or fewer.',
                    'regex_match' => 'Password must contain at least 1 number and 1 uppercase letter.',
                ],
            ],
            'admn_newconfirmpassword' => [
                'rules' => 'required|max_length[255]|matches[admn_newpassword]',
                'errors' => [
                    'required' => 'Confirm Password field is required.',
                    'matches' => 'Password does not match.',
                    'max_length' => 'confirm Password is too long; it must be 255 characters or fewer.',
                ],
            ],
        ];

        if (!$this->validate($validationRules)) {
            session()->setFlashdata('passwordFormData', [
                'tab' => 'myaccount',
                'validation' => $validation,
                'oldinput' => $rqst,
            ]);
            return redirect()->to('/EmployeeController/AccountProfilePage#change-password');
        }

        $hashedpassword = password_hash($rqst_newpassword, PASSWORD_BCRYPT);
        $accountData = [
            'account_id' => $rqst_accountid,
            'password' => $hashedpassword,
        ];
        $accountModel = new AccountsModel();
        $accountModel->save($accountData);

        session()->setFlashdata('alert_updatesuccess', 'Updated!');
        session()->setFlashdata('passwordFormData', [
            'tab' => 'myaccount',
        ]);
        return redirect()->to('/EmployeeController/AccountProfilePage');
    }

    public function RedirectToChangePassword()
    {
        session()->setFlashdata('passwordFormData', [
            'tab' => 'myaccount'
        ]);
        return redirect()->to('/EmployeeController/AccountProfilePage#change-password');
    }


    public function RedirectToProfileUpdate()
    {
        session()->setFlashdata('passwordFormData', [
            'tab' => 'myaccount'
        ]);
        return redirect()->to('/EmployeeController/AccountProfilePage');
    }

    public function RedirectToChangeEmail()
    {
        session()->setFlashdata('passwordFormData', [
            'tab' => 'myaccount'
        ]);
        return redirect()->to('/EmployeeController/AccountProfilePage#change-email');
    }


    // [ More Functions ]
    public function GenerateCode()
    {
        $length = 12;
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $code = '';

        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[random_int(0, strlen($characters) - 1)];
        }

        return $code;
    }

    // [ API ]
    public function fetchProvinces()
    {
        $client = Services::curlrequest();
        $url = 'https://psgc.gitlab.io/api/provinces/';

        try {
            $response = $client->get($url); // Send the GET request

            if ($response->getStatusCode() == 200) { // Check if the response status code is OK
                $data = json_decode($response->getBody(), true); // Decode the JSON response body

                if ($data) {
                    echo json_encode($data);
                } else {
                    echo json_encode(['error' => 'No data found']); // If the data is empty or invalid, return an error
                }
            } else {
                echo json_encode(['error' => 'Failed to fetch data, status code: ' . $response->getStatusCode()]); // Handle non-200 responses
            }
        } catch (\CodeIgniter\HTTP\Exceptions\HTTPException $e) {
            // Catch HTTP exceptions, e.g., network issues
            echo json_encode(['error' => 'API request failed: ' . $e->getMessage()]);
            log_message('error', 'API Request failed: ' . $e->getMessage());
        }
    }

    public function fetchProvince()
    {
        $client = Services::curlrequest();
        $url = 'https://psgc.gitlab.io/api/regions/';

        try {
            $response = $client->get($url); // Send the GET request

            if ($response->getStatusCode() == 200) { // Check if the response status code is OK
                $data = json_decode($response->getBody(), true); // Decode the JSON response body

                if ($data) {
                    echo json_encode($data);
                } else {
                    echo json_encode(['error' => 'No data found']); // If the data is empty or invalid, return an error
                }
            } else {
                echo json_encode(['error' => 'Failed to fetch data, status code: ' . $response->getStatusCode()]); // Handle non-200 responses
            }
        } catch (\CodeIgniter\HTTP\Exceptions\HTTPException $e) {
            // Catch HTTP exceptions, e.g., network issues
            echo json_encode(['error' => 'API request failed: ' . $e->getMessage()]);
            log_message('error', 'API Request failed: ' . $e->getMessage());
        }
    }

    public function fetchDataCity()
    {
        $client = Services::curlrequest();
        $url = "https://psgc.gitlab.io/api/cities-municipalities/";

        try {
            $response = $client->get($url); // Send the GET request

            if ($response->getStatusCode() == 200) { // Check if the response status code is OK
                $data = json_decode($response->getBody(), true); // Decode the JSON response body

                if ($data) {
                    echo json_encode($data);
                } else {
                    echo json_encode(['error' => 'No data found']); // If the data is empty or invalid, return an error
                }
            } else {
                echo json_encode(['error' => 'Failed to fetch data, status code: ' . $response->getStatusCode()]); // Handle non-200 responses
            }
        } catch (\CodeIgniter\HTTP\Exceptions\HTTPException $e) {
            // Catch HTTP exceptions, e.g., network issues
            echo json_encode(['error' => 'API request failed: ' . $e->getMessage()]);
            log_message('error', 'API Request failed: ' . $e->getMessage());
        }
    }


    public function fetchDataBarangay($code)
    {
        $client = Services::curlrequest();
        $url = "https://psgc.gitlab.io/api/cities-municipalities/$code/barangays/";
        $response = $client->get($url);

        if ($response->getStatusCode() == 200) {
            $data = json_decode($response->getBody(), true);
            echo json_encode($data);
        } else {
            echo json_encode(['error' => 'Failed to fetch data']);
        }
    }

    public function fetchAPI()
    {
        $client = Services::curlrequest();
        $url = 'https://restcountries.com/v3.1/all/';

        try {
            $response = $client->get($url);
            if ($response->getStatusCode() == 200) {
                $data = json_decode($response->getBody(), true);
                print_r($data);
            } else {
                echo "Failed to fetch data: " . $response->getStatusCode();
            }
        } catch (\CodeIgniter\HTTP\CURLRequestException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function test($rqst_fileid, $rqst_filename)
    {
        $filesModel = new FilesModel();
        $file = $filesModel->find($rqst_fileid);

        if ($file) {
            $filetype = $file['file_type'];
            $filepath = $file['file_path'];

            $oldFilename = basename($filepath);
            $directoryPath = FCPATH . dirname($filepath);
            $oldFilePath = FCPATH . $filepath;

            echo $oldFilename . "<br>";
            echo $directoryPath . "<br>";
            echo $oldFilePath . "<br>";

            $newFilename = "$rqst_filename.$filetype";
            $newFilePath = $directoryPath . '/' . $newFilename;

            echo $newFilename . "<br>";
            echo $newFilePath . "<br>";

            if (is_dir($directoryPath) && file_exists($oldFilePath)) {
                if (rename($oldFilePath, $newFilePath)) {
                    $newFilePath = dirname($filepath) . '/' . $newFilename;
                    $filesModel->update($rqst_fileid, [
                        'file_name' => $newFilename,
                        'file_path' => $newFilePath
                    ]);

                    session()->setFlashdata('alert_updatesuccess', 'Updated!');
                } else {
                    echo "Error renaming file.";
                }
                echo "Exist";
            } else {
                echo "Directory or file does not exist.";
            }
        } else {
            echo "File not found.";
        }
    }

}

