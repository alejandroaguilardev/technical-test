function createRow(label, value) {
    const tr = document.createElement("tr");
    const tdLabel = document.createElement("td");
    const tdValue = document.createElement("td");
    tdLabel.textContent = label;
    tdValue.textContent = value;
    tr.appendChild(tdLabel);
    tr.appendChild(tdValue);
    return tr;
}

function createContactTable(contact) {
    const table = document.createElement("table");
    table.classList.add("table", "table-bordered");

    const tbody = document.createElement("tbody");
    tbody.appendChild(createRow("Nombre:", contact.name));
    tbody.appendChild(createRow("Apellido:", contact.lastName));
    tbody.appendChild(createRow("Email:", contact.email));

    table.appendChild(tbody);
    return table;
}

function createButtons(contact, updateCallback, deleteCallback) {
    const updateButton = document.createElement("button");
    updateButton.textContent = "Actualizar";
    updateButton.classList.add("btn", "btn-primary", "mr-4");
    updateButton.addEventListener("click", () => updateCallback(contact.id, contact));

    const deleteButton = document.createElement("button");
    deleteButton.textContent = "Eliminar";
    deleteButton.classList.add("btn", "btn-danger", "ml-4");
    deleteButton.addEventListener("click", () => deleteCallback(contact.id));

    return [updateButton, deleteButton];
}

function createContactElement(contact, updateCallback, deleteCallback) {
    const contactElement = document.createElement("div");
    contactElement.classList.add("card", "mb-3");
    const cardBody = document.createElement("div");
    cardBody.classList.add("card-body");

    const contactTable = createContactTable(contact);
    cardBody.appendChild(contactTable);

    const [updateButton, deleteButton] = createButtons(contact, updateCallback, deleteCallback);
    cardBody.appendChild(updateButton);
    cardBody.appendChild(deleteButton);

    contactElement.appendChild(cardBody);

    return contactElement;
}
