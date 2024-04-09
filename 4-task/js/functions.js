function createContact(event) {
    event.preventDefault();
    const formData = new FormData(this);

    fetch("ContactHandler.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            alert(data?.success ? data.success : data.error);
            this.reset();
            listContact();
        })
        .catch(error => {
            console.log(error);
            alert("Hubo un error al crear la operación de fetch. Por favor, inténtelo de nuevo más tarde.");
        });
}

function deleteContact(id) {
    const formData = new FormData();
    formData.append("id", id);
    formData.append("_method", "REMOVE");

    fetch("ContactHandler.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            alert(data?.success ? data.success : data.error);
            listContact();
        })
        .catch(error => {
            console.log(error);
            alert("Hubo un error al eliminar operación de fetch. Por favor, inténtelo de nuevo más tarde.");
        });
}

function updatePrepare(id, contact) {
    document.getElementById('id').value = contact.id;
    document.getElementById('name').value = contact.name;
    document.getElementById('lastName').value = contact.lastName;
    document.getElementById('email').value = contact.email;
    document.getElementById('_method').value = 'PUT';
}

function listContact() {
    fetch("ContactHandler.php")
        .then(response => response.json())
        .then(data => {
            const listContactElement = document.getElementById("list-contact");
            listContactElement.innerHTML = "";
            data.forEach(contact => {
                const contactElement = createContactElement(contact, updatePrepare, deleteContact);
                listContactElement.appendChild(contactElement);
            });
        })
        .catch(error => {
            console.error(error);
            alert("Hubo un error con la operación de fetch. Por favor, inténtelo de nuevo más tarde.");
        });
}