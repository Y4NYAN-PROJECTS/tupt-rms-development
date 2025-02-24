document.addEventListener("DOMContentLoaded", function () {
    // [ Children ]
    const childrenSavedCount = document.getElementById('saved-children-count');
    if (childrenSavedCount) {
        let childrenIndex = childrenSavedCount.value;

        if (childrenIndex >= 1) {
            for (let i = 1; i <= childrenIndex; i++) {
                const hiddenChildrenName = document.getElementById(`saved-children-name-${i}`);
                const hiddenChildrenBirthdate = document.getElementById(`saved-children-bday-${i}`);

                const tablerowChildrenName = document.getElementById(`children-${i}-name`);
                const tablerowChildrenBirthdate = document.getElementById(`children-${i}-bday`);

                tablerowChildrenName.textContent = hiddenChildrenName.value;
                tablerowChildrenBirthdate.textContent = hiddenChildrenBirthdate.value;
            }
        }
    }

    


    // [ Civil Service ]
    const cseSavedCount = document.getElementById('saved-cse-count');
    if (cseSavedCount) {
        let cseIndex = cseSavedCount.value;
        
        if (cseIndex >= 1) {
            for (let i = 1; i <= cseIndex; i++) {
                const hiddenCivilService = document.getElementById(`saved-cse-${i}`);
                const hiddenCSERating = document.getElementById(`saved-cse-rating-${i}`);
                const hiddenCSEDate = document.getElementById(`saved-cse-date-${i}`);
                const hiddenCSEPlace = document.getElementById(`saved-cse-place-${i}`);
                const hiddenCSELicense = document.getElementById(`saved-cse-license-${i}`);
                const hiddenCSEValidity = document.getElementById(`saved-cse-validity-${i}`);

                const tablerowCivilService = document.getElementById(`cse-${i}-title`);
                const tablerowCSERating = document.getElementById(`cse-${i}-rating`);
                const tablerowCSEDate = document.getElementById(`cse-${i}-date`);
                const tablerowCSEPlace = document.getElementById(`cse-${i}-place`);
                const tablerowCSELicense = document.getElementById(`cse-${i}-license`);
                const tablerowCSEValidity = document.getElementById(`cse-${i}-validity`);

                tablerowCivilService.textContent = hiddenCivilService.value;
                tablerowCSERating.textContent = hiddenCSERating.value;
                tablerowCSEDate.textContent = hiddenCSEDate.value;
                tablerowCSEPlace.textContent = hiddenCSEPlace.value;
                tablerowCSELicense.textContent = hiddenCSELicense.value;
                tablerowCSEValidity.textContent = hiddenCSEValidity.value;
            }
        }
    }

    


    // [ Work Experince ]
    const wrkexpSavedCount = document.getElementById('saved-wrkexp-count');
    if (wrkexpSavedCount) {
        let wrkexpIndex = wrkexpSavedCount.value;

        if (wrkexpIndex >= 1) {
            for (let i = 1; i <= wrkexpIndex; i++) {
                const hiddenWEPosition = document.getElementById(`saved-wrkexp-position-${i}`);
                const hiddenWEDateFrom = document.getElementById(`saved-wrkexp-datefrom-${i}`);
                const hiddenWEDateTo = document.getElementById(`saved-wrkexp-dateto-${i}`);
                const hiddenWECompany = document.getElementById(`saved-wrkexp-company-${i}`);
                const hiddenWESalary = document.getElementById(`saved-wrkexp-salary-${i}`);
                const hiddenWEIncrement = document.getElementById(`saved-wrkexp-increment-${i}`);
                const hiddenWEStatus = document.getElementById(`saved-wrkexp-status-${i}`);
                const hiddenWEService = document.getElementById(`saved-wrkexp-service-${i}`);

                const tablerowWEPosition = document.getElementById(`wrkexp-${i}-position`);
                const tablerowWEDateFrom = document.getElementById(`wrkexp-${i}-datefrom`);
                const tablerowWEDateTo = document.getElementById(`wrkexp-${i}-dateto`);
                const tablerowWECompany = document.getElementById(`wrkexp-${i}-company`);
                const tablerowWESalary = document.getElementById(`wrkexp-${i}-salary`);
                const tablerowWEIncrement = document.getElementById(`wrkexp-${i}-increment`);
                const tablerowWEStatus = document.getElementById(`wrkexp-${i}-status`);
                const tablerowWEService = document.getElementById(`wrkexp-${i}-service`);

                tablerowWEDateFrom.textContent = hiddenWEDateFrom.value;
                tablerowWEDateTo.textContent = hiddenWEDateTo.value;
                tablerowWEPosition.textContent = hiddenWEPosition.value;
                tablerowWECompany.textContent = hiddenWECompany.value;
                tablerowWESalary.textContent = hiddenWESalary.value;
                tablerowWEIncrement.textContent = hiddenWEIncrement.value;
                tablerowWEStatus.textContent = hiddenWEStatus.value;
                tablerowWEService.textContent = hiddenWEService.value;
            }
        }
    }

    


    // [ Voluntary Work ]
    const vltrywrkSavedCount = document.getElementById('saved-vltrywrk-count');
    if (vltrywrkSavedCount) {
        let vltrywrkIndex = vltrywrkSavedCount.value;

        if (vltrywrkIndex >= 1) {
            for (let i = 1; i <= vltrywrkIndex; i++) {
                const hiddenVWOrganization = document.getElementById(`saved-vltrywrk-organization-${i}`);
                const hiddenVWDateFrom = document.getElementById(`saved-vltrywrk-datefrom-${i}`);
                const hiddenVWDateTo = document.getElementById(`saved-vltrywrk-dateto-${i}`);
                const hiddenVWHours = document.getElementById(`saved-vltrywrk-hours-${i}`);
                const hiddenVWNature = document.getElementById(`saved-vltrywrk-nature-${i}`);

                const tablerowVWOrganization = document.getElementById(`vltrywrk-${i}-organization`);
                const tablerowVWDateFrom = document.getElementById(`vltrywrk-${i}-datefrom`);
                const tablerowVWDateTo = document.getElementById(`vltrywrk-${i}-dateto`);
                const tablerowVWHours = document.getElementById(`vltrywrk-${i}-hours`);
                const tablerowVWNature = document.getElementById(`vltrywrk-${i}-nature`);

                tablerowVWOrganization.textContent = hiddenVWOrganization.value;
                tablerowVWDateFrom.textContent = hiddenVWDateFrom.value;
                tablerowVWDateTo.textContent = hiddenVWDateTo.value;
                tablerowVWHours.textContent = hiddenVWHours.value;
                tablerowVWNature.textContent = hiddenVWNature.value;
            }
        }
    }
    


    // [ Training Program ]
    const trngprgmSavedCount = document.getElementById('saved-trngprgm-count');
    if(trngprgmSavedCount){
        let trngprgmIndex = trngprgmSavedCount.value;

        if (trngprgmIndex >= 1) {
            for (let i = 1; i <= trngprgmIndex; i++) {
                const hiddenTPprogram = document.getElementById(`saved-trngprgm-program-${i}`);
                const hiddenTPDateFrom = document.getElementById(`saved-trngprgm-datefrom-${i}`);
                const hiddenTPDateTo = document.getElementById(`saved-trngprgm-dateto-${i}`);
                const hiddenTPHours = document.getElementById(`saved-trngprgm-hours-${i}`);
                const hiddenTPType = document.getElementById(`saved-trngprgm-type-${i}`);
                const hiddenTPSponsor = document.getElementById(`saved-trngprgm-sponsor-${i}`);

                const tablerowTPOrganization = document.getElementById(`trngprgm-${i}-program`);
                const tablerowTPDateFrom = document.getElementById(`trngprgm-${i}-datefrom`);
                const tablerowTPDateTo = document.getElementById(`trngprgm-${i}-dateto`);
                const tablerowTPHours = document.getElementById(`trngprgm-${i}-hours`);
                const tablerowTPType = document.getElementById(`trngprgm-${i}-type`);
                const tablerowTPSponsor = document.getElementById(`trngprgm-${i}-sponsor`);

                tablerowTPOrganization.textContent = hiddenTPprogram.value;
                tablerowTPDateFrom.textContent = hiddenTPDateFrom.value;
                tablerowTPDateTo.textContent = hiddenTPDateTo.value;
                tablerowTPHours.textContent = hiddenTPHours.value;
                tablerowTPType.textContent = hiddenTPType.value;
                tablerowTPSponsor.textContent = hiddenTPSponsor.value;
            }
        }
    }

    // [ Skills ]
    const skillsSavedCount = document.getElementById('saved-skill-count');
    if (skillsSavedCount) {
       let skillsIndex = skillsSavedCount.value;

        if (skillsIndex >= 1) {
            for (let i = 1; i <= skillsIndex; i++) {
                const hiddenSkills = document.getElementById(`saved-skill-${i}`);
                const tablerowSkills = document.getElementById(`skill-${i}`);

                tablerowSkills.textContent = hiddenSkills.value;
            }
        } 
    }
    

    // [ Recognitions ]
    const recognitionSavedCount = document.getElementById('saved-recognition-count');
    if (skillsSavedCount) {
        let recognitionIndex = recognitionSavedCount.value;

        if (recognitionIndex >= 1) {
            for (let i = 1; i <= recognitionIndex; i++) {
                const hiddenRecognition = document.getElementById(`saved-recognition-info-${i}`);
                const tablerowRecognition = document.getElementById(`recognition-${i}`);

                tablerowRecognition.textContent = hiddenRecognition.value;
            }
        }
    }

    // [ Membership ]
    const membershipSavedCount = document.getElementById('saved-membership-count');
    if(membershipSavedCount){
        let membershipIndex = membershipSavedCount.value;

        if (membershipIndex >= 1) {
            for (let i = 1; i <= membershipIndex; i++) {
                const hiddenMembership = document.getElementById(`saved-membership-info-${i}`);
                const tablerowMembership = document.getElementById(`membership-${i}`);

                tablerowMembership.textContent = hiddenMembership.value;
            }
        }
    }


    // [ Reference ]
    const referenceSavedCount = document.getElementById('saved-reference-count');
    if(referenceSavedCount){
    let referenceIndex = referenceSavedCount.value;

    if (referenceIndex >= 1) {
        for (let i = 1; i <= referenceIndex; i++) {
            const hiddenReferenceName = document.getElementById(`saved-reference-name-${i}`);
            const hiddenReferenceAddress = document.getElementById(`saved-reference-address-${i}`);
            const hiddenReferenceTelephone = document.getElementById(`saved-reference-telephone-${i}`);

            const tablerowReferenceName = document.getElementById(`reference-${i}-name`);
            const tablerowReferenceAddress = document.getElementById(`reference-${i}-address`);
            const tablerowReferenceTelephone = document.getElementById(`reference-${i}-telephone`);

            tablerowReferenceName.textContent = hiddenReferenceName.value;
            tablerowReferenceAddress.textContent = hiddenReferenceAddress.value;
            tablerowReferenceTelephone.textContent = hiddenReferenceTelephone.value;
        }
        }
    }

});