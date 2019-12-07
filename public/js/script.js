function resetFocus(){
    document.getElementById("username").focus();
}
function closeNotes() {
    $('.notepadColumn').remove();
}
$(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
        $('.sidebar').toggleClass('sidebarActive');
    });
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    $('#newPersonel').change(function() {
        $('#username').val($('#newPersonel option:selected').val());
    });
});
