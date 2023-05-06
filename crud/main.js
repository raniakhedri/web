var sidebar = document.getElementById('sidebar');

function sidebarToggle() {
    if (sidebar.style.display === "none") {
        sidebar.style.display = "block";
    } else {
        sidebar.style.display = "none";
    }
}

var profileDropdown = document.getElementById('ProfileDropDown');

function profileToggle() {
    if (profileDropdown.style.display === "none") {
        profileDropdown.style.display = "block";
    } else {
        profileDropdown.style.display = "none";
    }
}


/**
 * ### Modals ###
 */

function toggleModal(action, elem_trigger)
{
    elem_trigger.addEventListener('click', function () {
        if (action == 'add') {
            let modal_id = this.dataset.modal;
            document.getElementById(`${modal_id}`).classList.add('modal-is-open');
        } else {
            // Automaticlly get the opned modal ID
            let modal_id = elem_trigger.closest('.modal-wrapper').getAttribute('id');
            document.getElementById(`${modal_id}`).classList.remove('modal-is-open');
        }
    });
}


// Check if there is modals on the page
if (document.querySelector('.modal-wrapper'))
{
    // Open the modal
    document.querySelectorAll('.modal-trigger').forEach(btn => {
        toggleModal('add', btn);
    });
    
    // close the modal
    document.querySelectorAll('.close-modal').forEach(btn => {
        toggleModal('remove', btn);
    });
}


// Attach event listener to all edit icons
document.querySelectorAll('.edit-trigger').forEach(btn => {
  btn.addEventListener('click', function() {
    // Get the table row element
    let row = this.closest('tr');

    // Get the data from the row cells
    let name = row.cells[0].textContent;
    let location = row.cells[1].textContent;
    let status = row.cells[2].textContent;
    let price = row.cells[3].textContent;

    // Populate the modal input fields with the data for editing
    let modal = document.getElementById('centeredFormModal');
    let nameInput = modal.querySelector('#grid-first-name');
    let locationInput = modal.querySelector('#location');
    let statusInput = modal.querySelector('#grid-last-name');
    
    nameInput.value = grid-first-name;
    locationInput.value = location;
    statusInput.value = grid-last-name;
  

    // Open the modal
    modal.classList.add('modal-is-open');
  });
});
