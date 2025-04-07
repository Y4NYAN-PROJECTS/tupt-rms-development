<!-- [ New Promotion ] -->
<div class="modal fade" id="newPromotion" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h3 class="modal-title">Promotion Details</h3>
                    <small>Fill the data to document promotion.</small>
                </div>
                <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/AdminController/SavePromotion" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="prmtn-plntl-select" class="form-label">Plantilla</label>
                                <select id="prmtn-plntl-select" class="form-select" name="prmtn_plantilla" required>
                                    <option value="">Select Plantilla</option>
                                    <?php foreach ($plantillas as $plantilla): ?>
                                        <option value="<?= $plantilla['plantilla_id'] ?>" data-plantilla-code="<?= $plantilla['plantilla_titlecode'] ?>">
                                            <?= $plantilla['plantilla_title'] ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Employee ID Number</label>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-text" id="prmtn-idnumber-text"></span>
                                        <input type="text" class="form-control" placeholder="00-0000" id="prmtn-idnumber" name="prmtn_idnumber" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label" for="prmtn-date">Date of Appointment</label>
                            <input type="date" class="form-control" id="prmtn-date" placeholder="Salary" name="prmtn_date" value="<?= $datenow ?>" max="<?= $datenow ?>" required />
                        </div>
                    </div>

                    <!-- [ Hidden Input/s ] -->
                    <input type="hidden" name="prmtn_fullidnumber" id="prmtn-idnumber-hidden" />
                    <input type="hidden" name="prmtn_accountid" value="<?= $promotion_accountid ?>">
                    <input type="hidden" name="prmtn_accountcode" value="<?= $promotion_accountcode ?>">

                </div>
                <div class="modal-footer justify-content-center">
                    <button class="btn px-5 btn-primary" type="submit" data-bs-dismiss="modal">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const plantillaSelect = document.getElementById('prmtn-plntl-select');
        const idnumberHidden = document.getElementById('prmtn-idnumber-hidden');
        const idnumberText = document.getElementById('prmtn-idnumber-text');
        const idnumberInput = document.getElementById('prmtn-idnumber');

        function updateIdNumberDisplay() {
            const selectedOption = plantillaSelect.options[plantillaSelect.selectedIndex];
            const plantillaCode = selectedOption.dataset.plantillaCode || "";

            idnumberText.textContent = plantillaCode ? `${plantillaCode}-` : "Select Plantilla";

            if (!plantillaCode) {
                idnumberInput.value = "";
            }

            idnumberHidden.value = plantillaCode ? `${plantillaCode}-${idnumberInput.value}` : "";
            idnumberInput.readOnly = !plantillaCode;
        }

        // For idnumber format
        function formatIdNumberInput(event) {
            const plantillaCode = idnumberText.textContent;
            let value = idnumberInput.value.replace(/[^0-9-]/g, '');

            idnumberInput.value = value;
            idnumberHidden.value = plantillaCode && value ? `${plantillaCode}${value}` : `${plantillaCode}`;
        }

        // For restrict key
        function restrictInvalidKeys(event) {
            const allowedKeys = ['Backspace', 'Delete', 'ArrowLeft', 'ArrowRight', 'Tab'];
            if (!/[\d-]/.test(event.key) && !allowedKeys.includes(event.key)) {
                event.preventDefault();
            }
        }

        updateIdNumberDisplay();

        plantillaSelect.addEventListener('change', updateIdNumberDisplay);
        idnumberInput.addEventListener('input', formatIdNumberInput);
        idnumberInput.addEventListener('keydown', restrictInvalidKeys);
    });
</script>