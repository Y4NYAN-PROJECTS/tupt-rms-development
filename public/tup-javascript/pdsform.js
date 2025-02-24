// [ P E R S O N A L ]
// [ PDS Citizenship - Country ]
document.addEventListener("DOMContentLoaded", function () {
    const citizenshipSelect = document.getElementById("citizenship-select");
    const citizenshipHidden = document.getElementById("citizenship");
    const countrySelect = document.getElementById("country-select");
    const countryHidden = document.getElementById("country");
    const countries = [
        "Philippines", "Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Antigua and Barbuda", "Argentina", "Armenia", "Australia", "Austria",
        "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bhutan", "Bolivia",
        "Bosnia and Herzegovina", "Botswana", "Brazil", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cabo Verde", "Cambodia",
        "Cameroon", "Canada", "Central African Republic", "Chad", "Chile", "China", "Colombia", "Comoros", "Congo (Congo-Brazzaville)",
        "Costa Rica", "Croatia", "Cuba", "Cyprus", "Czechia (Czech Republic)", "Democratic Republic of the Congo", "Denmark", "Djibouti",
        "Dominica", "Dominican Republic", "East Timor (Timor-Leste)", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea",
        "Estonia", "Eswatini (fmr. 'Swaziland')", "Ethiopia", "Fiji", "Finland", "France", "Gabon", "Gambia", "Georgia", "Germany",
        "Ghana", "Greece", "Grenada", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Honduras", "Hungary", "Iceland",
        "India", "Indonesia", "Iran", "Iraq", "Ireland", "Israel", "Italy", "Ivory Coast", "Jamaica", "Japan", "Jordan", "Kazakhstan",
        "Kenya", "Kiribati", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya",
        "Liechtenstein", "Lithuania", "Luxembourg", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta",
        "Marshall Islands", "Mauritania", "Mauritius", "Mexico", "Micronesia", "Moldova", "Monaco", "Mongolia", "Montenegro",
        "Morocco", "Mozambique", "Myanmar (formerly Burma)", "Namibia", "Nauru", "Nepal", "Netherlands", "New Zealand",
        "Nicaragua", "Niger", "Nigeria", "North Korea", "North Macedonia (formerly Macedonia)", "Norway", "Oman", "Pakistan",
        "Palau", "Palestine State", "Panama", "Papua New Guinea", "Paraguay", "Peru",  "Poland", "Portugal",
        "Qatar", "Romania", "Russia", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines",
        "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone",
        "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Korea", "South Sudan",
        "Spain", "Sri Lanka", "Sudan", "Suriname", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania",
        "Thailand", "Togo", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Tuvalu", "Uganda",
        "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "Uruguay", "Uzbekistan", "Vanuatu",
        "Vatican City (Holy See)", "Venezuela", "Vietnam", "Yemen", "Zambia", "Zimbabwe"
    ];

    countries.forEach(country => {
        const option = document.createElement('option');
        option.text = country;
        option.value = country;
        countrySelect.add(option);
    });

    let citizenship = citizenshipHidden.value;
    citizenshipSelect.value = citizenship;

    let selected = citizenshipSelect.value;
    let country = countryHidden.value;
    

    if (selected === "Dual Citizenship") {
        console.log(citizenship);
        countrySelect.disabled = false;
        countrySelect.value = country;
    } else {
        countrySelect.disabled = true;
        countrySelect.value = "Philippines";
        console.log("fil");
    }
    
    citizenshipSelect.addEventListener("change", function () {
        if (citizenshipSelect.value === "Dual Citizenship") {
            selected = citizenshipSelect.value;
            countrySelect.disabled = false;
        } else {
            selected = citizenshipSelect.value;
            countrySelect.disabled = true;
            countrySelect.value = "Philippines";
        }
    });

    // extension name dropdown
    const extensionnameSelect = document.getElementById("extensionname-select");
    const extensionnameHidden = document.getElementById("extensionname");
    let extensionname = extensionnameHidden.value;
    
    extensionnameSelect.value = extensionname;
    extensionnameSelect.addEventListener("change", function () {
        extensionname = extensionnameSelect.value; 
    });

    // sex dropdown
    const sexSelect = document.getElementById("sex-select");
    const sexHidden = document.getElementById("sex");
    let sex = sexHidden.value;
    
    sexSelect.value = sex;
    sexSelect.addEventListener("change", function () {
        sex = sexSelect.value; 
    });

    // civil status dropdown
    const civilstatusSelect = document.getElementById("civilstatus-select");
    const civilstatusHidden = document.getElementById("civilstatus");
    let civilstatus = civilstatusHidden.value;
    
    civilstatusSelect.value = civilstatus;
    civilstatusSelect.addEventListener("change", function () {
        civilstatus = civilstatusSelect.value; 
    });

    // blood type dropdown
    const bloodtypeSelect = document.getElementById("bloodtype-select");
    const bloodtypeHidden = document.getElementById("bloodtype");
    let bloodtype = bloodtypeHidden.value;
    
    bloodtypeSelect.value = bloodtype;
    bloodtypeSelect.addEventListener("change", function () {
        bloodtype = bloodtypeSelect.value; 
    });

    // citizenship by
    const citizenshipbySelect = document.getElementById("citizenship-by-select");
    const citizenshipbyHidden = document.getElementById("citizenship-by");
    let citizenshipby = citizenshipbyHidden.value;
    
    citizenshipbySelect.value = citizenshipby;
    citizenshipbySelect.addEventListener("change", function () {
        citizenshipby = citizenshipbySelect.value; 
    });

    // resident adrress
    const toggleSwitch = document.getElementById("permanent-address-toggle");
    toggleSwitch.addEventListener('change', function () {
        const rahouse = document.getElementById("ra-blk");
        let rahouseInput = rahouse.value;
        if (rahouseInput) {
            const pahouse = document.getElementById("pa-blk");
            pahouse.value = rahouseInput;
        }

        const rastreet = document.getElementById("ra-st");
        let rastreetInput = rastreet.value;
        if (rastreetInput) {
            const pastreet = document.getElementById("pa-st");
            pastreet.value = rastreetInput;
        }

        const ravillage = document.getElementById("ra-vllg");
        let ravillageInput = ravillage.value;
        if (ravillageInput) {
            const pavillage = document.getElementById("pa-vllg");
            pavillage.value = ravillageInput;
        }
        
        const razipcode = document.getElementById("ra-zip");
        let razipcodeInput = razipcode.value;
        if (razipcodeInput) {
            const pazipcode = document.getElementById("pa-zip");
            pazipcode.value = razipcodeInput;
        }

        const raprovince = document.getElementById("ra-prvnc");
        let raprovinceInput = raprovince.value;
        if (raprovinceInput) {
            const paprovince = document.getElementById("pa-prvnc");
            paprovince.value = raprovinceInput;
        }
    });
});


// [ F A M I L Y ]
document.addEventListener("DOMContentLoaded", function () {
    // children
    const childrenSavedCountHidden = document.getElementById('count');
    const childrenCount = document.getElementById('children-count');
    const childrenBody = document.getElementById('childrens-background');
    const childrenAddButton = document.getElementById('add-children');
    const childrenMaxFields = 12;

    let childrenIndex = childrenCount.value;
    let childrenSavedCount = childrenSavedCountHidden.value;
    let currentDate = new Date().toISOString().split('T')[0];

    for (let i = 1; i <= childrenSavedCount; i++){
        console.log(i + " Displayed Child");
        if (i === 1) {
            const childrenNameSaved = document.getElementById(`children-saved-name-${i}`);
            const childrenBirthdateSaved = document.getElementById(`children-saved-bday-${i}`);

            const childrenNameInput = document.getElementById(`child-${i}`);
            const childrenBirthdateInput = document.getElementById(`child-bd-${i}`);

            if (childrenNameInput) {
                childrenNameInput.value = childrenNameSaved ? childrenNameSaved.value : '';
            }

            if (childrenBirthdateInput) {
                childrenBirthdateInput.value = childrenBirthdateSaved ? childrenBirthdateSaved.value : '';
            }
        } else {
            const childrenNameValue = document.getElementById(`children-saved-name-${i}`).value;
            const childrenBirthdateValue = document.getElementById(`children-saved-bday-${i}`).value;
            
            addChildren(i, childrenNameValue, childrenBirthdateValue);
        }
    }
    
    function addChildren(childrenIndex, childrenNameValue, childrenBirthdateValue) {
        const newField = document.createElement('div');
        newField.innerHTML = `
            <div class="row" id="children-${childrenIndex}">
                <h5>${childrenIndex}. Children</h5>
                <div class="col-sm-12 col-md-12 col-lg-8 mb-3">
                    <label class="form-label" for="child-${childrenIndex}">Name of Children <span class="text-primary">*</span></label>
                    <input type="text" class="form-control" id="child-${childrenIndex}" placeholder="Name of Children" name="fmly_children_${childrenIndex}" value="${childrenNameValue}" required>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-4 mb-3">
                    <label class="form-label" for="child-${childrenIndex}">Birthdate <span class="text-primary">*</span></label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="child-bd-${childrenIndex}" name="fmly_children_birthdate_${childrenIndex}" placeholder="Select date" value="${childrenBirthdateValue}" required>
                        <button class="btn btn-danger" type="button" id="${childrenIndex}"><i class="feather icon-minus" id="${childrenIndex}"></i></button>
                    </div>
                </div>
            </div>
        `;
        childrenBody.appendChild(newField);
        childrenCount.value = childrenIndex;

        const childrenFocus = newField.querySelector('input');
        if (childrenFocus) {
            childrenFocus.focus();
        }
    }

    childrenAddButton.addEventListener('click', function() {
        if (childrenIndex < childrenMaxFields) {
            childrenIndex++;
            const childrenNameValue = '';
            const childrenBirthdateValue = currentDate;
            addChildren(childrenIndex, childrenNameValue, childrenBirthdateValue);
        }
    });
    
    childrenBody.addEventListener('click', function(event) {
        const childrenInputIndex = parseInt(event.target.id);
        if (childrenIndex == childrenInputIndex) {
            const childrenElementRemove = document.getElementById(`children-${childrenIndex}`);
            if (childrenElementRemove) {
                childrenElementRemove.remove(); 
                childrenIndex--;
                childrenCount.value = childrenIndex;
            }
        }
    });

    // spouse extension name
    const spouseextensionnameSelect = document.getElementById("spouse-extensionname-select");
    const spouseextensionnameHidden = document.getElementById("spouse-extensionname");
    let spouseextensionname = spouseextensionnameHidden.value;
    
    spouseextensionnameSelect.value = spouseextensionname;
    spouseextensionnameSelect.addEventListener("change", function () {
        spouseextensionname = spouseextensionnameSelect.value; 
    });

    // father extension name
    const fatherextensionnameSelect = document.getElementById("father-extensionname-select");
    const fatherextensionnameHidden = document.getElementById("father-extensionname");
    let fatherextensionname = fatherextensionnameHidden.value;
    
    fatherextensionnameSelect.value = fatherextensionname;
    fatherextensionnameSelect.addEventListener("change", function () {
        fatherextensionname = fatherextensionnameSelect.value; 
    });
});



// [ PDS Civil Service ]
document.addEventListener("DOMContentLoaded", function () {
    const cseSavedCountHidden = document.getElementById('cse-saved-count');
    const civilServiceCount = document.getElementById('civil-service-count');
    const civilServiceBody = document.getElementById('civil-service-background');
    const civilServiceAddButton = document.getElementById('add-civil-service');
    const civilServiceMaxFields = 8;
    let civilServiceIndex = civilServiceCount.value;
    let cseSavedCount = cseSavedCountHidden.value;
    let currentDate = new Date().toISOString().split('T')[0];

    if (cseSavedCount >= 1) {
        for (let i = 1; i <= cseSavedCount; i++) {
            console.log(i + " Displayed Civil Service");
            if (i == 1) {
                const csvcSaved = document.getElementById(`cse-saved-csvc-${i}`);
                const rtngSaved = document.getElementById(`cse-saved-rtng-${i}`);
                const doeSaved = document.getElementById(`cse-saved-doe-${i}`);
                const poeSaved = document.getElementById(`cse-saved-poe-${i}`);
                const lcnsSaved = document.getElementById(`cse-saved-lcns-${i}`);
                const vldtySaved = document.getElementById(`cse-saved-vldty-${i}`);

                const csvcInput = document.getElementById(`csvc-${i}`);
                const rtngInput = document.getElementById(`rtng-${i}`);
                const doeInput = document.getElementById(`doe-${i}`);
                const poeInput = document.getElementById(`poe-${i}`);
                const lcnsInput = document.getElementById(`lcns-${i}`);
                const vldtyInput = document.getElementById(`vldty-${i}`);

                if (csvcInput) {
                    csvcInput.value = csvcSaved ? csvcSaved.value : '';
                }

                if (rtngInput) {
                    rtngInput.value = rtngSaved ? rtngSaved.value : '';
                }

                if (doeInput) {
                    doeInput.value = doeSaved ? doeSaved.value : '';
                }

                if (poeInput) {
                    poeInput.value = poeSaved ? poeSaved.value : '';
                }

                if (lcnsInput) {
                    lcnsInput.value = lcnsSaved ? lcnsSaved.value : '';
                }

                if (vldtyInput) {
                    vldtyInput.value = vldtySaved ? vldtySaved.value : '';
                }
            } else {
                const csvcValue = document.getElementById(`cse-saved-csvc-${i}`).value;
                const rtngValue = document.getElementById(`cse-saved-rtng-${i}`).value;
                const doeValue = document.getElementById(`cse-saved-doe-${i}`).value;
                const poeValue = document.getElementById(`cse-saved-poe-${i}`).value;
                const lcnsValue = document.getElementById(`cse-saved-lcns-${i}`).value;
                const vldtyValue = document.getElementById(`cse-saved-vldty-${i}`).value;

                addCivilService(i, csvcValue, rtngValue, doeValue, poeValue, lcnsValue, vldtyValue);
            }
        }
    }

    function addCivilService(civilServiceIndex, csvcValue, rtngValue, doeValue, poeValue, lcnsValue, vldtyValue) {
        const newField = document.createElement('div');
        newField.innerHTML = `
            <div class="row" id="civil-${civilServiceIndex}">
                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                    <label class="form-label" for="csvc-${civilServiceIndex}"><h5>${civilServiceIndex}. Career Service</h5> <small class="form-text text-muted pb-0">(RA 1080 (Board/ Bar) Under Special LAWS/ CES/ CSEE Barangay Eligibility / Drivers License)</small></label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="csvc-${civilServiceIndex}" placeholder="Career Service" name="cse_career_service_${civilServiceIndex}" value="${csvcValue}" required>
                        <button class="btn btn-danger" type="button" id="${civilServiceIndex}"><i class="feather icon-minus" id="${civilServiceIndex}"></i></button>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="rtng-${civilServiceIndex}">Rating</label>
                    <input type="number" step="0.1" id="rtng-${civilServiceIndex}" class="form-control" placeholder="Rating" name="cse_rating_${civilServiceIndex}" value="${rtngValue}" required>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="doe-${civilServiceIndex}">Date of Examination / Conferment</label>
                    <input class="form-control" type="date" id="doe-${civilServiceIndex}" value="${doeValue}" name="cse_examination_date_${civilServiceIndex}">
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                    <label class="form-label" for="poe-${civilServiceIndex}">Place of Examination / Conferment</label>
                    <input type="text" class="form-control" id="poe-${civilServiceIndex}" placeholder="Place of Examination / Conferment" name="cse_examination_place_${civilServiceIndex}" value="${poeValue}" required>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="lcns-${civilServiceIndex}">License Number</label>
                    <input type="number" step="0.1" id="lcns-${civilServiceIndex}" class="form-control" placeholder="License Number" name="cse_license_number_${civilServiceIndex}" value="${lcnsValue}" required>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="vldty-${civilServiceIndex}">Date of Validity</label>
                    <input class="form-control" type="date" id="vldty-${civilServiceIndex}" value="${vldtyValue}" name="cse_license_validity_${civilServiceIndex}" required>
                </div>
            </div>
        `;
        civilServiceBody.appendChild(newField);
        civilServiceCount.value = civilServiceIndex;

        const civilServiceFocus = newField.querySelector('input');
        if (civilServiceFocus) {
            civilServiceFocus.focus();
        }
    }

    civilServiceAddButton.addEventListener('click', function() {
        if (civilServiceIndex < civilServiceMaxFields) {
            civilServiceIndex++;
            const csvcValue = '';
            const rtngValue = '';
            const doeValue = currentDate;
            const poeValue = '';
            const lcnsValue = '';
            const vldtyValue = currentDate;

            addCivilService(civilServiceIndex, csvcValue, rtngValue, doeValue, poeValue, lcnsValue, vldtyValue);
        }
    });

    civilServiceBody.addEventListener('click', function(event) {
        const civilServiceBodyIndex = parseInt(event.target.id);
        if (civilServiceIndex == civilServiceBodyIndex) {
            const civilServiceElementRemove = document.getElementById("civil-" + civilServiceBodyIndex);
            if (civilServiceElementRemove) {
                civilServiceElementRemove.remove(); 
                civilServiceIndex--;
                civilServiceCount.value = civilServiceIndex;
            }
        }
    });
});



// [ PDS Work Experience ]
document.addEventListener("DOMContentLoaded", function () {
    const workexpSavedCountHidden = document.getElementById('work-experience-count');
    const workExperienceCount = document.getElementById('work-experience-count');
    const workExperienceBody = document.getElementById('work-experience-background');
    const workExperienceAddButton = document.getElementById('add-work-experience');
    const workExperienceMaxFields = 8;

    let workExperienceIndex = workExperienceCount.value;
    let workexpSavedCount = workexpSavedCountHidden.value;
    let currentDate = new Date().toISOString().split('T')[0];

    if (workexpSavedCount >= 1) {
        for (let i = 1; i <= workexpSavedCount; i++){
            console.log(i + " Displayed Work Experience");

            if (i == 1) {
                const pstnSaved = document.getElementById(`wrkexp-saved-pstn-${i}`);
                const inclsvdtfromSaved = document.getElementById(`wrkexp-saved-inclsvdtfrom-${i}`);
                const inclsvdttoSaved = document.getElementById(`wrkexp-saved-inclsvdtto-${i}`);
                const cmpnySaved = document.getElementById(`wrkexp-saved-cmpny-${i}`);
                const mthlyslrySaved = document.getElementById(`wrkexp-saved-mthlyslry-${i}`);
                const incrmntSaved = document.getElementById(`wrkexp-saved-incrmnt-${i}`);
                const sttsSaved = document.getElementById(`wrkexp-saved-stts-${i}`);
                const srvcSaved = document.getElementById(`wrkexp-saved-srvc-${i}`);

                const pstnInput = document.getElementById(`pstn-${i}`);
                const inclsvdtfromInput = document.getElementById(`inclsvdtfrom-${i}`);
                const inclsvdttoInput = document.getElementById(`inclsvdtto-${i}`);
                const cmpnyInput = document.getElementById(`cmpny-${i}`);
                const mthlyslryInput = document.getElementById(`mthlyslry-${i}`);
                const incrmntInput = document.getElementById(`incrmnt-${i}`);
                const sttsInput = document.getElementById(`stts-${i}`);
                const srvcSelect = document.getElementById(`srvc-select-${i}`);
                const srvcHidden = document.getElementById(`srvc-hidden-${i}`);

                if (pstnInput) {
                    pstnInput.value = pstnSaved ? pstnSaved.value : '';
                }

                if (inclsvdtfromInput) {
                    inclsvdtfromInput.value = inclsvdtfromSaved ? inclsvdtfromSaved.value : '';
                }

                if (inclsvdttoInput) {
                    inclsvdttoInput.value = inclsvdttoSaved ? inclsvdttoSaved.value : '';
                }

                if (cmpnyInput) {
                    cmpnyInput.value = cmpnySaved ? cmpnySaved.value : '';
                }

                if (mthlyslryInput) {
                    mthlyslryInput.value = mthlyslrySaved ? mthlyslrySaved.value : '';
                }

                if (incrmntInput) {
                    incrmntInput.value = incrmntSaved ? incrmntSaved.value : '';
                }

                if (sttsInput) {
                    sttsInput.value = sttsSaved ? sttsSaved.value : '';
                }

                if (srvcSelect) {
                    srvcHidden.value = srvcSaved.value;
                    srvcSelect.value = srvcSaved.value;
                    srvcSelect.addEventListener("change", function () {
                        srvcHidden.value = srvcSelect.value;
                    });
                }
            } else {
                const pstnValue = document.getElementById(`wrkexp-saved-pstn-${i}`).value;
                const inclsvdtfromValue = document.getElementById(`wrkexp-saved-inclsvdtfrom-${i}`).value;
                const inclsvdttoValue = document.getElementById(`wrkexp-saved-inclsvdtto-${i}`).value;
                const cmpnyValue = document.getElementById(`wrkexp-saved-cmpny-${i}`).value;
                const mthlyslryValue = document.getElementById(`wrkexp-saved-mthlyslry-${i}`).value;
                const incrmntValue = document.getElementById(`wrkexp-saved-incrmnt-${i}`).value;
                const sttsValue = document.getElementById(`wrkexp-saved-stts-${i}`).value;
                const srvcValue = document.getElementById(`wrkexp-saved-srvc-${i}`).value;

                addWorkExperience(i, pstnValue, inclsvdtfromValue, inclsvdttoValue, cmpnyValue, mthlyslryValue, incrmntValue, sttsValue, srvcValue);
                const srvcHidden = document.getElementById(`srvc-hidden-${i}`);
                const srvcSelect = document.getElementById(`srvc-select-${i}`);

                srvcHidden.value = srvcValue;
                srvcSelect.value = srvcValue;
                srvcSelect.addEventListener("change", function () {
                    srvcHidden.value = srvcSelect.value;
                });
            }
        }
    }

    function addWorkExperience(workExperienceIndex, pstnValue, inclsvdtfromValue, inclsvdttoValue,  cmpnyValue, mthlyslryValue, incrmntValue, sttsValue, srvcValue) {
        const newField = document.createElement('div');
        newField.innerHTML = `
            <div class="row" id="work-${workExperienceIndex}">
                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                    <label class="form-label" for="pstn-${workExperienceIndex}">
                        <h5>${workExperienceIndex}. Position Title </h5>
                        <small class="form-text text-muted">(Write in full/Do not abbreviate)</small>
                    </label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="pstn-${workExperienceIndex}" placeholder="Position Title" name="workexp_position_title_${workExperienceIndex}" value="${pstnValue}" required>
                        <button class="btn btn-danger" type="button" id="${workExperienceIndex}"><i class="feather icon-minus" id="${workExperienceIndex}"></i></button>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="inclsvdt-${workExperienceIndex}">Inclusive Dates</label>
                    <div class="input-daterange input-group" id="inclsvdt-${workExperienceIndex}">
                        <input class="form-control" type="date" value="${inclsvdtfromValue}" name="workexp_inclusivefrom_${workExperienceIndex}">
                        <span class="input-group-text">to</span>
                        <input class="form-control" type="date" value="${inclsvdttoValue}" name="workexp_inclusiveto_${workExperienceIndex}">
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="cmpny-${workExperienceIndex}">Department / Agency / Office / Company</label>
                    <input type="text" class="form-control" id="cmpny-${workExperienceIndex}" placeholder="Department / Agency / Office / Company" name="workexp_company_${workExperienceIndex}" value="${cmpnyValue}">
                </div>

            
                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="mthlyslry-${workExperienceIndex}">Monthly Salary</label>
                    <input type="number" step="0.1" class="form-control" id="mthlyslry-${workExperienceIndex}" placeholder="Monthly Salary" name="workexp_monthly_salary_${workExperienceIndex}" value="${mthlyslryValue}">
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="incrmnt-">Salary / Job / Pay Grade & Step / Increment</label>
                    <input type="text" class="form-control" id="incrmnt-${workExperienceIndex}" placeholder="Highest Level" name="workexp_increment_${workExperienceIndex}" value="${incrmntValue}">
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="stts-${workExperienceIndex}">Status of Appointment</label>
                    <input type="text" class="form-control" id="stts-${workExperienceIndex}" placeholder="Status of Appointment" name="workexp_status_${workExperienceIndex}" value="${sttsValue}">
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="srvc-select-${workExperienceIndex}">Government Service</label>
                    <select class="form-select" id="srvc-select-${workExperienceIndex}">
                        <option value="">Select</option>
                        <option value="No">No</option>
                        <option value="Yes">Yes</option>
                    </select>
                </div>
                <input type="hidden" name="workexp_govservice_${workExperienceIndex}" id="srvc-hidden-${workExperienceIndex}" value"${srvcValue}">
            </div>
        `;
        workExperienceBody.appendChild(newField);
        workExperienceCount.value = workExperienceIndex;

        const workExperienceFocus = newField.querySelector('input');
        if (workExperienceFocus) {
            workExperienceFocus.focus();
        }
    }

    workExperienceAddButton.addEventListener('click', function() {
        if (workExperienceIndex < workExperienceMaxFields) {
            workExperienceIndex++;
            const pstnValue = '';
            const inclsvdtfromValue = currentDate;
            const inclsvdttoValue = currentDate;
            const cmpnyValue = '';
            const mthlyslryValue = '';
            const incrmntValue = '';
            const sttsValue = '';
            const srvcValue = '';
            addWorkExperience(workExperienceIndex, pstnValue, inclsvdtfromValue, inclsvdttoValue, cmpnyValue, mthlyslryValue, incrmntValue, sttsValue, srvcValue);
        }
    });

    workExperienceBody.addEventListener('click', function(event) {
        const workExperienceBodyIndex = parseInt(event.target.id);
        if (workExperienceIndex == workExperienceBodyIndex) {
            const workExperienceElementRemove = document.getElementById("work-" + workExperienceBodyIndex);
            if (workExperienceElementRemove) {
                workExperienceElementRemove.remove(); 
                workExperienceIndex--;
                workExperienceCount.value = workExperienceIndex;
            }
        } 
    });
});



// [ PDS Voluntary Work ]
document.addEventListener("DOMContentLoaded", function () {
    const vlntryworkSavedCountHidden = document.getElementById('vlntrywork-saved-count');
    const voluntaryWorkCount = document.getElementById('voluntary-work-count');
    const voluntaryWorkBody = document.getElementById('voluntary-work-background');
    const voluntaryWorkAddButton = document.getElementById('add-voluntary-work');
    const voluntaryWorkMaxFields = 8;

    let voluntaryWorkIndex = voluntaryWorkCount.value;
    let vlntryworkSavedCount = vlntryworkSavedCountHidden.value;
    let currentDate = new Date().toISOString().split('T')[0];

    if (vlntryworkSavedCount >= 1) {
        for (let i = 1; i <= vlntryworkSavedCount; i++){
            console.log(i + " Displayed Voluntary Work");
            if (i == 1) {
                const orgnztnSaved = document.getElementById(`vlntrywork-saved-orgnztn-${i}`);
                const vwinclsvdtfromSaved = document.getElementById(`vlntrywork-saved-vwinclsvdtfrom-${i}`);
                const vwinclsvdttoSaved = document.getElementById(`vlntrywork-saved-vwinclsvdtto-${i}`);
                const nmbrhrsSaved = document.getElementById(`vlntrywork-saved-nmbrhrs-${i}`);
                const ntrwrkSaved = document.getElementById(`vlntrywork-saved-ntrwrk-${i}`);

                const orgnztnInput = document.getElementById(`orgnztn-${i}`);
                const vwinclsvdtfromInput = document.getElementById(`vwinclsvdtfrom-${i}`);
                const vwinclsvdttoInput = document.getElementById(`vwinclsvdtto-${i}`);
                const nmbrhrsInput = document.getElementById(`nmbrhrs-${i}`);
                const ntrwrkInput = document.getElementById(`ntrwrk-${i}`);

                if (orgnztnInput) {
                    orgnztnInput.value = orgnztnSaved ? orgnztnSaved.value : '';
                }

                if (vwinclsvdtfromInput) {
                    vwinclsvdtfromInput.value = vwinclsvdtfromSaved ? vwinclsvdtfromSaved.value : '';
                }

                if (vwinclsvdttoInput) {
                    vwinclsvdttoInput.value = vwinclsvdttoSaved ? vwinclsvdttoSaved.value : '';
                }

                if (nmbrhrsInput) {
                    nmbrhrsInput.value = nmbrhrsSaved ? nmbrhrsSaved.value : '';
                }

                if (ntrwrkInput) {
                    ntrwrkInput.value = ntrwrkSaved ? ntrwrkSaved.value : '';
                }
            } else {
                const orgnztnValue = document.getElementById(`vlntrywork-saved-orgnztn-${i}`).value;
                const vwinclsvdtfromValue = document.getElementById(`vlntrywork-saved-vwinclsvdtfrom-${i}`).value;
                const vwinclsvdttoValue = document.getElementById(`vlntrywork-saved-vwinclsvdtto-${i}`).value;
                const nmbrhrsValue = document.getElementById(`vlntrywork-saved-nmbrhrs-${i}`).value;
                const ntrwrkValue = document.getElementById(`vlntrywork-saved-ntrwrk-${i}`).value;

                addVoluntaryWork(voluntaryWorkIndex, orgnztnValue, vwinclsvdtfromValue, vwinclsvdttoValue, nmbrhrsValue, ntrwrkValue);
            }
        }
    }

    function addVoluntaryWork(voluntaryWorkIndex, orgnztnValue, vwinclsvdtfromValue, vwinclsvdttoValue, nmbrhrsValue, ntrwrkValue) {
        const newField = document.createElement('div');
        newField.innerHTML = `
            <div class="row" id="voluntary-${voluntaryWorkIndex}">
                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                    <label class="form-label" for="orgnztn-${voluntaryWorkIndex}">
                    <h5>${voluntaryWorkIndex}. Name & Adress of Organization</h5> 
                    <small class="form-text text-muted">(Write in full / Do not abbreviate)</small></label>

                    <div class="input-group">
                        <input type="text" class="form-control" id="orgnztn-${voluntaryWorkIndex}" placeholder="Name & Adress of Organization" name="vltrywork_oganization_${voluntaryWorkIndex}" value="${orgnztnValue}" required>
                        <button class="btn btn-danger" type="button" id="${voluntaryWorkIndex}"><i class="feather icon-minus" id="${voluntaryWorkIndex}"></i></button>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="vw-inclsvdt-${voluntaryWorkIndex}">Inclusive Dates</label>
                    <div class="input-daterange input-group" id="vw-inclsvdt-${voluntaryWorkIndex}">
                        <input class="form-control" type="date" value="${vwinclsvdtfromValue}" id="vw-inclsvdt-from-${voluntaryWorkIndex}" name="vltrywork_inclusivefrom_${voluntaryWorkIndex}">
                        <span class="input-group-text">to</span>
                        <input class="form-control" type="date" value="${vwinclsvdttoValue}" id="vw-inclsvdt-to-${voluntaryWorkIndex}" name="vltrywork_inclusiveto_${voluntaryWorkIndex}">
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="nmbrhrs-${voluntaryWorkIndex}">Number of Hours</label>
                    <input type="number" class="form-control" id="nmbrhrs-${voluntaryWorkIndex}" placeholder="Number of Hours" name="vltrywork_hours_${voluntaryWorkIndex}" value="${nmbrhrsValue}">
                </div>

                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                    <label class="form-label" for="ntrwrk-${voluntaryWorkIndex}">Position / Nature of Work</label>
                    <input type="text" class="form-control" id="ntrwrk-${voluntaryWorkIndex}" placeholder="Position / Nature of Work" name="vltrywork_nature_of_work_${voluntaryWorkIndex}" value="${ntrwrkValue}">
                </div>
            </div>
        `;
        voluntaryWorkBody.appendChild(newField);
        voluntaryWorkCount.value = voluntaryWorkIndex;

        const voluntaryWorkFocus = newField.querySelector('input');
        if (voluntaryWorkFocus) {
            voluntaryWorkFocus.focus();
        }
    }

    voluntaryWorkAddButton.addEventListener('click', function() {
        if (voluntaryWorkIndex < voluntaryWorkMaxFields) {
            voluntaryWorkIndex++;

            const orgnztnValue = '';
            const vwinclsvdtfromValue = currentDate;
            const vwinclsvdttoValue = currentDate;
            const nmbrhrsValue = '';
            const ntrwrkValue = '';
            addVoluntaryWork(voluntaryWorkIndex, orgnztnValue, vwinclsvdtfromValue, vwinclsvdttoValue, nmbrhrsValue, ntrwrkValue);
        }
    });

    voluntaryWorkBody.addEventListener('click', function(event) {
        const voluntaryWorkBodyIndex = parseInt(event.target.id);
        if (voluntaryWorkIndex == voluntaryWorkBodyIndex) {
            const voluntaryWorkElementRemove = document.getElementById("voluntary-" + voluntaryWorkBodyIndex);
            if (voluntaryWorkElementRemove) {
                voluntaryWorkElementRemove.remove(); 
                voluntaryWorkIndex--;
                voluntaryWorkCount.value = voluntaryWorkIndex;
            }
        } 
    });
});

// [ PDS Program Work ]
document.addEventListener("DOMContentLoaded", function () {
    const programSaveCountHidden = document.getElementById('program-saved-count');
    const programCount = document.getElementById('program-count');
    const programBody = document.getElementById('program-background');
    const programAddButton = document.getElementById('add-program');
    const programMaxFields = 8;

    let programIndex = programCount.value;
    let programSaveCount = programSaveCountHidden.value;
    let currentDate = new Date().toISOString().split('T')[0];

    if (programSaveCount >= 1) {
        for (let i = 1; i <= programSaveCount; i++){
            console.log(i + " Displayed Training Program");
            if (i == 1) {
                const trngprgmSaved = document.getElementById(`program-saved-trngprgm-${i}`);
                const tpinclsvdtfromSaved = document.getElementById(`program-saved-tpinclsvdtfrom-${i}`);
                const tpinclsvdttoSaved = document.getElementById(`program-saved-tpinclsvdtto-${i}`);
                const tpnmbrhrsSaved = document.getElementById(`program-saved-tpnmbrhrs-${i}`);
                const typldSaved = document.getElementById(`program-saved-typld-${i}`);
                const spnsrdbySaved = document.getElementById(`program-saved-spnsrdby-${i}`);

                const trngprgmInput = document.getElementById(`trngprgm-${i}`);
                const tpinclsvdtfromInput = document.getElementById(`tpinclsvdtfrom-${i}`);
                const tpinclsvdttoInput = document.getElementById(`tpinclsvdtto-${i}`);
                const tpnmbrhrsInput = document.getElementById(`tpnmbrhrs-${i}`);
                const typldInput = document.getElementById(`typld-${i}`);
                const spnsrdbyInput = document.getElementById(`spnsrdby-${i}`);

                if (trngprgmInput) {
                    trngprgmInput.value = trngprgmSaved ? trngprgmSaved.value : '';
                }

                if (tpinclsvdtfromInput) {
                    tpinclsvdtfromInput.value = tpinclsvdtfromSaved ? tpinclsvdtfromSaved.value : '';
                }

                if (tpinclsvdttoInput) {
                    tpinclsvdttoInput.value = tpinclsvdttoSaved ? tpinclsvdttoSaved.value : '';
                }

                if (tpnmbrhrsInput) {
                    tpnmbrhrsInput.value = tpnmbrhrsSaved ? tpnmbrhrsSaved.value : '';
                }

                if (typldInput) {
                    typldInput.value = typldSaved ? typldSaved.value : '';
                }

                if (spnsrdbyInput) {
                    spnsrdbyInput.value = spnsrdbySaved ? spnsrdbySaved.value : '';
                }
            } else {
                const trngprgmValue = document.getElementById(`program-saved-trngprgm-${i}`).value;
                const tpinclsvdtfromValue = document.getElementById(`program-saved-tpinclsvdtfrom-${i}`).value;
                const tpinclsvdttoValue = document.getElementById(`program-saved-tpinclsvdtto-${i}`).value;
                const tpnmbrhrsValue = document.getElementById(`program-saved-tpnmbrhrs-${i}`).value;
                const typldValue = document.getElementById(`program-saved-typld-${i}`).value;
                const spnsrdbyValue = document.getElementById(`program-saved-spnsrdby-${i}`).value;

                addTrainingProgram(programIndex, trngprgmValue, tpinclsvdtfromValue, tpinclsvdttoValue, tpnmbrhrsValue, typldValue, spnsrdbyValue);
            }
        }
    }

    function addTrainingProgram(programIndex, trngprgmValue, tpinclsvdtfromValue, tpinclsvdttoValue, tpnmbrhrsValue, typldValue, spnsrdbyValue) {
        const newField = document.createElement('div');
        newField.innerHTML = `
            <div class="row" id="program-${programIndex}">
                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                    <label class="form-label" for="trngprgm-${programIndex}">
                        <h5>${programIndex}. Title of Learning and Development (L&D) Interventions/Training Programs</h5> 
                        <small class="form-text text-muted">(Write in full / Do not abbreviate)</small>
                    </label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="trngprgm-${programIndex}" placeholder="Title of Learning and Development (L&D) Interventions/Training Programs" name="prgm_title_${programIndex}" value="${trngprgmValue}" required>
                        <button class="btn btn-danger" type="button" id="${programIndex}"><i class="feather icon-minus" id="${programIndex}"></i></button>
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="tpinclsvdt-${programIndex}">Inclusive Dates</label>
                    <div class="input-daterange input-group" id="tpinclsvdt-${programIndex}">
                        <input class="form-control" type="date" value="${tpinclsvdtfromValue}" id="tpinclsvdtfrom-${programIndex}" name="prgm_inclusivefrom_${programIndex}">
                        <span class="input-group-text">to</span>
                        <input class="form-control" type="date" value="${tpinclsvdttoValue}" id="tpinclsvdtto-${programIndex}" name="prgm_inclusiveto_${programIndex}">
                    </div>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="tpnmbrhrs-${programIndex}">Number of Hours</label>
                    <input type="number" class="form-control" id="tpnmbrhrs-${programIndex}" placeholder="Number of Hours" name="prgm_hours_${programIndex}" value="${tpnmbrhrsValue}">
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="typld-${programIndex}">Type of LD <small class="form-text text-muted">(Managerial/Supervisory/Techinical/etc)</small></label>
                    <input type="text" class="form-control" id="typld-${programIndex}" placeholder="Type of LD" name="prgm_type_of_ld_${programIndex}" value="${typldValue}">
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="spnsrdby-${programIndex}">Conducted / Sponsored By <small class="form-text text-muted">(Write in full / Do not abbreviate)</small></label>
                    <input type="text" class="form-control" id="spnsrdby-${programIndex}" placeholder="Conducted / Sponsored By" name="prgm_sponsored_by_${programIndex}" value="${spnsrdbyValue}">
                </div>
            </div>
        `;
        programBody.appendChild(newField);
        programCount.value = programIndex;

        const programFocus = newField.querySelector('input');
        if (programFocus) {
            programFocus.focus();
        }
    }

    programAddButton.addEventListener('click', function() {
        if (programIndex < programMaxFields) {
            programIndex++;

            const trngprgmValue = '';
            const tpinclsvdtfromValue = currentDate;
            const tpinclsvdttoValue = currentDate;
            const tpnmbrhrsValue = '';
            const typldValue = '';
            const spnsrdbyValue = '';
            addTrainingProgram(programIndex, trngprgmValue, tpinclsvdtfromValue, tpinclsvdttoValue, tpnmbrhrsValue, typldValue, spnsrdbyValue);
        }
    });

    programBody.addEventListener('click', function(event) {
        const programBodyIndex = parseInt(event.target.id);
        if (programIndex == programBodyIndex) {
            const programElementRemove = document.getElementById("program-" + programBodyIndex);
            if (programElementRemove) {
                programElementRemove.remove(); 
                programIndex--;
                programCount.value = programIndex;
            }
        }
    });
});

// [ PDS Skills ]
document.addEventListener("DOMContentLoaded", function () {
    const skillSavedCountHidden = document.getElementById('skill-saved-count');
    const skillCount = document.getElementById('skill-count');
    const skillBody = document.getElementById('skill-background');
    const skillAddButton = document.getElementById('add-skill');
    const skillMaxFields = 12;

    let skillIndex = skillCount.value;
    let skillSavedCount = skillSavedCountHidden.value;

    for (let i = 1; i <= skillSavedCount; i++){
        console.log(i + " Displayed Skill");
        if (i === 1) {
            const skillSaved = document.getElementById(`skill-saved-${i}`);
            const skillsInput = document.getElementById(`othrinfo-skills-${i}`);

            if (skillsInput) {
                skillsInput.value = skillSaved ? skillSaved.value : '';
            }

        } else {
            const skillValue = document.getElementById(`skill-saved-${i}`).value;
            addSkill(i, skillValue);
        }
    }

    function addSkill(skillIndex, skillValue) {
        const newField = document.createElement('div');
        newField.innerHTML = `
            <div class="row" id="skills-${skillIndex}">
                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                    <label class="form-label" for="othrinfo-skills-${skillIndex}">${skillIndex}. Special Skills and Hobbies</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="othrinfo-skills-${skillIndex}" placeholder="Special Skills and Hobbies" name="othrinfo_skill_${skillIndex}" value="${skillValue}" required>
                        <button class="btn btn-danger remove-skill" type="button" id="${skillIndex}"><i class="feather icon-minus" id="${skillIndex}"></i></button>
                    </div>
                </div>
            </div>
        `;
        skillBody.appendChild(newField);
        skillCount.value = skillIndex;

        const skillFocus = newField.querySelector('input');
        if (skillFocus) {
            skillFocus.focus();
        }
    }

    skillAddButton.addEventListener('click', function() {
        if (skillIndex < skillMaxFields) {
            skillIndex++;
            skillValue = '';
            addSkill(skillIndex, skillValue);
        }
    });

    skillBody.addEventListener('click', function(event) {
        const skillInputIndex = parseInt(event.target.id);
        if (skillIndex == skillInputIndex) {
            const skillElementRemove = document.getElementById(`skills-${skillIndex}`);
            if (skillElementRemove) {
                skillElementRemove.remove();
                skillIndex--;
                skillCount.value = skillIndex;
            }
        }
    });
});


// [ PDS Recognitions ]
document.addEventListener("DOMContentLoaded", function () {
    const recognitionSavedCountHidden = document.getElementById('recognition-saved-count');
    const recognitionCount = document.getElementById('recognition-count');
    const recognitionBody = document.getElementById('recognition-background');
    const recognitionAddButton = document.getElementById('add-recognition');
    const recognitionMaxFields = 12;

    let recognitionIndex = recognitionCount.value;
    let recognitionSavedCount = recognitionSavedCountHidden.value;

    for (let i = 1; i <= recognitionSavedCount; i++){
        console.log(i + " Displayed Recognitions");
        if (i === 1) {
            const recognitionSaved = document.getElementById(`recognition-saved-${i}`);
            const recognitionsInput = document.getElementById(`othrinfo-recognition-${i}`);

            if (recognitionsInput) {
                recognitionsInput.value = recognitionSaved ? recognitionSaved.value : '';
            }

        } else {
            const recognitionValue = document.getElementById(`recognition-saved-${i}`).value;
            addRecognition(i, recognitionValue);
        }
    }

    function addRecognition(recognitionIndex, recognitionValue) {
        const newField = document.createElement('div');
        newField.innerHTML = `
        <div class="row" id="recognition-${recognitionIndex}">
            <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                <label class="form-label" for="othrinfo-recognition-${recognitionIndex}">${recognitionIndex}. Non-Academic Distintions / Recognitions</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="othrinfo-recognition-${recognitionIndex}" placeholder="Non-Academic Distintions / Recognitions" name="othrinfo_recognition_${recognitionIndex}" value="${recognitionValue}" required>
                    <button class="btn btn-danger remove-recognition" type="button" id="${recognitionIndex}"><i class="feather icon-minus" id="${recognitionIndex}"></i></button>
                </div>
            </div>
        </div>
        `;
        recognitionBody.appendChild(newField);
        recognitionCount.value = recognitionIndex;

        const recognitionFocus = newField.querySelector('input');
        if (recognitionFocus) {
            recognitionFocus.focus();
        }
    }

    recognitionAddButton.addEventListener('click', function() {
        if (recognitionIndex < recognitionMaxFields) {
            recognitionIndex++;
            recognitionValue = '';
            addRecognition(recognitionIndex, recognitionValue);
        }
    });

    recognitionBody.addEventListener('click', function(event) {
        const recognitionInputIndex = parseInt(event.target.id);
        if (recognitionIndex == recognitionInputIndex) {
            const recognitionElemetRemove = document.getElementById(`recognition-${recognitionIndex}`);
            if (recognitionElemetRemove) {
                recognitionElemetRemove.remove();
                recognitionIndex--;
                recognitionCount.value = recognitionIndex;
            }
        }
    });
});


// [ PDS Memberships ]
document.addEventListener("DOMContentLoaded", function () {
    const membershipSavedCountHidden = document.getElementById('membership-saved-count');
    const membershipCount = document.getElementById('membership-count');
    const membershipBody = document.getElementById('membership-background');
    const membershipAddButton = document.getElementById('add-membership');
    const membershipMaxFields = 12;

    let membershipIndex = membershipCount.value;
    let membershipSavedCount = membershipSavedCountHidden.value;

    for (let i = 1; i <= membershipSavedCount; i++){
        console.log(i + " Displayed Recognitions");
        if (i === 1) {
            const membershipSaved = document.getElementById(`membership-saved-${i}`);
            const membershipsInput = document.getElementById(`othrinfo-membership-${i}`);

            if (membershipsInput) {
                membershipsInput.value = membershipSaved ? membershipSaved.value : '';
            }

        } else {
            const membershipValue = document.getElementById(`membership-saved-${i}`).value;
            addMembership(i, membershipValue);
        }
    }

    function addMembership(membershipIndex, membershipValue) {
        const newField = document.createElement('div');
        newField.innerHTML = `
            <div class="row" id="membership-${membershipIndex}">
                <div class="col-sm-12 col-md-12 col-lg-12 mb-3">
                    <label class="form-label" for="othrinfo-membership-${membershipIndex}">${membershipIndex}. Memberships in Associations / Organization</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="othrinfo-membership-${membershipIndex}" placeholder="Memberships in Associations / Organization" name="othrinfo_membership_${membershipIndex}" value="${membershipValue}" required>
                        <button class="btn btn-danger remove-membership" type="button" id="${membershipIndex}"><i class="feather icon-minus" id="${membershipIndex}"></i></button>
                    </div>
                </div>
            </div>
        `;
        membershipBody.appendChild(newField);
        membershipCount.value = membershipIndex;

        const membershipFocus = newField.querySelector('input');
        if (membershipFocus) {
            membershipFocus.focus();
        }
    }

    membershipAddButton.addEventListener('click', function() {
        if (membershipIndex < membershipMaxFields) {
            membershipIndex++;
            membershipValue = '';
            addMembership(membershipIndex, membershipValue);
        }
    });

    membershipBody.addEventListener('click', function(event) {
        const membershipInputIndex = parseInt(event.target.id);
        if (membershipIndex == membershipInputIndex) {
            const membershipElementRemove = document.getElementById(`membership-${membershipIndex}`);
            if (membershipElementRemove) {
                membershipElementRemove.remove();
                membershipIndex--;
                membershipCount.value = membershipIndex;
            }
        }
    });
});


// [ PDS Reference ]
document.addEventListener("DOMContentLoaded", function () {
    const rfrncSavedCountHidden = document.getElementById('reference-saved-count');
    const refrenceWorkCount = document.getElementById('reference-count');
    const referenceBody = document.getElementById('reference-background');
    const referenceAddButton = document.getElementById('add-reference');
    const referenceMaxFields = 3;

    let referenceIndex = refrenceWorkCount.value;
    let rfrncSavedCount = rfrncSavedCountHidden.value;

    if (rfrncSavedCount >= 1) {
        for (let i = 1; i <= rfrncSavedCount; i++){
            console.log(i + " Displayed References");
            if (i == 1) {
                const rfrncnameSaved = document.getElementById(`rfrnc-saved-name-${i}`);
                const rfrncaddSaved = document.getElementById(`rfrnc-saved-address-${i}`);
                const rfrnctlphnSaved = document.getElementById(`rfrnc-saved-telephone-${i}`);

                const rfrncnameInput = document.getElementById(`rfrncnm-${i}`);
                const rfrncaddInput = document.getElementById(`rfrncadd-${i}`);
                const rfrnctlphnInput = document.getElementById(`rfrnctlphn-${i}`);

                if (rfrncnameInput) {
                    rfrncnameInput.value = rfrncnameSaved ? rfrncnameSaved.value : '';
                }

                if (rfrncaddInput) {
                    rfrncaddInput.value = rfrncaddSaved ? rfrncaddSaved.value : '';
                }

                if (rfrnctlphnInput) {
                    rfrnctlphnInput.value = rfrnctlphnSaved ? rfrnctlphnSaved.value : '';
                }
            } else {
                const rfrncnameValue = document.getElementById(`rfrnc-saved-name-${i}`).value;
                const rfrncaddValue = document.getElementById(`rfrnc-saved-address-${i}`).value;
                const rfrnctlphnValue = document.getElementById(`rfrnc-saved-telephone-${i}`).value;

                addReference(i, rfrncnameValue, rfrncaddValue, rfrnctlphnValue);
            }
        }
    }

    function addReference(referenceIndex, rfrncnameValue, rfrncaddValue, rfrnctlphnValue) {
        const newField = document.createElement('div');
        newField.innerHTML = `
            <div class="row" id="voluntary-${referenceIndex}">
                <div class="col-sm-12 col-md-12 col-lg-12 mb-3 mt-3">
                    <label class="form-label" for="rfrncnm-1">
                        <h5>${referenceIndex}. Reference</h5></small>
                    </label>
                    <input type="text" class="form-control" id="rfrncnm-${referenceIndex}" placeholder="Name of Reference" name="final_reference_${referenceIndex}" value="${rfrncnameValue}" required>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="rfrncadd-${referenceIndex}">Address</label>
                    <input type="text" class="form-control" id="rfrncadd-${referenceIndex}" placeholder="Address" name="final_address_${referenceIndex}" value="${rfrncaddValue}" required> 
                </div>

                <div class="col-sm-12 col-md-6 col-lg-6 mb-3">
                    <label class="form-label" for="rfrnctlphn-${referenceIndex}">Telephone No.</label>
                    <input type="number" class="form-control" id="rfrnctlphn-${referenceIndex}" placeholder="Telephone No." name="final_telephone_${referenceIndex}" value="${rfrnctlphnValue}" required>
                </div>
            </div>
        `;
        referenceBody.appendChild(newField);
        refrenceWorkCount.value = referenceIndex;

        const referenceFocus = newField.querySelector('input');
        if (referenceFocus) {
            referenceFocus.focus();
        }
    }

    referenceAddButton.addEventListener('click', function() {
        if (referenceIndex < referenceMaxFields) {
            referenceIndex++;

            const rfrncnameValue = '';
            const rfrncaddValue = '';
            const rfrnctlphnValue = '';
            addReference(referenceIndex, rfrncnameValue, rfrncaddValue, rfrnctlphnValue)
        }
    });

    referenceBody.addEventListener('click', function(event) {
        const referenceBodyIndex = parseInt(event.target.id);
        if (referenceIndex == referenceBodyIndex) {
            const referenceElementRemove = document.getElementById("voluntary-" + referenceBodyIndex);
            if (referenceElementRemove) {
                referenceElementRemove.remove(); 
                referenceIndex--;
                refrenceWorkCount.value = referenceIndex;
            }
        } 
    });
});

















