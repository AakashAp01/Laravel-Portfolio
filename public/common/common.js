function previewImages(event, div) {
    const container = document.getElementById(div);
    const files = event.target.files;

    // Clear previous previews
    container.innerHTML = "";

    if (files && files.length > 0) {
        for (let i = 0; i < files.length; i++) {
            const fileReader = new FileReader();
            fileReader.onload = function (e) {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.style.width = "100px"; // Set width
                img.style.height = "100px"; // Set height
                img.style.objectFit = "cover"; // Maintain aspect ratio
                img.style.border = "1px dashed #ccc"; // Border
                img.style.borderRadius = "4px"; // Rounded corners
                container.appendChild(img); // Append the new image to the container
            };
            fileReader.readAsDataURL(files[i]); // Read each file
        }
    }
}

// function showToast(title, icon, message) {
//     Swal.fire({
//         title: title || 'Work',
//         icon: icon || 'info',
//         text: message || 'Your work is done.!',
//         position: 'top-end',
//         iconColor:'#dc3545',
//         showConfirmButton: false,
//         timer: 3000,
//         toast: true,
//         background: 'black',
//         color: 'white',
//         customClass: {
//             title: 'toast-title',
//             content: 'toast-content'
//         }
//     });

//     // Apply additional styles
//     const popup = document.querySelector('.swal2-toast');
//     if (popup) {
//         popup.style.border = '2px solid #dc3545'; // Red border
//     }

// }

function showToast(title, icon, message) {
    Swal.fire({
        title: title || "Work",
        icon: icon || "info",
        text: message || "Your work is done!",
        position: "top-end",
        iconColor: "var(--text-color)",
        showConfirmButton: false,
        timer: 3000,
        toast: true,
        background: "var(--theme-color)",
        color: "var(--text-color)",
        customClass: {
            title: "custom-toast-title",
            content: "custom-toast-content",
        },
    });

    const popup = document.querySelector(".swal2-toast");
    if (popup) {
        popup.style.border = `1px solid var(--theme-color)`;
        popup.style.borderRadius = "0px";
        popup.style.padding = "10px";
    }
}

function showConfirmToast(title, icon, message, redirectUrl) {
    Swal.fire({
        title: title || "Confirm",
        icon: icon || "warning",
        text: message || "Are you sure you want to proceed?",
        showCancelButton: true,
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
        confirmButtonColor: "var(--primary)",
        iconColor: "var(--primary)",
        background: "black",
        color: "var(--primary)",
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = redirectUrl;
        }
    });

    const popup = document.querySelector(".swal2-popup");
    if (popup) {
        popup.style.border = "2px solid var(--primary)";
    }
}

function ajaxRequest(url, formData = null, method = "POST") {
    return new Promise((resolve, reject) => {
        $.ajax({
            url: url,
            method: method,
            data: formData ? formData : {},
            contentType: formData
                ? false
                : "application/x-www-form-urlencoded; charset=UTF-8",
            processData: formData ? false : true,
            cache: false,
            success: function (response) {
                if (response.success) {
                    if (response.message !== "")
                        showToast("Success", "success", response.message);
                } else {
                    showToast("Error", "error", response.message);
                }
                resolve(response);
            },
            error: function (xhr, status, error) {
                showToast("Error", "error", "Somethin went wrong!");
                reject(error);
            },
        });
    });
}

function showSpinner(
    buttonId,
    spinnerId,
    buttonTextId,
    isLoading,
    defaultText = "Submit"
) {
    const $button = $("#" + buttonId);
    const $spinner = $("#" + spinnerId);
    const $buttonText = $("#" + buttonTextId);

    if (isLoading) {
        $spinner.removeClass("d-none");
        $buttonText.text("Processing...");
        $button.prop("disabled", true);
    } else {
        $spinner.addClass("d-none");
        $buttonText.text(defaultText);
        $button.prop("disabled", false);
    }
}

function spinnerOnSubmit(formId, buttonId, spinnerId, buttonTextId) {
    const from = $("#" + formId);
    $(from).on("submit", function (e) {
        e.preventDefault();
        showSpinner(buttonId, spinnerId, buttonTextId, true);
        this.submit();
    });
}
