const preview_rows = document.querySelectorAll('.preview-row');
const change_rows = document.querySelectorAll('.change-row');
const update_buttons = document.querySelectorAll('.update-button');
const cancel_buttons = document.querySelectorAll('.cancel-button');
const hiddenClass = 'hidden-row';

for (let i = 0; i < update_buttons.length; i++) {
    update_buttons[i].addEventListener('click', function() {
       preview_rows[i].classList.add(hiddenClass);
       change_rows[i].classList.remove(hiddenClass);
    });

    cancel_buttons[i].addEventListener('click', function () {
        preview_rows[i].classList.remove(hiddenClass);
        change_rows[i].classList.add(hiddenClass);
    });
}
