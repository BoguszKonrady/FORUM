function expandImage(src) {
    // Tworzenie elementów modal
    var modal = document.createElement("div");
    modal.classList.add("modal");

    var modalContent = document.createElement("img");
    modalContent.classList.add("modal-content");
    modalContent.src = src;

    var closeBtn = document.createElement("span");
    closeBtn.classList.add("close");
    closeBtn.innerHTML = "&times;";
    closeBtn.onclick = function() {
        document.body.removeChild(modal);
    };

    // Dodanie elementów do modal
    modal.appendChild(modalContent);
    modal.appendChild(closeBtn);

    // Dodanie modal do dokumentu
    document.body.appendChild(modal);

    // Wyświetlenie modal
    modal.style.display = "block";
}