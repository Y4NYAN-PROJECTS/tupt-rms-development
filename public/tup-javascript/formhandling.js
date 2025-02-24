// document.addEventListener('DOMContentLoaded', () => {
//     const forms = document.querySelectorAll('form'); // Select all forms

//     forms.forEach(form => {
//         const formId = form.getAttribute('data-form-id') || 'default';
//         const inputs = form.querySelectorAll('input, textarea, select');
//         let firstEmptyInput = null;

//         inputs.forEach(input => {
//             const savedValue = localStorage.getItem(`${formId}-${input.name}`);
//             if (savedValue) {
//                 input.value = savedValue;
//             } else if (!firstEmptyInput && input.type !== 'hidden' && input.type !== 'submit') {
//                 firstEmptyInput = input;
//             }
//         });

//         if (firstEmptyInput) {
//             firstEmptyInput.focus();
//         }

//         inputs.forEach(input => {
//             input.addEventListener('input', () => {
//                 localStorage.setItem(`${formId}-${input.name}`, input.value);
//             });
//         });

//         form.addEventListener('submit', () => {
//             inputs.forEach(input => {
//                 localStorage.removeItem(`${formId}-${input.name}`);
//             });
//         });
//     });

// localStorage.clear();
// });
