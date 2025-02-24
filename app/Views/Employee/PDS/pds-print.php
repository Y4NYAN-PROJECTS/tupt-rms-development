<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Personal Data Sheet</title>
    <link rel="stylesheet" href="/pds/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/pds/style.css">
</head>

<body>
    <div class="table-responsive p-3">
        <!-- [ Hidden Data ] -->

        <!-- [ Family ] -->
        <?php if ($family): ?>
            <!-- [ Children ] -->
            <?php $childrencount = 1; ?>
            <input type="hidden" id="saved-children-count" value="<?= $family['children_count'] ? $family['children_count'] : 0 ?>">
            <?php foreach ($childrens as $children): ?>
                <input type="hidden" id="saved-children-name-<?= $childrencount ?>" value="<?= $children['children_name'] ?>">
                <input type="hidden" id="saved-children-bday-<?= $childrencount ?>" value="<?= date('m/d/Y', strtotime($children['children_birthdate'])) ?>">
                <?php $childrencount++; ?>
            <?php endforeach; ?>
        <?php endif; ?>


        <!-- [ Civil Service ] -->
        <?php if ($civilservice): ?>
            <?php $csecount = 1; ?>
            <input type="hidden" id="saved-cse-count" value="<?= $civilservice['civilservice_count'] ? $civilservice['civilservice_count'] : 0 ?>">
            <?php foreach ($civilserviceitems as $cse): ?>
                <input type="hidden" id="saved-cse-<?= $csecount ?>" value="<?= $cse['career_service'] ?>">
                <input type="hidden" id="saved-cse-rating-<?= $csecount ?>" value="<?= $cse['rating'] ?>">
                <input type="hidden" id="saved-cse-date-<?= $csecount ?>" value="<?= $cse['date_of_examination'] ?>">
                <input type="hidden" id="saved-cse-place-<?= $csecount ?>" value="<?= $cse['place_of_examination'] ?>">
                <input type="hidden" id="saved-cse-license-<?= $csecount ?>" value="<?= $cse['license_number'] ?>">
                <input type="hidden" id="saved-cse-validity-<?= $csecount ?>" value="<?= $cse['validity_date'] ?>">
                <?php $csecount++; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- [ Work Experience ] -->
        <?php if ($workexperience): ?>
            <?php $wrkexpcount = 1; ?>
            <input type="hidden" id="saved-wrkexp-count" value="<?= $workexperience['workexperience_count'] ? $workexperience['workexperience_count'] : 0 ?>">
            <?php foreach ($workexperienceitems as $wrkexp): ?>
                <input type="hidden" id="saved-wrkexp-position-<?= $wrkexpcount ?>" value="<?= $wrkexp['position'] ?>">
                <input type="hidden" id="saved-wrkexp-datefrom-<?= $wrkexpcount ?>" value="<?= $wrkexp['inclusive_date_from'] ?>">
                <input type="hidden" id="saved-wrkexp-dateto-<?= $wrkexpcount ?>" value="<?= $wrkexp['inclusive_date_to'] ?>">
                <input type="hidden" id="saved-wrkexp-company-<?= $wrkexpcount ?>" value="<?= $wrkexp['company'] ?>">
                <input type="hidden" id="saved-wrkexp-salary-<?= $wrkexpcount ?>" value="<?= $wrkexp['mothly_salary'] ?>">
                <input type="hidden" id="saved-wrkexp-increment-<?= $wrkexpcount ?>" value="<?= $wrkexp['increment'] ?>">
                <input type="hidden" id="saved-wrkexp-status-<?= $wrkexpcount ?>" value="<?= $wrkexp['appointment_status'] ?>">
                <input type="hidden" id="saved-wrkexp-service-<?= $wrkexpcount ?>" value="<?= $wrkexp['gov_service'] ?>">
                <?php $wrkexpcount++; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- [ Voluntary Work ] -->
        <?php if ($voluntarywork): ?>
            <?php $vltrywrkcount = 1; ?>
            <input type="hidden" id="saved-vltrywrk-count" value="<?= $voluntarywork['voluntarywork_count'] ? $voluntarywork['voluntarywork_count'] : 0 ?>">
            <?php foreach ($voluntaryworkitems as $vltrywrk): ?>
                <input type="hidden" id="saved-vltrywrk-organization-<?= $vltrywrkcount ?>" value="<?= $vltrywrk['organization'] ?>">
                <input type="hidden" id="saved-vltrywrk-datefrom-<?= $vltrywrkcount ?>" value="<?= $vltrywrk['inclusive_date_from'] ?>">
                <input type="hidden" id="saved-vltrywrk-dateto-<?= $vltrywrkcount ?>" value="<?= $vltrywrk['inclusive_date_to'] ?>">
                <input type="hidden" id="saved-vltrywrk-hours-<?= $vltrywrkcount ?>" value="<?= $vltrywrk['hours'] ?>">
                <input type="hidden" id="saved-vltrywrk-nature-<?= $vltrywrkcount ?>" value="<?= $vltrywrk['nature_of_work'] ?>">
                <?php $vltrywrkcount++; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- [ Training Program ] -->
        <?php if ($trainingprogram): ?>
            <?php $trngprgmcount = 1; ?>
            <input type="hidden" id="saved-trngprgm-count" value="<?= $trainingprogram['trainingprogram_count'] ? $trainingprogram['trainingprogram_count'] : 0 ?>">
            <?php foreach ($trainingprogramitems as $trngprgm): ?>
                <input type="hidden" id="saved-trngprgm-program-<?= $trngprgmcount ?>" value="<?= $trngprgm['training_program'] ?>">
                <input type="hidden" id="saved-trngprgm-datefrom-<?= $trngprgmcount ?>" value="<?= $trngprgm['inclusive_date_from'] ?>">
                <input type="hidden" id="saved-trngprgm-dateto-<?= $trngprgmcount ?>" value="<?= $trngprgm['inclusive_date_to'] ?>">
                <input type="hidden" id="saved-trngprgm-hours-<?= $trngprgmcount ?>" value="<?= $trngprgm['hours'] ?>">
                <input type="hidden" id="saved-trngprgm-type-<?= $trngprgmcount ?>" value="<?= $trngprgm['type_of_ld'] ?>">
                <input type="hidden" id="saved-trngprgm-sponsor-<?= $trngprgmcount ?>" value="<?= $trngprgm['sponsored_by'] ?>">
                <?php $trngprgmcount++; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- [ Other Information ] -->
        <?php if ($otherinformation): ?>
            <!-- [ Skills ] -->
            <?php $skillcount = 1; ?>
            <input type="hidden" id="saved-skill-count" value="<?= $otherinformation['skill_count'] ? $otherinformation['skill_count'] : 0 ?>">
            <?php foreach ($otherinformationitems as $skill): ?>
                <?php if ($skill['item_type'] == 1): ?>
                    <input type="hidden" id="saved-skill-<?= $skillcount ?>" value="<?= $skill['information'] ?>">
                    <?php $skillcount++; ?>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- [ Recognition ] -->
            <?php $recognitioncount = 1; ?>
            <input type="hidden" id="saved-recognition-count" value="<?= $otherinformation['recognition_count'] ? $otherinformation['recognition_count'] : 0 ?>">
            <?php foreach ($otherinformationitems as $recognition): ?>
                <?php if ($recognition['item_type'] == 2): ?>
                    <input type="hidden" id="saved-recognition-info-<?= $recognitioncount ?>" value="<?= $recognition['information'] ?>">
                    <?php $recognitioncount++; ?>
                <?php endif; ?>
            <?php endforeach; ?>

            <!-- [ Membership ] -->
            <?php $membershipcount = 1; ?>
            <input type="hidden" id="saved-membership-count" value="<?= $otherinformation['membership_count'] ? $otherinformation['membership_count'] : 0 ?>">
            <?php foreach ($otherinformationitems as $membership): ?>
                <?php if ($membership['item_type'] == 3): ?>
                    <input type="hidden" id="saved-membership-info-<?= $membershipcount ?>" value="<?= $membership['information'] ?>">
                    <?php $membershipcount++; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php endif; ?>


        <!-- [ Final ] -->
        <?php if ($final): ?>
            <!-- [ Reference ] -->
            <?php $referencecount = 1; ?>
            <input type="hidden" id="saved-reference-count" value="<?= $final['reference_count'] ? $final['reference_count'] : 0 ?>">
            <?php foreach ($referenceitems as $reference): ?>
                <input type="hidden" id="saved-reference-name-<?= $referencecount ?>" value="<?= $reference['reference_name'] ?>">
                <input type="hidden" id="saved-reference-address-<?= $referencecount ?>" value="<?= $reference['reference_address'] ?>">
                <input type="hidden" id="saved-reference-telephone-<?= $referencecount ?>" value="<?= $reference['reference_telephone'] ?>">
                <?php $referencecount++; ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <form>
            <table id="pds-table">
                <tbody class="table-header">
                    <tr>
                        <td colspan="12" class="h5"><i><b>CS Form No. 212</b></i></td>
                    </tr>
                    <tr>
                        <td colspan="12" class="align-top" style="max-height: 12px;">
                            <i><b>Revised 2017</b></i>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12" class="text-center">
                            <h1><b>PERSONAL DATA SHEET</b></h1>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12"><i><b>WARNING: Any misrepresentation main in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administative/criminal case/s against the person concerned.</b></i></td>
                    </tr>
                    <tr>
                        <td colspan="12"><i><b>READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM</b></i></td>
                    </tr>
                    <tr>
                        <td colspan="9">Print legibly. Tick appropriate boxes ( <input type="checkbox" checked> ) ad use seperate sheet if necessary. Indicate - if not applicable. <b>DO NOT ABBREVIATE.</b></td>
                        <td colspan="1" style="border:1px solid#000b;background:#757575;width:8%;"><small>1. CS ID No.</small></td>
                        <td colspan="2" class="text-right" style="border:1px solid #000;width:20%;"><small>(Do not fill up. For CSC use only)</small></td>
                    </tr>
                </tbody>

                <!-- [ Personal ] -->
                <tbody class="table-body">
                    <tr>
                        <td colspan="12" class="text-white separator">I. PERSONAL INFORMATION</td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-bottom-0">
                            <span class="count">2.</span> SURNAME
                        </td>

                        <td colspan="11"><?= $personal ? ($personal['last_name'] ? $personal['last_name'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-0"><span class="count"></span> FIRST NAME</td>
                        <td colspan="9"><?= $personal ? ($personal['first_name'] ? $personal['first_name'] : '') : '' ?></td>
                        <td colspan="2" class="align-top s-label">
                            <small>
                                NAME EXTENSION (JR.,SR):
                            </small>
                            <?= $personal ? ($personal['extension_name'] ? $personal['extension_name'] : '') : '' ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-0"><span class="count"></span> MIDDLE NAME</td>
                        <td colspan="11"><?= $personal ? ($personal['middle_name'] ? $personal['middle_name'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-bottom-0">
                            <span class="count">3.</span> DATE OF BIRTH<br>
                            <span class="count"></span> (mm/dd/yyyy)
                        </td>
                        <?php $personal ? $formatdate = date('m/d/Y', strtotime($personal['birthdate'])) : '' ?>
                        <td colspan="5"><?= $personal ? ($formatdate ? $formatdate : '') : '' ?></td>
                        <td colspan="3" class="s-label align-top border-bottom-0">
                            <span class="count">16.</span> CITIZENSHIP
                        </td>
                        <td colspan="3"><?= $personal ? ($personal['citizenship'] ? $personal['citizenship'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-0"></td>
                        <td colspan="5"></td>
                        <td colspan="3" class="s-label align-top border-0 text-center small">
                            If holder of dual citizenship,
                        </td>
                        <td colspan="3"><?= $personal ? ($personal['citizenship_by'] ? $personal['citizenship_by'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label"><span class="count">4.</span> PLACE OR BIRTH</td>
                        <td colspan="5"><?= $personal ? ($personal['place_of_birth'] ? $personal['place_of_birth'] : '') : '' ?></td>
                        <td colspan="3" class="s-label align-top border-0 text-center small"> please indicate the details.</td>
                        <td colspan="3"><?= $personal ? ($personal['second_country'] ? $personal['second_country'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label"><span class="count">5.</span> SEX</td>
                        <td colspan="5"><?= $personal ? ($personal['sex'] ? $personal['sex'] : '') : '' ?></td>
                        <td colspan="3" class="s-label align-top border-0"></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-bottom-0"><span class="count">6.</span> CIVIL STATUS</td>
                        <td colspan="5"><?= $personal ? ($personal['civil_status'] ? $personal['civil_status'] : '') : '' ?></td>
                        <td colspan="2" class="s-label align-top border-bottom-0 small">
                            <span class="count">17.</span> RESIDENTIAL ADDRESS
                        </td>
                        <td colspan="2" class="text-center"><?= $personal ? ($personal['raddress_no'] ? $personal['raddress_no'] : '') : '' ?></td>
                        <td colspan="2" class="text-center"><?= $personal ? ($personal['raddress_street'] ? $personal['raddress_street'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-top-0"><span class="count"></span></td>
                        <td colspan="5"></td>
                        <td colspan="2" class="s-label align-top border-0"></td>
                        <td colspan="2" class="text-center"><?= $personal ? ($personal['raddress_village'] ? $personal['raddress_village'] : '') : '' ?></td>
                        <td colspan="2" class="text-center"><?= $personal ? ($personal['raddress_barangay'] ? $personal['raddress_barangay'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label"><span class="count">7.</span> HEIGHT (m)</td>
                        <td colspan="5"><?= $personal ? ($personal['height'] ? $personal['height'] : '') : '' ?></td>
                        <td colspan="2" class="s-label align-top border-0"></td>
                        <td colspan="2" class="text-center"><?= $personal ? ($personal['raddress_city'] ? $personal['raddress_city'] : '') : '' ?></td>
                        <td colspan="2" class="text-center"><?= $personal ? ($personal['raddress_province'] ? $personal['raddress_province'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label"><span class="count">8.</span> WEIGHT (kg)</td>
                        <td colspan="5"><?= $personal ? ($personal['weight'] ? $personal['weight'] : '') : '' ?></td>
                        <td colspan="2" class="s-label border-0 text-center">
                            ZIP CODE
                        </td>
                        <td colspan="4" class="text-center"><?= $personal ? ($personal['raddress_zipcode'] ? $personal['raddress_zipcode'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label"><span class="count">9.</span> BLOOD TYPE</td>
                        <td colspan="5"><?= $personal ? ($personal['blood_type'] ? $personal['blood_type'] : '') : '' ?></td>
                        <td colspan="2" class="s-label border-bottom-0"><span class="count">18.</span> PERMANENT ADDRESS</td>
                        <td colspan="2" class="text-center"><?= $personal ? ($personal['paddress_no'] ? $personal['paddress_no'] : '') : '' ?></td>
                        <td colspan="2" class="text-center"><?= $personal ? ($personal['paddress_street'] ? $personal['paddress_street'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label"><span class="count">10.</span> GSIS ID NO.</td>
                        <td colspan="5"><?= $personal ? ($personal['gsis'] ? $personal['gsis'] : '') : '' ?></td>
                        <td colspan="2" class="s-label border-0"></td>
                        <td colspan="2" class="text-center"><?= $personal ? ($personal['paddress_village'] ? $personal['paddress_village'] : '') : '' ?></td>
                        <td colspan="2" class="text-center"><?= $personal ? ($personal['paddress_barangay'] ? $personal['paddress_barangay'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label"><span class="count">11.</span> PAG-IBIG NO.</td>
                        <td colspan="5"><?= $personal ? ($personal['pagibig'] ? $personal['pagibig'] : '') : '' ?></td>
                        <td colspan="2" class="s-label border-0"></td>
                        <td colspan="2" class="text-center"><?= $personal ? ($personal['paddress_city'] ? $personal['paddress_city'] : '') : '' ?></td>
                        <td colspan="2" class="text-center"><?= $personal ? ($personal['paddress_province'] ? $personal['paddress_province'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label"><span class="count">12.</span> PHILHEALTH NO.</td>
                        <td colspan="5"><?= $personal ? ($personal['philhealth'] ? $personal['philhealth'] : '') : '' ?></td>
                        <td colspan="2" class="s-label text-center border-0">ZIP CODE</td>
                        <td colspan="4" class="text-center"><?= $personal ? ($personal['paddress_zipcode'] ? $personal['paddress_zipcode'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label"><span class="count">13.</span> SSS NO.</td>
                        <td colspan="5"><?= $personal ? ($personal['sss'] ? $personal['sss'] : '') : '' ?></td>
                        <td colspan="2" class="s-label"><span class="count">19.</span> TELEPHONE NO.</td>
                        <td colspan="4"><?= $personal ? ($personal['telephone_no'] ? $personal['telephone_no'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label"><span class="count">14.</span> TIN NO.</td>
                        <td colspan="5"><?= $personal ? ($personal['tin'] ? $personal['tin'] : '') : '' ?></td>
                        <td colspan="2" class="s-label"><span class="count">20.</span> MOBILE NO.</td>
                        <td colspan="4"><?= $personal ? ($personal['mobile_no'] ? $personal['mobile_no'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label"><span class="count">15.</span> AGENCY EMPLOYEE NO.</td>
                        <td colspan="5"><?= $personal ? ($personal['agency'] ? $personal['agency'] : '') : '' ?></td>
                        <td colspan="2" class="s-label"><span class="count">21.</span> EMAIL ADDRESS (if any)</td>
                        <td colspan="4"><?= $personal ? ($personal['email_address'] ? $personal['email_address'] : '') : '' ?></td>
                    </tr>
                </tbody>

                <!-- [ Family ] -->
                <tbody class="table-body">
                    <tr>
                        <td colspan="12" class="text-white separator">II. FAMILY BACKGROUND</td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-bottom-0">
                            <span class="count">22.</span> SPOUSE SURNAME
                        </td>
                        <td colspan="5"><?= $family ? ($family['spouse_last_name'] ? $family['spouse_last_name'] : '') : '' ?></td>
                        <td colspan="3" class="s-label">
                            <span class="count">23.</span>
                            NAME of CHILDREN-(Write full name and list all)
                        </td>
                        <td colspan="3" class="s-label text-center" style="width: 18%;">DATE OF BIRTH (mm/dd/yyyy)</td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-0">
                            <span class="count"></span> FIRST NAME
                        </td>
                        <td colspan="4"><?= $family ? ($family['spouse_first_name'] ? $family['spouse_first_name'] : '') : '' ?></td>
                        <td colspan="1" class="align-top s-label">
                            <small>
                                NAME EXTENSION (JR.,SR):
                            </small>
                            <?= $family ? ($family['spouse_extension_name'] ? $family['spouse_extension_name'] : '') : '' ?>
                        </td>
                        <td colspan="3" id="children-1-name"></td>
                        <td colspan="3" id="children-1-bday"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-0">
                            <span class="count"></span>
                            MIDDLE NAME
                        </td>
                        <td colspan="5"><?= $family ? ($family['spouse_middle_name'] ? $family['spouse_middle_name'] : '') : '' ?></td>
                        <td colspan="3" id="children-2-name"></td>
                        <td colspan="3" id="children-2-bday"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label">
                            <span class="count"></span> OCCUPATION
                        </td>
                        <td colspan="5"><?= $family ? ($family['spouse_occupation'] ? $family['spouse_occupation'] : '') : '' ?></td>
                        <td colspan="3" id="children-3-name"></td>
                        <td colspan="3" id="children-3-bday"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label">
                            <span class="count"></span> EMPLOYER/BUSINESS NAME
                        </td>
                        <td colspan="5"><?= $family ? ($family['spouse_employer_or_business_name'] ? $family['spouse_employer_or_business_name'] : '') : '' ?></td>
                        <td colspan="3" id="children-4-name"></td>
                        <td colspan="3" id="children-4-bday"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label">
                            <span class="count"></span> BUSINESS ADDRESS
                        </td>
                        <td colspan="5"><?= $family ? ($family['spouse_business_address'] ? $family['spouse_business_address'] : '') : '' ?></td>
                        <td colspan="3" id="children-5-name"></td>
                        <td colspan="3" id="children-5-bday"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label">
                            <span class="count"></span> TELEPHONE NO.
                        </td>
                        <td colspan="5"><?= $family ? ($family['spouse_telephone_no'] ? $family['spouse_telephone_no'] : '') : '-' ?></td>
                        <td colspan="3" id="children-6-name"></td>
                        <td colspan="3" id="children-6-bday"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-bottom-0">
                            <span class="count">24.</span> FATHER'S SURNAME
                        </td>
                        <td colspan="5"><?= $family ? ($family['father_last_name'] ? $family['father_last_name'] : '-') : '-' ?></td>
                        <td colspan="3" id="children-7-name"></td>
                        <td colspan="3" id="children-7-bday"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-0">
                            <span class="count"></span> FIRST NAME
                        </td>
                        <td colspan="4"><?= $family ? ($family['father_first_name'] ? $family['father_first_name'] : '-') : '-' ?></td>
                        <td colspan="1" class="align-top s-label">
                            <small>
                                NAME EXTENSION (JR.,SR)
                            </small>
                            <?= $family ? ($family['father_extension_name'] ? $family['father_extension_name'] : '-') : '-' ?>
                        </td>
                        <td colspan="3" id="children-8-name"></td>
                        <td colspan="3" id="children-8-bday"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-0">
                            <span class="count"></span> MIDDLE NAME
                        </td>
                        <td colspan="5"><?= $family ? ($family['father_middle_name'] ? $family['father_middle_name'] : '-') : '-' ?></td>
                        <td colspan="3" id="children-9-name"></td>
                        <td colspan="3" id="children-9-bday"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-bottom-0">
                            <span class="count">25.</span> MOTHERS MAIDEN NAME
                        </td>
                        <td colspan="5"><?= $family ? ($family['mother_maiden_name'] ? $family['mother_maiden_name'] : '-') : '-' ?></td>
                        <td colspan="3" id="children-10-name"></td>
                        <td colspan="3" id="children-10-bday"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-0">
                            <span class="count"></span> SURNAME
                        </td>
                        <td colspan="5"><?= $family ? ($family['mother_last_name'] ? $family['mother_last_name'] : '-') : '-' ?></td>
                        <td colspan="3" id="children-11-name"></td>
                        <td colspan="3" id="children-11-bday"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-0">
                            <span class="count"></span> FIRST NAME
                        </td>
                        <td colspan="5"><?= $family ? ($family['mother_first_name'] ? $family['mother_first_name'] : '-') : '-' ?></td>
                        <td colspan="3" id="children-12-name"></td>
                        <td colspan="3" id="children-12-bday"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label border-0">
                            <span class="count"></span> MIDDLE NAME
                        </td>
                        <td colspan="5"><?= $family ? ($family['mother_middle_name'] ? $family['mother_middle_name'] : '-') : '-' ?></td>
                        <td colspan="6" class="s-label text-danger text-center"><i><b>(Continue on seperate sheet if necessary)</b></i></td>
                    </tr>
                </tbody>

                <!-- [ Education ] -->
                <tbody class="table-body">
                    <tr>
                        <td colspan="12" class="text-white separator">III. EDUCATIONAL BACKGROUND</td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="1" class="s-label border-bottom-0">
                            <span class="count">26.</span>
                            <span class="d-block text-center">LEVEL</span>
                        </td>
                        <td colspan="4" class="s-label border-bottom-0">
                            NAME OF SCHOOL<br>(Write in full)
                        </td>
                        <td colspan="2" class="s-label border-bottom-0">
                            BASIC EDUCATION/DEGREE/COURSE<br>
                            (Write in full)
                        </td>
                        <td colspan="2" class="s-label border-bottom-0">
                            PERIOD OF ATTENDANCE
                        </td>
                        <td colspan="1" class="s-label border-bottom-0">HIGHEST LEVEL/UNITS EARNED<br>(If not graduated)</td>
                        <td colspan="1" class="s-label border-bottom-0">YEAR GRADUATED</td>
                        <td colspan="1" class="s-label border-bottom-0">SCHOLARSHIP/<br>ACADEMIC<br>HONORS<br>RECEIVED</td>
                    </tr>
                    <tr class="text-center" style="margin-top: -20px;">
                        <td colspan="1" class="s-label border-top-0"></td>
                        <td colspan="4" class="s-label border-top-0"></td>
                        <td colspan="2" class="s-label border-top-0"></td>
                        <td colspan="1" class="s-label">From</td>
                        <td colspan="1" class="s-label">To</td>
                        <td colspan="1" class="s-label border-top-0"></td>
                        <td colspan="1" class="s-label border-top-0"></td>
                        <td colspan="1" class="s-label border-top-0"></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label">
                            <span class="count"></span> ELEMENTARY
                        </td>
                        <td colspan="4"><?= $education ? ($education['elementary_school'] ? $education['elementary_school'] : '') : '' ?></td>
                        <td colspan="2"><?= $education ? ($education['elementary_education'] ? $education['elementary_education'] : '') : '' ?></td>
                        <td colspan="1"><?= $education ? ($education['elementary_period_from'] ? $education['elementary_period_from'] : '') : '' ?></td>
                        <td colspan="1"><?= $education ? ($education['elementary_period_to'] ? $education['elementary_period_to'] : '') : '' ?></td>
                        <td colspan="1"><?= $education ? ($education['elementary_highest_level'] ? $education['elementary_highest_level'] : '') : '' ?></td>
                        <td colspan="1"><?= $education ? ($education['elementary_year_graduated'] ? $education['elementary_year_graduated'] : '') : '' ?></td>
                        <td colspan="1"><?= $education ? ($education['elementary_honors'] ? $education['elementary_honors'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label">
                            <span class="count"></span> SECONDARY
                        </td>
                        <td colspan="4"><?= $education ? ($education['secondary_school'] ? $education['secondary_school'] : '') : '' ?></td>
                        <td colspan="2"><?= $education ? ($education['secondary_education'] ? $education['secondary_education'] : '') : '' ?></td>
                        <td colspan="1"><?= $education ? ($education['secondary_period_from'] ? $education['secondary_period_from'] : '') : '' ?></td>
                        <td colspan="1"><?= $education ? ($education['secondary_period_to'] ? $education['secondary_period_to'] : '') : '' ?></td>
                        <td colspan="1"><?= $education ? ($education['secondary_highest_level'] ? $education['secondary_highest_level'] : '') : '' ?></td>
                        <td colspan="1"><?= $education ? ($education['secondary_year_graduated'] ? $education['secondary_year_graduated'] : '') : '' ?></td>
                        <td colspan="1"><?= $education ? ($education['secondary_honors'] ? $education['secondary_honors'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label">
                            <span class="count"></span> VOCATIONAL/<br>
                            <span class="count"></span> TRADE COURSE
                        </td>
                        <td colspan="4"><?= $education ? ($education['vocational_school'] ? $education['vocational_school'] : '') : '' ?></td>
                        <td colspan="2"><?= $education ? ($education['vocational_education'] ? $education['vocational_education'] : '') : '' ?></td>
                        <td colspan="1"><?= $education ? ($education['vocational_period_from'] ? $education['vocational_period_from'] : '') : '' ?></td>
                        <td colspan="1"><?= $education ? ($education['vocational_period_to'] ? $education['vocational_period_to'] : '') : '' ?></td>
                        <td colspan="1"><?= $education ? ($education['vocational_highest_level'] ? $education['vocational_highest_level'] : '') : '' ?></td>
                        <td colspan="1"><?= $education ? ($education['vocational_year_graduated'] ? $education['vocational_year_graduated'] : '') : '' ?></td>
                        <td colspan="1"><?= $education ? ($education['vocational_honors'] ? $education['vocational_honors'] : '') : '' ?></td>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label">
                            <span class="count"></span> COLLEGE
                        </td>
                        <?php if ($education && $education['college_school'] != 'N/A'): ?>
                            <td colspan="4"><?= $education ? ($education['college_school'] ? $education['college_school'] : '') : '' ?></td>
                            <td colspan="2"><?= $education ? ($education['college_education'] ? $education['college_education'] : '') : '' ?></td>
                            <td colspan="1"><?= $education ? ($education['college_period_from'] ? $education['college_period_from'] : '') : '' ?></td>
                            <td colspan="1"><?= $education ? ($education['college_period_to'] ? $education['college_period_to'] : '') : '' ?></td>
                            <td colspan="1"><?= $education ? ($education['college_highest_level'] ? $education['college_highest_level'] : '') : '' ?></td>
                            <td colspan="1"><?= $education ? ($education['college_year_graduated'] ? $education['college_year_graduated'] : '') : '' ?></td>
                            <td colspan="1"><?= $education ? ($education['college_honors'] ? $education['college_honors'] : '') : '' ?></td>
                        <?php else: ?>
                            <td colspan="4"></td>
                            <td colspan="2"></td>
                            <td colspan="1"></td>
                            <td colspan="1"></td>
                            <td colspan="1"></td>
                            <td colspan="1"></td>
                            <td colspan="1"></td>
                        <?php endif; ?>
                    </tr>
                    <tr>
                        <td colspan="1" class="s-label">
                            <span class="count"></span> GRADUATE STUDIES
                        </td>
                        <?php if ($education && $education['graduatestudies_school'] != 'N/A'): ?>
                            <td colspan="4"><?= $education ? ($education['graduatestudies_school'] ? $education['graduatestudies_school'] : '') : '' ?></td>
                            <td colspan="2"><?= $education ? ($education['graduatestudies_education'] ? $education['graduatestudies_education'] : '') : '' ?></td>
                            <td colspan="1"><?= $education ? ($education['graduatestudies_period_from'] ? $education['graduatestudies_period_from'] : '') : '' ?></td>
                            <td colspan="1"><?= $education ? ($education['graduatestudies_period_to'] ? $education['graduatestudies_period_to'] : '') : '' ?></td>
                            <td colspan="1"><?= $education ? ($education['graduatestudies_highest_level'] ? $education['graduatestudies_highest_level'] : '') : '' ?></td>
                            <td colspan="1"><?= $education ? ($education['graduatestudies_year_graduated'] ? $education['graduatestudies_year_graduated'] : '') : '' ?></td>
                            <td colspan="1"><?= $education ? ($education['graduatestudies_honors'] ? $education['graduatestudies_honors'] : '') : '' ?></td>
                        <?php else: ?>
                            <td colspan="4"></td>
                            <td colspan="2"></td>
                            <td colspan="1"></td>
                            <td colspan="1"></td>
                            <td colspan="1"></td>
                            <td colspan="1"></td>
                            <td colspan="1"></td>
                        <?php endif; ?>
                    </tr>
                </tbody>

                <tbody class="table-body">
                    <tr>
                        <td colspan="12" class="text-white separator bg-transparent text-danger text-center">
                            <i>(Continue on seperate sheet if necessary)</i>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1" class="text-center"><i><b>SIGNATURE</b></i></td>
                        <td colspan="6"></td>
                        <td colspan="2" class="text-center"><i><b>DATE</b></i></td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>

                <!-- [ Civil Service ] -->
                <tbody class="table-body">
                    <tr>
                        <td colspan="12" class="text-white separator">IV. CIVIL SERVICE ELIGIBILITY</td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="5" class="s-label border-bottom-0" style="width:30%">
                            <span class="count float-left">27.</span>
                            CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER SPECIAL LAWS/ CES/ CSEE
                            BARANGAY ELIGIBILITY / DRIVER'S LICENSE
                        </td>
                        <td colspan="1" class="s-label border-bottom-0">RATING<br>(If Applicable)</td>
                        <td colspan="2" class="s-label border-bottom-0">DATE OF EXAMINATION / CONFERMENT</td>
                        <td colspan="2" class="s-label border-bottom-0">PLACE OF EXAMINATION / CONFERMENT</td>
                        <td colspan="2" class="s-label border-bottom-0">LICENSE<br>(if applicable)</td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="5" class="s-label border-top-0"></td>
                        <td colspan="1" class="s-label border-top-0"></td>
                        <td colspan="2" class="s-label border-top-0"></td>
                        <td colspan="2" class="s-label border-top-0"></td>
                        <td colspan="1" class="s-label">NUMBER</td>
                        <td colspan="1" class="s-label">DATE OF VALIDITY</td>
                    </tr>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <tr>
                            <td colspan="5" id="cse-<?= $i ?>-title"></td>
                            <td colspan="1" id="cse-<?= $i ?>-rating"></td>
                            <td colspan="2" id="cse-<?= $i ?>-date"></td>
                            <td colspan="2" id="cse-<?= $i ?>-place"></td>
                            <td colspan="1" id="cse-<?= $i ?>-license"></td>
                            <td colspan="1" id="cse-<?= $i ?>-validity"></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>

                <tbody class="table-body">
                    <tr>
                        <td colspan="12" class="text-white separator bg-transparent text-danger text-center">
                            <i>(Continue on seperate sheet if necessary)</i>
                        </td>
                    </tr>
                </tbody>

                <!-- [ Work Experience ] -->
                <tbody class="table-body">
                    <tr>
                        <td colspan="12" class="text-white separator">
                            V. WORK EXPERIENCE<br>
                            <small><i>(Include private employment. Start from your recent work) Description of duties should be indicated in the attached Work Experience sheet.</i></small>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="1" class="s-label border-bottom-0" style="width: 20%;">
                            <span class="count float-left">28.</span>
                            INCLUSIVE DATES<br>(mm/dd/yyyy)

                        </td>
                        <td colspan="5" class="s-label border-bottom-0">
                            POSITION TITLE<br>
                            Write in full/Do not abbreviate)
                        </td>
                        <td colspan="2" class="s-label border-bottom-0">
                            DEPARTMENT/AGENCY/OFFICE/COMPANY<br>
                            (Write in full/Do not abbreviate)
                        </td>
                        <td colspan="1" class="s-label border-bottom-0">MONTHLY<br>SALARY</td>
                        <td colspan="1" class="s-label border-bottom-0"><small>SALARY/ JOB/ PAY<br>GRADE (if applicable)& STEP (Format "00-0")/ INCREMENT</small></td>
                        <td colspan="1" class="s-label border-bottom-0">STATUS OF<br>APPOINTMENT</td>
                        <td colspan="1" class="s-label border-bottom-0">GOV'T SERVICE<br>
                            <small>(Y/ N)</small>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1" class="p-0">
                            <table class="w-100 border-0">
                                <tbody class="border-0">
                                    <tr class="text-center">
                                        <td class="s-label border-0 border-bottom-0" style="width: 50%;">From</td>
                                        <td class="s-label border-top-0 border-right-0 border-bottom-0" style="width: 50%;">To</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                        <td colspan="5" class="s-label border-top-0"></td>
                        <td colspan="2" class="s-label border-top-0"></td>
                        <td colspan="1" class="s-label border-top-0"></td>
                        <td colspan="1" class="s-label border-top-0"></td>
                        <td colspan="1" class="s-label border-top-0"></td>
                        <td colspan="1" class="s-label border-top-0"></td>
                    </tr>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <tr>
                            <td colspan="1" class="p-0">
                                <table class="w-100 border-0">
                                    <tbody class="border-0">
                                        <tr>
                                            <td id="wrkexp-<?= $i ?>-datefrom" class="border-0 border-bottom-0" style="width: 50%;"></td>
                                            <td id="wrkexp-<?= $i ?>-dateto" class="border-top-0 border-right-0 border-bottom-0" style="width: 50%;"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td colspan="5" id="wrkexp-<?= $i ?>-position"></td>
                            <td colspan="2" id="wrkexp-<?= $i ?>-company"></td>
                            <td colspan="1" id="wrkexp-<?= $i ?>-salary"></td>
                            <td colspan="1" id="wrkexp-<?= $i ?>-increment"></td>
                            <td colspan="1" id="wrkexp-<?= $i ?>-status"></td>
                            <td colspan="1" id="wrkexp-<?= $i ?>-service"></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>

                <tbody class="table-body">
                    <tr>
                        <td colspan="12" class="text-white separator bg-transparent text-danger text-center">
                            <i>(Continue on seperate sheet if necessary)</i>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="1" class="text-center"><i><b>SIGNATURE</b></i></td>
                        <td colspan="6"></td>
                        <td colspan="2" class="text-center"><i><b>DATE</b></i></td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>

                <!-- [ Voluntary Work ] -->
                <tbody class="table-body">
                    <tr>
                        <td colspan="12" class="text-white separator">VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="6" class="s-label border-bottom-0">
                            <span class="count float-left">29.</span> NAME & ADDRESS OF ORGANIZATION<br>
                            (Write in full)
                        </td>
                        <td colspan="2" class="s-label border-bottom-0">INCLUSIVE DATES</td>
                        <td colspan="1" class="s-label border-bottom-0">NUMBER OF HOURS</td>
                        <td colspan="3" class="s-label border-bottom-0">POSITION / NATURE OF WORK</td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="6" class="s-label border-top-0"></td>
                        <td colspan="1" class="s-label">From</td>
                        <td colspan="1" class="s-label">To</td>
                        <td colspan="1" class="s-label border-top-0"></td>
                        <td colspan="3" class="s-label border-top-0"></td>
                    </tr>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <tr>
                            <td colspan="6" id="vltrywrk-<?= $i ?>-organization"></td>
                            <td colspan="1" id="vltrywrk-<?= $i ?>-datefrom"></td>
                            <td colspan="1" id="vltrywrk-<?= $i ?>-dateto"></td>
                            <td colspan="1" id="vltrywrk-<?= $i ?>-hours"></td>
                            <td colspan="3" id="vltrywrk-<?= $i ?>-nature"></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>

                <tbody class="table-body">
                    <tr>
                        <td colspan="12" class="text-white separator bg-transparent text-danger text-center">
                            <i>(Continue on seperate sheet if necessary)</i>
                        </td>
                    </tr>
                </tbody>

                <tbody class="table-body">
                    <tr>
                        <td colspan="12" class="text-white separator">VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S<br>
                            <small><i>(Start from the most recent L&D/training program and include only the relevant L&D/training taken for the last five (5) years for Division Chief/Executive/Managerial positions)</i></small>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="6" class="s-label border-bottom-0">
                            <span class="count float-left">30.</span> TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS<br>
                            (Write in full)
                        </td>
                        <td colspan="2" class="s-label border-bottom-0">INCLUSIVE DATES</td>
                        <td colspan="1" class="s-label border-bottom-0">NUMBER OF HOURS</td>
                        <td colspan="1" class="s-label border-bottom-0">Type of LD ( Managerial/ Supervisory/Technical/etc)</td>
                        <td colspan="2" class="s-label border-bottom-0">CONDUCTED/ SPONSORED BY<br>(Write in full)</td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="6" class="s-label border-top-0"></td>
                        <td colspan="1" class="s-label">From</td>
                        <td colspan="1" class="s-label">To</td>
                        <td colspan="1" class="s-label border-top-0"></td>
                        <td colspan="1" class="s-label border-top-0"></td>
                        <td colspan="2" class="s-label border-top-0"></td>
                    </tr>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <tr>
                            <td colspan="6" id="trngprgm-<?= $i ?>-program"></td>
                            <td colspan="1" id="trngprgm-<?= $i ?>-datefrom"></td>
                            <td colspan="1" id="trngprgm-<?= $i ?>-dateto"></td>
                            <td colspan="1" id="trngprgm-<?= $i ?>-hours"></td>
                            <td colspan="1" id="trngprgm-<?= $i ?>-type"></td>
                            <td colspan="3" id="trngprgm-<?= $i ?>-sponsor"></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>

                <tbody class="table-body">
                    <tr>
                        <td colspan="12" class="text-white separator bg-transparent text-danger text-center">
                            <i>(Continue on seperate sheet if necessary)</i>
                        </td>
                    </tr>
                </tbody>

                <tbody class="table-body">
                    <tr>
                        <td colspan="12" class="text-white separator">VIII. OTHER INFORMATION</td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="4" class="s-label">
                            <span class="count float-left">31.</span> SPECIAL SKILLS and HOBBIES
                        </td>
                        <td colspan="4" class="s-label">
                            <span class="count float-left">32.</span> NON-ACADEMIC DISTINCTIONS / RECOGNITION<br>(Write in full)
                        </td>
                        <td colspan="4" class="s-label">
                            <span class="count float-left">33.</span> MEMBERSHIP IN ASSOCIATION/ORGANIZATION<br>(Write in full)
                        </td>
                    </tr>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <tr>
                            <td colspan="4" id="skill-<?= $i ?>"></td>
                            <td colspan="4" id="recognition-<?= $i ?>"></td>
                            <td colspan="4" id="membership-<?= $i ?>"></td>
                        </tr>
                    <?php endfor; ?>
                </tbody>

                <tbody class="table-body">
                    <tr>
                        <td colspan="12" class="text-white separator bg-transparent text-danger text-center">
                            <i>(Continue on seperate sheet if necessary)</i>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" class="text-center"><i><b>SIGNATURE</b></i></td>
                        <td colspan="3"></td>
                        <td colspan="1" class="text-center"><i><b>DATE</b></i></td>
                        <td colspan="4"></td>
                    </tr>
                </tbody>


                <!-- Q1 -->
                <tbody class="table-body question-block">
                    <tr>
                        <td colspan="12" class="separator"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label border-bottom-0">
                            <span class="count">34.</span> Are you related by consanguinity or affinity to the appointing or recommending authority, or to the<br>
                            <span class="count"></span>chief of bureau or office or to the person who has immediate supervision over you in the Office,<br>
                            <span class="count"></span>Bureau or Department where you will beapppointed,<br>
                        </td>
                        <td colspan="2">

                        </td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                            <span class="count"></span>a. within the third degree?<br>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                            <span class="count"></span>b. within the fourth degree (for Local Government Unit - Career Employees)?
                        </td>
                        <td colspan="2"></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                        </td>
                        <td colspan="2">If YES, give details:</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label"></td>
                        <td colspan="5"></td>
                    </tr>
                </tbody>

                <!-- Q2 -->
                <tbody class="table-body question-block">
                    <tr>
                        <td colspan="7" class="s-label border-bottom-0">
                            <span class="count">35.</span> a. Have you ever been found guilty of any administrative offense?
                        </td>
                        <td colspan="2">

                        </td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label"></td>
                        <td colspan="5">If YES, give details:</td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label"></td>
                        <td colspan="5"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                            <span class="count"></span> b. within the fourth degree (for Local Government Unit - Career Employees)?
                        </td>
                        <td colspan="2" style="border-top-width: 1px !important;"></td>
                        <td colspan="3" style="border-top-width: 1px !important;"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label"></td>
                        <td colspan="5">If YES, give details:</td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label"></td>
                        <td colspan="2">Date Filed:</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label"></td>
                        <td colspan="2">Status of Case/s:</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>

                <!-- Q3 -->
                <tbody class="table-body question-block">
                    <tr>
                        <td colspan="7" class="s-label border-bottom-0">
                            <span class="count">36.</span> Have you ever been convicted of any crime or violation of any law, decree, ordinance or regulation by any court or tribunal?
                        </td>
                        <td colspan="2"></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label"></td>
                        <td colspan="5">If YES, give details:</td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label"></td>
                        <td colspan="5"></td>
                    </tr>
                </tbody>

                <!-- Q4 -->
                <tbody class="table-body question-block">
                    <tr>
                        <td colspan="7" class="s-label border-bottom-0">
                            <span class="count">37.</span> Have you ever been separated from the service in any of the following modes: resignation,<br>


                        </td>
                        <td colspan="2"></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                            <span class="count"></span> retirement, dropped from the rolls, dismissal, termination, end of term, finished contract or phased<br>
                        </td>
                        <td colspan="5">If YES, give details:</td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                            <span class="count"></span> out (abolition) in the public or private sector?
                        </td>
                        <td colspan="2"></td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>

                <!-- Q5 -->
                <tbody class="table-body question-block">
                    <tr>
                        <td colspan="7" class="s-label border-bottom-0">
                            <span class="count">38.</span> a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?
                        </td>
                        <td colspan="2"></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                            <span class="count"></span><br>
                        </td>
                        <td colspan="2">If YES, give details:</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                            <span class="count"></span> b. Have you resigned from the government service during the three (3)-month period before the last
                        </td>
                        <td colspan="2"></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                            <span class="count"></span> election to promote/actively campaign for a national or local candidate?
                        </td>
                        <td colspan="2">If YES, give details:</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label"></td>
                        <td colspan="2"></td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>

                <!-- Q6 -->
                <tbody class="table-body question-block">
                    <tr>
                        <td colspan="7" class="s-label border-bottom-0">
                            <span class="count">39.</span> Have you acquired the status of an immigrant or permanent resident of another country?
                        </td>
                        <td colspan="2">

                        </td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                        </td>
                        <td colspan="2">if YES, give details (country):</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                        </td>
                        <td colspan="2"></td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>

                <!-- Q7 -->
                <tbody class="table-body question-block">
                    <tr>
                        <td colspan="7" class="s-label border-bottom-0">
                            <span class="count">40.</span> Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA<br>
                            <span class="count"></span> 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:
                        </td>
                        <td colspan="2">

                        </td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                            <span class="count"></span>a. Are you a member of any indigenous group?<br>
                        </td>
                        <td colspan="2"></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                            <span class="count"></span><br>
                        </td>
                        <td colspan="2">If YES, please specify:</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                            <span class="count"></span>b. Are you a person with disability?
                        </td>
                        <td colspan="2"></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                        </td>
                        <td colspan="2">If YES, please specify:</td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label">
                            <span class="count"></span>c. Are you a solo parent?
                        </td>
                        <td colspan="2"></td>
                        <td colspan="3"></td>
                    </tr>
                    <tr>
                        <td colspan="7" class="s-label"></td>
                        <td colspan="2">If YES, please specify:</td>
                        <td colspan="3"></td>
                    </tr>
                </tbody>

                <!-- End of Page 4 -->

                <tbody class="table-body">
                    <tr>
                        <td colspan="8" class="s-label">
                            <span class="count">41.</span> REFERENCES <span class="text-danger">(Person not related by consanguinity or affinity to applicant /appointee)</span>
                        </td>
                        <td colspan="4" rowspan="6" class="p-5">
                            <table class="w-75 mx-auto border-0">
                                <tbody class="border-0">
                                    <tr>
                                        <?php if ($final && $final['id_picture']): ?>
                                            <td class="text-center">
                                                <img src="/tup-files/pds-pictures/3ECC5D169541_IDPicture.jpg" alt="" style="height: 4cm;">
                                            </td>
                                        <?php else: ?>
                                            <td class="text-center p-3">
                                                ID picture taken within the last 6 months3.5 cm. X 4.5 cm(passport size)With full and handwrittenname tag and signature overprinted nameComputer generated or photocopied picture is not acceptable
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                    <tr>
                                        <td class="border-0 text-muted lead text-center">PHOTO</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr class="text-center">
                        <td colspan="4" class="s-label">NAME</td>
                        <td colspan="2" class="s-label">ADDRESS</td>
                        <td colspan="2" class="s-label">TEL. NO.</td>
                    </tr>
                    <?php for ($i = 1; $i <= 3; $i++): ?>
                        <tr>
                            <td colspan="4" id="reference-<?= $i ?>-name"></td>
                            <td colspan="2" id="reference-<?= $i ?>-address"></td>
                            <td colspan="2" id="reference-<?= $i ?>-telephone"></td>
                        </tr>
                    <?php endfor; ?>
                    <tr>
                        <td colspan="8">
                            <span class="count">42.</span> I declare under oath that I have personally accomplished this Personal Data Sheet which is a true correct and<br><span class="count"></span> complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the<br><span class="count"></span> Philippines. I authorize the agency head / authorized representative t verify validate the contents stated herein.<br><span class="count"></span> I agree that any misrepresentation made in this document and its attachments shall cause the filing of<br><span class="count"></span> administrative/criminal case/s against me.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="12" class="border-0 p-0">
                            <table class="border-0 w-100">
                                <tbody class="border-0">
                                    <tr>
                                        <td colspan="4" class="border-0 p-3" style="width: 38.5%;">
                                            <table class="border-0 w-100">
                                                <tbody>
                                                    <tr>
                                                        <td class="s-label py-2">Government Issued ID(i.e.Passport, GSIS, SSS, PRC, Driver's License, etc.)<br> PLEASE INDICATE ID Number and Date of Issuance</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 30%;">Government Issued ID: <?= $final ? ($final['government_id'] ? $final['government_id'] : '-') : '-' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 30%;">ID/License/Passport No.: <?= $final ? ($final['id_number'] ? $final['id_number'] : '-') : '-' ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width: 30%;">Date/Place of Issuance: <?= $final ? ($final['date_or_issuance'] ? $final['date_or_issuance'] : '-') : '-' ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td colspan="4" class="border-0 p-3" style="width: 38.5%;">
                                            <table class="border-0 w-100">
                                                <tbody class="border-0 text-center">
                                                    <tr>
                                                        <td class="py-4"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="s-label"><small>Signature (Sign inside the box)</small></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="s-label"><small>Date Accomplished</small></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                        <td colspan="4" class="border-0 p-3">
                                            <table class="border-0 w-100">
                                                <tbody class="border-0">
                                                    <tr>
                                                        <td class="py-5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="s-label text-center">Right Thumbmark</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>

                                <tbody class="table-body">
                                    <tr>
                                        <td colspan="12" class="text-center py-2">
                                            SUBSCRIBED AND SWORN to before me this <input type="text" class="border-top-0 border-left-0 border-right-0" style="width: 25%;"> , affiant exhibiting his/her validly issued government ID as indicated above.
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="12" class="py-5">
                                            <table class="w-25 mx-auto">
                                                <tbody>
                                                    <tr>
                                                        <td class="py-5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="s-label text-center">Person Administering Oath</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </td>
                    </tr>
                </tbody>
                <!-- End of References -->
            </table>
        </form>
    </div>
</body>

<script src="/tup-javascript/pdsprint.js"></script>

</html>