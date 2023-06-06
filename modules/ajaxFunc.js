// Get element with id message and change value to returned value from .php file
function myCallBack(str) {
  let e = document.getElementById("warning");
  let pre =
    '<div class="alert alert-warning alert-dismissible w-75 mx-auto">' +
    '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>' +
    '<p>';
  let suf = '</p></div>';
  e.innerHTML = pre + str + suf;
}
function showLoader() {
  // show spinner
}
