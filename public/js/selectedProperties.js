function addAttributes() {
    var optionList = document.getElementById("optionList");
    var selectedOptions = optionList.selectedOptions;
    var attributeList = document.getElementById("selectedOptions");
    var addProperties = document.getElementById("addProperties");

    for (var i = 0; i < selectedOptions.length; i++) {

        var nameLabel = document.createElement('label');
        nameLabel.setAttribute('for', 'pp' + selectedOptions[i].value)
        nameLabel.textContent = selectedOptions[i].innerText;
        attributeList.appendChild(nameLabel);
        var nameInput = document.createElement('input');
        nameInput.setAttribute('type', 'text');
        nameInput.setAttribute('placeholder', selectedOptions[i].innerText);
        nameInput.setAttribute('id', 'pp' + selectedOptions[i].value);
        nameInput.setAttribute('class', 'form-control');
        nameInput.setAttribute('name', 'pp' + selectedOptions[i].value);
        attributeList.appendChild(nameInput);
        selectedOptions[i].style.display = "none";

        var idProperties = document.createElement('input');
        idProperties.setAttribute('hidden', 'true');
        idProperties.setAttribute('value', selectedOptions[i].value);
        idProperties.setAttribute('id', 'id' + selectedOptions[i].value);
        idProperties.setAttribute('name', 'id' + selectedOptions[i].value);
        attributeList.appendChild(idProperties);
    }
    if (selectedOptions.length > 0) { addProperties.style.display = "none"; }
}




function addToFavorites(productId) {
    $.ajax({
        url: '/favorite-product-add',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            product_id: productId
        },
        success: function(response) {
            // Xử lý kết quả thành công
        },
        error: function(xhr, status, error) {
            // Xử lý lỗi
        }
    });
}

function removeFromFavorites(productId) {
    $.ajax({
        url: '/favorite-product-remove',
        type: 'POST',
        data: {
            _token: '{{ csrf_token() }}',
            product_id: productId
        },
        success: function(response) {
            // Xử lý kết quả thành công
        },
        error: function(xhr, status, error) {
            // Xử lý lỗi
        }
    });
}