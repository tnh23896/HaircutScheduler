function showErrors(error, errorDivId = "errorDiv") {
  const errorData = error.responseJSON.errors || error.responseJSON;
  const errorDiv = $(`#${errorDivId}`);
  
  // Clear existing error messages
  errorDiv.html("<p>Lỗi:</p><ul>");

  // Append each error message to the errorDiv
  Object.values(errorData).forEach(errorMessage => {
    errorDiv.append("<li>"  + errorMessage + "</li>");
  });

  // Show the errorDiv
  errorDiv.show();
}

function showErrorsWithToastr(error) {
  const errorData = error.responseJSON.errors || error.responseJSON;
  Object.values(errorData).forEach(errorMessage => {
    toastr.error(errorMessage);
  });
}